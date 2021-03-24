<script type="text/javascript">
base_url = '<?=base_url();?>';
cokies_kontrak_id = Cookies.get('kontrak_id');
// jmlTrayek();
// jmlKendaraan();
// jmlPengemudi();

// get_jml();
// dataTampil();
// jmlRitase();
// SGO();
// CDG();
// getPesan();

function get_jml(){
    $.ajax({
        url: base_url + 'dashboard/get_jml',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            console.log(response);
            $('#ico_jml_trayek,#jml_trayek').html(response.jml_trayek);
            $('#ico_jml_kendaraan').html(response.jml_kendaraan.kendaraan_semua);
            $('#ico_jml_pengemudi,#jml_pengemudi').html(response.jml_pengemudi);
            $('#sgo').html(response.jml_kendaraan.kendaraan_sgo);
            $('#cdg').html(response.jml_kendaraan.kendaraan_cdg);
        }
    });
};

function dataTampil(){
    $.ajax({
        url: base_url + 'kontrak/get/'+cokies_kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#lodertabel').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#lodertabel').hide();
        },
        success: function(response){
            // console.log(response);
            $('#no_kontrak').html(response.ngajingoding[0].no_kontrak);
            $('#tglkontrak').html(response.ngajingoding[0].tglkontrak);
            $('#alamat').html(response.ngajingoding[0].alamat);
            $('#pimpinan').html(response.ngajingoding[0].pimpinan);
        }
    });
};

function jmlRitase(){
    $.ajax({
        url: base_url + 'trayek/jmlRitase/'+cokies_kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            $('#ritase_harian').html(response.jml_harian);
            $('#ritase_tahunan').html(response.jml_tahunan);
        }
    });
};

// function SGO(){
//     $.ajax({
//         url: base_url + 'vehicle/jmlSGO/'+cokies_kontrak_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,        
//         success: function(response){
//             $('#sgo').html(response.sgo);
//         }
//     });
// };

// function CDG(){
//     $.ajax({
//         url: base_url + 'vehicle/jmlCDG/'+cokies_kontrak_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,        
//         success: function(response){
//             $('#cdg').html(response.cdg);
//         }
//     });
// };

// function jmlTrayek(){
//     $.ajax({
//         url: base_url + 'trayek/jml/'+cokies_kontrak_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             $('#ico_jml_trayek').html(response.jml_trayek);
//             // $('#jml_trayek').html(response.jml_trayek);
//         }
//     });
// };

// function jmlKendaraan(){
//     $.ajax({
//         url: base_url + 'vehicle/jml/'+cokies_kontrak_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             $('#ico_jml_kendaraan').html(response.jml_kendaraan);
//         }
//     });
// };

// function jmlPengemudi(){
//     $.ajax({
//         url: base_url + 'driver/jmlBYkontrak/'+cokies_kontrak_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             $('#jml_pengemudi').html(response.jml_pengemudi);
//             // $('#ico_jml_pengemudi').html(response.jml_pengemudi);
//         }
//     });
// };
</script>