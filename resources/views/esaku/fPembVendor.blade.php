<link rel="stylesheet" href="{{ asset('trans.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<style>
     #tanggal-dp .datepicker-dropdown
    {
        left: 20px !important;
        top: 190px !important;
    }
    #rekening-grid tbody td, #pb-grid tbody td, #jurnal-grid tbody td
    {
        overflow:hidden;
    }
    #jurnal-grid td:nth-child(5)
    {
        overflow:unset !important;
    }
    #pb-grid td:nth-child(1)
    {
        overflow:unset !important;
    }
    table.dataTable{
        border-collapse:collapse;
    }
    
    .dataTables_scrollBody #pb-grid th, .dataTables_scrollBody #rekening-grid th, .dataTables_scrollBody #prev-pb-grid th
    {
        padding-top:0px !important; 
        padding-bottom:0px !important;
    }
    .dataTables_scrollHeadInner th {
        padding: 4px !important;
        border-bottom: 0px !important;
        vertical-align:middle;
        text-align:center;
    }
    .inp-status{    
        padding-right: 0px !important;
        text-align: center;
    }
</style>

<!-- LIST DATA -->
<x-list-data judul="Data Pembayaran Vendor" tambah="" :thead="array('No Beli','Tanggal','No Dokumen','Vendor','kode_vendor','Nilai Hutang','Saldo','Aksi')" :thwidth="array(15,20,20,25,0,15,15,10)" :thclass="array('','','','','','','','','text-center')" />
<!-- END LIST DATA -->

