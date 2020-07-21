<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{


    public function __construct()
    {
        //Call Parent Construct
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $this->load->view('v_forgot');
        //$this->load->view('change_password');
        //$this->load->view('message_email_correct');
        //$this->load->view('message_email_false');

        //$id = 3;
        //$data = [
        //    'user_password' => '2345 '
        //];
        //$this->db->where('user_id', $id);
        //$this->db->update('users', $data);
    }

    public function sendMail($email, $otp)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' =>  'pendaftaranbkm@gmail.com',
            'smtp_pass' => 'bkm12345',
            'mailtype'  => 'html',
            'wordwrap' => TRUE,
            'charset'   => 'iso-8859-1'
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('pendaftaranbkm@gmail.com', 'VET Budikarya Mandiri'); // from email
        $this->email->to($email);
        $this->email->subject('User Information Details');

        $this->email->message('Your OTP Code : ' . $otp);

        // send mail
        if ($this->email->send()) {
            echo '';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|
        valid_email');
        if ($this->form_validation->run() == true) {
            $data['title'] = 'Forgot Password';
            //$this->load->view('templates/auth_header', $data);
            // /$this->load->view('v_forgot');
            redirect('auth');
            //$this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $users = $this->db->get_where('users', ['user_email' => $email])->row_array();

            if ($users) {
                $otp = rand(111111, 999999);
                $user_otp = [
                    'otp_val' => $otp,
                    'updated_date' => 'now()'
                ];
                // print_r($users);
                $this->db->where('user_email', $email);
                $this->db->update('users', $user_otp);
                $this->sendMail($email, $otp);
                $this->session->set_userdata('user_email', $email);
                // $a = $this->session->userdata('user_email');
                // echo $a . '<br>';
                // echo $this->session->userdata('user_email');
                // die();
                $this->session->set_flashdata('msg', '<div class="alert
                alert-success" role="alert">Please Check Your Email To Reset Your Password');
                $this->load->view('change_password');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert
                alert-danger" role="alert">Email is not registered or acitivated!');
                redirect('auth');
            }
        }
    }


    public function change_pass()
    {
        $email = $this->session->userdata('user_email');

        $users = $this->db->get_where('users', ['user_email' => $email])->row_array();
        // echo $email;
        // print_r($users);
        // die();
        $otp_post = $this->input->post('otp_val');
        if ($otp_post == $users['otp_val']) {
            $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $user_pass = [
                'user_password' => $new_password,
                'otp_val' => ''
            ];
            $this->db->where('user_email', $email);
            $this->db->update('users', $user_pass);

            redirect('auth');
        }
    }



    // public function resetPassword()
    // {
    //     $email = $this->input->get('email');
    //     $otp   = $this->input->get('otp_val');

    //     $users = $this->db->get_where('users', ['email' => $email])->row_array();

    //     if ($users) {
    //     } else {
    //         $this->session->set_flashdata('msg', '<div class="alert
    //         alert-danger" role="alert">Reset Password Failed!.</div>');
    //         redirect('auth');
    //     }
    // }
}
