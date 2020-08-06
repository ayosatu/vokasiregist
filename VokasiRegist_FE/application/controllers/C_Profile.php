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
		//$user_session = $this->session->userdata('candidate_id');
		//$this->db->query("SELECT * FROM users WHERE user_id = 12");
		//$get = $this->input->get('c_profile', true);
		// $data['users'] = $this->db->get_where('users', array('user_id' => 12))->row_array();
		$data['profile'] = $this->db->get('candidate')->row_array();
		$this->load->view('v_profile', $data);
	}
}
