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
			$sql = "select * from candidate";
			$data['candidate'] = $this->db->query($sql)->result_array();

			$sql = "select * from religion";
			$data['religion'] = $this->db->query($sql)->result_array();

			$sql = "select * from gender";
			$data['gender'] = $this->db->query($sql)->result_array();

			$sql = "select * from vw_candidate_user";
			$data['vw_candidate'] = $this->db->query($sql)->row_array();
			
			
			$this->load->view('templates/temp_header');
			$this->load->view('v_profile',$data);
			$this->load->view('templates/temp_footer');
	}

	public function ProfileUpdate()
	{
		$istr_action = 'U';
		$istr_name = $this->input->post('istr_name');
		$istr_email = $this->input->post('istr_email');
		$istr_birth_place = $this->input->post('istr_birth_place');
		$istr_nik = $this->input->post('istr_nik');
		$ddlgender = $this->input->post('ddlgender');
		$istr_img_path = $this->input->post('istr_img_path');
		$istr_no_tlp = $this->input->post('istr_no_tlp');
		$istr_no_hp = $this->input->post('istr_no_hp');
		$idt_birth_date = $this->input->post('idt_birth_date');
		$istr_address = $this->input->post('istr_address');
		$ddlregion = $this->input->post('ddlregion');
	}

}
