<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_produksi extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get(){

		$this->db->select('*')
		->from('estimasi_biaya');
				
		return $this->db->get()->result_array();
    }

	public function detail($id){

		$this->db->select('*')
		->from('estimasi_biaya')
		->where('id',$id);
		
		return $this->db->get()->result_array();
    }

    public function getbyuser($user_id){
    	
    	$this->db->select('*')
		->from('estimasi_biaya')
		->where('user_id',$user_id);
		
		return $this->db->get()->result_array();
    }
	
	// public function get($id=null){
		
	// 	$level = $this->session->userdata('level');

	// 	$this->db->select('*')
	// 	->from('tb_coasting');

	// 	if ($level==0) {	
	// 		$user_id = $this->session->userdata('user_id');		
	// 		if($id != null){
	// 			$this->db->where('id =' .$id);
	// 		}else{
	// 			$this->db->where('user_id =' .$user_id);
	// 		}
	// 	}else{
	// 		if($id != null){
	// 			$this->db->where('id =' .$id);
	// 		}else{
	// 			// otw
	// 		}
	// 	}
		
	// 	return $this->db->get()->result_array();
 //    }

    public function dataTerakhir(){
    	$iduser = $this->session->userdata('iduser');
		$this->db->select('*')
		 		 ->from('tb_kontrak')
		 		 ->where('user_id =' .$iduser)
		 		 ->where('hapus',0)
		 		 ->order_by('id', 'desc')
		 		 ->limit(1);
		return $this->db->get()->result_array();
    }

    public function cekdata($table,$where){		
		return $this->db->get_where($table,$where);
	}

    public function save(){
		$iduser 		= $this->session->userdata('iduser');
		$bptd_id 		= $this->session->userdata('bptd_id');
		$ip_address		= $this->input->ip_address();

		$no_kontrak 	= $this->input->post('no_kontrak');
		$alamat 		= $this->input->post('alamat');
		$gm				= $this->input->post('gm');
		$wa				= $this->input->post('wa');
		$telp			= $this->input->post('telp');
		$email			= $this->input->post('email');
		$tglkontrak		= $this->input->post('tglkontrak');
		$tgl 			= date('Y-m-d H:i:s');
		
		$data = array(
			'user_id' 		=> $iduser,
			'bptd_id' 		=> $bptd_id,
			'no_kontrak' 	=> $no_kontrak,
			'alamat' 		=> $alamat,	
			'pimpinan'		=> $gm,
			'wa' 			=> $wa,
			'telp'			=> $telp,
			'email'			=> $email,
			'tglkontrak' 	=> $tglkontrak,
			'ip_address' 	=> $ip_address,
			'date' 			=> $tgl
			);
		$res = $this->db->insert('tb_kontrak',$data);
		return $res;	    			
	}

	public function update($id){
		$this->db->select('*');
		$this->db->from('tb_kontrak');
		$this->db->where('id', $id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$tgl_edit = $q['tgl_edit'];
		}

		$iduser 		= $this->session->userdata('iduser');
		$bptd_id 		= $this->session->userdata('bptd_id');
		$ip_address		= $this->input->ip_address();
		
		$no_kontrak 	= $this->input->post('no_kontrak');
		$alamat 		= $this->input->post('alamat');
		$gm				= $this->input->post('gm');
		$wa				= $this->input->post('wa');
		$telp			= $this->input->post('telp');
		$email			= $this->input->post('email');
		$tglkontrak		= $this->input->post('tglkontrak');
		$tgl 			= date('Y-m-d H:i:s');
		
		$data = array(
			'bptd_id' 		=> $bptd_id,
			'no_kontrak' 	=> $no_kontrak,
			'alamat' 		=> $alamat,	
			'pimpinan'		=> $gm,
			'wa' 			=> $wa,
			'telp'			=> $telp,
			'email'			=> $email,
			'tglkontrak' 	=> $tglkontrak,
			'tgl_edit' 		=> $tgl_edit.'###'.$tgl.','.$iduser.','.$ip_address
			);

		$res = $this->db->where('id', $id); 
		$res = $this->db->update('tb_kontrak', $data);
		return $res;			
	} 

	public function delete($id){
		$data = array(
			'hapus' => 1
			);
		$res = $this->db->where('id',$id)
						->update('tb_kontrak', $data);
		return $res;
	}

	// public function delete($id){
	// 	$this->db->where('id',$id); 	
	// 	$res = $this->db->delete('tb_kontrak');
	// 	return $res;
	// }  
// ============================CABANG======================================





