<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kasbon extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get(){

		$this->db->select('a.*,b.nama as karyawan,c.nama as jabatan')
		->from('pengajuan_kasbon a')
		->join('tb_karyawan b','a.karyawan_id = b.id','inner')
		->join('jabatan c','a.jabatan_id = c.id','inner');
		
		return $this->db->get()->result_array();
    }

	public function detail($id){

		$this->db->select('a.*,b.nama as karyawan,c.nama as jabatan')
		->from('pengajuan_kasbon a')
		->join('tb_karyawan b','a.karyawan_id = b.id','inner')
		->join('jabatan c','a.jabatan_id = c.id','inner')
		->where('a.id',$id);
		
		return $this->db->get()->result_array();
    }

    public function getbyuser($user_id){
    	
    	$this->db->select('a.*,b.nama as karyawan,c.nama as jabatan')
		->from('pengajuan_kasbon a')
		->join('tb_karyawan b','a.karyawan_id = b.id','inner')
		->join('jabatan c','a.jabatan_id = c.id','inner')
		->where('a.user_id',$user_id);
		
		return $this->db->get()->result_array();
    }
	



    
    public function getBYkontrak($kontrak_id=null){
		$this->db->select('*')
				 ->from('tb_pengemudi')
				 ->where('kontrak_id =' .$kontrak_id)
				 ->where('hapus',0);
		return $this->db->get()->result_array();
    }

    public function jumlah(){
    	$level = $this->session->userdata('level');
    	$iduser = $this->session->userdata('iduser');

    	if ($level==0) {
    		$kontrak_id = get_cookie('kontrak_id');
	    	$this->db->select('*')
					 ->from('tb_pengemudi')
					 ->where('kontrak_id =' .$kontrak_id)
					 ->where('hapus',0);
			return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    	}
    	
    	elseif ($level==1) {
    		$this->db->select('a.*,b.bptd_id')
				 ->from('tb_pengemudi a')
				 ->join('tb_user b', 'a.user_id = b.id', 'inner')
				 ->where('b.bptd_id =' .$iduser)
				 ->where('a.hapus',0);
			return $this->db->get()->num_rows();
    	}
    }

  //   public function getJML(){
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_pengemudi');
		// $this->db->where('user_id =' .$iduser);
		// return $this->db->get()->num_rows();
  //   }

    public function getJMLbyKontrak($kontrak_id=null){
		$this->db->select('*')
			 	 ->from('tb_pengemudi')
			 	 ->where('kontrak_id =' .$kontrak_id)
			 	 ->where('hapus',0);
		return $this->db->get()->num_rows();
    }

    public function save(){
		$iduser 				= $this->session->userdata('iduser');
		// $bptd_id 				= $this->session->userdata('bptd_id');
		$ip_address				= $this->input->ip_address();

		$nama 					= $this->input->post('nama');
		$kontrak_id				= $this->input->post('kontrak_id');
		$sim					= $this->input->post('sim');
		$masa_sim				= $this->input->post('masa_sim');
		$telp					= $this->input->post('telp');
		$tgl 					= date('Y-m-d H:i:s');

		$config['upload_path']		= './assets/images/pengemudi/';
		$config['allowed_types']	= 'jpg|jpeg|png|gif';
		
    	$this->load->library('upload',$config);

    	if($this->upload->do_upload('foto_pengemudi')){
    		$data1 = $this->upload->data();
    		$foto_pengemudi = $data1['file_name'];
    	}
    	else{
    		$foto_pengemudi = 'image.png';
    	}
    	if($this->upload->do_upload('foto_sim')){
    		$data2 = $this->upload->data();
    		$foto_sim = $data2['file_name'];
    	}else{
    		$foto_sim = 'image.png';
    	}
    	if($this->upload->do_upload('foto_ktp')){
    		$data3 = $this->upload->data();
    		$foto_ktp = $data3['file_name'];
    	}else{
    		$foto_ktp = 'image.png';
    	}

		$data = array(
			'user_id' 			=> $iduser,
			// 'bptd_id' 			=> $bptd_id,
			'kontrak_id' 		=> $kontrak_id,
			'nama' 				=> $nama,	
			'no_sim'			=> $sim,
			'masa_sim'			=> $masa_sim,
			'telp'	 			=> $telp,
			'foto_pengemudi' 	=> $foto_pengemudi,
			'foto_sim' 			=> $foto_sim,
			'foto_ktp' 			=> $foto_ktp,
			'ip_address' 		=> $ip_address,
			'date' 				=> $tgl
			);
		$res = $this->db->insert('tb_pengemudi',$data);
		return $res;			
	}


	public function update($id){
		$this->db->select('*');
		$this->db->from('tb_pengemudi');
		$this->db->where('id', $id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$fPengemudi = $q['foto_pengemudi'];
			$fSim = $q['foto_sim'];
			$fKtp = $q['foto_ktp'];
			$tgl_edit = $q['tgl_edit'];
		}

		$iduser 		= $this->session->userdata('iduser');
		// $bptd_id 		= $this->session->userdata('bptd_id');
		$ip_address		= $this->input->ip_address();
		
		$kontrak_id				= $this->input->post('kontrak_id');
		$nama 					= $this->input->post('nama');
		$sim					= $this->input->post('sim');
		$masa_sim				= $this->input->post('masa_sim');
		$telp					= $this->input->post('telp');
		$tgl 					= date('Y-m-d H:i:s');

		$config['upload_path']		= './assets/images/pengemudi/';
		$config['allowed_types']	= 'jpg|jpeg|png|gif';
		
    	$this->load->library('upload',$config);

    	if($this->upload->do_upload('foto_pengemudi')){
    		$data1 = $this->upload->data();
    		$foto_pengemudi = $data1['file_name'];
    	}
    	else{
    		$foto_pengemudi = $fPengemudi;
    	}
    	if($this->upload->do_upload('foto_sim')){
    		$data2 = $this->upload->data();
    		$foto_sim = $data2['file_name'];
    	}
    	else{
    		$foto_sim = $fSim;
    	}
    	if($this->upload->do_upload('foto_ktp')){
    		$data3 = $this->upload->data();
    		$foto_ktp = $data3['file_name'];
    	}
    	else{
    		$foto_ktp = $fKtp;
    	}

		$data = array(
			// 'bptd_id' 			=> $bptd_id,
			'kontrak_id' 		=> $kontrak_id,
			'nama' 				=> $nama,	
			'no_sim'			=> $sim,
			'telp'	 			=> $telp,
			'masa_sim'			=> $masa_sim,
			'foto_pengemudi' 	=> $foto_pengemudi,
			'foto_sim' 			=> $foto_sim,
			'foto_ktp' 			=> $foto_ktp,
			'tgl_edit' 			=> $tgl_edit.'###'.$tgl.','.$iduser.','.$ip_address
			);
		$res = $this->db->where('id', $id);
		$res = $this->db->update('tb_pengemudi', $data);
		return $res;			
	}

	public function delete($id){
		$data = array(
			'hapus' => 1
			);
		$res = $this->db->where('id',$id)
						->update('tb_pengemudi', $data);
		return $res;
	}

	// public function delete($id){
	// 	$this->db->where('id',$id); 	
	// 	$res = $this->db->delete('tb_pengemudi');
	// 	return $res;
	// }
