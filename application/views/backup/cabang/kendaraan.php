<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<?php $this->load->view('cabang/vehicle_form');?>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kendaraan</div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group">
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-tambah" title="Tambah Data">Tambah</a> 
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">Excel</a>
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">PDF</a>
                <span class="text-danger" id="verifikasi_info"><i class="fas fa-check"></i> Data Sudah Diverifikasi oleh BPTD . . .</span>
            </div>
            <table class="table-sm table-hover table-bordered display nowrapz text-muted" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="4">Nama</th>
                        <th>STNK</th>                      
                        <th>KIR</th>
                        <th>Jumlah</th>
                        <th>Trayek</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- <div id="lodertabel">
           <div class="d-flex justify-content-center" >
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div> 
        </div> -->        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda Yakin Ingin Menghapus Data???
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-hapus" onclick="hapus(IDhapus);">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
base_url = "<?php base_url();?>";
cokies_kontrak_id = Cookies.get('kontrak_id');
coki_verifikasi = Cookies.get('verifikasi');
if (coki_verifikasi == 1) {
    $('#btn-tambah').hide();
    $('#verifikasi_info').show();
}else{
    $('#btn-tambah').show();
    $('#verifikasi_info').hide();
}
$('#kontrak_id').val(cokies_kontrak_id);
// $(document).ready(function() {

data_kendaraan();

function data_kendaraan(){
    $.ajax({
        url: base_url + 'cabang/kendaraan/getBYkontrak/'+cokies_kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loderkontrak').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loderkontrak').hide();
        },
        success: function(response){
            console.log(response);
            createTable(response.ngajingoding);
        }
    });
};

function createTable(data){
    $('#dataTable tbody').empty();
    nurut = Number(0);
    for(index in data){
        
        id = data[index].id
        statu = data[index].status

        if(statu == 1) {
            var stat = '<i class="fas fa-circle fa-xs text-success"></i> SGO';
        }else{
            var stat = '<i class="fas fa-circle fa-xs text-yellow"></i> Cadangan';
        }

        nurut+=1;
        if(coki_verifikasi == 0)
        {
            opt =
            '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
                '<div class="btn-group" role="group">'+
                    '<a href="#" id="btnGroupDrop1" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>'+
                    '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
                        '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');"><i class="fas fa-edit"></i> Edit</a>'+
                        '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');"><i class="fas fa-trash-alt"></i> Hapus</a>'+
                        '<a class="dropdown-item to-excel" href="#" onClick ="export_excel('+id+');" title="Export Detail Data"><i class="far fa-file-excel"></i> Export</a>'+
                    '</div>'+
                '</div>'+
            '</div>';
        }
        else
        {
            opt = '<i class="fas fa-check text-susccess"></i>';
        }
        
        var 
        a = 
        "<tr>"+
            "<td>"+opt+"</td>"+
            "<td>"+nurut+"</td>"+
            '<td><img src="<?php echo base_url();?>public/assets/images/kendaraan/'+data[index].foto_depan+'" class="rounded" width="150px"></td>'+
            "<td style='white-space:nowrap;'>"+
                '<div class="text-dark">Code: '+data[index].kode_bus+'</div>'+
                '<div class="text-xs">'+data[index].thn_produksi+', '+data[index].merk_tipe+'</div>'+
                '<div class="text-xs">VIN/SN: <span class="text-dark">'+data[index].no_rangka+'</span></div>'+
                '<div class="text-xs">Licence Plate: <span class="text-dark">'+data[index].nopol+'</span></div>'+
            "</td>"+
            "<td style='white-space:nowrap;'>"+
                '<div class="text-xs">No: <span class="text-dark">'+data[index].no_stnk+'</span></div>'+
                '<div class="text-xs">Valid True: <span class="text-dark">'+data[index].masa_stnk+'</span></div>'+
            "</td>"+
            "<td style='white-space:nowrap;'>"+
                '<div class="text-xs">No: <span class="text-dark">'+data[index].no_kir+'</span></div>'+
                '<div class="text-xs">Valid True: <span class="text-dark">'+data[index].masa_kir+'</span></div>'+
            "</td>"+
            "<td style='white-space:nowrap;'>"+
                '<div class="text-xs">Seat: <span class="text-dark">'+data[index].jml_seat+'</span></div>'+
                '<div class="text-xs">BBM, km/liter: <span class="text-dark">'+data[index].bbm+'</span></div>'+
            "</td>"+
            "<td style='white-space:nowrap;'>"+data[index].trayek+"</td>"+
            "<td style='white-space:nowrap;'>"+stat+"</td>"+
        "</tr>";
        // jmlRitase(id);
        // jmlTrayek(id);
        // jmlKendaraan(id);
        $('#dataTable tbody').append(a); 
    }
}

    

getTrayek();

$('#btn-update').hide();
$( function() {
    $( "#masa_stnk,#masa_kir" ).datepicker({
        dateFormat: "yy-mm-dd"
    });   
});

$('#loader,#lodertabel').hide();

$('#btn-tambah').click(function(){
    $('#form-simpan').show();
    kosongkanform();
    $('#kontrak_id').val(cokies_kontrak_id);
})

