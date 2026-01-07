    <link rel="stylesheet" href="{{ asset('trans.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form.css?version=_').time() }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Jurnal Stok" tambah="true" :thead="array('No Bukti','Tanggal','Keterangan','Kode Vendor','Tgl Input','Aksi')" :thwidth="array(15,10,55,10,0,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->
    <style>
        #tanggal-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }
        .selected-cell{
            padding: 0px !important;
        }

        .icon-tambah{
            background: #505050;
            /* mask: url("{{ url('img/add.svg') }}"); */
            -webkit-mask-image: url("{{ url('img/add.svg') }}");
            mask-image: url("{{ url('img/add.svg') }}");
            width: 12px;
            height: 12px;
        }
        .editing, .no-pad{
            padding: 0px !important;
        }
        .editing input{
            height: 36px !important;
            width: -moz-available;
            width: -webkit-fill-available;
            padding: 0px 8px !important;
            border-radius: 0px !important;
        }
        .editing .input-search{
            border-radius: 0px !important;
        }
        .edit-input[readonly] {
            background: #e9ecef !important;
        }
        .input-grid thead th{
            padding: 6px 8px !important;
        }
        .input-grid tbody td{
            overflow: hidden;
        }
        .not-show{
            display: none !important;
        }
        .always-show{
            display: unset !important;
        }
    </style>
    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right custom-form-grid" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <input type="hidden" id="kode_form" name="kode_form">
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
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-left:5px;position: absolute;top: 32px;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="no_bukti">No Bukti</label>
                                        <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                        <i style="font-size: 18px;margin-left:5px;position: absolute;top: 32px;right: 25px;cursor:pointer" class="simple-icon-refresh" id="generate-nobukti"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_persediaan">Nilai Persediaan</label>
                                        <input class='form-control currency' type="text" value="0" id="total_persediaan" name="total_persediaan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="keterangan">Deskripsi</label>
                                        <input class="form-control" id="keterangan" name="keterangan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_ppn">Total PPN</label>
                                        <input class='form-control currency' type="text" value="0" id="total_ppn" name="total_ppn" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_vendor">Vendor</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_vendor" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_vendor" id="kode_vendor" name="kode_vendor" value="" title="">
                                            <span class="info-name_kode_vendor hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_vendor"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_diskon">Total Diskon</label>
                                        <input class='form-control currency' type="text" value="0" id="total_diskon" name="total_diskon" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_gudang">Gudang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_gudang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_gudang" id="kode_gudang" name="kode_gudang" value="" title="">
                                            <span class="info-name_kode_gudang hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_gudang"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="load-data" class="btn btn-primary float-right">Tampil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_hutang">Total Net/Hutang</label>
                                        <input class='form-control currency' type="text" value="0" id="total_hutang" name="total_hutang" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-trans" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Transaksi</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Barang</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-trans" role="tabpanel">
                                <div class='col-md-12 nav-control nav-control-trans' style="padding: 5px;min-height:32px;">
                                    <a style="font-size:18px;float: right;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_input-trans" ></span></a>
                                </div>
                                <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-trans" style="table-layout:fixed;word-wrap:break-word;white-space:nowrap;">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            @php 
                                                $col2 = ["No", "", "No Beli", "Keterangan", "Tanggal", "Jumlah Item", "Detail"];
                                                $width2 = ["5%", "5%", "15%", "35%", "10%", "15%", "15%"];
                                                $x=0;
                                            @endphp
                                            @foreach ($col2 as $c)
                                                <th style="width:{{ $width2[$x] }}!important;">{{ $c }}</th>
                                                @php $x++ @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <div class="row mx-0">
                                        <div id="pagination-info-input-trans" class="col-6 mt-2 text-muted small"></div>
                                        <div id="pagination-controls-input-trans" class="col-6 mt-1 d-flex justify-content-end"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-barang" role="tabpanel">
                                <div class='col-md-12 nav-control nav-control-barang' style="padding: 5px;min-height:32px;">
                                    <a style="font-size:18px;float: right;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_input-barang" ></span></a>
                                </div>
                                <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample input-grid" id="input-barang" style="table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            @php 
                                                $col2 = ["No", "", "Kode Barang", "Nama", "Satuan", "Jumlah"];
                                                $width2 = ["4%", "4%", "22%", "50%", "10%", "10%"];
                                                $x=0;
                                            @endphp
                                            @foreach ($col2 as $c)
                                                <th style="width:{{ $width2[$x] }}!important;">{{ $c }}</th>
                                                @php $x++ @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <div class="row mx-0">
                                        <div id="pagination-info-input-barang" class="col-6 mt-2 text-muted small"></div>
                                        <div id="pagination-controls-input-barang" class="col-6 mt-1 d-flex justify-content-end"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    {{-- PRINT PREVIEW --}}
    <div id="saku-print" class="row" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:42.8px">
                    <button type="button" id="btn-back" aria-label="Kembali" class="btn btn-back" style="top: 28px !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-2 mr-4" id="btn-cetak" style="float:right;"><i class="fa fa-print"></i> Print</button>
                </div>
                <div class="separator mb-2"></div>
                <div id="load-print"></div>
                <div class="card-body canvasPreview">

                </div>
            </div>
        </div>
    </div>
    {{-- END PRINT PREVIEW --}}

    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    @include('modal_upload')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js?version=_').time() }}"></script>
    <script src="{{ asset('editable2.js?version=_') . time() }}"></script>
    <script>
        // INISIASI AWAL FORM

        var scrollform = document.querySelector('.form-body');
        var psscrollform = new PerfectScrollbar(scrollform);    
        
        // $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
        // $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});

        var bottomSheet = new BottomSheet("country-selector");
        document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
        window.bottomSheet = bottomSheet;

        $('#kode_form').val($form_aktif);
        $stsSimpan = 1;
        $noEdit = "";

        var $btnSave = $('#btn-save');
        var originalBtnHtml = $btnSave.html();

        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";
        var $target3 = "";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $("#tanggal").bootstrapDP({
            autoclose: true,
            format: 'dd/mm/yyyy',
            container:'span#tanggal-dp',
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            },
            orientation: 'bottom left'
        });
        
    
        // END 

        // FUNCTION TAMBAHAN

        function generateNoBukti(tanggal){
            if($stsSimpan == 0){
                return false;
            }
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-trans/jurnal-stok-nobukti') }}",
                dataType: 'json',
                async:false,
                data:{tanggal: tanggal},
                success:function(result){   
                    $('#no_bukti').val('');
                    if(result.status){
                        $('#no_bukti').val(result.no_bukti);
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('finest/sesi-habis') }}";
                    }else{
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

        $('#generate-nobukti').click(function(e){
            e.preventDefault();
            var tanggal = $('#tanggal').val();
            if(tanggal == ""){
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

        $('#tanggal').change(function(e){
            // e.preventDefault();
            var tanggal = $('#tanggal').val();
            if(tanggal == ""){
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

        $('#total_persediaan, #total_ppn, #total_diskon').change(function(){
            var total_pers = toNilai($('#total_persediaan').val());
            var total_ppn = toNilai($('#total_ppn').val());
            var total_disk = toNilai($('#total_diskon').val());
            var total_hutang = parseFloat(total_pers) + parseFloat(total_ppn) - parseFloat(total_disk);
            $('#total_hutang').val(total_hutang);
        });

        function loadData(periode, kode_gudang){
            var url = "{{url('esaku-trans/jurnal-stok-load')}}";
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    periode: periode,
                    kode_gudang: kode_gudang
                },
                dataType: 'JSON',
                async: false,
                success: function(result){
                    var data = result.data;
                    if(data.length > 0){
                        stokTable.loadData(data);
                    }else{
                        alert('Data Transaksi Input Stok Kosong, silahkan coba lagi dan Pilih tanggal !');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if(jqXHR.status == 422){
                        var msg = jqXHR.responseText;
                    }else if(jqXHR.status == 500) {
                        var msg = "Internal server error";
                    }else if(jqXHR.status == 401){
                        var msg = "Unauthorized";
                        window.location="{{ url('/bdh-auth/sesi-habis') }}";
                    }else if(jqXHR.status == 405){
                        var msg = "Route not valid. Page not found";
                    }
                }
            });
        }

        function loadBarang(no_beli){
            var url = "{{url('esaku-trans/jurnal-stok-barang')}}";
            activaTab("data-barang");
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    no_beli: no_beli
                },
                dataType: 'JSON',
                async: false,
                success: function(result){
                    var data = result.data;
                    if(data.length > 0){
                        barangTable.loadData(data);
                    }else{
                        alert('Detail Barang tidak ditemukan!');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if(jqXHR.status == 422){
                        var msg = jqXHR.responseText;
                    }else if(jqXHR.status == 500) {
                        var msg = "Internal server error";
                    }else if(jqXHR.status == 401){
                        var msg = "Unauthorized";
                        window.location="{{ url('/bdh-auth/sesi-habis') }}";
                    }else if(jqXHR.status == 405){
                        var msg = "Route not valid. Page not found";
                    }
                }
            });
        }

        $('#form-tambah').on('click', '#load-data', function(e) {
            var periode = reverseDate2($('#tanggal').val(), '/', '-').replace('-', '').replace('-', '').substr(0,
                6);
            var kode_gudang = $('#kode_gudang').val();
            if(periode == ""){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Tanggal tidak valid',
                    text: 'Tanggal harus diisi',
                });
                return false;
            }
             if(kode_gudang == ""){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Gudang tidak valid',
                    text: 'Gudang harus diisi',
                });
                return false;
            }
            loadData(periode, kode_gudang);
        });

        function getVendor(kode_vendor){
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/vendor') }}/"+kode_vendor,
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            showInfoField('kode_vendor',result.data[0].kode_vendor,result.data[0].nama);
                        }else{
                            $('#kode_vendor').attr('readonly',false);
                            $('#kode_vendor').css('border-left','1px solid #d7d7d7');
                            $('#kode_vendor').val('');
                            $('#kode_vendor').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('finest/sesi-habis') }}";
                    }
                }
            });
        }

        function getGudang(kode_gudang){
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/vendor') }}/"+kode_gudang,
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            showInfoField('kode_gudang',result.data[0].kode_gudang,result.data[0].nama);
                            resizeNameField('kode_gudang');
                            stokTable.clear();
                            barangTable.clear();
                        }else{
                            $('#kode_gudang').attr('readonly',false);
                            $('#kode_gudang').css('border-left','1px solid #d7d7d7');
                            $('#kode_gudang').val('');
                            $('#kode_gudang').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('finest/sesi-habis') }}";
                    }
                }
            });
        }

        function activaTab(tab){
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        }
        // END FUNCTION TAMBAHAN

        // LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        var action_html2 = "<a href='#' title='Preview' id='btn-preview'><i class='simple-icon-doc' style='font-size:18px'></i></a>";
        var dataTable = generateTable(
            "table-data",
            "{{ url('esaku-trans/jurnal-stok') }}", 
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
                    'className' : 'text-center',
                    "render": function ( data, type, row, meta ) {
                        return action_html;
                    }
                }
            ],
            [
                { data: 'no_bukti' },
                { data: 'tanggal' },
                { data: 'keterangan' },
                { data: 'kode_vendor' },
                { data: 'tgl_input' }
            ],
            "{{ url('finest/sesi-habis') }}",
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

        // BUTTON EDIT
        function editData(id){
            $stsSimpan = 0;
            $('#btn-save').attr('type','button');
            $('#btn-save').attr('id','btn-update');
            $('#judul-form').html('Edit Jurnal Stok');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $("#kode_gudang").parents('.input-group').addClass('readonly');
            $('#load-data').hide();
            barangTable.clear();
            stokTable.clear();
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-trans/jurnal-stok') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        $('#id').val('edit');
                        $('#method').val('post');
                        $('#no_bukti').val(result.data[0].no_bukti);
                        $('#no_bukti').attr('readonly', true);
                        $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/')); 
                        $('#kode_vendor').val(result.data[0].kode_vendor);
                        $('#kode_gudang').val(result.data[0].kode_gudang);
                        $('#keterangan').val(result.data[0].keterangan);
                        $('#total_persediaan').val(Math.round(result.data[0].total_persediaan,0))
                        $('#total_ppn').val(Math.round(result.data[0].total_ppn,0))
                        $('#total_diskon').val(Math.round(result.data[0].total_diskon,0))
                        $('#total_hutang').val(Math.round(result.data[0].total_hutang,0))
                        showInfoField("kode_vendor",result.data[0].kode_vendor,result.data[0].nama_vendor);
                        showInfoField("kode_gudang",result.data[0].kode_gudang,result.data[0].nama_gudang);
                        
                        if(result.detail_trans.length > 0) {
                            stokTable.loadData(result.detail_trans);
                        }  
                        
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                        $('#kode_form').val($form_aktif);
                        resizeNameField('kode_vendor');
                        resizeNameField('kode_gudang');
                        setHeightForm();
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('finest/sesi-habis') }}";
                    }
                }
            });
        }

        $('#saku-datatable').on('click', '#btn-edit', function(){
            var id= $(this).closest('tr').find('td').eq(0).html();
            editData(id)
        });
        // END BUTTON EDIT

        // HAPUS DATA
        function hapusData(id){
            $.ajax({
                type: 'DELETE',
                url: "{{ url('esaku-trans/jurnal-stok') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.data.status){
                        dataTable.ajax.reload();                    
                        showNotification("top", "center", "success",'Hapus Data','Jurnal Stok ('+id+') berhasil dihapus ');
                        // $('#modal-preview-id').html('');
                        $('#table-delete tbody').html('');
                        if(typeof M == 'undefined'){
                            $('#modal-delete').modal('hide');
                        }else{
                            $('#modal-delete').bootstrapMD('hide');
                        }
                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        window.location.href = "{{ url('finest/sesi-habis') }}";
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

        $('#saku-datatable').on('click','#btn-preview',function(e){
            var id = $(this).closest('tr').find('td').eq(0).html();
            printPreview(id);
        });
        // END HAPUS DATA

        // BUTTON TAMBAH
        $('#saku-datatable').on('click', '#btn-tambah', function(){
            $('#row-id').hide();
            $('#method').val('post');
            $('#judul-form').html('Tambah Jurnal Stok');
            $('#btn-update').attr('id','btn-save');
            $('#btn-save').attr('type','submit');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $('#id').val('');
            $('#load-data').show();
            barangTable.clear();
            stokTable.clear();
            $('#saku-datatable').hide();
            $('#saku-form').show();
            $("#no_hold").parents('.input-group').removeClass('readonly');
            $("#kode_gudang").parents('.input-group').removeClass('readonly');
            $('.input-group-prepend').addClass('hidden');
            $('span[class^=info-name]').addClass('hidden');
            $('.info-icon-hapus').addClass('hidden');
            $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
            $stsSimpan = 1;
            var tanggal = $('#tanggal').val();
            generateNoBukti(tanggal);
            setHeightForm();
            $('#kode_form').val($form_aktif);
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

        // PREVIEW DATA
        $('#table-data tbody').on('click','td',function(e){
            if($(this).index() != 4){
                var id = $(this).closest('tr').find('td').eq(0).html();
                var data = dataTable.row(this).data();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/esaku-trans/jurnal-stok') }}/"+id,
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
                                    </div>
                                </div>
                            </div>
                            <div class='separator'></div>
                            <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                                <div style="padding:0 1.5rem">
                                    <table class="borderless table-header-prev mt-2" width="100%">
                                        <tr>
                                            <td width="14%">No Bukti</td>
                                            <td width="1%">:</td>
                                            <td width="20%">`+result.data[0].no_bukti+`</td>
                                        </tr>
                                        <tr>
                                            <td width="14%">Tanggal</td>
                                            <td width="1%">:</td>
                                            <td width="20%">`+result.data[0].tanggal+`</td>
                                        </tr>
                                        <tr>
                                            <td width="14%">Keterangan</td>
                                            <td width="1%">:</td>
                                            <td width="20%">`+result.data[0].keterangan+`</td>
                                        </tr>
                                        <tr>
                                            <td width="14%">Vendor</td>
                                            <td width="1%">:</td>
                                            <td width="20%">`+result.data[0].kode_vendor+` - `+result.data[0].nama_vendor+`</td>
                                        </tr>
                                        <tr>
                                            <td width="14%">Gudang</td>
                                            <td width="1%">:</td>
                                            <td width="20%">`+result.data[0].kode_gudang+` - `+result.data[0].nama_gudang+`</td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="padding:0 1.9rem">
                                    <ul class="nav nav-tabs col-12 " role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#prev-rak" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Rak</span></a> </li>
                                    </ul>
                                    <div class="tab-content tabcontent-border col-12 p-0">
                                        <div class="tab-pane active" id="prev-rak" role="tabpanel">
                                            <table class="table table-striped table-body-prev mt-2" width="100%">
                                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                                    <th style="width:20%">No Beli</th>
                                                    <th style="width:55%">Keterangan</th>
                                                    <th style="width:15%">Tanggal</th>
                                                    <th style="width:10%">Jumlah Item</th>
                                                </tr>`;
                                                var det = ''; var total =0;
                                                if(result.detail_trans.length > 0){
                                                    var no=1;
                                                    for(var i=0;i<result.detail_trans.length;i++){
                                                        var line =result.detail_trans[i];
                                                        total+=parseFloat(line.nilai);
                                                        det += "<tr>";
                                                        det += "<td >"+line.no_beli+"</td>";
                                                        det += "<td >"+line.keterangan+"</td>";
                                                        det += "<td >"+line.tanggal+"</td>";
                                                        det += "<td class='text-right'>"+number_format(line.jum_item)+"</td>";
                                                        det += "</tr>";
                                                        no++;
                                                    }
                                                }                                            
                                            html+=det+`
                                            </table>
                                        </div>
                                    </div>
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
                                $('.c-bottom-sheet').removeClass('active');
                                editData(id);
                            });

                            $('.preview-header #btn-edit2').css('display','inline-block');
                            $('.preview-header #btn-delete2').css('display','inline-block');
                            $('#trigger-bottom-sheet').trigger("click");
                        }
                        else if(!result.status && result.message == 'Unauthorized'){
                            window.location.href = "{{ url('finest/sesi-habis') }}";
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
                formData.set('total_persediaan', toNilai($('#total_persediaan').val()));
                formData.set('total_ppn', toNilai($('#total_ppn').val()));
                formData.set('total_diskon', toNilai($('#total_diskon').val()));

                // Show loading on save button
                $btnSave.prop('disabled', true);
                $btnSave.addClass('disabled');
                $btnSave.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');

                var exclude_keys = ['keterangan','tanggal','jum_item','detail','selected']; // kolom yang ingin dihapus
                var details = stokTable.getSelectedRows().map(row => {
                    return Object.fromEntries(
                        Object.entries(row)
                            .filter(([key]) => !exclude_keys.includes(key))
                    );
                });

                if(details.length == 0){
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Transaksi tidak valid',
                        text: 'Tidak ada Detail Transaksi yg dipilih'
                    });

                    Swal.hideLoading();
                    $btnSave.removeClass('disabled');
                    $btnSave.prop('disabled', false);
                    $btnSave.html(originalBtnHtml);
                    return;
                }

                // Append JSON string of detail
                formData.append('detail_trans', JSON.stringify(details));
                
                var param = $('#id').val();
                var id = $('#no_bukti').val();
                // $iconLoad.show();
                if(param == "edit"){
                    var url = "{{ url('/esaku-trans/jurnal-stok') }}/"+id;
                }else{
                    var url = "{{ url('/esaku-trans/jurnal-stok') }}";
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
                         // Restore button state
                        $btnSave.prop('disabled', false);
                        $btnSave.removeClass('disabled');
                        $btnSave.html(originalBtnHtml);

                        if(result.data.status){
                            dataTable.ajax.reload();
                            $stsSimpan = 1;
                            $('#load-data').show();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Jurnal Stok');
                            $('#id').val('');
                            barangTable.clear();
                            stokTable.clear();
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'warning',
                                title: 'Sukses',
                                text: result.data.message+'<br/> ID Transaksi: <b>'+result.data.no_bukti+'</b>'
                            });    
                            $("#saku-form").hide();
                            $("#saku-datatable").show();

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('finest/sesi-habis') }}";
                        }
                        else{
                            msgDialog({
                                id: '-',
                                type: 'warning',
                                title: 'Gagal',
                                text: result.data.message
                            });
                        }
                        Swal.hideLoading();
                    },
                    error: function(xhr, status, error) {
                         // Restore button state
                        $btnSave.prop('disabled', false);
                        $btnSave.removeClass('disabled');
                        $btnSave.html(originalBtnHtml);
                        Swal.hideLoading();

                        var error = JSON.parse(xhr.responseText);
                        var detail = Object.values(error.errors);
                        if(xhr.status == 422){
                            var keys = Object.keys(error.errors);
                            var tab =  $('#'+keys[0]).parents('.tab-pane').attr('id');
                            $('a[href="#'+tab+'"]').click();
                            $('#'+keys[0]).addClass('error');
                            $('#'+keys[0]).parent('.input-group').addClass('input-group-error');
                            $("label[for='"+keys[0]+"']").append("<br/>");
                            $("label[for='"+keys[0]+"']").append('<label id="'+keys[0]+'-error" class="error" for="'+keys[0]+'">'+detail[0]+'</label>');
                            $('#'+keys[0]).focus();
                        }
                        Swal.fire({
                            type: 'error',
                            title: error.message,
                            text: detail[0]
                        })
                    },
                    fail: function(xhr, textStatus, errorThrown){
                         // Restore button state
                        $btnSave.prop('disabled', false);
                        $btnSave.removeClass('disabled');
                        $btnSave.html(originalBtnHtml);
                        Swal.hideLoading();

                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Failed',
                            text: JSON.stringify(textStatus)
                        });
                        
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
        $('#tanggal,#no_bukti,#keterangan,#kode_vendor,#kode_gudang,#total').keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['tanggal','no_bukti','keterangan','kode_vendor','kode_gudang','total'];
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

        $('#form-tambah').on('click', '.search-item2', function(){
            var id = $(this).closest('div').find('input').attr('name');
            switch(id){
                case 'kode_vendor':
                    showInpFilterBSheet({
                        id : id,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('esaku-master/vendor') }}",
                        columns : [
                            { data: 'kode_vendor' },
                            { data: 'nama' }
                        ],
                        judul : "Daftar Vendor",
                        pilih : "vendor",
                        jTarget1 : "text",
                        jTarget2 : "text",
                        target1 : ".info-code_"+id,
                        target2 : ".info-name_"+id,
                        target3 : "",
                        target4 : "",
                        width : ["30%","70%"],
                        onItemSelected: function(data){
                            showInfoField('kode_vendor',data.kode_vendor,data.nama);
                        }
                    })
                break;
                
                case 'kode_gudang':
                    showInpFilterBSheet({
                        id : id,
                        header : ['Kode', 'Nama'],
                        url : "{{ url('esaku-master/gudang') }}",
                        columns : [
                            { data: 'kode_gudang' },
                            { data: 'nama' }
                        ],
                        judul : "Daftar Gudang",
                        pilih : "gudang",
                        jTarget1 : "text",
                        jTarget2 : "text",
                        target1 : ".info-code_"+id,
                        target2 : ".info-name_"+id,
                        target3 : "",
                        target4 : "",
                        width : ["30%","70%"],
                        onItemSelected: function(data){
                            showInfoField('kode_gudang',data.kode_gudang,data.nama);
                            resizeNameField('kode_gudang');
                            stokTable.clear();
                            barangTable.clear();
                        }
                    })
                break;

            }
        });

        $('#form-tambah').on('change', '#kode_vendor', function(){
            var par = $(this).val();
            getVendor(par);
        });

        $('#form-tambah').on('change', '#kode_gudang', function(){
            var par = $(this).val();
            getGudang(par);
        });

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });   


        // GRID 
        function hitungTotal(table, param = "change"){ 
            var tot=0;
            stokTable.getData().forEach(function(row, idx){
                tot+= toNilai(row.jumlah);
            });      
            $('#total').val(tot);
        }

        var stokTable = new EditableTablePlugin("#input-trans", {
            allowDelete: false,   
            enableSelect: true,
            inputs: {
                no_beli: {type: "text", readonly: true},
                keterangan: {type: "text", readonly: true},
                tanggal: {type: "text", readonly: true},
                jum_item: {type: "currency", readonly: true},
                detail: {type: "button", label: "Detail", className: "bg-primary px-3 py-1"}
            },
            data: [],
            onClick: function(idx, key){
                if(key == "detail"){
                    loadBarang(stokTable.getCell(idx, "no_beli"));
                }
            }
        });

        var barangTable = new EditableTablePlugin("#input-barang", {
            allowDelete: false,   
            inputs: {
                kode_barang: { type: "text", readonly: true },
                nama_barang: { type: "text", readonly: true },
                satuan: { type: "text", readonly: true },
                jumlah: { type: "currency", readonly: true }
            },
            data: []
        });
    </script>