<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class choose_major extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    
    function index_post()
    {     

            $id = $this->input->post('c_choose_major_id');
            $action = $this->input->post('action');
             $majors_id = $this->input->post('majors_id');
            $cc_order = $this->input->post('cc_order');
            $is_take = $this->input->post('is_take');
            $adm_user = $this->input->post('admin');
            $candidate_id = ($this->input->post('candidate_id') == NULL) ? NULL : $this->input->post('candidate_id') ;
           

                $sql = " select * from f_crud_c_choose_major
                (
                    '" . $action . "',
                    $id,
                    $candidate_id,
                    $majors_id,
                    $cc_order,
                    '" . $is_take . "',
                    '" . $adm_user . "'
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            
                
    }
}