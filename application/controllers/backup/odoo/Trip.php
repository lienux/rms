<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Mod_odoo', 'mOd');
    }

    public function index(){
        $region_id = get_cookie('cok_region_id');
        $start_time_draft = get_cookie('start_time_draft');
        $end_time_draft = get_cookie('end_time_draft');

        if ($region_id != '') {
            $satu = '&region_id='.$region_id;
        }else{
            $satu = '';
        }

        if ($start_time_draft != '') {
            $dua = '&start_time_draft='.$start_time_draft;
        }else{
            $dua = '';
        }

        if ($end_time_draft != '') {
            $tiga = '&end_time_draft='.$end_time_draft;
        }else{
            $tiga = '';
        }
            
        $link = "http://myperintis.com/api/trips?".$satu.$dua.$tiga."&limit=3000&page=0&status=draft&order_by=id&order=desc";
        // $link = "http://myperintis.com/api/trips?".$satu.$dua."&limit=3000&page=0&status=draft&order_by=id&order=desc";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
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
        // $respon = json_decode($response, true);
        // $respon = $respon['data'];

        // $response_code = http_response_code();
        // echo $response_code;

        curl_close($curl);
        echo $response;
        // echo json_encode($respon);
    }

    public function jml_trip(){
        $region_id = get_cookie('cok_region_id');
        $start_time_draft = get_cookie('start_time_draft');
        $end_time_draft = get_cookie('end_time_draft');

        if ($region_id != '') {
            $satu = '&region_id='.$region_id;
        }else{
            $satu = '';
        }

        if ($start_time_draft != '') {
            $dua = '&start_time_draft='.$start_time_draft;
        }else{
            $dua = '';
        }

        if ($end_time_draft != '') {
            $tiga = '&end_time_draft='.$end_time_draft;
        }else{
            $tiga = '';
        }
            
        $link = "http://myperintis.com/api/trips?".$satu.$dua.$tiga."&limit=1&page=0&status=draft&order_by=id&order=desc";
        // $link = "http://myperintis.com/api/trips?".$satu.$dua."&limit=1&page=0&status=draft&order_by=id&order=desc";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
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
        $respon = json_decode($response, true);

        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // echo $response_code;
        
        curl_close($curl);

        if ($response_code==200) {
            $respon_total = $respon['total_data']-1;
            echo json_encode(['total_data'=>$respon_total]);
        }else{         
            echo json_encode(['total_data'=>0]);
        }        
    }

    public function detail($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myperintis.com/api/detail_trip?trip_id=".$id,
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
        echo $response;
    }

    // public function region($region_id){
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "http://myperintis.com/api/trips?region_id=".$region_id."&limit=300&page=0&status=draft&order_by=id&order=desc",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             "access_token: access_token_dceb178114cdeb662028889480956926edb91b87"
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     echo $response;
    // }

    public function set_mulai($trip_id,$time_start){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myperintis.com/api/update_detail_trip?trip_id=".$trip_id."&time_start=".$time_start,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
              "access_token: access_token_83fa7c6f2d414a8dae07c83e693cd7ff29dd2935"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function set_sampai($trip_id,$time_finish){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myperintis.com/api/action_trip_sampai?trip_id=".$trip_id."&time_finish=".$time_finish,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
              "access_token: access_token_83fa7c6f2d414a8dae07c83e693cd7ff29dd2935"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function set_selesai($trip_id,$time_done){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myperintis/api/action_trip_selesai?trip_id=".$trip_id."&time_done=".$time_done,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
              "access_token: access_token_83fa7c6f2d414a8dae07c83e693cd7ff29dd2935"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
