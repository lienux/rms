<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_stok extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get($id=null){
		$level = $this->session->userdata('level');

		$this->db->select('*')
		->from('tb_stok');

		if ($level==0) {

			$user_id = $this->session->userdata('user_id');

			if ($id != null) {
				$this->db->where('id',$id);
			}else{
				$this->db->where('user_id',$user_id);
			}
		}else{
			if ($id != null) {
				$this->db->where('id',$id);
			}else{
				// otw
			}
		}
		
		return $this->db->get()->result_array();
    }

    public function getBYkontrak($kontrak_id=null){
		$this->db->select('*')
				 ->from('tb_trayek')
				 ->where('kontrak_id', $kontrak_id) //ambil data berdasarkan kontrak_id	
				 ->where('hapus',0);	
		return $this->db->get()->result_array();
    }

    public function jml($kontrak_id=null){
		$this->db->select('*')
				 ->from('tb_trayek')
				 ->where('kontrak_id =' .$kontrak_id)
				 ->where('hapus',0);
		return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    }

    public function jumlah(){
    	$level = $this->session->userdata('level');
    	$iduser = $this->session->userdata('iduser');

    	if ($level==0) {
    		$kontrak_id = get_cookie('kontrak_id');
	    	$this->db->select('*')
					 ->from('tb_trayek')
					 ->where('kontrak_id =' .$kontrak_id)
					 ->where('hapus',0);
			return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    	}
    	
    	elseif ($level==1) { 
			$this->db->select('a.*,b.bptd_id')
				 ->from('tb_trayek a')
				 ->join('tb_user b', 'a.user_id = b.id', 'inner')
				 ->where('b.bptd_id =' .$iduser)
				 ->where('a.hapus',0);
			return $this->db->get()->num_rows();
    	}
    }

  //   public function jml(){
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_trayek');
		// $this->db->where('user_id =' .$iduser);
		// return $this->db->get()->num_rows();
  //   }

    public function save(){
		$iduser 				= $this->session->userdata('iduser');
		$bptd_id 				= $this->session->userdata('bptd_id');
		$ip_address				= $this->input->ip_address();

		$kontrak_id 			= $this->input->post('kontrak_id');
		$trayek 				= $this->input->post('trayek');
		$jarak					= $this->input->post('jarak');
		$ritase_harian			= $this->input->post('ritase_harian');
		$ritase_bulanan 		= $this->input->post('ritase_bulanan');
		$ritase_tahun			= $this->input->post('ritase_tahun');
		$koordinat_awal			= $this->input->post('koordinat_awal');
		$koordinat_akhir		= $this->input->post('koordinat_akhir');
		$jadwal_berangkat		= $this->input->post('jadwal_berangkat');
		$jadwal_datang			= $this->input->post('jadwal_datang');
		$tgl 					= date('Y-m-d H:i:s');
		
		$data = array(
			'user_id' 			=> $iduser,
			'bptd_id' 			=> $bptd_id,
			'kontrak_id' 		=> $kontrak_id,
			'trayek' 			=> $trayek,	
			'jarak'				=> $jarak,
			'ritase_harian' 	=> $ritase_harian,
			'ritase_bulanan' 	=> $ritase_bulanan,
			'ritase_tahun'		=> $ritase_tahun,
			'koordinat_awal'	=> $koordinat_awal,
			'koordinat_akhir' 	=> $koordinat_akhir,
			'jadwal_berangkat' 	=> $jadwal_berangkat,
			'jadwal_datang' 	=> $jadwal_datang,
			'ip_address' 		=> $ip_address,
			'date' 				=> $tgl
			);
		$res = $this->db->insert('tb_trayek',$data);
		return $res;
	    			
	}

	public function update($id){
		$this->db->select('*');
		$this->db->from('tb_trayek');
		$this->db->where('id', $id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$tgl_edit = $q['tgl_edit'];
		}

		$iduser 		= $this->session->userdata('iduser');
		$bptd_id 		= $this->session->userdata('bptd_id');
		$ip_address		= $this->input->ip_address();
		
		$kontrak_id 			= $this->input->post('kontrak_id');
		$trayek 				= $this->input->post('trayek');
		$jarak					= $this->input->post('jarak');
		$ritase_harian			= $this->input->post('ritase_harian');
		$ritase_bulanan 		= $this->input->post('ritase_bulanan');
		$ritase_tahun			= $this->input->post('ritase_tahun');
		$koordinat_awal			= $this->input->post('koordinat_awal');
		$koordinat_akhir		= $this->input->post('koordinat_akhir');
		$jadwal_berangkat		= $this->input->post('jadwal_berangkat');
		$jadwal_datang			= $this->input->post('jadwal_datang');
		$tgl 					= date('Y-m-d H:i:s');
		
		$data = array(
			'bptd_id' 			=> $bptd_id,
			'kontrak_id' 		=> $kontrak_id,
			'trayek' 			=> $trayek,	
			'jarak'				=> $jarak,
			'ritase_harian' 	=> $ritase_harian,
			'ritase_bulanan' 	=> $ritase_bulanan,
			'ritase_tahun'		=> $ritase_tahun,
			'koordinat_awal'	=> $koordinat_awal,
			'koordinat_akhir' 	=> $koordinat_akhir,
			'jadwal_berangkat' 	=> $jadwal_berangkat,
			'jadwal_datang' 	=> $jadwal_datang,
			'tgl_edit' 			=> $tgl_edit.'###'.$tgl.','.$iduser.','.$ip_address
			);

		$res = $this->db->where('id', $id); 
		$res = $this->db->update('tb_trayek', $data);
		return $res;			
	}

	public function delete($id){
		$data = array(
			'hapus' => 1
			);
		$res = $this->db->where('id',$id)
						->update('tb_trayek', $data);
		return $res;
	}

	// public function delete($id){
	// 	$this->db->where('id',$id); 	
	// 	$res = $this->db->delete('tb_trayek');
	// 	return $res;
	// }

	// function fetch_data(){

	// 	$this->db->order_by("id", "DESC");

	// 	$query = $this->db->get("tb_trayek");

	// 	return $query->result();

 //   	}
