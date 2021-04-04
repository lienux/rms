<?php
/**
 * @author   M. Ali Imron <lienux.qq@gmail.com>
 * @link http://bocahganteng.com
 * @copyright	Copyright (c) 2020, NGAJI NGODING NGOPREK (http://ngajingoding.com)
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Helper untuk fungsi global
 */

if(!function_exists('base_path')){

	/**
	 * Kembalikan path utama index
	 * @param  string $name folder berikutnya
	 * @return string path
	 */
	function base_path($name=''){
		$ci = & get_instance();

		return trim($ci->config->item('base_path'), '/').$name.'/';		
	}

}

if(!function_exists('public_url')){
	/**
	 * Mengembalikan direktori folder public, file css/js/font/dll yang umum
	 * @return String Url public folder
	 */
	function public_url($name=''){
		$ci = & get_instance();

		return trim(base_url().$ci->config->item('public_dir'), '/').$name.'/';
	}
}

if(!function_exists('media_path')){
	/**
	 * Mengembalikan url folder media untuk upload
	 * @param  string $type tipe media, default gambar
	 * @return String       URL untuk media
	 */
	function media_path($type=''){
		$ci = & get_instance();	

		return trim($ci->config->item('base_path').$ci->config->item('media_dir'), '/').$type.'/';		
	}
}

if(!function_exists('media_url')){
	/**
	 * Mengembalikan url folder media untuk upload
	 * @param  string $type tipe media, default gambar
	 * @return String       URL untuk media
	 */
	function media_url($type=''){
		$ci = & get_instance();	

		return trim(base_url().$ci->config->item('media_dir'), '/').$type.'/';
	}
}

if(!function_exists('theme_name')){
	/**
	 * Mengembalikan nama dari theme yang sedang aktif
	 * @return String Nama theme yang aktif
	 */
	function theme_name(){
		$ci = & get_instance();

		$theme = $ci->config->item('theme');

		return $theme['name'];	
	}
}

if(!function_exists('theme_path')){
	/**
	 * Mengembalikan Path Theme
	 * @return String Relative Path (@todo) nggak tahu kenapa absolute path tidak bisa
	 */
	function theme_path($name=''){
		$ci = & get_instance();

		$theme = $ci->config->item('theme');

		if(empty($name)) $name = $theme['name'];
		
		if(isset($theme['base'])){
			return $theme['base'].$name.'/';
		}else{
			return FCPATH.$theme['path'].$theme['name'].'/';
		}		
	}
}


if(!function_exists('theme_url')){
	/**
	 * Mengembalikan url dari themes yang sedang aktif
	 * @return String Url themes
	 */
	function theme_url($name=''){
		$ci = & get_instance();

		$theme = $ci->config->item('theme');

		if(empty($name)) $name = $theme['name'];

		return base_url().$theme['path'].$name.'/';
	}
}

if(!function_exists('theme_cms_url')){
	/**
	 * Mengembalikan url dari themes yang sedang aktif
	 * @return String Url themes
	 */
	function theme_cms_url($name=''){
		$ci = & get_instance();

		$theme = $ci->config->item('theme');

		if(empty($name)) $name = $theme['cms'];

		return base_url().$theme['path'].$name.'/';
	}
}

if(!function_exists('is_view_exist')){

	/**
	 * [is_view_exist description]
	 * @param  [type]  $filename [description]
	 * @return boolean           [description]
	 */
	function is_view_exist($filename){

		$ci = & get_instance();

 		return $ci->load->is_view_exist($filename);		
	}
}

// if(!function_exists('asset_url')){
// 	/**
// 	 * Mengembalikan url dari themes yang sedang aktif
// 	 * @return String Url themes
// 	 */
// 	function asset_url($name=''){
// 		// $ci = & get_instance();

// 		// $theme = $ci->config->item('theme');

// 		// if(empty($name)) $name = $theme['cms'];

// 		// return base_url().$theme['path'].$name.'/';
		
// 		// return base_url().'assets_web/';
		
// 		return 'http://localhost/assets_web/';
// 	}
// }

// $base_url = 'http://localhost/';

// if(!function_exists('api_key_perintis')){

// 	function api_key_perintis($name=''){

// 		$key = 'access_token_dceb178114cdeb662028889480956926edb91b87';

// 		return $key;
// 	}
// }

if(!function_exists('themes')){

	function themes($name=''){

		return 'default';
	}
}

if(!function_exists('user_role')){

	function user_role($name=''){

		return $this->session->userdata('user_role');
	}
}
// if(!function_exists('plugins_url')){
	
// 	function plugins_url($name=''){
		
// 		return 'public/plugins/';
// 	}
// }

// if(!function_exists('app')){
	
// 	function app($name=''){
		
// 		return 'public/app/';
// 	}
// }

// if(!function_exists('assets_url')){
	
// 	function assets_url($name=''){
		
// 		return 'http://localhost/public/assets/';
// 	}
// }


