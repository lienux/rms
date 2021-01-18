<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="row" style="padding: 24px 0px 24px 5px;">
    <div class="col-sm-5 col-md-12" id="list-kontrak">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Riwayat Kontrak</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table-hover table-bordered nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="">
                                <th rowspan="2"></th>
                                <th rowspan="2"></th>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Cabang</th>
                                <th rowspan="2">No Kontrak</th>
                                <th rowspan="2">Alamat Kantor Cabang</th>
                                <th rowspan="2">Pimpinan Cabang</th>
                                <th colspan="3">Kontak</th>
                                <th rowspan="2">Tanggal Mulai Kontrak</th>
                                <th colspan="2">Jumlah Target Ritase</th> 
                                <th colspan="2">Jumlah</th>                       
                            </tr>
                            <tr class="">
                                <th>Nomor HP</th>
                                <th>Telp Kantor / PIC</th>
                                <th>Alamat Email</th>                        
                                <th>Harian</th>
                                <th>Satu Tahun</th>
                                <th>Trayek</th>
                                <th>Kendaraan</th>
                            </tr>
                        </thead>
                        <tbody class="bkontrak"></tbody>
                    </table>
                </div>       
            </div>
        </div>
    </div>

    <div class="collapse col-sm-7 card" style="padding: 0; border:0; overflow-y: scroll; height:570px;" id="detail_isi_kontrak">
        <div class="mb-1 pull-right">
            <!-- <button class="btn btn-sm btn-danger collapse" id="btn-verifikasi" data-toggle="modal" data-target="#verifikasi">
                <i class="fas fa-check"></i>
                Verifikasi Data
            </button> -->
            <!-- <button class="btn btn-sm btn-success" disabled id="btn-sudah-verifikasi">
                Data Sudah Terverifikasi . . . 
                <i class="fas fa-check"></i>
            </button> -->
            <div class="">
                <button class="btn btn-sm btn-success" disabled id="btn-sudah-verifikasi">
                    Data Sudah Terverifikasi . . . 
                    <i class="fas fa-check"></i>
                </button>
                <button class="btn btn-sm btn-primary" id="btn-view" data-toggle="modal" data-target="#zoom-view">
                    View
                    <i class="fas fa-compress"></i>
                </button>
                <button class="btn btn-sm btn-secondary" id="btn-kembali">
                    Kembali
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
                
        </div>
        <!-- <div class="card-header">Detail Data Kontrak</div> -->
        <div class="card-body" style="padding: 0;" id="bdet_isi_kontrak">
            <div class="mb-0 text-light" style="padding:10px 0px 10px 20px; background-color: #FFA833;">
                <h6 class="mb-0">Data Trayek</h6>
            </div> 
            <div class="table-responsive mb-4">                                   
                <table class="table-sm table-hover table-bordered display ngajingoding-nowrap" id="dataTrayek" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Trayek</th>
                            <th rowspan="2">Jarak (km)</th>
                            <th colspan="2">Tasrget Ritase</th>
                            <th colspan="2">Jadwal</th>
                            <th colspan="2">Tititk Koordinat</th>
                        </tr>
                        <tr>
                            <th>Harian</th>
                            <th>Satu Tahun</th>
                            <th>Keberangkatan</th>
                            <th>Kedatangan</th>
                            <th>Awal</th>
                            <th>Akhir</th>
                        </tr>
                    </thead>
                    <tbody class="btrayek"></tbody>
                </table>
            </div>

            <div class="mb-0 text-light" style="padding:10px 0px 10px 20px; background-color: #FFA833;">
                <h6 class="mb-0">Data Kendaraan</h6>
            </div>
            <div class="table-responsive mb-4">                  
                <table class="table-sm table-hover table-bordered display ngajingoding-nowrap" id="dataKendaraan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Kode Bus</th>
                            <th rowspan="2">No. Polisi</th>
                            <th colspan="3">Data Kendaraan</th>
                            <th colspan="2">STNK</th>
                            <th colspan="2">KIR</th>
                            <th rowspan="2">Penggunaan BBM (liter)</th>
                            <th rowspan="2">Status</th>                    
                        </tr>
                        <tr>                    
                            <th>Tahun Produksi</th>
                            <th>Merk dan Tipe</th>
                            <th>No Rangka</th>
                            <th>Nomor</th>
                            <th>Masa Berlaku</th>
                            <th>Nomor</th>
                            <th>Masa Berlaku</th>
                        </tr>
                    </thead>
                    <tbody class="bkendaraan"></tbody>
                </table>
            </div>
            <div class="mb-0 text-light" style="padding:10px 0px 10px 20px; background-color: #FFA833;">
                <h6 class="mb-0">Data Pengemudi</h6>
            </div>
            <div class="table-responsive">                  
                <table class="table-sm table-hover table-bordered display" id="dataPengemudi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengemudi</th>
                            <th>Nomer Telp/HP</th>
                            <th>Nomor SIM</th>
                            <th>Masa Berlaku SIM</th>
                            <th>Foto Pengemudi</th>
                        </tr>
                    </thead>
                    <tbody class="bpengemudi"></tbody>
                </table>
            </div>       
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="zoom-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">View List Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bzoom-view"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var t = $('#dataTable').DataTable( {
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
        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         extend: 'pdfHtml5',
        //         customize: function ( doc ) {
        //             doc.content.splice( 1, 0, {
        //                 margin: [ 0, 0, 0, 12 ],
        //                 alignment: 'center',
        //                 image: 'data:image/png;base64,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'                        
        //             } );
        //         },
        //         orientation: 'landscape',
        //         pageSize: 'LEGAL',
        //         exportOptions: {
        //             columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        //         }
        //     },
        //     {
        //         extend: 'print',
        //         customize: function ( win ) {
        //             $(win.document.body)
        //                 .css( 'font-size', '10pt' )
        //                 .prepend(
        //                     '<img src="<?=base_url();?>assets/images/logo_menhub_tr.png" style="position:absolute; top:40%; left:40%; width:300px;"/>'
        //                 );
 
        //             $(win.document.body).find( 'table' )
        //                 .addClass( 'compact' )
        //                 .css( 'font-size', 'inherit' );
        //         },
        //         messageTop: '<h3>List Data Kendaraan</h3>',
        //         exportOptions: {
        //             columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        //         }
        //     },
        //     {
        //         extend: 'excel',
        //         exportOptions: {
        //             columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        //         }
        //     }
        // ],
        ajax: {
            url: base_url + 'adm/kontrak/get',
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
                    kontrak_id = JsonResultRow.id;
                    opt =
                    '<button class="btn btn-sm ngajingoding-show p-2 opts" onClick="opts('+kontrak_id+'); show_very('+JsonResultRow.verifikasi+');" id="opts'+kontrak_id+'"></button>'+
                    '<button class="btn btn-sm ngajingoding-hide p-2 collapse opth" onClick="opth('+kontrak_id+'); show_very('+JsonResultRow.verifikasi+');" id="opth'+kontrak_id+'"></button>';
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
                    var name = JsonResultRow.name;
                    var verify = JsonResultRow.verifikasi;
                    if(verify == 0){
                        var nameSpan = '<span>'+name+'</span>';
                    }else{
                        var nameSpan = '<i class="fas fa-check-circle text-danger"></i> '+name;
                    }
                    return nameSpan;
                }
                // "data": "name"
            },
            { "data": "no_kontrak" },
            { "data": "alamat" },
            { "data": "pimpinan" },
            { "data": "wa" },
            { "data": "telp" },
            { "data": "email" },
            { "data": "tglkontrak" },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }
            },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    return '';
                }
            }
        ]
    });
    t.on( 'order.dt search.dt', function () {
        t.column(2, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

function show_very(very){
    if (very == 0) {
        $('#btn-sudah-verifikasi').hide();
    }else{
        $('#btn-sudah-verifikasi').show();
    }
}

function opts(kontrak_id){
    var optsid = '#opts'+kontrak_id;
    var opthid = '#opth'+kontrak_id;
    $('.opth').hide();
    $('.opts').show();
    $(optsid).hide();
    $(opthid).show();
    getTrayek(kontrak_id);
    getKendaraan(kontrak_id);
    getPengemudi(kontrak_id);
    $('#list-kontrak').removeClass('col-md-12');
    $('#detail_isi_kontrak').show();
    $('#bzoom-view').empty();
    $('#bzoom-view').html($('#bdet_isi_kontrak').html());
};

function opth(kontrak_id){
    $('#dataTrayek .btrayek').empty();
    $('#dataKendaraan .bkendaraan').empty();
    $('.opth').hide();
    $('.opts').show();
    $('#list-kontrak').addClass('col-md-12');
    $('#detail_isi_kontrak').hide();
};

$('#btn-kembali').click(function(){
    $('#list-kontrak').addClass('col-md-12');
    $('#detail_isi_kontrak,.opth').hide();
    $('.opts').show();
});

function getTrayek(kontrak_id){
    $.ajax({
        url: base_url + 'nasional/trayek/getBYkontrak/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            tbTrayek(response.ngajingoding,kontrak_id);
        }
    });
}

function tbTrayek(ngajingoding,kontrak_id){
    var tb = '#dataTrayek .btrayek';
    nurut = Number(0);
    $(tb).empty();
    for(index in ngajingoding){
        nurut+=1;
        var 
        a = 
        "<tr>"+
            "<td>"+nurut+"</td>"+
            "<td>"+ngajingoding[index].trayek+"</td>"+
            "<td>"+ngajingoding[index].jarak+"</td>"+
            "<td>"+ngajingoding[index].ritase_harian+"</td>"+
            "<td>"+ngajingoding[index].ritase_tahun+"</td>"+
            "<td>"+ngajingoding[index].jadwal_berangkat+"</td>"+
            "<td>"+ngajingoding[index].jadwal_datang+"</td>"+
            "<td>"+ngajingoding[index].koordinat_awal+"</td>"+
            "<td>"+ngajingoding[index].koordinat_akhir+"</td>"+
        "</tr>";            
        $(tb).append(a);
    }        
};

function getKendaraan(kontrak_id){
    $.ajax({
        url: base_url + 'nasional/kendaraan/getBYkontrak/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            tbKendaraan(response.ngajingoding,kontrak_id);
        }
    });
}

function tbKendaraan(ngajingoding,kontrak_id){
    var tb = '#dataKendaraan .bkendaraan';
    nurut = Number(0);
    $(tb).empty();
    for(index in ngajingoding){
        var stat = ngajingoding[index].status;
        if (stat == 1) {
            var status = 'SGO';
        }else{
            var status = 'Cadangan';
        }
        nurut+=1;
        var
        a = 
        "<tr>"+
            "<td>"+nurut+"</td>"+
            "<td>"+ngajingoding[index].kode_bus+"</td>"+
            "<td>"+ngajingoding[index].nopol+"</td>"+
            "<td>"+ngajingoding[index].thn_produksi+"</td>"+
            "<td>"+ngajingoding[index].merk_tipe+"</td>"+
            "<td>"+ngajingoding[index].no_rangka+"</td>"+
            "<td>"+ngajingoding[index].no_stnk+"</td>"+
            "<td>"+ngajingoding[index].masa_stnk+"</td>"+
            "<td>"+ngajingoding[index].no_kir+"</td>"+
            "<td>"+ngajingoding[index].masa_kir+"</td>"+
            "<td>"+ngajingoding[index].bbm+"</td>"+
            "<td>"+status+"</td>"+
        "</tr>";          
        $(tb).append(a);
    }        
};

function getPengemudi(kontrak_id){
    $.ajax({
        url: base_url + 'nasional/pengemudi/getBYkontrak/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            tbPengemudi(response.ngajingoding,kontrak_id);
        }
    });
}

