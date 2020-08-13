<?php

defined('BASEPATH') or exit();

class M_AjaxGlobal extends CI_Model
{

	function getData($table)
	{
		return $this->db->get($table)->result_array();
	}
}
