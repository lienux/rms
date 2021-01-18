<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('web');

		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect("login");
		}
	}

	public function index()
	{
		$web = $this->web->page_admin();
		$data = $web+['menu_dashboard'=>'active'];
		$data['content'] = $this->load->view('card_info',array(),true);
		
		$this->parser->parse('templates/'.themes().'/layout_admin', $data);

		// $this->parser->parse('app/admin_js', $data);
	}

	public function session(){
		$data =	array(
				'session' => $_SESSION,
				'cookie' => $_COOKIE
			);
		echo json_encode($data);
	}

}