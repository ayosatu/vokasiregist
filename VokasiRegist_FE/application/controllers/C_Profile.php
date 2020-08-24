<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Profile extends CI_Controller
{
	// var $API = "http://localhost/VokasiRegist_BE/";
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
		
	}
}
