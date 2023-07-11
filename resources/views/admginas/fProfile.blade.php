<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


body {
    font-family: 'Roboto', sans-serif !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Roboto', sans-serif !important;
    font-weight: normal !important;
}
h2{
    margin-bottom: 5px;
    margin-top:5px;
}
.judul-box{
    font-weight:bold;
    font-size:18px !important;
}
.inner{
    padding:5px !important;
}

.box-nil{
    margin-bottom: 20px !important;
}

.pad-more{
    padding-left:10px !important;
    padding-right:0px !important;
}
.mar-mor{
    margin-bottom:10px !important;
}
.box-wh{
    box-shadow: 0 3px 3px 3px rgba(0,0,0,.05);
}
.small-box .icon{
    top: 0px !important;
    font-size: 20px !important;
}
.bg-white{
    background:white
}
.small-box .inner{
    background: white;
    border: 1px solid white;
    border-radius: 10px !important;
}
.small-box{
    border-radius:10px !important;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.widget-user-2 .widget-user-header {

    padding: 20px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.icon-green {
    color:white;
    background: #00a65a;
    border: 1px solid #00a65a;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-blue {
    color:white;
    background: #0073b7;
    border: 1px solid #0073b7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-purple {
    color:white;
    background: #605ca8 !important;
    border: 1px solid #605ca8 !important;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-pink {
    color:white;
    background: #d81b60;
    border: 1px solid #d81b60;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.box-footer {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
border-top: 1px solid #f4f4f4;
padding: 10px;
background-color: #fff;
box-shadow: 1px 2px 2px 2px #e6e0e0e6;

}

.box-nil{
    margin-bottom: 20px !important;
}

.icon{
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.judulBox:hover{
    color:#0073b7
}
.table-profile td,.table-profile th{
    padding: 0.75em 0px ;
}

.span-password
{
    position: absolute;
    cursor: text;
    font-size: 90%;
    opacity: 1;top: -0.4em;left: 0.75rem;z-index: 3;line-height: 1;padding: 0 1px
}
.btn-eye
{
    top: 0px !important;;
    right: 10px !important;;
    left: unset !important;;
    width: 40px;
    height: 40px;
    background: url("{{ asset('img/hide.svg') }}") no-repeat;
    background-blend-mode: lighten;background-size: 22px;background-position-x: center;background-position-y: center;opacity: 0.5;
    cursor: pointer !important;
}

input.form-control{
    border-radius:10px !important;

}

#modalPhoto
{
    top:90px
}

@media (max-width: 1439px) {
    #modalPhoto
    {
        top:90px
    }
}
@media (max-width: 1199px) {
    #modalPhoto
    {
        top:80px
    }
}
@media (max-width: 767px) {
    #modalPhoto
    {
        top:70px
    }   
}
@media (max-width: 575px) {
    #modalPhoto
    {
        top:70px
    }
}

.hidden{
    display:none;
}
</style>
<div class="row" id="page-profile">
    <div class="col-12">
        <div class="row" >
            <div class="col-12 mb-5">
                <div style="margin-right: 1rem;top: 130px;" class="position-absolute card-top-buttons">
                    <button id="editBackground" alt="Edit Background" class="btn" style="background: #FFFFFF;border-radius: 10px;opacity: 0.63;padding: 5px 10px;">
                    <i class="simple-icon-pencil"></i>&nbsp;
                    Ubah background</button>
                    <input type="file" name="file_background" class="hidden" id="file-background" />
                </div>
                <div id="foto-background"></div>
            </div>
            <div class="col-12 col-lg-5 col-xl-4 col-left">
                <a href="#" class="lightbox" id="foto">
                </a>
                <input type="file" name="file_foto" class="hidden" id="file-foto" />
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="pt-5">
                        <h5 style="font-weight: bold;">Keamanan Akun</h5>
                        </div>
                        <table class="table table-profile">
                            <tbody>
                                <tr>
                                    <td style="border-top: none;width:30%" >Username</td>
                                    <td style="border-top: none;width:70%" class="nama" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Password</td>
                                    <td id="password" style="width:60%"></td>
                                    <td classs="text-right" style="width:10%"><button id="editPassword" alt="Edit Password" class="btn" style="background: #FFFFFF;border-radius: 10px;opacity: 0.63;padding: 5px 10px;">
                                    <i class="simple-icon-pencil"></i>&nbsp;
                                    </button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-8 col-right">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 style="font-weight: bold;">Profile Pekerjaan</h5>
                        <table class="table table-profile">
                            <tbody>
                                <tr>
                                    <td style="border-top: none;width:30%" >NIK</td>
                                    <td style="border-top: none;width:70%" id="nik" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width:30%" >Jabatan</td>
                                    <td style="width:70%" id="jabatan" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width:30%" >Nama</td>
                                    <td style="width:70%" class="nama" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width:30%" >PP</td>
                                    <td style="width:70%" id="pp" colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 style="font-weight: bold;">Info Kontak</h5>
                        <table class="table table-profile">
                            <tbody>
                                <tr>
                                    <td style="border-top: none;width:30%" >Email</td>
                                    <td style="border-top: none;width:70%" id="email" colspan="2"></td>
                                </tr>
                                <tr>
                                    <td style="width:30%" >Telpon</td>
                                    <td style="width:70%" id="no_telp" colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="editpage-profile" style="display:none">
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4" style="margin:0 auto">
                <div class="card mb-4" style="box-shadow:none;border-radius: 8px;border: 1px solid #dadce0;box-sizing: border-box;">
                    <div class="card-body">
                        <form id="form-ubahPass" class="tooltip-right-bottom" novalidate="novalidate">
                            <h5 class="mb-4">Ubah Password</h5>
                            <label class="form-group has-float-label mb-4">
                                <input class="form-control" type="password" name="password_lama" placeholder="" id="password_lama">
                                <span class="span-password">Password Lama</span>
                                <span class="btn-eye"><i class="icon-eye"></i></span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input class="form-control" type="password" name="password_baru" placeholder="" id="password_baru">
                                <span class="span-password">Password Baru</span>
                                <span class="btn-eye"><i class="icon-eye"></i></span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input class="form-control" type="password" name="password_confirm" placeholder="" id="password_confirm">
                                <span class="span-password">Konfirmasi Password Baru</span>
                                <span class="btn-eye"><i class="icon-eye"></i></span>
                            </label>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-outline-primary" id="btn-cancel">Batal</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-1 col-xl-1 col-right">
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-right" id="modalPhoto" tabindex="-1" role="dialog"
    aria-labelledby="modalPhoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header pb-0" style="border:none">
                    <h5 class="modal-title pl-0"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formPhoto" >
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name ="foto" class="form-control" placeholder="">
                            
                            <input type="hidden" id="id_foto" class="form-control" placeholder="" value="foto">
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>

function sepNum(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function typePass(str){
    if(str != "" || str != undefined){

        var count = str.length;
        var text = "";
        if(count > 0){
            for(var i=0;i<count;i++){
                text+="•";
            }
        }
        return text;
    }
}

function loadService(index,method,url,param={}){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        data: param,
        success:function(result){    
            if(result.status){
                switch(index){
                    case 'profile' :
                    if(result.data[0].foto == "-" || result.data[0].foto == "" || result.data[0].foto == undefined){
                        var img= `
                        <div class="position-absolute card-top-buttons" style="top: -15px;left: 50%;z-index: 10;opacity: ;">
                            <button id="editPhoto" alt="Edit Photo" class="btn icon-button " style="background: white;border: 1px solid #8080802b;opacity: 0.8;">
                            <i class="simple-icon-camera"></i>
                            </button>
                        </div>
                        <img alt="Profile" src="{{ asset('asset_elite/images/user.png') }}" class="img-thumbnail card-img social-profile-img" style="border-radius: 50%;width:120px;height:120px;">
                        `;
                    }else{
                        var foto = "{{ config('api.url').'toko-auth/storage' }}/"+result.data[0].foto;
                        var img= `
                        <div class="position-absolute card-top-buttons" style="top: -15px;left: 50%;z-index: 10;opacity: ;">
                            <button id="editPhoto" alt="Edit Photo" class="btn icon-button " style="background: white;border: 1px solid #8080802b;opacity: 0.8;">
                            <i class="simple-icon-camera"></i>
                            </button>
                        </div>
                        <img alt="Profile" src="`+foto+`" class="img-thumbnail card-img social-profile-img" style="border-radius: 50%;width:120px;height:120px;">
                        `;
                    }

                    if(result.data[0].background == "-" || result.data[0].background == "" || result.data[0].background == undefined){

                        var background = `<img class="social-header card-img" style="height:200px;object-position:bottom" src="{{ asset('/img/gambar2.jpg') }}" />`;
                    }else{
                        var foto = "{{ config('api.url').'toko-auth/storage' }}/"+result.data[0].background;
                        var background = `<img class="social-header card-img" style="height:200px;object-position:bottom" src="`+foto+`" />`;
                    }

                    $('#foto').html(img);
                    $('#foto-background').html(background);
                    $('.nama').html(result.data[0].nama);
                    $('#nik').html(result.data[0].nik);
                    $('#no_telp').html(result.data[0].no_telp);
                    $('#email').html(result.data[0].email);
                    var pp = result.data[0].kode_pp+` - `+result.data[0].nama_pp;
                    $('#pp').html(pp);
                    $('#jabatan').html(result.data[0].jabatan);
                    $('#password').html(typePass(result.data[0].pass));
                    break;

                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}
function initDash(){
    loadService('profile','GET',"esaku-auth/profile"); 
}
initDash();

$('.btn-eye').click(function(){
    console.log('click');
    var x = $(this).closest('label').find('input');
    if (x.attr('type') === "password") {
        x.attr('type','text');
        $(this).css('background-image',"url( {{ asset('img/password.svg') }} )");
    } else {
        
        x.attr('type','password');
        $(this).css('background-image',"url( {{ asset('img/hide.svg') }} )");
    }
});

$('#form-ubahPass').on('submit', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var url = "esaku-auth/update-password";
        var pesan = "saved";

        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status){
                    alert(result.data.message);   
                    $('#password_lama').val('');
                    $('#password_baru').val('');
                    $('#password_confirm').val('');
                    // $('#page-profile').show();
                    // $('#editpage-profile').hide();
                    loadProfile();

                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                   alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
        
});

$('#file-foto').change(function(e){
    e.preventDefault();
    var foto = document.getElementById("file-foto").files[0];
    var name = foto.name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
    {
        alert("Invalid Image File");
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(foto);
    var f = foto;
    var fsize = f.size||f.fileSize;
    if(fsize > 3000000)
    {
        alert("Image File Size is very big");
    }
    else
    {
        form_data.append("foto", foto);
        $.ajax({
            url:"{{ url('esaku-auth/update-foto') }}",
            method:"POST",
            data: form_data,
            async: false,
            contentType: false,
            cache: false,
            processData: false, 
            beforeSend:function(){
                // $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
            },   
            success:function(result){
                if(result.data.status){
                    alert('Update foto sukses!');
                    var foto = "{{ config('api.url').'toko-auth/storage' }}/"+result.data.foto;
                    $('#foto-profile').html("<img alt='Profile Picture' src='"+foto+"' >");
                    loadForm("{{url('esaku-auth/form/fProfile')}}");

                    $('#adminProfilePhoto').html(`<img alt="Profile Picture" class="imgprofile ml-0" src="`+foto+`" />`);
                            
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    alert(jqXHR.responseText);
                }
            }
        });
    }
});

$('#file-background').change(function(e){
    e.preventDefault();
    var foto = document.getElementById("file-background").files[0];
    var name = foto.name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
    {
        alert("Invalid Image File");
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(foto);
    var f = foto;
    var fsize = f.size||f.fileSize;
    if(fsize > 3000000)
    {
        alert("Image File Size is very big");
    }
    else
    {
        form_data.append("foto", foto);
        $.ajax({
            url:"{{ url('esaku-auth/update-background') }}",
            method:"POST",
            data: form_data,
            async: false,
            contentType: false,
            cache: false,
            processData: false, 
            beforeSend:function(){
                // $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
            },   
            success:function(result){
                if(result.data.status){
                    alert('Update foto sukses!');
                    loadForm("{{url('esaku-auth/form/fProfile')}}");
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    alert(jqXHR.responseText);
                }
            }
        });
    }
});

$('#editPassword').click(function(){
    $('#page-profile').hide();
    $('#editpage-profile').show();
});

$('#btn-cancel').click(function(){
    $('#page-profile').show();
    $('#editpage-profile').hide();
});

$('#foto').on('click','#editPhoto',function(e){
    e.preventDefault();
    $('#file-foto').click();
});

$('#editBackground').click(function(e){
    e.preventDefault();
    $('#file-background').click();
});
</script>