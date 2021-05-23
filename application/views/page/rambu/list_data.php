<div class="{col}" id="layout_tabel">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Rambu Lalu Lintas</div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <a class="btn btn-outline-primary btn-sm {disabled}" href="<?=base_url();?>rambu/tambah" id="btn-tambah" title="Tambah Data">Tambah</a> 
                    <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to Excel">Excel</a>
                    <a class="btn btn-outline-primary btn-sm" href="#" id="btn-excel" title="Export to PDF">PDF</a>
                </div>
                <table class="table-sm table-hover table-bordered text-muted" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Rambu</th>
                            <th>Jenis Rambu</th>
                            <th>Kondisi Rambu</th>
                            <th>Tahun Anggaran</th>
                            <th>Lokasi Jalan</th>
                            <th>Titik Koordinat</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>            
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($data_table as $row) { ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['nama_rambu'];?></td>
                            <td><?=$row['jenis_rambu'];?></td>
                            <td><?=$row['kondisi_rambu'];?></td>
                            <td class="text-center"><?=$row['tahun_anggaran'];?></td>
                            <td><?=$row['lokasi_jalan'];?></td>
                            <td><?=$row['latitude'].','.$row['longitude'];?></td>
                            <td class="text-center">
                                <?php
                                    $file = $row['foto'];

                                    if ($file) {
                                        // code...
                                        if ($tampilkan_gambar_list==1) { ?>
                                            <img src="<?=base_url().'public/assets/images/'.$file;?>" width="50px" class="img-thumbnail">
                                        <?php }else{ ?>
                                            <a href="#" class="view_image" data-toggle="modal" data-target="#modal_show_image" onClick = "show_image('<?=$file;?>');" data-nama="<?=$row['nama_rambu'];?>">
                                                <i class="fas fa-eye text-warning"></i></td>
                                            </a>
                                        <?php }
                                    }
                                ?>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <a href="#" id="btnGroupDrop1" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="<?=base_url('rambu/edit/'.$row['id']);?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="#" onclick="modal_hapus('<?=$row["id"];?>');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="collapese" id="loader_tabel">
               <div class="d-flex justify-content-center" >
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div> 
            </div> -->        
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" id="btn-hapus">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_show_image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="maryam_face"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function modal_hapus(id)
    {
        $('#btn-hapus').attr('href','<?=base_url();?>rambu/doHapus/'+id);
        $('#modalHapus').modal('show');
    }

    function show_image(file)
    {
        var foto = '<img src="<?=base_url();?>public/assets/images/'+file+'">';
        var nama = $(this).attr("data-nama");

        $('#maryam_face').html(foto);
    }
</script>