// $('#btn-kembali').click(function(){
//     $('#form-simpan,#btn-update').hide();
//     $('#btn-simpan').show();
//     kosongkanform();
// })

function close_form_input(){
    $('#form-simpan,#btn-update').hide();
    $('#btn-simpan').show();
    kosongkanform();
}

$('#btn-simpan').click(function(){
    simpan();
})

$('#btn-update').click(function(){
    update(ID);
    // alert(ID);
})

function kosongkanform(){
    $('form input,form textarea, form select').val('');
    $('form img').attr('src', '');
};

function lakukanEdit(id){    
    buatID(id);
    isikanForm(id);
}

function isikanForm(id){
    buatID(id);
    $.ajax({
        url: base_url+'cabang/kendaraan/get/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            
            var trayek_id = response.ngajingoding[0].trayek_id;
            $('#trayek_dilayani').val(trayek_id).change();

            $('#kode_bus').val(response.ngajingoding[0].kode_bus);
            $('#nopol').val(response.ngajingoding[0].nopol);
            $('#thn_produksi').val(response.ngajingoding[0].thn_produksi);
            $('#merk_tipe').val(response.ngajingoding[0].merk_tipe);
            $('#jml_seat').val(response.ngajingoding[0].jml_seat);
            $('#no_rangka').val(response.ngajingoding[0].no_rangka);
            $('#no_stnk').val(response.ngajingoding[0].no_stnk);
            $('#masa_stnk').val(response.ngajingoding[0].masa_stnk);
            $('#no_kir').val(response.ngajingoding[0].no_kir);
            $('#masa_kir').val(response.ngajingoding[0].masa_kir);
            $('#bbm').val(response.ngajingoding[0].bbm);

            var status_id = response.ngajingoding[0].status;
            $('#status').val(status_id).change();

            $('#foto_depan').attr('src', 'assets/images/kendaraan/'+response.ngajingoding[0].foto_depan);
            $('#foto_belakang').attr('src', 'assets/images/kendaraan/'+response.ngajingoding[0].foto_belakang);
            $('#foto_kanan').attr('src', 'assets/images/kendaraan/'+response.ngajingoding[0].foto_kanan);
            $('#foto_kiri').attr('src', 'assets/images/kendaraan/'+response.ngajingoding[0].foto_kiri);
            $('#btn-simpan').hide();
            $('#form-simpan,#btn-update').show();
        }
    });
};

function buatIDhapus(id){
    IDhapus = id;
}

function buatID(id){
    ID = id;
    // alert(ID);
};

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'cabang/kendaraan/add';
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader').hide();
        },
        success: function(response){
            console.log(response);
            if(response.status == 'sukses'){
                $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
                $('#form-simpan').hide();
                $('.maryam').load(kendaraan);
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function update(id){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'cabang/kendaraan/edit/'+id;
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader').hide();
        },
        success: function(response){
            if(response.status == 'sukses'){
                $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
                $('#form-simpan').hide();
                $('.maryam').load(kendaraan);
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function hapus(id){
    var urlData = base_url + 'cabang/kendaraan/hapus/'+id;
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader').hide();
        },
        success: function(response){
            if(response.status == 'sukses'){
                $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
                $('#modalHapus').modal('hide');
                $('.maryam').delay(2000).queue(function( nxt ) {
                    $(this).load(kendaraan);
                    nxt();
                });
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function getTrayek(){
    $.ajax({
        url: base_url + 'cabang/trayek/get',
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
            createListTrayek(response.ngajingoding);
        }
    });
};

function createListTrayek(ngajingoding){
    // $('.cabang-tb-kontrak tbody').empty();
    for(index in ngajingoding){
        var 
        trayek_id = ngajingoding[index].id,
        trayek = ngajingoding[index].trayek,
        jarak = ngajingoding[index].jarak

        var a = '';
        a += '<option value="'+trayek_id+'">'+trayek+'</option>';
        $('#trayek_dilayani').append(a); 
    };       
};





//======================================= VALIDASI DATA =====================================
//======================================= VALIDASI DATA =====================================
//======================================= VALIDASI DATA =====================================

$("#kode_bus").keyup(function() {
    var d = $('#kode_bus').val();
    $.ajax({
        type: 'GET',
        url: base_url+'cabang/kendaraan/cek_kode_bus/'+cokies_kontrak_id+'/'+d,
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            if(response.status == 'sukses'){
                $('#cek_kode_bus').show();
                $('#cek_kode_bus').html(response.pesan);
            }else{ 
                $('#cek_kode_bus').hide();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
});

// $("#nopol").keyup(function() {
//     var d = $('#nopol').val();
//     $.ajax({
//         type: 'GET',
//         url: base_url+'cabang/kendaraan/cek_nopol/'+cokies_kontrak_id+'/'+d,
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,        
//         success: function(response){
//             if(response.status == 'sukses'){
//                 $('#cek_nopol').removeClass('text-success');
//                 $('#cek_nopol').addClass('text-danger');
//                 $('#cek_nopol').html(response.pesan);
//             }else{ 
//                 $('#cek_nopol').removeClass('text-danger');
//                 $('#cek_nopol').addClass('text-success');
//                 $('#cek_nopol').html(response.pesan);
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// });

</script>

