<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class login extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->library('email');
    }

    function index_post()
    {
        $action = $this->input->post('action');
        $user_name = $this->input->post('user_name');


        if ($action == 'F1') {
            $data = ['user_name' => $user_name];
            $user = $this->db->get_where('users', $data)->row_array();

            if ($user == null) {
                // Username not Exist
                $this->response([
                    'status' => -1,
                    'message' => 'Username Not Exist!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else {
                // GET MAIL
                $user_email = $this->getMail($user_name);
                // OTP
                $otp = mt_rand(1000, 9000) . date('s');
                // PUT OTP TO DB
                $id = $this->getID($user_name);
                $sql = "select * From f_update_otp(" . $id . ", '" . $otp . "');";
                $this->db->query($sql);
                // Send MAIL
                $this->sendMail($user_email, $otp);
            }
        } elseif ($action == 'F2') {
            $user_name = $this->input->post('user_name');
            $user_password = $this->input->post('user_password');
            $otp = $this->input->post('otp_val');

            $data = ['user_name' => $user_name];
            $user = $this->db->get_where('users', $data)->row_array();
            if (password_verify($user_password, $user['user_password']) && $otp == $user['otp_val']) {
                // Succes Login
                $id = $this->getID($user_name);
                $sql = "select * From f_update_lastlogin(" . $id . ");";
                $this->db->query($sql);
                $this->response([
                    'status' => 1,
                    'message' => 'Succes Login!!'
                ], REST_Controller::HTTP_OK);
            } else {
                //Wrong Password
                $this->response([
                    'status' => -1,
                    'message' => 'Wrong Password!!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function getMail($user_name)
    {
        $username = ['user_name' => $user_name];
        $data = $this->db->get_where('users', $username)->row_array();
        $mail = $data['user_email'];

        return $mail;
    }

    function getID($user_name)
    {
        $username = ['user_name' => $user_name];
        $data = $this->db->get_where('users', $username)->row_array();
        $id = $data['user_id'];

        return $id;
    }

    // function send mail
    function sendMail($email, $otp)
    {
        // config email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pendaftaranbkm@gmail.com',
            'smtp_pass' => 'bkm12345',
            'mailtype'  => 'html',
            'wordwrap' => TRUE,
            'charset'   => 'iso-8859-1'
        );

        // initialization
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // from email (email sender, Sender Name)
        $this->email->from('pendaftaranbkm@gmail.com', 'VET Budikarya Man'); // from email
        // send to 
        $this->email->to($email);
        // subject email
        $this->email->subject('OTP LOGIN');
        // Message
        $this->email->message('Kode OTP Anda <b>' . $otp . '</b> <br> Kode Anda Akan Hangus Dalam 5 Menit.');

        // send mail
        if ($this->email->send()) {
            $this->response([
                'status' => 'OK',
                'message' => 'Email Has Been Send!!'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => 'ERROR',
                'message' => 'Failed Send!!'
            ], REST_Controller::HTTP_OK);
        }
    }
}
