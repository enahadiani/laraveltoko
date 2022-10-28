<link rel="stylesheet" href="{{ asset('trans.css?version=_') . time() }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Stok Opname" tambah="true"
:thead="array('No Bukti','Tanggal','Nama Barang','Stok','Aksi')"
:thwidth="array(15,15,15,10,10)" :thclass="array('','','','','text-center')" />
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
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-2 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <span id="tanggal-dp"></span>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal"
                                        value="{{ date('d/m/Y') }}" >
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                    <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;cursor:pointer"
                                        class="simple-icon-refresh" id="generate-nobukti"></i>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="load-data" class="btn btn-primary float-right">Tampil Data</button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="load-sop" class="btn btn-primary float-right">SOP Sistem</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#rekap-bill"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a>
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
                                            <th style="width:1%">No</th>
                                            <th style="width:10%">Kode Barang</th>
                                            <th style="width:15%">Nama Barang</th>
                                            <th style="width:5%">Stok Sistem</th>
                                            <th style="width:5%">SOP</th>
                                            <th style="width:5%">Selisih</th>
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
                        digits: 0,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () {  }
     });


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

    function generateNoBukti(){
        var date = $('#tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        var url = "{{url('esaku-trans/stok-nobukti')}}";
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
    var action_html =
        "<a href='#' <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var action_html1="";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/stok-opname') }}",
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
                "targets": 4,
                "data": null,
                "render": function(data, type, row, meta) {
                    return action_html;
                }
            }
        ],
        [   { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'nama' },
            { data: 'stok_sistem' }
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


    $('#input-bill').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    

    $("#searchData_input-bill").on("keyup", function(event) {
        tablebill.search($(this).val()).draw();
    });

    $("#page-count_input-bill").on("change", function(event) {
        var selText = $(this).val();
        tablebill.page.len(parseInt(selText)).draw();
    });

    $('#form-tambah').on('click', '#load-data', function(e) {
        var periode = reverseDate2($('#tanggal').val(), '/', '-').replace('-', '').replace('-', '').substr(0,
            6);
        var kode_lokasi = $('#kode_lokasi').val();
        var no_hutang = $('#no_hutang').val();
        var tanggal = $('#tanggal').val();
        loadData();
        hitungSelisih();

    });

    $('#input-bill').on('click', '#btn-detail', function(e) {
        var selected = tablebill.row($(this).closest('tr')).data();
        loadDetail(selected.no_hutang);

    });
    
    //Hitung selisih
    function hitungSelisih(){
        var nilaisel = 0;
        $('#input-bill tbody tr').each(function(index) {
            var jumlah = toNilai($(this).find('.inp-stoksis').val())
            var sop = toNilai($(this).find('.inp-sop').val())
            nilaisel= sop - jumlah;
            
            $(this).find(`.tdselisihke${index + 1}`).text(nilaisel);
        });
    }
    //END Hitung selisih

    //Input SOP dari Stok Sistem
    function sop(){
        var sop = 0;
        $('#input-bill tbody tr').each(function(index) {
            var jumlah = toNilai($(this).find('.inp-stoksis').val())

            sop= jumlah;
            
            $(this).find(`.sopke${index + 1}`).val(sop);
        });
    }

    //END Input SOP dari Stok Sistem

    function formatNumber(v){
        if(!v){return 0;}
        v=v.split('.').join('');
        v=v.split(',').join('.');
        return Number(v.replace(/[^0-9.]/g, ""));
    }

    

    // BUTTON EDIT
    function editData(id) {

        $.ajax({
            type: 'GET',
            url: "{{ url('/billing-trans/terima-refund') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
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
        $('#judul-form').html('Edit Data Penerimaan Billing REFUND');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/konsinyasi-bayar') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data',
                        'Data Konsinyasi Pembayaran (' + id + ') berhasil dihapus ');
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
        $('#judul-form').html('Tambah Data Stok Opname');
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
        setHeightForm();
        $('#kode_form').val($form_aktif);
        var tanggal = $('#tanggal').val();
        generateNoBukti(tanggal);
        tablebill.clear().draw();
        tabledet.clear().draw();
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


    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_bukti:
            {
                required: true
            },
            kode_barang:
            {
                required: true
            },
            nama:
            {
                required: true
            },
            stok_sistem:
            {
                required: true
            }
            ,
            sop:
            {
                required: true
            },
            sls:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            
            var url = "{{ url('esaku-trans/stok-opname') }}";
        
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

    function loadData(){
        var url = "{{url('esaku-trans/get-loaddata-stok')}}";
        var date = $('#tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                tanggal: date2
            },
            dataType: 'JSON',
            async: false,
            success: function(result){
                var data = result.data;
                if(data.length > 0){
                    var html = "";
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                            var line = data;
                            html += "<tr class='row-pb row-pb-"+no+"'>"
                            html += "<td class='no-pb text-center'>"+no+"</td>";
                            html += "</div></td>";
                            html += "<td><div>";
                            html += "<span class='td-kode_barang tdkode_barangke"+no+"'>"+line[i].kode_barang+"</span>";
                            html += "<input type='text' name='kode_barang[]' class='inp-kode_barang form-control kode_barangke"+no+" hidden'  value='"+line[i].kode_barang+"'  >";
                            html += "</div></td>";
                            html += "<td><div>";
                            html += "<span class='td-bank_trans tdbank_transke"+no+"'>"+line[i].nama+"</span>";
                            html += "<input type='text' name='namaf[]' class='inp-bank_trans form-control bank_transke"+no+" hidden'  value='"+line[i].nama+"'  >";
                            html += "</div></td>";
                            html += "<td><div>";
                            html += "<span class='td-satuan tdsatuanke"+no+"'>"+format_number(line[i].stok_sistem)+"</span>";
                            html += "<input type='text' name='stok_sistem[]' class='inp-stoksis form-control satuanke"+no+" hidden'  value='"+format_number(line[i].stok_sistem)+"'  >";
                            html += "</div></td>";
                            html += "<td>"
                            html += "<span class='td-status tdsopke"+no+" tooltip-span'></span>";
                            html += "<input type='text' name='sop[]' id='inp-sop' class='inp-sop form-control sopke"+no+" '  value='"+parseFloat(line[i].sop)+"' >"
                            html += "</td>"
                            html += "<td><div>";
                            html += "<span class='td-keterangan tdselisihke"+no+"'>"+format_number(line[i].sls)+"</span>";
                            html += "<input type='text' name='sls[]' class='inp-jumlah form-control keteranganke"+no+" hidden '  value='"+parseFloat(line[i].sls)+"'  >";
                            html += "</div></td>";
                            no++;
                    }

                    $('#input-bill >tbody').html(html);

                    var no = 1;
                    for(var i=0;i<data.length;i++) {
                        $('.statuske'+no).val(data[i].status)
                        no++;
                    }

                    $('.currency').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 0,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () {  }
                    });

                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    });

                    $('#load-sop').on('click', function(){
                        sop();
                        hitungSelisih();

                    });
                    $('.inp-sop').on('input', function(){
                        hitungSelisih();
                    });
                    

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();

                }else{
                    alert('Data Barang Kosong, silahkan coba lagi dan Pilih tanggal !');
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

    function loadVendor(kode_vendor) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/get-vendor') }}",
            dataType: 'json',
            data: {
                kode_vendor: kode_vendor
            },
            success: function(result) {

                if (result.status) {
                    if (result.data.length > 0) {
                        var line = result.data[0];
                        $('#kode_vendor').val(line.kode_vendor);
                        $('#no_hutang').val(line.no_hutang);
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: JSON.stringify(result.data.message)
                    });
                }
            }
        });
    }

    function clearInputFilter(par) {
    $("#" + par).val("");
    $("#" + par).attr("readonly", false);
    $("#" + par).attr(
        "style",
        "border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important"
    );
    $(".info-code_" + par)
        .parent("div")
        .addClass("hidden");
    $(".info-name_" + par).addClass("hidden");
    $("#" + par)
        .closest("div")
        .find(".info-icon-hapus")
        .addClass("hidden");
    $("#" + par).trigger("change");
}

