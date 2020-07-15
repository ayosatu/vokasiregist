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
    }

    function index_post()
    {
        $user_name = $this->post('user_name');
        $user_password = $this->post('user_password');
        $user_email = $this->post('user_email');

        // OTP
        $otp = mt_rand(1000, 9000) . date('d');

        $data = ['username' => $user_name];
        $user = $this->db->get_where('users', $data)->row_array();

        var_dump($user == null);
        if ($user == null) {
            // Username not Exist
            $this->response([
                'status' => $status = false,
                'message' => 'Username Not Exist!!'
            ], REST_Controller::HTTP_OK);
        } else {

            $this->sendMail($user_email, $otp);
            if (password_verify($user_password, $otp, $user['password_user'])) {
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

    // function send mail
    public function sendMail($email, $otp)
    {
        // config email
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'webprogbkmphp@gmail.com',
            'smtp_pass' => 'G7b26B4d',
            'mailtype'  => 'html',
            'wordwrap' => TRUE,
            'charset'   => 'iso-8859-1'
        );

        // initialization
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // from email (email sender, Sender Name)
        $this->email->from('webprogbkmphp@gmail.com', 'Hendra.S'); // from email
        // send to 
        $this->email->to($email);
        // subject email
        $this->email->subject('OTP LOGIN');
        // Message
        $this->email->message('Assalamualaikum
 
             
             OTP = ' . $otp . ' haiyuuuu login
         ');

        // send mail
        if ($this->email->send()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Email Has Been Send
            </div>');
            redirect('EmailClass');
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
