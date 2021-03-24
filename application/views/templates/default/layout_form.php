<div id="form_input" class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header text-center">{head_form}
            <button type="button" class="close" onclick="close_form();">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>                   
        <div class="card-body" id="form-simpan">
            <div class="text-center" id="loader_form">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <form>{input_element}</form>
        </div>
        <div class="card-footer pb-0">
            <div class="form-group float-right">
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-simpan" title="Simpan Data">
                    <i class="far fa-save"></i> Simpan
                </a>                      
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#btn-update').hide();

    $('#loader_tabel,#loader_form,#form_input').hide();

    function close_form(){
        $('#btn-simpan').show();
        $('#form_input,#btn-update').hide();
        $('#btn-tambah').removeClass('disabled');
        kosongkanform();
        {parse_action_close}
    }

    $('#btn-simpan').click(function(){
        simpan();
    })

    // $('#btn-update').click(function(){
    //     update(ID);
    // });

    function kosongkanform(){
        $('form input,form textarea').val('');
        $('form input').removeAttr('checked');
        $('form img').attr('src', '');
    };
    
</script>
