<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('pagination');
		$this->load->model('Mod_kendaraan', 'mKendaraan');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('nasional/kendaraan');	
	}

	public function get($id=null){
		$data = $this->mKendaraan->nasional_get($id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getBYkontrak($kontrak_id=null){
		$data = $this->mKendaraan->nasional_getBYkontrak($kontrak_id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	// public function jml($kontrak_id=null){
	// 	$data = $this->mKendaraan->jml($kontrak_id); //jumlah baris
	// 	echo json_encode(['jml_kendaraan'=>$data]);
	// }

	// public function jmlSGO($idkontrak=null){
	// 	$data = $this->mKendaraan->jmlSGO($idkontrak);
	// 	echo json_encode(['sgo' => $data]);
	// }

	// public function jmlCDG($idkontrak=null){
	// 	$data = $this->mKendaraan->jmlCDG($idkontrak);
	// 	echo json_encode(['cdg' => $data]);
	// }

	// public function add(){
	// 	if($this->mKendaraan->validation("save")){	
	// 		$res = $this->mKendaraan->save();
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
	// 	if($this->mKendaraan->validation("update")){	
	// 		$res = $this->mKendaraan->update($id);
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
	// 	$res = $this->mKendaraan->delete($id);
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