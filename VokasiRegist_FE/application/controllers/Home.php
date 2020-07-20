<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		//Call Parent Construct
		parent::__construct();
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		if ($this->session->userdata('success') != 1) {
			redirect('auth');
		}
		$this->load->view('templates/temp_head');
		$this->load->view('v_home');
		$this->load->view('templates/temp_footer');
	}

	public function logout()
	{
		$this->session->set_userdata('auto_login', -1);
		redirect('auth');
	}

	public function my_profile()
	{
		$this->load->view('templates/temp_head');
		$this->load->view('v_profile');
		$this->load->view('templates/temp_footer');
	}
}
