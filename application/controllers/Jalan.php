<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('web');
		$this->load->model('Mod_data_master', 'mdMaster');
		$this->load->model('Mod_jalan', 'mJalan');

		if($this->session->userdata('logged_in') != TRUE){
			redirect("login");
		}

	}

	public function index()
	{
		$style = array(
			'col'=>'col-lg-12',
			'disabled'=>''
		);

		$web = $this->web->page_admin();		
		$res = $this->mJalan->get();
		$data_list = array('data_table'=>$res)+$style;

		// echo json_encode($data);

		$data_layout = $web+['menu_data_jalan'=>'active'];
		$data_layout['page'] = $this->parser->parse('page/jalan/list_data',$data_list,true);
		
		$this->parser->parse('templates/'.themes().'/layout_admin', $data_layout);

	}

	public function tambah()
	{
		$style = array(
			'col'=>'col-lg-8',
			'disabled'=>'disabled'
		);

		$web = $this->web->page_admin();
		$data_layout = $web+['menu_data_jalan'=>'active'];
		$res = $this->mJalan->get();

		$data = array('data_table'=>$res)+$style;

		// echo json_encode($data);
		$data_form = array(
			'do_to'=>'doSimpan'
		);
		$data_form['data'] = $this->parser->parse('page/jalan/list_data',$data,true);
		$data_form['list_status_jalan'] = $this->mdMaster->get_list_status_jalan();

		$data_layout['page'] = $this->parser->parse('page/jalan/form',$data_form,true);

		$this->parser->parse('templates/'.themes().'/layout_admin', $data_layout);
	}

	public function doSimpan()
	{
		$data = array(
			'name'=>$this->input->post('input_jalan'),
			'status_jalan_id'=>$this->input->post('opt_status'),
			'latitude'=>$this->input->post('input_lat'),
			'longitude'=>$this->input->post('input_lon')
		);

		$res = $this->mJalan->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('message', 'Alhamdulillah... <span class="font-weight-bold">'.$this->input->post('input_jalan').'</span> berhasil tersimpan...');
			redirect("jalan");
		}else{
			echo "Gagal!";
		}

	}

	public function edit($id=null)
	{
		if ($id==null) {
			# code...
			echo "id tidak boleh kosong!";
		}else{
			$style = array(
				'col'=>'col-lg-8',
				'disabled'=>'disabled'
			);

			$web = $this->web->page_admin();
			$data_layout = $web+['menu_data_jalan'=>'active'];
			$res = $this->mJalan->get();
			// $detail = $this->mJalan->detail($id);
			// echo json_encode($res);

			$data = array('data_table'=>$res)+$style;

			// echo json_encode($data);
			$data_form = array(
				'do_to'=>'doUpdate'
			);
			$data_form['data'] = $this->parser->parse('page/jalan/list_data',$data,true);
			$data_form['list_status_jalan'] = $this->mdMaster->get_list_status_jalan();
			$data_form['detail'] = $this->mJalan->detail($id);

			$data_layout['page'] = $this->parser->parse('page/jalan/form',$data_form,true);

			$this->parser->parse('templates/'.themes().'/layout_admin', $data_layout);
		}
	}

	public function doUpdate($id)
	{
		$data = array(
			'name'=>$this->input->post('input_jalan'),
			'status_jalan_id'=>$this->input->post('opt_status'),
			'latitude'=>$this->input->post('input_lat'),
			'longitude'=>$this->input->post('input_lon')
		);

		$res = $this->mJalan->update($id,$data);

		if ($res > 0) {
			$this->session->set_flashdata('message', 'Alhamdulillah... berhasil tersimpan...');
			redirect("jalan/edit/".$id);
		}else{
			echo "Gagal!";
		}
	}

	public function doHapus($id)
	{
		$res = $this->mJalan->hapus($id);

		if ($res > 0) {
			$this->session->set_flashdata('message', 'Alhamdulillah... berhasil dihapus...');
			redirect("jalan");
		}else{
			echo "Gagal!";
		}
	}

}