function showInfoField(kode, isi_kode, isi_nama) {
    var position = $("#" + kode).position();

    if (position.left == 0) {
        if (isi_kode.length <= 4) {
            position.left = isi_kode.length * 20;
        } else {
            position.left = (isi_kode.length * 10) - 20;
        }
    }

    $("#" + kode).val(isi_kode);
    $("#" + kode).attr(
        "style",
        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;color: #ffffff !important;"
    );
    
    $(".info-code_" + kode).text(kode);
    $(".info-code_" + kode).attr("title", isi_nama);
    $(".info-code_" + kode)
    .text(isi_kode)
    .parent("div")
    .removeClass("hidden");
    var widthLabel = $("#" + kode).width() - $("#search_" + kode).width() - 10;
    $(".info-name_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode)
        .width(widthLabel)
        .css({ left: position.left, width: widthLabel});
    $(".info-name_" + kode + " span").text(isi_nama);
    $(".info-name_" + kode).removeClass("hidden");
    $(".info-name_" + kode)
        .closest("div")
        .find(".info-icon-hapus")
        .removeClass("hidden");
}

    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'kode_vendor':
                var options = {
                    id: id,
                    header: ['Kode','Nama'],
                    url: "{{ url('esaku-trans/get-nobeli') }}",
                    columns: [
                        { data: 'kode_vendor' },
                        { data: 'vendor' }
                    ],
                    judul: "Daftar Vendor",
                    pilih: "vendor",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" ,
                    target2: ".info-name_" ,
                    target3: "",
                    target4: "",
                    width: ["30%","70%"],

                    onItemSelected: function(data) {
                        // loadVendor(data.kode_vendor);
                        showInfoField('kode_vendor', data.kode_vendor, data.vendor);
                        clearInputFilter('no_hutang');
                    }
                }
                
            break;
            case 'no_hutang':
                var vendor = $('#kode_vendor').val();

                if(vendor == '' || vendor == null || vendor == 'undefined') {
                    alert('Harap pilih Kode Vendor proses terlebih dahulu')
                    return;
                }

                options = {
                    id : id,
                    header : ['Kode'],
                    url : "{{ url('esaku-trans/get-nohutang') }}",
                    columns : [
                        { data: 'no_hutang' }
                    ],
                    judul : "Daftar No Hutang",
                    pilih : "No Hutang",
                    jTarget1 : "text",
                    target1 : ".info-code_",
                    width : ["10%"],
                    parameter: { kode_vendor: vendor }
                }
            break;
        }
        showInpFilterBSheet(options);
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 0,
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
