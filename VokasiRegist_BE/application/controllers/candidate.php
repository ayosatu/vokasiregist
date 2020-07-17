<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class candidate extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    
    function index_post()
    {       

            $id = $this->input->post('candidate_id');
            $action = $this->input->post('action');
            $user_id = $this->input->post('user_id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $b_place = $this->input->post('birth_place');
            $nik = $this->input->post('nik');
            $no_tlp = $this->input->post('no_tlp');
            $no_hp = $this->input->post('no_hp');
            $b_date = $this->input->post('birth_date');
            $img_path = $this->input->post('img_path');
            $address = $this->input->post('address');
            $gender_id = $this->input->post('gender_id');
            $religion_id = $this->input->post('religion_id');
            $result_id = $this->input->post('result_id');
            $ins_unit_id_take = $this->input->post('ins_unit_id_take');
            $adm_user = $this->input->post('admin');

            if ($action == 'D') {
                $sql = " select * from f_crud_candidate
                (
                    '" . $action . "',
                    $id,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            } else {
                $sql = " select * from f_crud_candidate
                (
                    '" . $action . "',
                    $id,
                    $user_id,
                    '" . $name . "',
                    '" . $email . "',
                    '" . $b_place . "',
                    '" . $nik . "',
                    '" . $no_tlp . "',
                    '" . $no_hp . "',
                    '" . $b_date . "',
                    '" . $img_path . "',
                    '" . $address . "',
                    '" . $adm_user . "',
                    $gender_id ,
                    $religion_id,
                    $result_id,
                    $ins_unit_id_take
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            }
                
}
}