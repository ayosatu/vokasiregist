<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_Candidate extends CI_Controller
{
	public function __construct()
	{
		//Call Parent Construct
		parent::__construct();
		//Load Library Form Validation
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('pagination');
	}

	//FORM LOGIN ACCOUNT
	public function index()
	{
		$data['candidate'] = $this->db->get('vw_list_candidate')->result_array();
		// print_r($data['candidate']);
		// die();

		$this->load->view('va_candidate', $data);
	}

	private function getData()
	{
		$candidate_id = $this->input->post('id');

		$id = ['candidate_id' => $candidate_id];
		$data['candidate'] = $this->db->get_where('vw_list_candidate', $id)->row_array();
		return $data;
	}

	public function detail()
	{
		$data = $this->getData();
		$this->load->view('va_candidate_detail', $data);
	}

	public function loadUpdateDisplay()
	{
		$data = $this->getData();
		$data['religion'] = $this->db->get('vw_ref_religion')->result_array();
		$data['gender'] = $this->db->get('vw_ref_gender')->result_array();
		$this->load->view('va_candidate_update', $data);
	}

	public function update()
	{
		$istr_operator = 'U';
		$istr_candidate_id = ($this->input->post('istr_candidate_id') == NULL) ? NULL : $this->input->post('istr_candidate_id');
		$istr_user_id = ($this->input->post('istr_user_id') == NULL) ? NULL : $this->input->post('istr_user_id');
		$istr_name = ($this->input->post('istr_name') == NULL) ? NULL : $this->input->post('istr_name');
		$istr_email = ($this->input->post('istr_email') == NULL) ? NULL : $this->input->post('istr_email');
		$istr_birth_place = ($this->input->post('istr_birth_place') == NULL) ? NULL : $this->input->post('istr_birth_place');
		$istr_nik = ($this->input->post('istr_nik') == NULL) ? NULL : $this->input->post('istr_nik');
		$istr_no_tlp = ($this->input->post('istr_no_tlp') == NULL) ? NULL : $this->input->post('istr_no_tlp');
		$istr_no_hp = ($this->input->post('istr_no_hp') == NULL) ? NULL : $this->input->post('istr_no_hp');
		$istr_birth = ($this->input->post('istr_birth') == NULL) ? NULL : $this->input->post('istr_birth');
		$istr_img_path = ($this->input->post('istr_img_path') == NULL) ? NULL : $this->input->post('istr_img_path');
		$istr_address = ($this->input->post('istr_address') == NULL) ? NULL : $this->input->post('istr_address');
		$istr_adm = ($this->input->post('istr_adm') == NULL) ? NULL : $this->input->post('istr_adm');
		$istr_gender_id = ($this->input->post('istr_gender_id') == NULL) ? NULL : $this->input->post('istr_gender_id');
		$istr_religion_id = ($this->input->post('istr_religion_id') == NULL) ? NULL : $this->input->post('istr_religion_id');
		$istr_result_id = ($this->input->post('istr_result_id') == NULL) ? NULL : $this->input->post('istr_result_id');
		$istr_unit_id_take = ($this->input->post('istr_unit_id_take') == NULL) ? NULL : $this->input->post('istr_unit_id_take');

		$sql = "select * from f_crud_candidate(
			'" . $istr_operator . "',
			'" . $istr_candidate_id . "',
			'" . $istr_user_id . "',
			'" . $istr_name . "',
			'" . $istr_email . "',
			'" . $istr_birth_place . "',
			'" . $istr_nik . "',
			'" . $istr_no_tlp . "',
			'" . $istr_no_hp . "',
			'" . $istr_birth . "',
			'" . $istr_img_path . "',
			'" . $istr_address . "',
			'" . $istr_adm . "',
			'" . $istr_gender_id . "',
			'" . $istr_religion_id . "',
			'" . $istr_result_id . "',
			'" . $istr_unit_id_take . "'
			)";
		$data = $this->db->query($sql)->row_array();

		if ($data['oint_res'] == 1) {
			echo 'Success';
			die();
		}
	}

	public function delete()
	{
		echo 'Function Delete';
		die();

		$data = $this->getData();
		$get_id = $data['candidate'];
		$datapost = [
			'action' => 'D',
			'candidate_id' => $get_id['candidate_id']
		];
		$respond = json_decode($this->curl->simple_post($this->API . 'M_Candidate', $datapost), true);

		if ($respond['status'] == 1) {
			$this->session->set_flashdata(
				'msg',
				' Data Has Been Deleted!'
			);
		} else {
			$this->session->set_flashdata(
				'msgfail',
				'Error : ' . $respond['status']
			);
		}
	}
}
