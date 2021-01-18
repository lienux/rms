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
		$this->load->view('adm/trayek');	
	}

	public function get(){
		$data = $this->mTrayek->adm_get();		
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function export(){
		$data = $this->mTrayek->adm_get();
		$tgl = date("Y-m-d h:i:s");
	    
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Export_data_trayek (".$tgl.").xls");
		 
		echo '
		<center>
			<h1>Export Data Semua Trayek <br/> www.e-kontrak.angkutanjalan.com</h1>
		</center>
		<table border="1">
	        <tr>
	            <th>No</th>
                <th>Nama Cabang</th>
                <th>Tahun Kontrak</th>
                <th>Nama Trayek</th>
                <th>Jarak (km)</th>
                <th>Ritase Harian</th>
                <th>Ritase 1 Tahun</th>                        
                <th>Jadwal Berangkat</th>
                <th>Jadwal Kedatangan</th>
                <th>Titik Koordinat Awal</th>
                <th>Titik Koordinat Akhir</th>                
	        </tr>';
	    $nurut = 0;
	    foreach ($data as $d) {
	    	$nurut++;
	    	echo
	        '<tr>
	            <td>'.$nurut.'</td>
	            <td>'.$d['name'].'</td>
	            <td>'.$d['tglkontrak'].'</td> 
	            <td>'.$d['trayek'].'</td>
	            <td>'.$d['jarak'].'</td>
	            <td>'.$d['ritase_harian'].'</td>
	            <td>'.$d['ritase_tahun'].'</td>
	            <td>'.$d['jadwal_berangkat'].'</td>
	            <td>'.$d['jadwal_datang'].'</td>
	            <td>'.$d['koordinat_awal'].'</td>
	            <td>'.$d['koordinat_akhir'].'</td>              
	        </tr>';
	    }
	    echo
	    '</table>';
	}

	
	// public function getBYkontrak($kontrak_id=null){
	// 	$data = $this->mTrayek->bptd_getBYkontrak($kontrak_id);		
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

	// public function jml($kontrak_id=null){
	// 	$data = $this->mTrayek->bptd_jml($kontrak_id);
	// 	echo json_encode(['jml_trayek'=>$data]);
	// }

	// public function jmlRitase($kontrak_id=null){
	// 	$data = $this->mTrayek->bptd_getBYkontrak($kontrak_id);
	// 	$sum_harian = 0;
	// 	$sum_tahunan = 0;
	// 	foreach ($data as $d) {
	// 		$sum_harian+= $d['ritase_harian']; //menjumlahkan isi data pada row
	// 		$sum_tahunan+= $d['ritase_tahun'];
	// 	}
	// 	echo json_encode([
	// 		'jml_harian'=>$sum_harian,
	// 		'jml_tahunan'=>$sum_tahunan
	// 	]);
	// }

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