<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Pagination extends CI_Model
{

	//ambil data mahasiswa dari database
	function get_mahasiswa_list($limit, $start)
	{
		$query = $this->db->get('vw_list_candidate', $limit, $start)->result_array();
		return $query;
	}
}
