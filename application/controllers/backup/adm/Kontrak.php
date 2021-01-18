<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Mod_kontrak', 'mKontrak');
		// $this->load->model('Mod_trayek', 'mTrayek');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('adm/kontrak');	
	}	

	public function get(){
		$data = $this->mKontrak->adm_get(); //ambil data kontrak
		echo json_encode(['ngajingoding'=>$data]);		
	}

	// public function cekIDverifikasi($kontrak_id){
	// 	$data = $this->mKontrak->bptd_getIDverifikasi($kontrak_id); //ambil data kontrak
	// 	echo json_encode(['ngajingoding'=>$data]);		
	// }

	// public function dataTerakhirBYcabang($cabang_id=null){
	// 	$data = $this->mKontrak->bptd_dataTerakhirBYcabang($cabang_id); //ambil data kontrak berdasarkan cabang

	// 	if ($data) {
	// 		echo json_encode(['ngajingoding'=>$data]);
	// 	}else{
	// 		$data[] = array(
	// 			'pimpinan' => 'belum diisi',
	// 			'alamat'=>'belum diisi',
	// 			'wa'=>'belum diisi',
	// 			'telp'=>'belum diisi',
	// 			'email'=>'belum diisi'
	// 		);
	// 		echo json_encode(['ngajingoding'=>$data]);
	// 	}
		
	// }

	// public function add(){
	// 	if($this->mKontrak->validation("save")){	
	// 		$res = $this->mKontrak->save();
	// 		if($res > 0){
	// 			$callback = array(
	// 				'status'=>'sukses',
	// 				'pesan'=>'Alhamdulillah... Data berhasil disimpan'
	// 			);
	// 			echo json_encode($callback);			
	// 		}else{
	// 			$callback = array(
	// 				'status'=>'gagal',
	// 				'pesan'=>validation_errors()
	// 			);
	// 			echo json_encode($callback);
	// 		}
	// 	}else{
	// 		$callback = array(
	// 			'status'=>'gagal',
	// 			'pesan'=>validation_errors()
	// 		);
	// 		echo json_encode($callback);
	// 	}	
	// }

	// public function edit($id){
	// 	if($this->mKontrak->validation("update")){	
	// 		$res = $this->mKontrak->update($id);
	// 		if($res > 0){
	// 			$callback = array(
	// 				'status'=>'sukses',
	// 				'pesan'=>'Alhamdulillah... Update berhasil'
	// 			);
	// 			echo json_encode($callback);			
	// 		}else{
	// 			$callback = array(
	// 				'status'=>'gagal',
	// 				'pesan'=>validation_errors()
	// 			);
	// 			echo json_encode($callback);
	// 		}
	// 	}else{
	// 		$callback = array(
	// 			'status'=>'gagal',
	// 			'pesan'=>validation_errors()
	// 		);
	// 		echo json_encode($callback);
	// 	}	
	// }

	// public function hapus($id){
	// 	$res = $this->mKontrak->delete($id);
	// 	if($res > 0){
	// 		// unlink("./assets/ebook/".$file);
	// 		$callback = array(
	// 			'status'=>'sukses',
	// 			'pesan'=>'Alhamdulillah... Data berhasil diHapus'
	// 		);
	// 		echo json_encode($callback);
	// 	}else{
	// 		echo "Gagal";
	// 	}
	// }

	// public function verifikasi($kontrak_id){
	// 	$res = $this->mKontrak->bptd_verifikasi($kontrak_id);
	// 	if($res > 0){
	// 		$callback = array(
	// 			'status'=>'sukses',
	// 			'pesan'=>'Verifikasi telah Anda lakukan, Cabang tidak dapan melakukan tambah dan update, delete pada periode kontrak ini.',
	// 			'verifikasi'=>$kontrak_id
	// 		);
	// 		echo json_encode($callback);			
	// 	}else{
	// 		$callback = array(
	// 			'status'=>'gagal',
	// 			'pesan'=>'Proses verifikasi gagal'
	// 		);
	// 		echo json_encode($callback);
	// 	}	
	// }

}