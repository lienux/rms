<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct(){
		parent::__construct();		
		// $this->load->library('parser');
		// $this->load->model('Mod_login', 'mlogin');
	}

	public function index(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function logout_proccess(){		
		$this->session->sess_destroy();
		$callback = array(
			'status'=>'sukses',
			'pesan'=>'logout suksesss'
		);
		echo json_encode($callback);
	}	

}