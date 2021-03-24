<div class="col-lg-12" id="layout_tabel">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>{head_tabel}</div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <a class="btn btn-outline-primary btn-sm" href="#" id="btn-tambah" title="Tambah Data">Tambah</a> 
                    <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">Excel</a>
                    <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">PDF</a>
                </div>
                <table class="table-sm table-hover table-bordered text-muted" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>{th_element}</tr>            
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div id="loader_tabel">
               <div class="d-flex justify-content-center" >
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div> 
            </div>        
        </div>
    </div>        
</div>

<script type="text/javascript">

    $('#btn-tambah').click(function(){
        $('#btn-tambah').addClass('disabled');
        $('#form_input').show();
        {parse_action_tambah}
    })

</script>