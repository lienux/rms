// base_url = '<?= base_url();?>';

var page_dashboard = 'dashboard',
    page_vehicle = 'vehicle',
    vehicle_list = 'vehicle_list',
    page_driver = 'driver',
    page_route = 'route',
    page_geofence = 'geofence',
    page_issue = 'issue',
    page_monitoring = 'monitoring';

$('#btn_dashboard').addClass('active');
$('.maryam').load(page_dashboard);

// function page_limit(){
//     Cookies.set('page',1);
//     Cookies.set('limit',20);
// }

$('.klik').click(function(){
    $('.sidebar_klik a').removeClass('active');
    $(this).addClass('active');
    var menuID = $(this).attr('id');
    $(this).addClass('active');

    if(menuID == "btn_dashboard"){
        $('.maryam').load(page_dashboard);
        // Cookies.set('menu', 'dash', { expires: 1 });
    }
    else if(menuID == "btn_issue"){
        $('.maryam').load(page_issue);
    }
    else if(menuID == "btn_vehicle"){
        $('.maryam').load(page_vehicle);
        // Cookies.set('menu', 'trip_odoo', { expires: 1 });
        // delete_cookie('trip_status_odoo');
        // Cookies.set('trip_status_odoo', 'trip', { expires: 1 });
        // page_limit();                    
    }
    else if(menuID == "btn_driver"){
        $('.maryam').load(page_driver);
    }
    else if(menuID == "btn_route"){
        $('.maryam').load(page_route);
    }
    else if(menuID == "btn_geofence"){
        $('.maryam').load(page_geofence);
    }
    else if(menuID == "btn_monitoring"){
        $('.maryam').load(page_monitoring);
    }
    // else if(menuID == "m_draft_odoo"){
    //     $('.maryam').load(trip_from_odoo);
    //     Cookies.set('menu', 'draft_odoo', { expires: 1 });
    //     Cookies.set('trip_status_odoo', 'draft', { expires: 1 });
    //     page_limit();
    // }
    // else if(menuID == "m_1st_odoo"){
    //     $('.maryam').load(trip_from_odoo);
    //     Cookies.set('menu', '1st_odoo', { expires: 1 });
    //     Cookies.set('trip_status_odoo', 'a_stop', { expires: 1 });
    //     page_limit();
    // }
    // else if(menuID == "m_done_odoo"){
    //     $('.maryam').load(trip_from_odoo);
    //     Cookies.set('menu', 'end_odoo', { expires: 1 });
    //     Cookies.set('trip_status_odoo', 'end', { expires: 1 });
    //     page_limit();
    // }
    // else if(menuID == "m_pending_odoo"){
    //     $('.maryam').load(trip_from_odoo);
    //     Cookies.set('menu', 'pending_odoo', { expires: 1 });
    //     Cookies.set('trip_status_odoo', 'pending', { expires: 1 });
    //     page_limit();
    // }
});

function logout(){
    $.ajax({
        url: 'auth/logout_proccess',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loder_out').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loder_out').hide();
        },
        success: function(response){
            // Cookies.remove('kontrak_id');
            // Cookies.remove('verifikasi');
            $(location).attr('href','login');
        }
    });
};

// function simpan_trip(){
//     var formData = $('form').serialize();
//     var urlData = base_url + 'adm/generate/simpan_trip';
//     $.ajax({
//         url: urlData,
//         type: 'GET',
//         dataType: 'JSON',
//         data: formData,
//         contentType: false,
//         processData: false,
//         // beforeSend: function(e) {
//         //     $('#loder').show();
//         //     if(e && e.overrideMimeType) {
//         //         e.overrideMimeType('application/jsoncharset=UTF-8')
//         //     }
//         // },
//         // complete: function(){
//         //     $('#loder').hide();
//         // },
//         success: function(response){
//             // console.log(response);
//         }
//     });
// }

// function get_hasil(trip_id){
//     $.ajax({
//         url: base_url + 'adm/trip/get_detail/'+trip_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);

//             // $('#input_ongoing').val(response.data[0].a_start_time);
//             // $('#input_1st_trip').val(response.data[0].a_stop_time);
//             // $('#input_2nd_trip').val(response.data[0].b_start_time);
//             // $('#input_done').val(response.data[0].b_stop_time);
//             // var status_id = response.data[0].status_id;

//             // if (status_id=='3') {
//             //     status = 'Done';
//             // }else if (status_id=='2') {
//             //     status = '1st Trip';
//             // }

//             // $('#input_status').val(status);
//         }
//     });
// }

// generate_status_aktif();

// function generate_status_aktif(){
//     get_generate_aktif();
//     get_generate_aktif2();
// }

// function get_generate_aktif(){
//     $.ajax({
//         url: base_url + 'adm/trip/generate_aktif/1',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             if (response.status==true) {
//                 $('#generate_status_spinner').show();
//                 $('#region_aktif').html(response.data[0].region_name);
//                 $('#region_draft_time').html(response.data[0].draft_time);
//                 $('#region_driver').html(response.data[0].driver_name);
//                 $('#region_vehicle').html(response.data[0].vehicle_name);
//             } else {
//                 $('#generate_status_spinner').hide();
//                 $('#region_aktif').html('');
//                 $('#region_draft_time').html('');
//                 $('#region_driver').html('');
//                 $('#region_vehicle').html('');
//             }
//         }
//     });
// }

// function get_generate_aktif2(){
//     $.ajax({
//         url: base_url + 'adm/trip/generate_aktif/2',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             if (response.status==true) {
//                 $('#generate_status_spinner_').show();
//                 $('#region_aktif_').html(response.data[0].region_name);
//                 $('#region_draft_time_').html(response.data[0].draft_time);
//                 $('#region_driver_').html(response.data[0].driver_name);
//                 $('#region_vehicle_').html(response.data[0].vehicle_name);
//             } else {
//                 $('#generate_status_spinner_').hide();
//                 $('#region_aktif_').html('');
//                 $('#region_draft_time_').html('');
//                 $('#region_driver_').html('');
//                 $('#region_vehicle_').html('');
//             }
//         }
//     });
// }


// function hapus(id){
//     $('#loder').hide();
//     $('#modalHapus').modal('show');
//     $('#btn-hapus').attr('onclick','hapus_proses('+id+');');
// }

// function hapus_proses(id){
//     alert('on progress');
// }

// function send_to_odoo(){
//     var formData = $('form').serialize();
//     var urlData = base_url + 'adm/generate/kirim';
//     $.ajax({
//         url: urlData,
//         type: 'GET',
//         dataType: 'JSON',
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#loader_send').show();
//             $('#btn-send,#btn-gene').attr('disabled',true);
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#loader_send').hide();
//             $('#btn-send,#btn-gene').attr('disabled',false);
//         },
//         success: function(response){
//             // console.log(response);
//             if (response.message=='success') {
//                 var state = response.data[0].state;
//                 if (state=='end') {
//                     status = 'selesai';
//                 }
//                 $('#alif-tiara').html('Status: '+status+' | '+response.data[0].spda_number);
//                 getJML();
//                 jml_trip();
//                 // tabel_hasil_generate();
//                 list_draft();
//             }
//         }
//     });
// }