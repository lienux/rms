<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pesan extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get($pengirim=null){
		$iduser = $this->session->userdata('iduser');
		$tujuan = $iduser;
		$this->db->select('a.*,b.name')
				->from('tb_pesan a')
				->join('tb_user b', 'b.user_id = a.pengirim', 'left')
				->where('pengirim',$pengirim)
				->where('tujuan',$tujuan)
				->or_where('tujuan',$pengirim)
				->where('pengirim',$tujuan)
				->order_by('tgl_post','desc');
				// ->where('a.balas',0);
		// if($id != null){
		// $this->db->where('a.id', $id);
		// }else{
		// $this->db->where('a.tujuan', $iduser);
		// }				 
		return $this->db->get()->result_array();
    }

  //   public function getBalas($id){
		// $this->db->select('*')
		// 		 ->from('tb_pesan')
		// 		 ->where('balas', $id);
		// return $this->db->get()->result_array();
  //   }

    public function jml(){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('*')
				 ->from('tb_pesan')
				 ->where('tujuan', $iduser)
				 ->where('baca',0);
		return $this->db->get()->num_rows(); //jumlah baris
    }

    public function save(){
		$iduser 				= $this->session->userdata('iduser');
		$ip_address				= $this->input->ip_address();

		$pesan					= $this->input->post('txtPesan');
		$tujuan 				= $this->input->post('txtTujuan');
		$tgl 					= date('Y-m-d H:i:s');

		$data = array(
			'pengirim' 			=> $iduser,
			'tujuan'			=> $tujuan,
			'pesan' 			=> $pesan,
			'tgl_post'			=> $tgl
			);
		$res = $this->db->insert('tb_pesan',$data);
		return $res;			
	}
}
