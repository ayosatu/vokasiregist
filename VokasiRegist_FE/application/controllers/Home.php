<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		//Call Parent Construct
		parent::__construct();
		$this->load->helper('cookie');
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		if (get_cookie('success') == 1 || $this->session->userdata('remember_me') == 1) {
			$this->load->view('templates/temp_header');
			$this->load->view('v_home');
			$this->load->view('templates/temp_footer');
		} else {
			redirect('auth');
		}
	}

	public function logout()
	{
		delete_cookie('success');
		$this->session->set_userdata('remember_me', -1);
		redirect('auth');
	}
}
