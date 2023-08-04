<?php
date_default_timezone_set('Asia/Jakarta');
?>
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body">
                    <form class="form form-beli-ket" id="web-form-pos" method="POST">
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
                                        <p>{{$new_time = date("Y-m-d H:i:s", strtotime('+7 hours', strtotime(date("Y-m-d H:i:s"))))}}</p>
                                            <p style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6>Nilai Transaksi</h6>
                                <div class="row float-right">
                                    <!-- <div class="text-left" id="gen-harga" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px;cursor:pointer">
                                        <span style="line-height:1.5;font-size: 11px !important;margin-bottom: 0 !important;text-align:center">Generate Harga</span>
                                    </div> -->
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{ url('asset_dore/img/edit.png') }}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center">Edit Qty</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center">F7</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 60px !important;height:unset !important"  name="total_stlh" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                            <div class="col-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2" >
                                        </th>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <select class='form-control' id="kd-barang">
                                                <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:25%' colspan='2'>
                                            <select class='form-control' name="kode_vendor" id="kd-vendor">
                                                <option value=''>--- Pilih Vendor ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:5%'>Total</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' name="total_trans" class='form-control currency' id='totrans' required readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="col-12 grid-table" style="overflow-y: scroll; margin:0px; padding-bottom;10px">
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                        <tr>
                                            <th style='width:3%'>No</th>
                                            <th style='width:20%'>Barang</th>
                                            <th style='width:5%'>Stok</th>
                                            <th style='width:10%'>Harga Sebelum</th>
                                            <th style='width:7%'>Harga Jual</th>
                                            <th style='width:7%'>Harga</th>
                                            <th style='width:5%'>Satuan</th>
                                            <th style='width:6%'>Qty</th>
                                            <th style='width:7.5%'>Subtotal</th>
                                            <th style='width:6.5%'>Disc</th>
                                            <th style='width:5%'></th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 mt-2 float-right">
                                    <div class="form-group row">
                                         <label for="judul" class="col-2 col-form-label" ></label>
                                         <div class="col-10">
                                            <input type="text" name="" class='form-control' id=''  hidden >
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                         <label for="judul" class="col-2 col-form-label" ></label>
                                         <div class="col-10">
                                            <input type="text" name="" class='form-control' id=''  hidden >
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                         <label for="judul" type='hidden' class="col-2 col-form-label" >Biaya Tambahan</label>
                                         <div class="col-2">
                                            <input type="text" name="total_disk" class='form-control currency' id='todisk' type='hidden' required value="0" readonly>
                                         </div>
                                         <label for="judul" class="col-1 col-form-label" >No Faktur</label>
                                         <div class="col-2">
                                            <input type="text" name="no_faktur" class='form-control ' id='no_faktur' required>
                                         </div>
                                         <label for="judul" class="col-1 col-form-label" >Keterangan</label>
                                         <div class="col-2">
                                            <input type="text" name="keterangan" class='form-control ' id='keterangan' required>
                                         </div>
                                         <div class="col-2" >
                                            <button class="btn btn-info float-right" type="submit" id="btnBayar">Simpan</button>
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

<!-- FORM MODAL BAYAR -->
<div class='modal' id='modal-bayar' tabindex='-1' role='dialog'>
    <div class='modal-dialog modal-sm' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Pilih Nominal</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                </button>
            </div>
            <div class='modal-body'>
                <div class='row mb-2' style="text-align: center;">
                <a class="btn btn-lg btn-secondary" id="nom0" style="width: 126px;">Uang Pas</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom1' style="width: 126px;">1.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom2' style="width: 126px;">2.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom3' style="width: 126px;">5.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom4' style="width: 126px;">10.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom5' style="width: 126px;">20.000</a></div>
                <div class='row mb-2'><a class="btn btn-lg btn-secondary" id='nom6' style="width: 126px;">50.000</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-lg btn-secondary" id='nom7' style="width: 126px;">100.000</a></div>
                <div class='form-group row'>
                    <label for="judul" class="col-3 col-form-label">Nominal Bayar</label>
                    <div class="col-9">
                    <input type='text' class='form-control currency' maxlength='100' id='inp-byr' readonly>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class="col-9">
                    <input type='hidden' class='form-control' id='param' readonly>
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
            <button type='button' id='btn-ok' class='btn btn-success'>OK</button>
            <button type='button' id='btn-clear' class='btn btn-default'>C</button>
            </div>
        </div>
    </div>
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
                                <input type='text' class='form-control currency' readonly id='modal-edit-harga_seb'>
                                <input type='hidden' class='form-control currency' readonly id='modal-edit-saldo'>
                                <input type='hidden' class='form-control currency' readonly id='modal-edit-hrgjual'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Harga</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly id='modal-edit-harga'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Disc</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' id='modal-edit-disc' readonly >
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="judul" class="col-3 col-form-label">Qty</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency ' id='modal-edit-qty'>
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
                                <!-- //ni_dpp -->
                            <th>Nilai DPP</th> 
                            <th id="total-pembelian"></th>
                        </tr>
                        <tr>
                                <!-- //ni_biaya -->
                            <th>Biaya Tambahan</th> 
                            <th id="total-diskon"></th>
                        </tr>
                        <tr>
                        <!-- //ni_ppn + (ni_biaya - (ni_biaya*100/111)) -->
                            <th>Total PPN</th> 
                            <th id="total-ppn"></th>
                        </tr>
                        <tr>
                                <!-- //ni_hutang -->
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
                            <td id="kasir-bukti" ></td>
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

