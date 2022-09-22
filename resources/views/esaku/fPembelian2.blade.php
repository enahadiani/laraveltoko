<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
    .dataTables_scrollBody th{
        padding: 0px 8px !important;
    }
    #input-barang, .dataTable {
        border-collapse: collapse !important;
    }
</style>
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
                                            <p>{{ date("Y-m-d H:i:s") }}</p>
                                            <p style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6>Nilai Transaksi</h6>
                                <div class="row float-right">
                                    
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 60px !important;height:unset !important"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
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
                                            <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="col-12 grid-table" style="overflow-y: scroll; margin:0px; padding:0px;">
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-barang">
                                        <thead>
                                            <tr>
                                                <th >No</th>
                                                <th >Barang</th>
                                                <th >Stok</th>
                                                <th style="width:100px !important">Harga Sebelum</th>
                                                <th style="width:100px !important">Harga Jual</th>
                                                <th style="width:100px !important">Harga</th>
                                                <th >Satuan</th>
                                                <th style="width:80px !important">Qty</th>
                                                <th style="width:100px !important">Disc</th>
                                                <th style="width:100px !important">Subtotal</th>
                                                <th >Kode Akun</th>
                                                <th >Kode Barang</th>
                                                <th >No Urut</th>
                                                <th style="width:100px !important"></th>
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
                                            <input type="text" name="keterangan" class='form-control' id='keterangan' required >
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                         <label for="judul" class="col-1 col-form-label" >Disc</label>
                                         <div class="col-2">
                                            <input type="text" name="total_disk" min="1" class='form-control currency' id='todisk' required value="0">
                                         </div>
                                         <label for="judul" class="col-1 col-form-label" >PPN</label>
                                         <div class="col-3">
                                            <div class="input-group mb-3">
                                                <input type="text" name="total_ppn" min="1" class='form-control currency' id='toppn' required value="0" style="border-bottom-right-radius: 0 !important;border-top-right-radius: 0 !important;">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" id="getPPN" type="button" style="border-bottom-left-radius: 0 !important;border-top-left-radius: 0 !important;padding: 0.1rem 0.85rem;"><i class="simple-icon-refresh" style="font-size:18px !important"></i></button>
                                                </div>
                                            </div>
                                         </div>
                                         <label for="judul" class="col-2 col-form-label" >No Faktur</label>
                                         <div class="col-2">
                                            <input type="text" name="no_faktur" class='form-control ' id='no_faktur' required>
                                         </div>
                                         <div class="col-1">
                                            <button class="btn btn-info" type="submit" id="btnBayar">Simpan</button>
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
                        <input type='hidden' class='form-control' readonly id='modal-edit-no_urut'>
                        <div class="form-group row mt-40">
                            <label for="modal-edit-kode" class="col-3 col-form-label">Barang</label>
                            <div class="col-9">
                                <select class='form-control' id='modal-edit-kode' readonly>
                                    <option value=''>--- Pilih Barang ---</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-saldo" class="col-3 col-form-label">Stok</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly id='modal-edit-saldo'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-harga_seb" class="col-3 col-form-label">Harga Sebelum</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly id='modal-edit-harga_seb'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-hrgjual" class="col-3 col-form-label">Harga Jual</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' id='modal-edit-hrgjual'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-harga" class="col-3 col-form-label">Harga</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' readonly id='modal-edit-harga'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-disc" class="col-3 col-form-label">Disc</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency' id='modal-edit-disc' >
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-qty" class="col-3 col-form-label">Qty</label>
                            <div class="col-9">
                                <input type='text' class='form-control currency ' id='modal-edit-qty'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label for="modal-edit-subb" class="col-3 col-form-label">Subtotal</label>
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
            $('.inp-hrgjual').prop('readonly', false);
            $('.inp-subb').prop('readonly', false);
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
        gridReload();
        $('#todisk').val(0);
        $('#toppn').val(0);
        $('#no_faktur').val('');
        $('#modal-bayar2').modal('hide');
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

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/pembelian-barang')}}",
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
                        $dtBrg[res[i].kode_barang] = {harga:res[i].harga_seb,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};  
                        $dtBrg2[res[i].barcode] = {harga:res[i].harga_seb,nama:res[i].nama,kd_barang:res[i].kode_barang,satuan:res[i].satuan,kode_akun:res[i].kode_akun,saldo:res[i].saldo,hrgjual:res[i].harga};
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
        var data = grid.rows().data();
        $.each( data, function( key, value ) {
            var qtyb = value.qty_barang;
            var disc = value.disc_barang;
            var subb = value.sub_barang;
            total_brg += +parseFloat(subb);
        });
        $('#totrans').val(toRp(total_brg));

        var total_disk= toNilai($('#todisk').val());
        var total_stlh = +total_brg - +total_disk;
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

    function hapusBarang(no_urut,kode_barang){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/pembelian-detail') }}",
            dataType: 'json',
            data: { no_urut: no_urut, kode_barang: kode_barang, nik_user: "{{ Session::get('nikUser') }}"},
            async:false,
            success:function(result){
                if(result.status){
                    gridReload();
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.message
                    });
                }
            }
        });
    }

    //grid
    var grid = $("#input-barang").DataTable({
        destroy: true,
        paging:false,
        data: [],
        columns:[
            { data: 'no' },
            { data: 'nama_barang' },
            { data: 'stok_barang'},
            { data: 'harga_seb' },
            { data: 'harga_jual' },
            { data: 'harga_barang' },
            { data: 'satuan_barang' },
            { data: 'qty_barang' },
            { data: 'disc_barang' },
            { data: 'sub_barang' },
            { data: 'kode_barang' },
            { data: 'kode_akun' },
            { data: 'no_urut' },
        ],
        columnDefs: [
            {
                "targets": 13,
                "data": null,
                "class":"text-center",
                "render": function ( data, type, row, meta ) {
                    return "<a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i>";
                }
            },
            {
                "targets": [10,11,12],
                "visible": false,
                "searchable": false
            },
            {   'targets': [2,3,4,5,6,7,8,9],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }, 
        ],
        ordering: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
    });

    function clearTmp(){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/pembelian-detail-tmp') }}/",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    grid.clear().draw();                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.message
                    });
                }
            }
        });
    }

    clearTmp();

    $("#input-barang tbody").on("click", '.hapus-item', function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        var data = grid.row(index).data();
        hapusBarang(data.no_urut,data.kode_barang);
    });

    function ubahBarang(rowindex){
        var data = grid.row(rowindex).data();

        var kd = data.kode_barang;
        var no_urut = parseInt(data.no_urut);
        var qty = parseInt(data.qty_barang);
        var harga = parseInt(data.harga_barang);  
        var harga_seb = parseInt(data.harga_seb); 
        var harga_jual = parseInt(data.harga_jual);  
        var saldo = parseInt(data.stok_barang);    
        var disc = parseInt(data.disc_barang);
        var sub = parseInt(data.sub_barang);

        $('#modal-edit-no_urut').val(no_urut);
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
        var kode_akun = setAkun(kd1);
        var satuan = setSatuan(kd1);
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
            var param = {
                nik_user : "{{ Session::get('nikUser') }}",
                kode_akun : kode_akun,
                kode_barang : kd,
                harga_jual : hrgjual,
                harga_seb : hrg_seb,
                stok_barang : saldo,
                qty_barang : qty,
                harga_barang : hrg,
                satuan_barang : satuan,
                disc_barang : disc,
                sub_barang : 0
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-trans/pembelian-detail') }}",
                dataType: 'json',
                async:false,
                contentType: 'application/json',
                data: JSON.stringify(param),
                success:function(result){
                    if(result.data.status){
                        gridReload();
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                }
            });
        
            $('#kd-barang')[0].selectize.setValue('');
            $('.gridexample').formNavigation();
        }
    }

    function gridReload(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/pembelian-detail-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                grid.clear().draw();
                if(result.status){
                    if(result.data.length > 0){
                        grid.rows.add(result.data).draw(false);
                        grid.columns.adjust().draw();
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    hitungTotal();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }
            }
        });
    }

    function addBarangBarcode(){

        var kd1 = $('#kd-barang2').val();
        var qty1 = 1;
        var disc1 = 0;
        var hrg1 = setHarga3(kd1);
        
        var hrgjual = setHrgJual2(kd1);
        var kd=getKode(kd1);
        var saldo = setSaldo(kd1);
        var hrgjual = setHrgJual(kd1);
        var kode_akun = setAkun(kd1);
        var satuan = setSatuan(kd1);
        // || +qty1 <= 0 || +hrg1 <= 0
        if(kd1 == '' ){
            msgDialog({
                id: '',
                type:'warning',
                text:'Masukkan data barang yang valid'
            });
        }else{
            var qty = qty1;
            var hrg_seb = hrg1;
            var hrg=0;
            var disc = disc1;
            var sub=0;
            
            var param = {
                nik_user : "{{ Session::get('nikUser') }}",
                kode_akun : kode_akun,
                kode_barang : kd,
                harga_jual : hrgjual,
                harga_seb : hrg_seb,
                stok_barang : saldo,
                qty_barang : qty,
                harga_barang : hrg,
                satuan_barang : satuan,
                disc_barang : disc,
                sub_barang : 0
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-trans/pembelian-detail') }}",
                dataType: 'json',
                async:false,
                contentType: 'application/json',
                data: JSON.stringify(param),
                success:function(result){
                    if(result.data.status){
                        gridReload();
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                }
            });
        
            $('#kd-barang2').val('');
            $('#kd-barang2').focus();
            $('.gridexample').formNavigation();
        }
    }

    $('#todisk').change(function(){
        hitungDisc();
        hitungTotal();
    });

    $('#toppn').change(function(){
        hitungTotal();
    });

    $('#getPPN').click(function(){
        getPPN();
    });

    $("#input-barang tbody").on("dblclick","td,tr",function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });

    $("#input-barang tbody").on("click", '.ubah-barang', function(){
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

        var no_urut = toNilai($('#modal-edit-no_urut').val());
        var hrg = toNilai($('#modal-edit-harga').val());
        var hrg_seb = toNilai($('#modal-edit-harga_seb').val());
        var hrg_jual = toNilai($('#modal-edit-hrgjual').val());
        var saldo = toNilai($('#modal-edit-saldo').val());
        var qty = toNilai($('#modal-edit-qty').val());
        var disc = toNilai($('#modal-edit-disc').val());
        var kd = $('#modal-edit-kode option:selected').val();
        var nama = $('#modal-edit-kode option:selected').text();
        var sub =  toNilai($('#modal-edit-subb').val());
        var hrg= sub/qty;

        param = {
            nik_user : "{{ Session::get('nikUser') }}",
            no_urut : no_urut,
            harga_barang : hrg,
            harga_seb : hrg_seb,
            harga_jual : hrg_jual,
            stok_barang : saldo,
            qty_barang : qty,
            disc_barang : disc,
            kode_barang : kd,
            sub_barang : sub
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/pembelian-detail-ubah') }}",
            dataType: 'json',
            async:false,
            contentType: 'application/json',
            data: JSON.stringify(param),
            success:function(result){
                if(result.data.status){
                    gridReload();
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }
                else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
                
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            complete: function (xhr) {
                $('.progress').addClass('hidden');
            }
        });
        
        hitungTotal();
        $('.gridexample').formNavigation();
        $('#modal-edit').modal('hide');
    });

    $('#web-form-pos').submit(function(e){
        e.preventDefault()
        hitungTotal();
        var barang = $('#input-barang tr').length;
        var totrans=toNilai($('#totrans').val());
        var todisk=toNilai($('#todisk').val());
        var tostlh=toNilai($('#tostlh').val());
        var toppn=toNilai($('#toppn').val());
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
                url: "{{url('esaku-trans/pembelian')}}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if(result.data.status){
                        getNota(result.data.no_bukti);
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
            $('.inp-hrgjual').prop('readonly', false);
            $('.inp-subb').prop('readonly', false);
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
        window.open("{{ url('esaku-trans/pembelian-nota') }}/?no_bukti="+no_bukti); 
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

    $('#modal-edit').on('change', '#modal-edit-qty,#modal-edit-subb', function(e){
        var qty = $('#modal-edit-qty').val();
        var subb = $('#modal-edit-subb').val();
        var hrg = Math.round(toNilai(subb)/toNilai(qty),0);
        $('#modal-edit-harga').val(hrg);
    });

</script>