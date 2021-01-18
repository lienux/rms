<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dash extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	// public function get(){
	// 	$iduser = $this->session->userdata('iduser');
	// 	$this->db->select('a.*,b.user_id,b.name')
	// 	         ->from('tb_kontrak a')
	// 	         ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
	// 	         ->where('b.bptd_id', $iduser);		
	// 	return $this->db->get()->result_array();
 //    }

	// public function get(){
	// 	$iduser = $this->session->userdata('iduser');
	// 	$this->db->select('a.name,b.*')
	// 	         ->from('tb_user a')
	// 	         ->join('tb_kontrak b', 'b.user_id = a.user_id', 'left')
	// 	         ->where('a.bptd_id', $iduser);
	// 	         // ->where('b.verifikasi', '0');
	// 	return $this->db->get()->result_array();
 //    }



	 public function getIDkontrak(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('id');
		$this->db->from('tb_kontrak');
		$this->db->where('bptd_id', $iduser);
		$this->db->order_by('id', 'desc');
	    $this->db->limit(1);
		return $this->db->get()->result_array();
    }
	
  //   public function getCabangBYbptd(){ //ambil data user,kontrak berdasarkan bptd
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*, b.no_kontrak,b.alamat,b.pimpinan,b.wa,b.telp,b.email');
		// $this->db->from('tb_user a');
		// $this->db->join('tb_kontrak b', 'b.user_id = a.user_id', 'left');		
		// $this->db->where('a.bptd_id', $iduser);		
		// return $this->db->get()->result_array();
  //   }





    

    public function bptd_jmlCabang(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('bptd_id =' .$iduser);
		return $this->db->get()->num_rows();
    }

  //   public function bptd_jmlTrayek(){
		// $iduser = $this->session->userdata('iduser'); 
		// $this->db->select('a.*,b.bptd_id')
		// 	 ->from('tb_trayek a')
		// 	 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
		// 	 ->where('b.bptd_id =' .$iduser);
		// return $this->db->get()->num_rows();
  //   }

  //   public function bptd_jmlKendaraan(){
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*,b.bptd_id')
		// 	 ->from('tb_kendaraan a')
		// 	 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
		// 	 ->where('b.bptd_id =' .$iduser);
		// return $this->db->get()->num_rows();
  //   }

  //   public function bptd_jmlPengemudi(){
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*,b.bptd_id')
		// 	 ->from('tb_pengemudi a')
		// 	 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
		// 	 ->where('b.bptd_id =' .$iduser);
		// return $this->db->get()->num_rows();
  //   }








// =========================NASIONAL==============================================
// =========================NASIONAL==============================================
// =========================NASIONAL==============================================
    public function nasional_getIDkontrak(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('id');
		$this->db->from('tb_kontrak');
		$this->db->where('bptd_id', $iduser);
		$this->db->order_by('id', 'desc');
	    $this->db->limit(1);
		return $this->db->get()->result_array();
    }
	
  //   public function getCabangBYbptd(){ //ambil data user,kontrak berdasarkan bptd
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*, b.no_kontrak,b.alamat,b.pimpinan,b.wa,b.telp,b.email');
		// $this->db->from('tb_user a');
		// $this->db->join('tb_kontrak b', 'b.user_id = a.user_id', 'left');		
		// $this->db->where('a.bptd_id', $iduser);		
		// return $this->db->get()->result_array();
  //   }

    public function nasional_getUserBYbptd(){ //ambil data user berdasarkan bptd
		$iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');		
		$this->db->where('bptd_id', $iduser);		
		return $this->db->get()->result_array();
    }

  //   public function getUserBYbptd(){ //ambil data user berdasarkan bptd
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*, b.id,b.no_kontrak,b.alamat,b.pimpinan,b.wa,b.telp,b.email');
		// $this->db->from('tb_user a');
		// $this->db->join('tb_kontrak b', 'b.user_id = a.user_id', 'left');		
		// $this->db->where('b.bptd_id', $iduser);
		// $this->db->where('b.verifikasi', '0');	
		// // $this->db->order_by('b.id', 'desc');
		// // $this->db->group_by('a.user_id');
	 //    // $this->db->limit('b.id', 1);
		// return $this->db->get()->result_array();
  //   }
    public function nasional_jmlBptd(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user_type', 1);
		return $this->db->get()->num_rows();
    }

    public function nasional_jmlCabang(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user_type', 0);
		return $this->db->get()->num_rows();
    }

    public function nasional_jmlKontrak(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_kontrak');
		$this->db->where('hapus', 0);
		return $this->db->get()->num_rows();
    }

    public function nasional_jmlTrayek(){
		// $iduser = $this->session->userdata('iduser'); 
		$this->db->select('*');
		$this->db->from('tb_trayek');
		$this->db->where('hapus', 0);
		return $this->db->get()->num_rows();
    }

    public function nasional_jmlKendaraan(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_kendaraan');
		$this->db->where('hapus', 0);
		return $this->db->get()->num_rows();
    }

    public function nasional_jmlPengemudi(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_pengemudi');
		$this->db->where('hapus', 0);
		return $this->db->get()->num_rows();
    }





