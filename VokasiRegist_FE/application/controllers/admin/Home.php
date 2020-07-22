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
		// $data = "";
		$data['candidate'] = $this->db->get('candidate')->result_array();
		// $data['pasiens'] = $this->db->get('pasiens')->result_array();
		// print_r($data);
		// die();
		$this->load->view('templates/admin_temp_header');
		$this->load->view('admin/v_home', $data);
		$this->load->view('templates/admin_temp_footer');
	}
}