function tbPengemudi(ngajingoding,kontrak_id){
    var tb = '#dataPengemudi .bpengemudi';
    nurut = Number(0);
    $(tb).empty();
    for(index in ngajingoding){
        nurut+=1;
        var
        a = 
        "<tr>"+
            "<td>"+nurut+"</td>"+
            "<td>"+ngajingoding[index].nama+"</td>"+
            "<td>"+ngajingoding[index].no_sim+"</td>"+
            "<td>"+ngajingoding[index].masa_sim+"</td>"+
            "<td>"+ngajingoding[index].telp+"</td>"+
            "<td><img src='<?=base_url();?>assets/images/pengemudi/"+ngajingoding[index].foto_pengemudi+"' width='50px'></td>"+
        "</tr>";          
        $(tb).append(a);
    }        
};

// function getCabang(){
//     $.ajax({
//         url: base_url + 'nasional/kontrak/getCabang',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             console.log(response);
//             // createTableCabang(response.ngajingoding);
//         }
//     });
// };

// function createTableCabang(ngajingoding){
//     $('.list-cabang tbody').empty();
//     nurut = Number(0);
//     for(index in ngajingoding){
//         var 
//         cabang_id = ngajingoding[index].user_id;
//         nurut+=1;

//         var 
//         a = 
//         "<tr>"+
//             "<td>"+nurut+"</td>"+
//             "<td>"+ngajingoding[index].name+"</td>"+
//             "<td><span id='Zpimpinan"+cabang_id+"'></span></td>"+
//             "<td><span id='Zalamat"+cabang_id+"'></span></td>"+
//             "<td class='text-center'><span id='Zwa"+cabang_id+"'></span></td>"+
//             "<td class='text-center'><span id='Ztelp"+cabang_id+"'></span></td>"+
//             "<td><span id='Zemail"+cabang_id+"'></span></td>"+            
//         "</tr>"+
//         "<tr class='collapse' id='tr_hide"+cabang_id+"'>"+
//             "<td colspan='8'>"+
//                 "<h6>Detail: "+"</h6>"+
//                 // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
//                 // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
//                 // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
//                 // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
//             "</td>"+
//         "</tr>";
//         getKontrakTerakhirBYcabang(cabang_id);
//         $('.list-cabang tbody').append(a);
//     }        
// };  
// // getKontrak();
// function getKontrak(){
//     $.ajax({
//         url: base_url + 'bptd/kontrak/get',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#loderkontrak').show();
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#loderkontrak').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             createTable(response.ngajingoding);
//         }
//     });
// };

