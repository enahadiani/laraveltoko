<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<div class="row" id="saku-datatable">
    <div class="col-12">
        <div class="card" >
            <div class="card-body pb-0" style="padding-top:1rem;min-height:68px">
                <div class="row">
                    <div class="col-md-6">
                        <h6 style="position:absolute;top:5px">Retur Pembelian</h6>
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
                                    <th>No Pembelian</th>
                                    <th>Kode Vendor</th>
                                    <th>Tgl Beli</th>
                                    <th>Total</th>
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
                                        <th>No Bukti</th>
                                        <th>Tgl</th>
                                        <th>No Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
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
<form id="web_form_edit" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
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
                                    <label>Tanggal</label>
                                    <input type='date' name='tanggal' class='form-control' id='web_form_edit_tgl' value="{{date('Y-m-d')}}"> 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Periode</label>
                                    <input type='text' name='periode' class='form-control' maxlength='200' readonly id='web_form_edit_periode' value="{{date('Ym')}}" readonly> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>No Beli</label>
                                    <input type='text' name='no_beli' class='form-control' maxlength='200' readonly id='web_form_edit_no_beli'> 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Akun Hutang</label>
                                    <input type='text' name='akun_hutang' class='form-control' maxlength='200' readonly id='web_form_edit_akun_hutang'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Vendor</label>
                                    <input type='text' name='kode_vendor' class='form-control' readonly id='web_form_edit_kode_vendor'>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Saldo</label>
                                    <input type='text' name='saldo' class='form-control currency' id='web_form_edit_saldo' readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Total Retur</label>
                                    <input type='text' name='total_return' class='form-control currency' id='web_form_edit_total_return' readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 nav-grid" role="tablist" style="padding-bottom:0;margin-top:0.1rem;border-bottom:none">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-pnj" role="tab" aria-selected="false"><span class="hidden-xs-down">Detail Retur</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-pnj" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <style>
                                        .selectize-input.full.locked{
                                            background: #e9ecef !important;
                                        }
                                    </style>
                                    <table class="table table-striped table-bordered table-condensed gridexample" style='width: 100%;' id="input-grid">
                                    <thead>
                                        <tr>
                                        <th width='5%'>No</th>
                                        <th width='30%'>Kode Barang</th>
                                        <th width='15%'>Harga Beli</th>
                                        <th width='10%'>Qty Beli</th>
                                        <th width='10%'>Qty Retur</th>
                                        <th width='20%'>Subtotal</th>
                                        <th>Status Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <!-- <a type="button" href="#" data-id="0" id="add-row" title="add-row" class="btn btn-light2 btn-block btn-sm">Tambah Baris</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END FORM INPUT  -->