<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>

<script type="text/javascript">
    $('.gridexample').formNavigation();
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    $('#kd-barang2').focus();
    $('#area_print').hide();

    setHeightFormPOS();
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

    $('#kd-barang').selectize({
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
            var id = val
            if (id != "" && id != null && id != undefined){
                addBarangSelect(id);
            }
        }
    });

    $('#clear-pos').click(function(){
        clearPos();
    })

    function clearPos() {
        var select = $('#kd-vendor').selectize();
        var vendor = select[0].selectize;
        $('#tostlh').val(0);
        vendor.setValue('')
        $('#totrans').val(0);
        $('#input-grid2 tr:not(:first-child)').remove();
        $('#todisk').val(0);
        // $('#toppn').val(0);
        $('#no_faktur').val('');
        $('#modal-bayar2').modal('hide');
    }

    function getNota(no_bukti) {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/pembelian3-non-data-nota')}}",
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

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/pembelian3-non-barang')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
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
                        $dtBrg[res[i].kode_barang] = {harga:res[i].harga_seb,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga,flag_ppn:res[i].flag_ppn};  
                        $dtBrg2[res[i].barcode] = {harga:res[i].harga_seb,nama:res[i].nama,kd_barang:res[i].kode_barang,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga,flag_ppn:res[i].flag_ppn};
                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    function getVendor() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-master/vendor')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var select = $('#modal-edit-kode').selectize();
                    select = select[0];
                    var control = select.selectize;

                    var select2 = $('#kd-vendor').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();

                    for(i=0;i<result.daftar.length;i++){
                        control.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);
                        control2.addOption([{text:result.daftar[i].kode_vendor + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_vendor}]);

                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    function setFlagPPN(id) {
        if (id != ""){
            return $dtBrg[id].flag_ppn;  
        }else{
            return "";
        }
    }

    function setFlagPPN2(id) {
        if (id != ""){
            return $dtBrg[id].flag_ppn;  
        }else{
            return "";
        }
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

    function setHrgJual(id){
        if (id != ""){
            return $dtBrg[id].hrgjual;  
        }else{
            return "";
        }
    
    };  
    function setHrgJual2(id){
        if (id != ""){
            return $dtBrg2[id].hrgjual;  
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
    function setSaldo(id){  
        if (id != ""){
            return $dtBrg[id].saldo;  
        }else{
            return "";
        }
    
    }; 
    function setSaldo2(id){  
        if (id != ""){
            return $dtBrg2[id].saldo;  
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

    var sts_harga = 0;
    function genHarga(){
        $('.row-barang').each(function(){
            var hrgb = removeFormat($(this).closest('tr').find('.inp-hrgb').val());
            var hrg = hrgb * (100/110);
            $(this).closest('tr').find('.inp-hrgb').val(toRp(hrg));
            sts_harga = 1;
        });

        var ppnx = removeFormat($('#toppn').val())*(100/110);
        var discx = removeFormat($('#todisk').val())*(100/110);

        $('#toppn').val(ppnx);
        $('#todisk').val(discx);
        hitungTotal();
    }

    $('#gen-harga').click(function(e){
        e.preventDefault();
        // genHarga();
    });

    function getPPN(){
        var todisk = removeFormat($('#todisk').val());
        var totrans = removeFormat($('#totrans').val());
        var total = totrans - todisk;
        var ppn = (total * 10)/100;
        $("#toppn").val(toRp(ppn));
        // var total2 = total+ppn;
        // $("#tostlh").val(toRp(total2));
    }

    function hitungDisc(){
        var total_trans = removeFormat($('#totrans').val());
        var total_disk= removeFormat($('#todisk').val());
        var total_stlh = +total_trans -total_disk;
        $('#tostlh').val(toRp(total_stlh));   
    }

    function hitungTotal(){
        // hitung total barang
        if($('#todisk').val() == ""){
            
            $('#todisk').val(0);
        }
        var total_brg = 0;
        var total_diskon = 0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
            var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
            var disc = $(this).closest('tr').find('.inp-disc').val();
            
            var subb = removeFormat($(this).closest('tr').find('.inp-subb').val());
            var total_diskon = removeFormat($(this).closest('tr').find('.inp-disc').val());

            if(sts_harga == 0){
                var hrg = subb/removeFormat(qtyb);
                $(this).closest('tr').find('.inp-hrgb').val(number_format(hrg));
            }else{
                var hrg = (removeFormat($(this).closest('tr').find('.inp-subb').val())/removeFormat(qtyb))*(100/110);
                $(this).closest('tr').find('.inp-hrgb').val(number_format(hrg));
                // var subb = hrg * removeFormat(qtyb);
                // $(this).closest('tr').find('.inp-subb').val(number_format(subb));
            }
            total_brg += +subb;
            total_brg -= +total_diskon;
            
        });
        $('#totrans').val(number_format(total_brg));

        var total_disk= removeFormat($('#todisk').val());
        var total_stlh = +total_brg + +total_disk;
        // var total_ppn = removeFormat($('#toppn').val());
        // var total = total_stlh + total_ppn; 
        var total = total_stlh;
        $('#tostlh').val(number_format(total));   
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
                url:"{{url('esaku-trans/pembelian3-non-barang')}}",
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
        $("#input-grid2 tr:eq("+rowindex+")").remove();
        no=1;
        $('.row-barang').each(function(){
            var nom = $(this).closest('tr').find('.no-barang');
            nom.html(no);
            no++;
        });
        hitungTotal();
    }

    $("#input-grid2").on("click", '.hapus-item', function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        hapusBarang(index);
    });

    function ubahBarang(rowindex){
        $('.row-barang').removeClass('set-selected');
        $("#input-grid2 tr:eq("+rowindex+")").addClass('set-selected');

        var kd = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-kdb').val();
        var qty = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-qtyb').val();
        var harga = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgb').val());  
        var harga_seb = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgseb').val()); 
        var harga_jual = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgjual').val());  
        var saldo = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-saldo').val());    
        var disc = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-disc').val();
        var sub = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-subb').val();
        

        $('#modal-edit-kode')[0].selectize.setValue(kd);
        $('#modal-edit-kode').val(kd);
        $('#modal-edit-qty').val(qty);
        $('#modal-edit-harga').val(harga);
        $('#modal-edit-harga_seb').val(harga_seb);
        $('#modal-edit-hrgjual').val(harga_jual);
        $('#modal-edit-saldo').val(saldo);
        $('#modal-edit-disc').val(disc);
        $('#modal-edit-subb').val(sub);
        
        $('#modal-edit').modal('show');
        var selectKode = $('#modal-edit-kode').data('selectize');
        selectKode.disable();

    }

    function addBarangSelect(id=null){

        var kd1 = $('#kd-barang')[0].selectize.getValue();
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga2(kd1);
        var saldo = setSaldo(kd1);
        var hrgjual = setHrgJual(kd1);
        var flag_ppn = setFlagPPN(kd1);
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
                    qty+=+(removeFormat(qty_temp));
                    disc+=+(removeFormat(disc_temp));
                    sub+=+(removeFormat(subb_temp));
                    $(this).closest('tr').remove();
                }
            });

            var no = $('#input-grid2 tr:last').index()+1;
            var input = "";
            
            input = "<tr class='row-barang'>";
            input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
            input += "<td>"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control' currency2 value='"+toRp(saldo)+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control' currency2  value='"+toRp(hrg_seb)+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+toRp(hrgjual)+"' required></td>";
            input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control' currency2 value='"+toRp(hrg)+"' readonly required></td>";
            input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
            input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
            input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency2'  value='"+sub+"' required></td>";
            input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control '  value='"+disc+"'  required readonly></td>";
            input += "<td class='text-center'><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></a><input type='hidden' name='flag_ppn[]' value='"+flag_ppn+"'></td>";
            input += "</tr>";
            
            $("#input-grid2").append(input);
            $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual,.inp-saldo,.inp-hrgseb,.inp-hrgb').inputmask("numeric", {
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

    function addBarangBarcode(){

        var kd1 = $('#kd-barang2').val();
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga3(kd1);
        var flag_ppn = setFlagPPN2(kd1);
        
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
                    qty+=+(removeFormat(qty_temp));
                    // hrg+=+(removeFormat(hrg_temp));
                    disc+=+(removeFormat(disc_temp));
                    sub+=+(removeFormat(subb_temp));
                    //todis+=+(hrg*removeFormat(disc_temp))/100;
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
            input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i><input type='hidden' name='flag_ppn[]' value='"+flag_ppn+"'></td>";
            input += "</tr>";
            
            $("#input-grid2").append(input);
            
            $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
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

    function ubahBarang(rowindex){
        $('.row-barang').removeClass('set-selected');
        $("#input-grid2 tr:eq("+rowindex+")").addClass('set-selected');

        var kd = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-kdb').val();
        var qty = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-qtyb').val();
        var harga = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgb').val());  
        var harga_seb = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgseb').val()); 
        var harga_jual = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgjual').val());  
        var saldo = removeFormat($("#input-grid2 tr:eq("+rowindex+")").find('.inp-saldo').val());    
        var disc = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-disc').val();
        var sub = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-subb').val();

        $('#modal-edit-kode')[0].selectize.setValue(kd);
        $('#modal-edit-kode').val(kd);
        $('#modal-edit-qty').val(qty);
        $('#modal-edit-harga').val(harga);
        $('#modal-edit-harga_seb').val(harga_seb);
        $('#modal-edit-hrgjual').val(harga_jual);
        $('#modal-edit-saldo').val(saldo);
        $('#modal-edit-disc').val(disc);
        $('#modal-edit-subb').val(sub);
        
        $('#modal-edit').modal('show');
        var selectKode = $('#modal-edit-kode').data('selectize');
        selectKode.disable();

    }

    $('#todisk').change(function(){
        hitungDisc();
        hitungTotal();
    });

    // $('#toppn').change(function(){
    //     hitungTotal();
    // });

    $('#input-grid2').on('change', '.inp-qtyb,.inp-subb,.inp-disc', function(e){
        hitungTotal(); 
    });

    $('#input-grid2').on('change', '.inp-disc', function(e){
        totalKurangDiskon(); 
    });

    $('#getPPN').click(function(){
        getPPN();
    });

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

    $('#qty-barang').keydown(function(e){
        var value = String.fromCharCode(e.which) || e.key;
        if (e.which == 13) {
            e.preventDefault();
        } 
    });

    $('#edit-submit').click(function(e){
        e.preventDefault();
        
        var hrg = removeFormat($('#modal-edit-harga').val());
        var hrg_seb = removeFormat($('#modal-edit-harga_seb').val());
        var hrg_jual = removeFormat($('#modal-edit-hrgjual').val());
        var saldo = removeFormat($('#modal-edit-saldo').val());
        var qty = removeFormat($('#modal-edit-qty').val());
        var disc = removeFormat($('#modal-edit-disc').val());
        var kd = $('#modal-edit-kode option:selected').val();
        var nama = $('#modal-edit-kode option:selected').text();
        var sub =  removeFormat($('#modal-edit-subb').val());
        var hrg= sub/qty;

        var no = $(".set-selected").closest('tr').find('.no-barang').text();
        var input="";
        input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
        input += "<td >"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
        input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+toRp(saldo)+"' readonly required></td>";
        input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
        
        input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+toRp(hrg_jual)+"'  required></td>";
        input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
        input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
        input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
        input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"' required></td>";
        input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
        input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
        
        $(".set-selected").closest('tr').text('');
        $(".set-selected").closest('tr').append(input);


        $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
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

    $('#web-form-pos').submit(function(e){
        e.preventDefault()
        hitungTotal();
        var barang = $('#input-grid2 tr').length;
        var totrans=removeFormat($('#totrans').val());
        var todisk=removeFormat($('#todisk').val());
        var tostlh=removeFormat($('#tostlh').val());
        // var toppn=removeFormat($('#toppn').val());
        if(totrans <= 0){
            msgDialog({
                id: '',
                type:'sukses',
                title: 'Error',
                text:'Total Transaksi tidak valid. Total Transaksi tidak boleh kurang dari atau sama dengan 0'
            });
            return;
        } else if(barang <= 1) {
            msgDialog({
                id: '',
                type:'sukses',
                title: 'Error',
                text:'Harap mengisi data barang terlebih dahulu'
            });
            return;
        }
        else{
            var formData = new FormData(this);
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
                url: "{{url('esaku-trans/pembelian3-non')}}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if(result.data.status){
                        getNota(result.data.no_bukti);
                        sts_harga = 0;
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
                }
            });
        }
    })

    
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
            addBarangBarcode();
        
        } // main callback function	,
        ,
        // onKeyDetect:true,
        onError: function(string, qty) {
            console.log('barcode-error');
        }	
    });

    $('#cetakBtn').click(function(){
        var no_bukti= $('#modal-nobukti').text();
        window.open("{{ url('esaku-trans/pembelian3-non-nota') }}/?no_bukti="+no_bukti); 
    });

    $('#input-grid2').on('keydown', '.inp-qtyb', function(e){
        if (e.which == 9 || e.which == 40 || e.which == 38) {
            hitungTotal();
            
        }else if(e.which == 13){
            hitungTotal();
            // $('.inp-qtyb').prop('readonly', true);
        }
    });


    $('#web-form-pos').on('click', '#edit-qty', function(e){
       
       $('.inp-qtyb').prop('readonly', false);
       $('.inp-qtyb').first().focus();
       $('.inp-qtyb').first().select();
        
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