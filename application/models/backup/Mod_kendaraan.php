<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kendaraan extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function validation($mode){
		$this->load->library('form_validation');
		if($mode == "save")
			$this->form_validation->set_rules('kontrak_id', 'Kontrak', 'required');
			$this->form_validation->set_rules('kode_bus', 'Kode Bus', 'required');
			$this->form_validation->set_rules('nopol', 'Nomer Polisi', 'required');
			$this->form_validation->set_rules('trayek_dilayani', 'Trayek Dilayani', 'required');
			$this->form_validation->set_rules('thn_produksi', 'Tahun Produksi', 'required');
			$this->form_validation->set_rules('merk_tipe', 'Merek dan Tipe', 'required');
			$this->form_validation->set_rules('jml_seat', 'Jumlah Seat', 'required');
			$this->form_validation->set_rules('no_rangka', 'Nomor Rangka', 'required');
			$this->form_validation->set_rules('no_stnk', 'Nomor STNK', 'required');
			$this->form_validation->set_rules('masa_stnk', 'Masa Berlaku STNK', 'required');
			$this->form_validation->set_rules('no_kir', 'Nomor KIR', 'required');
			$this->form_validation->set_rules('masa_kir', 'Masa Berlaku KIR', 'required');
			$this->form_validation->set_rules('status', 'Status Kendaraan', 'required');

		if($mode == "update")
			$this->form_validation->set_rules('kontrak_id', 'Kontrak', 'required');
			$this->form_validation->set_rules('kode_bus', 'Kode Bus', 'required');
			$this->form_validation->set_rules('nopol', 'Nomer Polisi', 'required');
			$this->form_validation->set_rules('trayek_dilayani', 'Trayek Dilayani', 'required');
			$this->form_validation->set_rules('thn_produksi', 'Tahun Produksi', 'required');
			$this->form_validation->set_rules('merk_tipe', 'Merek dan Tipe', 'required');
			$this->form_validation->set_rules('jml_seat', 'Jumlah Seat', 'required');
			$this->form_validation->set_rules('no_rangka', 'Nomor Rangka', 'required');
			$this->form_validation->set_rules('no_stnk', 'Nomor STNK', 'required');
			$this->form_validation->set_rules('masa_stnk', 'Masa Berlaku STNK', 'required');
			$this->form_validation->set_rules('no_kir', 'Nomor KIR', 'required');
			$this->form_validation->set_rules('masa_kir', 'Masa Berlaku KIR', 'required');

		if($this->form_validation->run()) // Jika validasi benar
			return true; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return false; // Maka kembalikan hasilnya dengan FALSE
	}

	public function get($id=null){
		$iduser = $this->session->userdata('iduser');
		$kontrak_id_aktif = get_cookie('kontrak_id');
		$this->db->select('a.*,b.trayek')
				 ->from('tb_kendaraan a')
				 ->join('tb_trayek b', 'b.id = a.trayek_id', 'left')
				 ->where('a.kontrak_id',$kontrak_id_aktif)
				 ->where('a.hapus',0);
		if($id != null){
			$this->db->where('a.id', $id);
		}else{
			$this->db->where('a.user_id', $iduser);
		}
		return $this->db->get()->result_array();
    }

    public function getBYkontrak($kontrak_id=null){
    	$this->db->select('a.*,b.trayek')
    			 ->from('tb_kendaraan a')
    			 ->join('tb_trayek b', 'b.id = a.trayek_id', 'left')
				 ->where('a.kontrak_id', $kontrak_id)
				 ->where('a.hapus',0);
		return $this->db->get()->result_array();
    }

    public function jumlah($id=null){ //pengambilan jumlah data
    	$level = $this->session->userdata('level');
    	$iduser = $this->session->userdata('iduser');
    	$kontrak_id = get_cookie('kontrak_id'); //id_kontrak yg aktif pada saat pemilihan periode_kontrak

    	if ($id!=null) { //jika id tidak kosong, ini digunakan untuk get data secara umum berdasarkan id_kontrak
    		$this->db->select('*')
					 ->from('tb_kendaraan')
					 ->where('kontrak_id =' .$id)
					 ->where('hapus',0);
			return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    	}else{
    		if ($level==0) { //jika level user adalah cabang
		    	$this->db->select('*')
						 ->from('tb_kendaraan')
						 ->where('kontrak_id =' .$kontrak_id) //berdaeraskar id_kontrak yg aktif pas login cabang
						 ->where('hapus',0);
				return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
	    	}
	    	
	    	elseif ($level==1) { //jika level user adalah bptd
	    		$this->db->select('a.*,b.bptd_id')
					 ->from('tb_kendaraan a')
					 ->join('tb_user b', 'a.user_id = b.id', 'inner')
					 ->where('b.bptd_id =' .$iduser)
					 ->where('a.hapus',0);
				return $this->db->get()->num_rows();
	    	}	
    	}	    	
    }


    public function jumlah_sgo(){
		$level = $this->session->userdata('level');
    	$iduser = $this->session->userdata('iduser');
    	$kontrak_id = get_cookie('kontrak_id');

    	if ($level==0) { //jika level user adalah cabang
	    	$this->db->select('*')
					 ->from('tb_kendaraan')
					 ->where('kontrak_id =' .$kontrak_id)
					 ->where('status =' .'1')
					 ->where('hapus',0);
			return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    	}
    	
    	elseif ($level==1) { //jika level user adalah bptd
    		$this->db->select('a.*,b.bptd_id')
				 ->from('tb_kendaraan a')
				 ->join('tb_user b', 'a.user_id = b.id', 'inner')
				 ->where('b.bptd_id =' .$iduser)
				 ->where('status =' .'1')
				 ->where('a.hapus',0);
			return $this->db->get()->num_rows();
    	}
    }

    public function jumlah_cdg(){
    	$level = $this->session->userdata('level');
    	$iduser = $this->session->userdata('iduser');
    	$kontrak_id = get_cookie('kontrak_id');

    	if ($level==0) { //jika level user adalah cabang
	    	$this->db->select('*')
					 ->from('tb_kendaraan')
					 ->where('kontrak_id =' .$kontrak_id)
					 ->where('status =' .'0')
					 ->where('hapus',0);
			return $this->db->get()->num_rows(); //ambil jumlah baris berdasarkan kontrak_id
    	}
    	
    	elseif ($level==1) { //jika level user adalah bptd
    		$this->db->select('a.*,b.bptd_id')
				 ->from('tb_kendaraan a')
				 ->join('tb_user b', 'a.user_id = b.id', 'inner')
				 ->where('b.bptd_id =' .$iduser)
				 ->where('status =' .'0')
				 ->where('a.hapus',0);
			return $this->db->get()->num_rows();
    	}
    }





  //   public function jml($idkontrak=null){
		// // $iduser = $this->session->userdata('iduser');
		// $this->db->select('*')
		// 		 ->from('tb_kendaraan')
		// // $this->db->where('user_id =' .$iduser);
		// 		 ->where('kontrak_id =' .$idkontrak)
		// 		 ->where('hapus',0);
		// return $this->db->get()->num_rows(); //jumlah baris
  //   }

    public function cekdata($table,$where){		
		return $this->db->get_where($table,$where);
	}

    public function save(){
		$iduser 				= $this->session->userdata('iduser');
		$ip_address				= $this->input->ip_address();

		$kontrak_id				= $this->input->post('kontrak_id');
		$kode_bus 				= $this->input->post('kode_bus');
		$trayek_id 				= $this->input->post('trayek_dilayani');
		$nopol					= $this->input->post('nopol');
		$thn_produksi			= $this->input->post('thn_produksi');
		$merk_tipe				= $this->input->post('merk_tipe');
		$jml_seat 				= $this->input->post('jml_seat');
		$no_rangka				= $this->input->post('no_rangka');
		$no_stnk				= $this->input->post('no_stnk');
		$masa_stnk				= $this->input->post('masa_stnk');
		$no_kir					= $this->input->post('no_kir');
		$masa_kir				= $this->input->post('masa_kir');
		$bbm					= $this->input->post('bbm');
		$status					= $this->input->post('status');
		$tgl 					= date('Y-m-d H:i:s');

		$config['upload_path']		= './assets/images/kendaraan/';
		$config['allowed_types']	= 'jpg|jpeg|png|gif';
		
    	$this->load->library('upload',$config);

    	if($this->upload->do_upload('foto_depan')){
    		$data1 = $this->upload->data();
    		$depan = $data1['file_name'];
    	}
    	else{
    		$depan = 'bus.png';
    	}
    	if($this->upload->do_upload('foto_belakang')){
    		$data2 = $this->upload->data();
    		$belakang = $data2['file_name'];
    	}else{
    		$belakang = 'bus.png';
    	}
    	if($this->upload->do_upload('foto_kanan')){
    		$data3 = $this->upload->data();
    		$kanan = $data3['file_name'];
    	}else{
    		$kanan = 'bus.png';
    	}
    	if($this->upload->do_upload('foto_kiri')){
    		$data4 = $this->upload->data();
    		$kiri = $data4['file_name'];
    	}else{
    		$kiri = 'bus.png';
    	}

		$data = array(
			'user_id' 			=> $iduser,
			'kontrak_id' 		=> $kontrak_id,
			'trayek_id' 		=> $trayek_id,
			'kode_bus' 			=> $kode_bus,	
			'nopol'				=> $nopol,
			'thn_produksi'	 	=> $thn_produksi,
			'merk_tipe'			=> $merk_tipe,
			'jml_seat'			=> $jml_seat,
			'no_rangka'			=> $no_rangka,
			'no_stnk' 			=> $no_stnk,
			'masa_stnk' 		=> $masa_stnk,
			'no_kir' 			=> $no_kir,
			'masa_kir'	 		=> $masa_kir,
			'bbm' 				=> $bbm,
			'status' 			=> $status,
			'foto_depan' 		=> $depan,
			'foto_belakang' 	=> $belakang,
			'foto_kanan' 		=> $kanan,
			'foto_kiri' 		=> $kiri,
			'ip_address' 		=> $ip_address,
			'date' 				=> $tgl
			);
		$res = $this->db->insert('tb_kendaraan',$data);
		return $res;			
	}

	public function update($id){
		$this->db->select('*');
		$this->db->from('tb_kendaraan');
		$this->db->where('id', $id);
		$query = $this->db->get()->result_array();

		foreach ($query as $q) {
			$fDepan = $q['foto_depan'];
			$fBelakang = $q['foto_belakang'];
			$fKanan = $q['foto_kanan'];
			$fKiri = $q['foto_kiri'];
			$tgl_edit = $q['tgl_edit'];
		}

		$iduser 		= $this->session->userdata('iduser');
		$ip_address		= $this->input->ip_address();

		$kontrak_id				= $this->input->post('kontrak_id');
		$trayek_id 				= $this->input->post('trayek_dilayani');
		$kode_bus 				= $this->input->post('kode_bus');
		$nopol					= $this->input->post('nopol');
		$thn_produksi			= $this->input->post('thn_produksi');
		$merk_tipe				= $this->input->post('merk_tipe');
		$jml_seat 				= $this->input->post('jml_seat');
		$no_rangka				= $this->input->post('no_rangka');
		$no_stnk				= $this->input->post('no_stnk');
		$masa_stnk				= $this->input->post('masa_stnk');
		$no_kir					= $this->input->post('no_kir');
		$masa_kir				= $this->input->post('masa_kir');
		$bbm					= $this->input->post('bbm');
		$status					= $this->input->post('status');
		$tgl 					= date('Y-m-d H:i:s');

		$config['upload_path']		= './assets/images/kendaraan/';
		$config['allowed_types']	= 'jpg|jpeg|png|gif';
		
    	$this->load->library('upload',$config);

    	if($this->upload->do_upload('foto_depan')){
    		$data1 = $this->upload->data();
    		$foto_depan = $data1['file_name'];
    	}else{
    		$foto_depan = $fDepan;
    	}

    	if($this->upload->do_upload('foto_belakang')){
    		$data2 = $this->upload->data();
    		$foto_belakang = $data2['file_name'];
    	}else{
    		$foto_belakang = $fBelakang;
    	}

    	if($this->upload->do_upload('foto_kanan')){
    		$data3 = $this->upload->data();
    		$foto_kanan = $data3['file_name'];
    	}else{
    		$foto_kanan = $fKanan;
    	}

    	if($this->upload->do_upload('foto_kiri')){
    		$data3 = $this->upload->data();
    		$foto_kiri = $data3['file_name'];
    	}else{
    		$foto_kiri = $fKiri;
    	}

		$data = array(
			'kontrak_id' 		=> $kontrak_id,
			'kode_bus' 			=> $kode_bus,
			'trayek_id' 		=> $trayek_id,	
			'nopol'				=> $nopol,
			'thn_produksi'	 	=> $thn_produksi,
			'merk_tipe'			=> $merk_tipe,
			'jml_seat'			=> $jml_seat,
			'no_rangka'			=> $no_rangka,
			'no_stnk' 			=> $no_stnk,
			'masa_stnk' 		=> $masa_stnk,
			'no_kir' 			=> $no_kir,
			'masa_kir'	 		=> $masa_kir,
			'bbm' 				=> $bbm,
			'status' 			=> $status,
			'foto_depan' 		=> $foto_depan,
			'foto_belakang' 	=> $foto_belakang,
			'foto_kanan' 		=> $foto_kanan,
			'foto_kiri' 		=> $foto_kiri,
			'tgl_edit' 			=> $tgl_edit.'###'.$tgl.','.$iduser.','.$ip_address
			);
		$res = $this->db->where('id', $id);
		$res = $this->db->update('tb_kendaraan', $data);
		return $res;			
	}  

	public function delete($id){
		$data = array(
			'hapus' => 1
			);
		$res = $this->db->where('id',$id)
						->update('tb_kendaraan', $data);
		return $res;
	}  

	// public function delete($id){
	// 	$this->db->where('id',$id); 	
	// 	$res = $this->db->delete('tb_kendaraan');
	// 	return $res;
	// }





	
