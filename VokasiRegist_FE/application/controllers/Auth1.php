<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	var $API = "http://localhost/VokasiRegist_BE/";
	// var $API = "https://github.com/ayosatu/vokasiregist/tree/master/VokasiRegist_BE/application/controllers/";
	public function __construct()
	{
		//Call Parent Construct
		parent::__construct();
		//Load Library Form Validation
		$this->load->library('form_validation');
		$this->load->library('email');
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		if ($this->session->userdata('auto_login') == 1) {
			redirect('home');
		} else {
			$this->load->view('templates/v_login_phase_1');
		}
	}

	public function login_phase1()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$user_name = $this->input->post('user_name');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/v_login_phase_1');
		} else {
			$datapost = [
				'action' => 'P1',
				'user_name' => $user_name
			];
			$data = json_decode($this->curl->simple_post($this->API . 'login', $datapost), true);
			if ($data['status'] == 1) {
				$this->session->set_userdata('user_name', $user_name);
				$this->load->view('templates/v_login_phase_2');
			} else {
				redirect('auth');
			}
		}
	}

	public function login_phase2()
	{
		if ($this->session->userdata('user_name') == null || $this->session->userdata('user_name') == "") {
			redirect('auth');
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
			$datapost = [
				'action' => 'P2',
				'user_name' => $user_name,
				'user_password' => $user_password,
				'otp_val' => $otp_val
			];
			$data = json_decode($this->curl->simple_post($this->API . 'login', $datapost), true);
			if ($data['status'] == 1) {
				if ($this->input->post('auto_login') == true) {
					$this->session->set_userdata('auto_login', 1);
				}
				$this->session->set_userdata('user_name', null);
				$this->session->set_userdata('success', 1);
				redirect('home');
			} else {
				$this->load->view('templates/v_login_phase_2');
			}
		}
	}
}
