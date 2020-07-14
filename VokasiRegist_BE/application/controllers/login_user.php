<?php

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class login_user extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan Data
    function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $product = $this->db->get('users')->result();
        } else {
            $this->db->where('users_id', $id);
            $product = $this->db->get('users')->result();
        }

        if ($product) {
            $this->response([
                'status' => true,
                'data' => $product
            ], REST_Controller::HTTP_OK);
            print_r($product);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Data not found!!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //Insert table users for regist
    function index_post()
    {
        $arrdata =
            [
                'user_type_id' => $this->post('user_type_id'),
                'full_name' => $this->post('full_name'),
                'username' => $this->post('username'),
                'password' => $this->post('password'),
                'otp_val' => $this->post('otp_val'),
                'otp_date' => $this->post('otp_date'),
                'last_login' => $this->post('last_login'),
                'created_date' => $this->post('created_date'),
                'update_date' => $this->post('update_date'),
                'update_by' => $this->post('update_by'),
                'created_by' => $this->post('created_by'),
                'chat_id' => $this->post('chat_id'),
                'is_emp' => $this->post('is_emp'),
                'nik' => $this->post('nik')

            ];

        $put_in = $this->db->insert('users', $arrdata);
        if ($put_in) {
            $this->response([
                'status' => true,
                'data' => 'Data Inserted!!'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'Bad Request!!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
