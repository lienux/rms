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
		$this->load->view('nasional/kontrak');	
	}	

	public function getCabang(){
		$data = $this->mKontrak->nasional_getCabang(); //ambil data kontrak
		echo json_encode(['ngajingoding'=>$data]);		
	}

	public function get(){
		$data = $this->mKontrak->nasional_get(); //ambil data kontrak
		echo json_encode(['ngajingoding'=>$data]);		
	}

	public function dataTerakhirBYcabang($cabang_id=null){
		$data = $this->mKontrak->nasional_dataTerakhirBYcabang($cabang_id); //ambil data kontrak berdasarkan cabang

		if ($data) {
			echo json_encode(['ngajingoding'=>$data]);
		}else{
			$data[] = array(
				'pimpinan' => 'belum diisi',
				'alamat'=>'belum diisi',
				'wa'=>'belum diisi',
				'telp'=>'belum diisi',
				'email'=>'belum diisi'
			);
			echo json_encode(['ngajingoding'=>$data]);
		}
		
	}

	public function add(){
		if($this->mKontrak->validation("save")){	
			$res = $this->mKontrak->nasional_save();
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Data berhasil disimpan'
				);
				echo json_encode($callback);			
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>validation_errors()
				);
				echo json_encode($callback);
			}
		}else{
			$callback = array(
				'status'=>'gagal',
				'pesan'=>validation_errors()
			);
			echo json_encode($callback);
		}	
	}

	public function edit($id){
		if($this->mKontrak->validation("update")){	
			$res = $this->mKontrak->nasional_update($id);
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Update berhasil'
				);
				echo json_encode($callback);			
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>validation_errors()
				);
				echo json_encode($callback);
			}
		}else{
			$callback = array(
				'status'=>'gagal',
				'pesan'=>validation_errors()
			);
			echo json_encode($callback);
		}	
	}

	public function hapus($id){
		$res = $this->mKontrak->nasional_delete($id);
		if($res > 0){
			// unlink("./assets/ebook/".$file);
			$callback = array(
				'status'=>'sukses',
				'pesan'=>'Alhamdulillah... Data berhasil diHapus'
			);
			echo json_encode($callback);
		}else{
			echo "Gagal";
		}
	}

}