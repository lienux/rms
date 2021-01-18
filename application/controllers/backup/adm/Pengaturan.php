<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->model('Mod_hasil', 'mHasil');

        if($this->session->userdata('status') != "login"){
         redirect("login");
        }
    }

    public function index(){
        $this->load->view('adm/pengaturan');
    }

    // public function mulai(){
    //     $this->load->view('adm/status_mulai');
    // }

    // public function sampai(){
    //     $this->load->view('adm/status_sampai');
    // }

    // public function selesai(){
    //     $this->load->view('adm/status_selesai');
    // }

    //  public function tidak_normal(){
    //     $this->load->view('adm/status_tidak_normal');
    // }

    // public function get($stat=null){
    //     $data = $this->mHasil->get($stat);
    //     echo json_encode(['data'=>$data]);
    // }

    // public function get_detail($trip_id){
    //     $data = $this->mHasil->get($trip_id);
    //     echo json_encode(['data'=>$data]);
    // }

    // public function byRegion($region_id){
    //     $data = $this->mHasil->getBYregion($region_id);
    //     echo json_encode(['data'=>$data]);
    // }

    // public function jml(){
    //     $jml = $this->mHasil->jml();
    //     $mulai = $this->mHasil->jml(1);
    //     $sampai = $this->mHasil->jml(2);
    //     $selesai = $this->mHasil->jml(3);
    //     $diluar_jangkauan = $this->mHasil->jml(4);

    //     echo json_encode([
    //         'jml'=>$jml,
    //         'mulai'=>$mulai,
    //         'sampai'=>$sampai,
    //         'selesai'=>$selesai,
    //         'diluar_jangkauan'=>$diluar_jangkauan
    //     ]);
    // }

    // public function hapus($id){
    //     $res = $this->mHasil->delete($id);
    //     if ($res > 0) {
    //         echo json_encode(
    //             [
    //                 'status'=>TRUE,
    //                 'pesan'=>'Data berhasil dihapus...'
    //             ]
    //         );
    //     }else{
    //         echo json_encode(
    //             [
    //                 'status'=>FALSE,
    //                 'pesan'=>'gagal..'
    //             ]
    //         );
    //     }
    // }
}
