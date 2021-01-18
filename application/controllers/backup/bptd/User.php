<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_user', 'mUser');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function get($id=null){
		$data = $this->mUser->get($id);
		echo json_encode($data);
	}

	public function ganti_passwd(){		
		$this->load->view('bptd/form_ganti_passwd');	
	}

	public function getBYbptd(){
		$data = $this->mUser->getBYbptd(); //ambil data berdasarkan bptd
		echo json_encode($data);
	}

	public function edit($id=null){
		if($this->mUser->validation("update")){
			$password 			= $this->input->post('password');
			$confirm_passwd 	= $this->input->post('confirm_passwd');	
			if($password == $confirm_passwd){
				$res = $this->mUser->update($id);
				if($res > 0){
					$callback = array(
						'status'=>'sukses',
						'pesan'=>'Alhamdulillah... Password berhasil diupdate'
					);
					echo json_encode($callback);			
				}else{
					$callback = array(
						'status'=>'gagal',
						'pesan'=>'proses update gagal!'
					);
					echo json_encode($callback);
				}
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>'Password tidak sama!'
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
}