// =========================NASIONAL==============================================
// =========================NASIONAL==============================================
// =========================NASIONAL==============================================
    public function adm_getIDkontrak(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('id');
		$this->db->from('tb_kontrak');
		$this->db->where('bptd_id', $iduser);
		$this->db->order_by('id', 'desc');
	    $this->db->limit(1);
		return $this->db->get()->result_array();
    }
	
  //   public function getCabangBYbptd(){ //ambil data user,kontrak berdasarkan bptd
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*, b.no_kontrak,b.alamat,b.pimpinan,b.wa,b.telp,b.email');
		// $this->db->from('tb_user a');
		// $this->db->join('tb_kontrak b', 'b.user_id = a.user_id', 'left');		
		// $this->db->where('a.bptd_id', $iduser);		
		// return $this->db->get()->result_array();
  //   }

    public function adm_getUserBYbptd(){ //ambil data user berdasarkan bptd
		$iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');		
		$this->db->where('bptd_id', $iduser);		
		return $this->db->get()->result_array();
    }

  //   public function getUserBYbptd(){ //ambil data user berdasarkan bptd
		// $iduser = $this->session->userdata('iduser');
		// $this->db->select('a.*, b.id,b.no_kontrak,b.alamat,b.pimpinan,b.wa,b.telp,b.email');
		// $this->db->from('tb_user a');
		// $this->db->join('tb_kontrak b', 'b.user_id = a.user_id', 'left');		
		// $this->db->where('b.bptd_id', $iduser);
		// $this->db->where('b.verifikasi', '0');	
		// // $this->db->order_by('b.id', 'desc');
		// // $this->db->group_by('a.user_id');
	 //    // $this->db->limit('b.id', 1);
		// return $this->db->get()->result_array();
  //   }
    public function adm_jmlBptd(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user_type', 1);
		return $this->db->get()->num_rows();
    }

    public function adm_jmlCabang(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user_type', 0);
		return $this->db->get()->num_rows();
    }

  //   public function adm_jmlKontrak(){
		// // $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_kontrak');
		// $this->db->where('hapus', 0);
		// return $this->db->get()->num_rows();
  //   }

  //   public function adm_jmlTrayek(){
		// // $iduser = $this->session->userdata('iduser'); 
		// $this->db->select('*');
		// $this->db->from('tb_trayek');
		// $this->db->where('hapus', 0);
		// return $this->db->get()->num_rows();
  //   }

  //   public function adm_jmlKendaraan(){
		// // $iduser = $this->session->userdata('iduser');
		// // $this->db->select('*');
		// // $this->db->from('tb_kendaraan');
		// // $this->db->where('hapus', 0);
		// // return $this->db->get()->num_rows();

		// $this->db->select('a.*,b.name,c.tglkontrak,d.trayek')
		// 	 ->from('tb_kendaraan a')
		// 	 ->join('tb_user b', 'b.user_id = a.user_id','left')
		// 	 ->join('tb_kontrak c', 'c.id = a.kontrak_id','left')
		// 	 ->join('tb_trayek d', 'd.id = a.trayek_id','left')
		// 	 // ->where('b.bptd_id !=',0) //jika bptd_id = 0 dia adalah user/cabang
		// 	 ->where('a.hapus',0)
		// 	 ->where('c.hapus',0)
		// 	 ->where('d.hapus',0);
		// 	 // ->order_by('b.name', 'asc');
		// return $this->db->get()->num_rows();
  //   }

    public function adm_jmlPengemudi(){
		// $iduser = $this->session->userdata('iduser');
		$this->db->select('*');
		$this->db->from('tb_pengemudi');
		$this->db->where('hapus', 0);
		return $this->db->get()->num_rows();
    } 
}