// function createTable(ngajingoding){
//     $('#dataTable tbody').empty();
//     for(index in ngajingoding){
//         var 
//         id = ngajingoding[index].id,
//         cabang = ngajingoding[index].name,
//         no_kontrak = ngajingoding[index].no_kontrak,
//         alamat = ngajingoding[index].alamat,
//         pimpinan = ngajingoding[index].pimpinan,
//         wa = ngajingoding[index].wa,
//         telp = ngajingoding[index].telp,
//         email = ngajingoding[index].email,
//         tglkontrak = ngajingoding[index].tglkontrak

//         var 
//         a = 
//         "<tr>"+
//             "<td>"+
//                 '<a href="#" class="btn btn-sm btn-danger" onClick="det('+id+');" id="det'+id+'"><i class="fas fa-plus"></i></a>'+
//                 '<a href="#" class="btn btn-sm btn-danger collapse" onClick="hide('+id+');" id="hide'+id+'"><i class="fas fa-minus"></i></a>'+
//             "</td>"+
//             "<td>"+cabang+"</td>"+
//             "<td>"+no_kontrak+"</td>"+
//             "<td>"+alamat+"</td>"+
//             "<td>"+pimpinan+"</td>"+
//             "<td>"+wa+"</td>"+
//             "<td>"+telp+"</td>"+
//             "<td>"+email+"</td>"+
//             "<td>"+tglkontrak+"</td>"+
//             "<td class='text-center'><span id='Kharian"+id+"'></span></td>"+
//             "<td class='text-center'><span id='Ktahunan"+id+"'></span></td>"+
//             "<td class='text-center'><span id='Ktrayek"+id+"'></span></td>"+
//             "<td class='text-center'><span id='Kkendaraan"+id+"'></span></td>"+
//             // "<td>"+
//             //     '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
//             //         '<div class="btn-group" role="group">'+
//             //             '<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
//             //             '</button>'+
//             //             '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
//             //                 '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');">Edit</a>'+
//             //                 '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');">Hapus</a>'+
//             //             '</div>'+
//             //         '</div>'+
//             //     '</div>'+
//             // "</td>"+
//         "</tr>"+
//         "<tr class='collapse' id='tr_hide"+id+"'>"+
//             "<td colspan='13'>"+
//                 "<h6>Coming Soon</h6>"+  
//             "</td>"+
//         "</tr>";
//         jmlRitase(id);
//         jmlTrayek(id);
//         jmlKendaraan(id);
//         $('#dataTable tbody').append(a);
//     }        
// };

