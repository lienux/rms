<script type="text/javascript">
	
	get_data_jalan();
    
    function get_data_jalan(){
        $.ajax({
            url: base_url + 'jalan/get',
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(e) {
                $('#loader').show();
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            complete: function(){
                $('#loader').hide();
            },
            success: function(response){
                console.log(response);
                create_list_table_jalan(response.bocahgantengdotcom);
            }
        });
    };

    function create_list_table_jalan(data){
        $('#dataTable tbody').empty();
        nurut = Number(0);
        for(index in data){
            var 
            id = data[index].id,
            nama = data[index].name,
            status_jalan = data[index].status_jalan,
            latitude = data[index].latitude,
            longitude = data[index].longitude,
            latlon = latitude+','+longitude
            // jumlah = parseFloat(data[index].jumlah)
            // debit_kredit = data[index].debit_kredit
            
            nurut+=1;
            // nurut_dex = nurut-1

            // if (debit_kredit==0) {
            //     nama = '&emsp; '+data[index].nama
            //     debit = '-'
            //     kredit = parseInt(jumlah).toLocaleString();

            //     if (indexx==0) {
            //         saldo = jumlah
            //     }else{
            //         saldo = saldo - jumlah
            //     }

            // }else{
            //     nama = data[index].nama
            //     debit = parseInt(jumlah).toLocaleString();
            //     kredit = '-'

            //     if (indexx==0) {
            //         saldo = jumlah
            //     }else{
            //         saldo = saldo + jumlah
            //     }
            // }


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
                "<td class='text-center'>"+status_jalan+"</td>"+
                "<td class='text-right'><a href='#'>"+latlon+"</a></td>"+
                "<td class='text-center'>"+opt+"</td>"+
            "</tr>";
            $('#dataTable tbody').append(a); 
        }        
    };
</script>