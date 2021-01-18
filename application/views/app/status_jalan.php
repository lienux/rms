<script type="text/javascript">

    function get_list_status_jalan(){
        $.ajax({
            url: base_url + 'jalan/get_list_status_jalan',
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            success: function(response){
                // console.log(response);
                $("#opt_status").empty();
                $("#opt_status").append("<option selected>Pilih...</option>");
                create_list_status_jalan(response.bocahgantengdotcom);
            }
        });
    };

    function create_list_status_jalan(data){
        for(index in data){
            var 
            id = data[index].id,
            nama = data[index].name

            var a = '';
            a += '<option value="'+id+'">'+nama+'</option>';
            $('#opt_status').append(a); 
        }        
    };
</script>