//=====================================CABANG=====================================







//=====================================BPTD=====================================
//=====================================BPTD=====================================
//=====================================BPTD=====================================
	public function bptd_get($id=null){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('a.*,b.user_id,b.name,c.tglkontrak')
				 ->from('tb_pengemudi a')
				 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
				 ->join('tb_kontrak c', 'c.id = a.kontrak_id')
				 ->where('b.bptd_id', $iduser);
		return $this->db->get()->result_array();
    }

    public function bptd_getBYkontrak($kontrak_id=null){
		$this->db->select('*')
			 ->from('tb_pengemudi')
			 ->where('kontrak_id', $kontrak_id) //ambil data berdasarkan kontrak_id
			 ->where('hapus', 0);		
		return $this->db->get()->result_array();
    }
//=====================================BPTD=====================================






//=====================================NASIONAL=====================================
//=====================================NASIONAL=====================================
//=====================================NASIONAL=====================================
	public function nasional_get($id=null){
		$this->db->select('a.*,b.name,c.tglkontrak')
			 ->from('tb_pengemudi a')
			 ->join('tb_user b', 'b.user_id = a.user_id')
			 ->join('tb_kontrak c', 'c.id = a.kontrak_id')
			 ->where('a.hapus', 0)
			 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }  

    public function nasional_getBYkontrak($kontrak_id=null){
		$this->db->select('*')
			 ->from('tb_pengemudi')
			 ->where('kontrak_id', $kontrak_id) //ambil data berdasarkan kontrak_id
			 ->where('hapus', 0);		
		return $this->db->get()->result_array();
    }
//=====================================NASIONAL=====================================







//=====================================ADMINISTRATOR=====================================
//=====================================ADMINISTRATOR=====================================
//=====================================ADMINISTRATOR=====================================
//=====================================ADMINISTRATOR=====================================
	public function adm_get($id=null){
		$this->db->select('a.*,b.name,c.tglkontrak')
			 ->from('tb_pengemudi a')
			 ->join('tb_user b', 'b.user_id = a.user_id')
			 ->join('tb_kontrak c', 'c.id = a.kontrak_id')
			 ->where('a.hapus', 0)
			 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }  

  //   public function adm_getBYkontrak($kontrak_id=null){
		// $this->db->select('*')
		// 	 ->from('tb_pengemudi')
		// 	 ->where('kontrak_id', $kontrak_id) //ambil data berdasarkan kontrak_id
		// 	 ->where('hapus', 0);		
		// return $this->db->get()->result_array();
  //   }
//=====================================ADMINISTRATOR=====================================

}
