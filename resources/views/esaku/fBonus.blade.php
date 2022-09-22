    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
        .datepicker {
            margin: 40px 0;
        }
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Bonus" tambah="true" :thead="array('Kode Barang','Nama Bonus','Referensi Qty','Bonus Qty','Tgl Mulai','Tgl Selesai','Tgl Input','Aksi')" :thwidth="array(15,35,10,10,10,10,0,10)" :thclass="array('','','','','','','','text-center')" />
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
                                <label for="kode_barang">Kode Barang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_barang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_barang" id="kode_barang" name="kode_barang" value="" title="">
                                    <span class="info-name_kode_barang hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_barang"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="keterangan">Keterangan</label>
                                <input class="form-control" type="text" id="keterangan" name="keterangan">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="ref_qty">Referensi Qty</label>
                                <input class="form-control qty" type="text" id="ref_qty" name="ref_qty">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="bonus_qty">Bonus Qty</label>
                                <input class="form-control qty" type="text" id="bonus_qty" name="bonus_qty">
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tgl_mulai">Tanggal Mulai</label>
                                <input class="form-control tanggal" type="text" id="tgl_mulai" name="tgl_mulai" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tgl_lahir">Tanggal Selesai</label>
                                <input class="form-control tanggal" type="text" id="tgl_selesai" name="tgl_selesai" autocomplete="off">
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

    $('.tanggal').bootstrapDP({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
    
    $('.qty').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 0,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    
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

    function getBarang(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang') }}",
            dataType: 'json',
            data:{kode_barang: id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_barang',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#kode_barang').attr('readonly',false);
                        $('#kode_barang').css('border-left','1px solid #d7d7d7');
                        $('#kode_barang').val('');
                        $('#kode_barang').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip();
    
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/bonus') }}", 
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
            { data: 'kode_barang' },
            { data: 'keterangan' },
            { data: 'ref_qty', render: function(data,type,row){
                var ref = parseFloat(data);
                return ref.toFixed();
            } },
            { data: 'bonus_qty', render: function(data,type,row){
                var bonus = parseFloat(data);
                return bonus.toFixed();
            } },
            { data: 'tgl_mulai', render: function(data,type,row){
                var splitM = data.split('-');
                var tglM = splitM[2];
                var blnM = splitM[1];
                var tahunM = splitM[0];
                return tglM+"/"+blnM+"/"+tahunM;
            } },
            { data: 'tgl_selesai', render: function(data,type,row){
                var splitS = data.split('-');
                var tglS = splitS[2];
                var blnS = splitS[1];
                var tahunS = splitS[0];
                return tglS+"/"+blnS+"/"+tahunS;
            } },
            { data: 'tgl_input'}
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
        $('#judul-form').html('Tambah Data Bonus');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_barang').attr('readonly', false);
        $('#kode_barang').parents('div').find('.input-group').removeClass('readonly');
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
        var kode = $('#kode_bonus').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_barang':
                showInpFilter({
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang') }}",
                    columns : [
                        { data: 'kode_barang' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Barang",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                });
            break;
        }
    });

    $('#form-tambah').on('change', '#kode_barang', function(){
        var par = $(this).val();
        getBarang(par);
    });

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_barang:{
                required: true 
            },
            keterangan:{
                required: true  
            },
            ref_qty:{
                required: true
            },
            bonus_qty:{
                required: true
            },
            tgl_mulai:
            {
                required: true
            },
            tgl_selesai:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_barang').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/bonus') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/bonus') }}";
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
                        $('#judul-form').html('Tambah Data Bonus');
                        $('#method').val('post');
                        $('#kode_bonus').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_bonus",result.data.kode);
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
            url: "{{ url('esaku-master/bonus') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Bonus ('+id+') berhasil dihapus ');
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
            url: "{{ url('esaku-master/bonus') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    var ref_qty = parseFloat(result.data[0].ref_qty);
                    var bonus_qty = parseFloat(result.data[0].bonus_qty);

                    var splitTglmulai = result.data[0].tgl_mulai.split('-');
                    var tahun_mulai = splitTglmulai[0];
                    var bulan_mulai = splitTglmulai[1];
                    var tgl_mulai = splitTglmulai[2];
                    var mulai = tgl_mulai+"/"+bulan_mulai+"/"+tahun_mulai;

                    var splitTglselesai = result.data[0].tgl_selesai.split('-');
                    var tahun_selesai = splitTglselesai[0];
                    var bulan_selesai = splitTglselesai[1];
                    var tgl_selesai = splitTglselesai[2];
                    var selesai = tgl_selesai+"/"+bulan_selesai+"/"+tahun_selesai;

                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_barang').val(id);
                    $('#id').val(id);
                    $('#kode_barang').parents('div').find('.input-group').last().addClass('readonly');
                    $('#kode_barang').val('-');
                    $('#kode_barang').attr('readonly',true);
                    $('#kode_barang').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
                    $('.info-code_kode_barang').parent('div').addClass('hidden');
                    $('.info-name_kode_barang').addClass('hidden');
                    $('.info-icon-hapus').addClass('hidden');

                    $('#keterangan').val(result.data[0].keterangan);
                    $('#ref_qty').val(ref_qty.toFixed());
                    $('#bonus_qty').val(bonus_qty.toFixed());
                    $('#tgl_mulai').val(mulai);
                    $('#tgl_selesai').val(selesai);

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    var html = "<img style='width:120px' style='margin:0 auto' src='"+result.data[0].file_gambar+"'>";
                    $('.preview').html(html);
                    showInfoField('kode_barang',result.data[0].kode_barang,result.data[0].nama_barang);
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

        $('#judul-form').html('Edit Data Bonus');
        editData(id);
    });
    // END BUTTON EDIT

    // HANDLER untuk enter dan tab
    $('#kode_barang,#keterangan,#ref_qty,#bonus_qty,#tgl_mulai,#tgl_selesai').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_barang','keterangan','ref_qty','bonus_qty','tgl_mulai','tgl_selesai'];
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

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Barang</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Keterangan Bonus</td>
                <td>`+data.keterangan+`</td>
            </tr>
            <tr>
                <td>Ref Qty</td>
                <td>`+sepNum(data.ref_qty)+`</td>
            </tr>
            <tr>
                <td>Bonus Qty</td>
                <td>`+sepNum(data.bonus_qty)+`</td>
            </tr>
            <tr>
                <td>Tgl Mulai</td>
                <td>`+data.tgl_mulai+`</td>
            </tr>
            <tr>
                <td>Tgl selesai</td>
                <td>`+data.tgl_selesai+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Bonus').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Bonus');
        
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