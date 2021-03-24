<script type="text/javascript">
// $(document).ready(function() {
//     $('#dataTable').DataTable();
// } );
base_url = '<?php base_url();?>';
get_jml();
getCabang();

function getCabang(){
    $.ajax({
        url: base_url + 'dashboard/list_cabang',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            createTableCabang(response.ngajingoding);
        }
    });
};

function createTableCabang(ngajingoding){
    $('.list-cabang tbody').empty();
    nurut = Number(0);
    for(index in ngajingoding){
        var 
        cabang_id = ngajingoding[index].user_id;
        nurut+=1;

        var 
        a = 
        "<tr>"+
            "<td>"+nurut+"</td>"+
            "<td>"+ngajingoding[index].name+"</td>"+
            "<td><span id='Zpimpinan"+cabang_id+"'></span></td>"+
            "<td><span id='Zalamat"+cabang_id+"'></span></td>"+
            "<td class='text-center'><span id='Zwa"+cabang_id+"'></span></td>"+
            "<td class='text-center'><span id='Ztelp"+cabang_id+"'></span></td>"+
            "<td><span id='Zemail"+cabang_id+"'></span></td>"+            
        "</tr>"+
        "<tr class='collapse' id='tr_hide"+cabang_id+"'>"+
            "<td colspan='8'>"+
                "<h6>Detail: "+"</h6>"+
                // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
                // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
                // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
                // "<img src='assets/images/kendaraan/"+"' width='200px'>"+
            "</td>"+
        "</tr>";
        getKontrakTerakhirBYcabang(cabang_id);
        $('.list-cabang tbody').append(a);
    }        
};

function det(id){
    var detid = '#det'+id;
    var hideid = '#hide'+id;
    var trhide = '#tr_hide'+id;
    $(detid).hide();
    $(hideid).show();
    $(trhide).show();
};

function hide(id){
    var detid = '#det'+id;
    var hideid = '#hide'+id;
    var trhide = '#tr_hide'+id;
    $(detid).show();
    $(hideid).hide();
    $(trhide).hide();
};

function getKontrakTerakhirBYcabang(cabang_id){
    $.ajax({
        url: base_url + 'bptd/kontrak/dataTerakhirBYcabang/'+cabang_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            
            pimpinan = '#Zpimpinan'+cabang_id;
            alamat = '#Zalamat'+cabang_id;
            wa = '#Zwa'+cabang_id;
            telp = '#Ztelp'+cabang_id;
            email = '#Zemail'+cabang_id;

            $(pimpinan).html(response.ngajingoding[0].pimpinan);
            $(alamat).html(response.ngajingoding[0].alamat);
            $(wa).html(response.ngajingoding[0].wa);
            $(telp).html(response.ngajingoding[0].telp);
            $(email).html(response.ngajingoding[0].email);
        }
    });
};

function get_jml(){
    $.ajax({
        url: base_url + 'dashboard/get_jml',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            console.log(response);
            $('#ico_jml_trayek').html(response.jml_trayek);
            $('#ico_jml_kendaraan').html(response.jml_kendaraan.kendaraan_semua);
            $('#ico_jml_pengemudi').html(response.jml_pengemudi);
        }
    });
};

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