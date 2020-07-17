<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class c_document_list extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $action = $this->input->post('action');
        $doc_list_id = $this->input->post('emp_doc_list_id4');
        $c_id = ($this->input->post('candidate_id') == NULL) ? NULL : $this->input->post('candidate_id') ;
        $path = $this->input->post('path');
        $adm_user = $this->input->post('created');
        $code = $this->input->post('code');
        $description = $this->input->post('description');

            $sql = " select * from f_crud_c_document_list
            (
                '" . $action . "',
                $doc_list_id,
                $c_id,
                '" . $path . "',
                '" . $code . "',
                '" . $description . "',
                '" . $adm_user . "'
            ); ";

            $data = $this->db->query($sql)->row_array();
            $this->response([
                'status' => $data['oint_res'],
                'message' => $data['ostr_msg']
            ], REST_Controller::HTTP_OK);
    }
}
