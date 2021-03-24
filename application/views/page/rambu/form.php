<?php
	if (isset($detail)) {
		foreach ($detail as $d) {
			$id = $d['id'];
			$nm_jalan = $d['name'];
			$latitude = $d['latitude'];
			$longitude = $d['longitude'];
			$status_jalan_id = '<option value="'.$d['status_jalan_id'].'" selected>'.$d['status_jalan'].'</option>';
		}
	}else{
		$id = '';
		$nm_jalan = '';
		$latitude = '';
		$longitude = '';
		$status_jalan_id = '';
	}
?>
<div class="col-lg-4" id="layout_tabel">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Form Data Rambu
        	<a href="<?=base_url();?>rambu" type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <?php echo form_open('rambu/{do_to}/'.$id); ?>
        <div class="card-body">
        	<div class="form-row">
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Nama Rambu
						</label>
						<input class="form-control" name="input_nama" type="text" id="input_nama" value="<?=$nm_jalan;?>" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Jenis Rambu
						</label>
						<select class="custom-select" name="opt_jenis_rambu" id="opt_jenis_rambu">
						    <option selected>Pilih...</option>
						    <!-- <?=$status_jalan_id;?> -->
						    <?php foreach ($list_jenis_rambu as $row) { ?>
						    <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Kondisi Rambu
						</label>
						<select class="custom-select" name="opt_kondisi_rambu" id="opt_kondisi_rambu">
						    <option selected>Pilih...</option>
						    <?=$status_jalan_id;?>
						    <?php foreach ($list_kondisi_rambu as $row) { ?>
						    <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Tahun Anggaran
						</label>
						<input class="form-control" name="input_ta" type="text" id="input_ta" value="<?=$nm_jalan;?>" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Lokasi Jalan
						</label><p>
						<textarea name="input_lokasi" id="input_lokasi" class="form-control" style="min-width: 100%"></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group input-group-sm">
			        	<label class="small mb-1 font-weight-bold">
			        		Latitude
			        	</label>
			        	<input class="form-control" name="input_lat" type="text" id="input_lat" value="<?=$latitude;?>" />
			    	</div>
			    </div>
			    <div class="col-md-6">
					<div class="form-group input-group-sm">
			        	<label class="small mb-1 font-weight-bold">
			        		Longitude
			        	</label>
			        	<input class="form-control" name="input_lon" type="text" id="input_lon" value="<?=$longitude;?>" />
			    	</div>
			    </div>
			    <div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Foto Rambu
						</label>
						<input class="form-control" name="input_foto" type="file" id="foto_rambu" value="<?=$nm_jalan;?>" />
					</div>
				</div>
			</div>	        
		</div>
		<div class="card-footer pb-2">
            <div class="form-group text-right">
                <input class="btn btn-primary btn-sm" type="submit" value="Simpan"></input>                      
            </div>
        </div>
    	</form>
	</div>
</div>

<?php echo $data; ?>