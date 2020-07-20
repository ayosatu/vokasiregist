<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class c_schools extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    
    function index_post()
    {     

            $action = $this->input->post('action');
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $accreditation = $this->input->post('accreditation');
            $address = $this->input->post('address');
            $no_tlp = $this->input->post('no_tlp');
            $no_hp = $this->input->post('no_hp');
            $no_fax = $this->input->post('no_fax');
            $adm = $this->input->post('adm');
            $candidate_id = ($this->input->post('candidate_id') == NULL) ? NULL : $this->input->post('candidate_id') ;
            $id = ($this->input->post('c_schools_id') == NULL) ? NULL : $this->input->post('c_schools_id') ;

                $sql = " select * from f_crud_c_schools
                (
                    '" . $action . "',
                    $id,
                    $candidate_id,
                    '" .$name . "',
                    '" .$accreditation . "',
                    '" . $address . "',
                    '" . $email . "',
                    '" .$no_tlp . "',
                    '" .$no_hp . "',
                    '" . $no_fax . "',
                    '" . $adm . "'
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            
                
    }
}