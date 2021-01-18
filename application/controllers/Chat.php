<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('pagination');
		$this->load->model('Mod_pesan', 'mPesan');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('pesan');	
	}

	public function get($id=null){
		$pesan = $this->mPesan->get($id);
		$jml = $this->mPesan->jml();

		$data_sukses = array(
			'status'=>'sukses',
			'message'=>'Alhamdulillah...',
			'jml'=>$jml,
			'data'=>$pesan
		);

		$data_gagal = array(
			'status'=>'gagal',
			'message'=>'data tidak ditemukan'
		);

		if ($pesan) {
			echo json_encode(['ngajingoding'=>$data_sukses]);
		}else{
			echo json_encode(['ngajingoding'=>$data_gagal]);
		}	
	}

	// public function getBalas($id=null){
	// 	if ($id == null) {
	// 		echo json_encode([
	// 			'status'=>'gagal',
	// 			'message'=>'id tidak boleh kosong'
	// 		]);
	// 	}else{
	// 		$data = $this->mPesan->getBalas($id);
	// 		if ($data) {
	// 			echo json_encode([
	// 				'status'=>'sukses',
	// 				'message'=>'Alhamdulillah...',
	// 				'ngajingoding'=>$data
	// 			]);
	// 		}else{
	// 			echo json_encode([
	// 				'status'=>'gagal',
	// 				'message'=>'data tidak ditemukan'
	// 			]);
	// 		}
	// 	}				
	// }

	public function add(){
		$tujuan = $this->input->post('txtTujuan');
		if ($tujuan == '') {
			echo "Silahkan pilih tujuan terlebih dahulu pada kolom selebah kri!";
		}else{
			$res = $this->mPesan->save();
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Data berhasil disimpan'
				);
				echo json_encode($callback);			
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>'Proses penyimpanan gagal'
				);
				echo json_encode($callback);
			}
		}	
	}
}