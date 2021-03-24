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
        <div class="card-header"><i class="fas fa-table mr-1"></i>Form Data Jalan
        	<a href="<?=base_url();?>jalan" type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <?php echo form_open('jalan/{do_to}/'.$id); ?>
        <div class="card-body">
        	<div class="form-row">
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Nama Jalan
						</label>
						<input class="form-control" name="input_jalan" type="text" id="input_jalan" value="<?=$nm_jalan;?>" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group input-group-sm">
						<label class="small mb-1 font-weight-bold">
							Status Jalan
						</label>
						<select class="custom-select" name="opt_status" id="opt_status">
						    <option selected>Pilih...</option>
						    <?=$status_jalan_id;?>
						    <?php foreach ($list_status_jalan as $row) { ?>
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
			    	<div class="form-group">
			    		<label class="small mb-1 font-weight-bold">
			        		Rute
			        	</label>
			        	<div class="input-group input-group-sm">
						  	<input type="text" class="form-control">
						  	<div class="input-group-append">
						    	<button class="btn btn-small btn-outline-secondary" type="button"><i class="fas fa-search-location"></i></button>
						  	</div>
						</div>
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