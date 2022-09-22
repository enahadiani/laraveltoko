    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Perhitung Jurnal dan HPP" tambah="true" :thead="array('No Bukti','Tanggal','Keterangan','No Dokumen','Tgl Input','Aksi')" :thwidth="array(15,15,40,20,0,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->
    <style>
        div.inp-div-jenis > input{
            border-radius:0 !important;
            z-index:1;
            position:relative;
        }

        div.inp-div-jenis > .search-item{
            position: absolute;
            font-size: 18px;
            margin-top: -27px;
            z-index: 2;
            margin-left: 99px;
        }
        .btn-full-round{
            border-radius: 20px !important;
        }
        .btn-light3{
            background: #b3b3b3;
            color: white;
        }
        .icon-tambah{
            background: #505050;
            /* mask: url("{{ url('img/add.svg') }}"); */
            -webkit-mask-image: url("{{ url('img/add.svg') }}");
            mask-image: url("{{ url('img/add.svg') }}");
            width: 12px;
            height: 12px;
        }
        .icon-close{
            background: #D4D4D4;
            /* mask: url("{{ url('img/lock.svg') }}");
             */
            -webkit-mask-image: url("{{ url('img/lock.svg') }}");
            mask-image: url("{{ url('img/lock.svg') }}");
            width: 18px;
            height: 18px;
        }
        .icon-open{
            background: #D4D4D4;
            /* mask: url("{{ url('img/lock.svg') }}");
             */
            -webkit-mask-image: url("{{ url('img/lock.svg') }}");
            mask-image: url("{{ url('img/lock.svg') }}");
            width: 18px;
            height: 18px;
        }
        .popover{
            top: -80px !important;
        }
    
        .btn-back
        {
            line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -40px;position: relative;
            top: 5px;
            z-index: 10;
            float: right;
            margin-top: -30px;
        }
        .btn-back > span 
        {
            border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054;
            color:white;
            background:red;
        }

        .btn-back > span:hover
        {
            color:white;
            background:red;
        }
        .card-body-footer{
            background: white;
            position: fixed;
            bottom: 15px;
            right: 0;
            margin-right: 30px;
            z-index:3;
            height: 60px;
            border-top: ;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }
    
        .bold{
            font-weight:bold;
        }
        .modal p{
            color: #505050 !important;
        }
        .table-header-prev td,th{
            padding: 2px 8px !important;
        }
        #modal-preview .modal-content
        {
            border-bottom-left-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
        }

        #modal-preview
        {
            top: calc(100vh - calc(100vh - 30px)) !important;
            overflow: hidden;
        }

        #modal-preview #content-preview 
        {
            height: calc(100vh - 105px) !important;
        }

        .animate-bottom {
            animation: animatebottom 0.5s;
        }
        
        @keyframes animatebottom {
            from {
                bottom: -400px;
                opacity: 0.8;
            }
            
            to {
                bottom: 0;
                opacity: 1;
            }
        }

        #tanggal-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

    </style>
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
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="tanggal">Tanggal</label>
                                        <span id="tanggal-dp"></span>
                                        <input class='form-control' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_dokumen">Dokumen</label>
                                        <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" type="hidden" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                        <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form" name="kode_form" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-1 mt-4">
                                    <div class="col-md-6 col-sm-12 pt-4">
                                        <button class="btn btn-primary btn-sm float-right" type="button" id="btn-load">Load Data</button>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total" >Total HPP</label>
                                        <input class="form-control currency" type="text" placeholder="Total HPP" readonly id="total" name="total" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data_barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Barang</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data_error" role="tab" aria-selected="true"><span class="hidden-xs-down">Error Barang</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data_barang" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode Barang</th>
                                            <th style="width:30%">Nama Barang</th>
                                            <th style="width:7">Kode PP</th>
                                            <th style="width:10">Satuan</th>
                                            <th style="width:10%">Jumlah</th>
                                            <th style="width:15%">Harga Avg</th>
                                            <th style="width:15%">Nilai HPP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="data_error" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_error" ></span></a>
                                </div>
                                <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-error" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%">No</th>
                                                <th style="width:97%">Kode Barang</th>
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
    <!-- FORM INPUT  -->

    <!-- FORM UPLOAD -->
    <form id="form-upload" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form-upload" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 class="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali-upload" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body form-upload" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <label for="tanggal">Tanggal</label>
                                                <input class='form-control datepicker' type="text" id="tanggal_upload" readonly name="tanggal" value="{{ date('d/m/Y') }}">
                                                <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar"></i>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="no_bukti_upload">No Bukti</label>
                                                <input class='form-control' type="text" id="no_bukti_upload" name="no_bukti" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-dok" role="tabpanel">
                                        <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                                        </div>
                                        <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%">No</th>
                                                    <th style="width:10%">Jenis</th>
                                                    <th style="width:27%">Nama</th>
                                                    <th style="width:20%">Path File</th>
                                                    <th width="20%">Upload File</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                            <a type="button" href="#" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm">
                                            <i class="saicon icon-tambah mr-1"></i>Tambah Baris
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                            <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                                <p class="text-success" style="margin-top: 20px;"></p>
                            </div>
                            <div style="text-align: right;" class="col-md-2 p-0 ">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM UPLOAD  -->
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
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    // FUNCTION TAMBAHAN
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowError(){
        var total_row = $('#input-error tbody tr').length;
        $('#total-row_error').html(total_row+' Baris');
    }
    
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

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    var scrollformupl = document.querySelector('.form-upload');
    var psscrollformupl = new PerfectScrollbar(scrollformupl);
    
    
    $('.selectize').selectize();
    
    $("#tanggal").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        enableOnReadonly: false,
        container:'span#tanggal-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });
    // END 

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var action_html2 = "<a href='#' title='Upload' id='btn-upload'><i class='simple-icon-cloud-upload' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/inv-hitung-hpp') }}", 
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
            {
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets" : 5,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.posted == "Close"){
                        return action_html2;
                    }else{
                        return action_html;
                    }
                }
            }
            // {   'targets': 7, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tgl' },
            { data: 'keterangan' },
            { data: 'no_dokumen' },
            { data: 'tgl_input' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[4 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    // INPUT GRID
    var tableGrid = $("#input-grid").DataTable({
        destroy: true,
        paging:false,
        data: [],
        columns:[
            { data: 'no' },
            { data: 'kode_barang' },
            { data: 'nama' },
            { data: 'kode_pp' },
            { data: 'sat_kecil' },
            { data: 'jumlah' },
            { data: 'h_avg' },
            { data: 'hpp' }
        ],
        columnDefs: [
            {   'targets': [5,6,7], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
        ],
        order: [[ 1, 'asc' ]],
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        }
    });

    tableGrid.on( 'order.dt search.dt', function () {
        tableGrid.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    var tableError = $("#input-error").DataTable({
        destroy: true,
        paging:false,
        data: [],
        columns:[
            { data: 'no' },
            { data: 'kode_barang' }
        ],
        columnDefs: [
        ],
        order: [[ 1, 'asc' ]],
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        }
    });

    tableError.on( 'order.dt search.dt', function () {
        tableError.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    // 

    function loadData(periode){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/inv-hitung-hpp-load') }}",
            dataType: 'json',
            async:false,
            data: {periode: periode},
            success:function(result){
                tableGrid.clear().draw();
                tableError.clear().draw();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        tableGrid.rows.add(result.data).draw(false);
                    }
                    tableGrid.columns.adjust().draw();
                    if(typeof result.detail !== 'undefined' && result.detail.length>0){
                        alert('Terdapat Barang yang tidak terdaftar !');
                        $("a[href='#data_error']").trigger('click');
                        tableError.rows.add(result.detail).draw(false);
                    }
                    tableError.columns.adjust().draw();
                    $('#total').val(result.total);
                    hitungTotalRow();
                    hitungTotalRowError();
                }
            }
        });
    }

    // BUTTON EDIT
    function editData(id){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/inv-hitung-hpp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    $('#deskripsi').val(result.data[0].deskripsi);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#total').val(result.data[0].nilai1);
                    tableGrid.clear().draw();
                    tableError.clear().draw();
                    if(typeof result.detail !== 'undefined' && result.detail.length>0){
                        tableGrid.rows.add(result.detail).draw(false);
                    }
                    tableGrid.columns.adjust().draw();
                    tableError.columns.adjust().draw();
                    hitungTotalRow();
                    hitungTotalRowError();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Perhitung dan Jurnal HPP');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/inv-hitung-hpp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Perhitung dan Jurnal HPP ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
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

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Perhitung dan Jurnal HPP');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#input-dok tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#kode_form').val($form_aktif);
        setHeightForm();
        setWidthFooterCardBody();
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

    $('#saku-form-upload').on('click', '#btn-kembali-upload', function(){
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

    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var posted = data.posted;
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-trans/inv-hitung-hpp') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
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
                            <div style='border-bottom: double #d7d7d7;padding:0 1.5rem'>
                                <table class="borderless mb-2" width="100%" >
                                    <tr>
                                        <td width="25%" style="vertical-align:top !important"><h6 class="text-primary bold">DETAIL HPP</h6></td>
                                        <td width="75%" style="vertical-align:top !important;text-align:right"><h6 class="mb-2 bold">`+result.lokasi[0].nama+`</h6><p style="line-height:1">`+result.lokasi[0].alamat+`<br>`+result.lokasi[0].kota+` `+result.lokasi[0].kodepos+` </p><p class="mt-2">`+result.lokasi[0].email+` | `+result.lokasi[0].no_telp+`</p></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].tanggal+`</td>
                                        <td width="30%" rowspan="3"></td>
                                        <td width="10%" rowspan="3" style="vertical-align:top !important">Deskripsi</td>
                                        <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
                                        <td width="24%" rowspan="3" style="vertical-align:top !important">`+result.data[0].deskripsi+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_bukti+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Dokumen</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_dokumen+`</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.9rem">
                                <table class="table table-striped table-body-prev mt-2" width="100%">
                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th style="width:10%">Kode Barang</th>
                                        <th style="width:30%">Nama Barang</th>
                                        <th style="width:10">Kode PP</th>
                                        <th style="width:10%">Satuan</th>
                                        <th style="width:10%">Jumlah</th>
                                        <th style="width:15%">Harga Avg</th>
                                        <th style="width:15%">HPP</th>
                                </tr>`;
                                    var det = '';
                                    var total_debet = 0; var total_kredit =0;
                                    if(result.detail.length > 0){
                                        var no=1; tojum=0; to_hpp=0;
                                        for(var i=0;i<result.detail.length;i++){
                                            var line = result.detail[i];
                                            tojum+=+line.jumlah;
                                            to_hpp+=+line.hpp;
                                            det += "<tr>";
                                            det += "<td >"+line.kode_barang+"</td>";
                                            det += "<td >"+line.nama+"</td>";
                                            det += "<td >"+line.kode_pp+"</td>";
                                            det += "<td >"+line.sat_kecil+"</td>";
                                            det += "<td class='text-right'>"+format_number(line.jumlah)+"</td>";
                                            det += "<td class='text-right'>"+format_number(line.h_avg)+"</td>";
                                            det += "<td class='text-right'>"+format_number(line.hpp)+"</td>";
                                            det += "</tr>";
                                            no++;
                                        }
                                    }
                                    det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th colspan="4"></th>
                                        <th class='text-right' style="width:10%">`+format_number(tojum)+`</th>
                                        <th class='text-right' style="width:10%"></th>
                                        <th class='text-right' style="width:10%">`+format_number(to_hpp)+`</th>
                                </tr>`;
                                
                                html+=det+`
                                </table>
                            </div>
                        </div>`;
                        $('#content-bottom-sheet').html(html);
                        
                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);

                        
                        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});

                        $('.preview-header').on('click','#btn-delete2',function(e){
                            var id = $('#preview-id').text();
                            $('.c-bottom-sheet').removeClass('active');
                            msgDialog({
                                id:id,
                                type:'hapus'
                            });
                        });

                        $('.preview-header').on('click', '#btn-edit2', function(){
                            var id= $('#preview-id').text();
                            $('#judul-form').html('Edit Perhitung dan Jurnal HPP');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            
                            $('#btn-save').attr('type','button');
                            $('#btn-save').attr('id','btn-update');
                            $('.c-bottom-sheet').removeClass('active');
                            editData(id);
                        });

                        $('.preview-header').on('click','#btn-cetak',function(e){
                            e.stopPropagation();
                            $('.dropdown-ke1').addClass('hidden');
                            $('.dropdown-ke2').removeClass('hidden');
                            console.log('ok');
                        });

                        $('.preview-header').on('click','#btn-cetak2',function(e){
                            // $('#dropdownAksi').dropdown('toggle');
                            e.stopPropagation();
                            $('.dropdown-ke1').removeClass('hidden');
                            $('.dropdown-ke2').addClass('hidden');
                        });

                        if(posted == "Close"){
                            console.log(posted);
                            $('.preview-header #btn-delete2').css('display','none');
                            $('.preview-header #btn-edit2').css('display','none');
                        }else{
                            $('.preview-header #btn-delete2').css('display','inline-block');
                            $('.preview-header #btn-edit2').css('display','inline-block');
                        }
                        $('#trigger-bottom-sheet').trigger("click");
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    // END PREVIEW

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var total = $('#total').val();
            var jumdet = tableGrid.data().length;
            var jumerror = tableError.data().length;

            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/esaku-trans/inv-hitung-hpp') }}/"+id;
            }else{
                var url = "{{ url('/esaku-trans/inv-hitung-hpp') }}";
            }

            if(total <= 0){
                alert('Transaksi tidak valid. Total tidak boleh 0 atau kurang');
            }else if( jumerror > 0){
                alert('Transaksi tidak valid. Terdapat barang yang tidak terdaftar');
            }else if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail barang tidak boleh kosong ');
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
                        // alert('Input data '+result.message);
                        if(result.data.status){
                            // location.reload();
                            dataTable.ajax.reload();

                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Perhitung dan Jurnal HPP');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });

                            if(result.data.no_pooling != undefined){
                                kirimWAEmail(result.data.no_pooling);
                            }

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        }
                        else{
                            msgDialog({
                                id: '-',
                                type: 'warning',
                                title: 'Gagal',
                                text: JSON.stringify(result.data.message)
                            });
                        }
                        $iconLoad.hide();
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
    $('#tanggal,#no_dokumen,#deskripsi,#total').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','deskripsi','total'];
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
    // END ENTER FIELD FORM

    $('#btn-load').click(function(e){
        e.preventDefault();
        var periode = $('#tanggal').val().substr(6,4)+""+$('#tanggal').val().substr(3,2);
        loadData(periode);
    })

    </script>