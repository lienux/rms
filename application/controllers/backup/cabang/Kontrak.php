<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Mod_kontrak', 'mKontrak');
		$this->load->model('Mod_trayek', 'mTrayek');
		$this->load->model('Mod_kendaraan', 'mKendaraan');
		$this->load->model('Mod_pengemudi', 'mPengemudi');

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
	}

	public function index(){		
		$this->load->view('cabang/kontrak');
		$this->load->view('app/kontrak_js');
	}

	public function form_kontrak(){		
		$this->load->view('cabang/form_kontrak');	
	}	

	public function get($id=null){
		$data = $this->mKontrak->get($id);		
		echo json_encode(['ngajingoding'=>$data]);
	}

	public function getTerakhir(){
		$data = $this->mKontrak->dataTerakhir();
		echo json_encode($data);
	}

	public function add(){
		if($this->mKontrak->validation("save")){
			$res = $this->mKontrak->save();
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Data berhasil disimpan'
				);
				echo json_encode($callback);			
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>'Proses simpan gagal'
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

	public function edit($id){
		if($this->mKontrak->validation("update")){	
			$res = $this->mKontrak->update($id);
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Update berhasil'
				);
				echo json_encode($callback);			
			}else{
				$callback = array(
					'status'=>'gagal',
					'pesan'=>validation_errors()
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

	public function hapus($id){
		$res = $this->mKontrak->delete($id);
		if($res > 0){
			// unlink("./assets/ebook/".$file);
			$callback = array(
				'status'=>'sukses',
				'pesan'=>'Alhamdulillah... Data berhasil diHapus'
			);
			echo json_encode($callback);
		}else{
			echo "Gagal";
		}
	}

	public function cek_tglkontrak($data=null){
		$iduser = $this->session->userdata('iduser');
		if($data!=null){
			$cek = $this->mKontrak->cekdata(
				'tb_kontrak',[
								'tglkontrak'=>$data,
								'user_id'=>$iduser
								]
				)->num_rows();
			if ($cek > 0) {
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Periode yang sama sudah terdaftar'
				);
				echo json_encode($callback);
			}else{
				$callback = array(
					'status'=>'gagal'
				);
				echo json_encode($callback);
			}
		}else{
			$callback = array(
					'status'=>'kosong'
				);
				echo json_encode($callback);
		}	
	}

	public function export_excel($kontrak_id){
		// $iduser = $this->session->userdata('iduser');
		$kontrak = $this->mKontrak->get($kontrak_id);
		$kontrak = $this->mKontrak->get($kontrak_id);
		$trayek = $this->mTrayek->getBYkontrak($kontrak_id);
		$kendaraan = $this->mKendaraan->getBYkontrak($kontrak_id);
		$pengemudi = $this->mPengemudi->getBYkontrak($kontrak_id);

		// echo json_encode([
		// 	'data_kontrak'=>$kontrak,
		// 	'data_trayek'=>$trayek,
		// 	'data_kendaraan'=>$kendaraan,
		// 	'data_pengemudi'=>$pengemudi
		// ]);

		// $data = $this->mTrayek->adm_get();
		foreach ($kontrak as $k) {
			$alamat = $k['alamat'];
			$pimpinan = $k['pimpinan'];
			$wa = strval($k['wa']);
			$telp = strval($k['telp']);
			$email = $k['email'];
			$tglkontrak = $k['tglkontrak'];

		}

		$tgl = date("Y-m-d h:i:s");
	    
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Export_data_kontrak (".$tgl.").xls");
		 
		echo '
		<center>
			<h6>Export Data Kontrak <br/> www.e-kontrak.angkutanjalan.com</h6>
		</center>

		<table border="1">
	        <tr>
	            <td colspan="2">Wilayah / Alamat Lengkap Kantor</td>
	            <td colspan="5">'.$alamat.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">General Manajer</td>
	            <td colspan="5">'.$pimpinan.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">Nomor Whatsapp General Manager</td>
	            <td colspan="5">"'.$wa.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">No. Telpon Kantor / No. Telp PIC</td>
	            <td colspan="5">"'.$telp.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">Email</td>
	            <td colspan="5">'.$email.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">Tanggal Mulai Kontrak</td>
	            <td colspan="5">"'.$tglkontrak.'</td>               
	        </tr>
	        <tr>
	            <td colspan="2">Jumlah Ritase Kontrak</td>
	            <td colspan="5"></td>               
	        </tr>
	        <tr>
	            <td colspan="2">Jumlah Trayek</td>
	            <td colspan="5"></td>               
	        </tr>
	        <tr>
	            <td colspan="2">Jumlah Kendaraan</td>
	            <td colspan="5"></td>               
	        </tr>
	        <tr></tr>
	        <tr>
	            <th>No</th>
                <th>Nama Trayek</th>
                <th>Jarak (km)</th>
                <th>Ritase Harian</th>
                <th>Ritase 1 Tahun</th>                        
                <th>Jadwal Berangkat</th>
                <th>Jadwal Kedatangan</th>             
	        </tr>';
	    $nurut = 0;
	    foreach ($trayek as $t) {
	    	$nurut++;
	    	echo
	        '<tr>
	            <td>'.$nurut.'</td>
	            <td>'.$t['trayek'].'</td>
	            <td>'.$t['jarak'].'</td>
	            <td>'.$t['ritase_harian'].'</td>
	            <td>'.$t['ritase_tahun'].'</td>
	            <td>'.$t['jadwal_berangkat'].'</td>
	            <td>'.$t['jadwal_datang'].'</td>            
	        </tr>';
	    }
	    echo
	    '</table>';
	}

}