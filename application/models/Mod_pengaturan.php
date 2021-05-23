<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengaturan extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	function query()
	{
		$query = $this->db->select('*')
		->from('setting');

		return $query;
	}

	public function get()
	{
		$query = $this->query();
		
		return $query->get()->result_array();
    }

	public function detail($id)
	{
		$query = $this->query()
		->where('id',$id);
		
		return $this->db->get()->result_array();
    }

    public function jml()
    {
    	return $this->query()->get()->num_rows();
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
