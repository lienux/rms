<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	// public function get($id=null){
	// 	$iduser = $this->session->userdata('iduser');
	// 	$this->db->select('*');
	// 	$this->db->from('tb_user');
	// 	if($id != null){
	// 		$this->db->where('user_id =' .$id);
	// 	}else{
	// 		$this->db->where('user_id =' .$iduser);
	// 	}
	// 	return $this->db->get()->result_array();
 //    }

    public function get($id=null){
		$this->db->select('*');
		$this->db->from('tb_user');
		// $this->db->order_by('name','asc');
		if($id != null){
			$this->db->where('user_id = '.$id);
		}
		return $this->db->get()->result_array();
    }

    public function jml(){
		$this->db->select('*');
		$this->db->from('tb_user');
		return $this->db->get()->num_rows();
    }

  //   public function getAll(){
		// $this->db->select('*');
		// $this->db->from('tb_user');
		// return $this->db->get()->result_array();
  //   } 

	public function update($id=null){		
		if ($id==null) {
			$ID = $iduser = $this->session->userdata('iduser');
		}else{
			$ID = $id;
		}

		$this->db->select('*');
		$this->db->from('tb_user');		
		$this->db->where('user_id', $ID);		
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$tgl_edit = $q['tgl_edit'];
			$password_lama = $q['password'];
		}

		$password 				= $this->input->post('password');
		$tgl					= date('Y-m-d H:i:s');
		$ip_address				= $this->input->ip_address();

		$data = array(
			'password' 			=> $password,
			'tgl_edit' 			=> $tgl_edit.' ###'.$password_lama.'='.$tgl.'by'.$ip_address
			);		

		$this->db->where('user_id', $ID);
		$res = $this->db->update('tb_user', $data);
		return $res;			
	}

//================================ADMINISTRATOR====================================== 
//================================ADMINISTRATOR======================================
//================================ADMINISTRATOR======================================
//================================ADMINISTRATOR======================================
	public function adm_get(){
		$isi = array(0,1,2);
		$this->db->select('*')
			 ->from('tb_user')
			 ->where_in('user_type', $isi)
			 ->order_by('name', 'asc');
		return $this->db->get()->result_array();
	} 
}
