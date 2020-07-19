<?php

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class login extends REST_Controller
{

	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}

	function index_post()
	{
		$action = $this->input->post('action');
		$user_name = ($this->input->post('user_name') == NULL) ? NULL : $this->input->post('user_name');
		$user_password = ($this->input->post('user_password') == NULL) ? NULL : $this->input->post('user_password');
		$otp_val = ($this->input->post('otp_val') == NULL) ? NULL : $this->input->post('otp_val');

		if ($action == "P2") {
			$gen_password = "select * from f_gen_password('" . $user_name . "')";
			$data_password = $this->db->query($gen_password)->row_array();
			$success_gen_password = $this->db->query($data_password['sql'])->row_array();
			if (password_verify($user_password, $success_gen_password['user_password'])) {
				$user_password = $success_gen_password['user_password'];
			}
		}


		$sql = " select * from f_login
			(
			'" . $action . "',
			'" . $user_name . "',
			'" . $user_password . "',
			'" . $otp_val . "'
			); ";
		$data = $this->db->query($sql)->row_array();

		$this->response([
			'status' => $data['oint_res'],
			'message' => $data['ostr_msg']
		], REST_Controller::HTTP_OK);

		if ($data['oint_res'] == 1) {
			$success = $this->db->query($data['sql'])->row_array();
		}

		if ($action == "P1" && $data['oint_res'] == 1) {
			// Generate OTP
			$otp = mt_rand(1000, 9000) . date('s');
			// PUT OTP TO DB
			$u_otp = "select * From f_update_otp(" . $success['user_id'] . ", '" . $otp . "');";
			$this->db->query($u_otp);
			// Send MAIL
			$this->sendMail($data, $success['user_email'], $otp);
		} elseif ($action == "P2" && $data['oint_res'] == 1 && $otp_val == $success['otp_val']) {
			$sql = "select * From f_update_lastlogin(" . $success['user_id'] . ");";
			$this->db->query($sql);
			$this->response([
				'status' => $data['oint_res'],
				'message' => 'Succes Login!!'
			], REST_Controller::HTTP_OK);
		}
	}

	function sendMail($data, $email, $otp)
	{
		// config email
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'pendaftaranbkm@gmail.com',
			'smtp_pass' => 'bkm12345',
			'mailtype'  => 'html',
			'wordwrap' => TRUE,
			'charset'   => 'iso-8859-1'
		);

		// initialization
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		// from email (email sender, Sender Name)
		$this->email->from('pendaftaranbkm@gmail.com', 'VET Budikarya Man'); // from email
		// send to 
		$this->email->to($email);
		// subject email
		$this->email->subject('OTP LOGIN');
		// Message
		$this->email->message('Kode OTP Anda <b>' . $otp . '</b> <br> Kode Anda Akan Hangus Dalam 5 Menit.');

		// send mail
		if ($this->email->send()) {
			$this->response([
				'status' => $data['oint_res'],
				'message' => 'Email Has Been Send!!'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => $data['oint_res'],
				'message' => 'Failed Send!!'
			], REST_Controller::HTTP_OK);
		}
	}
}
