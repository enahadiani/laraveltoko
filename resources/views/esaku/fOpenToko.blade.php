<link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Open Toko" tambah="true" :thead="array('No Open','Tanggal','Toko','No Close','Action')" :thwidth="array(20,18,18,20,6)" :thclass="array('','','','','text-center')" />
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
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id_edit" name="id_edit" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row hidden">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="no_open">NO Open</label>
                                <input class='form-control' type="text" id="no_open" name="no_open" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="no_open">Tanggal</label>
                                <input class="form-control" type="text" placeholder="" id="tanggal" name="tanggal" value="{{Session::get('tgl')}}" readonly required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="saldo_awal">Toko</label>
                                <input class="form-control " type="text" name="saldo_awal" id="saldo_awal" required value="0" value="">
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
    <!-- END FORM INPUT  -->

    @php 
        $filter = array(
            0 => array(
                'id' => 'nik',
                'nama' => 'NIK'
            )
        );
    @endphp
    @include('modal_filter', ['filter' => $filter])
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    // INISIASI
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    $('.selectize').selectize();
    
    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    function getFilterNIK() {
        $.ajax({
            type:'GET',
            url:"{{ url('esaku-master/karyawan') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                
                var select = $('#inp-filter_nik').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){  
                        control.addOption([{text:result.daftar[i].nik+'|'+result.daftar[i].nama, value:result.daftar[i].nik}]);
                    }

                    if("{{ Session::get('userLog') }}" != ""){
                        control.setValue("{{ Session::get('userLog') }}");
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getFilterNIK();
    jumFilter();

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/open-kasir') }}",
            dataType: 'json',
            data:{no_open:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Open Kasir ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if(!result.data.status) {
                    showNotification("top", "center", "success",'Hapus Data',result.data.message);
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if(!result.data.status && result.data.message == "Unauthorized"){
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

    // END INISIASI

    // LIST DATA (DATATABLE)
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>&nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/open-kasir') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_open' },
            { data: 'tgl_input' },
            { data: 'saldo_awal' },
            { data: 'no_close' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[0 ,"desc"]]
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
        $('#form-tambah')[0].reset();
        $('#judul-form').html('Tambah Data Open Kasir');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#method').val('post');
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
    // END BUTTON KEMBALI

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            nik_kasir:
            {
                required: true
            },
            saldo_awal:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            
            var param = $('#id').val();
            var saldo = $('#saldo_awal').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('esaku-trans/open-kasir') }}";
            }else{
                var url = "{{ url('esaku-trans/open-kasir') }}";
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(toNilai(saldo) <= 0){
                // alert('Transaksi tidak valid. Saldo tidak boleh kosong ');
                msgDialog({
                    id:'',
                    text: 'Transaksi tidak valid. Saldo tidak boleh kosong!',
                    type:'warning'
                });
            }else{
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
                            $('#btn-update').attr('id','btn-save');
                            $('#btn-save').attr('type','submit');
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Open Kasir');
                            $('#id_edit').val('');   
                            msgDialog({
                                id:result.data.no_open,
                                type:'simpan'
                            });
                            
                            last_add("no_open",result.data.no_open);
                        } else if(!result.data.status) {
                            showNotification("top", "center", "success",'Hapus Data',result.data.message);
                            $('#modal-pesan-id').html('');
                            $('#table-delete tbody').html('');
                            $('#modal-pesan').modal('hide');
                        } else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                        }else{
                            if(result.data.jenis == 'duplicate'){
                                msgDialog({
                                    id: result.data.no_open,
                                    type: result.data.jenis,
                                    text: result.data.message
                                });
                            }else{
                                msgDialog({
                                    id:'',
                                    title: 'Error!',
                                    text: result.data.message,
                                    type:'sukses'
                                });
                            }
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // ENTER FIELD FORM
    $('#no_open,#nik_kasir,#saldo').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['no_open','nik_kasir','saldo'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
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
    // END ENTER FIELD FORM

    //Delete
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });
    //End Delete

    // EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var open= $(this).closest('tr').find('td').eq(0).html();
        var nik= $(this).closest('tr').find('td').eq(1).html();
        var saldo= $(this).closest('tr').find('td').eq(3).html();
        $('#judul-form').html('Edit Data Open Kasir');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#id_edit').val('edit');
        $('#method').val('put');
        $('#no_open').val(open);
        $('#nik').val(nik);
        $('#saldo_awal').val(saldo);
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });
    // END EDIT

     // PREVIEW DATA
     $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>No Open</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>NIK Kasir</td>
                <td>`+data.nik+`</td>
            </tr>
            <tr>
                <td>Saldo Awal</td>
                <td>`+format_number(data.saldo_awal)+`</td>
            </tr>`;
            
            $('#table-preview tbody').html(html);
            $('#modal-preview-id').text(id);
            $('#modal-preview-judul').text('Preview Data Open Kasir');
            $('#modal-preview').modal('show');
        }
                   
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#judul-form').html('Edit Data Open Kasir');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/open-kasir') }}",
            dataType: 'json',
            data:{no_open:id},
            async:false,
            success:function(result){
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_open').val(id);
                    $('#nik').val(result.daftar[0].nik);
                    $('#saldo_awal').val(result.daftar[0].saldo_awal);
                    
                    $('#modal-preview').modal('hide');
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                   window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
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

    // END PREVIEW

    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var tmp = $('#inp-filter_nik').val().split("|");
                var nik = tmp[0];
                var col_nik = data[1];
                if(nik != "" ){
                    if(nik == col_nik){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });
    
    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_nik')[0].selectize.setValue('');
        jumFilter();
    });

    $('[name^=inp-filter]').change(function(e){
        e.preventDefault();
        jumFilter();
    });
    
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });
    
    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });
    
    $('#btn-tampil').click();

    </script>