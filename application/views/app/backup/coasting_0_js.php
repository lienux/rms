<script type="text/javascript">
    // $( function() {
    //     $( "#tglkontrak" ).datepicker({
    //         dateFormat: "yy-mm-dd"
    //     });   
    // });

    $('#btn-update').click(function(){
        update(ID);
        // alert(ID);
    });

    list_coasting();
    
    function list_coasting(){
        $.ajax({
            url: base_url + 'coasting/get',
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(e) {
                $('#loader').show();
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            complete: function(){
                $('#loader').hide();
            },
            success: function(response){
                console.log(response);
                createTable(response.bocahgantengdotcom);
            }
        });
    };

    function createTable(data){
        $('#dataTable tbody').empty();
        nurut = Number(0);
        for(index in data){
            var 
            id = data[index].id,
            indexx = id-1,
            jumlah = parseFloat(data[index].jumlah),
            debit_kredit = data[index].debit_kredit
            
            nurut+=1;
            nurut_dex = nurut-1

            if (debit_kredit==0) {
                nama = '&emsp; '+data[index].nama
                debit = '-'
                kredit = parseInt(jumlah).toLocaleString();

                if (indexx==0) {
                    saldo = jumlah
                }else{
                    saldo = saldo - jumlah
                }

            }else{
                nama = data[index].nama
                debit = parseInt(jumlah).toLocaleString();
                kredit = '-'

                if (indexx==0) {
                    saldo = jumlah
                }else{
                    saldo = saldo + jumlah
                }
            }


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
            
            var 
            a = 
            "<tr>"+
                "<td class='text-center'>"+nurut+"</td>"+
                "<td>"+nama+"</td>"+
                "<td class='text-right'>"+debit+"</td>"+
                "<td class='text-right'>"+kredit+"</td>"+
                "<td class='text-right'>"+parseInt(saldo).toLocaleString()+"</td>"+
                "<td class='text-center'>"+opt+"</td>"+
            "</tr>";
            $('#dataTable tbody').append(a); 
        }        
    };

    function export_excel(id){
        window.open(base_url + 'kontrak/export_excel/'+id);
    }

    function jmlRitase(id){
        $.ajax({
            url: base_url + 'trayek/jmlRitase/'+id,
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
            url: base_url + 'trayek/jml/'+id,
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
            url: base_url + 'vehicle/jumlah/'+id,
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

    function lakukanEdit(id){    
        buatID(id);
        getKontrakBYid(id);
    }

    function buatIDhapus(id){
        IDhapus = id;
    }

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
                $('#no_kontrak').val(response.ngajingoding[0].no_kontrak);
                $('#alamat').val(response.ngajingoding[0].alamat);
                $('#gm').val(response.ngajingoding[0].pimpinan);
                $('#wa').val(response.ngajingoding[0].wa);
                $('#tglkontrak').val(response.ngajingoding[0].tglkontrak);
                $('#telp').val(response.ngajingoding[0].telp);
                $('#email').val(response.ngajingoding[0].email);
                
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

    function simpan(){
        var formData = new FormData($('#form-simpan form')[0]);
        var urlData = base_url + 'kontrak/add';
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
                    riwayatkontrak();
                    // dataTerakhir();
                    $('.maryam').delay(2000).queue(function( nxt ) {
                        $(this).load(base_url+'kontrak/index');
                        $('a').removeClass('active');
                        $('#kontrak').addClass('active');
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

    function update(id){
        var formData = new FormData($('#form-simpan form')[0]);
        var urlData = base_url + 'kontrak/edit/'+id;
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
                    $('#form-kontrak').hide();
                    $('#kontrakTerbaru,#list-kontrak').show();
                    riwayatkontrak();
                    // dataTerakhir();
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
        var urlData = base_url + 'kontrak/hapus/'+id;
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
                    $('#form-kontrak').hide();
                    $('#kontrakTerbaru,#list-kontrak').show();
                    riwayatkontrak();
                    // dataTerakhir();
                    $('#modalHapus').modal('hide');
                    location.reload(true);
                }else{ 
                    $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            }
        });
    };



    //======================================= VALIDASI DATA =====================================
    //======================================= VALIDASI DATA =====================================
    //======================================= VALIDASI DATA =====================================

    $("#tglkontrak").change(function() {
        var d = $('#tglkontrak').val();
        $.ajax({
            type: 'GET',
            url: base_url+'kontrak/cek_tglkontrak/'+d,
            dataType: 'JSON',
            contentType: false,
            processData: false,        
            success: function(response){
                if(response.status == 'sukses'){
                    $('#cek_tglkontrak').show();
                    $('#cek_tglkontrak').html(response.pesan);
                }else{ 
                    $('#cek_tglkontrak').hide();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            }
        });
    });
</script>