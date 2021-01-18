<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_login extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function get($where=''){
		$data = $this->db->query('SELECT * FROM tb_user '.$where);
	    return $data->result_array();
    }
}