<?php
defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{
    var $API = 'http://localhost/VokasiRegist_BE/';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('v_register');
    }

    public function regist()
    {

        $fname = $this->input->post('user_full_name');
        $uname = $this->input->post('user_name');
        $uemail = $this->input->post('user_email');
        $nik = $this->input->post('nik');
        $password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);

        $this->form_validation->set_rules('user_full_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('user_name', 'Username', 'required|trim|is_unique[users.user_name]');
        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|is_unique[users.user_email]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[users.nik]');
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('password-confirm', 'Confirm Password', 'required|trim|matches[user_password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_register');
        } else {
            $data = [
                'action' => 'I',
                'user_id' => 0,
                'user_full_name' => $fname,
                'user_name' => $uname,
                'user_email' => $uemail,
                'nik' => $nik,
                'user_password' => $password
            ];

            $this->curl->simple_post($this->API . 'register', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success, User Has Been Created ! </div>');

            redirect('login');
        }
    }
}
