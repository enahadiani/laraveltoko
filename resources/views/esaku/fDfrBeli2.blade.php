    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Daftar Pembelian" tambah="" :thead="array('No Pembelian','Nik Kasir','Tanggal','Kode Vendor','Total','Action')" :thwidth="array(20,18,18,12,22,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->

    <div class="container-fluid mt-3" id="saku-form" style="display:none">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-pos-body">
                        <form class="form form-beli-ket" id="web_form_edit" method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="logo2 text-center"><img src="{{ url('asset_dore/images/sai_icon/logo.png') }}" width="40px" alt="homepage" class="light-logo" /><br/>
                                                <img src="{{ url('asset_dore/images/sai_icon/logo-text.png') }}" class="light-logo" alt="homepage" width="40px"/>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="label-header">
                                                <p>{{ date("Y-m-d H:i:s") }}</p>
                                                <p style="color:#007AFF"><i class='fa fa-user'></i> <span id="iniNIK"></span> 
                                                <span id='iniNoBukti' style='display:none'></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-right">
                                    <h6>Nilai Transaksi</h6>
                                    <!-- <div class="row float-right">
                                        <a class='btn btn-light float-right btn-form-exit mr-2 web_form_back'><i class='simple-icon-arrow-left mr-2'></i> Back</a>
                                        <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                            <img style="width:30px;height:30px;position:absolute" src="{{ url('asset_dore/img/edit.png') }}">
                                            <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center">Edit Qty</p>
                                            <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center">F7</p>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-5">
                                    <h3><input type="text" style="font-size: 60px !important;height:unset !important"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                                </div>
                                <div class="col-12">
                                    <table class="table" style="margin-bottom: 5px">
                                        <tr>
                                            <th style='padding: 3px;width:25%' colspan='2'>
                                                <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" readonly>
                                                <input type="hidden" id="method" name="_method" value="put">
                                                <input type='hidden' id="id" >
                                            </th>
                                            <th style='padding: 3px;width:25%' colspan='2'>
                                                <select class='form-control' id="kd-barang">
                                                    <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                                </select>
                                            </th>
                                            <th style='padding: 3px;width:25%' colspan='2'>
                                                <select class='form-control' name="kode_vendor" id="kode_vendor">
                                                    <option value=''>--- Pilih Vendor ---</option>
                                                </select>
                                            </th>
                                            <th style='padding: 3px;width:5%'>Total</th>
                                            <th style='padding: 3px;width:20%'>
                                                <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                            </th>
                                        </tr>
                                    </table>
                                    <div class="col-12 grid-table" style="overflow-y: scroll; margin:0px; padding:0px;">
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                        <thead>
                                            <tr>
                                                <th style='width:3%'>No</th>
                                                <th style='width:19%'>Barang</th>
                                                <th style='width:5%'>Stok</th>
                                                <th style='width:10%'>Harga Sebelum</th>
                                                <th style='width:10%'>Harga Jual</th>
                                                <th style='width:10%'>Harga</th>
                                                <th style='width:5%'>Satuan</th>
                                                <th style='width:5%'>Qty</th>
                                                <th style='width:10%'>Disc</th>
                                                <th style='width:15%'>Subtotal</th>
                                                <th style='width:8%'></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 mt-2 float-right">
                                        <div class="form-group row">
                                            <label for="judul" class="col-2 col-form-label" >Keterangan</label>
                                            <div class="col-10">
                                                <input type="text" name="keterangan" class='form-control' id='keterangan' required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="judul" class="col-1 col-form-label" >Disc</label>
                                            <div class="col-2">
                                                <input type="text" name="total_disk" min="1" class='form-control currency' id='todisk' required value="0" readonly>
                                            </div>
                                            <label for="judul" class="col-1 col-form-label" >PPN</label>
                                            <div class="col-3">
                                                <div class="input-group mb-3 readonly">
                                                    <input type="text" name="total_ppn" min="1" class='form-control currency' id='toppn' required value="0" style="border-bottom-right-radius: 0 !important;border-top-right-radius: 0 !important;" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" id="getPPN" type="button" style="border-bottom-left-radius: 0 !important;border-top-left-radius: 0 !important;padding: 0.1rem 0.85rem;"><i class="simple-icon-refresh" style="font-size:18px !important"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="judul" class="col-2 col-form-label" >No Faktur</label>
                                            <div class="col-2">
                                                <input type="text" name="no_faktur" class='form-control ' id='no_faktur' required readonly>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-info btn-form-exit web_form_back" type="button" >Back</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="area_print"></div>
    </div>
    <!-- FORM EDIT MODAL -->
    <div class='modal' id='modal-edit' tabindex='-1' role='dialog'>
        <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <form id='form-edit-barang'>
                        <div class='modal-header'>
                            <h5 class='modal-title'>Edit Barang</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <div class="form-group row mt-40">
                                <label for="judul" class="col-3 col-form-label">Barang</label>
                                <div class="col-9">
                                    <select class='form-control' id='modal-edit-kode' readonly>
                                        <option value=''>--- Pilih Barang ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label for="judul" class="col-3 col-form-label">Harga Sebelum</label>
                                <div class="col-9">
                                    <input type='text' class='form-control currency' readonly maxlength='100' id='modal-edit-harga_seb'>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label for="judul" class="col-3 col-form-label">Harga</label>
                                <div class="col-9">
                                    <input type='text' class='form-control currency' readonly maxlength='100' id='modal-edit-harga'>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label for="judul" class="col-3 col-form-label">Disc</label>
                                <div class="col-9">
                                    <input type='text' class='form-control currency' maxlength='100' id='modal-edit-disc' >
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label for="judul" class="col-3 col-form-label">Qty</label>
                                <div class="col-9">
                                    <input type='text' class='form-control currency ' maxlength='100' id='modal-edit-qty'>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label for="judul" class="col-3 col-form-label">Subtotal</label>
                                <div class="col-9">
                                    <input type='text' class='form-control currency ' maxlength='100' id='modal-edit-subb'>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' id='edit-submit' class='btn btn-primary'>Simpan</button> 
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <!-- FORM MODAL BAYAR 2-->
    <div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
        <div role="document" style="" class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px !important;">   
                <div class="modal-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Toko Asrama Putra TJ</th>
                                <th>
                                    <button id="clear-pos" type="button" class="btn btn-primary float-right">Clear</button>
                                </th>
                            </tr>
                            <tr>
                                <th>Jl.Telekomunikasi No. 1 Trs.Buahbatu</th>
                            </tr>
                            <tr>
                                <th>Bandung</th>
                            </tr>
                        </thead>
                    </table>
                    <table id="table-produk" class="table table-striped">
                        <tbody>

                        </tbody>
                    </table>
                    <table id="table-total" class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Total Pembelian</th>
                                <th id="total-pembelian"></th>
                            </tr>
                            <tr>
                                <th>Total Diskon</th>
                                <th id="total-diskon"></th>
                            </tr>
                            <tr>
                                <th>Total PPN</th>
                                <th id="total-ppn"></th>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <th id="total-transaksi"></th>
                            </tr>
                        </thead>
                    </table>
                    <table id="table-data-nota" class="table table-borderless">
                        <tbody>
                            <tr>
                                <td id="no-bukti"></td>
                            </tr>
                            <tr>
                                <td id="tanggal-bukti"></td>
                            </tr>
                            <tr>
                                <td id="kasir-bukti"></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terima Kasih</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('helper.js') }}"></script>
    <script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
    <script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>
    <script src="{{url('asset_dore/js/inputmask.js')}}"></script>
    <script>
    $(document).ready(function(){
        var $submitBtn = false;
        var $dtBrg = new Array();
        var $dtBrg2 = new Array();
        var $no_bukti = '';

        setHeightFormPOS();
        
        var scroll = document.querySelector('#content-preview');
        var psscroll = new PerfectScrollbar(scroll);

        document.onkeyup = function(e) {
            if (e.ctrlKey && e.which == 66) {
                $('#kd-barang2').focus();
            }
            if (e.ctrlKey && e.which == 67) {
                $('#kd-barang-selectized').focus();
            }
            if (e.which == 118) {
                // $('.inp-qtyb').prop('readonly');
                $('.inp-qtyb').prop('readonly', false);
                $('.inp-qtyb').first().focus();
                $('.inp-qtyb').first().select();
            }
            if (e.which == 112) {
                $('#kd-barang2').focus();
            }
            if (e.which == 119) {
                $('#no_faktur').focus();
            }
        };


        $('#kd-barang').selectize({
            // theme: 'links',
            selectOnTab:true,
            maxItems: 1,
            valueField: 'kd_barang',
            labelField: 'nama',
            searchField: ['kd_barang','nama','barcode'],
            options: [
                {kd_barang: 123456, nama: 'test', barcode: '200'},
            ],
            render: {
                option: function(data, escape) {
                    return '<div class="option">' +
                    '<span class="nama">' + escape(data.nama) + '</span>' +
                    '</div>';
                },
                item: function(data, escape) {
                    return '<div class="item"><a href="#">' + escape(data.nama) + '</a></div>';
                }
            },
            create:false,
            onChange: function (val){
                // $('#kd-barang').val(value);
                var id = val
                if (id != "" && id != null && id != undefined){
                    addBarang(id);
                    // alert(id);
                }
            }
        });

        $('#clear-pos').click(function(){
            clearPos();
        })

        function clearPos() {
            var select = $('#kode-vendor').selectize();
            var vendor = select[0].selectize;
            $('#tostlh').val(0);
            vendor.setValue('')
            $('#totrans').val(0);
            $('#input-grid2 tr:not(:first-child)').remove();
            $('#todisk').val(0);
            $('#toppn').val(0);
            $('#no_faktur').val('');
            $('#modal-bayar2').modal('hide');
            $('#saku-datatable').show();
            $('#saku-form').hide();
        }
        
        function getNota(no_bukti) {
            $.ajax({
                type:'GET',
                url:"{{url('esaku-trans/pembelian-data-nota')}}",
                dataType: 'json',
                data: {'no_bukti':no_bukti},
                // async: false,
                success: function(result) {
                    var dataNota = result.data;
                    var dataProduk = result.data.data;
                    $('#table-produk tbody').empty();
                    var tableProduk = "";
                    for(var i=0;i<dataProduk.length;i++) {
                        var sub = (parseFloat(dataProduk[i].harga) * parseFloat(dataProduk[i].jumlah)) - parseFloat(dataProduk[i].diskon)
                        tableProduk += "<tr>";
                        tableProduk += "<td>"+dataProduk[i].nama+" X "+sepNum(dataProduk[i].jumlah)+"</td>";
                        tableProduk += "<td>"+sepNum(sub)+"</td>"
                        tableProduk += "</tr>";
                    }
                    $('#table-produk tbody').append(dataProduk);
                    $('#table-total #total-pembelian').text("Rp. "+sepNum(dataNota.totpemb))
                    $('#table-total #total-diskon').text("Rp. "+sepNum(parseFloat(dataNota.totdisk)))
                    $('#table-total #total-ppn').text("Rp. "+sepNum(parseFloat(dataNota.totppn)))
                    $('#table-total #total-transaksi').text("Rp. "+sepNum(parseFloat(dataNota.tottrans)))
                    $('#table-data-nota #no-bukti').text(dataNota.no_bukti)
                    $('#table-data-nota #tanggal-bukti').text(dataNota.tgl)
                    $('#table-data-nota #kasir-bukti').text(dataNota.nik)
                    $('#modal-bayar2').modal('show');
                }
            });   
        }

        function getBarang(){
            $.ajax({
                type: 'GET',
                url: "{{url('esaku-trans/pembelian-barang')}}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status) {
                        var res = result.daftar.data;
                        var select = $('#modal-edit-kode').selectize();
                        select = select[0];
                        var control = select.selectize;

                        var select2 = $('#kd-barang').selectize();
                        select2 = select2[0];
                        var control2 = select2.selectize;
                        control2.clearOptions();

                        for(i=0;i<res.length;i++){
                            control.addOption([{text:res[i].kode_barang + ' - ' + res[i].nama, value:res[i].kode_barang}]);
                            control2.addOption([{kd_barang:res[i].kode_barang, nama:res[i].nama,barcode:res[i].barcode}]);
                            $dtBrg[res[i].kode_barang] = {harga:res[i].harga_seb,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};  
                            $dtBrg2[res[i].barcode] = {harga:res[i].harga_seb,nama:res[i].nama,kd_barang:res[i].kode_barang,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};
                        }
                        control2.disable();

                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('esaku-auth/login') }}";
                        })
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                }
            });
        }
        
        function getVendor(){
            $.ajax({
                type: 'GET',
                url: "{{url('esaku-master/vendor')}}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select = $('#kode_vendor').selectize();
                            select = select[0];
                            var control = select.selectize;
                            control.clearOptions();
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);
                            }
                            
                        }
                    }
                    control.lock();
                }
            });
        }
        
        getBarang();
        getVendor();
        
        function sepNum(x){
            var num = parseFloat(x).toFixed(0);
            var parts = num.toString().split(".");
            var len = num.toString().length;
            // parts[1] = parts[1]/(Math.pow(10, len));
            parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
            return parts.join(",");
        }
        
        function toRp(num){
            if(num < 0){
                return "("+sepNum(num * -1)+")";
            }else{
                return sepNum(num);
            }
        }
        
        function toNilai(str_num){
            var parts = str_num.split('.');
            number = parts.join('');
            number = number.replace('Rp', '');
            // number = number.replace(',', '.');
            return +number;
        }
        
        function setHarga2(id){
            if (id != ""){
                return $dtBrg[id].harga;  
            }else{
                return "";
            }
            
        };  
        function setHarga3(id){
            if (id != ""){
                return $dtBrg2[id].harga;  
            }else{
                return "";
            }
            
        };  
        function setNama(id){
            if (id != ""){
                return $dtBrg2[id].nama;  
            }else{
                return "";
            }
            
        };  
        function setSatuan(id){  
            if (id != ""){
                return $dtBrg[id].satuan;  
            }else{
                return "";
            }
            
        }; 
        function setAkun(id){  
            if (id != ""){
                return $dtBrg[id].kode_akun;  
            }else{
                return "";
            }
            
        };   
        function getKode(id){ 
            if (id != ""){
                return $dtBrg2[id].kd_barang;  
            }else{
                return "";
            }
            
        };  

        function format_number(num) {
            var number = parseFloat(num).toFixed(0);
            number = sepNum(number);
            return number;
        }

        // LIST DATA

        var action_html = "<a href='#' title='Edit' class='web_datatable_edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;";

        var dataTable = generateTable(
            "table-data",
            "{{ url('esaku-trans/pembelian') }}", 
            [
                {'targets': 5, data: null, 'defaultContent': action_html, 'className': 'text-center' },
                {'targets': 4,
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
                }
            ],
            [
                { data: 'no_bukti' },
                { data: 'nik_user' },
                { data: 'tanggal',  render: function(data,type,row){
                    var split = data.split('-');
                    var tgl = split[2];
                    var bln = split[1];
                    var tahun = split[0];
                    return tgl+"/"+bln+"/"+tahun;
                } },
                { data: 'kode_vendor' },
                { data: 'total' },
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

        $('#saku-datatable').on('click', '.web_datatable_insert', function(){
            $('#saku-datatable').hide();
            $('#saku-form').show();
        });

        $('#saku-form').on('click', '.web_form_back', function(){
            $('#saku-form').hide();
            $('#saku-datatable').show();
        });

        $('#saku-datatable').on('click', '.web_datatable_edit', function(){
            var kode = $(this).closest('tr').find('td:eq(0)').text();
            $.ajax({
                type: 'GET',
                url: "{{url('esaku-trans/pembelian-detail')}}",
                data: {'no_bukti':kode},
                dataType: 'json',
                success:function(result){
                    $('#id').val(kode);
                    if(result.data.status){
                        var res = result.data;
                        $no_bukti = res.data[0].no_bukti;
                        $('#iniNoBukti').html(res.data[0].no_bukti+"<input type='hidden' value='"+res.data[0].no_bukti+"' name='no_beli' class='form-control' maxlength='200' readonly id='web_form_edit_no_beli'>");
                        $('#iniNIK').html(res.data[0].nik_user+"<input type='hidden' value='"+res.data[0].nik_user+"' name='nik_kasir' class='form-control' maxlength='200' readonly id='web_form_edit_nik'>");
                        $('#keterangan').val(res.data[0].keterangan);
                        $('#totrans').val(toRp(res.data[0].total));    
                        $('#todisk').val(toRp(res.data[0].diskon));    
                        $('#toppn').val(toRp(res.data[0].ppn));    
                        $('#no_faktur').val(res.data[0].no_dokumen);    
                        $('#kode_vendor')[0].selectize.setValue(res.data[0].kode_vendor);
                        var input=``;
                        var no=1;
                        if(res.data_detail.length>0){
                            for(var x=0;x<res.data_detail.length;x++){
                                var line = res.data_detail[x];
                                input += "<tr class='row-barang'>";
                                input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
                                input += "<td>"+line.nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+line.kode_barang+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+parseFloat(line.stok)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+parseFloat(line.hrg_seb)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+parseFloat(line.harga_jual)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+parseFloat(line.harga)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+line.satuan+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(line.kode_barang)+"' readonly></td>";
                                input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+parseFloat(line.jumlah)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+parseFloat(line.diskon)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+parseFloat(line.subtotal)+"' readonly required></td>";
                                input += "<td class='text-center'></td>";
                                input += "</tr>";
                                no++;
                            }
                        }
                        
                        $("#input-grid2 tbody").html(input);
                        $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual,.inp-hrgb,.inp-hrgseb').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        
                        hitungTotal();
                    }
                    $('.gridexample').formNavigation();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
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

        // HAPUS DATA
        function hapusData(id){
            $.ajax({
                type: 'DELETE',
                url: "{{ url('esaku-trans/pembelian') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.data.status){
                        dataTable.ajax.reload();                    
                        showNotification("top", "center", "success",'Hapus Data','Data Pembelian ('+id+') berhasil dihapus ');
                        $('#modal-pesan-id').html('');
                        $('#table-delete tbody').html('');
                        $('#modal-pesan').modal('hide');
                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }else{
                        msgDialog({
                            id: '',
                            title: 'Error!',
                            type:'sukses',
                            text: result.data.message
                        });
                    }
                }
            });
        }

        $('#saku-datatable').on('click','#btn-delete',function(e){
            var kode = $(this).closest('tr').find('td').eq(0).html();
            msgDialog({
                id: kode,
                type:'hapus'
            });
        });

        // END HAPUS

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        
        
        function hitungKembali(){
            
            var total_stlh = toNilai($('#tostlh').val());
            var total_bayar = toNilai($('#tobyr').val());
            
            if(total_bayar > 0 ){
                kembalian = +total_bayar - +total_stlh; 
                if(kembalian < 0) kembalian = 0;  
                $("#kembalian").val(toRp(kembalian));
            }
            
        }
        
        function getPPN(){
            
            var todisk = toNilai($('#todisk').val());
            var totrans = toNilai($('#totrans').val());
            var total = totrans - todisk;
            var ppn = (total * 10)/100;
            $("#toppn").val(toRp(ppn));
            // var total2 = total+ppn;
            // $("#tostlh").val(toRp(total2));
            
        }
        
        function hitungDisc(){
            
            var total_trans = toNilai($('#totrans').val());
            var total_disk= toNilai($('#todisk').val());
            var total_stlh = +total_trans - +total_disk;
            
            $('#tostlh').val(toRp(total_stlh));
        }
        
        function hitungTotal(){
            
            // hitung total barang
            if($('#todisk').val() == ""){
                
                $('#todisk').val(0);
            }
            var total_brg = 0;
            $('.row-barang').each(function(){
                var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
                var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
                var disc = $(this).closest('tr').find('.inp-disc').val();
                
                var subb = $(this).closest('tr').find('.inp-subb').val();
                
                var hrg = toNilai(subb)/toNilai(qtyb);
                $(this).closest('tr').find('.inp-hrgb').val(toRp(hrg));
                total_brg += +toNilai(subb);
            });
            $('#totrans').val(toRp(total_brg));
            
            var total_disk= toNilai($('#todisk').val());
            var total_stlh = +total_brg - +total_disk;
            // var total_ppn = toNilai($('#toppn').val());
            // var total = total_stlh + total_ppn; 
            var total = total_stlh;
            $('#tostlh').val(toRp(total));
            
        }
        var count= 0;
        
        $('#modal-edit-kode').selectize({
            selectOnTab: true,
            onChange: function (){
                var id = $('#modal-edit-kode').val();
                // setHarga(id);
            }
        });
        
        function setHarga(id) {
            if(id == '' || id == null){
                $('#qty-barang').val('');
                $('#hrg-barang').val('');
            }else{
                $.ajax({
                    url:"{{url('esaku-trans/pembelian-barang')}}",
                    type:'GET',
                    dataType:'json',
                    async:false,
                    success: function(result) {
                        console.log(result)
                    }
                });
            }
        }
        
        function hapusBarang(rowindex){
            $("#input-grid2 tbody tr:eq("+rowindex+")").remove();
            no=1;
            $('.row-barang').each(function(){
                var nom = $(this).closest('tr').find('.no-barang');
                nom.html(no);
                no++;
            });
            hitungTotal();
        }

        function ubahBarang(rowindex){
            $('.row-barang').removeClass('set-selected');
            $("#input-grid2 tbody tr:eq("+rowindex+")").addClass('set-selected');
            
            var kd = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-kdb').val();
            var qty = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-qtyb').val();
            var harga = toNilai($("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-hrgb').val());  
            var harga_seb = toNilai($("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-hrgseb').val());    
            var disc = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-disc').val();
            var subb = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-subb').val();
            
            $('#modal-edit-kode')[0].selectize.setValue(kd);
            $('#modal-edit-kode').val(kd);
            $('#modal-edit-qty').val(qty);
            $('#modal-edit-harga').val(harga);
            $('#modal-edit-harga_seb').val(harga_seb);
            $('#modal-edit-disc').val(disc);
            $('#modal-edit-subb').val(subb);
            
            $('#modal-edit').modal('show');
            var selectKode = $('#modal-edit-kode').data('selectize');
            selectKode.disable();
            
        }

        $('#edit-submit').click(function(e){
            e.preventDefault();
            
            // var hrg = toNilai($('#modal-edit-harga').val());
            var hrg_seb = toNilai($('#modal-edit-harga_seb').val());
            var qty = toNilai($('#modal-edit-qty').val());
            var disc = toNilai($('#modal-edit-disc').val());
            var kd = $('#modal-edit-kode option:selected').val();
            var nama = $('#modal-edit-kode option:selected').text();
            //var todis= (hrg * disc) / 100
            // var sub = (+qty * +hrg) - disc;
            var sub = toNilai($('#modal-edit-subb').val());
            var hrg = sub/qty;
            
            var no = $(".set-selected").closest('tr').find('.no-barang').text();
            var input="";
            // input = "<tr class='row-barang'>";
            input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
            input += "<td >"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
            input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
            input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"'  required></td>";
            input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
            // input += "</tr>";
            
            
            // $('.set-selected').closest('tr').remove();
            // $('.set-selected').closest('tr').append(input);
            
            $(".set-selected").closest('tr').text('');
            $(".set-selected").closest('tr').append(input);
            
            // $("#input-grid2").append(input);
            $('.inp-qtyb,.inp-subb,.inp-disc').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            hitungTotal();
            $('.gridexample').formNavigation();
            $('#modal-edit').modal('hide');
            
            
        });

        function addBarang(id=null){
            
            var kd1 = $('#kd-barang')[0].selectize.getValue();
            var qty1 = 1;
            var disc1 = 0;
            var hrg1 = setHarga2(kd1);
            var saldo = setSaldo(kd1);
            var hrgjual = setHrgJual(kd1);
            if(kd1 == ''){
                msgDialog({
                    id: '',
                    type:'warning',
                    text:'Masukkan data barang yang valid'
                });
            }else{
                var kd = $('#kd-barang option:selected').val();
                var nama = $('#kd-barang option:selected').text();
                var qty = qty1;
                var hrg_seb = hrg1;
                
                var hrg = 0;
                var disc = disc1;
                var sub = 0;
                
                // cek barang sama
                $('.row-barang').each(function(){
                    var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
                    var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
                    var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
                    var disc_temp = $(this).closest('tr').find('.inp-disc').val();
                    
                    var subb_temp = $(this).closest('tr').find('.inp-subb').val();
                    if(kd_temp == kd){
                        qty+=+(toNilai(qty_temp));
                        disc+=+(toNilai(disc_temp));
                        sub+=+(toNilai(subb_temp));
                        $(this).closest('tr').remove();
                    }
                });

                var no = $('#input-grid2 tr:last').index()+1;
                var input = "";
                
                input = "<tr class='row-barang'>";
                input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
                input += "<td>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+toRp(saldo)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+toRp(hrgjual)+"' required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
                input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
                input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+disc+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+sub+"' required></td>";
                input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
                input += "</tr>";
                
                $("#input-grid2").append(input);
                $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual,.inp-hrgb,.inp-hrgseb').inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () { self.Value(''); }
                });
                
                hitungTotal();
            
                $('#kd-barang')[0].selectize.setValue('');
                $("#input-grid2 tr:last").focus();
                $('.gridexample').formNavigation();
            }
        }

        function addBarang2(){
            
            var kd1 = $('#kd-barang2').val();
            var qty1 = 1;
            var disc1 = 0;
            var hrg1 = setHarga3(kd1);
            
            var hrgjual = setHrgJual2(kd1);
            var kd=getKode(kd1);
            var saldo = setSaldo2(kd1);
            var nama = kd+"-"+setNama(kd1);
            // || +qty1 <= 0 || +hrg1 <= 0
            if(kd1 == '' ){
                msgDialog({
                    id: '',
                    type:'warning',
                    text:'Masukkan data barang yang valid'
                });
            }else{
                // var kd = $('#kd-barang2').val();
                
                // var nama = $('#kd-barang option:selected').text();
                var qty = qty1;
                var hrg_seb = hrg1;
                var hrg=0;
                var disc = disc1;
                // var todis= (hrg * disc) / 100
                // var sub = (+qty * +hrg) - disc;
                var sub=0;
                // var sub = +qty * +hrg;
                
                // cek barang sama
                $('.row-barang').each(function(){
                    var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
                    var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
                    var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
                    var disc_temp = $(this).closest('tr').find('.inp-disc').val();
                    var subb_temp = $(this).closest('tr').find('.inp-subb').val();
                    if(kd_temp == kd){
                        qty+=+(toNilai(qty_temp));
                        // hrg+=+(toNilai(hrg_temp));
                        disc+=+(toNilai(disc_temp));
                        sub+=+(toNilai(subb_temp));
                        //todis+=+(hrg*toNilai(disc_temp))/100;
                        // sub=(hrg*qty)-disc;
                        $(this).closest('tr').remove();
                    }
                });

                var no = $('#input-grid2 tr:last').index()+1;
                var input = "";
                
                input = "<tr class='row-barang'>";
                input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
                input += "<td >"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+toRp(saldo)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+toRp(hrgjual)+"'  required></td>";
                input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
                input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
                input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
                input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"' required></td>";
                input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
                input += "</tr>";
                
                $("#input-grid2").append(input);
                
                $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual,.inp-hrgb,.inp-hrgseb').inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () { self.Value(''); }
                });
                hitungTotal();
                
                $('#kd-barang2').val('');
                $("#input-grid2 tr:last").focus();
                $('#kd-barang2').focus();
                $('.gridexample').formNavigation();
            }
        }
        
        $("#input-grid2").on("dblclick", '.row-barang',function(){
            // get clicked index
            var index = $(this).closest('tr').index();
            ubahBarang(index);
        });

        $("#input-grid2").on("click", '.ubah-barang', function(){
            // get clicked index
            var index = $(this).closest('tr').index();
            ubahBarang(index);
        });

        $("#input-grid2").on("click", '.hapus-item', function(){
            // get clicked index
            var index = $(this).closest('tr').index();
            hapusBarang(index);
        });

        $('#qty-barang').keydown(function(e){
            var value = String.fromCharCode(e.which) || e.key;
            
            if (e.which == 13) {
                e.preventDefault();
                
            }
            
        });

        $('#tambah-barang').hide();
        $('#totrans').keydown(function(e){
            var value = String.fromCharCode(e.which) || e.key;
            
            if(e.key == 'ArrowDown'){
                e.preventDefault();
                $('#todisk').focus();
            }
        });

        $('#todisk').change(function(){
            hitungDisc();
            hitungTotal();
        });

        $('#toppn').change(function(){
            hitungTotal();
        });

        $('#todisk').keydown(function(e){
            var value = String.fromCharCode(e.which) || e.key;
            
            if (e.key == 'ArrowUp') {
                e.preventDefault();
                $('#totrans').focus();
            }else if(e.key == 'ArrowDown'){
                e.preventDefault();
                $('#tostlh').focus();
            }
        });

        $('#tostlh').keydown(function(e){
            var value = String.fromCharCode(e.which) || e.key;
            
            if (e.key == 'ArrowUp') {
                e.preventDefault();
                $('#todisk').focus();
            }else if(e.key == 'ArrowDown'){
                e.preventDefault();
                $('#tobyr').focus();
            }
        });

        $('#btn-byr').click(function(){
            $('#modal-bayar').modal('show');
        });

        $('#getPPN').click(function(){
            getPPN();
        });

        $('#btn-ok').click(function(){
            var tot = toNilai($('#inp-byr').val());
            $('#tobyr').val(toRp(tot));
            hitungTotal();
            $('#modal-bayar').modal('hide');
            $('#inp-byr').val(0);
            $('#param').val('');
        });

        $('#btn-clear').click(function(){
            $('#inp-byr').val(0);
            $('#param').val('');
        });

        $('#nom0').click(function(){
            var tot= toNilai($('#tostlh').val());
            $('#inp-byr').val(tot);
        });
        $('#nom1').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            
            tot+=+1000;
            $('#inp-byr').val(tot);
        });
        
        $('#nom2').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            tot+=+2000;
            
            $('#inp-byr').val(tot);
        });
        
        $('#nom3').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            tot+=+5000;
            
            $('#inp-byr').val(tot);
        });
        
        $('#nom4').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            tot+=+10000;
        
            $('#inp-byr').val(tot);
        });

        $('#nom5').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            
            
            tot+=+20000;
            
            $('#inp-byr').val(tot);
        });

        $('#nom6').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            
            
            tot+=+50000;
            
            $('#inp-byr').val(tot);
        });

        $('#nom7').click(function(){
            var tot= toNilai($('#inp-byr').val());
            var tanda= $('#param').val();
            
            
            tot+=+100000;
            
            
            $('#inp-byr').val(tot);
        });

        // Simpan Pembelian
        $('#web_form_edit').submit(function(e){
            e.preventDefault();
            
            hitungTotal();
            var barang = $('#input-grid2 tr').length;
            var totrans=toNilai($('#totrans').val());
            var todisk=toNilai($('#todisk').val());
            var tostlh=toNilai($('#tostlh').val());
            var toppn=toNilai($('#toppn').val());
            var id = $('#id').val();
            if(totrans <= 0){
                msgDialog({
                    id: '',
                    type:'warning',
                    text: 'Total transaksi tidak valid'
                });
            } else if(barang <= 1) {
                msgDialog({
                    id: '',
                    type:'sukses',
                    title: 'Error',
                    text:'Harap mengisi data barang terlebih dahulu'
                });
                return;
             }else{
                var formData = new FormData(this);
                formData.append('no_bukti', $no_bukti);
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]);
                    if(pair[1] == '')  {
                        msgDialog({
                                id: '',
                                type:'sukses',
                                title: 'Error',
                                text:'Tidak boleh ada data yang kosong'
                        });
                        break;
                        return;  
                    } 
                }
                
                $.ajax({
                    type: 'POST',
                    url: "{{url('esaku-trans/pembelian-update')}}",
                    data: {'no_bukti':id},
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            msgDialog({
                                id: '',
                                type:'sukses',
                                text: result.data.message
                            });
                            getNota(result.data.no_bukti);
                            // $('#modal-totrans').text(sepNum(totrans));
                            // $('#modal-diskon').text(sepNum(todisk));
                            // $('#modal-ppn').text(sepNum(toppn)); 
                            // $('#modal-toakhir').text(sepNum(tostlh));
                            // $('#modal-nobukti').text(result.data.no_bukti);
                            // $('#modal-bayar2').modal('show');
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
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        msgDialog({
                            id: '',
                            type: 'error',
                            text: textStatus
                        });
                    }
                });
            }
        });
    
        document.onkeyup = function(e) {
            if (e.ctrlKey && e.which == 66) {
                $('#kd-barang2').focus();
            }
            if (e.which == 112) {
                $('#kd-barang2').focus();
            }
            if (e.ctrlKey && e.which == 67) {
                $('#kd-barang-selectized').focus();
            }
            if (e.which == 118) {
                // $('.inp-qtyb').prop('readonly');
                $('.inp-qtyb').prop('readonly', false);
                $('.inp-qtyb').first().focus();
                $('.inp-qtyb').first().select();
            }
        };
        
        
        $('#kd-barang2').scannerDetection({
            
            //https://github.com/kabachello/jQuery-Scanner-Detection
            
            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
            avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
            preventDefault: true,
            
            endChar: [13],
            onComplete: function(barcode, qty){
                // validScan = true;
                validScan = true;
                $('#kd-barang2').val (barcode);
                addBarang2();
                
            } // main callback function	,
            ,
            // onKeyDetect:true,
            onError: function(string, qty) {
                console.log('barcode-error');
            }	
        });

        $('#cetakBtn').click(function(){
            var no_bukti= $('#modal-nobukti').text();
            window.open("{{ url('esaku-trans/pembelian-nota') }}/?no_bukti="+no_bukti); 
        });

        $('#web_form_edit').on('keydown', '.inp-qtyb', function(e){
            if (e.which == 9 || e.which == 40 || e.which == 38) {
                hitungTotal();
                
            }else if(e.which == 13){
                hitungTotal();
                // $('.inp-qtyb').prop('readonly', true);
            }
        });


        $('#web_form_edit').on('click', '#edit-qty', function(e){
            
            $('.inp-qtyb').prop('readonly', false);
            $('.inp-qtyb').first().focus();
            $('.inp-qtyb').first().select();
            
        });

        $('#input-grid2').on('change', '.inp-qtyb,.inp-subb', function(e){
            hitungTotal(); 
        });

        // PREVIEW saat klik di list data

        $('#table-data tbody').on('click','td',function(e){
            if($(this).index() != 5){
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'GET',
                    url: "{{url('esaku-trans/pembelian-detail')}}",
                    data:{'no_bukti':id},
                    dataType: 'json',
                    success:function(result){
                        if(result.data.status){
                            var data = result.data.data[0];
                            var html = `<tr>
                                <td style='border:none'>No Pembelian</td>
                                <td style='border:none'>`+id+`</td>
                            </tr>
                            <tr>
                                <td>NIK Kasir</td>
                                <td>`+data.nik_user+`</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>`+data.tanggal+`</td>
                            </tr>
                            <tr>
                                <td>Kode Vendor</td>
                                <td>`+data.kode_vendor+`</td>
                            </tr>
                            <tr>
                                <td>No Faktur</td>
                                <td>`+data.no_dokumen+`</td>
                            </tr>
                            <tr>
                                <td>Total Transaksi</td>
                                <td>`+format_number(data.total)+`</td>
                            </tr>
                            <tr>
                                <td>Total PPN</td>
                                <td>`+format_number(data.ppn)+`</td>
                            </tr>
                            <tr>
                                <td>Total Diskon</td>
                                <td>`+format_number(data.diskon)+`</td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <table id='table-det-preview' class='table table-bordered'>
                                        <thead>
                                            <tr>
                                                <th style='width:3%'>No</th>
                                                <th style='width:27%'>Barang</th>
                                                <th style='width:5%'>Stok</th>
                                                <th style='width:10%'>Harga Sebelum</th>
                                                <th style='width:10%'>Harga Jual</th>
                                                <th style='width:10%'>Harga</th>
                                                <th style='width:5%'>Satuan</th>
                                                <th style='width:5%'>Qty</th>
                                                <th style='width:10%'>Disc</th>
                                                <th style='width:15%'>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            `;
                            $('#table-preview tbody').html(html);
                            var det = ``;
                            if(result.data.data_detail.length > 0){
                                var input = '';
                                var no=1;
                                for(var i=0;i<result.data.data_detail.length;i++){
                                    var line =result.data.data_detail[i];
                                    input += "<tr>";
                                    input += "<td>"+no+"</td>";
                                    input += "<td >"+line.nama+"</td>";
                                    input += "<td >"+format_number(line.stok)+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.hrg_seb)+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.harga_jual)+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.harga)+"</td>";
                                    input += "<td>"+line.satuan+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.jumlah)+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.diskon)+"</td>";
                                    input += "<td class='text-right'>"+format_number(line.subtotal)+"</td>";
                                    input += "</tr>";
                                    no++;
                                }
                                $('#table-det-preview tbody').html(input);
                            }
                            $('#modal-preview-id').text(id);
                            $('#modal-preview').modal('show');
                        }
                    }
                });

            }
        });

        $('.modal-header').on('click','#btn-delete2',function(e){
            var id = $('#modal-preview-id').text();
            $('#modal-preview').modal('hide');
            msgDialog({
                id:id,
                type:'hapus'
            });
        });

        $('.modal-header').on('click', '#btn-edit2', function(){
            var kode= $('#modal-preview-id').text();
            $.ajax({
                type: 'GET',
                url: "{{url('esaku-trans/pembelian-detail')}}",
                data:{'no_bukti':kode},
                dataType: 'json',
                success:function(result){
                    $('#id').val(kode);
                    if(result.data.status){
                        var res = result.data;
                        $no_bukti = res.data[0].no_bukti;
                        $('#iniNoBukti').html(res.data[0].no_bukti+"<input type='hidden' value='"+res.data[0].no_bukti+"' name='no_beli' class='form-control' maxlength='200' readonly id='web_form_edit_no_beli'>");
                        $('#iniNIK').html(res.data[0].nik_user+"<input type='hidden' value='"+res.data[0].nik_user+"' name='nik_kasir' class='form-control' maxlength='200' readonly id='web_form_edit_nik'>");
                        $('#totrans').val(toRp(res.data[0].total));    
                        $('#todisk').val(toRp(res.data[0].diskon));    
                        $('#toppn').val(toRp(res.data[0].ppn));    
                        $('#no_faktur').val(res.data[0].no_dokumen);    
                        $('#kode_vendor')[0].selectize.setValue(res.data[0].kode_vendor);
                        var input=``;
                        var no=1;
                        if(res.data_detail.length>0){
                            for(var x=0;x<res.data_detail.length;x++){
                                var line = res.data_detail[x];
                                input += "<tr class='row-barang'>";
                                input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
                                input += "<td>"+line.nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+line.kode_barang+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+parseFloat(line.stok)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+parseFloat(line.hrg_seb)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+parseFloat(line.harga_jual)+"' required></td>";
                                input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+parseFloat(line.harga)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+line.satuan+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(line.kode_barang)+"' readonly></td>";
                                input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+parseFloat(line.jumlah)+"' required></td>";
                                input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+parseFloat(line.diskon)+"' readonly required></td>";
                                input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+parseFloat(line.subtotal)+"' required></td>";
                                input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
                                input += "</tr>";
                                no++;
                            }
                        }
                        
                        $("#input-grid2 tbody").html(input);
                        $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual,.inp-hrgb,.inp-hrgseb').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        
                        hitungTotal();
                    }
                    $('.gridexample').formNavigation();
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                },
                fail: function(xhr, textStatus, errorThrown){
                    msgDialog({
                        id: '',
                        type:'sukses',
                        title: 'warning',
                        text: textStatus
                    });
                }
            });
        });

        $('.modal-header').on('click','#btn-cetak',function(e){
            e.stopPropagation();
            $('.dropdown-ke1').addClass('hidden');
            $('.dropdown-ke2').removeClass('hidden');
        });

        $('.modal-header').on('click','#btn-cetak2',function(e){
            // $('#dropdownAksi').dropdown('toggle');
            e.stopPropagation();
            $('.dropdown-ke1').removeClass('hidden');
            $('.dropdown-ke2').addClass('hidden');
        });

    });

    $(document).on("keypress", 'form', function (e) {
        var code = e.keyCode || e.which;
        // console.log(code);
        if (code == 13) {
            // console.log('Inside');
            e.preventDefault();
            // console.log(this);
            return false;
        } 
    });
    </script>