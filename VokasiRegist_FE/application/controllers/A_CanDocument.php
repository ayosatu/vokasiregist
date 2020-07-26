<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_CanDocument extends CI_Controller
{
	var $API = "http://localhost/VokasiRegist_BE/";
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
		$datapost = [
			'action' => 'QR'
		];

		$API_data = json_decode($this->curl->simple_post($this->API . 'M_Candidate', $datapost), true);

		$data['candidate'] = $API_data['data'];
		// print_r($data);
		// die();
		$this->load->view('va_candocument', $data);
	}

	private function getData()
	{
		$candidate_id = $this->input->get('candidate_id');
		$datapost = [
			'action' => 'QR',
			'qr_candidate_id' => $candidate_id
		];

		$API_data = json_decode($this->curl->simple_post($this->API . 'M_Candidate', $datapost), true);

		$data['candidate'] = $API_data['data'][0];
		// echo $candidate_id;
		// print_r($data);
		// die();
		return $data;
	}

	public function detail()
	{
		$data = $this->getData();
		$this->load->view('templates/admin_temp_header');
		$this->load->view('va_candidate_detail', $data);
		$this->load->view('templates/admin_temp_footer');
	}

	public function update()
	{
		$this->getData();
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
		redirect('a_candidate');
	}

	public function delete()
	{
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
		redirect('a_candidate');
	}
}
