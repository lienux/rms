<?php 
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Web {
	public $ci;

	// public $view;
	// public $auth;

	function __construct(){
		$this->ci = & get_instance();

		// $this->ci->load->config('web');
		// $this->ci->load->library('session');
		// $this->ci->load->library('pagination');		

		// $cthemes = $this->ci->config->item('theme');		
		// $this->ci->load->remove_view_path(theme_path());
		// $this->ci->load->add_view_path(theme_path('cms'));

		// $this->view = new View($this);
		// $this->auth = new Auth($this);
	}

    public function page_login()
    {
    	if($this->ci->session->userdata('logged_in') == TRUE){
			redirect("dashboard");
		}

    	$web = $this->ci->config->item('webconf');
	
		$items = array(
			'public' => base_url().'public/'
		);

		$data = $web+$items;

		return $data;
    	
    }

    public function page_admin($collapse_pengaturan=null)
    {
    	if($this->ci->session->userdata('logged_in') != TRUE){
			redirect("login");
		}

    	$web = $this->ci->config->item('webconf');
    	$level = $this->ci->session->userdata('level');

		if($level == 0){
			$level_name = 'Surveyer';
		}elseif($level == 1){
			$level_name = 'Admin';	
		}elseif ($level==3) {
			$level_name = 'Pimpinan';
		}

		// if ($menu=='dashboard') {
		// 	$set_menu = ['menu_dashboard'=>'active'];
		// }elseif ($menu=='data_jalan') {
		// 	$set_menu = ['menu_data_jalan'=>'active'];
		// }else{
		// 	$set_menu = '';
		// }

		$items = array(
			'public' => base_url().'public/',
			'level_id' => $this->ci->session->userdata('level'),
		    'level_name' => $level_name,
		    'name' => $this->ci->session->userdata('name'),
		    'username' => $this->ci->session->userdata('username'),
		    'logout' => base_url().'logout',
		    'link_menu_dashboard' => base_url().'dashboard',
		    'link_menu_data_jalan' => base_url().'jalan',
		    'link_menu_data_rambu' => base_url().'rambu',
		    'link_menu_profile' => base_url().'profile',
		    'collapse_pengaturan'=>$collapse_pengaturan
		);

		$data = $web+$items;

		return $data;
    	
    }

    public function foo()
    {
            $this->CI->load->helper('url');
            redirect();
    }

    public function bar()
    {
            echo $this->CI->config->item('base_url');
    }

    public function user_role()
    {
    	return $this->ci->session->userdata('user_role');
    }

}