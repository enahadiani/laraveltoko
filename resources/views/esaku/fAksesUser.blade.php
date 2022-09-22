<link rel="stylesheet" href="{{ asset('master.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Akses User" tambah="true" :thead="array('NIK','Nama','Kode Menu','Kode Lokasi','Status Admin','Aksi')" :thwidth="array(15,45,10,10,10,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nik">NIK</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_nik" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-nik" id="nik" name="nik" value="" title="">
                                            <span class="info-name_nik hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_nik"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="pass">Password</label>
                                        <input class="form-control" type="password" id="pass" name="pass" required>
                                        <input class="form-control" type="hidden" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="status_admin">Status Admin</label>
                                        <select class='form-control' id="status_admin" name="status_admin">
                                        <option value='' disabled selected>--- Pilih Status Admin ---</option>
                                        <option value='A'>Admin</option>
                                        <option value='U'>User</option>
                                        <option value='P'>P</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="klp_akses">Kelompok Akses</label>
                                        <input class="form-control" type="text" id="klp_akses" name="klp_akses" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_klp_menu">Kelompok Menu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_klp_menu" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_klp_menu" id="kode_klp_menu" name="kode_klp_menu" value="" title="">
                                            <span class="info-name_kode_klp_menu hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_klp_menu"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="path_view">Path View</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_path_view" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-path_view" id="path_view" name="path_view" value="" title="">
                                            <span class="info-name_path_view hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_path_view"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->
    @include('modal_search')
    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#status_admin').selectize();

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {             
            if(data[param] === isi){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/akses-user') }}", 
        [
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'kode_klp_menu' },
            { data: 'kode_lokasi' },
            { data: 'status_admin' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        []
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    // BAGIAN CBBL 
    var $target = "";
    var $target2 = "";
    
    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    function getKlpMenu(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/menu-klp') }}",
            dataType: 'json',
            data:{'kode_klp':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_klp_menu',result.daftar[0].kode_klp,result.daftar[0].nama);
                    }else{
                        $('#kode_klp_menu').attr('readonly',false);
                        $('#kode_klp_menu').css('border-left','1px solid #d7d7d7');
                        $('#kode_klp_menu').val('');
                        $('#kode_klp_menu').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getForm(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/form') }}",
            dataType: 'json',
            data:{'kode_form':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('path_view',result.daftar[0].kode_form,result.daftar[0].nama);
                    }else{
                        $('#path_view').attr('readonly',false);
                        $('#path_view').css('border-left','1px solid #d7d7d7');
                        $('#path_view').val('');
                        $('#path_view').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getKaryawan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/karyawan') }}",
            dataType: 'json',
            data:{'kode_klp':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('nik',result.daftar[0].kode_klp,result.daftar[0].nama);
                    }else{
                        $('#nik').attr('readonly',false);
                        $('#nik').css('border-left','1px solid #d7d7d7');
                        $('#nik').val('');
                        $('#nik').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        console.log(id);
        switch(id){
            case 'kode_klp_menu' :
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/menu-klp') }}",
                    columns : [
                        { data: 'kode_klp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Kelompok Menu",
                    pilih : "menu",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                };
            break;
            case 'nik' :
                var settings = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('esaku-master/karyawan') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Karyawan",
                    pilih : "karyawan",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data){
                        $('#nik').css('border-left',0);
                        $('#nik').val(data.nik);
                        $('#nama').val(data.nama);
                        $(".info-code_nik").text(data.nik);
                        $(".info-code_nik").attr("title",data.nama);
                        $(".info-code_nik").parents('div').removeClass('hidden');
                        
                        var width= $('#nik').width()-$('#search_nik').width()-10;
                        var pos =$('#nik').position();
                        var height = $('#nik').height();
                        $('#nik').attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                        $('.info-name_nik').width($('#nik').width()-$('#search_nik').width()-10).css({'left':pos.left,'height':height});
                        $('.info-name_nik'+' span').text(data.nama);
                        $('.info-name_nik').attr("title",data.nama);
                        $('.info-name_nik').removeClass('hidden');
                        $('.info-name_nik').closest('div').find('.info-icon-hapus').removeClass('hidden')
                    }
                };
            break;
            case 'path_view' :
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/form') }}",
                    columns : [
                        { data: 'kode_form' },
                        { data: 'nama_form' }
                    ],
                    judul : "Daftar Form",
                    pilih : "form",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                };
            break;
        }
        showInpFilter(settings);
    });

    $('#form-tambah').on('change', '#kode_klp_menu', function(){
        var par = $(this).val();
        getKlpMenu(par);
    });

    $('#form-tambah').on('change', '#path_view', function(){
        var par = $(this).val();
        getForm(par);
    });

    // END BAGIAN CBBL


    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Akses User');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#nik').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#nik').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            nik:{
                required: true 
            },
            nama:{
                required: true 
            },
            pass:{
                required: true
            },
            klp_akses:{
                required: true
            },
            status_admin:{
                required: true
            },
            kode_klp_menu:{
                required: true
            },
            path_view:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#nik').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/akses-user') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/akses-user') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
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
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Akses User');
                        $('#method').val('post');
                        $('#nik').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("nik",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode Form sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/akses-user') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Akses User ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS
    
    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/akses-user') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik').attr('readonly', true);
                    $('#nik').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#pass').val(result.data[0].pass);
                    $('#status_admin')[0].selectize.setValue(result.data[0].status_admin);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('nik',result.data[0].nik,result.data[0].nama);
                    showInfoField('kode_klp_menu',result.data[0].kode_klp_menu,result.data[0].nama_klp);
                    showInfoField('path_view',result.data[0].path_view,result.data[0].nama_form);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Akses User');
        editData(id);
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#nik,#nama_form,#form').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','nama_form','form'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>NIK</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Kode Lokasi</td>
                <td>`+data.kode_lokasi+`</td>
            </tr>
            <tr>
                <td>Kode Menu</td>
                <td>`+data.kode_klp_menu+`</td>
            </tr>
            <tr>
                <td>Status Admin</td>
                <td>`+data.status_admin+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Akses User').removeClass('py-2');
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Akses User');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });


    </script>