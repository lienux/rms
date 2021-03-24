$('#nmpo').html('GPS Log');

var dash = base_url + 'adm/dashboard',
    trip_from_odoo = base_url + 'adm/trip/from_odoo',
    trip_from_db = base_url + 'adm/trip/from_db',
    ganti_passwd = base_url + 'adm/ganti_passwd',
    pengaturan = base_url + 'adm/pengaturan',
    status_kendaraan = base_url + 'adm/data_bus'

$('#dash_').addClass('active');
$('.maryam').load(dash);

function page_limit(){
    Cookies.set('page',1);
    Cookies.set('limit',20);
}

$('.klik').click(function(){
    $('.sidebar_klik a').removeClass('active');
    $(this).addClass('active');
    var menuID = $(this).attr('id');
    $(this).addClass('active');

    if(menuID == "dash_"){
        $('.maryam').load(dash);
        Cookies.set('menu', 'dash', { expires: 1 });
    }

    // MENU KOTAK =======================================================================
    else if(menuID == 'status_kendaraan_'){
        $('.maryam').load(status_kendaraan);
    }

    // MENU Odoo =========================================================================
    else if(menuID == "m_trip_odoo"){
        $('.maryam').load(trip_from_odoo);
        Cookies.set('menu', 'trip_odoo', { expires: 1 });
        // delete_cookie('trip_status_odoo');
        Cookies.set('trip_status_odoo', 'trip', { expires: 1 });
        page_limit();                    
    }
    else if(menuID == "m_draft_odoo"){
        $('.maryam').load(trip_from_odoo);
        Cookies.set('menu', 'draft_odoo', { expires: 1 });
        Cookies.set('trip_status_odoo', 'draft', { expires: 1 });
        page_limit();
    }
    else if(menuID == "m_1st_odoo"){
        $('.maryam').load(trip_from_odoo);
        Cookies.set('menu', '1st_odoo', { expires: 1 });
        Cookies.set('trip_status_odoo', 'a_stop', { expires: 1 });
        page_limit();
    }
    else if(menuID == "m_done_odoo"){
        $('.maryam').load(trip_from_odoo);
        Cookies.set('menu', 'end_odoo', { expires: 1 });
        Cookies.set('trip_status_odoo', 'end', { expires: 1 });
        page_limit();
    }
    else if(menuID == "m_pending_odoo"){
        $('.maryam').load(trip_from_odoo);
        Cookies.set('menu', 'pending_odoo', { expires: 1 });
        Cookies.set('trip_status_odoo', 'pending', { expires: 1 });
        page_limit();
    }

    // Menu Cron =============================================================================
    else if(menuID == "m_trip_db"){
        $('.maryam').load(trip_from_db);
        Cookies.set('menu', 'trip_db', { expires: 1 });
        delete_cookie('trip_status_db');
    }
    else if(menuID == "m_queue_db"){
        $('.maryam').load(trip_from_db);
        Cookies.set('menu', 'queue_db', { expires: 1 });
        Cookies.set('trip_status_db', 'queue', { expires: 1 });
    }
    else if(menuID == "m_1st_db"){
        $('.maryam').load(trip_from_db);
        Cookies.set('menu', '1st_db', { expires: 1 });
        Cookies.set('trip_status_db', 'a_stop', { expires: 1 });
    }
    else if(menuID == "m_done_db"){
        $('.maryam').load(trip_from_db);
        Cookies.set('menu', 'end_db', { expires: 1 });
        Cookies.set('trip_status_db', 'end', { expires: 1 });
    }
    else if(menuID == "m_pending_db"){
        $('.maryam').load(trip_from_db);
        Cookies.set('menu', 'pending_db', { expires: 1 });
        Cookies.set('trip_status_db', 'pending', { expires: 1 });
    }
});

function otw(){
    alert('On Progress...');
}

function modal_pengaturan(){
    $('#modal_pengaturan').modal('show');
    // alert('sukses');
}

