<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		//Call Parent Construct
		parent::__construct();
		//Load Library Form Validation
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper(array('cookie', 'url'));
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		if ($this->session->userdata('remember_me') == 1) {
			redirect('home');
		} else {
			$this->load->view('templates/v_login_phase_1');
		}
	}

	public function login_phase1()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$user_name = $this->input->post('user_name');
		$sql = "select * from f_login 
			(
				'P1',
				'" . $user_name . "',
				'',
				''
			);";
		$data = $this->db->query($sql)->row_array();
		// print_r($data);
		// die();
		if ($data['oint_res'] == 1) {
			set_cookie([
				'name' => 'user_name',
				'value' => $user_name,
				'expire' => 0
			]);

			$success = $this->db->query($data['sql'])->row_array();
			// Generate OTP
			$otp = mt_rand(1000, 9000) . date('s');
			// PUT OTP TO DB
			$u_otp = "select * From f_update_otp(" . $success['user_id'] . ", '" . $otp . "');";
			$this->db->query($u_otp);
			// Send MAIL
			$this->sendMailOTP($success['user_email'], $otp);

			redirect('auth/login_phase2');
		} else {
			redirect('auth');
		}
	}

	public function login_phase2()
	{
		if (get_cookie('user_name') == null || get_cookie('user_name') == "") {
			redirect('auth');
		}

		if ($this->session->userdata('remember_me') == 1) {
			redirect('home');
		}

		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('otp_val', 'OTP Code', 'required');
		$user_name = $this->input->post('user_name');
		$user_password = $this->input->post('user_password');
		$otp_val = $this->input->post('otp_val');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/v_login_phase_2');
		} else {

			$gen_password = "select * from f_gen_password('" . $user_name . "')";
			$data_password = $this->db->query($gen_password)->row_array();
			$success_gen_password = $this->db->query($data_password['sql'])->row_array();
			if (password_verify($user_password, $success_gen_password['user_password'])) {
				$user_password = $success_gen_password['user_password'];
			}

			$sql = "select * from f_login 
			(
				'P2',
				'" . $user_name . "',
				'" . $user_password . "',
				'" . $otp_val . "'
			);";
			$data = $this->db->query($sql)->row_array();

			if ($data['oint_res'] == 1) {
				set_cookie([
					'name' => 'success',
					'value' => 1,
					'expire' => 0
				]);

				if ($this->input->post('remember_me') == true) {
					$this->session->set_userdata('remember_me', 1);
					redirect('home');
				}
				redirect('home');
			} else {
				$this->load->view('templates/v_login_phase_2');
			}
		}
	}

	function sendMailOTP($email, $otp)
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
		$this->email->from('pendaftaranbkm@gmail.com', 'VET Budikarya Mandiri'); // from email
		// send to 
		$this->email->to($email);
		// subject email
		$this->email->subject('OTP LOGIN');
		// Message
		$this->email->message('Kode OTP Anda <b>' . $otp . '</b> <br> Kode Anda Akan Hangus Dalam 5 Menit.');

		$this->email->send();
	}
}
