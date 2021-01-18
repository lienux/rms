<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div id="form-kontrak" class="mt-4">
    <div class="form-group">
        <a class="btn btn-danger" href="<?=base_url();?>admin" id="btn-kembali"><i class="fas fa-angle-left"></i> Kembali</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="text-center font-weight-light">
                        Input Informasi Kontrak
                    </h3>                    
                </div>
                <div class="card-body" id="form-simpan">
                    <div class="text-center" id="loader">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" for="inputFirstName">
                                        Nomor Kontrak
                                    </label>
                                    <input class="form-control" name="no_kontrak" type="text" id="no_kontrak" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" for="inputFirstName">
                                        Alamat Kantor Cabang
                                    </label>
                                    <input class="form-control" name="alamat" type="text" id="alamat" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nama Pimpinan Cabang
                                    </label>
                                    <input class="form-control" name="gm" id="gm" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" >
                                        No. HP Pimpinan Cabang
                                    </label>
                                    <input class="form-control" name="wa" id="wa" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" >
                                        Tanggal Mulai Kontrak
                                    </label>
                                    <input class="form-control" name="tglkontrak" id="tglkontrak" type="text" />
                                    <label class="small text-danger" id="cek_tglkontrak"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" >
                                        No. Telp Kantor / HP PIC
                                    </label>
                                    <input class="form-control" name="telp" type="text" id="telp" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="small mb-1 font-weight-bold" >
                                        Alamat Email
                                    </label>
                                    <input class="form-control" name="email" id="email" type="text" />
                                </div>
                            </div>
                        </div>                                            
                    </form>
                </div>
                <div class="card-footer pb-0">
                    <div class="form-group float-right">
                        <a class="btn btn-primary" href="#" id="btn-simpan"><i class="far fa-save"></i> Simpan</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$( function() {
    $( "#tglkontrak" ).datepicker({
        dateFormat: "yy-mm-dd"
    });   
});

$('#loader,#loderkontrak').hide();

$('#btn-simpan').click(function(){
    simpan();
});

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'cabang/kontrak/add';
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
                // riwayatkontrak();
                // dataTerakhir();
                $('.maryam').delay(2000).queue(function( nxt ) {
                    // $(this).load(base_url+'kontrak/index');
                    // $('a').removeClass('active');
                    // $('#kontrak').addClass('active');
                    // $(location).attr('href',base_url+'admin');
                    location.reload();
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



//======================================= VALIDASI DATA =====================================
//======================================= VALIDASI DATA =====================================
//======================================= VALIDASI DATA =====================================

$("#tglkontrak").change(function() {
    var d = $('#tglkontrak').val();
    $.ajax({
        type: 'GET',
        url: base_url+'cabang/kontrak/cek_tglkontrak/'+d,
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
