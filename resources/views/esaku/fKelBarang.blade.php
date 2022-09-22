{{-- Referensi file fVendor folder Esaku --}}
<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;   
    }
</style>

<!-- LIST DATA -->
    <x-list-data judul="Data Kelompok Aktiva Tetap" tambah="true" :thead="array('Kode','Nama','Kelompok Akun','Nama Kelompok Akun','Jenis','Aksi')" :thwidth="array(10,20,10,10,10,10)" :thclass="array('','','','','','text-center')" />
<!-- END LIST DATA -->

{{-- Form Input --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" id="id" name="id">

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode_klpfa">Kode Kelompok</label>
                            <input type="text" placeholder="Kode Kelompok" class="form-control" id="kode_klpfa" name="kode_klpfa" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="nama">Nama Kelompok</label>
                            <input type="text" placeholder="Nama Kelompok" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode_klpakun">Kelompok Akun</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                <span class="info-name_kode_klpakun hidden">
                                    <span id="label_kode_klpakun"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="jenis">Jenis</label>
                            <select class="form-control" name="jenis" id="jenis">
                                <option value="AKTAP" selected>AKTAP</option>
                                <option value="INV">INVENTORI</option>
                                <option value="NON">NON</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_klpfa">Kode Kelompok</label>
                                    <input type="text" placeholder="Kode Kelompok" class="form-control" id="kode_klpfa" name="kode_klpfa" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama">Nama Kelompok</label>
                                    <input type="text" placeholder="Nama Kelompok" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_klpakun">Kelompok Akun</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                        <span class="info-name_kode_klpakun hidden">
                                            <span id="label_kode_klpakun"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="AKTAP" selected>AKTAP</option>
                                        <option value="INV">INVENTORI</option>
                                        <option value="NON">NON</option>
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
@include('modal_search')

<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();

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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        // $('#'+par).attr('readonly',false);
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

    function resetForm() {
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=cbbl]").each(function(e){
            $(this).val('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
    }

    function editData(kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/klp-barang-detail') }}",
            data: { kode_klpfa:kode },
            dataType: 'json',
            success:function(result){
                if(result.status){
                    var data = result.daftar[0];
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_klpfa').attr('readonly', true);
                    $('#id').val(kode);
                    $('#kode_klpfa').val(data.kode_klpfa);
                    $('#nama').val(data.nama);
                    $('#jenis').val(data.jenis);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_klpakun',data.kode_klpakun,data.nama_klpakun);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });   
    }

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/klp-barang') }}/"+id,
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

    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/klp-barang') }}", 
        [
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            { data: 'kode_klpfa' },
            { data: 'nama' },
            { data: 'kode_klpakun' },
            { data: 'nama_klpakun' },
            { data: 'jenis' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[2 ,"desc"]]
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

    // Preview Data //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){ 
            var html = "";
            var data = dataTable.row(this).data();
            var kode = data.kode_klpfa;
            var nama = data.nama;
            var kelompok = data.kode_klpakun + " - "+ data.nama_klpakun; 
            var jenis = data.jenis;
             
            html += "<tr>";
            html += "<td style='border: none;'>Kode Kelompok Aktiva Tetap</td>"
            html += "<td style='border: none;'>"+kode+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Nama Akun Kelompok Aktiva Tetap</td>"
            html += "<td>"+nama+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Kelompok Akun</td>"
            html += "<td>"+kelompok+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Jenis</td>"
            html += "<td>"+jenis+"</td>"
            html += "</tr>";

            $('#table-preview tbody').html(html);
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Akun Kelompok Aktiva Tetap').removeClass('py-2');
            $('#modal-preview-id').text(kode);
            $('#modal-preview').modal('show');
        }
    });

    // Form //
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#kode_klpfa').attr('readonly', false);
        $('#form-tambah')[0].reset();
        $('#judul-form').html('Form Data Kelompok Aktiva Tetap');
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#id_edit').val('');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        resetForm();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#form-tambah').validate().resetForm();
        resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Form Data Kelompok Aktiva Tetap');
        editData(id);
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_klpakun').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
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
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Form Data Kelompok Aktiva Tetap');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {}
        switch(id){
            case 'kode_klpakun':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/akun-aktiva-tetap') }}",
                    columns : [
                        { data: 'kode_klpakun' },
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
        showInpFilter(options);
    });

    // Simpan //
    $('#form-tambah').validate({
        ignore:[],
        rules: {
            kode_klpfa:{
                required: true
            },
            nama:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $(form).find('#id_edit').val();
            var kode = $(form).find('#kode_klpfa').val();
            
            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(parameter != "") { 
                var url = "{{ url('esaku-master/klp-barang') }}/"+kode;
                var pesan = "updated";
                var text = "Perubahan data "+kode+" telah tersimpan";                
            } else {
                var url = "{{ url('esaku-master/klp-barang') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+kode;
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
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Form Data Kelompok Aktiva Tetap');
                        $('#method').val('post');
                        $('#kode_klpakun').attr('readonly', false);
                        resetForm();
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add("kode_klpfa",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    })
</script>