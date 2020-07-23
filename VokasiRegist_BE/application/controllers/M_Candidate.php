<?php

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class M_Candidate extends REST_Controller
{

	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}


	function index_post()
	{
		$qr_search = ($this->input->post('search') == NULL) ? NULL : $this->input->post('search');
		$qr_candidate_id = ($this->input->post('qr_candidate_id') == NULL) ? -1 : $this->input->post('qr_candidate_id');
		$action = ($this->input->post('action') == NULL) ? NULL : $this->input->post('action');
		$candidate_id = ($this->input->post('candidate_id') == NULL) ? -1 : $this->input->post('candidate_id');
		$user_id = ($this->input->post('user_id') == NULL) ? -1 : $this->input->post('user_id');
		$name = ($this->input->post('name') == NULL) ? NULL : $this->input->post('name');
		$email = ($this->input->post('email') == NULL) ? NULL : $this->input->post('email');
		$birth_place = ($this->input->post('birth_place') == NULL) ? NULL : $this->input->post('birth_place');
		$nik = ($this->input->post('nik') == NULL) ? NULL : $this->input->post('nik');
		$no_tlp = ($this->input->post('no_tlp') == NULL) ? NULL : $this->input->post('no_tlp');
		$no_hp = ($this->input->post('no_hp') == NULL) ? NULL : $this->input->post('no_hp');
		$birth_date = ($this->input->post('birth_date') == NULL) ? NULL : $this->input->post('birth_date');
		$img_path = ($this->input->post('img_path') == NULL) ? NULL : $this->input->post('img_path');
		$address = ($this->input->post('address') == NULL) ? NULL : $this->input->post('address');
		$created_by = ($this->input->post('created_by') == NULL) ? NULL : $this->input->post('created_by');
		$gender_id = ($this->input->post('gender_id') == NULL) ? -1 : $this->input->post('gender_id');
		$religion_id = ($this->input->post('religion_id') == NULL) ? -1 : $this->input->post('religion_id');
		$result_id = ($this->input->post('result_id') == NULL) ? -1 : $this->input->post('result_id');
		$ins_unit_id_take = ($this->input->post('ins_unit_id_take') == NULL) ? -1 : $this->input->post('ins_unit_id_take');

		if ($action == "QR") {
			$sql = " select * from f_search_candidate('" . $qr_search . "'," . $qr_candidate_id . ");";
			$data = $this->db->query($sql)->result_array();
			// echo $sql;
			// die();
			$this->response([
				'data' => $data
			], REST_Controller::HTTP_OK);
		} else {
			$sql = " select * from f_crud_candidate
			('" . $action . "', 
			" . $candidate_id . ", 
			" . $user_id . ", 
			'" . $name . "', 
			'" . $email . "',
			'" . $birth_place . "',
			'" . $nik . "',
			'" . $no_tlp . "',
			'" . $no_hp . "',
			'" . $birth_date . "', 
			'" . $img_path . "',
			'" . $address . "',
			'" . $created_by . "',
			" . $gender_id . ", 
			" . $religion_id . ", 
			" . $result_id . ", 
			" . $ins_unit_id_take . "
			);";

			// echo $sql;
			// die();

			$data = $this->db->query($sql)->row_array();
			$this->response([
				'status' => $data['oint_res'],
				'message' => $data['ostr_msg']
			], REST_Controller::HTTP_OK);
		}
	}
}