// ============================BPTD======================================
// ============================BPTD======================================
// ============================BPTD======================================
// ============================BPTD======================================
// ============================BPTD======================================
// ============================BPTD======================================
	public function bptd_get(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('a.*,b.user_id,b.name')
				 ->from('tb_kontrak a')
				 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
				 ->where('b.bptd_id',$iduser);
				 // ->order_by('a.id', 'desc');
	    // $this->db->limit(1);		
		return $this->db->get()->result_array();
    }

    public function bptd_getIDverifikasi($kontrak_id){
		$this->db->select('verifikasi')
				 ->from('tb_kontrak')
				 ->where('id',$kontrak_id);	
		return $this->db->get()->result_array();
    }

    public function bptd_dataTerakhirBYcabang($cabang_id=null){
		$this->db->select('*');
		$this->db->from('tb_kontrak');
		$this->db->where('user_id =' .$cabang_id); //ambil data berdasarkan cabang_id atau user_id cabang
		$this->db->order_by('id', 'desc'); //urutkan data dari yg terakhir
	    $this->db->limit(1); //ambil satu saja
		return $this->db->get()->result_array();
    }

    public function bptd_verifikasi($kontrak_id){
		$this->db->select('tgl_edit')
				 ->from('tb_kontrak')
				 ->where('id', $kontrak_id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$tgl_edit = $q['tgl_edit'];
		}

		$ip_address		= $this->input->ip_address();
		$tgl 			= date('Y-m-d H:i:s');
		
		$data = array(
			'verifikasi' 	=> 1,
			'tgl_edit' 		=> $tgl_edit.'###ver='.$tgl.'#ip='.$ip_address
			);
		$res = $this->db->where('id', $kontrak_id);
		$res = $this->db->update('tb_kontrak', $data);
		return $res;			
	}
// ============================BPTD======================================










// ============================NASIONAL======================================
// ============================NASIONAL======================================
// ============================NASIONAL======================================
// ============================NASIONAL======================================
// ============================NASIONAL======================================
// ============================NASIONAL======================================
	public function nasional_get(){
		$this->db->select('a.user_id as cabang_id,a.name,b.*')
				 ->from('tb_user a')
				 ->join('tb_kontrak b', 'b.user_id = a.user_id', 'left')
				 ->where('a.bptd_id !=',0)
				 ->order_by('a.name', 'asc');
	    // $this->db->limit(1);		
		return $this->db->get()->result_array();
    }

    public function nasional_getIDverifikasi($kontrak_id){
		$this->db->select('verifikasi')
				 ->from('tb_kontrak')
				 ->where('id',$kontrak_id);	
		return $this->db->get()->result_array();
    }

    public function nasional_dataTerakhirBYcabang($cabang_id=null){
		$this->db->select('*');
		$this->db->from('tb_kontrak');
		$this->db->where('user_id =' .$cabang_id); //ambil data berdasarkan cabang_id atau user_id cabang
		$this->db->order_by('id', 'desc'); //urutkan data dari yg terakhir
	    $this->db->limit(1); //ambil satu saja
		return $this->db->get()->result_array();
    }

    public function nasional_verifikasi($kontrak_id){
		$this->db->select('tgl_edit')
				 ->from('tb_kontrak')
				 ->where('id', $kontrak_id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$tgl_edit = $q['tgl_edit'];
		}

		$ip_address		= $this->input->ip_address();
		$tgl 			= date('Y-m-d H:i:s');
		
		$data = array(
			'verifikasi' 	=> 1,
			'tgl_edit' 		=> $tgl_edit.'###ver='.$tgl.'#ip='.$ip_address
			);
		$res = $this->db->where('id', $kontrak_id);
		$res = $this->db->update('tb_kontrak', $data);
		return $res;			
	}
// ============================NASIONAL======================================





// ============================ADMINISTRATOR======================================
// ============================ADMINISTRATOR======================================
// ============================ADMINISTRATOR======================================
// ============================ADMINISTRATOR======================================
// ============================ADMINISTRATOR======================================
// ============================ADMINISTRATOR======================================
	public function adm_get(){
		$this->db->select('a.user_id as cabang_id,a.name,b.*')
				 ->from('tb_user a')
				 ->join('tb_kontrak b', 'b.user_id = a.user_id', 'left')
				 ->where('a.bptd_id !=',0)
				 ->where('b.hapus',0)
				 ->order_by('a.name', 'asc');
	    // $this->db->limit(1);		
		return $this->db->get()->result_array();
    }

    public function adm_jml(){
		$this->db->select('a.user_id as cabang_id,a.name,b.*')
				 ->from('tb_user a')
				 ->join('tb_kontrak b', 'b.user_id = a.user_id', 'left')
				 ->where('a.bptd_id !=',0)
				 ->where('b.hapus',0)
				 ->order_by('a.name', 'asc');
		return $this->db->get()->num_rows();
    }
// ============================ADMINISTRATOR======================================

}
