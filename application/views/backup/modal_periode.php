<div class="modal fade" id="modal_kontrak_periode" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background-color: #FFFCD4;">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Form Pilih Periode Kontrak</h5>
                <a href="<?=base_url();?>logout" class="btn btn-warning">
                    <i class="fa fa-power-off"></i>
                    Logout
                </a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="small mb-1 font-weight-bold" >
                        Pilih Periode Kontrak
                    </label>
                    <select class="custom-select" name="kontrak_id" id="kontrak_id">
                        <option value="" selected>--- Periode Kontrak ---</option>
                    </select>
                    <label class="small text-secondary">Pengaturan ini bertujuan untuk me-load data sesuai periode kontrak yang anda pilih.</label>
                </div>
                <div class="form-group mb-0">
                    <label>
                        Belum memiliki periode kontrak? <a href="#" onclick="formKontrak();">Klik di sini.</a>
                    </label>                                
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" onclick="setKontrak();"><i class="fas fa-check"></i> Pilih</a>
            </div>
        </div>
    </div>
</div>
