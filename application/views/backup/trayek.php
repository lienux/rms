<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<?php $this->load->view('trayek_form');?>
<div class="card mb-4 mt-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Trayek</div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group">
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-tambah" title="Tambah Data">
                    Tambah
                </a> 
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">
                    <!-- <i class="far fa-file-excel fa-lg"></i> --> Excel
                </a>
                <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">
                    <!-- <i class="far fa-file-pdf fa-lg"></i> --> PDF
                </a>                
                <span class="text-danger" id="verifikasi_info"><i class="fas fa-check"></i> Data Sudah Diverifikasi oleh BPTD . . .</span>
            </div>                
            <table class="table-sm table-hover table-bordered display nowrap text-muted" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>Nama Trayek</th>
                        <th>Ritase</th>
                        <th>Jadwal</th>
                        <th>Tititk Koordinat</th>
                        <th class="collapse"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="lodertabel">
           <div class="d-flex justify-content-center" >
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div> 
        </div>        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" id="btn-close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-hapus" onclick="hapus(IDhapus);">Hapus</button>
            </div>
        </div>
    </div>
</div>