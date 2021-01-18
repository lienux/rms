<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="row" style="padding: 24px 0px 24px 0px;">
    <div class="col-sm-5 col-md-12" id="list-kontrak">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Riwayat Kontrak</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table-hover table-bordered ngajingoding-nowrap" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="">
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
                <div id="loderkontrak">
                   <div class="d-flex justify-content-center" >
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div> 
                </div>        
            </div>
        </div>
    </div>

    <div class="collapse col-sm-7 card" style="padding: 0; border:0; overflow-y: scroll; height:570px;" id="detail_isi_kontrak">
        <div class="mb-1 pull-right">
            <button class="btn btn-sm btn-danger collapse" id="btn-verifikasi" data-toggle="modal" data-target="#verifikasi">
                <i class="fas fa-check"></i>
                Verifikasi Data
            </button>
            <button class="btn btn-sm btn-success" disabled id="btn-sudah-verifikasi">
                Data Sudah Terverifikasi . . . 
                <i class="fas fa-check"></i>
            </button>
            <div class="float-right">
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
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Pengemudi</th>
                            <th colspan="2">SIM</th>
                            <th rowspan="2">Nomer Telp/HP</th>
                            <th colspan="3">F O T O</th> 
                        </tr> 
                        <tr>
                            <th>Nomor SIM</th>
                            <th>Masa Berlaku</th>
                            <th>Pengemudi</th>
                            <th>SIM</th>
                            <th>KTP</th>
                        </tr>
                    </thead>
                    <tbody class="bpengemudi"></tbody>
                </table>
            </div>       
        </div>
    </div>
</div>
    

<!-- Modal -->
<div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Konfirmasi Verifikasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda Yakin Ingin Mem-verifikasi Data Pengajuan Kontrak???
                <h6 class="text-danger">Dengan anda Klik tombol Verifikasi, user / cabang tidak dapat melakaukan (Tambah Data, Update Data, Hapus Data) pada data kontrak ini.!!!</h6>
                <form id="verifikasi_ID">
                    <input type="hidden" name="kontrak_ID" id="kontrak_ID">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="btn-hapus" onClick="lakukan_verifikasi();"><i class="fas fa-check"></i> Verifikasi</button>
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
getKontrak();
function getKontrak(){
    $.ajax({
        url: base_url + 'bptd/kontrak/get',
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
            // console.log(response);
            createTable(response.ngajingoding);
        }
    });
};

function createTable(ngajingoding){
    $('#dataTable .bkontrak').empty();
    nurut = Number(0);
    for(index in ngajingoding){
        var 
        kontrak_id = ngajingoding[index].id,
        cabang = ngajingoding[index].name,
        no_kontrak = ngajingoding[index].no_kontrak,
        alamat = ngajingoding[index].alamat,
        pimpinan = ngajingoding[index].pimpinan,
        wa = ngajingoding[index].wa,
        telp = ngajingoding[index].telp,
        email = ngajingoding[index].email,
        tglkontrak = ngajingoding[index].tglkontrak,
        verID = ngajingoding[index].verifikasi
        if(verID == 0){
            var nameSpan = '<span>'+cabang+'</span>';
        }else{
            var nameSpan = '<i class="fas fa-check-circle text-danger"></i> '+cabang;
        }
        nurut+=1;
        var 
        a = 
        "<tr>"+
            "<td>"+
                '<button class="btn btn-sm ngajingoding-show p-2 opts" onClick="det('+kontrak_id+'); show_very('+verID+');" id="det'+kontrak_id+'"></button>'+
                '<button class="btn btn-sm ngajingoding-hide p-2 collapse opth" onClick="hide('+kontrak_id+'); show_very('+verID+');" id="hide'+kontrak_id+'"></button>'+
            "</td>"+
            "<td>"+nurut+"</td>"+
            "<td>"+nameSpan+"</td>"+
            "<td>"+no_kontrak+"</td>"+
            "<td>"+alamat+"</td>"+
            "<td>"+pimpinan+"</td>"+
            "<td>"+wa+"</td>"+
            "<td>"+telp+"</td>"+
            "<td>"+email+"</td>"+
            "<td>"+tglkontrak+"</td>"+
            "<td class='text-center'><span id='Kharian"+kontrak_id+"'></span></td>"+
            "<td class='text-center'><span id='Ktahunan"+kontrak_id+"'></span></td>"+
            "<td class='text-center'><span id='Ktrayek"+kontrak_id+"'></span></td>"+
            "<td class='text-center'><span id='Kkendaraan"+kontrak_id+"'></span></td>"+
        "</tr>";
        jmlRitase(kontrak_id);
        jmlTrayek(kontrak_id);
        jmlKendaraan(kontrak_id);
        $('#dataTable .bkontrak').append(a);
    }        
};

