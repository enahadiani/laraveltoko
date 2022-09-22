    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Periode Aktif" tambah="true" :thead="array('Modul','Keterangan','Periode Awal1','Periode Akhir1','Periode Awal2','Periode Akhir2','Tgl Input','Aksi')" :thwidth="array(10,32,12,12,12,12,0,10)" :thclass="array('','','','','','','','text-center')" />
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
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="modul">Modul</label>
                                <input class="form-control" type="text" id="modul" name="modul" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" rows="4" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="per_awal1">Periode Awal1</label>
                                <select name="per_awal1" id="per_awal1" class="form-control">
                                    <option value="" disabled>Pilih Periode</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="per_akhir1">Periode Akhir1</label>
                                <select name="per_akhir1" id="per_akhir1" class="form-control">
                                    <option value="" disabled>Pilih Periode</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="per_awal2">Periode Awal2</label>
                                <select name="per_awal2" id="per_awal2" class="form-control">
                                    <option value="" disabled>Pilih Periode</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="per_akhir2">Periode Akhir2</label>
                                <select name="per_akhir2" id="per_akhir2" class="form-control">
                                    <option value="" disabled>Pilih Periode</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="modul">Modul</label>
                                        <input class="form-control" type="text" id="modul" name="modul" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="keterangan">Keterangan</label>
                                        <input class="form-control" type="text" id="keterangan" name="keterangan" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="per_awal1">Periode Awal1</label>
                                        <select name="per_awal1" id="per_awal1" class="form-control">
                                        <option value="" disabled>Pilih Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="per_akhir1">Periode Akhir1</label>
                                        <select name="per_akhir1" id="per_akhir1" class="form-control">
                                        <option value="" disabled>Pilih Periode</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="per_awal2">Periode Awal2</label>
                                        <select name="per_awal2" id="per_awal2" class="form-control">
                                        <option value="" disabled>Pilih Periode</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="per_akhir2">Periode Akhir2</label>
                                        <select name="per_akhir2" id="per_akhir2" class="form-control">
                                        <option value="" disabled>Pilih Periode</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
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

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});

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
    
    // BAGIAN CBBL 
    

    function getPeriode(id1,id2,id3,id4){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/periode-aktif-periode') }}",
            dataType: 'json',
            async:false,
            success:function(result){ 
                var select = $('#'+id1).selectize();
                select = select[0];
                var control = select.selectize;

                var select2 = $('#'+id2).selectize();
                select2 = select2[0];
                var control2 = select2.selectize;

                var select3 = $('#'+id3).selectize();
                select3 = select3[0];
                var control3 = select3.selectize;

                var select4 = $('#'+id4).selectize();
                select4 = select4[0];
                var control4 = select4.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                            control2.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                            control3.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                            control4.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    getPeriode("per_awal1","per_akhir1","per_awal2","per_akhir2");
    // END BAGIAN CBBL

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
        "{{ url('esaku-master/periode-aktif') }}", 
        [
            {'targets': 7, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'modul' },
            { data: 'keterangan' },
            { data: 'per_awal1' },
            { data: 'per_akhir1' },
            { data: 'per_awal2' },
            { data: 'per_akhir2' },
            { data: 'tgl_input' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[6 ,"desc"]]
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
        $('#judul-form').html('Tambah Data Periode Aktif');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#modul').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
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
        var kode = $('#modul').val();
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
            modul:{
                required: true,
                maxlength:10   
            },
            keterangan:{
                required: true,
                maxlength:50   
            },
            per_awal1:{
                required: true,
                maxlength:6  
            },
            per_akhir1:{
                required: true,
                maxlength:6  
            },
            per_awal2:{
                required: true,
                maxlength:6  
            },
            per_akhir2:{
                required: true,
                maxlength:6  
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var per_awal1 = $('#per_awal1').val();
            var per_akhir1 = $('#per_akhir1').val();
            var per_awal2 = $('#per_awal2').val();
            var per_akhir2 = $('#per_akhir2').val();
            if (parseInt(per_awal1) > parseInt(per_akhir1)) {
                msgDialog({
                    type: 'warning',
                    title: "Periode tidak valid",
                    text: "Periode Awal1 harus lebih kecil dari Periode Akhir1 "
                });
                return false;
            } 
            if (parseInt(per_awal2) > parseInt(per_akhir2)) {
                msgDialog({
                    type: 'warning',
                    title: "Periode tidak valid",
                    text: "Periode Awal2 harus lebih kecil dari Periode Akhir2 "
                });
                return false;
            } 	
            
            var parameter = $('#id_edit').val();
            var id = $('#modul').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/periode-aktif') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/periode-aktif') }}";
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
                        $('#judul-form').html('Tambah Data Periode Aktif');
                        $('#method').val('post');
                        $('#modul').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("modul",result.data.kode);
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
            url: "{{ url('esaku-master/periode-aktif') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Periode Aktif ('+id+') berhasil dihapus ');
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
            url: "{{ url('esaku-master/periode-aktif') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#modul').attr('readonly', true);
                    $('#modul').val(id);
                    $('#id').val(id);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#per_awal1')[0].selectize.setValue(result.data[0].per_awal1);    
                    $('#per_akhir1')[0].selectize.setValue(result.data[0].per_akhir1);    
                    $('#per_awal2')[0].selectize.setValue(result.data[0].per_awal2);    
                    $('#per_akhir2')[0].selectize.setValue(result.data[0].per_akhir2);     
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

        $('#judul-form').html('Edit Data Periode Aktif');
        editData(id);
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#modul,#keterangan,#per_awal1,#per_akhir1,#per_awal2,#per_akhir2').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['modul','keterangan','per_awal1','per_akhir1','per_awal2','per_akhir2'];
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
        if($(this).index() != 6){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Modul</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>`+data.keterangan+`</td>
            </tr>
            <tr>
                <td>Periode Awal1</td>
                <td>`+data.per_awal1+`</td>
            </tr>
            <tr>
                <td>Periode Akhir1</td>
                <td>`+data.per_akhir1+`</td>
            </tr>
            <tr>
                <td>Periode Awal2</td>
                <td>`+data.per_awal2+`</td>
            </tr>
            <tr>
                <td>Periode Akhir2</td>
                <td>`+data.per_akhir2+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Periode Aktif').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Periode Aktif');
        
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