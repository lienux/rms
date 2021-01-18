<!-- <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
    </div>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div> -->


<div class="collapse mt-4" id="form-simpan"> 
    <!-- <div class="form-group">
        <a class="btn btn-outline-danger btn-sm" href="#" id="btn-kembali"><i class="fas fa-angle-left"></i> Kembali</a>
    </div> -->
    <div class="row justify-content-center" >
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header text-center">Input Data Kendaraan
                    <button type="button" class="close" onclick="close_form_input();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form>                        
                        <div class="form-row">
                            <input type="hidden" name="kontrak_id" id="kontrak_id">
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Trayek Yang Dilayani <span class="text-danger">*</span>
                                    </label>
                                    <select class="custom-select" name="trayek_dilayani" id="trayek_dilayani">
                                        <option value="" selected>--- Pilih Trayek ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Kode Bus <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="kode_bus" id="kode_bus" />
                                    <label class="small text-secondary">Contoh: 4512</label>
                                    <label class="small text-danger" id="cek_kode_bus"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        No Polisi <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="nopol" id="nopol" />
                                    <label class="small text-secondary">Contoh: PB 7212 T</label>
                                    <label class="small" id="cek_nopol"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Tahun Produksi Kendaraan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="thn_produksi" id="thn_produksi" />
                                    <label class="small text-secondary">Contoh: 2010</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Merk dan Tipe Kendaraan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="merk_tipe" id="merk_tipe" />
                                    <label class="small text-secondary">Contoh: MITSUBISHI KANTER</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Jumlah Seat <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                    <label class="small text-secondary">Contoh: 30</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nomor Rangka Kendaraan <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="no_rangka" id="no_rangka" />
                                    <label class="small text-secondary">Contoh: MHCNK71LYBJ022412</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nomor STNK <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="no_stnk" id="no_stnk" />
                                    <label class="small text-secondary">Contoh: 11542254</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Masa Berlaku STNK <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="masa_stnk" id="masa_stnk" id="masa_stnk" />
                                    <label class="small text-secondary">Contoh: 2023-11-06</label>
                                </div>
                            </div>                        
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Nomor KIR <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="no_kir" id="no_kir" />
                                    <label class="small text-secondary">Contoh: SON 6433</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Masa Berlaku KIR <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="masa_kir" id="masa_kir" />
                                    <label class="small text-secondary">Contoh: 2020-07-16</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" for="inputFirstName">
                                        Konsumsi BBM (km/liter)
                                    </label>
                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                    <label class="small text-secondary" >Contoh : 7 km / 1 liter</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Status Kendaraan <span class="text-danger">*</span>
                                    </label>
                                    <select class="custom-select" name="status" id="status">
                                        <option value="" selected>--- Pilih Status Kendaraan ---</option>
                                        <option value="1">Siap Guna Operasi (SGO)</option>
                                        <option value="0">Cadangan</option>
                                    </select>
                                </div>
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto Kendaraan Depan
                                    </label>
                                    <input class="form-control" type="file" name="foto_depan" />
                                    <img src="" width="100px" id="foto_depan">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto Kendaraan Belakang
                                    </label>
                                    <input class="form-control" type="file" name="foto_belakang" />
                                    <img src="" width="100px" id="foto_belakang">
                                </div>
                            </div>                        
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto Kendaraan Kanan
                                    </label>
                                    <input class="form-control" type="file" name="foto_kanan" />
                                    <img src="" width="100px" id="foto_kanan">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1 font-weight-bold" >
                                        Foto Kendaraan Kiri
                                    </label>
                                    <input class="form-control" type="file" name="foto_kiri" />
                                    <img src="" width="100px" id="foto_kiri">
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