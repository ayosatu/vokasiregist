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
		$this->load->model('M_AjaxGlobal', 'MAG');
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		$data = $this->getData();
		$this->load->view('va_manage_candidate', $data);
	}

	public function getData()
	{
		$data['candidate'] = $this->MAG->getData('vw_list_candidate');
		$data['religion'] = $this->MAG->getData('vw_ref_religion');
		$data['gender'] = $this->MAG->getData('vw_ref_gender');
		return $data;
	}

	public function getDataCandidate()
	{
		$data = $this->MAG->getData('vw_list_candidate')->result_array();
		echo json_encode($data);
	}

	public function deleteData()
	{
		$id = $this->input->post('id');
		$this->db->where(['candidate_id' => $id]);
		$this->db->delete('candidate');
		$data = $this->getData();

		return $this->load->view('va_manage_candidate', $data);
	}
}
