    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('form-trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Stok Opname" tambah="true" :thead="array('No Bukti','Tanggal','Deskripsi','Action')" :thwidth="array(20,18,56,6)" :thclass="array('','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id" hidden>
                            <div class="col-9">
                                <input class="form-control" type="text" id="id_edit" name="id_edit" readonly >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tanggal" >Tanggal</label>
                                        <input class='form-control' type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}">
                                        <input class="form-control" type="hidden" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_gudang" >Gudang</label>
                                        <select class='form-control' id="kode_gudang" name="kode_gudang">
                                        <option value=''>--- Pilih Gudang ---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deskripsi" >Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-12" style="min-height: 50px;">
                                        <button type="button" class="btn btn-primary ml-2" id="btn-rekon" style="float: right;position: absolute;bottom: 0;right: 15px;">Rekon</button>
                                        <button type="button" class="btn btn-primary ml-2" id="btn-load" style="float: right;position: absolute;bottom: 0;right: 95px;margin-right:8px;">Load</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                       
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 nav-grid" role="tablist" style="padding-bottom:0;margin-top:0.1rem;border-bottom:none">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#sistem" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Item Barang</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fisik" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Jumlah Fisik</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error_tab" role="tab" aria-selected="false"><span class="hidden-xs-down">Error Upload</span></a> </li>
                            <li class="nav-item ml-auto"> <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="file_dok" name="file_dok">
                            <label class="custom-file-label form-control" for="file_dok" name="file_dok" data-browse="Browse" style="color: grey;font-style: italic;overflow: hidden;padding-top: 10px;padding-right:72px;line-height:1.5">Upload File .xls</label>
                            </div></li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="sistem" role="tabpanel">
                                <div class='col-xs-12'>
                                    <table id="input-grid" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Kode Barang</th>
                                            <th width="25%">Nama</th>
                                            <th width="10%">Satuan</th>
                                            <th width="10%">Stok Sistem</th>
                                            <th width="10">Stok Fisik</th>
                                            <th width="10">Selisih</th>
                                            <th width="20">Barcode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="fisik" role="tabpanel">
                                <div class='col-xs-12'>
                                    <table id="input-grid2" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="30%">Kode Barang</th>
                                            <th width="40%">Jumlah Fisik</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>      
                            </div>
                            <div class="tab-pane" id="error_tab" role="tabpanel">
                                <div class='col-xs-12'>
                                    <table id="input-error" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="30%">Kode Barang</th>
                                            <th width="40%">Error Message</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>      
                            </div>
                        </div>
                        <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                            <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                                <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                            </div>
                            <div style="text-align: right;" class="col-md-2 p-0 ">
                                <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM INPUT  -->

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>  
    <script>
    var $iconLoad = $('#loading-bar');
    
    var table = generateTableWithoutAjax(
        "input-grid",
        [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
            },
            {
                'targets': [4,5,6],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            } 
        ],
        [
            { data: 'no' },
            { data: 'kode_barang' },
            { data: 'nama' },
            { data: 'satuan' },
            { data: 'stok' },
            { data: 'jumlah' },
            { data: 'selisih' },
            { data: 'barcode' },
        ],
        []
    );
    
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var table2 = generateTableWithoutAjax(
        "input-grid2",
        [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
            } 
        ],
        [
            { data: 'no' },
            { data: 'kode_barang' },
            { data: 'jumlah' },
        ],
        []
    );
 
    table2.on( 'order.dt search.dt', function () {
        table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    var table3 = generateTableWithoutAjax(
        "input-error",
        [
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
            } 
        ],
        [
            { data: 'no' },
            { data: 'kode_barang' },
            { data: 'err_msg' },
        ],
        []
    );
    
 
    table3.on( 'order.dt search.dt', function () {
        table3.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    function getGudang(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/gudang') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#kode_gudang').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_gudang + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_gudang}]);
                        }
                        control.setValue(result.kode_gudang)
                    }
                }
            }
        });
    }
    
    getGudang();

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    function doLoad(){
        var kode_gudang = $('#kode_gudang')[0].selectize.getValue();

        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/stok-opname-load') }}",
            dataType: 'json',
            async:false,
            data: {'kode_gudang':kode_gudang},
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        table.clear().draw();
                        table.rows.add(result.data).draw(false);
                        Swal.fire(
                            'Great Job!',
                            'Load data '+result.message,
                            'success'
                        )
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.message+'</a>'
                    })
                }
            }
        });
    }

    function doRekon(){
        var data = table2.data();
        var formData = new FormData();
        
        var tempData = []; 
        var i=0;
        $.each( data, function( key, value ) {
            formData.append('kode_barang[]',value.kode_barang);
            formData.append('jumlah[]',value.jumlah);
        });
        
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/stok-opname-rekon') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        table.clear().draw();
                        table.rows.add(result.data).draw(false);
                        table2.clear().draw();
                        $('a[href="#sistem"]').click();
                        Swal.fire(
                            'Great Job!',
                            'Rekon data '+result.message,
                            'success'
                        )
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.message+'</a>'
                    })
                }
            }
        });
    }

    
    // LIST DATA (DATATABLE)
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>&nbsp;<a href='#' title='Delete' id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/stok-opname') }}", 
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
            {'targets': 3, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti'},
            { data: 'tanggal'},
            { data: 'deskripsi'}
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

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/stok-opname-exec') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    var select = $('#kode_gudang').selectize();
                    var control = select[0].selectize;
                    control.clear();    
                    $('#judul-form').html('Form Stok Opname');
                    $('#row-id').hide();
                    $('#form-tambah')[0].reset();
                    $('#id').val('');
                    $('#id_edit').val('');
                    $('#input-grid tbody').html('');
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    table.clear().draw();
                    table2.clear().draw();
                    table3.clear().draw();
                }else{
                    alert(result.message);
                }
            }
        });
    });

    $('#form-tambah').on('click', '#btn-load', function(){
        doLoad();
    });

    $('#form-tambah').on('click', '#btn-rekon', function(){
        doRekon();

    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/stok-opname-detail') }}",
            dataType: 'json',
            async:false,
            data: 'no_bukti='+id,
            success:function(result){
                var data = result.data;
                if(data.status){
                    $('#id_edit').val('edit');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(data.data[0].tanggal);
                    $('#deskripsi').val(data.data[0].keterangan);
                    $('#kode_gudang')[0].selectize.setValue(data.data[0].param1);
                    if(data.data_detail.length > 0){
                        table.clear().draw();
                        table.rows.add(data.data_detail).draw(false);
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else{
                    alert(result.message);
                }
            }
        });
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/stok-opname') }}",
            dataType: 'json',
            data: 'no_bukti='+id,
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Stok Opname ('+id+') berhasil dihapus ');
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

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:
            {
                required: true  
            },
            kode_gudang:
            {
                required: true
            },
            deskripsi:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var param = $('#id_edit').val();
            var id = $('#no_bukti').val();
            var url = "";
            if(param == 'edit') {
                url = "{{ url('esaku-trans/stok-opname-edit') }}"
            } else {
                url = "{{ url('esaku-trans/stok-opname') }}"
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            $.ajax({
                type: 'POST',
                url:url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.status){
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been saved',
                            'success'
                            )
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
                        
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.message+'</a>'
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
    });

    $('#file_dok').change(function(e){
        var formData = new FormData();
        formData.append("file_dok", document.getElementById('file_dok').files[0]);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/upload-barang-fisik') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                // alert('Upload data fisik '+result.message);
                $('#file_dok').val('');
                if(result.status){
                    // location.reload();
                    // dataTable.ajax.reload();
                    table3.clear().draw();
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        table2.clear().draw();
                        table2.rows.add(result.data).draw(false);
                        $('a[href="#fisik"]').click()
                    }
                    Swal.fire(
                        'Great Job!',
                        'Upload data fisik '+result.message,
                        'success'
                    )
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.message+'</a>'
                    })
                    table2.clear().draw();
                    if(typeof result.error_list !== 'undefined' && result.error_list.length>0){
                        table3.clear().draw();
                        table3.rows.add(result.error_list).draw(false);
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });        

    });


    $('#kode_pp,#nama,#initial,#kode_bidang,#kode_ba,#kode_pc,#kota,#flag_aktif ').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nama','initial','kode_bidang','kode_ba','kode_pc','kota','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 8){
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
    </script>