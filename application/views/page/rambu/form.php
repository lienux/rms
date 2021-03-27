<?php
	if (isset($detail)) {
		foreach ($detail as $d) {
			$id = $d['id'];
			$nm_rambu = $d['nama_rambu'];
			$latitude = $d['latitude'];
			$longitude = $d['longitude'];
			$jenis_rambu = '<option value="'.$d['jenis_rambu_id'].'" selected>'.$d['jenis_rambu'].'</option>';
			$kondisi_rambu = '<option value="'.$d['kondisi_rambu_id'].'" selected>'.$d['kondisi_rambu'].'</option>';
			$lokasi_jalan = $d['lokasi_jalan'];
			$foto = base_url().'public/assets/images/'.$d['foto'];
		}
	}else{
		$id = '';
		$nm_rambu = '';
		$latitude = '';
		$longitude = '';
		$jenis_rambu = '';
		$kondisi_rambu = '';
		$lokasi_jalan = '';
		$foto = '';
	}
?>
<div class="col-lg-4" id="layout_tabel">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Form Data Rambu
        	<a href="<?=base_url();?>rambu" type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <?php if (isset($error)) {
        	# code...
        	echo $error;        	
        }?>
        <?php echo form_open_multipart('rambu/{do_to}/'.$id); ?>
        <div class="card-body">
        	<div class="form-row">
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Nama Rambu
						</label>
						<input class="form-control" name="input_nama" type="text" id="input_nama" value="<?=$nm_rambu;?>" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Jenis Rambu
						</label>
						<select class="custom-select" name="opt_jenis_rambu" id="opt_jenis_rambu">
						    <option selected>Pilih...</option>
						    <?=$jenis_rambu;?>
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
						    <?=$kondisi_rambu;?>
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
						<input class="form-control" name="input_ta" type="text" id="input_ta" value="<?=$nm_rambu;?>" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Lokasi Jalan
						</label>
						<select class="custom-select" name="opt_lokasi_jalan" id="opt_lokasi_jalan">
						    <option selected>Pilih...</option>
						    <?=$data_jalan;?>
						    <?php foreach ($list_data_jalan as $row) { ?>
						    <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
							<?php } ?>
						</select>
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
						<input class="form-control" name="foto_rambu" type='file' accept='image/*' onchange='openFile(event)'><br>
						<img src="<?=$foto;?>" id="img_rambu">
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


<script>
 	var openFile = function(event) {
    	var input = event.target;

    	var reader = new FileReader();
    	reader.onload = function(){
	      	var dataURL = reader.result;
	      	var output = document.getElementById('img_rambu');
	      	output.src = dataURL;
	    };
	    reader.readAsDataURL(input.files[0]);
  	};
</script>

<?php echo $data; ?>