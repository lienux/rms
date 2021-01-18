<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_dash', 'mDash');
		$this->load->model('Mod_kontrak', 'mKontrak');
		$this->load->model('Mod_trayek', 'mTrayek');
		$this->load->model('Mod_kendaraan', 'mKendaraan');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('adm/dashboard');	
	}

	public function get(){
		$data = $this->mDash->adm_get();
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getCabang(){
		$data = $this->mDash->adm_getUserBYbptd();
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getJML(){
		$bptd = $this->mDash->adm_jmlBptd();
		$cabang = $this->mDash->adm_jmlCabang();
		$kontrak = $this->mKontrak->adm_jml();
		$trayek = $this->mTrayek->adm_jml();
		$kendaraan = $this->mKendaraan->adm_jml();
		$pengemudi = $this->mDash->adm_jmlPengemudi();

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