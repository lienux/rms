<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
    <div class="card-body">
        <div class="table-responsive">            
            <table class="table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Level</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Riwayat Perubahan</th>                       
                    </tr>                    
                </thead>
                <tbody></tbody>
            </table>
        </div>       
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
        // "pageLength": 50,
        ajax: {
            url: base_url + 'adm/user/get',
            dataSrc: 'ngajingoding'
        },
        // "ajax": base_url + 'cabang/kendaraan/get',
        // dataSrc: 'data',
        "columns": [
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var id =JsonResultRow.id;
                    opt =
                    '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
                        '<div class="btn-group" role="group">'+
                            '<a href="#" id="btnGroupDrop1" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>'+
                            '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
                                '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');"><i class="fas fa-edit"></i> Edit</a>'+
                                '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');"><i class="fas fa-trash-alt"></i> Hapus</a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
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
                    var tipe = JsonResultRow.user_type;
                    if(tipe == 0){
                        level = 'Cabang';
                    }
                    else if(tipe == 1){
                        level = 'BPTD';
                    }
                    else if(tipe == 2){
                        level = 'Nasional';
                    }
                    return level;
                }                               
            },
            { "data": "name" },
            { "data": "username" },
            { "data": "password" },
            { 
                "render": function (data, type, JsonResultRow, meta) {
                    var data = JsonResultRow.tgl_edit;
                    var data_ = data.substr(-50);
                    return data_;
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
// getTrayek();
// $('#btn-update').hide();
// $( function() {
//     $( "#masa_stnk,#masa_kir" ).datepicker({
//         dateFormat: "yy-mm-dd"
//     });   
// });
// $('#loader,#lodertabel').hide();
// getKendaraan();
// $('#btn-tambah').click(function(){
//     $('#form-simpan').show();
//     kosongkanform();
// })

// $('#btn-kembali').click(function(){
//     $('#form-simpan,#btn-update').hide();
//     $('#btn-simpan').show();
//     kosongkanform();
// })

// $('#btn-simpan').click(function(){
//     simpan();
// })

// $('#btn-update').click(function(){
//     update(ID);
//     // alert(ID);
// })

// function kosongkanform(){
//     $('form input,form textarea').val('');
//     $('form img').attr('src', '');
// };

// function getKendaraan(){
//     $.ajax({
//         url: base_url + 'kendaraan/get',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#lodertabel').show();
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#lodertabel').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             createTable(response);
//         }
//     });
// };

// function createTable(response){
//     $('#dataTable tbody').empty();
//     for(index in response){
//         var 
//         id = response[index].id,
//         kode_bus = response[index].kode_bus,
//         nopol = response[index].nopol,
//         thn_produksi = response[index].thn_produksi,
//         merk_tipe = response[index].merk_tipe,
//         no_rangka = response[index].no_rangka,
//         no_stnk = response[index].no_stnk,
//         masa_stnk = response[index].masa_stnk,
//         no_kir = response[index].no_kir,
//         masa_kir = response[index].masa_kir,
//         bbm = response[index].bbm,
//         stat = response[index].status,
//         foto_depan = response[index].foto_depan,
//         foto_belakang = response[index].foto_belakang,
//         foto_kanan = response[index].foto_kanan,
//         foto_kiri = response[index].foto_kiri,
//         trayek = response[index].trayek

//         if (stat == 1) {
//             var status = 'SGO';
//         }else{
//             var status = 'Cadangan';
//         }

//         var 
//         a = 
//         "<tr>"+
//             "<td>"+
//                 '<button type="button" class="btn btn-info to-det to-det'+id+'" id="'+id+'"><i class="fas fa-plus"></i></button>'+
//                 '<button type="button" class="btn btn-info to-hide collapse to-hide'+id+'" id="'+id+'"><i class="fas fa-minus"></i></button>'+
//             "</td>"+
//             "<td class='text-center'>"+kode_bus+"</td>"+
//             "<td class='text-center'>"+nopol+"</td>"+
//             "<td class='text-center'>"+thn_produksi+"</td>"+
//             "<td class='text-center'>"+merk_tipe+"</td>"+
//             "<td class='text-center'>"+no_rangka+"</td>"+
//             "<td class='text-center'>"+no_stnk+"</td>"+
//             "<td class='text-center'>"+masa_stnk+"</td>"+
//             "<td class='text-center'>"+no_kir+"</td>"+
//             "<td class='text-center'>"+masa_kir+"</td>"+
//             "<td class='text-center'>"+bbm+"</td>"+
//             "<td class='text-center'>"+status+"</td>"+
//             "<td class='text-center'>"+
//                 '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
//                     '<div class="btn-group" role="group">'+
//                         '<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
//                         '</button>'+
//                         '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
//                             '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');">Edit</a>'+
//                             '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');">Hapus</a>'+
//                         '</div>'+
//                     '</div>'+
//                 '</div>'+
//             "</td>"+
//         "</tr>"+
//         "<tr class='collapse' id='hide"+id+"'>"+
//             "<td colspan='12'class='text-center'>"+
//                 "<h6>Trayek Yang Dilayani: "+trayek+"</h6>"+
//                 "<img src='assets/images/kendaraan/"+foto_depan+"' width='200px'>"+
//                 "<img src='assets/images/kendaraan/"+foto_belakang+"' width='200px'>"+
//                 "<img src='assets/images/kendaraan/"+foto_kanan+"' width='200px'>"+
//                 "<img src='assets/images/kendaraan/"+foto_kiri+"' width='200px'>"+
//             "</td>"+
//         "</tr>";
//         $('#dataTable tbody').append(a);

//         $('.to-det').click(function(){
//             var id = $(this).attr('id');
//             hideid = '#hide'+id;
//             todetid = '.to-det'+id;
//             tohideid = '.to-hide'+id;
//             $(todetid).hide();
//             $(tohideid).show();            
//             $(hideid).show();            
//         })

//         $('.to-hide').click(function(){
//             var id = $(this).attr('id');
//             hideid = '#hide'+id;
//             todetid = '.to-det'+id;
//             tohideid = '.to-hide'+id;
//             $(todetid).show();
//             $(tohideid).hide();            
//             $(hideid).hide();            
//         })
//     }        
// };

// function lakukanEdit(id){    
//     buatID(id);
//     getKendaraanBYid(id);
// };

// function buatIDhapus(id){
//     IDhapus = id;
// }

// function buatID(id){
//     ID = id;
//     // alert(ID);
// };

// function getKendaraanBYid(id){
//     $.ajax({
//         url: base_url+'kendaraan/get/'+id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             var trayek_id = response[0].trayek_id;
//             $('#trayek_dilayani').val(trayek_id).change();

//             $('#kode_bus').val(response[0].kode_bus);
//             $('#nopol').val(response[0].nopol);
//             $('#thn_produksi').val(response[0].thn_produksi);
//             $('#merk_tipe').val(response[0].merk_tipe);
//             $('#no_rangka').val(response[0].no_rangka);
//             $('#no_stnk').val(response[0].no_stnk);
//             $('#masa_stnk').val(response[0].masa_stnk);
//             $('#no_kir').val(response[0].no_kir);
//             $('#masa_kir').val(response[0].masa_kir);
//             $('#bbm').val(response[0].bbm);

//             var status_id = response[0].status;
//             $('#status').val(status_id).change();

//             $('#foto_depan').attr('src', 'assets/images/kendaraan/'+response[0].foto_depan);
//             $('#foto_belakang').attr('src', 'assets/images/kendaraan/'+response[0].foto_belakang);
//             $('#foto_kanan').attr('src', 'assets/images/kendaraan/'+response[0].foto_kanan);
//             $('#foto_kiri').attr('src', 'assets/images/kendaraan/'+response[0].foto_kiri);
//             $('#btn-simpan').hide();
//             $('#form-simpan,#btn-update').show();
//         }
//     });
// };

// function simpan(){
//     var formData = new FormData($('#form-simpan form')[0]);
//     var urlData = base_url + 'kendaraan/add';
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
//                 $('#form-simpan').hide();
//                 getKendaraan();
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
//     var urlData = base_url + 'kendaraan/edit/'+id;
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
//                 $('#form-simpan').hide();
//                 getKendaraan();
//             }else{ 
//                 $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };

// function getTrayek(){
//     $.ajax({
//         url: base_url + 'trayek/get',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#lodertabel').show();
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#lodertabel').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             createListTrayek(response);
//         }
//     });
// };

// function createListTrayek(response){
//     // $('.cabang-tb-kontrak tbody').empty();
//     for(index in response){
//         var 
//         trayek_id = response[index].id,
//         trayek = response[index].trayek,
//         jarak = response[index].jarak

//         var a = '';
//         a += '<option value="'+trayek_id+'">'+trayek+'</option>';
//         $('#trayek_dilayani').append(a); 
//     };       
// };

// function hapus(id){
//     var urlData = base_url + 'kendaraan/hapus/'+id;
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
//                 getKendaraan();
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

</script>