//==================================BPTD================================================
//==================================BPTD================================================
//==================================BPTD================================================
	public function bptd_get($id=null){
		$iduser = $this->session->userdata('iduser');
		$this->db->select('a.*,b.name,b.bptd_id,c.tglkontrak,d.trayek')
				 ->from('tb_kendaraan a')
				 ->join('tb_user b', 'a.user_id = b.user_id', 'inner')
				 ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'inner')
				 ->join('tb_trayek d', 'd.id = a.trayek_id', 'left')
				 ->where('b.bptd_id', $iduser);
		return $this->db->get()->result_array();
    }

    public function bptd_getBYkontrak($kontrak_id=null){
		$this->db->select('*')
				 ->from('tb_kendaraan')
				 ->where('kontrak_id', $kontrak_id);
		return $this->db->get()->result_array();
    }

  //   public function bptd_jml($idkontrak=null){
		// // $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_kendaraan');
		// // $this->db->where('user_id =' .$iduser);
		// $this->db->where('kontrak_id =' .$idkontrak);
		// return $this->db->get()->num_rows(); //jumlah baris
  //   }

  //   public function bptd_jmlSGO($idkontrak=null){
		// // $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_kendaraan');
		// // $this->db->where('user_id =' .$iduser);
		// $this->db->where('kontrak_id =' .$idkontrak);
		// $this->db->where('status =' .'1');
		// return $this->db->get()->num_rows();
  //   }

  //   public function bptd_jmlCDG($idkontrak=null){
		// // $iduser = $this->session->userdata('iduser');
		// $this->db->select('*');
		// $this->db->from('tb_kendaraan');
		// // $this->db->where('user_id =' .$iduser);
		// $this->db->where('kontrak_id =' .$idkontrak);
		// $this->db->where('status =' .'0');
		// return $this->db->get()->num_rows();
  //   }