function jmlRitase(id){
    $.ajax({
        url: base_url + 'bptd/trayek/jmlRitase/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            var harian = '#Kharian'+id;
            var tahunan = '#Ktahunan'+id;

            $(harian).html(response.jml_harian);
            $(tahunan).html(response.jml_tahunan);
        }
    });
};

function jmlTrayek(id){
    $.ajax({
        url: base_url + 'bptd/trayek/jml/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            var tra = '#Ktrayek'+id;
            $(tra).html(response.jml_trayek);
        }
    });
};

function jmlKendaraan(id){
    $.ajax({
        url: base_url + 'bptd/kendaraan/jml/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            var kend = '#Kkendaraan'+id;
            $(kend).html(response.jml_kendaraan);
        }
    });
};

// function lakukanEdit(id){    
//     buatID(id);
//     getKontrakBYid(id);
// }

// function buatIDhapus(id){
//     IDhapus = id;
// }

function buatID(id){
    ID = id;
    // alert(ID);
}

function getKontrakBYid(id){
    $.ajax({
        url: base_url+'kontrak/get/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            $('#no_kontrak').val(response[0].no_kontrak);
            $('#alamat').val(response[0].alamat);
            $('#gm').val(response[0].pimpinan);
            $('#wa').val(response[0].wa);
            $('#tglkontrak').val(response[0].tglkontrak);
            $('#telp').val(response[0].telp);
            $('#email').val(response[0].email);
            
            $('#btn-simpan,#kontrakTerbaru,#list-kontrak').hide();
            $('#form-kontrak,#btn-update').show();
        }
    });
};

