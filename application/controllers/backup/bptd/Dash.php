<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_dash', 'mDash');
		// $this->load->model('Mod_kontrak', 'mKontrak');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('bptd/dashboard');	
	}

	public function get(){
		$data = $this->mDash->bptd_get();
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getCabang(){
		$data = $this->mDash->bptd_getUserBYbptd();
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getJML(){
		$cabang = $this->mDash->bptd_jmlCabang();
		$trayek = $this->mDash->bptd_jmlTrayek();
		$kendaraan = $this->mDash->bptd_jmlKendaraan();
		$pengemudi = $this->mDash->bptd_jmlPengemudi();

		echo json_encode([
			'jml_cabang'=>$cabang,
			'jml_trayek'=>$trayek,
			'jml_kendaraan'=>$kendaraan,
			'jml_pengemudi'=>$pengemudi
		]);			
	}
}