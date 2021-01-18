<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_login', 'mLogin');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index()
	{
		$this->load->view('template');
	}

	public function home()
	{
		$this->load->view('home');
	}

	public function dash()
	{
		$this->load->view('bptd/dashboard');
	}

	public function infokontrak()
	{
		$this->load->view('admin/infokontrak');
	}

	public function trayek()
	{
		$this->load->view('admin/trayek');
	}

	public function kendaraan()
	{
		$this->load->view('admin/kendaraan');
	}

	public function pengemudi()
	{
		$this->load->view('admin/pengemudi');
	}
}
