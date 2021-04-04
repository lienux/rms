<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('web');
		// $this->load->library('parser');
		$this->load->model('Mod_login', 'mlogin');
	}

	public function index(){
		$data = $this->web->page_login();

		$this->parser->parse('templates/'.themes().'/auth/head', $data);
		$this->load->view('templates/'.themes().'/auth/body');
		$this->load->view('templates/'.themes().'/auth/form_login');
		$this->parser->parse('templates/'.themes().'/auth/footer', $data);
		$this->load->view('app/login_js');
			
	}

	public function aksi_login(){
		$u 		= $this->input->post('txtUser');
		$p 		= $this->input->post('txtPasswd');
		// $kd 	= md5($p);

		$where = array(
			'username' => $u,
			'password' => $p
			);
		$cek = $this->mlogin->cek_login('tb_user',$where)->num_rows();
		if($cek > 0){
			$data			= $this->mlogin->get("WHERE username = '$u' AND password = '$p'");
			foreach ($data as $d) {
				$user_id 		= $d['id'];
				$name 			= $d['name'];
				$username  		= $d['username'];
				$level			= $d['level'];
				$user_role		= $d['user_role_id'];
			}
			
			$data_session 		= array(
				'user_id' 		=> $user_id,
				'name'			=> $name,
				'username'		=> $username,
				'level'			=> $level,
				'user_role'		=> $user_role,
				'logged_in' 	=> TRUE
			);				
			
			$this->session->set_userdata($data_session);
			$callback = array(
				'status'=>'sukses',
				'pesan'=>'login suksesss'
			);
			echo json_encode($callback);
					
		}else{	
			echo "Ga boleh KEPO kalau ga punya akun...!";
		}
	}
}