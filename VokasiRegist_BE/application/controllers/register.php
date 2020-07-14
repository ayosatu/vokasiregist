<?php

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class register extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //table users for regist
    function index_post()
    {
        $action = $this->input->post('action');
        // Insert
        if ($action == 'I') {
            // GET Value
            $user_full_name = $this->input->post('user_full_name');
            $user_name = $this->input->post('user_name');
            $user_password = $this->input->post('user_password');
            $nik = $this->input->post('nik');
            $user_email = $this->input->post('user_email');

            $sql = " select f_crud_users
            (
                'I',
                NULL,
                1,
                '" . $user_full_name . "',
                '" . $user_name . "',
                '" . $user_password . "',
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                '" . $nik . "',
                NULL,
                'ADMIN',
                '" . $user_email . "',
                '1'
            ); ";
            // CHECK
            $this->db->where('nik', $nik);
            $data = $this->db->get('users')->result();

            if ($data) {
                $this->response([
                    'status' => 'ERROR',
                    'message' => 'NIK Already Exist!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                $this->db->query($sql)->row_array();
                $this->response([
                    'status' => 'OK',
                    'message' => 'Data Inserted!!'
                ], REST_Controller::HTTP_OK);
            }
        }
        // Delete
        elseif ($action == 'D') {
            // GET Value
            $id = $this->input->post('user_id');

            if ($id == '') {
                $this->response([
                    'status' => 'ERROR',
                    'message' => 'Key Missed!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                // Delete With FunctionSQL
                $sql = " select f_crud_users
            (
                'D',
                " . $id . ",
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
                // CHECK
                $this->db->where('user_id', $id);
                $data = $this->db->get('users')->result();

                if ($data) {
                    $this->db->query($sql)->row_array();
                    $this->response([
                        'status' => 'OK',
                        'message' => 'Data Deleted!!'
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
            $user_password = $this->input->post('user_password');
            $id = $this->input->post('user_id');

            $sql = " select f_crud_users
            (
                'U',
                '" . $id . "',
                NULL,
                NULL,
                NULL,
                '" . $user_password . "',
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
            // CHECK
            $this->db->where('user_id', $id);
            $data = $this->db->get('users')->result();

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