//==================================NSIONAL================================================
//==================================NSIONAL================================================
//==================================NSIONAL================================================
	public function nasional_get($id=null){
		$this->db->select('a.*,b.name,c.tglkontrak,d.trayek')
			 ->from('tb_kendaraan a')
			 ->join('tb_user b', 'b.user_id = a.user_id', 'left')
			 ->join('tb_kontrak c', 'c.id = a.kontrak_id', 'left')
			 ->join('tb_trayek d', 'd.id = a.trayek_id', 'left')
			 ->where('c.hapus',0)
			 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }

    public function nasional_getBYkontrak($kontrak_id){
		$this->db->select('*')
				 ->from('tb_kendaraan')
				 ->where('kontrak_id', $kontrak_id);
		return $this->db->get()->result_array();
    }





//==================================ADMINISTRATOR================================================
//==================================ADMINISTRATOR================================================
//==================================ADMINISTRATOR================================================
	// public function adm_get($id=null){
	// 	$this->db->select('a.*,b.name,c.tglkontrak,d.trayek')
	// 		 ->from('tb_kendaraan a')
	// 		 ->join('tb_user b', 'b.user_id = a.user_id')
	// 		 ->join('tb_kontrak c', 'c.id = a.kontrak_id')
	// 		 ->join('tb_trayek d', 'd.id = a.trayek_id')
	// 		 // ->where('c.hapus',0)
	// 		 // ->where('d.hapus',0)
	// 		 // ->where('a.hapus',0)
	// 		 ->order_by('b.name', 'asc');
	// 	return $this->db->get()->result_array();
 //    }

    public function adm_get($id=null){
		$this->db->select('a.*,b.name,c.tglkontrak,d.trayek')
			 ->from('tb_kendaraan a')
			 ->join('tb_user b', 'b.user_id = a.user_id','left')
			 ->join('tb_kontrak c', 'c.id = a.kontrak_id','left')
			 ->join('tb_trayek d', 'd.id = a.trayek_id','left')
			 // ->where('b.bptd_id !=',0) //jika bptd_id = 0 dia adalah user/cabang
			 ->where('a.hapus',0)
			 ->where('c.hapus',0)
			 ->where('d.hapus',0)
			 ->order_by('b.name', 'asc');
		return $this->db->get()->result_array();
    }

    public function adm_jml(){
		$this->db->select('a.*,b.name,c.tglkontrak,d.trayek')
			 ->from('tb_kendaraan a')
			 ->join('tb_user b', 'b.user_id = a.user_id','left')
			 ->join('tb_kontrak c', 'c.id = a.kontrak_id','left')
			 ->join('tb_trayek d', 'd.id = a.trayek_id','left')
			 // ->where('b.bptd_id !=',0) //jika bptd_id = 0 dia adalah user/cabang
			 ->where('a.hapus',0)
			 ->where('c.hapus',0)
			 ->where('d.hapus',0);
		return $this->db->get()->num_rows();
    }

    public function adm_get_odoo(){
    	$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://myperintis.com/api/vehicle_perintis?limit=10000&page=0",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"access_token: access_token_dceb178114cdeb662028889480956926edb91b87"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;
		return $response;
    }

  //   public function adm_getBYkontrak($kontrak_id){
		// $this->db->select('*')
		// 		 ->from('tb_kendaraan')
		// 		 ->where('kontrak_id', $kontrak_id);
		// return $this->db->get()->result_array();
  //   }
//==================================ADMINISTRATOR================================================
}
