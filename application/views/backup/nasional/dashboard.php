<div class="mt-4">
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-map-marked-alt"></i>
                    Jumlah BPTD  = <span class="badge badge-dark badge-pill" id="jml_bptd"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>           
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-map-marker-alt"></i>
                    Jumlah Cabang  = <span class="badge badge-dark badge-pill" id="jml_cabang"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>            
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-file-contract"></i>
                    Jumlah Data Kontrak = <span class="badge badge-dark badge-pill" id="jml_kontrak"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-route"></i>
                    Total Trayek = <span class="badge badge-dark badge-pill" id="jml_trayek"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>           
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-bus-alt"></i>
                    Total Kendaraan = <span class="badge badge-dark badge-pill" id="jml_kendaraan"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-successz text-light mb-4" style="background-color: #FF7133;">
                <div class="card-body">
                    <i class="fas fa-user"></i>
                    Total Pengemudi = <span class="badge badge-dark badge-pill" id="jml_pengemudi"></span>
                </div>
                <div class="card-footer bg-secondary d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>    

<!-- <div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>List Kantor Cabang</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-sm table-hover table-bordered nowrap list-cabang" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Cabang</th>
                            <th>Nama Pimpinan</th>
                            <th>Alamat</th>
                            <th>No HP Pimpinan</th>
                            <th>Telp Kantor</th>
                            <th>Alamat Email</th>
                        </tr>                        
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->


<script>
// $(document).ready(function() {
//     $('#dataTable').DataTable();
// } );
// getJML();
// getCabang();

getJML();
function getJML(){
    $.ajax({
        url: base_url + 'nasional/dash/getJML',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            $('#jml_bptd').html(response.ngajingoding.jml_bptd);
            $('#jml_cabang').html(response.ngajingoding.jml_cabang);
            $('#jml_kontrak').html(response.ngajingoding.jml_kontrak);
            $('#jml_trayek').html(response.ngajingoding.jml_trayek);
            $('#jml_kendaraan').html(response.ngajingoding.jml_kendaraan);
            $('#jml_pengemudi').html(response.ngajingoding.jml_pengemudi);
        }
    });
};

// function createTableCabang(ngajingoding){
//     $('.list-cabang tbody').empty();
//     for(index in ngajingoding){
//         var 
//         cabang_id = ngajingoding[index].user_id;

//         var 
//         a = 
//         "<tr>"+
//             // "<td>"+
//             //     '<a href="#" class="btn btn-sm btn-danger" onClick="det('+cabang_id+');" id="det'+cabang_id+'"><i class="fas fa-plus"></i></a>'+
//             //     '<a href="#" class="btn btn-sm btn-danger collapse" onClick="hide('+cabang_id+');" id="hide'+cabang_id+'"><i class="fas fa-minus"></i></a>'+
//             // "</td>"+
//             "<td>"+"</td>"+
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

// function det(id){
//     var detid = '#det'+id;
//     var hideid = '#hide'+id;
//     var trhide = '#tr_hide'+id;
//     $(detid).hide();
//     $(hideid).show();
//     $(trhide).show();
// };

// function hide(id){
//     var detid = '#det'+id;
//     var hideid = '#hide'+id;
//     var trhide = '#tr_hide'+id;
//     $(detid).show();
//     $(hideid).hide();
//     $(trhide).hide();
// };

// function getKontrakTerakhirBYcabang(cabang_id){
//     $.ajax({
//         url: base_url + 'bptd/kontrak/dataTerakhirBYcabang/'+cabang_id,
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);            
//             pimpinan = '#Zpimpinan'+cabang_id;
//             alamat = '#Zalamat'+cabang_id;
//             wa = '#Zwa'+cabang_id;
//             telp = '#Ztelp'+cabang_id;
//             email = '#Zemail'+cabang_id;

//             $(pimpinan).html(response.ngajingoding[0].pimpinan);
//             $(alamat).html(response.ngajingoding[0].alamat);
//             $(wa).html(response.ngajingoding[0].wa);
//             $(telp).html(response.ngajingoding[0].telp);
//             $(email).html(response.ngajingoding[0].email);
//         }
//     });
// };

// function getJML(){
//     $.ajax({
//         url: base_url + 'bptd/dash/getJML',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             $('#jml_cabang').html(response.jml_cabang);
//             $('#jml_trayek').html(response.jml_trayek);
//             $('#jml_kendaraan').html(response.jml_kendaraan);
//             $('#jml_pengemudi').html(response.jml_pengemudi);
//         }
//     });
// };

// function getDet(id){
//     $.ajax({
//         url: base_url + 'bptd/dash/getDet',
//         type: 'GET',
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         success: function(response){
//             // console.log(response);
//             $('#jml_cabang').html(response.jml_cabang);
//             $('#jml_trayek').html(response.jml_trayek);
//             $('#jml_kendaraan').html(response.jml_kendaraan);
//             $('#jml_pengemudi').html(response.jml_pengemudi);
//         }
//     });
// }
</script>