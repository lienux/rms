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
		$this->load->model('Mod_jalan', 'mJalan');
		$this->load->model('Mod_rambu', 'mRambu');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function index()
	{
		$web = $this->web->page_admin();
		$data = $web+['menu_dashboard'=>'active'];
		$card_info = $this->load->view('card_info',array(),true);
		$map = $this->load->view('map',array(),true);
		$data['page'] = $this->load->view('page/dash/dash',array('card_info'=>$card_info,'map'=>$map),true);

		$this->parser->parse('templates/'.themes().'/layout_admin', $data);
		$this->load->view('app/dashboard_js');
	}

	public function get_jml(){
		$jalan = $this->mJalan->jml();
		$rambu = $this->mRambu->jml();

		echo json_encode([
			'jml_jalan'=>$jalan,
			'jml_rambu'=>$rambu
		]);
	}
}