function dataTerakhir(){
    $.ajax({
        url: base_url + 'kontrak/getTerakhir',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            $('#no_kontrak').val(response[0].no_kontrak);
            $('#dalamat').val(response[0].alamat);
            $('#dpimpinan').val(response[0].pimpinan);
            $('#dwa').val(response[0].wa);
            $('#dtelp').val(response[0].telp);
            $('#demail').val(response[0].email);
            $('#dtglkontrak').val(response[0].tglkontrak);
            $('#dritase').val(response[0].ritase);
            $('#dtrayek').val(response[0].trayek);
            $('#dkendaraan').val(response[0].kendaraan);
        }
    });
};

// function simpan(){
//     var formData = new FormData($('#form-simpan form')[0]);
//     var urlData = base_url + 'kontrak/add';
//     $.ajax({
//         type: 'POST',
//         url: urlData,
//         dataType: 'JSON',
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#loader').show()
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#loader').hide();
//         },
//         success: function(response){
//             if(response.status == 'sukses'){
//                 $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
//                 riwayatkontrak();
//                 // dataTerakhir();
//                 $('.maryam').delay(2000).queue(function( nxt ) {
//                     $(this).load(base_url+'kontrak/index');
//                     $('a').removeClass('active');
//                     $('#kontrak').addClass('active');
//                     nxt();
//                 }); 
//             }else{ 
//                 $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };

// function update(id){
//     var formData = new FormData($('#form-simpan form')[0]);
//     var urlData = base_url + 'kontrak/edit/'+id;
//     $.ajax({
//         type: 'POST',
//         url: urlData,
//         dataType: 'JSON',
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#loader').show()
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#loader').hide();
//         },
//         success: function(response){
//             if(response.status == 'sukses'){
//                 $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
//                 $('#form-kontrak').hide();
//                 $('#kontrakTerbaru,#list-kontrak').show();
//                 riwayatkontrak();
//                 // dataTerakhir();
//             }else{ 
//                 $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };

// function hapus(id){
//     var urlData = base_url + 'kontrak/hapus/'+id;
//     $.ajax({
//         type: 'POST',
//         url: urlData,
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#loader').show()
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#loader').hide();
//         },
//         success: function(response){
//             if(response.status == 'sukses'){
//                 $('#alert').html(response.pesan).fadeIn().delay(2000).fadeOut();
//                 $('#form-kontrak').hide();
//                 $('#kontrakTerbaru,#list-kontrak').show();
//                 riwayatkontrak();
//                 // dataTerakhir();
//                 $('#modalHapus').modal('hide');
//             }else{ 
//                 $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };
function getPDF(){ 
    var HTML_Width = $("#list-kontrak").width();
    var HTML_Height = $("#list-kontrak").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width+(top_left_margin*2);
    var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;
    
    var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
    

    html2canvas($("#list-kontrak")[0],{allowTaint:true}).then(function(canvas) {
        canvas.getContext('2d');
        
        console.log(canvas.height+"  "+canvas.width);
        
        
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
        
        
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        
        pdf.save("HTML-Document.pdf");
    });
};
</script>
