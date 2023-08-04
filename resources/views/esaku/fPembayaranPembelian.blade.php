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
    #input-grid td:nth-child(2) { 
        overflow: unset !important;
    }
</style>

<!-- LIST DATA -->
<x-list-data judul="Data Pembayaran Pembelian" tambah="true" :thead="array('No Bukti','Tanggal','Kode Vendor', 'Nilai','Aksi')" :thwidth="array(15,15,15,15,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->

{{-- Form Input --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px">Pembayaran Pembelian</h6>
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
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;cursor:pointer"
                                        class="simple-icon-refresh" id="generate-nobukti">
                                    </i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="vendor">Vendor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_vendor" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-vendor" id="vendor" name="vendor" value="" title="">
                                        <span class="info-name_vendor hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_vendor"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                    <label for="no_dokumen">No. Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                
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
                                    
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_tagihan">Total Tagihan</label>
                                    <input class='form-control currency' type="text" id="total_tagihan" name="total_tagihan" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_pembayaran">Total Pembayaran</label>
                                    <input class='form-control currency' type="text" id="total_pembayaran" name="total_pembayaran" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pembelian</span></a> </li>
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
                                            <th style="width:10%">Status Bayar</th>
                                            <th style="width:20%">No. Beli</th>
                                            <th style="width:10%">Tanggal</th>
                                            <th style="width:15%">Saldo</th>
                                            {{-- <th style="width:5%"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                {{-- <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a> --}}
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
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var $iconLoad = $('.preloader');

    var tanggal = $('#tanggal').val();
    var scrollform = document.getElementById('form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $('.selectize').selectize();

    var action_html = "<a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/bayar-beli') }}", 
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
                'targets': [3],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, ''),
                "createdCell": function(td, cellData, rowData, row, col) {
                    $('#table-data thead th').removeClass('text-right');
                }
            },
            {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tgl'},
            { data: 'kode_vendor' },
            { data: 'nilai'}
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
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

    function getKode() {
        var tanggal = $('#tanggal').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/bayar-beli-nobukti') }}",
            data:{'tanggal':tanggal},
            dataType: 'json',
            success:function(response){
                $('#no_bukti').val('');
                if(response.result.status) {
                    $('#no_bukti').val(response.result.kode)
                }
            }
        });
    }

    $('#generate-nobukti').click(function(e){
        e.preventDefault();
        var tanggal = $('#tanggal').val();
        if(tanggal == ""){
            alert('Tanggal wajib diisi');
            return false;
        }
        getKode();
    });

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

    function hitungTotal(){
        var total_tagihan = 0;
        var total_pembayaran = 0;
        $('.row-grid').each(function(){
            var nilai = $(this).closest('tr').find('.inp-saldo').val();
            var status_bayar = $(this).closest('tr').find(".td-statusbayar").text();
            if(status_bayar == 'BAYAR'){
                total_pembayaran += +toNilai(nilai);
            }
            total_tagihan += +toNilai(nilai);
        });
        $('#total_tagihan').val(total_tagihan);
        $('#total_pembayaran').val(total_pembayaran);
    }

    function getPembelianDetail(kode_vendor, periode){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/bayar-beli-detail') }}",
            dataType: 'json',
            data:{ 'kode_vendor':kode_vendor, 'periode':periode},
            async:false,
            success:function(res){
                console.log(res);
                var result= res.result;
                console.log(result);
                if(result.status){
                    if(result.data.length > 0){
                        var input = '';
                        var no=1;
                        var tgl = '';
                        for(var i=0;i<result.data.length;i++){
                            var line =result.data[i];
                            tgl = reverseDate2(line.tanggal,'-','/');
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'>"+no+"</td>";
                            input += "<td><span class='td-statusbayar tdstatusbayarke"+no+" tooltip-span'>"+line.status_bayar+"</span><select hidden name='status_bayar[]' class='form-control inp-statusbayar statusbayarke"+no+"' value='"+line.status_bayar+"' ><option value='OPEN'>OPEN</option><option value='BAYAR'>BAYAR</option></select></td>";
                            input += "<td><span class='td-nobeli tdnobelike"+no+" tooltip-span'>"+line.no_beli+"</span><input type='text' name='no_beli[]' class='form-control inp-nobeli nobelike"+no+" hidden'  value='"+line.no_beli+"' readonly></td>";
                            input += "<td><span class='td-tgl tdtglke"+no+" tooltip-span'>"+tgl+"</span><input type='text' name='tgl[]' class='form-control inp-tgl tglke"+no+" hidden'  value='"+tgl+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-saldo tdsaldoke"+no+" tooltip-span'>"+format_number(line.saldo)+"</span><input type='text' name='saldo[]' class='form-control inp-saldo saldoke"+no+" hidden'  value='"+parseInt(line.saldo)+"' required></td>";
                            // input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
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
                        for(var i=0;i<result.data.length;i++){
                            var line =result.data[i];
                            $('.statusbayarke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    // $('.tdstatusbayarke'+no).text(value);
                                    var keyClass = $(this)[0].$input[0].className;
                                    var tmp = keyClass.split(" ");
                                    $('select[class="'+keyClass+'"]').closest('tr').find('td:eq(1) .td-statusbayar').text(value)
                                    hitungTotal();
                                }
                            });
                            $('.statusbayarke'+no)[0].selectize.setValue(line.status_bayar);
                            $('.selectize-control.statusbayarke'+no).addClass('hidden');
                            $('.saldoke'+no).inputmask("numeric", {
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

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var status_bayar = $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-statusbayar").text();
                var no_beli = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nobeli").val();
                var tgl = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl").val();
                var saldo = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-statusbayar")[0].selectize.setValue(status_bayar);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-statusbayar").text(status_bayar);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nobeli").val(no_beli);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nobeli").text(no_beli);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl").val(tgl);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tgl").text(tgl);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-statusbayar").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nobeli").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nobeli").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tgl").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
            }
        })
    }

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
        hitungTotal();
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        console.log(idx);
        if(idx == 0 || idx == 2 || idx == 3 || idx == 4){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var no_beli = $(this).parents("tr").find(".inp-kode").val();
                var saldo = $(this).parents("tr").find(".inp-saldo").val();
                var status_bayar = $(this).parents("tr").find(".td-status_bayar").text();
                var no = $(this).parents("tr").find(".no-grid").text();

                $(this).parents("tr").find(".inp-statusbayar")[0].selectize.setValue(status_bayar);
                $(this).parents("tr").find(".td-statusbayar").text(status_bayar);
                if(idx == 1){
                    $('.statusbayarke'+no)[0].selectize.setValue(status_bayar);
                    var status_bayarx = $('.tdstatusbayarke'+no).text();
                    if(status_bayarx == ""){
                        $('.tdstatusbayarke'+no).text('OPEN');  
                    }
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-statusbayar").hide();
                    $(this).parents("tr").find(".inp-statusbayar")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-statusbayar").show();
                }
    
            }
        }
    });

    $('#input-grid').on('keydown','.inp-statusbayar',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-statusbayar'];
        var nxt2 = ['.inp-statusbayar'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            var stok = $(this).closest('td').prev().find('.inp-stok').val();
            switch (idx) {
                case 0:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'OPEN' || isi == 'BAYAR'){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        if ($(this).closest('tr').find(nxt[idx_next]).val() == ""){
                            var index = $(this).closest('tr').index();
                            if(index == 0){
                                $(this).closest('tr').find(nxt[idx_next]).val($('#deskripsi').val());
                            }else{
                                var deskripsi = $("#input-grid tbody tr:eq("+(index - 1)+")").find('.inp-ket').val();
                                $(this).closest('tr').find(nxt[idx_next]).val(deskripsi);
                            }
                        }

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                    }else{
                        alert('Status Bayar yang dimasukkan tidak valid');
                        return false;
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

    $('#input-grid').on('keypress', '.inp-statusbayar', function(e){
        var this_index = $(this).closest('tbody tr').index();
        console.log(this_index);
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-statusbayar')[0].selectize.getValue() != undefined){
                $(this)[0].selectize.setValue($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-statusbayar')[0].selectize.getValue());
            }else{
                $(this)[0].selectize.setValue('');
            }
        }
    });

    $('#tanggal').change(function(){
        tanggal = $(this).val();
        getKode();
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#id').val('');
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Pembayaran Pembelian');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        resetForm();
        getKode();
    });

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/bayar-beli') }}",
            dataType: 'json',
            data: {'no_bukti':id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Pembayaran Pembelian ('+id+') berhasil dihapus ');
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
        console.log(pos);
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'vendor':
                var options = {
                    id : id,
                    header : ['Kode Vendor', 'Nama Vendor'],
                    url : "{{ url('esaku-trans/bayar-beli-vendor') }}",
                    columns : [
                        { data: 'kode_vendor' },
                        { data: 'nama_vendor' }
                    ],
                    judul : "Daftar Vendor",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data) {
                        // loadVendor(data.kode_vendor);
                        showInfoField('vendor', data.kode_vendor, data.nama_vendor);
                        
                        var kode_vendor = data.kode_vendor;
                        var tgl = reverseDate2(tanggal,'/','-')
                        var periode = tgl.substr(0,4)+tgl.substr(5,2)
                        getPembelianDetail(kode_vendor, periode)
                    }
                }
            break;
        }
        showInpFilter(options);
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
                var url = "{{ url('/esaku-trans/bayar-beli-update') }}";
            }else{
                var url = "{{ url('/esaku-trans/bayar-beli') }}";
            }

            if(count <= 1){
                alert('Transaksi tidak valid. Detail Pembelian tidak boleh kosong ');
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
                            $('#judul-form').html('Tambah Data Pembayaran Pembelian');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            resetForm();
                            getKode();
                            
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

</script>