// =======================CABANG==============================================
	




// ======================BPTD===========================================
// ======================BPTD===========================================
// ======================BPTD===========================================
	public function bptd_get(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('a.*,b.user_id,b.name,c.tglkontrak')
		         ->from('tb_trayek a')
		         ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
		         ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'inner')
		         ->where('b.bptd_id', $iduser);		
		return $this->db->get()->result_array();
    }

    public function bptd_getBYkontrak($kontrak_id=null){
		$this->db->select('*');
		$this->db->from('tb_trayek');		
		$this->db->where('kontrak_id =' .$kontrak_id); //ambil data berdasarkan kontrak_id		
		return $this->db->get()->result_array();
    }

    public function bptd_jml($kontrak_id=null){
		$this->db->select('*');
		$this->db->from('tb_trayek');
		$this->db->where('kontrak_id =' .$kontrak_id);
		return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    }
// ======================BPTD===========================================









// ======================NASIONAL===========================================
// ======================NASIONAL===========================================
// ======================NASIONAL===========================================
	public function nasional_get(){
		$this->db->select('a.*,b.name,c.tglkontrak')
				 ->from('tb_trayek a')
				 ->join('tb_user b', 'b.user_id = a.user_id', 'left')
				 ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'left')
				 ->where('b.bptd_id !=',0)
				 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }	

    public function nasional_getBYkontrak($kontrak_id){
		$this->db->select('*');
		$this->db->from('tb_trayek');		
		$this->db->where('kontrak_id =' .$kontrak_id); //ambil data berdasarkan kontrak_id		
		return $this->db->get()->result_array();
    }
// ======================NASIONAL===========================================







// ======================ADMINISTRATOR===========================================
// ======================ADMINISTRATOR===========================================
// ======================ADMINISTRATOR===========================================
	public function adm_get(){
		$this->db->select('a.*,b.name,c.tglkontrak')
				 ->from('tb_trayek a')
				 ->join('tb_user b', 'b.user_id = a.user_id', 'left')
				 ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'left')
				 // ->where('b.bptd_id !=',0) //jika bptd_id = 0 dia adalah user/cabang
				 ->where('a.hapus',0)
				 ->where('c.hapus',0)
				 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }

    public function adm_jml(){
		$this->db->select('a.*,b.name,c.tglkontrak')
				 ->from('tb_trayek a')
				 ->join('tb_user b', 'b.user_id = a.user_id', 'left')
				 ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'left')
				 // ->where('b.bptd_id !=',0) //jika bptd_id = 0 dia adalah user/cabang
				 ->where('a.hapus',0)
				 ->where('c.hapus',0);
		return $this->db->get()->num_rows();
    }	

  //   public function adm_getBYkontrak($kontrak_id){
		// $this->db->select('*');
		// $this->db->from('tb_trayek');		
		// $this->db->where('kontrak_id =' .$kontrak_id); //ambil data berdasarkan kontrak_id		
		// return $this->db->get()->result_array();
  //   }
// ======================ADMINISTRATOR===========================================
}
