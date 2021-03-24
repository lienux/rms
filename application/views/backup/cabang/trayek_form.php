<div id="form-add" class="mt-4 collapse">
    <!-- <div class="form-group">
        <a class="btn btn-outline-danger btn-sm" href="#" id="btn-kembali"><i class="fas fa-angle-left"></i> Kembali</a>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header text-center">Input Data Trayek
                    <button type="button" class="close" onclick="close_form_input();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body" id="form-simpan">
                    <form>                        
                        <div class="form-row">
                            <input type="hidden" name="kontrak_id" id="kontrak_id">
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nama Trayek <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="trayek" id="Etrayek" />
                                    <label class="small text-secondary" >Contoh : Teminabuan - Seremuk</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Jarak KM <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="jarak" id="Ejarak" />
                                    <label class="small text-secondary" >Contoh : 70</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Target Ritase Harian <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="ritase_harian" id="Eritase_harian" />
                                    <label class="small text-secondary" >Contoh : 4</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Target Ritase Bulanan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="ritase_bulanan" id="Eritase_bulanan" />
                                    <label class="small text-secondary" >Contoh : 100</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Target Ritase 1 Tahun <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="ritase_tahun" id="Eritase_tahun" />
                                    <label class="small text-secondary" >Contoh : 1460</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Jadwal Keberangkatan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="jadwal_berangkat" id="Ejadwal_berangkat" />
                                    <label class="small text-secondary" >Contoh : 06.00</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Jadwal Kedatangan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="jadwal_datang" id="Ejadwal_datang" />
                                    <label class="small text-secondary" >Contoh : 17.30</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Titik Koordinat Awal
                                    </label>
                                    <input class="form-control" type="text" name="koordinat_awal" id="Ekoorditan_awal" />
                                    <label class="small text-secondary" >Contoh : -6.911002, 107.654611</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold">
                                        Titik Koordinat Akhir
                                    </label>
                                    <input class="form-control" type="text" name="koordinat_akhir" id="Ekoorditan_akhir"/>
                                    <label class="small text-secondary" >Contoh : -6.678645, 106.664586</label>
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