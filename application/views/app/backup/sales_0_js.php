<script type="text/javascript">
	list_data();

	function list_data(){
        $.ajax({
            url: base_url + 'sales/get_report',
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(e) {
                $('#lodertabel').show();
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            complete: function(){
                $('#lodertabel').hide();
            },
            success: function(response){
                console.log(response);
                createTable(response.bocahgantengdotcom);
            }
        });
    };

    function createTable(d){
        $('#dataTable tbody').empty();
        nurut = Number(0);
        for(index in d){
            var 
            id = d[index].id,
            nama = d[index].nama,
            bawa = d[index].bawa,
            repeat = d[index].repit,
            bad_stok = d[index].bad_stok,
            tanggal = d[index].tanggal,
            sales_id = d[index].sales_id,
            ratio_bs = d[index].ratio_bs,
            noo = d[index].noo,
            closing = d[index].closing,
            sisa = d[index].sisa,
            box_kmb = d[index].box_kmb,
            tba_l = d[index].tba_l,
            tba_r = d[index].tba_r,
            tutup = d[index].tutup,
            rasio_bs = d[index].rasio_bs,
            setoran = parseFloat(d[index].setoran)
            nurut+=1;

            opt =
            '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">'+
                '<div class="btn-group" role="group">'+
                    '<a href="#" id="btnGroupDrop1" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>'+
                    '<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">'+
                        '<a class="dropdown-item to-edit" href="#" onClick = "lakukanEdit('+id+');"><i class="fas fa-edit"></i> Edit</a>'+
                        '<a class="dropdown-item to-hapus" href="#" data-toggle="modal" data-target="#modalHapus" onClick = "buatIDhapus('+id+');"><i class="fas fa-trash-alt"></i> Hapus</a>'+
                        '<a class="dropdown-item to-excel" href="#" onClick ="export_excel('+id+');" title="Export Detail Data"><i class="far fa-file-excel"></i> Export</a>'+
                    '</div>'+
                '</div>'+
            '</div>';
            
            var 
            a = 
            "<tr>"+
                "<td class='text-center'>"+nurut+"</td>"+
                "<td>"+nama+"</td>"+
                "<td class='text-center'>"+bawa+"</td>"+
                "<td class='text-center'>"+repeat+"</td>"+
                "<td class='text-center'>"+bad_stok+"</td>"+
                "<td class='text-center'>"+ratio_bs+"</td>"+
                "<td class='text-center'>"+noo+"</td>"+
                "<td class='text-center'>"+closing+"</td>"+
                "<td class='text-center'>"+sisa+"</td>"+
                "<td class='text-center'>"+box_kmb+"</td>"+
                "<td class='text-center'>"+tba_l+"</td>"+
                "<td class='text-center'>"+tba_r+"</td>"+
                "<td class='text-center'>"+tutup+"</td>"+
                "<td class='text-center'>"+rasio_bs+"</td>"+
                "<td class='text-right'>"+parseInt(setoran).toLocaleString()+"</td>"+
                "<td class='text-center'>"+opt+"</td>"+
            "</tr>";
            $('#dataTable tbody').append(a); 
        }        
    };
</script>