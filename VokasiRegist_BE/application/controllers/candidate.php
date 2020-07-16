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
        // Insert
        if ($action == 'I') {
            // GET Value
            
            $sql = " select * from f_crud_candidate
            (
                'I',
                NULL,
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
            // CHECK
            $this->db->where('nik', $nik);
            $data = $this->db->get('candidate')->result();

            if ($data) {
                $this->response([
                    'status' => 'ERROR',
                    'message' => 'NIK Already Inputed!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                $this->db->query($sql)->row_array();
                $this->response([
                    'status' => 'OK',
                    'message' => 'Data Has Been Inputed!!'
                ], REST_Controller::HTTP_OK);
            }
        }
        // Delete
        elseif ($action == 'D') {
            // GET Value
            $id = $this->input->post('candidate_id');

            if ($id == '') {
                $this->response([
                    'status' => 'ERROR',
                    'message' => 'Key Missed!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                // Delete With FunctionSQL
                $sql = " select * from f_crud_candidate
            (
                'D',
                $id,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null,
                Null
            ); ";
                // CHECK
                $this->db->where('candidate_id', $id);
                $data = $this->db->get('candidate')->result();

                if ($data) {
                    $this->db->query($sql)->row_array();
                    $this->response([
                        'status' => 'OK',
                        'message' => 'Data Has been Deleted!!'
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => 'ERROR',
                        'message' => 'Data Not Found!!'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }
        // Update
        elseif ($action == 'U') {
            // GET Value
            $id = $this->input->post('candidate_id');

            $sql = " select * from f_crud_candidate
            (
                'U',
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
            // CHECK
            $this->db->where('candidate_id', $id);
            $data = $this->db->get('candidate')->result();

            if ($data) {
                $this->db->query($sql)->row_array();
                $this->response([
                    'status' => 'OK',
                    'message' => 'Data Updated!!'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => 'ERROR',
                    'message' => 'Data Not Found!!'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => 'ERROR',
                'message' => 'Action Not Found!!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
}
}