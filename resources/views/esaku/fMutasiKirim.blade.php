<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form-trans.css') }}" />
<style>
    th {
        vertical-align:middle !important;
    }
    #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label {
        border:1px solid black !important;
        border-radius:0 !important;
    }
    #input-grid .selectize-input {
        border-radius:0 !important;
    }
    .modal-header .close {
        padding: 1rem;
        margin: -1rem 0 -1rem auto;
    }
    .hapus-item{
        cursor:pointer;
    } 
    .selected{
        cursor:pointer;
    }
    #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover {
        background:#f8f8f8;
        color:black;
    }
    #input-grid input:hover,#input-grid .selectize-input:hover {
        width:inherit;
    }
    #input-grid ul.typeahead.dropdown-menu {
        width:max-content !important;
    }
    #input-grid td {
        overflow:hidden !important;
        height:37.2px !important;
        padding:0px !important;
    }
    #input-grid span {
        padding:0px 10px !important;
    }
    #input-grid input,#input-grid .selectize-input {
        overflow:hidden !important;
        height:35px !important;
    }
    #input-grid td:nth-child(4) {
        overflow:unset !important;
    }
</style>
<!-- LIST DATA -->
<x-list-data judul="Data Mutasi Kirim" tambah="true" :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Aksi')" :thwidth="array(15,15,15,30,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->
{{-- Form Input --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px">Mutasi Kirim Barang</h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div id="form-body" class="card-body pt-3 form-body"> 
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row" id="row-id" hidden>
                        <div class="col-9">
                            <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            <input class="form-control" type="text" id="id_edit" name="id_edit" readonly >
                            <input class="form-control" type="text" id="bukti_kirim" name="bukti_kirim" readonly hidden>
                            <input type='text' name="total_trans" class='form-control currency' id='totrans' required hidden>                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No. Bukti</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="no_dokumen">No. Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="asal">Gudang Asal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_asal" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-asal" id="asal" name="asal" value="" title="">
                                        <span class="info-name_asal hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_asal"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tujuan">Gudang Tujuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_tujuan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-tujuan" id="tujuan" name="tujuan" value="" title="">
                                        <span class="info-name_tujuan hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_tujuan"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-jurnal" role="tabpanel">
                            <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode</th>
                                            <th style="width:25%">Nama</th>
                                            <th style="width:10%">Satuan</th>
                                            <th style="width:10%">Stok</th>
                                            <th style="width:10%">Harga Hpp</th>
                                            <th style="width:10%">Jumlah</th>
                                            <th style="width:10%">Total</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
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

@include('modal_search')
@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    var $iconLoad = $('.preloader');
    var action = "tambah";
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtBarang = [];
    var $dtgudangAsal = [];
    var $dtgudangTujuan = [];

    var jenis = "KRM";
    var bukti_kirim = "-";
    var tanggal = $('#tanggal').val();
    var scrollform = document.getElementById('form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    getDataTypeAhead("{{ url('esaku-report/filter-gudang') }}","gudangAsal","kode_gudang");
    getDataTypeAhead("{{ url('esaku-report/filter-gudang') }}","gudangTujuan","kode_gudang");
    getDataTypeAhead("{{ url('esaku-trans/filter-barang-mutasi') }}","Barang","kode_barang");

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/mutasi-kirim') }}", 
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
            { data: 'no_bukti' },
            { data: 'tgl'},
            { data: 'no_dokumen' },
            { data: 'keterangan' }
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

    function resetForm() {
        $("[id^=label]").each(function(e){
            $(this).text('');
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

    function getKode(tanggal, jenis, action) {
        if(action === "tambah") {
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-trans/generate-mutasi') }}",
                data:{'tanggal':tanggal, 'jenis':jenis},
                dataType: 'json',
                success:function(response){
                    if(response.result.status) {
                        $('#no_bukti').val(response.result.kode)
                    }
                }
            });
        } else {
            return;
        }
    }

    function generateHpp(tanggal, kode_gudang) {
        var periode = $('#tanggal').val().substr(6,4)+""+$('#tanggal').val().substr(3,2);
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/generate-hpp-mutasi') }}",
            data:{'periode':periode, 'kode_gudang':kode_gudang},
            dataType: 'json',
            success:function(response){
                if(response.result.status) {
                    console.log('Berhasil Generate Hpp');
                }
            }
        });
    }

    function getDataTypeAhead(url,param,kode){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function format_number(x) {
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

    function addRow() {
        var no=$('#input-grid .row-grid:last').index();
        var kode_barang = "";
        var nama = "";
        var satuan = "";
        var stok = 0;
        var jumlah = 0;
        var harga_hpp = 0;
        var total = 0;
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'>"+kode_barang+"</span><input type='text' name='kode_barang[]' class='form-control inp-kode barangke"+no+" hidden' value='"+kode_barang+"' required='' style='z-index: 1;position: relative;' id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'>"+nama+"</span><input type='text' name='nama_barang[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='"+nama+"' readonly></td>";
        input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+satuan+"' readonly></td>";
        input += "<td class='text-right'><span class='td-stok tdstokke"+no+" tooltip-span'>"+stok+"</span><input type='text' name='stok[]' class='form-control inp-stok stokke"+no+" hidden'  value='"+stok+"' readonly></td>";
        input += "<td class='text-right'><span class='td-hpp tdhppke"+no+" tooltip-span'>"+harga_hpp+"</span><input type='text' name='hpp[]' class='form-control inp-hpp hppke"+no+" hidden'  value='"+harga_hpp+"' readonly></td>";
        input += "<td class='text-right'><span class='td-jumlah tdjumlahke"+no+" tooltip-span'>"+jumlah+"</span><input type='text' name='jumlah[]' class='form-control inp-jumlah jumlahke"+no+" hidden'  value='"+jumlah+"' required></td>";
        input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'>"+total+"</span><input type='text' name='total[]' class='form-control inp-total totalke"+no+" hidden'  value='"+total+"' readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);
        $('.row-grid:last').addClass('selected-row');
        $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');

        $('.jumlahke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true
        });
        $('.hppke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true
        });
        $('.totalke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true
        });
        
        hideUnselectedRow();
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-kode").show();
        $('#input-grid tbody tr:last').find(".td-kode").hide();
        $('#input-grid tbody tr:last').find(".search-barang").show();
        $('#input-grid tbody tr:last').find(".inp-kode").focus();

        $('#barangkode'+no).typeahead({
            source:$dtBarang,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
    }

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_barang = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_barang = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var satuan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val();
                var stok = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-stok").val();
                var hpp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-hpp").val();
                var jumlah = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jumlah").val();
                var total = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_barang);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_barang);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_barang);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_barang);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val(satuan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").text(satuan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-stok").val(stok);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-stok").text(stok);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-hpp").val(hpp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-hpp").text(hpp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jumlah").val(jumlah);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jumlah").text(jumlah);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val(total);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").text(total);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-barang").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jumlah").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jumlah").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-stok").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-stok").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-hpp").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-hpp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").hide();
            }
        })
    }

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

    function custTarget(target,tr){
        var kode_barang = $(target).parents("tr").find(".inp-kode").val();
        var kode_gudang = $('#asal').val();
        var periode = $('#tanggal').val().substr(6,4)+""+$('#tanggal').val().substr(3,2);
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/barang-mutasi-detail') }}",
            data:{'kode_barang':kode_barang, 'kode_gudang':kode_gudang, 'periode':periode},
            dataType: 'json',
            success:function(response){
                var result = response.result.data[0];
                var total = 0;

                if(response.status) {
                    $(target).parents("tr").find(".inp-kode").hide(); 
                    $(target).parents("tr").find(".td-kode").text(kode_barang); 
                    $(target).parents("tr").find(".td-kode").show(); 
                    $(target).parents("tr").find(".search-barang").hide(); 
                    $(target).parents("tr").find(".inp-satuan").val(result.sat_kecil); 
                    $(target).parents("tr").find(".td-satuan").text(result.sat_kecil);
                    $(target).parents("tr").find(".inp-stok").val(format_number(result.stok)); 
                    $(target).parents("tr").find(".td-stok").text(format_number(result.stok));
                    $(target).parents("tr").find(".inp-hpp").val(format_number(result.harga_hpp)); 
                    $(target).parents("tr").find(".td-hpp").text(format_number(result.harga_hpp));
                    $(target).parents("tr").find(".inp-jumlah").show();
                    $(target).parents("tr").find(".td-jumlah").hide();    
                    $(target).parents("tr").find(".inp-total").val(format_number(total)); 
                    $(target).parents("tr").find(".td-total").text(format_number(total));
                    setTimeout(function() {  $(target).parents("tr").find(".inp-jumlah").focus(); }, 100);    
                }
            }
        });
    }

    function getBarang(id,target1,target2,target3,target4,target5,target6,target7,jenis) { 
        var kode_gudang = $('#asal').val();
        var tmp = id.split(" - ");
        var periode = $('#tanggal').val().substr(6,4)+""+$('#tanggal').val().substr(3,2);
        kode = tmp[0];
        
        if(kode_gudang == '') {
            alert('Harap pilih gudang asal dahulu')
            $('.'+target1).val('');
            $('.'+target1).hide();
            $('.td'+target1).show(kode);
            $('.'+target1).closest('tr').find('.search-barang').hide();
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#asal').focus();
            return;
        }

        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/barang-mutasi-detail') }}",
            data:{'kode_barang':kode, 'kode_gudang':kode_gudang, 'periode':periode},
            dataType: 'json',
            success:function(response){
                var result = response.result.data[0];
                var total = 0;
                var hpp = result.harga_hpp;
                var jumlah = $('.'+target6).val();
                total = hpp+jumlah;
                if(response.status) {
                    if(jenis == 'change'){
                        $('.'+target1).val(kode);
                        $('.td'+target1).text(kode);

                        $('.'+target2).val(result.nama);
                        $('.td'+target2).text(result.nama);
                        
                        $('.'+target3).val(result.sat_kecil);
                        $('.td'+target3).text(result.sat_kecil);

                        $('.'+target4).val(format_number(result.stok));
                        $('.td'+target4).text(format_number(result.stok));

                        $('.'+target5).val(format_number(result.harga_hpp));
                        $('.td'+target5).text(format_number(result.harga_hpp));

                        $('.'+target6).show();
                        $('.td'+target6).hide();
                        $('.'+target6).focus();

                        $('.'+target7).val(format_number(result.harga_hpp));
                        $('.td'+target7).text(format_number(result.harga_hpp));
                    } else {
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                        $('.'+target1).closest('tr').find('.search-barang').hide();
                        $('.'+target1).val(id);
                        $('.td'+target1).text(id);
                        $('.'+target1).hide();
                        $('.td'+target1).show();

                        $('.'+target2).val(result.nama);
                        $('.td'+target2).text(result.nama);
                        
                        $('.'+target3).val(result.sat_kecil);
                        $('.td'+target3).text(result.sat_kecil);

                        $('.'+target4).val(format_number(result.stok));
                        $('.td'+target4).text(format_number(result.stok));

                        $('.'+target5).val(format_number(result.harga_hpp));
                        $('.td'+target5).text(format_number(result.harga_hpp));

                        $('.'+target6).show();
                        $('.td'+target6).hide();
                        $('.'+target6).focus();

                        $('.'+target7).val(format_number(result.harga_hpp));
                        $('.td'+target7).text(format_number(result.harga_hpp));
                    }
                }
            }
        })
    }

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/mutasi-detail') }}",
            dataType: 'json',
            data:{ 'no_bukti':id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#id').val(id);
                    $('#method').val('put');
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#asal').val(result.data[0].param1);
                    $('#tujuan').val(result.data[0].param2);
                    $('#no_bukti').val(result.data[0].no_bukti);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        var total = 0;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            total = parseFloat(line.harga_hpp)*parseFloat(line.jumlah);
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'>"+no+"</td>";
                            input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'>"+line.kode_barang+"</span><input type='text' name='kode_barang[]' class='form-control inp-kode barangke"+no+" hidden' value='"+line.kode_barang+"' required='' style='z-index: 1;position: relative;' id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_barang[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+line.satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+line.satuan+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-stok tdstokke"+no+" tooltip-span'>"+line.stok+"</span><input type='text' name='stok[]' class='form-control inp-stok stokke"+no+" hidden'  value='"+line.stok+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-hpp tdhppke"+no+" tooltip-span'>"+parseFloat(line.harga_hpp)+"</span><input type='text' name='hpp[]' class='form-control inp-hpp hppke"+no+" hidden'  value='"+parseFloat(line.harga_hpp)+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-jumlah tdjumlahke"+no+" tooltip-span'>"+format_number(line.jumlah)+"</span><input type='text' name='jumlah[]' class='form-control inp-jumlah jumlahke"+no+" hidden'  value='"+parseInt(line.jumlah)+"' required></td>";
                            input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'>"+total+"</span><input type='text' name='total[]' class='form-control inp-total totalke"+no+" hidden'  value='"+total+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            $('#barangkode'+no).typeahead({
                                source:$dtBarang,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.jumlahke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.hppke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.totalke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        
                    }
                    hitungTotalRow();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
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
            url: "{{ url('esaku-trans/mutasi-barang') }}",
            dataType: 'json',
            data: {'no_bukti':id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Mutasi ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
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

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('#asal').typeahead({
        source:$dtgudangAsal,
        fitToElement:true,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            console.log(item.id);
        }
    });
    $('#tujuan').typeahead({
        source:$dtgudangTujuan,
        fitToElement:true,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            console.log(item.id);
        }
    });

    $('#tanggal').change(function(){
        tanggal = $(this).val();
        getKode(tanggal, jenis, action);
    })

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        action = "tambah";
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#id').val('');
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Mutasi Barang');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#bukti_kirim').val(bukti_kirim);
        resetForm();
        addRow();
        getKode(tanggal, jenis, action);
    });

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0 || idx == 2 || idx == 3 || idx == 4 || idx == 5 || idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_barang = $(this).parents("tr").find(".inp-kode").val();
                var jumlah = $(this).parents("tr").find(".inp-jumlah").val();
                var hpp = $(this).parents("tr").find(".inp-hpp").val();
                var no = $(this).parents("tr").find(".no-grid").text();

                $(this).parents("tr").find(".inp-kode").val(kode_barang);
                $(this).parents("tr").find(".td-kode").text(kode_barang);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-barang").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-barang").hide();   
                }
        
                $(this).parents("tr").find(".inp-jumlah").val(jumlah);
                $(this).parents("tr").find(".td-jumlah").text(jumlah);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-jumlah").show();
                    $(this).parents("tr").find(".td-jumlah").hide();
                    $(this).parents("tr").find(".inp-jumlah").focus();
                }else{
                    $(this).parents("tr").find(".inp-jumlah").hide();
                    $(this).parents("tr").find(".td-jumlah").show();
                }
            }
        }
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'asal':
                var options = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('esaku-report/filter-gudang') }}",
                    columns : [
                        { data: 'kode_gudang' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Gudang",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data){
                        showInfoField('asal',data.kode_gudang,data.nama);

                        var tanggal = $('#tanggal').val();
                        generateHpp(tanggal,data.kode_gudang);

                    }
                }
            break;
            case 'tujuan':
                var options = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('esaku-report/filter-gudang') }}",
                    columns : [
                        { data: 'kode_gudang' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Gudang",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                }
            break;
        }
        showInpFilter(options);
    });

    $('#form-tambah').on('click', '.add-row', function(){
        addRow();
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

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var gudang = $('#asal').val();
        if(gudang == '') {
            alert('Harap pilih gudang asal dahulu')
            return;
        }
        switch(par){
            case 'kode_barang[]': 
                var par2 = "nama_barang[]";
                
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        switch(par){
            case 'kode_barang[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/filter-barang-mutasi') }}",
                    columns : [
                        { data: 'kode_barang' },
                        { data: 'nama' }
                    ],
                    parameter: {kode_gudang: gudang},
                    judul : "Daftar Barang",
                    pilih : "barang",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "custom",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);
    });

    $('#input-grid').on('keydown','.inp-kode, .inp-jumlah',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-jumlah'];
        var nxt2 = ['.inp-kode','.inp-jumlah'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            var stok = $(this).closest('td').prev().prev().find('.inp-stok').val();
            console.log(idx);
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-grid").text();
                    var kode = $(this).val();
                    var target1 = "barangke"+noidx;
                    var target2 = "nmbarangke"+noidx;
                    var target3 = "satuanke"+noidx;
                    var target4 = "stokke"+noidx;
                    var target5 = "hppke"+noidx;
                    var target6 = "jumlahke"+noidx;
                    var target7 = "totalke"+noidx;
                    getBarang(kode,target1,target2,target3,target4,target5,'tab');
                break;
                case 5:
                    stok = toNilai(stok);
                    isi = toNilai(isi);
                    if(isi === 0 || isi > stok || isNaN(isi)) {
                        alert('Jumlah yang dimasukkan tidak valid (0) atau melebihi stok yang ada')
                    } else {
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        hitungTotal();
                        
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                    }
                break;
                default:
                break;   
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).parents('tr').find('.no-grid').html();
        var target1 = "barangke"+noidx;
        var target2 = "nmbarangke"+noidx;
        var target3 = "satuanke"+noidx;
        var target4 = "stokke"+noidx;
        var target5 = "hppke"+noidx;
        var target6 = "jumlahke"+noidx;
        var target7 = "totalke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getBarang(kode,target1,target2,target3,target4,target5,target6,target7,'change');
        }else{
            alert('Barang yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var count = $('#input-grid tr').length;

            var param = $('#id_edit').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/esaku-trans/mutasi-barang-update') }}";
            }else{
                var url = "{{ url('/esaku-trans/mutasi-barang') }}";
            }

            if(count <= 1){
                alert('Transaksi tidak valid. Detail Mutasi Barang tidak boleh kosong ');
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
                            $('#judul-form').html('Tambah Data Mutasi');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                                

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        action = "update";
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Mutasi Barang');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#input-grid').on('change', '.inp-jumlah', function(e){
        hitungTotal(); 
    })

    function hitungTotal(){
        var total = 0;
        var total_trans = 0;
        $('.row-grid').each(function(){
            var hpp = $(this).closest('tr').find('.inp-hpp').val();
            var jumlah = $(this).closest('tr').find('.inp-jumlah').val();

            hpp = removeFormat(hpp);
            jumlah = removeFormat(jumlah);

            total = hpp * jumlah;
            
            total_trans += +total;

            $(this).closest('tr').find('.inp-total').val(number_format(total));
            $(this).closest('tr').find('.td-total').text(number_format(total));
            
        }); 
        $('#totrans').val(number_format(total_trans));
    }

</script>