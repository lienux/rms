<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_data_master extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get_list_status_jalan(){

		$this->db->select('*')
		
		->from('status_jalan');
		
		return $this->db->get()->result_array();
    }

    public function get_list_jenis_rambu(){

		$this->db->select('*')
		
		->from('jenis_rambu');
		
		return $this->db->get()->result_array();
    }

    public function get_list_kondisi_rambu(){

		$this->db->select('*')
		
		->from('kondisi_rambu');
		
		return $this->db->get()->result_array();
    }

}
