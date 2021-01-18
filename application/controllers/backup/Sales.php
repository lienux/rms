<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_sales', 'mSales');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}
	}

	public function index(){

		$level = $this->session->userdata('level');
		$nama = 'sales';
		$items = array(
			'head_tabel'=>'Laporan Sales',
			'head_form'=>'Input Data Laporan Sales',
			'th_element'=>'<th>No</th>
                        <th>Nama Sales</th>
                        <th>Bawa</th>
                        <th>Repeat</th>
                        <th>Bad Stok</th>
                        <th>Ratio BS</th>
                        <th>Noo</th>
                        <th>Closing</th>
                        <th>Sisa</th>
                        <th>Box kmb</th>
                        <th>TBA L</th>
                        <th>TBA R</th>
                        <th>Tutup</th>
                        <th>Rasio BS(ml)</th>
                        <th>Setoran</th>
                        <th></th>',
			'input_element'=> $this->input_element(),
			'parse_action_tambah'=>'get_list_karyawan(1);',
			'parse_action_close'=>'$("#list_karyawan,#list_jabatan").empty();
									$("#list_karyawan,#list_jabatan").append("<option selected>Pilih...</option>");'
		);                                

		$this->parser->parse('templates/'.themes().'/layout_form',$items);
		$this->parser->parse('templates/'.themes().'/layout_tabel',$items);
		$this->load->view('templates/'.themes().'/modal_hapus')
		->view('app/'.$nama.'_'.$level.'_js')
		->view('app/list_karyawan');

	}

	// public function get($id=null){

		
	// 	$level = $this->session->userdata('level');		


	// 	if ($id!=null) {

	// 		$data = $this->mSales->detail($id);

	// 	}else{

	// 		if ($level==0) {

	// 			$user_id = $this->session->userdata('user_id');
	// 			$data = $this->mSales->getbyuser($user_id);

	// 		}else{

	// 			$data = $this->mSales->get();

	// 		}
	// 	}
			
	// 	echo json_encode(['bocahgantengdotcom'=>$data]);
	// }


	public function get_report($id=null){
		
		$level = $this->session->userdata('level');		

		if ($id!=null) {

			$data = $this->mSales->detail($id);

		}else{

			if ($level==0) {

				$user_id = $this->session->userdata('user_id');
				$data = $this->mSales->getbyuser($user_id);

			}else{

				$data = $this->mSales->get();

			}
		}
			
		echo json_encode(['bocahgantengdotcom'=>$data]);
	}

	function input_element(){
		return 
		'<div class="form-row">     
			<div class="col-md-3">
				<div class="form-group">
					<label class="small mb-1 font-weight-bold">
						Nama Sales
					</label>
					<select class="custom-select" name="list_karyawan" id="list_karyawan">
					    <option selected>Pilih...</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-1">
				<div class="form-group">
	            	<label class="small mb-1 font-weight-bold">
	            		Bawa
	            	</label>
	            	<input class="form-control" name="alamat" type="text" id="alamat" />
	        	</div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Repeat
	                </label>
	                <input class="form-control" name="gm" id="gm" type="text"/>
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Bad Stok
	                </label>
	                <input class="form-control" name="wa" id="wa" type="text"/>
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Ratio BS
	                </label>
	                <input class="form-control" name="tglkontrak" id="tglkontrak" type="text" />
	                <label class="small text-danger" id="cek_tglkontrak"></label>
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Noo
	                </label>
	                <input class="form-control" name="telp" type="text" id="telp" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Closing
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Sisa
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Box kmb
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    TBA L
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    TBA R
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Tutup
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	        <div class="col-md-1">
	            <div class="form-group">
	                <label class="small mb-1 font-weight-bold" >
	                    Rasio BS(ml)
	                </label>
	                <input class="form-control" name="email" id="email" type="text" />
	            </div>
	        </div>
	    </div>
	    <div class="form-row">     
			<div class="col-md-3">
				<div class="form-group">
					<label class="small mb-1 font-weight-bold">
						Jumlah Setoran
					</label>
					<input class="form-control" name="" id="" type="text" />
				</div>
			</div>
		</div>';
	}


	public function add(){
		if($this->mPengemudi->validation("save")){	
			$res = $this->mPengemudi->save();
			if($res > 0){
				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Alhamdulillah... Data berhasil disimpan'
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

	public function edit($id){
		if($this->mPengemudi->validation("update")){	
			$res = $this->mPengemudi->update($id);
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
		$res = $this->mPengemudi->delete($id);
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
}