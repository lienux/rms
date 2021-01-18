<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<?php $this->load->view('cabang/trayek_form');?>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Trayek</div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group">
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-tambah" title="Tambah Data">
                    <!-- <i class="fas fa-plus fa-lg"></i> --> Tambah
                </a> 
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">
                    <!-- <i class="far fa-file-excel fa-lg"></i> --> Excel
                </a>
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">
                    <!-- <i class="far fa-file-pdf fa-lg"></i> --> PDF
                </a>                
                <span class="text-danger" id="verifikasi_info"><i class="fas fa-check"></i> Data Sudah Diverifikasi oleh BPTD . . .</span>
            </div>                
            <table class="table-sm table-hover table-bordered display nowrap text-muted" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>Nama Trayek</th>
                        <th>Ritase</th>
                        <th>Jadwal</th>
                        <th>Tititk Koordinat</th>
                        <th class="collapse"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="lodertabel">
           <div class="d-flex justify-content-center" >
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div> 
        </div>        
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
                <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-hapus" onclick="hapus(IDhapus);">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
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
$(document).ready(function() {
    var t = $('#dataTable').DataTable({
        // responsive: {
        //     details: {
        //         type: 'column',
        //         target: -1
        //     }
        // },
        // columnDefs: [ {
        //     className: 'control',
        //     orderable: false,
        //     targets:   -1
        // } ],
        // order: [ 1, 'asc' ],
        "processing": true,
        ajax: {
            url: base_url + 'cabang/trayek/getBYkontrak/'+cokies_kontrak_id,
            dataSrc: 'ngajingoding'
        },
        // dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        image: 'data:image/png;base64,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'                        
                    } );
                },
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            },
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="<?=base_url();?>assets/images/logo_menhub_tr.png" style="position:absolute; top:40%; left:40%; width:300px;"/>'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: '<h3>List Data Trayek</h3>',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            }
        ],        
        "columns": [
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var coki_verifikasi = Cookies.get('verifikasi');
                    if (coki_verifikasi == 0) {
                        opt = 
                        '<div class="btn-group" role="group">'+
                            '<div class="btn-group" role="group">'+
                                '<a href="#" id="btnGroupDrop1" class="dropdown-togglez" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>'+
                                '<div class="dropdown-menu">'+
                                    '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+JsonResultRow.id+');"><i class="fas fa-edit"></i> Edit</a>'+
                                    '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+JsonResultRow.id+');"><i class="fas fa-trash-alt"></i> Hapus</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    }else{
                        opt = '<i class="fas fa-check text-susccess"></i>';
                    }
                    return opt;
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var trayek_name = 
                    '<div class="text-dark">Trayek: '+JsonResultRow.trayek+'</div>'+
                    '<div class="text-xs">Jarak: <span class="text-dark">'+JsonResultRow.jarak+' km</span></div>'
                    ;                    
                    return trayek_name;
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var ritase = 
                    '<div class="text-xs">Harian: <span class="text-dark">'+JsonResultRow.ritase_harian+'</span></div>'+
                    '<div class="text-xs">Bulanan: <span class="text-dark">'+JsonResultRow.ritase_bulanan+'</span></div>'+
                    '<div class="text-xs">Tahunan: <span class="text-dark">'+JsonResultRow.ritase_tahun+'</span></div>'
                    ;                    
                    return ritase;
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var jadwal = 
                    '<div class="text-xs">Berangkat: <span class="text-dark">'+JsonResultRow.jadwal_berangkat+'</span></div>'+
                    '<div class="text-xs">Tiba: <span class="text-dark">'+JsonResultRow.jadwal_datang+'</span></div>'
                    ;                    
                    return jadwal;
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var koordinat = 
                    '<div class="text-xs">Titik Awal: <span class="text-dark">'+JsonResultRow.koordinat_awal+'</span></div>'+
                    '<div class="text-xs">Titik Akhir: <span class="text-dark">'+JsonResultRow.koordinat_akhir+'</span></div>'
                    ;                    
                    return koordinat;
                }                               
            }
        ]
    });

    t.on( 'order.dt search.dt', function () {
        t.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});

$('#btn-update').hide();
$('#Ejadwal_berangkat,#Ejadwal_datang').clockTimePicker({});
$('#loader,#lodertabel').hide();
$('#btn-tambah').click(function(){
    $('#form-add').show();
    kosongkanform();
    $('#kontrak_id').val(cokies_kontrak_id);
});

// $('#btn-kembali').click(function(){
//     $('#form-add,#btn-update').hide();
//     $('#btn-simpan').show();
//     kosongkanform();
// });

function close_form_input(){
    $('#form-add,#btn-update').hide();
    $('#btn-simpan').show();
    kosongkanform();
}

$('#btn-simpan').click(function(){
    simpan();
});

$('#btn-update').click(function(){
    update(ID);
    // alert(ID);
});

function kosongkanform(){
    $('form input,form textarea').val('');
    $('form img').attr('src', '');
};

function lakukanEdit(id){    
    buatID(id);
    getTrayekBYid(id);
};

function buatIDhapus(id){
    IDhapus = id;
}

function buatID(id){
    ID = id;
    // alert(ID);
};

function getTrayekBYid(id){
    $.ajax({
        url: base_url+'cabang/trayek/get/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            $('#Etrayek').val(response.ngajingoding[0].trayek);
            $('#Ejarak').val(response.ngajingoding[0].jarak);
            $('#Eritase_harian').val(response.ngajingoding[0].ritase_harian);
            $('#Eritase_bulanan').val(response.ngajingoding[0].ritase_bulanan);
            $('#Eritase_tahun').val(response.ngajingoding[0].ritase_tahun);
            $('#Ekoorditan_awal').val(response.ngajingoding[0].koordinat_awal);
            $('#Ekoorditan_akhir').val(response.ngajingoding[0].koordinat_akhir);
            $('#Ejadwal_berangkat').val(response.ngajingoding[0].jadwal_berangkat);
            $('#Ejadwal_datang').val(response.ngajingoding[0].jadwal_datang);

            var kontrak_id = response.ngajingoding[0].kontrak_id;
            $('#kontrak_id').val(kontrak_id).change();
            
            $('#btn-simpan').hide();
            $('#form-add,#btn-update').show();
        }
    });
};

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'cabang/trayek/add';
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
                $('#form-add').hide();
                $('.maryam').load(trayek);
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
    var urlData = base_url + 'cabang/trayek/edit/'+id;
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
                $('#form-add').hide();
                $('.maryam').load(trayek);
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
    var urlData = base_url + 'cabang/trayek/hapus/'+id;
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
                    $(this).load(trayek);
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
</script>