function logout(){
    $.ajax({
        url: base_url + 'login/logout',
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
            $(location).attr('href',base_url);
        }
    });
};

setInterval(function(){ generate_status_aktif(); }, 1000);
setInterval(function(){ load_jml_trip(); }, 1000);

function load_jml_trip(){
    jml_trip_db();
    jml_trip_odoo();
}

function jml_trip_db(){
    var link = base_url + 'adm/trip/jml';

    $.ajax({
        url: link,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){

            // var jml_pending_sekarang = $('#jml_pending_db').html();

            // if (jml_pending_sekarang != response.pending) {
            //     audioplay();
            // }

            // console.log(response);
            $('#jml_trip_db').html(response.trip);
            $('#jml_queue_db').html(response.queue);
            $('#jml_1st_db').html(response.sampai);
            $('#jml_done_db').html(response.selesai);
            $('#jml_pending_db').html(response.pending);                        
        }
    });
};

function jml_trip_odoo(){
    var link = base_url + 'odoo/trip/jml';

    $.ajax({
        url: link,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){

            // var jml_draft_sekarang = $('#jml_draft_odoo').html();

            // if (jml_draft_sekarang != response.jml_draft) {
            //     audioplay();
            // }

            // console.log(response);
            $('#jml_trip_odoo').html(response.jml_trip);

            // $('#jml_draft').html(response.jml_draft_);
            $('#jml_draft_odoo').html(response.draft_not_cron);

            // $('#jml_sampai').html(response.jml_sampai_);
            $('#jml_1st_odoo').html(response.jml_sampai);

            // $('#jml_selesai').html(response.jml_selesai_);
            $('#jml_done_odoo').html(response.jml_selesai);

            $('#jml_pending_odoo').html(response.jml_pending);
        }
    });
};

function audioplay(){
    var x = document.getElementById("xyz"); 

    x.play(); 
}

function page(){

    var cookie_limit = Cookies.get('limit');

    var menu = Cookies.get('menu');
    if (menu=='draft') {
        var total_data = $('#jml_draft_').html();
    }else if(menu=='sampai'){
        var total_data = $('#jml_sampai_').html();
    }else if(menu=='selesai'){
        var total_data = $('#jml_selesai_').html();
    }

    var jml_page = parseInt(total_data)/20;

    var pembulatan = Math.ceil(jml_page);


    var cok_page = Cookies.get('page');
    if (cok_page > 1) {
        var a = parseInt(cok_page);
        var b = 1;

        var page = a - b;

        var c = page * 20;
        var d = parseInt(c) - 19;

        var row_on_page = cookie_limit * page;

        Cookies.set('page',page);
        $('#page').html(d);
        $('#total_page').html(row_on_page);

        cek();
    }
}

function page_(){

    var cookie_limit = Cookies.get('limit');

    var menu = Cookies.get('menu');

    if (menu=='trip_odoo') {
        var total_data = $('#jml_trip_odoo').html();
    }else if(menu=='draft_odoo'){
        var total_data = $('#jml_draft_odoo').html();
    }else if(menu=='1st_odoo'){
        var total_data = $('#jml_1st_odoo').html();
    }else if (menu=='end_odoo') {
        var total_data = $('#jml_done_odoo').html();
    }else if (menu=='pending_odoo'){
        var total_data = $('#jml_pending_odoo').html();
    }

    var jml_page = parseInt(total_data)/20;

    var pembulatan = Math.ceil(jml_page);

    var cok_page = Cookies.get('page');
    if (cok_page < pembulatan) {
        var a = parseInt(cok_page);
        var b = 1;

        var page = a + b;

        var c = page * 20;
        var d = parseInt(c) - 19;

        var row_on_page = cookie_limit * page;

        Cookies.set('page',page);
        $('#page').html(d);
        $('#total_page').html(row_on_page);

        cek();
    }
}