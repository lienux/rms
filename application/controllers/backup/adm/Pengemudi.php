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
		$this->load->view('adm/pengemudi');	
	}

	public function get($id=null){
		$data = $this->mPengemudi->adm_get($id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function export(){
		$data = $this->mPengemudi->adm_get();
		$tgl = date("Y-m-d h:i:s");
	    
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Export_data_pengemudi (".$tgl.").xls");
		 
		echo '
		<center>
			<h1>Export Semua Data Pengemudi <br/> www.e-kontrak.angkutanjalan.com</h1>
		</center>
		<table border="1">
	        <tr>
	            <th>No</th>
	            <th>Cabang</th>
                <th>Nama Pengemudi</th>
                <th>No SIM</th>
                <th>Masa Aktif SIM</th>
                <th>Telp</th>                              
	        </tr>';
	    $nurut = 0;
	    foreach ($data as $d) {
	    	$nurut++;
	    	echo
	        '<tr>
	            <td>'.$nurut.'</td>
	            <td>'.$d['name'].'</td>
	            <td>'.$d['nama'].'</td>
	            <td>'.$d['no_sim'].'</td> 
	            <td>'.$d['masa_sim'].'</td>
	            <td>'.$d['telp'].'</td>          
	        </tr>';
	    }
	    echo
	    '</table>';
	}

	// public function getBYkontrak($kontrak_id=null){
	// 	$data = $this->mPengemudi->bptd_getBYkontrak($kontrak_id);
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

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