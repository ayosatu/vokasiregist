
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
		$data['c_parent'] = $this->MAG->getData('vw_c_parent');
		$data['religion'] = $this->MAG->getData('vw_ref_religion');
		$data['gender'] = $this->MAG->getData('vw_ref_gender');
		$data['p_reference_list'] = $this->MAG->getData('vw_list_relation');
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

		$id = $this->input->post('id');
		$this->db->where(['c_parent_id' => $id]);
		$this->db->delete('c_parent');
		$data = $this->getData();

		return $this->load->view('va_manage_candidate', $data);
	}


	public function ambilData(){
            $id=$this->input->post('id');
            $where=array('candidate_id'=>$id);
            $dataCandidate = $this->MAG->ambilId('vw_list_candidate',$where)->result_array();
            

            echo json_encode($dataCandidate);
        }

    public function ubahData(){
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
        

        $this->form_validation->set_rules('istr_user_id','istr_user_id', 'required|trim',['required' => ' This Field is Required!']);
        $this->form_validation->set_rules('istr_name','istr_name', 'required|trim',['required' => 'This Field is Required!']);
        $this->form_validation->set_rules('istr_email','istr_email', 'required|trim',['required' => 'This Field is Required!']);
        
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
        $data = $this->db->query($sql)->result_array();

        //  if ($data['oint_res'] == 1) {
        //      echo 'Success';
        //     //die();
        //}

        redirect('users');

    }

    public function ambilDataParent(){
        $id=$this->input->post('id');
        $where=array('c_parent_id'=>$id);
        $dataParent = $this->MAG->ambilId('vw_c_parent',$where)->result_array();
        
        
        echo json_encode($dataParent);
    }

	
}