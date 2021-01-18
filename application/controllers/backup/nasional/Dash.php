<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_dash', 'mDash');
		// $this->load->model('bptd/Mod_kontrak', 'mKontrak');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('nasional/dashboard');
	}

	// public function get(){
	// 	$data = $this->mDash->get();
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

	// public function getCabang(){
	// 	$data = $this->mDash->getUserBYbptd();
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

	public function getJML(){
		$bptd = $this->mDash->nasional_jmlBptd();
		$cabang = $this->mDash->nasional_jmlCabang();
		$kontrak = $this->mDash->nasional_jmlKontrak();
		$trayek = $this->mDash->nasional_jmlTrayek();
		$kendaraan = $this->mDash->nasional_jmlKendaraan();
		$pengemudi = $this->mDash->nasional_jmlPengemudi();

		$data = [
					'jml_bptd'=>$bptd,
					'jml_cabang'=>$cabang,
					'jml_kontrak'=>$kontrak,
					'jml_trayek'=>$trayek,
					'jml_kendaraan'=>$kendaraan,
					'jml_pengemudi'=>$pengemudi
				];
		echo json_encode(['ngajingoding'=>$data]);			
	}
}