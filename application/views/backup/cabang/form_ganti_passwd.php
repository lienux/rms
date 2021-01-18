<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="mt-4" id="form-simpan"> 
    <div class="form-group">
        <a class="btn btn-danger" href="#" id="kembalikedash">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>
    <div class="row justify-content-center" >
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="text-center font-weight-light">
                        Form Ganti Password
                    </h3>
                </div>
                <div class="card-body">
                    <form>                        
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right">Username Anda</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="username" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right">Password Baru</label>
                                <div class="col-sm-7">
                                  <input type="password" name="password" class="form-control">
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right">Confirm Password Baru</label>
                                <div class="col-sm-7">
                                  <input type="password" name="confirm_passwd" class="form-control">
                                </div>
                            </div>                           
                        </div>                                               
                    </form>
                </div>
                <div class="card-footer pb-0">
                    <div class="form-group float-right">
                        <a class="btn btn-primary" href="#" id="btn-simpan">
                            <i class="far fa-save"></i> Simpan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
getUser();
$('a').removeClass('active');
$('#userDropdown').addClass('active');
$('#kembalikedash').click(function(){
    $('.maryam').load(base_url+'cabang/template/dash');
    $('a').removeClass('active');
    $('#dash').addClass('active');
})

$('#btn-simpan').click(function(){
    simpan();
})

function kosongkanform(){
    $('form input,form textarea').val('');
    $('form img').attr('src', '');
};

function getUser(){
    $.ajax({
        url: base_url + 'cabang/user/get',
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
            $('#username').val(response[0].username);
        }
    });
};

function simpan(){
    var formData = new FormData($('#form-simpan form')[0]);
    var urlData = base_url + 'cabang/user/edit';
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
                $('.maryam').delay(2000).queue(function( nxt ) {
                    $(this).load(base_url+'template/dash');
                    $('a').removeClass('active');
                    $('#dash').addClass('active');
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
</script>

