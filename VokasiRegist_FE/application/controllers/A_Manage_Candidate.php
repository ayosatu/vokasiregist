<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_Manage_Candidate extends CI_Controller
{
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
		$this->load->view('va_manage_candidate');
	}
}
