<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trayek extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_trayek', 'mTrayek');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('bptd/trayek');	
	}

	public function get(){
		$data = $this->mTrayek->bptd_get();		
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getBYkontrak($kontrak_id=null){
		$data = $this->mTrayek->bptd_getBYkontrak($kontrak_id);		
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function jml($kontrak_id=null){
		$data = $this->mTrayek->bptd_jml($kontrak_id);
		echo json_encode(['jml_trayek'=>$data]);
	}

	public function jmlRitase($kontrak_id=null){
		$data = $this->mTrayek->bptd_getBYkontrak($kontrak_id);
		$sum_harian = 0;
		$sum_tahunan = 0;
		foreach ($data as $d) {
			$sum_harian+= $d['ritase_harian']; //menjumlahkan isi data pada row
			$sum_tahunan+= $d['ritase_tahun'];
		}
		echo json_encode([
			'jml_harian'=>$sum_harian,
			'jml_tahunan'=>$sum_tahunan
		]);
	}

	// public function add(){
	// 	if($this->mTrayek->validation("save")){	
	// 		$res = $this->mTrayek->save();
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
	// 	if($this->mTrayek->validation("update")){	
	// 		$res = $this->mTrayek->update($id);
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
	// 	$res = $this->mTrayek->delete($id);
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