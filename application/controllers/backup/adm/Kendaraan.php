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
		$this->load->view('adm/kendaraan');	
	}

	public function get($id=null){
		$data = $this->mKendaraan->adm_get($id);
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function export(){
		$data = $this->mKendaraan->adm_get();
		$tgl = date("Y-m-d h:i:s");
	    
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Export_data_kendaraan (".$tgl.").xls");
		 
		echo '
		<center>
			<h1>Export Data Semua Kendaraan <br/> www.e-kontrak.angkutanjalan.com</h1>
		</center>
		<table border="1">
	        <tr>
	            <th>No</th>
                <th>Nama Cabang</th>
                <th>Tahun Kontrak</th>
                <th>Nama Trayek</th>
                <th>Kode Bus</th>
                <th>Nomor Polisi</th>
                <th>Tahun Produksi</th>                        
                <th>Merk dan Tipe</th>
                <th>Nomor Rangka</th>
                <th>Nomor STNK</th>
                <th>Masa Berlaku STNK</th>  
                <th>Nomor KIR</th>
                <th>Masa Berlaku KIR</th>
                <th>Jumlah Penggunaan BBM (km/liter)</th>
                <th>status</th>              
	        </tr>';
	    $nurut = 0;
	    foreach ($data as $d) {
	    	$status = $d['status'];
	    	if ($status == 0) {
	    		$stat = 'Cadangan';
	    	}else{
	    		$stat = 'SGO';
	    	}
	    	$nurut++;
	    	echo
	        '<tr>
	            <td>'.$nurut.'</td>
	            <td>'.$d['name'].'</td>
	            <td>'.$d['tglkontrak'].'</td> 
	            <td>'.$d['trayek'].'</td>
	            <td>'.$d['kode_bus'].'</td>
	            <td>'.$d['nopol'].'</td>
	            <td>'.$d['thn_produksi'].'</td>
	            <td>'.$d['merk_tipe'].'</td>
	            <td>'.$d['no_rangka'].'</td>
	            <td>'.$d['no_stnk'].'</td>
	            <td>'.$d['masa_stnk'].'</td>
	            <td>'.$d['no_kir'].'</td>  
	            <td>'.$d['masa_kir'].'</td>
	            <td>'.$d['bbm'].'</td>  
	            <td>'.$stat.'</td>          
	        </tr>';
	    }
	    echo
	    '</table>';
	}

	public function get_odoo(){
		$data = $this->mKendaraan->adm_get_odoo();
		echo $data;
	}

	// public function getBYkontrak($kontrak_id=null){
	// 	$data = $this->mKendaraan->bptd_getBYkontrak($kontrak_id);
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

	// public function jml($kontrak_id=null){
	// 	$data = $this->mKendaraan->bptd_jml($kontrak_id); //jumlah baris
	// 	echo json_encode(['jml_kendaraan'=>$data]);
	// }

	// public function jmlSGO($idkontrak=null){
	// 	$data = $this->mKendaraan->bptd_jmlSGO($idkontrak);
	// 	echo json_encode(['sgo' => $data]);
	// }

	// public function jmlCDG($idkontrak=null){
	// 	$data = $this->mKendaraan->bptd_jmlCDG($idkontrak);
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