<div id="laporan-retur" class='card' style="display: none;">
    <div class="card-body form-header">
        <button type="button" class="btn btn-primary float-right" id="back-to-form">Kembali</button>
    </div>
    <div class="separator mb-2"></div>
    <div class="card-body pt-3 form-body">
        <h3>
            <b>No Retur</b>
            <span class="pull-right" id="no-bukti-retur"></span>
        </h3>
        <div class="separator mb-2"></div>
        <div class="row">
            <div class="col-12">
                <div class="pull-left">
                    <p class="text-muted m-l-5" id="tanggal-retur"></p>
                    <p class="text-muted m-l-5" id="keterangan-retur"></p>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive mt-40" style="clear: both;">
                    <table class="table table-hover" id="data-retur">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Qty Beli</th>
                                <th class="text-right">Qty Retur</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit' class='web_datatable_edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var action_html2 = "<a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-new",
        "{{ url('esaku-trans/retur-beli-new') }}", 
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
            { data: 'no_bukti' },
            { data: 'vendor' },
            { data: 'tanggal' },
            { data: 'nilai1' }
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
        "{{ url('esaku-trans/retur-beli-finish') }}", 
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
            {   'targets': [4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 5, data: null, 'defaultContent': action_html2, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai1' }
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
    
    // END LIST DATA
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
            url: "{{ url('esaku-trans/retur-beli') }}",
            dataType: 'json',
            data:{no_bukti:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable2.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Retur Beli ('+id+') berhasil dihapus ');
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

    function getBarang(param,id,isEdit=false){
        $.ajax({
            type: 'GET',
            url: "{{url('esaku-trans/retur-beli-barang')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var res = result.daftar;
                    if(isEdit) {
                        var html = null;
                        var no = 1;
                        for(i=0;i<result.daftar.length;i++) {
                            var detail = res[i]
                            html = `<tr class="row-barang">
                                <td class="no-barang">${no}</td>
                                <td><select name="kode_barang[]" class="form-control inp-kode ke${no}" value=""></select></td>
                                <td><input type="text" class="form-control inp-harga" name="harga[]" value="${parseFloat(detail.harga)}" readonly></td>
                                <td>
                                    <input type="text" class="form-control inp-qtybeli" name="qty_beli[]" value="${parseFloat(detail.saldo)}" readonly>
                                    <input type="hidden" class="form-control inp-akun" name="kode_akun[]" value="${detail.akun_pers}" readonly >
                                </td>
                                <td>
                                    <input type="text" class="form-control inp-qtyretur" name="qty_retur[]" value="0" readonly>
                                    <input type="text" class="form-control inp-satuanretur hidden" name="satuan[]" value="-">
                                </td>
                                <td><input type="text" class="form-control inp-subb" name="subtotal[]" value="0" readonly></td>
                                <td><select name="status_return[]" class="form-control inp-status stske${no}" value=""><option value="Tidak">Tidak</option><option value="Ya">Ya</option></select></td>
                            </tr>`;

                            $('#input-grid tbody').append(html);
                            
                            no++;

                            $('.inp-kode').change(function(e){
                                var x= $(this).val();
                                $(this).closest('tr').find('.inp-harga').val(setHarga(x));
                                $(this).closest('tr').find('.inp-qtybeli').val(setJumlah(x));
                                $(this).closest('tr').find('.inp-akun').val(setAkun(x));
                                hitungTotal();
                            });

                            $('.inp-status').change(function(e){
                                var status= $(this).val();
                                console.log(status+'change');
                                if(status == "Ya"){
                                    var qty = toNilai($(this).closest('tr').find('.inp-qtybeli').val());
                                    console.log(qty);
                                    $(this).closest('tr').find('.inp-qtyretur').val(qty).trigger('change');
                                    $(this).closest('tr').find('.inp-qtyretur').attr("readonly",false);
                                }else{
                                    $(this).closest('tr').find('.inp-qtyretur').val(0).trigger('change');
                                    $(this).closest('tr').find('.inp-qtyretur').attr("readonly",true);
                                }
                                hitungTotal();
                            });

                            $('.inp-qtyretur').change(function(e){
                                var qty_beli = toNilai($(this).closest('tr').find('.inp-qtybeli').val());
                                var qty_retur = toNilai($(this).closest('tr').find('.inp-qtyretur').val());

                                if(qty_retur > qty_beli){
                                    $(this).closest('tr').find('.inp-qtyretur').val(qty_beli).trigger('change');
                                    msgDialog({
                                        id: '',
                                        type:'warning',
                                        text: 'Jumlah barang yang diretur lebih besar dari jumlah beli'
                                    });
                                }
                                hitungTotal();
                            });

                            $('.inp-qtyretur,.inp-subb,.inp-harga,.inp-qtybeli').inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                        }

                        var option = [];
                        for(var i=0;i<result.daftar.length;i++) {
                            var detail = res[i];
                            option.push({text:detail.kode_barang + ' - ' + detail.nama, value:detail.kode_barang})
                            $dtBrg[detail.kode_barang] = {harga:detail.harga,jumlah:detail.saldo,kode_akun:detail.akun_pers};
                        }
                        var num = 1
                        for(var i=0;i<result.daftar.length;i++) { 
                            $('.stske'+num).selectize();
                            var select = $('.ke'+num).selectize();
                            var control = select[0].selectize;
                            control.addOption(option);
                            num++
                        }

                        var n = 1
                        for(var i=0;i<result.daftar.length;i++) {
                            var detail = res[i];
                            var select = $('.ke'+n);
                            var control = select[0].selectize;
                            control.setValue(detail.kode_barang);
                            control.lock();
                            n++;
                        }
                        $('.gridexample').formNavigation();
                    } else {
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select = $('.'+param).selectize();
                            console.log('.'+param);
                            select = select[0];
                            var control = select.selectize;
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:res[i].kode_barang + ' - ' + res[i].nama, value:res[i].kode_barang}]);
                                $dtBrg[res[i].kode_barang] = {harga:res[i].harga,jumlah:res[i].saldo,kode_akun:res[i].akun_pers};
                            }
                        }
                    }
                }
            }
        });
    }

    function setAkun(id){  
        if (id != ""){
            return $dtBrg[id].kode_akun;  
        }else{
            return "";
        }
    
    };   

    function setHarga(id){  
        if (id != ""){
            return parseFloat($dtBrg[id].harga).toFixed(0);  
        }else{
            return "";
        }
    
    };  
    function setJumlah(id){  
        if (id != ""){
            return parseFloat($dtBrg[id].jumlah).toFixed(0);  
        }else{
            return "";
        }
    
    };  

    function hitungTotal(){
        
        var total_brg = 0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyretur').val();
            var hrgb = $(this).closest('tr').find('.inp-harga').val();
            //var todis= (toNilai(hrgb) * toNilai(disc)) / 100
            var subb = +toNilai(qtyb) * toNilai(hrgb);
            $(this).closest('tr').find('.inp-subb').val(toRp2(subb));
            total_brg += subb;
        });
        $('#web_form_edit_total_return').val(toRp2(total_brg));
        
    }  

    $('#saku-form').on('click', '.web_datatable_insert', function(){
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });

    $('#web_form_edit').on('click', '#add-row', function(){
        
        var no=$('#input-grid tbody .row-barang:last').index();
        no=no+2;
        var input = "<tr class='row-barang'>";
        input += "<td class='no-barang'>"+no+"</td>";
        input += "<td ><select name='kode_barang[]' class='form-control inp-kode ke"+no+"' value='' required></select></td>";
        input += "<td ><input type='text' class='form-control inp-harga' name='harga[]' readonly ></td>";
        input += "<td ><input type='text' class='form-control inp-qtybeli' name='qty_beli[]' readonly ><input type='hidden' class='form-control inp-akun' name='kode_akun[]' readonly ></td>";
        input += "<td ><input type='text' class='form-control inp-qtyretur' name='qty_retur[]'  ><input type='text' class='form-control inp-satuanretur hidden' name='satuan[]' value='-'></td>";
        input += "<td ><input type='text' class='form-control inp-subb' name='subtotal[]' ></td>";
        input += "<td><a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></td>";
        input += "</tr>";
        
        $('#input-grid tbody').append(input);
        var id=$('#web_form_edit_no_beli').val();
        getBarang('ke'+no,id);
        $('#input-grid tbody tr:last').find('.inp-kode')[0].selectize.focus();
        $('.inp-kode').change(function(e){
            var x= $(this).val();
            $(this).closest('tr').find('.inp-harga').val(setHarga(x));
            $(this).closest('tr').find('.inp-qtybeli').val(setJumlah(x));
            $(this).closest('tr').find('.inp-akun').val(setAkun(x));
            hitungTotal();
        });
        $('.inp-qtyretur,.inp-subb,.inp-harga,.inp-qtybeli').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.gridexample').formNavigation();
        
    });

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END BUTTON KEMBALI

    $('#saku-datatable').on('click', '.web_datatable_edit', function(){
        $('#judul-form').html('Form Retur Pembelian');
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            type: 'GET',
            url: "{{url('esaku-trans/retur-beli-detail')}}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){
                $('#id').val(kode);
                var res = result.data.data;
                if(result.data.status){
                    $('#input-grid tbody').empty()
                    $('#web_form_edit_no_beli').val(res[0].no_bukti);
                    $('#web_form_edit_kode_vendor').val(res[0].vendor);
                    $('#web_form_edit_akun_hutang').val(res[0].akun_hutang);
                    $('#web_form_edit_saldo').val(toRp2(res[0].saldo));  
                    $('#web_form_edit_totret').val(toRp2(res[0].total_return)); 
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    getBarang('ke1',res[0].no_bukti,true);
                    // no=1;
                    // var input = "";
                    // input += "<tr class='row-barang'>";
                    // input += "<td class='no-barang'>"+no+"</td>";
                    // input += "<td ><select name='kode_barang[]' class='form-control inp-kode ke"+no+"' value='' required></select></td>";
                    // input += "<td ><input type='text' class='form-control inp-harga' name='harga[]' readonly ></td>";
                    // input += "<td ><input type='text' class='form-control inp-qtybeli' name='qty_beli[]' readonly ><input type='hidden' class='form-control inp-akun' name='kode_akun[]' readonly ></td>";
                    // input += "<td ><input type='text' class='form-control inp-qtyretur' name='qty_retur[]'  ><input type='text' class='form-control inp-satuanretur hidden' name='satuan[]' value='-'></td>";
                    // input += "<td ><input type='text' class='form-control inp-subb' name='subtotal[]'  ></td>";
                    // input += "<td><a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></td>";
                    // input += "</tr>";
                    // $('#input-grid tbody').html(input);
                    // getBarang('ke'+no,res[0].no_bukti);
                    // $('#input-grid tbody tr:last').find('.inp-kode')[0].selectize.focus();
                    // $('.inp-kode').change(function(e){
                    //     var x= $(this).val();
                    //     $(this).closest('tr').find('.inp-harga').val(setHarga(x));
                    //     $(this).closest('tr').find('.inp-qtybeli').val(setJumlah(x));
                    //     $(this).closest('tr').find('.inp-akun').val(setAkun(x));
                    //     hitungTotal();
                    // });
                    // $('.inp-qtyretur,.inp-subb,.inp-harga,.inp-qtybeli').inputmask("numeric", {
                    //     radixPoint: ",",
                    //     groupSeparator: ".",
                    //     digits: 2,
                    //     autoGroup: true,
                    //     rightAlign: true,
                    //     oncleared: function () { self.Value(''); }
                    // });
                    // $('.gridexample').formNavigation();
                    
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                msgDialog({
                    id: '',
                    type:'sukses',
                    title: 'Error',
                    text: textStatus
                });
            }
        });

    });

    $('#web_form_edit').validate({
        ignore: [],
        rules: 
        {
            web_form_edit_tanggal:
            {
                required: true
            },
            web_form_edit_periode:
            {
                required: true
            },
            web_form_edit_no_beli:
            {
                required: true
            },
            web_form_edit_akun_hutang:
            {
                required: true
            },
            web_form_edit_kode_vendor:
            {
                required: true
            },
            web_form_edit_saldo:
            {
                required: true
            },
            web_form_edit_totret:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault()
            var formData = new FormData(form);
            var isAda = false;
            $('.row-barang').each(function(){
                var qtyret = $(this).closest('tr').find('.inp-qtyretur').val();
                var qtybeli = $(this).closest('tr').find('.inp-qtybeli').val();
                if(toNilai(qtyret) > toNilai(qtybeli)){
                    isAda = true;
                }
            });
            
            if(!isAda){
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }
                $.ajax({
                    type: 'POST',
                    url: "{{url('esaku-trans/retur-beli')}}",
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        if(result.data.status){
                            msgDialog({
                                id: '',
                                type:'sukses',
                                text: result.data.message
                            });
                            var no_bukti = result.data.no_bukti
                            dataTable.ajax.reload();
                            dataTable2.ajax.reload();
                            generateReport(no_bukti)
                        } else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        }else{
                            msgDialog({
                                id: '',
                                type:'sukses',
                                title: 'Error',
                                text: result.data.message
                            });
                        }
                    }
                });
            }else{
                
                msgDialog({
                    id: '',
                    type:'warning',
                    text: 'Jumlah barang yang diretur lebih besar dari jumlah beli'
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    
    $(':input[type="number"], .currency').on('keydown', function (e){
        var value = String.fromCharCode(e.which) || e.key;
        
        if (    !/[0-9\.]/.test(value) //angka dan titik
        && e.which != 190 // .
        && e.which != 116 // F5
        && e.which != 8   // backspace
        && e.which != 9   // tab
        && e.which != 13   // enter
        && e.which != 46  // delete
        && (e.which < 37 || e.which > 40) // arah 
        && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
        ){
            e.preventDefault();
            return false;
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

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-barang').each(function(){
            var nom = $(this).closest('tr').find('.no-barang');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    
    $('#web_form_edit').on('change', '.inp-qtyretur,.inp-subb', function(e){
        e.preventDefault();
        var qty = $(this).closest('tr').find('.inp-qtyretur').val();
        var harga = $(this).closest('tr').find('.inp-harga').val();
        // alert(qty+'-'+harga);
        hitungTotal();
    });

    $('#web_form_edit').on('change', '#web_form_edit_tgl', function(e){
        e.preventDefault();
        var tgl = $('#web_form_edit_tgl').val();
        var periode = tgl.substr(0,4)+''+tgl.substr(5,2);
        // alert(qty+'-'+harga);
        $('#web_form_edit_periode').val(periode);
    });

    function generateReport(no_bukti) {
        var form = new FormData();
        form.append('periode[]', '=')
        form.append('periode[]', "{{ date('Ym') }}")
        form.append('periode[]', '')
        form.append('nik_kasir[]', '=')
        form.append('nik_kasir[]', "{{ Session::get('userLog') }}")
        form.append('nik_kasir[]', '')
        form.append('no_bukti[]', '=')
        form.append('no_bukti[]', no_bukti)
        form.append('no_bukti[]', '')
        
        $.ajax({
            type: 'POST',
            url: "{{url('esaku-report/lap-retur-beli')}}",
            dataType: 'json',
            data: form,
            contentType: false,
            cache: false,
            processData: false, 
            success: function(result) {
                if(result.res.status) {
                    $('#saku-form').hide()
                    $('#saku-datatable').hide()
                    $('#laporan-retur').show()
                    $('#data-retur tbody').empty()
                    var data = result.res.data[0]
                    var detail = result.res.data_detail
                    var html = null
                                        
                    $('#no-bukti-retur').text(data.no_bukti)
                    $('#tanggal-retur').text(data.tanggal)
                    $('#keterangan-retur').text(data.keterangan)

                    if(detail.length > 0) {
                        var no = 1;
                        var subTot = 0;
                        var diskon = 0;
                        var total = 0;
                        for(var i=0;i<detail.length;i++) {
                            var row = detail[i]
                            subTot += +parseFloat(row.total)+parseFloat(row.diskon);
                            total += +parseFloat(row.total);
                            diskon+= +parseFloat(row.diskon);
                            html += `<tr>
                                <td style="text-align: center;">${no}</td>    
                                <td style="text-align: left;">${row.kode_barang}</td>    
                                <td style="text-align: left;">${row.nama_brg}</td>    
                                <td style="text-align: left;">${row.satuan}</td>    
                                <td style="text-align: right;">${sepNum(row.harga)}</td>    
                                <td style="text-align: right;">${sepNum(row.stok)}</td>    
                                <td style="text-align: right;">${sepNum(row.jumlah)}</td>    
                                <td style="text-align: right;">${sepNum(row.total)}</td>    
                            </tr>`
                            no++;
                        }
                        html += `<tr>
                            <td colspan="7" style="text-align: right;">Subtotal - amout :</td>
                            <td id="subtotal" style="text-align: right">${sepNum(subTot)}</td>    
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align: right;">Discount :</td>
                            <td id="subtotal" style="text-align: right;">${sepNum(diskon)}</td>    
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align: right; font-size: 39.056px !important; font-weight: bold;">Total :</td>
                            <td id="subtotal" style="text-align: right; font-size: 39.056px !important; font-weight: bold;">${sepNum(total)}</td>    
                        </tr>`

                        $('#data-retur tbody').append(html)
                    }
                }            
            }
        });
    }

    $('#back-to-form').click(function() {
        $('#laporan-retur').hide()
        $('#saku-datatable').show()
    })

    $('a[href="#data-new"]').on('shown.bs.tab', function (e) {
        dataTable.columns.adjust().draw();
    })

    $('a[href="#data-finish"]').on('shown.bs.tab', function (e) {
        dataTable2.columns.adjust().draw();
    })
</script>