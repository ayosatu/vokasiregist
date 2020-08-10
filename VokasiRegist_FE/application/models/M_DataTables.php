<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_DataTables extends CI_Model
{
	public function getData($table, $field, $keyword, $limit, $totalRow)
	{
		$this->db->like($field, $keyword);
		$sql = $this->db->get($table, $limit, $totalRow)->result_array();
		return $sql;
	}

	//Return Integer atau Numeric
	public function getCountData($table, $field, $keyword)
	{
		$this->db->like($field, $keyword);
		return $this->db->count_all_results($table);
	}
}
