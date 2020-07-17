<?php
require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

class candidate extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    
    function index_post()
    {       
            // $id = (false) ? $this->input->post('candidate_id') : null ;
            // $action = (false) ? $this->input->post('action') : null ;
            // $user_id = (false) ? $this->input->post('user_id') : null ;
            // $name = (false) ? $this->input->post('name') : null ;
            // $email = (false) ? $this->input->post('email') : null ;
            // $b_place = (false) ? $this->input->post('birth_place') : null ;
            // $nik = (false) ? $this->input->post('nik') : null ;
            // $no_tlp = (false) ? $this->input->post('no_tlp') : null ;
            // $no_hp = (false) ? $this->input->post('no_hp') : null ;
            // $b_date = (false) ? $this->input->post('birth_date') : null ;
            // $img_path = (false) ? $this->input->post('img_path') : null ;
            // $address = (false) ? $this->input->post('address') : null ;
            // $gender_id = (false) ? $this->input->post('gender_id') : null ;
            // $religion_id = (false) ? $this->input->post('religion_id') : null ;
            // $result_id = (false) ? $this->input->post('result_id') : null ;
            // $ins_unit_id_take = (false) ? $this->input->post('ins_unit_id_take') : null ;
            // $adm_user = (false) ? $this->input->post('admin') : null ;


            

            // $id = null;
            // $action = null;
            // $user_id = null;
            // $name = null;
            // $email = null;
            // $b_place = null ;
            // $nik = null;
            // $no_tlp = null ;
            // $no_hp = null;
            // $b_date = null ;
            // $img_path = null ;
            // $address = null ;
            // $gender_id = null ;
            // $religion_id = null ;
            // $result_id = null ;
            // $ins_unit_id_take = null ;
            // $adm_user = null ;


            // $id = (is_null($id)) ? $this->input->post('candidate_id') : null ;
            // $action = (is_null($action)) ? $this->input->post('action') : null ;
            // $user_id = (is_null($user_id)) ? $this->input->post('user_id') : null ;
            // $name = (is_null($name)) ? $this->input->post('name') : null ;
            // $email = (is_null($email)) ? $this->input->post('email') : null ;
            // $b_place = (is_null($b_place)) ? $this->input->post('birth_place') : null ;
            // $nik = (is_null($nik)) ? $this->input->post('nik') : null ;
            // $no_tlp = (is_null($no_tlp)) ? $this->input->post('no_tlp') : null ;
            // $no_hp = (is_null($no_hp)) ? $this->input->post('no_hp') : null ;
            // $b_date = (is_null($b_date)) ? $this->input->post('birth_date') : null ;
            // $img_path = (is_null($img_path)) ? $this->input->post('img_path') : null ;
            // $address = (is_null($address)) ? $this->input->post('address') : null ;
            // $gender_id = (is_null($gender_id)) ? $this->input->post('gender_id') : null ;
            // $religion_id = (is_null($religion_id)) ? $this->input->post('religion_id') : null ;
            // $result_id = (is_null($result_id)) ? $this->input->post('result_id') : null ;
            // $ins_unit_id_take = (is_null($ins_unit_id_take)) ? $this->input->post('ins_unit_id_take') : null ;
            // $adm_user = (is_null($adm_user)) ? $this->input->post('admin') : null ;

            $id = $this->input->post('candidate_id');
            $action = $this->input->post('action');
            $user_id = $this->input->post('user_id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $b_place = $this->input->post('birth_place');
            $nik = $this->input->post('nik');
            $no_tlp = $this->input->post('no_tlp');
            $no_hp = $this->input->post('no_hp');
            $b_date = $this->input->post('birth_date');
            $img_path = $this->input->post('img_path');
            $address = $this->input->post('address');
            $gender_id = $this->input->post('gender_id');
            $religion_id = $this->input->post('religion_id');
            $result_id = $this->input->post('result_id');
            $ins_unit_id_take = $this->input->post('ins_unit_id_take');
            $adm_user = $this->input->post('admin');

            if ($action == 'D') {
                $sql = " select * from f_crud_candidate
                (
                    '" . $action . "',
                    $id,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            } else {
                $sql = " select * from f_crud_candidate
                (
                    '" . $action . "',
                    $id,
                    $user_id,
                    '" . $name . "',
                    '" . $email . "',
                    '" . $b_place . "',
                    '" . $nik . "',
                    '" . $no_tlp . "',
                    '" . $no_hp . "',
                    '" . $b_date . "',
                    '" . $img_path . "',
                    '" . $address . "',
                    '" . $adm_user . "',
                    $gender_id ,
                    $religion_id,
                    $result_id,
                    $ins_unit_id_take
                ); ";
                $data = $this->db->query($sql)->row_array();
                $this->response([
                    'status' => $data['oint_res'],
                    'message' => $data['ostr_msg']
                ], REST_Controller::HTTP_OK);
            }
                
}
}