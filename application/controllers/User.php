<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_user', 'mUser');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function ganti_passwd(){		
		$this->load->view('cabang/form_ganti_passwd');	
	}

	public function get($id=null){
		$user = $this->mUser->get($id);
		$jml = $this->mUser->jml();
		if ($id == null) {
			$data_sukses = array(
				'status'=>'sukses',
				'message'=>'Alhamdulillah...',
				'jml'=>$jml,
				'data'=>$user
				
			);
		}else{
			$data_sukses = array(
				'status'=>'sukses',
				'message'=>'Alhamdulillah...',
				'data'=>$user
			);
		}
			
		echo json_encode(['ngajingoding'=>$data_sukses]);
	}

	// public function getAll(){
	// 	$data = $this->mUser->getAll();
	// 	echo json_encode($data);
	// }

	// public function edit($id=null){
	// 	if($this->mUser->validation("update")){
	// 		$password 			= $this->input->post('password');
	// 		$confirm_passwd 	= $this->input->post('confirm_passwd');	
	// 		if($password == $confirm_passwd){
	// 			$res = $this->mUser->update($id);
	// 			if($res > 0){
	// 				$callback = array(
	// 					'status'=>'sukses',
	// 					'pesan'=>'Alhamdulillah... Password berhasil diupdate'
	// 				);
	// 				echo json_encode($callback);			
	// 			}else{
	// 				$callback = array(
	// 					'status'=>'gagal',
	// 					'pesan'=>'proses update gagal!'
	// 				);
	// 				echo json_encode($callback);
	// 			}
	// 		}else{
	// 			$callback = array(
	// 				'status'=>'gagal',
	// 				'pesan'=>'Password tidak sama!'
	// 			);
	// 			echo json_encode($callback);
	// 		}				
	// 	}else{
	// 		$callback = array(
	// 			'status'=>'gagal',
	// 			'pesan'=>validation_errors()
	// 		);
	// 		echo json_encode($callback);
	// 	}	
	// }
}