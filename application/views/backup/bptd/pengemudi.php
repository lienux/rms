<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pengemudi</div>
    <div class="card-body">
        <div class="table-responsive">            
            <table class="table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="2"></th>
                        <th rowspan="2">Nama Cabang</th>
                        <th rowspan="2">Tahun Kontrak</th>
                        <th rowspan="2">Nama Pengemudi</th>
                        <th colspan="2">SIM</th>
                        <th rowspan="2">Nomer Telp/HP</th>
                        <th colspan="3">F O T O</th> 
                        <th rowspan="2"></th>                       
                    </tr> 
                    <tr>
                        <th>Nomor SIM</th>
                        <th>Masa Berlaku</th>
                        <th>Pengemudi</th>
                        <th>SIM</th>
                        <th>KTP</th>
                    </tr>                   
                </thead>
                <!-- <tbody></tbody> -->
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
$(document).ready(function() {
    // var t = $('#dataTable').DataTable( {
    //     "columnDefs": [ {
    //         "searchable": false,
    //         "orderable": false,
    //         "targets": 0
    //     } ],
    //     "order": [[ 1, 'asc' ]]
    // } );
 
    // t.on( 'order.dt search.dt', function () {
    //     t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // } ).draw();

    var t = $('#dataTable').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: -1
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   -1
        } ],
        // order: [ 1, 'asc' ],
        "processing": true,
        ajax: {
            url: base_url + 'bptd/pengemudi/get',
            dataSrc: 'ngajingoding'
        },
        "columns": [
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }                               
            },
            { "data": "name" },
            { "data": "tglkontrak" },
            { "data": "nama" },
            { "data": "no_sim" },
            { "data": "masa_sim" },
            { "data": "telp" },    
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '<img src="<?php echo base_url();?>assets/images/pengemudi/'+JsonResultRow.foto_pengemudi+'" width="50px">';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '<img src="<?php echo base_url();?>assets/images/pengemudi/'+JsonResultRow.foto_sim+'" width="50px">';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '<img src="<?php echo base_url();?>assets/images/pengemudi/'+JsonResultRow.foto_ktp+'" width="50px">';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return "";
                } 
            }         
        ]
    });
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

$('#btn-update,#btn-simpan').hide();

$( function() {
    $( "#masa_sim" ).datepicker({
        dateFormat: "yy-mm-dd"
    });   
});

$('#loader,#lodertabel').hide();
// getPengemudi();
$('#btn-tambah').click(function(){
    // kosongkanform();
    $('#form-pengemudi,#btn-simpan').show();
});

$('#btn-kembali').click(function(){
    $('#form-pengemudi').hide();
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

function getPengemudi(){
    $.ajax({
        url: base_url + 'pengemudi/get',
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
            createTable(response);
        }
    });
};

function createTable(response){
    $('#dataTable tbody').empty();
    for(index in response){
        var 
        id = response[index].id,
        nama = response[index].nama,
        sim = response[index].no_sim,
        masa_sim = response[index].masa_sim,
        telp = response[index].telp,
        foto_pengemudi = response[index].foto_pengemudi,
        foto_sim = response[index].foto_sim,
        foto_ktp = response[index].foto_ktp

        var 
        a = 
        "<tr>"+
            "<td>"+nama+"</td>"+
            "<td class='text-center'>"+sim+"</td>"+
            "<td class='text-center'>"+masa_sim+"</td>"+
            "<td class='text-center'>"+telp+"</td>"+
            "<td class='text-center'><img src='"+base_url+'assets/images/pengemudi/'+foto_pengemudi+"' width='50px'></td>"+
            "<td class='text-center'><img src='"+base_url+'assets/images/pengemudi/'+foto_sim+"' width='50px'></td>"+
            "<td class='text-center'><img src='"+base_url+'assets/images/pengemudi/'+foto_ktp+"' width='50px'></td>"+
            "<td class='text-center'>"+
                '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
                    '<div class="btn-group" role="group">'+
                        '<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                        '</button>'+
                        '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
                            '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');">Edit</a>'+
                            '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');">Hapus</a>'+
                        '</div>'+                        
                    '</div>'+
                '</div>'+
            "</td>"+
        "</tr>";
        $('#dataTable tbody').append(a);
    }        
};

function lakukanEdit(id){    
    buatID(id);
    getPengemudiBYid(id);
}

function buatIDhapus(id){
    IDhapus = id;
}

function buatID(id){
    ID = id;
}

function getPengemudiBYid(id){
    $.ajax({
        url: base_url + 'pengemudi/get/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            $('#nama').val(response[0].nama);
            $('#telp').val(response[0].telp);
            $('#sim').val(response[0].no_sim);
            $('#masa_sim').val(response[0].masa_sim);
            $('#foto_pengemudi').attr('src', 'assets/images/pengemudi/'+response[0].foto_pengemudi);
            $('#foto_sim').attr('src', 'assets/images/pengemudi/'+response[0].foto_sim);
            $('#foto_ktp').attr('src', 'assets/images/pengemudi/'+response[0].foto_ktp);
            $('#btn-simpan').hide();
            $('#form-pengemudi,#btn-update').show();
        }
    });
};

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'pengemudi/add';
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
                $('#form-pengemudi').hide();
                getPengemudi();
                kosongkanform();
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
    var urlData = base_url + 'pengemudi/edit/'+id;
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
                $('#form-pengemudi').hide();
                getPengemudi();
                kosongkanform();
                $('#btn-update').hide();
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
    var urlData = base_url + 'pengemudi/hapus/'+id;
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
                getPengemudi();
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

