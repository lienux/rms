<div class="collapse mt-4" id="form-pengemudi">
    <!-- <div class="form-group">
        <a class="btn btn-outline-danger btn-sm" href="#" id="btn-kembali"><i class="fas fa-angle-left"></i> Kembali</a>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header text-center">Input Data Pengemudi
                    <button type="button" class="close" onclick="close_form_input();">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                            <input type="hidden" name="kontrak_id" id="kontrak_id">
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nama Lengkap
                                    </label>
                                    <input class="form-control" type="text" name="nama" id="nama" />
                                    <label class="small text-secondary" >Contoh : Sis Anwar</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nomor Telpon/HP
                                    </label>
                                    <input class="form-control" type="text" name="telp" id="telp" />
                                    <label class="small text-secondary" >Contoh : </label>
                                </div>
                            </div>                                                      
                        </div>
                        <div class="form-row">                            
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nomor SIM
                                    </label>
                                    <input class="form-control" type="text" name="sim" id="sim" />
                                    <label class="small text-secondary" >Contoh : 811014360978</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Masa Berlaku SIM
                                    </label>
                                    <input class="form-control" type="text" name="masa_sim" id="masa_sim" />
                                    <label class="small text-secondary" >Contoh : </label>
                                </div>
                            </div>                           
                        </div>                        
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto Pengemudi
                                    </label>
                                    <input class="form-control" type="file" name="foto_pengemudi" />
                                    <img src="" width="100px" id="foto_pengemudi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto SIM
                                    </label>
                                    <input class="form-control" type="file" name="foto_sim" />
                                    <img src="" width="100px" id="foto_sim">
                                </div>
                            </div>                        
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto KTP
                                    </label>
                                    <input class="form-control" type="file" name="foto_ktp" />
                                    <img src="" width="100px" id="foto_ktp">
                                </div>
                            </div>                            
                        </div>                       
                    </form>
                </div>
                <div class="card-footer pb-0">
                    <div class="form-group float-right">
                        <a class="btn btn-outline-secondary btn-sm" href="#" onclick="close_form_input();"><i class="fas fa-times"></i> Batal</a>
                        <a class="btn btn-outline-primary btn-sm" href="#" id="btn-simpan"><i class="far fa-save"></i> Simpan</a>
                        <a class="btn btn-outline-primary btn-sm" href="#" id="btn-update"><i class="far fa-save"></i> Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>