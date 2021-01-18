<script type="text/javascript">

    function get_list_karyawan(jabatan_id=null){
        if (jabatan_id==null) {
            metod = base_url+'karyawan/get'
        }else{
            metod = base_url+'karyawan/getbyjabatan/'+jabatan_id
        }

        $.ajax({
            url: metod,
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            // beforeSend: function(e) {
            //     $('#lodertabel').show();
            //     if(e && e.overrideMimeType) {
            //         e.overrideMimeType('application/jsoncharset=UTF-8')
            //     }
            // },
            // complete: function(){
            //     $('#lodertabel').hide();
            // },
            success: function(response){
                // console.log(response);
                create_list_karyawan(response.bocahgantengdotcom);
            }
        });
    };

    // function get_list_karyawan(jabatan_id){
    //     $.ajax({
    //         url: base_url + 'karyawan/getbyjabatan/'+jabatan_id,
    //         type: 'GET',
    //         dataType: 'JSON',
    //         contentType: false,
    //         processData: false,
    //         // beforeSend: function(e) {
    //         //     $('#lodertabel').show();
    //         //     if(e && e.overrideMimeType) {
    //         //         e.overrideMimeType('application/jsoncharset=UTF-8')
    //         //     }
    //         // },
    //         // complete: function(){
    //         //     $('#lodertabel').hide();
    //         // },
    //         success: function(response){
    //             // console.log(response);
    //             create_list_karyawan(response.bocahgantengdotcom);
    //         }
    //     });
    // };

    function create_list_karyawan(data){
        for(index in data){
            var 
            id = data[index].id,
            nama = data[index].nama,
            jabatan = data[index].jabatan

            var a = '';
            a += '<option value="'+id+'">'+nama+'</option>';
            $('#list_karyawan').append(a); 
        }        
    };
</script>