function show_very(very){
    if (very == 0) {
        $('#btn-verifikasi').show();
        $('#btn-sudah-verifikasi').hide();
    }else{
        $('#btn-verifikasi').hide();
        $('#btn-sudah-verifikasi').show();
    }
}

function det(kontrak_id){
    $('#kontrak_ID').val(kontrak_id);
    $('.opth').hide();
    $('.opts').show();
    var detid = '#det'+kontrak_id;
    var hideid = '#hide'+kontrak_id;
    var trhide = '#tr_hide'+kontrak_id;
    $(detid).hide();
    $(hideid).show();
    $(trhide).show();
    getTrayek(kontrak_id);
    getKendaraan(kontrak_id);
    getPengemudi(kontrak_id);
    $('#list-kontrak').removeClass('col-md-12');
    $('#detail_isi_kontrak').show();
    $('#bzoom-view').empty();
    $('#bzoom-view').html($('#bdet_isi_kontrak').html());
    // cekIDverifikasi(kontrak_id);
};

function hide(kontrak_id){
    var detid = '#det'+kontrak_id;
    var hideid = '#hide'+kontrak_id;
    var trhide = '#tr_hide'+kontrak_id;
    $('#dataTrayek .btrayek').empty();
    $('#dataKendaraan .bkendaraan').empty();
    $(detid).show();
    $(hideid).hide();
    $(trhide).hide();
    $('#list-kontrak').addClass('col-md-12');
    $('#detail_isi_kontrak').hide();
};

$('#btn-kembali').click(function(){
    $('#list-kontrak').addClass('col-md-12');
    $('#detail_isi_kontrak,.opth').hide();
    $('.opts').show();
})

function jmlRitase(kontrak_id){
    $.ajax({
        url: base_url + 'bptd/trayek/jmlRitase/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,        
        success: function(response){
            // console.log(response);
            var harian = '#Kharian'+kontrak_id;
            var tahunan = '#Ktahunan'+kontrak_id;

            $(harian).html(response.jml_harian);
            $(tahunan).html(response.jml_tahunan);
        }
    });
};

function jmlTrayek(kontrak_id){
    $.ajax({
        url: base_url + 'bptd/trayek/jml/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            var tra = '#Ktrayek'+kontrak_id;
            $(tra).html(response.jml_trayek);
        }
    });
};

function jmlKendaraan(kontrak_id){
    $.ajax({
        url: base_url + 'bptd/kendaraan/jml/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);
            var kend = '#Kkendaraan'+kontrak_id;
            $(kend).html(response.jml_kendaraan);
        }
    });
};

function buatID(kontrak_id){
    ID = kontrak_id;
    // alert(ID);
}

function getKontrakBYid(kontrak_id){
    $.ajax({
        url: base_url+'kontrak/get/'+kontrak_id,
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

function getTrayek(kontrak_id){
    $.ajax({
        url: base_url + 'bptd/trayek/getBYkontrak/'+kontrak_id,
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
        url: base_url + 'bptd/kendaraan/getBYkontrak/'+kontrak_id,
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
        url: base_url + 'bptd/pengemudi/getBYkontrak/'+kontrak_id,
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
            "<td><img src='<?=base_url();?>assets/images/pengemudi/"+ngajingoding[index].foto_sim+"' width='50px'></td>"+
            "<td><img src='<?=base_url();?>assets/images/pengemudi/"+ngajingoding[index].foto_ktp+"' width='50px'></td>"+
        "</tr>";          
        $(tb).append(a);
    }        
};

function lakukan_verifikasi(){
    kontID = $('#kontrak_ID').val();
    // var formData = new FormData($('form #verifikasi_ID')[0]);
    var urlData = base_url + 'bptd/kontrak/verifikasi/'+kontID;
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        // data: formData,
        contentType: false,
        processData: false,
        // beforeSend: function(e) {
        //     $('#loader').show()
        //     if(e && e.overrideMimeType) {
        //         e.overrideMimeType('application/jsoncharset=UTF-8')
        //     }
        // },
        // complete: function(){
        //     $('#loader').hide();
        // },
        success: function(response){
            if(response.status == 'sukses'){
                $('#verifikasi').modal('hide');
                $('#alert').html(response.pesan).fadeIn().delay(5000).fadeOut();
                cekIDverifikasi(response.verifikasi);                  
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function cekIDverifikasi(kontrak_id){
    $.ajax({
        url: base_url + 'bptd/kontrak/cekIDverifikasi/'+kontrak_id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            idver = response.ngajingoding[0].verifikasi;
            if(idver == 1){
                $('#btn-verifikasi').hide();
                $('#btn-sudah-verifikasi').show();
            }else{
                $('#btn-verifikasi').show();
                $('#btn-sudah-verifikasi').hide();
            }
        }
    });
};
</script>
