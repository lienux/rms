<div id="form-kontrak" class="mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header text-center">Input Informasi Kontrak
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
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" for="inputFirstName">
                                        Nomor Kontrak
                                    </label>
                                    <input class="form-control" name="no_kontrak" type="text" id="no_kontrak" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" for="inputFirstName">
                                        Alamat Kantor Cabang
                                    </label>
                                    <input class="form-control" name="alamat" type="text" id="alamat" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nama Pimpinan Cabang
                                    </label>
                                    <input class="form-control" name="gm" id="gm" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        No. HP Pimpinan Cabang
                                    </label>
                                    <input class="form-control" name="wa" id="wa" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Tanggal Mulai Kontrak
                                    </label>
                                    <input class="form-control" name="tglkontrak" id="tglkontrak" type="text" />
                                    <label class="small text-danger" id="cek_tglkontrak"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        No. Telp Kantor / HP PIC
                                    </label>
                                    <input class="form-control" name="telp" type="text" id="telp" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group input-group-sm">
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
                        <a class="btn btn-outline-secondary btn-sm" href="#" onclick="close_form_input();"><i class="fas fa-times"></i> Batal</a>
                        <a class="btn btn-outline-primary btn-sm" href="#" onclick="simpan_kontrak();" id="btn-simpan"><i class="far fa-save"></i> Simpan</a>
                        <a class="btn btn-outline-primary btn-sm" href="#" onclick="update_kontrak();" id="btn-update"><i class="far fa-save"></i> Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>