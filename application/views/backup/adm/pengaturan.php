<?php  
    $url_region = base_url().'odoo/region';
    $data = file_get_contents($url_region);
    $region = json_decode($data, true);

    $region = $region['data'];
?>

<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="mt-4" id="form-simpan">
    <div class="row justify-content-center" >
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">Pengaturan Tampilan</div>
                <div class="card-body">
                    <form>                       
                        <div class="form-row mb-4">
                            <div class="col-md-3">
                                <span class="font-weight-bold">Tampilkan Data Berdasarkan Region : </span>
                            </div>
                            <div class="col-md-5">
                                <select class="region">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($region as $r): ?>
                                    <option value="<?=$r['id'];?>"><?=$r['region_name'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>                                                                                 
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-3">
                                <span class="font-weight-bold">Tampilakn Draft Dari Tgl : </span>
                            </div> 
                            <div class="col-md-2">
                                <input class="" type="text" name="input_start_time_draft" id="input_start_time_draft" />
                            </div>
                            <div class="col-md-6">
                                Sampai Tgl : 
                                <input class="" type="text" name="input_end_time_draft" id="input_end_time_draft" />
                            </div>
                        </div>
                        <div class="form-row"> 
                            <div class="col-md-3">
                                <span class="font-weight-bold">Tampilkan Hasil Generate Dari Tgl : </span>
                                
                            </div>
                            <div class="col-md-2">
                                <input class="" type="text" name="input_start_time_generate" id="input_start_time_generate" />
                            </div>
                            <div class="col-md-4">
                                Sampai Tgl : 
                                <input class="" type="text" name="input_end_time_generate" id="input_end_time_generate" />
                            </div>                                                     
                        </div>                                                  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$( function() {
    $("#input_start_time_draft,#input_end_time_draft,#input_start_time_generate,#input_end_time_generate,#time_hasil").datepicker({
        dateFormat: "yy-mm-dd"
    });   
});

$("#input_start_time_draft").change(function(){
    set_start_time_draft();
});

$("#input_end_time_draft").change(function(){
    set_end_time_draft();
});

$("#input_start_time_generate").change(function(){
    set_start_time_generate();
});

$("#input_end_time_generate").change(function(){
    set_end_time_generate();
});

$("#time_hasil").change(function(){
    set_time_hasil();
});

function set_start_time_draft(){
    var start_time_draft = $('#input_start_time_draft').val();
    if (start_time_draft!='') {
        Cookies.set('start_time_draft', start_time_draft, { expires: 1 });
        $('#start_time_draft').html('Draft Dari Tgl : '+start_time_draft);
        $('#alert-cookie').show();
        $('#start_time_draft_a').attr('onclick','hapus_start_time_draft()');
    }else{
        Cookies.remove('start_time_draft');
    }
    // getJML();
    // jml_trip();
}

function set_end_time_draft(){
    var end_time_draft = $('#input_end_time_draft').val();
    if (end_time_draft!='') {
        Cookies.set('end_time_draft', end_time_draft, { expires: 1 });
        $('#end_time_draft').html('Draft Sampai Tgl : '+end_time_draft);
        $('#alert-cookie').show();
        $('#end_time_draft_a').attr('onclick','hapus_end_time_draft()');
    }else{
        Cookies.remove('end_time_draft');
    }
    // getJML();
    // jml_trip();
}

function set_time_hasil(){
    var time_hasil = $('#time_hasil').val();
    if (time_hasil!='') {
        Cookies.set('time_hasil', time_hasil, { expires: 1 });
        $('#hasil_by_time').html('Tanggal Hasil Generate : '+time_hasil);
        $('#alert-cookie').show();
        $('#hasil_by_time').attr('onclick','hapus_waktu_hasil()');
    }else{
        Cookies.remove('time_hasil');
    }
    // getJML();
}

function set_start_time_generate(){
    var start_time_generate = $('#input_start_time_generate').val();
    if (start_time_generate!='') {
        Cookies.set('start_time_generate', start_time_generate, { expires: 1 });
        $('#start_time_generate').html('Hasil Generate Dari Tgl : '+start_time_generate);
        $('#alert-cookie').show();
        $('#start_time_generate_a').attr('onclick','hapus_start_time_generate()');
    }else{
        Cookies.remove('start_time_generate');
    }
    // getJML();
    // jml_trip();
}

function set_end_time_generate(){
    var end_time_generate = $('#input_end_time_generate').val();
    if (end_time_generate!='') {
        Cookies.set('end_time_generate', end_time_generate, { expires: 1 });
        $('#end_time_generate').html('Hasil Generate Dari Tgl : '+end_time_generate);
        $('#alert-cookie').show();
        $('#end_time_generate_a').attr('onclick','hapus_end_time_generate()');
    }else{
        Cookies.remove('end_time_generate');
    }
    // getJML();
    // jml_trip();
}

var get_cookie_region_id = Cookies.get('cok_region_id');
var get_cookie_region_name = Cookies.get('cok_region_name');
var get_start_time_draft = Cookies.get('start_time_draft');
var get_end_time_draft = Cookies.get('end_time_draft');
var get_start_time_generate = Cookies.get('start_time_generate');
var get_end_time_generate = Cookies.get('end_time_generate');
var time_hasil = Cookies.get('time_hasil');

if (get_cookie_region_name!='') {
    $('option:selected').html(get_cookie_region_name);
}

if (get_start_time_draft!='') {
    $('#input_start_time_draft').val(get_start_time_draft);
}

if (get_end_time_draft!='') {
    $('#input_end_time_draft').val(get_end_time_draft);
}

if (get_start_time_generate!='') {
    $('#input_start_time_generate').val(get_start_time_generate);
}

if (get_end_time_generate!='') {
    $('#input_end_time_generate').val(get_end_time_generate);
}

$("select.region").change(function(){
    var region_id = $(this).children("option:selected").val();
    var region_name = $(this).children("option:selected").html();
    if (region_id != '') {
        Cookies.set('cok_region_id', region_id, { expires: 1 });
        Cookies.set('cok_region_name', region_name, { expires: 1 });
        $('#order_by_region').html('Region : '+region_name);
        $('#alert-cookie').show();
        $('#order_by_region_').attr('onclick','hapus_by_region()');
    }else{
        Cookies.remove('cok_region_id');
        Cookies.remove('cok_region_name');
        $('#order_by_region').html('');
    }
    // getJML();
    // jml_trip();
});

function hapus_by_region(){
    Cookies.remove('cok_region_id');
    Cookies.remove('cok_region_name');
    $('#order_by_region').html('');
    // getJML();
    // jml_trip();
    cek_cookie();
}

function hapus_start_time_draft(){
    Cookies.remove('start_time_draft');
    $('#start_time_draft').html('');
    $('#input_start_time_draft').val('');
    // getJML();
    // jml_trip();
    cek_cookie();
}


function hapus_end_time_draft(){
    Cookies.remove('end_time_draft');
    $('#end_time_draft').html('');
    $('#input_end_time_draft').val('');
    // getJML();
    // jml_trip();
    cek_cookie();
}

function hapus_start_time_generate(){
    Cookies.remove('start_time_generate');
    $('#start_time_generate').html('');
    $('#input_start_time_generate').val('');
    // getJML();
    // jml_trip();
    cek_cookie();
}

function hapus_end_time_generate(){
    Cookies.remove('end_time_generate');
    $('#end_time_generate').html('');
    $('#input_end_time_generate').val('');
    // getJML();
    // jml_trip();
    cek_cookie();
}

function cek_cookie(){
    var span_order_by_region = $('#order_by_region').html();
    var span_start_time_draft = $('#start_time_draft').html();
    var span_end_time_draft = $('#end_time_draft').html();
    var span_start_time_generate = $('#start_time_generate').html();
    var span_end_time_generate = $('#end_time_generate').html();

    if (span_order_by_region=='' && span_start_time_draft=='' && span_end_time_draft=='' && span_start_time_generate=='' && span_end_time_generate=='') {
        $('#alert-cookie').hide();
    }
}

</script>

