<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class c_parent extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    
    function index_post()
    {       

            $id = $this->input->post('c_parent_id');
            $opr = $this->input->post('opr');
            $candidate_id = ($this->input->post('candidate_id') == NULL) ? NULL : $this->input->post('candidate_id') ;
            $name = $this->input->post('name');
            $relation_status_id = $this->input->post('relation_status_id');
            $nik = $this->input->post('nik');
            $job = $this->input->post('job');
            $birth_date = $this->input->post('birth_date');
            $birth_place = $this->input->post('birth_place');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $address = $this->input->post('address');
            $gender_id = $this->input->post('gender_id');
            $religion_id = $this->input->post('religion_id');
            $adm_user = $this->input->post('admin');

                $sql = " select * from f_crud_c_parent
                (
                    '" . $opr . "',
                    $id,
                    $candidate_id,
                    '" . $name . "',
                    $relation_status_id,
                    '" . $nik . "',
                    '" . $job . "',
                    '" . $birth_date . "',
                    '" . $birth_place . "',
                    '" . $email . "',
                    '" . $no_tlp . "',
                    '" . $address . "',
                    $religion_id,
                    $gender_id ,
                    '" . $adm_user . "'
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
                
    }
}