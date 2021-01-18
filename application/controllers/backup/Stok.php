<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->library('pagination');
		$this->load->model('Mod_stok', 'mStok');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function index(){

		$level = $this->session->userdata('level');
		$nama = 'stok';
		$items = array(
			'head_tabel'=>'Stok Bahan Baku',
			'head_form'=>'Input Data Stok',
			'th_element'=>'<th>No</th> <th>Nama</th> <th>Satuan</th> <th>Jumlah</th> <th></th>',
			'input_element'=> $this->input_element(),
			'parse_action_tambah'=>'$("#form_input").removeClass("col-lg-12"); $("#form_input").addClass("col-lg-4");
									$("#layout_tabel").removeClass("col-lg-12"); $("#layout_tabel").addClass("col-lg-8");',
			'parse_action_close'=>'$("#form_input").removeClass("col-lg-4"); $("#form_input").addClass("col-lg-12");
									$("#layout_tabel").removeClass("col-lg-8"); $("#layout_tabel").addClass("col-lg-12");'
		);                                

		$this->parser->parse('templates/'.themes().'/layout_form',$items);
		$this->parser->parse('templates/'.themes().'/layout_tabel',$items);
		$this->load->view('templates/'.themes().'/modal_hapus')
		->view('app/'.$nama.'_'.$level.'_js');

	}

	public function get($id=null){
		$data = $this->mStok->get($id);
		echo json_encode(['bocahgantengdotcom'=>$data]);
	}

	function input_element(){
		return 
		'<div class="form-row">
			<div class="col-lg-12">
				<div class="form-group">
					<label class="small mb-1 font-weight-bold">
						Nama Bahan Baku
					</label>
					<input class="form-control" name="txtNama" type="text" id="txtNama" />
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
	            	<label class="small mb-1 font-weight-bold">
	            		Satuan
	            	</label>
	            	<input class="form-control" name="txtSatuan" type="text" id="txtSatuan" />
	        	</div>
	        </div>
	        <div class="col-lg-6">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Jumlah
	                </label>
	                <input class="form-control" name="txtJumlah" id="txtJumlah" type="text"/>
	            </div>
	        </div>
	    </div>';
	}

	// public function getBYkontrak($kontrak_id=null){
	// 	$data = $this->mTrayek->getBYkontrak($kontrak_id);
	// 	echo json_encode(['ngajingoding'=>$data]);
	// }

	// public function jml($kontrak_id=null){
	// 	$data = $this->mTrayek->jml($kontrak_id);
	// 	echo json_encode(['jml_trayek'=>$data]);
	// }

	// public function jmlRitase($kontrak_id=null){
	// 	$data = $this->mTrayek->getBYkontrak($kontrak_id);
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