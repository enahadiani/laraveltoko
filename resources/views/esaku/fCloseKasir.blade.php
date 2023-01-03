    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('form-trans.css') }}" />
    
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-0" style="padding-top:1rem;min-height:68px">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="position:absolute;top:5px">Close Kasir</h6>
                        </div>
                        <div class="col-md-6">
                            <ul class="nav nav-tabs col-12 nav-grid justify-content-end" role="tablist" style="padding-bottom:0;margin-top:1rem;border-bottom:none">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-finish" role="tab" aria-selected="false"><span class="hidden-xs-down">Finish</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-new" role="tab" aria-selected="true"><span class="hidden-xs-down">New</span></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="separator mb-2"></div>
                <div class="tab-content tabcontent-border col-12 p-0">
                    <div class="tab-pane active" id="data-new" role="tabpanel">
                        <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                            <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                            <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                <div class="page-countdata">
                                    <label>Menampilkan 
                                    <select style="border:none" id="page-count">
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                    </select>
                                    </label>
                                </div>
                            </div>
                            <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                                <div class="input-group input-group-sm" style="width:321px;float:right">
                                    <input type="text" class="form-control" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                                    <div class="input-group-append" style="width:92px !important">
                                        <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                            <div class="table-responsive ">
                                <table id="table-new" class="" style='width:100%'>
                                    <thead>
                                        <tr>
                                            <th>No Open</th>
                                            <th>NIK Kasir</th>
                                            <th>Tgl Jam</th>
                                            <th>Saldo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="data-finish" role="tabpanel">
                        <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                            <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                            <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                <div class="page-countdata">
                                    <label>Menampilkan 
                                    <select style="border:none" id="page-count2">
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                    </select>
                                    </label>
                                </div>
                            </div>
                            <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                                <div class="input-group input-group-sm" style="width:321px;float:right">
                                    <input type="text" class="form-control" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="filter-btn" id="searchData2" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                                    <div class="input-group-append" style="width:92px !important">
                                        <span class="input-group-text" id="filter-btn2" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter2" style="font-size: 8px !important;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                            <div class="table-responsive ">
                                <table id="table-finish" class="" style='width:100%'>
                                    <thead>
                                        <tr>
                                            <th>No Close</th>
                                            <th>Nik Kasir</th>
                                            <th>Tgl Jam</th>
                                            <th>Saldo Awal</th>
                                            <th>Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                        <label for="nik">NIK Kasir</label>
                                        <input class='form-control' type="text" id="nik" name="nik" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="saldo_awal">Saldo Awal</label>
                                        <input class='form-control currency' type="text" id="saldo_awal" name="saldo_awal" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tgl_open">Tanggal Open</label>
                                        <input class='form-control' type="text" id="tgl_open" name="tgl_open" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_pnj">Total Penjualan</label>
                                        <input class='form-control currency' type="text" id="total_pnj" name="total_pnj" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_open">No Open</label>
                                        <input class='form-control' type="text" id="no_open" name="no_open" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_disk">Total Diskon</label>
                                        <input class='form-control currency' type="text" id="total_disk" name="total_disk" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total">Total</label>
                                        <input class='form-control currency' type="text" id="total" name="total" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 nav-grid" role="tablist" style="padding-bottom:0;margin-top:0.1rem;border-bottom:none">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-pnj-cash" role="tab" aria-selected="false"><span class="hidden-xs-down">Detail Penjualan Cash</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-pnj-qris" role="tab" aria-selected="false"><span class="hidden-xs-down">Detail Penjualan Qris</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-pnj-link" role="tab" aria-selected="false"><span class="hidden-xs-down">Detail Penjualan Link Aja</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-beli" role="tab" aria-selected="false"><span class="hidden-xs-down">Detail Pembelian</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-retur" role="tab" aria-selected="false"><span class="hidden-xs-down">Retur Penjualan</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 px-0 mt-3">
                            <div class="tab-pane active" id="data-pnj-cash" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="table-detail" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <th>No Jual</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Periode</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-pnj-qris" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="table-detail-qris" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <th>No Jual</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Periode</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-pnj-link" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="table-detail-link" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <th>No Jual</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Periode</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-beli" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="table-beli" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <th>No Beli</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Periode</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-retur" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table id="table-retur" style='width:100%'>
                                            <thead>
                                                <tr>
                                                    <th>No Retur</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Periode</th>
                                                    <th>Total</th>
                                                    <th>Diskon</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    // var scroll = document.querySelector('#content-preview');
    // var psscroll = new PerfectScrollbar(scroll);
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

    // END INISIASI

    // LIST DATA (DATATABLE)
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-new",
        "{{ url('esaku-trans/close-kasir-new') }}", 
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
            {   'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_open' },
            { data: 'nik'},
            { data: 'tgl_input' },
            { data: 'saldo_awal' }
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

    var dataTable2 = generateTable(
        "table-finish",
        "{{ url('esaku-trans/close-kasir-finish') }}", 
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
            {   'targets': [3,4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
        ],
        [
            { data: 'no_close' },
            { data: 'nik' },
            { data: 'tgl_input' },
            { data: 'saldo_awal' },
            { data: 'total_pnj' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[0 ,"desc"]]
    );

    $("#searchData2").on("keyup", function (event) {
        dataTable2.search($(this).val()).draw();
    });

    $("#page-count2").on("change", function (event) {
        var selText = $(this).val();
        dataTable2.page.len(parseInt(selText)).draw();
    });
    
    var tableDetail = generateTableWithoutAjax(
        "table-detail",
        [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_jual[]' value='" + data + "'>";
                }
            }
        ],
        [
            { data: 'no_jual' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0];
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        []
    );

    var tableDetailQris = generateTableWithoutAjax(
        "table-detail-qris",
        [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_jual[]' value='" + data + "'>";
                }
            }
        ],
        [
            { data: 'no_jual' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0];
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        []
    );

    var tableDetailLink = generateTableWithoutAjax(
        "table-detail-link",
        [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_jual[]' value='" + data + "'>";
                }
            }
        ],
        [
            { data: 'no_jual' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0];
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        []
    );

    var tableBeli = generateTableWithoutAjax(
        "table-beli",
        [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_beli[]' value='" + data + "'>";
                }
            }
        ],
        [
            { data: 'no_beli' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0];
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        []
    );

    var tableRetur = generateTableWithoutAjax(
        "table-retur",
        [
            {'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            {'targets': [0],
                'render': function (data, type, row) {
                    return data+"<input type='hidden' name='no_retur[]' value='" + data + "'>";
                }
            }
        ],
        [
            { data: 'no_retur' },
            { data: 'tanggal', render: function(data,type,row) {
                var split = data.split('-');
                return split[2]+"/"+split[1]+"/"+split[0];
            } },
            { data: 'keterangan' },
            { data: 'periode' },
            { data: 'nilai' },
            { data: 'diskon' },
        ],
        []
    );

    // END LIST DATA



    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END BUTTON KEMBALI

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
            },
            total:
            {
                required: true
            },
            total_pnj:
            {
                required: true
            },
            total_disk:
            {
                required: true
            },
            no_open:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            
            var url = "{{ url('esaku-trans/close-kasir') }}";
        
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
                        dataTable2.ajax.reload();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        msgDialog({
                            id:result.data.no_close,
                            type:'simpan'
                        });
                        
                        // last_add("no_close",result.data.no_close);
                    }
                    else if(!result.data.status && result.data.message === "Unauthorized"){
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

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        $('#judul-form').html('Form Close Kasir');
        var open= $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type:'GET',
            url: "{{ url('esaku-trans/close-kasir-detail') }}/"+open,
            dataType:'json',
            async:false,
            success: function(result) {
                if(result.data.status) {
                    var split = result.data.data[0].tgl.split('-');
                    var tgl = split[2]+"/"+split[1]+"/"+split[0];
                    var total = (parseFloat(result.data.data[0].saldo_awal) + parseFloat(result.data.data[0].total_pnj) ) - parseFloat(result.data.data[0].total_disk);
                    tableDetail.clear().draw();
                    tableDetail.rows.add(result.data.data_jual_cash).draw(false);
                    tableDetailQris.clear().draw();
                    tableDetailQris.rows.add(result.data.data_jual_qris).draw(false);
                    tableDetailLink.clear().draw();
                    tableDetailLink.rows.add(result.data.data_jual_linkaja).draw(false);
                    tableBeli.clear().draw();
                    tableBeli.rows.add(result.data.data_beli).draw(false);
                    tableRetur.clear().draw();
                    tableRetur.rows.add(result.data.data_retur_jual).draw(false);
                    $('#id_edit').val('');
                    $('#method').val('post');
                    $('#no_open').val(open);
                    $('#nik').val(result.data.data[0].nik);
                    $('#saldo_awal').val(parseFloat(result.data.data[0].saldo_awal));
                    $('#total_pnj').val(parseFloat(result.data.data[0].total_pnj));
                    $('#total_disk').val(parseFloat(result.data.data[0].total_disk));
                    // $('#total_ppn').val(parseFloat(result.data.data[0].total_ppn));
                    $('#total').val(total);
                    $('#tgl_open').val(tgl)
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
            }
        });
    });
    // END EDIT

    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var tmp = $('#inp-filter_nik').val().split("|");
                var nik = tmp[0];
                var col_nik = data[1];
                console.log(nik);
                console.log(col_nik);
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
        dataTable2.draw();
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
    
    $('#filter-btn, #filter-btn2').click(function(){
        $('#modalFilter').modal('show');
    });
    
    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });
    
    $('#btn-tampil').click();

    </script>