<script type="text/javascript">

    function get_list_jabatan(){
        $.ajax({
            url: base_url + 'jabatan/get',
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
                create_list_jabatan(response.bocahgantengdotcom);
            }
        });
    };

    function create_list_jabatan(data){
        for(index in data){
            var 
            id = data[index].id,
            nama = data[index].nama,
            jabatan = data[index].jabatan

            var a = '';
            a += '<option value="'+id+'">'+nama+'</option>';
            $('#list_jabatan').append(a); 
        }        
    };
</script>