<link rel="stylesheet" href="{{ asset('trans.css?version=_') . time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Closing Toko" tambah="true"
    :thead="array('No Close','Tanggal','Toko','Tgl Input','')"
    :thwidth="array(15,15,15,0,0)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->
<style>
    #tanggal-dp .datepicker-dropdown {
        left: 20px !important;
        top: 190px !important;
    }

    #input-bill tbody td,
    #input-detail tbody td,
    #prev-table-bill tbody td,
    #prev-table-detail tbody td {
        overflow: hidden;
    }

    #input-bill td:nth-child(2) {
        overflow: unset !important;
    }

    .dataTables_scrollBody #input-rek th {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

</style>
<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row" id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            <input type="hidden" name="kode_form" id="kode_form">
                            <input type="hidden" name="jenis_upload" id="jenis_upload">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                <label for="tanggal">Tanggal</label>
                                <input class="form-control" type="text" placeholder="" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" readonly required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_bukti">No Close</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;cursor:pointer"
                                        class="simple-icon-refresh" id="generate-nobukti"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                <label for="kode_gudang">Toko</label>
                                <input class="form-control " type="text" name="kode_gudang" id="kode_gudang" required value="{{ session()->get('pabrik') }}" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                <label for="status">Status</label>
                            <select class='form-control selectize' id="status" name="status" readonly >
                                <option value='' readonly>--- Pilih ---</option>
                                <option value='1' selected readonly>Synchronize</option>
                            </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="load-data" class="btn btn-primary float-right">Tampil Data</button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                    <button type="button" id="btn-sync" class="btn btn-primary" style="float:right;"> Sync</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#rekap-bill"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pembelian</span></a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail-bill"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detail-pnj"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Penjualan</span></a>
                        </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="rekap-bill" role="tabpanel">
                            <div class='col-md-12 nav-control-terima' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                    class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-row_bill"></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-bill"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">No Bukti</th>
                                            <th style="width:13%">Keterangan</th>
                                            <th style="width:10%">Tanggal</th>
                                            <th style="width:10%">Kode PP</th>
                                            <th style="width:10%">Kode Vendor</th>
                                            <th style="width:10%">Toko</th>
                                            <th style="width:10%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="detail-bill" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                    class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-row_detail"></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-detail"
                                    style="with:2050px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:30px">No</th>
                                            <th style="width:120px">Tanggal</th>
                                            <th style="width:100px">Kode Gudang</th>
                                            <th style="width:100px">Kode Barang</th>
                                            <th style="width:120px">Stok Sisa</th>
                                            <th style="width:100px">SOP</th>
                                            <th style="width:100px">Total Beli</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="detail-pnj" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                    class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-row_detail"></span></a>
                            </div>
                            <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-pnj"
                                    style="with:2050px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:30px">No</th>
                                            <th style="width:120px">No jual</th>
                                            <th style="width:90px">tanggal</th>
                                            <th style="width:150px">Keterangan</th>
                                            <th style="width:80px">Nilai</th>
                                            <th style="width:80px">Total Bayar</th>
                                            <th style="width:80px">Kode Gudang</th>
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
</form>

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    $('#kode_form').val($form_aktif);

    var $iconLoad = $('.preloader');
    var $stsSimpan = 1;
    var $noEdit = "";
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function activaTab(tab) {
        $('.nav-item a[href="#' + tab + '"]').tab('show');
    }

    function hitungTotalRowBill() {
        var total_row = tablebill.data().count();
        $('#total-row_bill').html(total_row + ' Baris');
    }

    function hitungTotalRowDetail(form) {
        var total_row = tabledet.data().count()
        $('#total-row_detail').html(total_row + ' Baris');
    }

    function hitungTotal() {
        var total = 0;
        var data = tablebill.rows({
                selected: true
            }).data();
        $.each(data, function(key, value) {
            total += parseFloat(value.nilai);
        });
        $("#total").val(total);
    }

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $('.selectize').selectize();

    $("#tanggal").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container: 'span#tanggal-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });
    // END 

    function generateNoBukti(tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/close-toko-nobukti') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: tanggal
            },
            success: function(result) {
                $('#no_bukti').val('');
                if (result.status) {
                    $('#no_bukti').val(result.no_bukti);
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: 'Generate ID Gagal'
                    });
                }
            }
        });
    }

    function loadData(tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/close-toko-data') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: tanggal
            },
            success: function(result) {
                var data = result.data;
                tablebill.clear().draw();
                if (result.status) {
                    if (data.length > 0) {
                        activaTab("rekap-bill");
                        tablebill.rows.add(data).draw(false);
                        $('.dataTables_scrollBody td').css({
                            'padding-top': '4px',
                            'padding-bottom': '4px'
                        });
                        tablebill.columns.adjust().draw();
                    }
                    hitungTotal();
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Gagal memuat',
                        text: JSON.stringify(result.message)
                    });
                }
            }
        });
    }

    function loadDetail(tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/close-toko-data-detail') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: tanggal
            },
            success: function(result) {
                var data = result.data;
                tabledet.clear().draw();
                if (result.status) {
                    if (data.length > 0) {
                        activaTab("detail-bill");
                        tabledet.rows.add(data).draw(false);
                        $('.dataTables_scrollBody td').css({
                            'padding-top': '4px',
                            'padding-bottom': '4px'
                        });
                        tabledet.columns.adjust().draw();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Gagal memuat',
                        text: JSON.stringify(result.message)
                    });
                }
            }
        });
    }

    function loadPenj(tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/close-toko-data-pnj') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: tanggal
            },
            success: function(result) {
                var data = result.data;
                tablejual.clear().draw();
                if (result.status) {
                    if (data.length > 0) {
                        activaTab("detail-pnj");
                        tablejual.rows.add(data).draw(false);
                        $('.dataTables_scrollBody td').css({
                            'padding-top': '4px',
                            'padding-bottom': '4px'
                        });
                        tablejual.columns.adjust().draw();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Gagal memuat',
                        text: JSON.stringify(result.message)
                    });
                }
            }
        });
    }

    function sync(tanggal) {
        // $(this).text("Please Wait...").attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/sync-pmb-ct') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: tanggal
            },
            success: function(result) {
                var data = result.data;
                // console.log(data);
                if (data.status) {
                        activaTab("detail-bill");
                        activaTab("rekap-bill");
                        activaTab("detail-pnj");
                        $('.dataTables_scrollBody td').css({
                            'padding-top': '4px',
                            'padding-bottom': '4px'
                        });
                } else if (!data.status && data.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Gagal memuat',
                        text: JSON.stringify(data.message)
                    });
                }
            }
        });
    }

    $('#generate-nobukti').click(function(e) {
        e.preventDefault();
        var tanggal = $('#tanggal').val();
        if (tanggal == "") {
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Tanggal wajib diisi'
            });
            return false;
        }
        generateNoBukti(tanggal);
    });

    $('#tanggal').change(function(e) {
        // e.preventDefault();
        var tanggal = $('#tanggal').val();
        if (tanggal == "") {
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Tanggal wajib diisi'
            });
            return false;
        }
        generateNoBukti(tanggal);
    })

    //LIST DATA
    var action_html2= "";
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/close-toko') }}",
        [{
                "targets": 0,
                "createdCell": function(td, cellData, rowData, row, col) {
                    if (rowData.status == "baru") {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [3],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4,
                "data": null,
                "render": function(data, type, row, meta) {
                    return action_html2;
                }
            }
        ],
        [   { data: 'no_sync' },
            { data: 'tanggal' },
            { data: 'kode_gudang' },
            { data: 'tgl_input' }
        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [
            [4, "desc"]
        ]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function(event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function(event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({
        trigger: "focus"
    });
    // END LIST DATA

    // GRID
    var tablebill = $("#input-bill").DataTable({
        destroy: true,
        bLengthChange: false,
        scrollY: 'calc(100vh - 300px)',
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [
            
            {
                'targets': [7],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(2)'
        },
        columns: [
            { data: 'no' },
            { data: 'no_hutang' },
            { data: 'keterangan' },
            { data: 'tanggal' },
            { data: 'kode_pp' },
            { data: 'kode_vendor' },
            { data: 'kode_gudang' },
            { data: 'ni_hutang' }
        ],
        order: [],
        drawCallback: function() {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            $(".status_bill").on("change", function() {
                var $row = $(this).parents("tr");
                var rowData = tablebill.row($row).data();
                if ($(this).is(':checked')) {
                    rowData.status = 'APP';
                } else {
                    rowData.status = 'INPROG';
                }
            })
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    $('#input-bill').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    tablebill.on('select.dt deselect.dt', function(e, dt, type, indexes) {

        var countSelectedRows = tablebill.rows({
            selected: true
        }).count();
        var countItems = tablebill.rows().count();

        if (e.type === 'select') {
            $('.selectall-checkbox input[type="checkbox"]', tablebill.rows({
                selected: true
            }).nodes()).prop('checked', true).trigger('change');
        } else {
            
            $('.selectall-checkbox input[type="checkbox"]', tablebill.rows({
                selected: false
            }).nodes()).prop('checked', false).trigger('change');
        }
        hitungTotal();
        hitungTotalRowBill();
    });

    $("#searchData_input-bill").on("keyup", function(event) {
        tablebill.search($(this).val()).draw();
    });

    $("#page-count_input-bill").on("change", function(event) {
        var selText = $(this).val();
        tablebill.page.len(parseInt(selText)).draw();
    });

    $('#form-tambah').on('click', '#load-data', function(e) {
        var tanggal = reverseDate2($('#tanggal').val(), '/', '-');
        var kode_lokasi = $('#kode_lokasi').val();
        loadData(tanggal,kode_lokasi);
        loadDetail(tanggal);
        loadPenj(tanggal)
    });

    $('#input-bill').on('click', '#btn-detail', function(e) {
        var tanggan = $('#tanggal').val();
        loadDetail(tanggal);
    });

    $('#form-tambah').on('click', '#btn-sync', function(e) {
        var tanggal = reverseDate2($('#tanggal').val(), '/', '-');
        var kode_lokasi = $('#kode_lokasi').val();
        sync(tanggal);
    });

    

    // TABLE JURNAL
    var tabledet = $("#input-detail").DataTable({
        destroy: true,
        bLengthChange: false,
        scrollY: 'calc(100vh - 300px)',
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [
            
            {
                'targets': [6],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(2)'
        },
        columns: [
            { data: 'no' },
            { data: 'tanggal' },
            { data: 'kode_gudang' },
            { data: 'kode_barang' },
            { data: 'stok_sis' },
            { data: 'sop' },
            { data: 'tot_beli' }
        ],
        order: [],
        drawCallback: function() {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            $(".status_bill").on("change", function() {
                var $row = $(this).parents("tr");
                var rowData = tablebill.row($row).data();
                if ($(this).is(':checked')) {
                    rowData.status = 'APP';
                } else {
                    rowData.status = 'INPROG';
                }
            })
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    tabledet.on('order.dt search.dt', function() {
        tabledet.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $('#input-jurnal').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $("#searchData_input-jurnal").on("keyup", function(event) {
        tabledet.search($(this).val()).draw();
    });

    $("#page-count_input-jurnal").on("change", function(event) {
        var selText = $(this).val();
        tabledet.page.len(parseInt(selText)).draw();
    });

    // END GRID

    // TABLE Penjualan
    var tablejual = $("#input-pnj").DataTable({
        destroy: true,
        bLengthChange: false,
        scrollY: 'calc(100vh - 300px)',
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [
            
            {
                'targets': [4,5],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(2)'
        },
        columns: [
            { data: 'no' },
            { data: 'no_jual' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'nilai' },
            { data: 'tobyr' },
            { data: 'kode_gudang' }
        ],
        order: [],
        drawCallback: function() {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            $(".status_bill").on("change", function() {
                var $row = $(this).parents("tr");
                var rowData = tablebill.row($row).data();
                if ($(this).is(':checked')) {
                    rowData.status = 'APP';
                } else {
                    rowData.status = 'INPROG';
                }
            })
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    tabledet.on('order.dt search.dt', function() {
        tabledet.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $('#input-jurnal').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $("#searchData_input-jurnal").on("keyup", function(event) {
        tabledet.search($(this).val()).draw();
    });

    $("#page-count_input-jurnal").on("change", function(event) {
        var selText = $(this).val();
        tabledet.page.len(parseInt(selText)).draw();
    });

    // END GRID

    // BUTTON EDIT
    function editData(id) {
        activaTab("rekap-bill");
        $.ajax({
            type: 'GET',
            url: "{{ url('/billing-trans/terima-cost-sharing') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
                    
                    $stsSimpan = 0;
                    $noEdit = id;
                    $('#btn-control').hide();
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal, '-', '/'));
                    $('#deskripsi').val(result.data[0].keterangan);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#akun_kasbank').val(result.data[0].akun_kasbank);
                    $('#kode_lokasi').val(result.data[0].kode_lokasi);
                    $('#total').val(Math.round(result.data[0].nilai,0));

                    tablebill.clear().draw();
                    if(typeof result.data_bill == 'object' && result.data_bill.length > 0 ){ 
                        tablebill.rows.add(result.data_bill).draw(false);
                        $('.dataTables_scrollBody td').css({'padding-top':'4px', 'padding-bottom':'4px'});
                        tablebill.rows().select();
                    }

                    tabledet.clear().draw();
                    hitungTotal();

                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    tablebill.columns.adjust().draw();
                    tabledet.columns.adjust().draw();
                    showInfoField("akun_kasbank",result.data[0].akun_kasbank,result.data[0].nama_akun_kasbank);
                    showInfoField("kode_lokasi",result.data[0].kode_lokasi,result.data[0].nama_lokasi);
                    setHeightForm();
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function() {
        var id = $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');
        $('#judul-form').html('Edit Data Penerimaan Cost Sharing');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('billing-trans/terima-cost-sharing') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data',
                        'Data Penerimaan Cost Sharing (' + id + ') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if (typeof M == 'undefined') {
                        $('#modal-delete').modal('hide');
                    } else {
                        $('#modal-delete').bootstrapMD('hide');
                    }
                } else if (!result.data.status && result.data.message == "Unauthorized") {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-delete', function(e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type: 'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        $('#btn-control').show();
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Data Closing Toko');
        $('#btn-update').attr('id', 'btn-save');
        $('#btn-save').attr('type', 'submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important'
        );
        $stsSimpan = 1;
        $noEdit = "";
        setHeightForm();
        activaTab("rekap-bill");
        $('#kode_form').val($form_aktif);
        var tanggal = $('#tanggal').val();
        generateNoBukti(tanggal);
        tablebill.clear().draw();
        tablebill.columns.adjust().draw();
        tabledet.clear().draw();
        tabledet.columns.adjust().draw();
        tablejual.clear().draw();
        tablejual.columns.adjust().draw();
    });
    // END BUTTON TAMBAH

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function() {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
    });

    // END BUTTON KEMBALI

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function() {
        var kode = $('#no_bukti').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });
    // END BUTTON UPDATE

    // PREVIEW DATA
    $('#table-data tbody').on('click', 'td', function(e) {
        if ($(this).index() != 4) {

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('/billing-trans/terima-cost-sharing') }}/" + id,
                dataType: 'json',
                async: false,
                success: function(res) {
                    var result = res.data;
                    if (result.status) {

                        var html =
                            `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">` +
                            id +
                            `</span> 
                            <div class="dropdown d-inline-block float-right">
                                <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                                <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class='separator'></div>
                        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                            <div style="padding:0 0.4rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].no_kas + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + reverseDate2(result.data[0].tanggal, '-', '/') + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Dokumen</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].no_dokumen + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Keterangan</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].keterangan + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Akun Kasbank</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].akun_kasbank + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Lokasi Bill</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].kode_lokasi + `</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#prev-bill" role="tab" aria-selected="true"><span class="hidden-xs-down">Rekap Billing</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prev-detail" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Billing</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="prev-bill" role="tabpanel">
                                        <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="prev-table-bill"
                                                style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                <thead style="background:#F8F8F8">
                                                    <tr>
                                                        <th style="width:3%">No</th>
                                                        <th style="width:5%">Status</th>
                                                        <th style="width:15%">No Bukti</th>
                                                        <th style="width:10%">Periode</th>
                                                        <th style="width:27%">Keterangan</th>
                                                        <th style="width:10%">Nilai CS</th>
                                                        <th style="width:10%">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="prev-detail" role="tabpanel">
                                        <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="prev-table-detail"
                                                style="with:1830px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                <thead style="background:#F8F8F8">
                                                    <tr>
                                                        <th style="width:30px">No</th>
                                                        <th style="width:120px">Kode Mitra</th>
                                                        <th style="width:100px">No Ref</th>
                                                        <th style="width:120px">NIK</th>
                                                        <th style="width:250px">Nama</th>
                                                        <th style="width:100px">Loker</th>
                                                        <th style="width:100px">Lok Tagih</th>
                                                        <th style="width:100px">Band</th>
                                                        <th style="width:120px">NIKES</th>
                                                        <th style="width:250px">Nama Pasien</th>
                                                        <th style="width:100px">Tgl Masuk</th>
                                                        <th style="width:100px">Tgl Keluar</th>
                                                        <th style="width:100px">ICD-X</th>
                                                        <th style="width:100px">Kode Biaya</th>
                                                        <th style="width:120px">Nilai CS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $('#content-bottom-sheet').html(html);

                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);

                        var prev_bill = generateTableWithoutAjax(
                            "prev-table-bill",
                            [
                                {
                                    'targets': [5],
                                    'className': 'text-right',
                                    'render': $.fn.dataTable.render.number('.', ',', 0, '')
                                },
                                {
                                    'targets': [4],
                                    'data': null,
                                    'render': function(data, type, row, meta) {
                                        return '<span data-toggle="tooltip" title="' + row.keterangan + '">' + row
                                            .keterangan + '</span>';
                                    }
                                },
                                {
                                    'targets': [6],
                                    'data': null,
                                    'className': 'p-0',
                                    'render': function(data, type, row, meta) {
                                        return '<button class="btn btn-sm btn-light" id="btn-detail" type="button">Detail</button>';
                                    }
                                }
                            ],
                            [
                                { data: 'no' },
                                { data: 'status' },
                                { data: 'no_bill' },
                                { data: 'periode' },
                                { data: 'keterangan' },
                                { data: 'nilai' }
                            ],
                            [],
                            [[0, "asc"]],
                            true,
                            'calc(100vh - 330px)'
                        );

                        if(result.data_bill.length > 0){
                            prev_bill.rows.add(result.data_bill).draw(false);
                            $('.dataTables_scrollBody td').css({
                                'padding-top': '4px',
                                'padding-bottom': '4px'
                            });
                        }

                        $('#prev-table-bill').on('click', '#btn-detail', function(e) {
                            var selected = prev_bill.row($(this).closest('tr')).data();
                            var kode_lokasi = result.data[0].kode_lokasi;
                            var no_bukti = result.data[0].no_kas;
                            loadDetailPrev(selected.no_bill,kode_lokasi,no_bukti);

                        });

                        var prev_detail = generateTableWithoutAjax(
                            "prev-table-detail",
                            [
                                {
                                    'targets': [13],
                                    'className': 'text-right',
                                    'render': $.fn.dataTable.render.number('.', ',', 0, '')
                                }
                            ],
                            [
                                { data: null },
                                { data: 'kode_vendor' },
                                { data: 'no_ref' },
                                { data: 'nik' },
                                { data: 'nama' },
                                { data: 'loker' },
                                { data: 'kode_lokasi' },
                                { data: 'band' },
                                { data: 'nikkes' },
                                { data: 'pasien' },
                                { data: 'tgl_masuk' },
                                { data: 'tgl_keluar' },
                                { data: 'icdx' },
                                { data: 'kode_produk' },
                                { data: 'nilai_cs' }
                            ],
                            [],
                            [[0, "asc"]],
                            true,
                            'calc(100vh - 330px)'
                        );

                        function loadDetailPrev(no_bill,kode_lokasi,no_bukti) {
                            $.ajax({
                                type: 'GET',
                                url: "{{ url('billing-trans/terima-cost-sharing-bill-detail') }}",
                                dataType: 'json',
                                async: false,
                                data: {
                                    no_bill: no_bill,
                                    kode_lokasi: kode_lokasi,
                                    no_bukti: no_bukti,
                                    sts_simpan: 0
                                },
                                success: function(result) {
                                    var data = result.data;
                                    prev_detail.clear().draw();
                                    if (result.status) {
                                        if (data.length > 0) {
                                            activaTab("prev-detail");
                                            prev_detail.rows.add(data).draw(false);
                                            $('.dataTables_scrollBody td').css({
                                                'padding-top': '4px',
                                                'padding-bottom': '4px'
                                            });
                                            prev_detail.columns.adjust().draw();
                                        }
                                    } else if (!result.status && result.message == 'Unauthorized') {
                                        window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                                    } else {
                                        msgDialog({
                                            id: '-',
                                            type: 'warning',
                                            title: 'Gagal memuat',
                                            text: JSON.stringify(result.message)
                                        });
                                    }
                                }
                            });
                        }

                        $('a[href="#prev-detail"]').on('shown.bs.tab', function(e) {
                            prev_detail.columns.adjust().draw();
                        })
                        $('a[href="#prev-bill"]').on('shown.bs.tab', function(e) {
                            prev_bill.columns.adjust().draw();
                        })

                        $('.c-bottom-sheet__sheet').css({
                            "width": "70%",
                            "margin-left": "15%",
                            "margin-right": "15%"
                        });

                        $('.preview-header').on('click', '#btn-delete2', function(e) {
                            var id = $('#preview-id').text();
                            $('.c-bottom-sheet').removeClass('active');
                            msgDialog({
                                id: id,
                                type: 'hapus'
                            });
                        });

                        $('.preview-header').on('click', '#btn-edit2', function() {
                            var id = $('#preview-id').text();
                            $('#judul-form').html(
                                'Edit Data Penerimaan Cost Sharing');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();

                            $('#btn-save').attr('type', 'button');
                            $('#btn-save').attr('id', 'btn-update');
                            $('.c-bottom-sheet').removeClass('active');
                            editData(id);
                        });

                        $('.preview-header').on('click', '#btn-cetak', function(e) {
                            e.stopPropagation();
                            $('.dropdown-ke1').addClass('hidden');
                            $('.dropdown-ke2').removeClass('hidden');
                            console.log('ok');
                        });

                        $('.preview-header').on('click', '#btn-cetak2', function(e) {
                            // $('#dropdownAksi').dropdown('toggle');
                            e.stopPropagation();
                            $('.dropdown-ke1').removeClass('hidden');
                            $('.dropdown-ke2').addClass('hidden');
                        });

                        $('.preview-header #btn-delete2').css('display', 'inline-block');
                        $('.preview-header #btn-edit2').css('display', 'inline-block');
                        $('#trigger-bottom-sheet').trigger("click");
                        
                        prev_bill.columns.adjust().draw();
                        prev_detail.columns.adjust().draw();

                    } else if (!result.status && result.message == 'Unauthorized') {
                        window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                    }
                }
            });

        }
    });

    // END PREVIEW

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:
            {
                required: true
            },
            no_sync:
            {
                required: true
            },
            kode_gudang:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var id = $('#no_close').val();

            var url = "{{ url('esaku-trans/close-toko') }}";
            var pesan = "saved";
            var text = "Perubahan data "+id+" telah tersimpan";
        
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
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        msgDialog({
                            id:result.data.no_bukti,
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

    // ENTER FIELD FORM
    $('#tanggal,#no_bukti,#no_dokumen,#deskripsi,#akun_kasbank,#kode_lokasi,#total')
        .keydown(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['tanggal','no_bukti','no_dokumen','deskripsi','akun_kasbank','kode_lokasi','total'
            ];
            if (code == 13 || code == 40) {
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx++;
                $('#' + nxt[idx]).focus();
            } else if (code == 38) {
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx--;
                if (idx != -1) {
                    $('#' + nxt[idx]).focus();
                }
            }
        });
    // END ENTER FIELD FORM

    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'akun_kasbank':
                var options = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('billing-trans/terima-cost-sharing-akun-kasbank') }}",
                    columns: [
                        { data: 'kode_akun' },
                        { data: 'nama' },
                    ],
                    judul: "Daftar Akun",
                    pilih: "akun",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"]
                }
                break;
            case 'kode_lokasi':
                var options = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('billing-trans/terima-cost-sharing-lokasi-bill') }}",
                    columns: [
                        {data : 'kode_lokasi'},
                        {data : 'nama'},
                    ],
                    judul: "Daftar Lokasi",
                    pilih: "lokasi",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"]
                }
                break;
        }
        showInpFilterBSheet(options);
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function() {
            self.Value('');
        }
    });

    $('a[href="#rekap-bill"]').on('shown.bs.tab', function(e) {
        tablebill.columns.adjust().draw();
    })
    $('a[href="#detail-bill"]').on('shown.bs.tab', function(e) {
        tabledet.columns.adjust().draw();
    })

</script>
