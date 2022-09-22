    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Kelompok Barang" tambah="true" :thead="array('Kode','Nama','Akun Persediaan','Akun Pendapatan','Akun HPP','Tgl Input','Aksi')" :thwidth="array(10,35,15,15,15,0,10)" :thclass="array('','','','','','','text-center')" />
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
                                <label for="kode_klp" >Kode</label>
                                <input class="form-control" type="text" id="kode_klp" name="kode_klp" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {{-- Error Kode --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="akun_pers">Akun Persediaan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_akun_pers" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-akun_pers" id="akun_pers" name="akun_pers" value="" title="">
                                    <span class="info-name_akun_pers hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_akun_pers"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="akun_pdpt">Akun Pendapatan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_akun_pdpt" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-akun_pdpt" id="akun_pdpt" name="akun_pdpt" value="" title="">
                                    <span class="info-name_akun_pdpt hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_akun_pdpt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="akun_hpp">Akun HPP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_akun_hpp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-akun_hpp" id="akun_hpp" name="akun_hpp" value="" title="">
                                    <span class="info-name_akun_hpp hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_akun_hpp"></i>
                                </div>
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

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    
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
    
    function getPersediaan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang-klp-pers') }}",
            dataType: 'json',
            data: {kode_akun: id},
            async:false,
            success:function(res){  
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('akun_pers',result.data[0].kode_akun,result.data[0].nama);
                    }else{
                        $('#akun_pers').attr('readonly',false);
                        $('#akun_pers').css('border-left','1px solid #d7d7d7');
                        $('#akun_pers').val('');
                        $('#akun_pers').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }
    
    function getPendapatan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang-klp-pdpt') }}",
            dataType: 'json',
            data: {kode_akun: id},
            async:false,
            success:function(res){  
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('akun_pdpt',result.data[0].kode_akun,result.data[0].nama);
                    }else{
                        $('#akun_pdpt').attr('readonly',false);
                        $('#akun_pdpt').css('border-left','1px solid #d7d7d7');
                        $('#akun_pdpt').val('');
                        $('#akun_pdpt').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getHPP(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang-klp-hpp') }}",
            dataType: 'json',
            data: {kode_akun: id},
            async:false,
            success:function(res){  
                var result = res.data;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('akun_hpp',result.data[0].kode_akun,result.data[0].nama);
                    }else{
                        $('#akun_hpp').attr('readonly',false);
                        $('#akun_hpp').css('border-left','1px solid #d7d7d7');
                        $('#akun_hpp').val('');
                        $('#akun_hpp').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/barang-klp') }}", 
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
                "targets": [5],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_klp' },
            { data: 'nama' },
            { data: 'akun_pers' },
            { data: 'akun_pdpt' },
            { data: 'akun_hpp' },
            { data: 'tgl_input'}
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[5 ,"desc"]]
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
        $('#judul-form').html('Tambah Data Kelompok Barang');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_klp').attr('readonly', false);
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
        var kode = $('#kode_klp').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    //END KEMBALI

    // TRIGGER CHANGE
    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'akun_pers':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang-klp-pers') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'akun_pdpt':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang-klp-pdpt') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'akun_hpp':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang-klp-hpp') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
        }
        showInpFilter(settings);
    });

    $('#form-tambah').on('change', '#akun_pers', function(){
        var par = $(this).val();
        getPersediaan(par);
    });

    $('#form-tambah').on('change', '#akun_pdpt', function(){
        var par = $(this).val();
        getPendapatan(par);
    });

    $('#form-tambah').on('change', '#akun_hpp', function(){
        var par = $(this).val();
        getPendapatan(par);
    });
    // TRIGGER CHANGE

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_klp:{
                required: true,
                maxlength:10   
            },
            nama:{
                required: true 
            },
            akun_pers:{
                required: true
            },
            akun_pdpt:
            {
                required: true
            },
            akun_hpp:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_klp').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/barang-klp') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/barang-klp') }}";
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
                        $('#judul-form').html('Tambah Data Kelompok Barang');
                        $('#method').val('post');
                        $('#kode_klp').attr('readonly', false);
                        $('.input-group-prepend').addClass('hidden');
                        $('span[class^=info-name]').addClass('hidden');
                        $('.info-icon-hapus').addClass('hidden');
                        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_klp",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode Kelompok Barang sudah digunakan'
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
            url: "{{ url('esaku-master/barang-klp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Kelompok Barang ('+id+') berhasil dihapus ');
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
            url: "{{ url('esaku-master/barang-klp') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_klp').attr('readonly', true);
                    $('#kode_klp').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#akun_pers').val(result.data[0].akun_pers);
                    $('#akun_pdpt').val(result.data[0].akun_pdpt);
                    $('#akun_hhp').val(result.data[0].akun_hhp); 
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('akun_pers',result.data[0].akun_pers,result.data[0].nama_pers);
                    showInfoField('akun_pdpt',result.data[0].akun_pdpt,result.data[0].nama_pdpt);
                    showInfoField('akun_hpp',result.data[0].akun_hpp,result.data[0].nama_hpp);
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

        $('#judul-form').html('Edit Data Kelompok Barang');
        editData(id);
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#kode_klp,#nama,#akun_pers,#akun_pdpt,#akun_hpp').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_klp','nama','akun_pers','akun_pdpt','akun_hpp'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 3){
                var kode = $('#akun_pers').val();
                getPersediaan(kode);
            }
            else if(idx == 4){
                var kode = $('#akun_pdpt').val();
                getPendapatan(kode);
            }
            else if(idx == 5){
                var kode = $('#akun_hpp').val();
                getHPP(kode);
            }
            else{
                $('#'+nxt[idx]).focus();
            }
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
                <td style='border:none'>Kode Kelompok Barang</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Kelompok Barang</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Akun Persediaan</td>
                <td>`+data.akun_pers+`</td>
            </tr>
            <tr>
                <td>Akun Pendapatan</td>
                <td>`+data.akun_pdpt+`</td>
            </tr>
            <tr>
                <td>Akun HPP</td>
                <td>`+data.akun_hpp+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Kelompok Barang').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Kelompok Barang');
        
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