{{-- form data --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display: none">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;" >
                    <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="submit" id="btn-save" class="btn btn-primary mr-4 float-right">Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="kode_form" name="kode_form">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                           <div class="row">
                               <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <span id="tanggal-dp"></span>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                               <div class="col-md-4 col-sm-12">
                                   <label for="no_bukti">No Bukti</label>
                                   <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                   <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;cursor:pointer" class="simple-icon-refresh" id="generate-nobukti"></i>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="vendor">Vendor</label>
                                    <input class="form-control" id="vendor" name="vendor" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12" hidden>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="kode_vendor">Kode Vendor</label>
                                    <input class="form-control" id="kode_vendor" name="kode_vendor" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="no_hutang">No Beli</label>
                                    <input class="form-control" id="no_hutang" name="no_hutang"readonly >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row">
                            <div class="col-sm-12">
                                    <label for="saldo" >Saldo</label>
                                    <input class="form-control currency" type="text" placeholder="saldo Kasbank" readonly id="saldo" name="saldo" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row">
                            <div class="col-sm-12">
                                    <label for="ni_hutang" >Nilai Bayar</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kasbank"  id="ni_hutang" name="ni_hutang" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- end form data --}}
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var valid = true;
    var $status_simpan = 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
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


    function resetForm() {
        $('#pemberi-grid tbody').empty()
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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function removeInfoField(par){
        $('#'+par).val('');
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $('#search_'+par).siblings('i').addClass('hidden');
    }

    function resizeNameField(kode){
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        // $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
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
        // $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }


    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='btn btn-primary mr-4 float-right' style='font-size:13px'>Bayar</i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/pembayaran-vendor') }}",
        [
            {'targets': 7, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }

        ],
        [
            { data: 'no_hutang' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'vendor' },
            { data: 'kode_vendor' },
            {data: 'ni_hutang',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 0, '')},
            {data: 'saldo',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 0, '')}

        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [[1 ,"desc"]]
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

    
    // HITUNG TOTAL ROW SPB
    function hitungTotalRowSpb(){
        var total_row = $('#pb-grid tbody tr').length;
        $('#total-row-pb').html(total_row+' Baris');
    }

    

    
    function hideUnselectedRowPb(){
        $('#pb-grid > tbody >tr').each(function(index,row){
            if(!$(row).hasClass('selected-row')) {
                var status = $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val();

                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val(status);
                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".td-status").text(status);

                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").hide();
                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".td-status").show();
            }
        });
    }

    $('#pb-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#pb-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowPb();
    });

    $('#pb-grid tbody').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#pb-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var status = $(this).parents("tr").find(".inp-status").val();

                $(this).parents("tr").find(".inp-status").val(status);
                $(this).parents("tr").find(".td-status").text(status);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-status").show();
                    $(this).parents("tr").find(".td-status").hide();
                    $(this).parents("tr").find(".inp-status").focus();
                }else{
                    $(this).parents("tr").find(".inp-status").hide();
                    $(this).parents("tr").find(".td-status").show();
                }
            }
        }
    });
    // END LOAD DAFTAR PB


    // // Event Button Tambah Data
    // $('#saku-datatable').on('click', '#btn-tambah', function() {
    //     resetForm()
    //     $('#row-id').hide();
    //     $('#method').val('post');
    //     $('#judul-form').html('Tambah Pembayaran SPB');
    //     $('#btn-update').attr('id','btn-save');
    //     $('#btn-save').attr('type','submit');
    //     $('#form-tambah')[0].reset();
    //     $('#form-tambah').validate().resetForm();
    //     $('#id').val('');
    //     $('#id_edit').val('');
    //     $('#kode_form').val($form_aktif);
    //     $status_simpan = 1;
    //     $('#saku-datatable').hide();
    //     $('#saku-form').show();
    //     $('.input-group-prepend').addClass('hidden');
    //     $('span[class^=info-name]').addClass('hidden');
    //     $('.info-icon-hapus').addClass('hidden');
    //     $('[class*=inp-label-]').val('')
    //     $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    //     setHeightForm();
    //     generateBukti();
    //     getDaftarPb();
    // });

    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    // event klik rekeing pada tabel daftar pb
    $('#pb-grid').on('click','.aksi-rekening', function(){
        var parent = $(this).closest("tr");
        var id = parent.find('.td-pb').html();
        var status = parent.find('.td-status').html();
        if(status == 'BAYAR'){
            loadRekening(id);
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Error',
                text: "Hanya SPB  Berstatus BAYAR yang dapat diload!"
            });
        }

    });


    // GENERATE NO BUKTI
    function generateBukti(){
        var date = $('#tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        var url = "{{url('esaku-trans/pembayaran-nobukti')}}";
        $.ajax({
            type: 'GET',
            url : url,
            data: {
                tanggal : date2
            },
            dataType: 'JSON',
            async: false,
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

    function generateNoBukti() {
        var date = $('#tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/pembayaran-nobukti') }}",
            dataType: 'json',
            async: false,
            data: {
                tanggal: date2
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

    $('#form-tambah').on('change','#tanggal', function(e){
        generateBukti();
    });

    $('#form-tambah').on('change','#kas_bank', function(e){
        var par = $('#kas_bank').val();
        getAkunKasBank(par);
    });

    $('#generate-nobukti').click(function(e){
        e.preventDefault();
        var tanggal = $('#tanggal').val();
        if(tanggal == ""){
            alert('Tanggal wajib diisi');
            return false;
        }
        generateBukti();
    });
    // END GENERATE NO BUKTI



    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form,event) {
            event.preventDefault();
            console.log('submit')
            var parameter = $('#id_edit').val();
            var id = $('#no_bukti').val();

            if(parameter == "edit"){
                var url = "{{ url('esaku-trans/pembayaran-simpan') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }else{
                var url = "{{ url('esaku-trans/pembayaran-simpan') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);

            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }

            if(toNilai($('#ni_hutang').val()) > toNilai($('#saldo').val())){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: 'Nilai Bayar tidak boleh 0 atau kurang'
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
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Pembayaran Vendor');
                            $('#method').val('post');
                            resetForm();
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                            last_add("no_pdrk",result.data.no_bukti);
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('/bdh-auth/sesi-habis') }}";
                        }else{
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
                
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 7){
            var id = $(this).closest('tr').find('td').eq(0).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/bdh-trans/bayar-nota-trans-detail') }}",
                dataType: 'json',
                data: {no_bukti: id},
                async:false,
                success:function(result){
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
                            <div style="padding:0">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+id+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].tanggal+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Akun Kasbank</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].akun_kb+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Dokumen</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_dokumen+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Deskripsi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].keterangan+`</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0">
                                <table class="table table-striped table-body-prev mt-2" width="100%">
                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                    <th style="width:3%" class="text-center">No</th>
                                    <th style="width:10%" class="text-center">Status</th>
                                    <th style="width:15%">No SPB</th>
                                    <th style="width:10%">Bank Transfer</th>
                                    <th style="width:15%">No PB</th>
                                    <th style="width:10%">Tanggal</th>
                                    <th style="width:40%">Deskripsi</th>
                                    <th style="width:15%">Nilai SPB</th>
                                    <th style="width:10%">Modul</th>
                                </tr>`;
                                    var det = '';
                                    var total =0;
                                    if(result.data.length > 0){
                                        var no=1;
                                        for(var i=0;i<result.data.length;i++){
                                            var line =result.data[i];
                                            total+=parseFloat(line.nilai);
                                            det += "<tr>";
                                            det += "<td >"+no+"</td>";
                                            det += "<td >"+line.status+"</td>";
                                            det += "<td >"+line.no_spb+"</td>";
                                            det += "<td >"+line.bank_trans+"</td>";
                                            det += "<td >"+line.no_pb+"</td>";
                                            det += "<td >"+line.tgl+"</td>";
                                            det += "<td >"+line.keterangan+"</td>";
                                            det += "<td class='text-right'>"+number_format(line.nilai)+"</td>";
                                            det += "<td >"+line.modul+"</td>";
                                            det += "</tr>";
                                            no++;
                                        }
                                    }
                                    det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th colspan="7"></th>
                                        <th style="width:10%" class="text-right">`+number_format(total)+`</th>
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
                            $('#judul-form').html('Edit Data Jurnal');
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

    $('a[href="#data-rekening"]').on('shown.bs.tab', function (e) {
        rekgrid.columns.adjust().draw();
    })

     // ENTER FIELD FORM
     $('#kas_bank,#tanggal,#no_bukti,#no_dokumen,#deskripsi,#total').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kas_bank','tanggal','no_bukti','no_dokumen','deskripsi','total'];
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

    // EDIT DATA
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/pembayaran-bayar') }}/",
            dataType: 'json',
            data:{no_hutang: id},
            async:false,
            success:function(result){
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#no_hutang').val(result.data[0].no_hutang);
                    $('#no_bukti').val(result.data[0].no_bukti);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#vendor').val(result.data[0].vendor);
                    $('#kode_vendor').val(result.data[0].kode_vendor);
                    $('#ni_hutang').val(result.data[0].ni_hutang);
                    $('#saldo').val(result.data[0].saldo);
                    $('#kode_form').val($form_aktif);
                    var html = "";
                    var no = 1;
                    var data = result.data;
                    if(result.data.length > 0 ){ 
                        generateBukti();
                    }

                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kas_bank',result.data[0].akun_kb,result.data[0].nama_kb);
                    $('#kode_form').val($form_aktif);
                    setHeightForm();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Pembayaran Vendor');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $status_simpan = 0;
        editData(id)
    });
    
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END EDIT DATA

     // Hapus Data
     function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('bdh-trans/bayar-nota-trans') }}",
            data: {
                no_bukti : id
            },
            dataType: 'json',
            async:false,
            success:function(result){
                var data = result.data;
                if(data.status){
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success",'Hapus Data','Data Pembayaran SPB ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!data.status && data.message == "Unauthorized"){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: data.message
                    });
                }
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-delete', function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

</script>
