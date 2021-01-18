<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengemudi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('pagination');
		$this->load->model('Mod_pengemudi', 'mPengemudi');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('nasional/pengemudi');	
	}

	public function get($id=null){
		$data = $this->mPengemudi->nasional_get($id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getBYkontrak($kontrak_id=null){
		$data = $this->mPengemudi->nasional_getBYkontrak($kontrak_id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	// public function jml($idkontrak=null){
	// 	$data = $this->mPengemudi->getJML($idkontrak);
	// 	echo json_encode(['pengemudi'=>$data]);
	// }

	// public function add(){
	// 	if($this->mPengemudi->validation("save")){	
	// 		$res = $this->mPengemudi->save();
	// 		if($res > 0){
	// 			$callback = array(
	// 				'status'=>'sukses',
	// 				'pesan'=>'Alhamdulillah... Data berhasil disimpan'
	// 			);
	// 			echo json_encode($callback);			
	// 		}else{
	// 			$callback = array(
	// 				'status'=>'gagal',
	// 				'pesan'=>validation_errors()
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

	// public function edit($id){
	// 	if($this->mPengemudi->validation("update")){	
	// 		$res = $this->mPengemudi->update($id);
	// 		if($res > 0){
	// 			$callback = array(
	// 				'status'=>'sukses',
	// 				'pesan'=>'Alhamdulillah... Update berhasil'
	// 			);
	// 			echo json_encode($callback);			
	// 		}else{
	// 			$callback = array(
	// 				'status'=>'gagal',
	// 				'pesan'=>validation_errors()
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

	// public function hapus($id){
	// 	$res = $this->mPengemudi->delete($id);
	// 	if($res > 0){
	// 		// unlink("./assets/ebook/".$file);
	// 		$callback = array(
	// 			'status'=>'sukses',
	// 			'pesan'=>'Alhamdulillah... Data berhasil diHapus'
	// 		);
	// 		echo json_encode($callback);
	// 	}else{
	// 		echo "Gagal";
	// 	}
	// }
}