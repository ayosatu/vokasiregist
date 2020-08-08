<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_Question extends CI_Controller
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
		$data['candidate'] = $this->db->get('vw_list_candidate')->result_array();
		// print_r($data['candidate']);
		// die();

		$this->load->view('va_question', $data);
	}

	private function getData()
	{
		$candidate_id = $this->input->get('id');

		$id = ['candidate_id' => $candidate_id];
		$data['candidate'] = $this->db->get_where('vw_list_candidate', $id)->row_array();
		return $data;
	}

	public function detail()
	{
		$data = $this->getData();
		$this->load->view('va_question_detail', $data);
	}

	public function loadUpdateDisplay()
	{
		$data = $this->getData();
		$this->load->view('va_question_update', $data);
	}
	public function update()
	{
		echo 'Function Update';
		die();

		$datapost = [
			'action' => 'U'
			// 'qr_candidate_id' => $candidate_id
		];

		$respond = json_decode($this->curl->simple_post($this->API . 'M_Candidate', $datapost), true);


		if ($respond['status'] == 1) {
			$this->session->set_flashdata(
				'msg',
				' Data Has Been Updated!'
			);
		} else {
			$this->session->set_flashdata(
				'msgfail',
				'Error : ' . $respond['status']
			);
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
