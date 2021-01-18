<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('web');
		// $this->load->model('M_login', 'mLogin');
		// $this->load->model('Mod_trayek', 'mTrayek');
		// $this->load->model('Mod_kendaraan', 'mKendaraan');
		// $this->load->model('Mod_pengemudi', 'mPengemudi');
		// $this->load->library('parser');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function index()
	{
		$web = $this->web->page_admin();
		$data = $web+['menu_dashboard'=>'active'];
		$data['content'] = $this->load->view('card_info',array(),true);
		
		$this->parser->parse('templates/'.themes().'/layout_admin', $data);
	}

	public function get_jml(){
		$trayek = $this->mTrayek->jumlah();
		$kendaraan = array(
			'kendaraan_semua' => $this->mKendaraan->jumlah(),
			'kendaraan_sgo' => $this->mKendaraan->jumlah_sgo(),
			'kendaraan_cdg' => $this->mKendaraan->jumlah_cdg(),
		);
		$pengemudi = $this->mPengemudi->jumlah();

		echo json_encode([
			'jml_trayek'=>$trayek,
			'jml_kendaraan'=>$kendaraan,
			'jml_pengemudi'=>$pengemudi
		]);
	}

	public function get_cabang(){
		$data = $this->mDash->get_cabang();
		echo json_encode(['ngajingoding'=>$data]);
	}

	// public function home()
	// {
	// 	$this->load->view('home');
	// }

	// public function dash()
	// {
	// 	$this->load->view('cabang/dashboard');
	// }

	// public function infokontrak()
	// {
	// 	$this->load->view('admin/infokontrak');
	// }

	// public function trayek()
	// {
	// 	$this->load->view('admin/trayek');
	// }

	// public function kendaraan()
	// {
	// 	$this->load->view('admin/kendaraan');
	// }

	// public function pengemudi()
	// {
	// 	$this->load->view('admin/pengemudi');
	// }
}
