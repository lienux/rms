<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Trayek</div>
    <div class="card-body">
        <div class="table-responsive">  
            <div class="form-group">
                <a class="btn btn-success" href="<?php echo base_url();?>adm/trayek/export" target="_blank">
                    <i class="fas fa-file-excel"></i>
                    Excel
                </a>                
            </div>         
            <table class="table-sm table-hover display table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                <thead>                    
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Nama Cabang</th>
                        <th>Tahun Kontrak</th>
                        <th>Nama Trayek</th>
                        <th>Jarak (km)</th>
                        <th>Ritase Harian</th>
                        <th>Ritase Bulanan</th>
                        <th>Ritase 1 Tahun</th>                        
                        <th>Jadwal Berangkat</th>
                        <th>Jadwal Kedatangan</th>
                        <th>Titik Koordinat Awal</th>
                        <th>Titik Koordinat Akhir</th>
                        <th></th>
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
<!-- <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
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
</div> -->

<script>
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
            url: base_url + 'adm/trayek/get',
            dataSrc: 'ngajingoding'
        },
        "columns": [
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    optopt =
                    '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
                        '<div class="btn-group" role="group">'+
                            '<a href="#" id="btnGroupDrop1" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>'+
                            '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
                                '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+JsonResultRow.id+');"><i class="fas fa-edit"></i> Edit</a>'+
                                '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+JsonResultRow.id+');"><i class="fas fa-trash-alt"></i> Hapus</a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                    return optopt;
                }                               
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }                               
            },
            { "data": "name" },
            { "data": "tglkontrak" },
            { "data": "trayek" },
            { "data": "jarak" },
            { "data": "ritase_harian" },
            { "data": "ritase_bulanan" },
            { "data": "ritase_tahun" },            
            { "data": "jadwal_berangkat" },
            { "data": "jadwal_datang" },
            { "data": "koordinat_awal", "className": "none" },
            { "data": "koordinat_akhir", "className": "none" },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return "";
                } 
            }         
        ]
    });
    t.on( 'order.dt search.dt', function () {
        t.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
// getKontrak();
$('#btn-update').hide();
$('#Ejadwal_berangkat,#Ejadwal_datang').clockTimePicker({});
$('#loader,#lodertabel').hide();
// getTrayek();
// dataTerakhir();
$('#btn-tambah').click(function(){
    $('#form-add').show();
});

$('#btn-kembali').click(function(){
    $('#form-add,#btn-update').hide();
    $('#btn-simpan').show();
    kosongkanform();
});

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

function getTrayek(){
    $.ajax({
        url: base_url + 'bptd/trayek/get',
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
            console.log(response);
            createTable(response.ngajingoding);
        }
    });
};

function createTable(ngajingoding){
    $('#dataTable tbody').empty();
    for(index in ngajingoding){
        var 
        id = ngajingoding[index].id,
        trayek = ngajingoding[index].trayek,
        jarak = ngajingoding[index].jarak,
        ritase_harian = ngajingoding[index].ritase_harian,
        ritase_tahun = ngajingoding[index].ritase_tahun,
        koordinat_awal = ngajingoding[index].koordinat_awal,
        koordinat_akhir = ngajingoding[index].koordinat_akhir,
        jadwal_berangkat = ngajingoding[index].jadwal_berangkat,
        jadwal_datang = ngajingoding[index].jadwal_datang,
        keterangan = ngajingoding[index].keterangan

        var 
        a = 
        "<tr>"+
            "<td>"+"</td>"+
            "<td>"+ngajingoding[index].name+"</td>"+
            "<td>"+trayek+"</td>"+
            "<td class='text-center'>"+jarak+"</td>"+
            "<td class='text-center'>"+ritase_harian+"</td>"+
            "<td class='text-center'>"+ritase_tahun+"</td>"+
            "<td>"+koordinat_awal+"</td>"+
            "<td>"+koordinat_akhir+"</td>"+
            "<td class='text-center'>"+jadwal_berangkat+"</td>"+
            "<td class='text-center'>"+jadwal_datang+"</td>"+
            // "<td class='text-center'>"+
            //     '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
            //         '<div class="btn-group" role="group">'+
            //             '<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
            //             '</button>'+
            //             '<div class="dropdown-menu opt" aria-labelledby="btnGroupDrop1">'+
            //                 '<a class="dropdown-item to-edit" href="#" onClick="lakukanEdit('+id+');">Edit</a>'+
            //                 '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');">Hapus</a>'+
            //             '</div>'+
            //         '</div>'+
            //     '</div>'+
            // "</td>"+
        "</tr>";
        $('#dataTable tbody').append(a); 
    }        
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
        url: base_url+'trayek/get/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            $('#Etrayek').val(response[0].trayek);
            $('#Ejarak').val(response[0].jarak);
            $('#Eritase_harian').val(response[0].ritase_harian);
            $('#Eritase_tahun').val(response[0].ritase_tahun);
            $('#Ekoorditan_awal').val(response[0].koordinat_awal);
            $('#Ekoorditan_akhir').val(response[0].koordinat_akhir);
            $('#Ejadwal_berangkat').val(response[0].jadwal_berangkat);
            $('#Ejadwal_datang').val(response[0].jadwal_datang);

            var kontrak_id = response[0].kontrak_id;
            $('#kontrak_id').val(kontrak_id).change();
            
            $('#btn-simpan').hide();
            $('#form-add,#btn-update').show();
        }
    });
};

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'trayek/add';
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
                getTrayek();
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
    var urlData = base_url + 'trayek/edit/'+id;
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
                getTrayek();
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function getKontrak(){
    $.ajax({
        url: base_url + 'kontrak/get',
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
            createOptionKontrak(response);
        }
    });
};

function createOptionKontrak(response){
    // $('.cabang-tb-kontrak tbody').empty();
    for(index in response){
        var 
        id = response[index].id,
        no_kontrak = response[index].no_kontrak,
        tglkontrak = response[index].tglkontrak,
        pimpinan = response[index].pimpinan

        var a = '';
        a += '<option value="'+id+'">'+tglkontrak+' ('+pimpinan+')'+'</option>';
        $('#kontrak_id').append(a); 
    }        
};

function hapus(id){
    var urlData = base_url + 'trayek/hapus/'+id;
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
                getTrayek();
                $('#modalHapus').modal('hide');
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
