<script type="text/javascript">

    var dash = '{base_url}dashboard/index',
        jalan = '{base_url}jalan/index',
        rambu = '{base_url}rambu/index',
        ganti_passwd = '{base_url}user/ganti_passwd',
        pesan = '{base_url}pesan/index'

    $('#dash').addClass('active'); $('.maryam').load(dash);

    $('.klik').click(function(){
        $('a').removeClass('active');
        $(this).addClass('active');
        var menu = $(this).attr('id');
        $(this).addClass('active');

        if(menu == "jalan"){
            $('.maryam').load(jalan);
        }
        else if(menu == "rambu"){
            $('.maryam').load(rambu);      
        }
        // else if(menu == "sales"){
        //     $('.maryam').load(sales);       
        // }
        // else if(menu == "produksi"){
        //     $('.maryam').load(produksi);       
        // }
        // else if(menu == "kasbon"){
        //     $('.maryam').load(kasbon);       
        // }
        else if(menu == "dash"){
            $('.maryam').load(dash);
        }
        else if(menu == "ganti_passwd"){
            $('.maryam').load(ganti_passwd);
        }
        else if(menu == "pesan"){
            $('.maryam').load(pesan);
        }
    });

    // $('select').on('change', function (e) {
    //     var optionSelected = $("option:selected", this);
    //     var kontrak_id = this.value;
    //     // setKontrak(kontrak_id);
    // });

    // $('#setKontrak').click(function(){
    

    // function logout(){
    //     $.ajax({
    //         url: '{base_url}logout/logout_proccess',
    //         type: 'GET',
    //         dataType: 'JSON',
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function(e) {
    //             $('#loder_out').show();
    //             if(e && e.overrideMimeType) {
    //                 e.overrideMimeType('application/jsoncharset=UTF-8')
    //             }
    //         },
    //         complete: function(){
    //             $('#loder_out').hide();
    //         },
    //         success: function(response){
    //             Cookies.remove('kontrak_id');
    //             Cookies.remove('verifikasi');
    //             $(location).attr('href','{base_url}');
    //         }
    //     });
    // };

    // function getPesan(){
    //     $.ajax({
    //         url: '{base_url}pesan/get',
    //         type: 'GET',
    //         dataType: 'JSON',
    //         contentType: false,
    //         processData: false,
    //         // beforeSend: function(e){

    //         // },
    //         // complete: function(){

    //         // },
    //         success: function(response){
    //             $('#jmlPesan,#jmlPesan2').html(response.jml);
    //             if(response.status == 'sukses'){
    //                 createListPesan(response.ngajingoding);
    //                 $('#pesanDropdown').click();
    //                 // console.log(response);
    //             }
    //         }
    //     });
    // };

    // function createListPesan(ngajingoding){
    //     $('#isiPesan p').empty();
    //     nurut = Number(0);
    //     for(index in ngajingoding){ 
    //         nurut +=1;  
    //         content = ngajingoding[index].pesan; 
    //         c = content.substr(0,15)+'... <span class="small text-primary">selengakapnya<span>';
    //         var 
    //         a = 
    //         '<a class="dropdown-item" href="#">'+nurut+'. '+c+'</a>';
    //         $('#isiPesan p').append(a); 
    //     }
    // }
</script>
