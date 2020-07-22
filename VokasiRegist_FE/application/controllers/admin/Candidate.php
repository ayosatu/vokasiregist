<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate extends CI_Controller
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

		$data['candidate'] = $this->db->get('candidate')->result_array();
		$this->load->view('templates/admin_temp_header');
		$this->load->view('admin/v_candidate', $data);
		$this->load->view('templates/admin_temp_footer');
	}

	public function detail()
	{

		$candidate_id = $this->input->get('candidate_id');
		$data['candidate'] = $this->db->get_where('candidate', array('candidate_id' => $candidate_id))->row_array();
		// echo $candidate_id;
		// print_r($data);
		// die();
		$this->load->view('templates/admin_temp_header');
		$this->load->view('admin/v_candidate_detail', $data);
		$this->load->view('templates/admin_temp_footer');
	}

	public function update()
	{

		$candidate_id = $this->input->get('candidate_id');
		$data['candidate'] = $this->db->get_where('candidate', array('candidate_id' => $candidate_id))->row_array();
		// echo $candidate_id;
		// print_r($data);
		// die();
		$this->load->view('templates/admin_temp_header');
		$this->load->view('admin/v_candidate_update', $data);
		$this->load->view('templates/admin_temp_footer');
	}

	public function delete()
	{

		$candidate_id = $this->input->get('candidate_id');
		$data['candidate'] = $this->db->get_where('candidate', array('candidate_id' => $candidate_id))->row_array();
		echo $candidate_id;
		print_r($data);
		die();
	}
}
