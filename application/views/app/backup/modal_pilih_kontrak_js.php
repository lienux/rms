<script type="text/javascript">
$('#modal_kontrak_periode').modal('show');

    // $('#btn-batal').click(function(){
        
    // })

    // $('#btn-simpan').click(function(){
    //     simpan();
    // })

    getKontrak();

    // function setKontrak(kontrak_id){
    //     Cookies.set('kontrak_id', kontrak_id, { expires: 1 });
    //     var coki_kontrak_id = Cookies.get('kontrak_id');
    //     $('#kontrakID').html(coki_kontrak_id);
    //     // $('#setKontrakID').modal('hide');
    // }

    // function formKontrak(){
    //     $('.maryam').load(form_kontrak);
    //     $('#setKontrakID').modal('hide');
    // }

    function getKontrak(){
        $.ajax({
            url: '{base_url}kontrak/get',
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
                createOptionKontrak(response.ngajingoding);
            }
        });
    };

    function createOptionKontrak(ngajingoding){
        // $('.cabang-tb-kontrak tbody').empty();
        for(index in ngajingoding){
            var 
            id = ngajingoding[index].id,
            no_kontrak = ngajingoding[index].no_kontrak,
            tglkontrak = ngajingoding[index].tglkontrak,
            pimpinan = ngajingoding[index].pimpinan

            var a = '';
            a += '<option value="'+id+'">'+tglkontrak+' ('+pimpinan+')'+'</option>';
            $('#kontrak_id').append(a); 
        }        
    };

    function setKontrak(){
        var getID = $('#kontrak_id').val();
        if (getID == '') {
            alert('Silahkan pilih periode kontrak!');
        }else{
            Cookies.set('kontrak_id', getID, { expires: 1 });
            var coki_kontrak_id = Cookies.get('kontrak_id');

            $.ajax({
                url: '{base_url}kontrak/get/'+coki_kontrak_id,
                type: 'GET',
                dataType: 'JSON',
                contentType: false,
                processData: false,
                beforeSend: function(e) {
                    // $('#lodertabel').show();
                    if(e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
                complete: function(){
                    // $('#lodertabel').hide();
                },
                success: function(response){
                    // console.log(response);
                    var tglkontrak = response.ngajingoding[0].tglkontrak,
                        nokontrak = response.ngajingoding[0].no_kontrak,
                        pimpinan = response.ngajingoding[0].pimpinan,
                        verifikasi = response.ngajingoding[0].verifikasi
                    Cookies.set('verifikasi', verifikasi, { expires: 1 });
                    $('#alert-kontrak').html(
                        'Periode Kontrak : '+
                        '<span class="font-weight-bold">'+
                            tglkontrak+' | '+nokontrak+' | '+pimpinan+
                        '</span> '+
                        '<span class="small">Silahkan refresh halaman untuk mengganti periode kontrak atau</span> '+
                        '<a href="<?=base_url();?>admin">Klik di sini.</a>'
                    );
                    $('#layoutSidenav_nav').show();
                    $('#alert-kontrak').show();
                    $('#dash').addClass('active');
                    $('.maryam').load(dash);
                    $('#modal_kontrak_periode').modal('hide');
                    // getPesan();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
                }
            });
        }              
    };

    function simpan_kontrak(){
        var formData = new FormData($('#form-simpan form')[0]);
        var urlData = '{base_url}kontrak/add';
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
                    $('#alert-modal').html(response.pesan).fadeIn().delay(2000).fadeOut();
                    getKontrak();
                    $('#formTambah').hide();
                    // riwayatkontrak();
                    // dataTerakhir();
                    // $('.maryam').delay(2000).queue(function( nxt ) {
                    //     $(this).load(base_url+'kontrak/index');
                    //     $('a').removeClass('active');
                    //     $('#kontrak').addClass('active');
                    //     nxt();
                    // }); 
                }else{ 
                    $('#alert-modal').html(response.pesan).fadeIn().delay(2500).fadeOut();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            }
        });
    };

    function loader(){
        $('#modal-loader').modal('show');
    }

    function loader_out(){
        $('#modal-loader').modal('hide');
    }

    function form_kontrak_hide(){
        $('#formTambah').hide();
    }
</script>