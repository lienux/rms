<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_rambu extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get(){

		$this->db->select('a.*,b.name as kondisi_rambu,c.name as jenis_rambu')
		->from('tb_rambu a')
		->join('kondisi_rambu b', 'a.kondisi_rambu_id = b.id')
		->join('jenis_rambu c', 'a.jenis_rambu_id = c.id');
		
		return $this->db->get()->result_array();
    }

	public function detail($id){

		$this->db->select('*')
		->from('tb_jalan')
		->where('a.id',$id);
		
		return $this->db->get()->result_array();
    }

    public function simpan($data)
    {
    	$date = date('Y-m-d');
    	$create_at = array('create_at'=>$date);
    	$data = $data+$create_at;
    	
		$res = $this->db->insert('tb_rambu',$data);
		return $res;			
	}

	public function update($id,$data)
	{
		$date = date('Y-m-d');
    	$update_at = array('update_at'=>$date);
    	$data = $data+$update_at;

		$res = $this->db->where('id',$id)
		->update('tb_rambu',$data);
		return $res;			
	}

	public function hapus($id){
		$this->db->where('id',$id); 	
		$res = $this->db->delete('tb_rambu');
		return $res;
	}

}
