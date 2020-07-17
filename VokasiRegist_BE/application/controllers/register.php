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
        // GET Value
        $action = $this->input->post('action');
        $user_id = ($this->input->post('user_id') == NULL) ? NULL : $this->input->post('user_id');
        $user_full_name = $this->input->post('user_full_name');
        $user_name = $this->input->post('user_name');
        $user_password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
        $nik = $this->input->post('nik');
        $user_email = $this->input->post('user_email');

        $sql = " select * from f_register
            (
                '" . $action . "',
                 $user_id,
                '" . $user_full_name . "',
                '" . $user_name . "',
                '" . $user_password . "',
                '" . $nik . "',
                '" . $user_email . "'
            ); ";
        $data = $this->db->query($sql)->row_array();
        $this->response([
            'status' => $data['oint_res'],
            'message' => $data['ostr_msg']
        ], REST_Controller::HTTP_OK);
    }
}
