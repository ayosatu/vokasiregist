<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class login extends REST_Controller
{
    private function __login()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        $data = ['username' => $username];
        $user = $this->db->get_where('users', $data)->row_array();

        var_dump($user == null);
        if ($user == null) {
            // Username not Exist
            $this->response([
                'status' => $status = false,
                'message' => 'Username Not Exist!!'
            ], REST_Controller::HTTP_OK);
        } else {

            if (password_verify($password, $user['password_user'])) {
                // Succes Login
                $this->response([
                    'status' => $status = true,
                    'message' => 'Succes Login!!'
                ], REST_Controller::HTTP_OK);
            } else {
                //Wrong Password
                $this->response([
                    'status' => $status = false,
                    'message' => 'Wrong Password!!'
                ], REST_Controller::HTTP_OK);
            }
        }
        return $status;
    }
}
