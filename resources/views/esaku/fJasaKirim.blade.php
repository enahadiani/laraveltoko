    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Jasa Kirim" tambah="true" :thead="array('Kode','Nama','Alamat','Tgl Input','Aksi')" :thwidth="array(15,35,40,0,10)" :thclass="array('','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_kirim">Kode</label>
                                <input class="form-control" type="text"  id="kode_kirim" name="kode_kirim">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{-- Error message kode --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="no_tel">No Telp</label>
                                <input class="form-control" type="text" id="no_tel" name="no_tel">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="pic">PIC</label>
                                <input class="form-control" type="text" id="pic" name="pic">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="no_tel">No Telp PIC</label>
                                <input class="form-control" type="text" id="no_pictel" name="no_pictel">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="bank">Bank</label>
                                <input class="form-control" type="text" id="bank" name="bank">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="cabang">Cabang</label>
                                <input class="form-control" type="text" id="cabang" name="cabang">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="no_rek">No. Rekening</label>
                                <input class="form-control" type="text" id="no_rek" name="no_rek">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nama_rek">Nama Rekening</label>
                                <input class="form-control" type="text" id="nama_rek" name="nama_rek">
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="4" id="alamat" name="alamat" style="resize:none" required></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- Save Button --}}
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
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
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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
        "{{ url('esaku-master/jasa-kirim') }}", 
        [
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [3],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_kirim' },
            { data: 'nama' },
            { data: 'alamat' },
            { data: 'tgl_input' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[3 ,"desc"]]
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
    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Jasa Kirim');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_kirim').attr('readonly', false);
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
        var kode = $('#kode_kirim').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    // HANDLER untuk enter dan tab
    $('#kode_kirim,#nama,#no_tel,#email,#pic,#no_pictel,#bank,#cabang,#no_rek,#nama_rek,#alamat').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_kirim','nama','no_tel','email','pic','no_pictel','bank','cabang','no_rek','nama_rek','alamat'];
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
    // END HANDLER

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_kirim:{
                required: true 
            },
            nama:{
                required: true  
            },
            no_tel:{
                required: true
            },
            email:{
                required: true
            },
            pic:
            {
                required: true
            },
            no_pictel:
            {
                required: true
            },
            bank:
            {
                required: true
            },
            cabang:
            {
                required: true
            },
            no_rek:
            {
                required: true
            }, 
            nama_rek:
            {
                required: true
            }, 
            alamat:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_kirim').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/jasa-kirim') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/jasa-kirim') }}";
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
                        $('#judul-form').html('Tambah Data Jasa Kirim');
                        $('#method').val('post');
                        $('#kode_kirim').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_kirim",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode vendor sudah digunakan'
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
            url: "{{ url('esaku-master/jasa-kirim') }}",
            dataType: 'json',
            data:{kode_kirim: id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Jasa Kirim ('+id+') berhasil dihapus ');
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
            url: "{{ url('esaku-master/jasa-kirim-detail') }}" ,
            dataType: 'json',
            data:{kode_kirim: id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_kirim').attr('readonly', true);
                    $('#kode_kirim').val(result.data[0].kode_kirim);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#email').val(result.data[0].email);
                    $('#pic').val(result.data[0].pic);
                    $('#no_pictel').val(result.data[0].no_pic);
                    $('#no_tel').val(result.data[0].no_telp);
                    $('#bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
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

        $('#judul-form').html('Edit Data Jasa Kirim');
        editData(id);
    });
    // END BUTTON EDIT

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Jasa Kirim</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Jasa Kirim</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>`+data.no_telp+`</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>`+data.email+`</td>
            </tr>
            <tr>
                <td>PIC</td>
                <td>`+data.pic+`</td>
            </tr>
            <tr>
                <td>No PIC</td>
                <td>`+data.no_pic+`</td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>`+data.bank+`</td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>`+data.cabang+`</td>
            </tr>
            <tr>
                <td>No Rek</td>
                <td>`+data.no_rek+`</td>
            </tr>
            <tr>
                <td>Nama Rek</td>
                <td>`+data.nama_rek+`</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>`+data.alamat+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Jasa Kirim').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Jasa Kirim');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });

    </script>