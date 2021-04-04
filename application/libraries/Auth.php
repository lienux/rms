<?php 
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, Ngaji Ngoding (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
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

    public function user_role()
    {
    	return $this->ci->session->userdata('user_role');
    }

    public function session()
    {
		$data =	array(
				'session' => $_SESSION
			);
		echo json_encode($data);
	}

	public function cookie()
	{
		$data =	array(
				'cookie' => $_COOKIE
			);
		echo json_encode($data);
	}

}