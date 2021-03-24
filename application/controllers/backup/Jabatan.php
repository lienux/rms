<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mod_jabatan', 'mJabatan');

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
			'input_element'=> $this->input_element()
		);                                

		$this->parser->parse('templates/'.themes().'/layout_form',$items);
		$this->parser->parse('templates/'.themes().'/layout_tabel',$items);
		$this->load->view('templates/'.themes().'/modal_hapus')
		->view('app/'.$nama.'_'.$level.'_js');

	}

	public function get($id=null){
		
		$level = $this->session->userdata('level');		

		if ($level==0) {

			$data = $this->mJabatan->get();

		}else{

			if ($id!=null) {

				$data = $this->mJabatan->detail($id);

			}else{

				$data = $this->mJabatan->get();

			}

		}
			
		echo json_encode(['bocahgantengdotcom'=>$data]);		

	}

	// function option(){
	// 	if ($level==0) {

	// 			$user_id = $this->session->userdata('user_id');
	// 			$data = $this->mKaryawan->getbyuser($user_id);

	// 		}else{

	// 			$data = $this->mKaryawan->get();

	// 		}
	// 	}
			

	// 	foreach ($data as $d) {
	// 		$id = $d['id'];
	// 		$nama = $d['nama'];
	// 		$jabatan = $d['jabatan'];

	// 		$option = '<option value="'.$id.'">'.$nama.'</option>';

	// 		echo $option;
	// 	}
	// }

	function input_element(){
		return 
		'<div class="col-md-4">
			<div class="form-group">
				<label class="small mb-1 font-weight-bold">
					Nama
				</label>
				<input class="form-control" name="txtNama" type="text" id="txtNama" />
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
            	<label class="small mb-1 font-weight-bold">
            		Alamat Kantor Cabang
            	</label>
            	<input class="form-control" name="alamat" type="text" id="alamat" />
        	</div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1 font-weight-bold" >
                    Nama Pimpinan Cabang
                </label>
                <input class="form-control" name="gm" id="gm" type="text"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1 font-weight-bold" >
                    No. HP Pimpinan Cabang
                </label>
                <input class="form-control" name="wa" id="wa" type="text"/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1 font-weight-bold" >
                    Tanggal Mulai Kontrak
                </label>
                <input class="form-control" name="tglkontrak" id="tglkontrak" type="text" />
                <label class="small text-danger" id="cek_tglkontrak"></label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="small mb-1 font-weight-bold" >
                    No. Telp Kantor / HP PIC
                </label>
                <input class="form-control" name="telp" type="text" id="telp" />
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label class="small mb-1 font-weight-bold" >
                    Alamat Email
                </label>
                <input class="form-control" name="email" id="email" type="text" />
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