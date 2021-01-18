<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h6>Pilih Tujuan</h6>
                    </div>
                </div>
                <div class="inbox_user"></div>
            </div>
            <div class="mesgs">
                <h6 id="username_tujuan"></h6>
                <div class="msg_history"></div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <form>
                            <input type="text" class="write_msg" name="txtPesan" id="txtPesan" placeholder="Tulis Teks Pesan" />
                            <input type="hidden" name="txtTujuan" id="txtTujuan">
                        </form>                            
                        <button class="msg_send_btn" type="button" onclick="simpan();">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<script>
getUser();

if (type == 1 || type == 2 || type == 99) {
    $('.maryam').addClass('mt-4');
}

function getUser(){
    $.ajax({
        url: base_url+'user/get',
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        // beforeSend: function(e){

        // },
        // complete: function(){

        // },
        success: function(response){
            if(response.ngajingoding.status == 'sukses'){
                createListUser(response.ngajingoding.data);
                // console.log(response);
            }
        }
    });
};

function createListUser(data){
    $('.inbox_user').empty();
    nurut = Number(0);
    for(index in data){ 
        nurut +=1;
        id = data[index].user_id;
        name = data[index].name;
        user_type = data[index].user_type;
        if(user_type == 0){
            type = 'Cabang';
        }else if(user_type == 1){
            type = 'BPTD';
        }else if(user_type == 2){
            type = '';
        }else if(user_type == 99){
            type = '';
        }

        var 
        a =         
        '<a href="#" onClick="getPesan('+id+');"><i class="fas fa-user"></i> '+type+' '+name+'</a><br>';
        $('.inbox_user').append(a);
    }
}

function simpan(){
    var formData = new FormData($('.input_msg_write form')[0]);
    var urlData = base_url + 'pesan/add';
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            if(response.status == 'sukses'){
                $.ajax({
                    url: base_url+'pesan/get/'+idPengirim,
                    type: 'GET',
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,                    
                    success: function(response){
                        // console.log(response);
                        if(response.ngajingoding.status == 'sukses'){
                            createListPesan(response.ngajingoding.data);
                        }else{
                            $('.msg_history').html('belum ada balasan untuk chat ini...');
                        }
                    }
                });
                $('#txtPesan').val('');
            }else{ 
                $('#alert').html(response.pesan).fadeIn().delay(2500).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function buatID(pengirim){
    idPengirim = pengirim;
}

function getPesan(pengirim){
    $.ajax({
        url: base_url+'user/get/'+pengirim,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        // beforeSend: function(e){

        // },
        // complete: function(){

        // },
        success: function(response){
            if(response.ngajingoding.status == 'sukses'){
                user_type = response.ngajingoding.data[0].user_type;
                name = response.ngajingoding.data[0].name;
                if (user_type == 0) {
                    type = 'Cabang';
                }else if(user_type == 1){
                    type = 'BPTD';
                }else{
                    type = '';
                }

                $('#username_tujuan').html('kepada: '+type+' '+name);
                // console.log(response);
            }
        }
    });

    buatID(pengirim);
    $('#txtTujuan').val(pengirim);
    prosesGetPesan(pengirim);
}

function prosesGetPesan(pengirim){
    // buatID(pengirim);
    // $('#txtTujuan').val(pengirim);
    $.ajax({
        url: base_url+'pesan/get/'+pengirim,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        // beforeSend: function(e){

        // },
        // complete: function(){

        // },
        success: function(response){
            // console.log(response);
            // $('#jmlPesan,#jmlPesan2').html(response.jml);
            if(response.ngajingoding.status == 'sukses'){
                createListPesan(response.ngajingoding.data);
            //     // $('#pesanDropdown').click();
            //     // console.log(response);
            }else{
                $('.msg_history').html('belum ada percakapan pada akun ini...');
            }
        }
    });
}

function createListPesan(data){
    $('.msg_history').empty();
    nurut = Number(0);
    for(index in data){ 
        nurut +=1;
        id = data[index].id;
        pengirim = data[index].pengirim;
        content = data[index].pesan;
        tgl = data[index].tgl_post;
        var p_in = 
        '<div class="incoming_msg">'+
            '<div class="incoming_msg_img">'+
                '<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">'+
            '</div>'+
            '<div class="received_msg">'+
                '<div class="received_withd_msg">'+
                    '<p>anda: '+content+'</p>'+
                    '<span class="time_date">'+tgl+'</span>'+
                '</div>'+
            '</div>'+
        '</div>';

        var p_out = 
        '<div class="outgoing_msg">'+
            '<div class="sent_msg">'+
                '<p>'+content+'</p>'+
                '<span class="time_date">'+tgl+'</span>'+
            '</div>'+
        '</div>';

        if (pengirim != idPengirim) {
            tmp = p_in;
        }else{
            tmp = p_out;
        }

        var 
        a = tmp;                           
        $('.msg_history').append(a); 
    }
}
</script>