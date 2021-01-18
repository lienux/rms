<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->model('Mod_trip', 'mDraft');
    }

    public function index(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myperintis.com/api/region_perintis?limit=100&page=0",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "access_token: access_token_dceb178114cdeb662028889480956926edb91b87",
                "Cookie: session_id=bfe016687efad8c85cb29c1ea0954d5e679456ad"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}
