<div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
<div class="card mb-4 mt-4" id="list-kontrak">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Riwayat Informasi Kontrak</div>
    <div class="card-body">
        <div class="form-group">
            <a class="btn btn-outline-primary btn-sm" href="#" id="btn-tambah" title="Tambah Kontrak Baru">Tambah</a>
            <!-- <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">Excel</a>
            <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">PDF</a> -->
        </div>
        <div class="table-responsive">
            <table class="table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-muted">
                    <tr>
                        <th colspan="2"></th>
                        <th>Nama</th>
                        <th>Kontak</th>                        
                        <th>Target Ritase</th>
                        <th>Jumlah</th>                      
                        <th>Alamat</th>
                    </tr>            
                </thead>
                <tbody></tbody>
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

<?php $this->load->view('cabang/kontrak_form');?>

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btn-hapus" onclick="hapus(IDhapus);">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>

</script>
