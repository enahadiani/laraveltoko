<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Daftar Penjualan" tambah="" :thead="array('No Penjualan','Nik Kasir','Tanggal','Total','Action')" :thwidth="array(20,18,18,22,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->

{{-- FORM POS --}}
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
#edit-qty
{
    cursor:pointer;
}

#pbyr
{
    cursor:pointer;
}
.web_form_back {
    position: absolute;
    left: 0;
    bottom: 16px;
}
</style>
<div class="container-fluid mt-3" id="saku-form" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body" id="pos-body">
                    <form class="form" id="web-form-pos" method="POST">
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
                                            <p style="color:#007AFF"><i class="fa fa-user"></i> {{ Session::get('userLog') }} / <span id="no_open"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <h6>Nilai Transaksi</h6>
                                <div class="row float-right">
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{ url('asset_dore/img/edit.png') }}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center">Edit Qty</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center">F7</p>
                                    </div>
                                    <div class="text-left" id="pbyr" style="width: 120px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;">
                                        <img style="width:30px;height:30px;position:absolute" src="{{url('asset_dore/img/debit-card.png')}}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center !important;">Pembayaran</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center !important;">F8</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 60px !important;height:unset !important;"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                                <input type="hidden" id="no_jual" name="no_jual" class="form-control" required readonly>
                            </div>
                            <div class="col-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th style='padding: 3px;width:20%' colspan='2'>
                                            <input type='text' class='form-control' placeholder="Barcode [F1]" id="kd-barang2">
                                        </th>
                                        <th style='padding: 3px;width:20%' colspan='2'>
                                            <select class='form-control' id="kd-barang">
                                                <option value=''>--- Pilih Barang [CTRL+C] ---</option>
                                            </select>
                                        </th>
                                        <th style='padding: 3px;width:5%'>Disc.</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' placeholder='Total Disc.' value="0" name="total_disk" class='form-control currency' id='todisk' required readonly>
                                        </th>

                                        <th style='padding: 3px;width:5%'>Total</th>
                                        <th style='padding: 3px;width:20%'>
                                            <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                        </th>
                                    </tr>
                                </table>
                                <div class="col-12 grid-table" style="overflow-y: scroll;margin:0px; padding:0px;">
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                        <thead>
                                            <tr>
                                                <th>Barang</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Disc</th>
                                                <th style="display:none">PPN</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <button class="btn btn-danger web_form_back" type="button">Back</button>
                                <div class="col-6 mt-2 float-right">
                                    <div class="form-group row">
                                         <label for="judul" class="col-4 col-form-label" style="font-size:16px">Pembayaran</label>
                                         <div class="col-6">
                                             <input type="text" name="total_bayar" min="1" class="form-control currency" id="tobyr" required value="0">
                                             <input type="hidden" style="" name="kembalian" min="1" class="form-control currency" id="kembalian" required readonly>
                                         </div>
                                         <div class="col-2">
                                             <button class="btn btn-info" type="submit" id="btnBayar">Bayar</button>
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
</div>
{{-- END FORM POS --}}

<div id="area_print"></div>

{{-- EDIT MODAL --}}
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
                                <input type='text' class='form-control currency' maxlength='100' id='modal-edit-qty'>
                                <input type='hidden' class='form-control currency' id='modal-edit-ppn'>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' id='edit-submit' class='btn btn-primary'>Simpan</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END EDIT MODAL --}}

{{-- MODAL BAYAR --}}
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
{{-- END MODAL BAYAR --}}

{{-- MODAL BAYAR 2 --}}
<div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
    <div role="document" style="" class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header " style="display:block;height:80px !important">
                <div class="row text-center" style="">
                    <div class="col-md-12">
                        <h6 class="mt-2">Kembalian</h6>
                        <h6 id="modal-no_jual" hidden></h6>
                        <h5 class="text-info" id="modal-kembalian"></h5>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row mb-2" style="">
                    <div class="col-6" style="">
                        Total 
                    </div>
                    <div class="col-6 text-right" id="modal-totrans">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        Diskon 
                    </div>
                    <div class="col-6 text-right" id="modal-diskon">
                    </div>
                </div>
                <!-- <div class="row mb-2">
                    <div class="col-6">
                        PPN 
                    </div>
                    <div class="col-6 text-right" id="modal-ppn">
                    </div>
                </div> -->
                <div class="row mb-2">
                    <div class="col-6">
                        Pembulatan 
                    </div>
                    <div class="col-6 text-right">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        Total Bayar
                    </div>
                    <div class="col-6 text-right" id="modal-tostlhdisk">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Pembayaran
                    </div>
                    <div class="col-6 text-right" id="modal-tobyr">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0;">
            <button id="cetakBtn" type="button" class="btn btn-info btn-block" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">Cetak</button>
            </div>
        </div>
    </div>
</div>
{{-- END MODAL BAYAR 2 --}}


<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
<script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>

<script type="text/javascript">
var $dtBrg = [];
var $dtBrg2 = [];
var count= 0;
var $no_open = "";

$('#kd-barang2').focus();

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
        $('#tobyr').focus();
    }
};

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { return false; }
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
            addBarangSelect();
        }
    }
});

// get barang
(function() {
    $.ajax({
        type:'GET',
        url:"{{url('esaku-master/barang')}}",
        dataType: 'json',
        async: false,
        success: function(result) {
            if(result.status) {
                var select = $('#modal-edit-kode').selectize();
                select = select[0];
                var control = select.selectize;

                var select2 = $('#kd-barang').selectize();
                select2 = select2[0];
                var control2 = select2.selectize;
                control2.clearOptions();

                for(i=0;i<result.daftar.length;i++){
                    control.addOption([{text:result.daftar[i].kode_barang + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_barang}]);
                    control2.addOption([{kd_barang:result.daftar[i].kode_barang, nama:result.daftar[i].nama,barcode:result.daftar[i].barcode}]);
                    $dtBrg[result.daftar[i].kode_barang] = {harga:result.daftar[i].hna,ppn:result.daftar[i].ppn};  
                    $dtBrg2[result.daftar[i].barcode] = {harga:result.daftar[i].hna,nama:result.daftar[i].nama,kd_barang:result.daftar[i].kode_barang,ppn:result.daftar[i].ppn};
                }

            } else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
            } else{
                msgDialog({
                    id: '',
                    type:'sukses',
                    title: 'Error',
                    text: result.data.message
                });
            }
        }
    });
})();

function hitungKembali(){
    var total_stlh = toNilai($('#tostlh').val());
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        kembalian = +total_bayar - +total_stlh;
        if(kembalian < 0) kembalian = 0;  
        $("#kembalian").val(toRp(kembalian));
    }
}

function hitungDisc(){
    var total_trans = toNilai($('#totrans').val());
    var total_disk= toNilai($('#todisk').val());
    var total_stlh = +total_trans - +total_disk;
    $('#tostlh').val(toRp(total_stlh));
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        kembalian = +total_bayar - +total_stlh;  
        if(kembalian < 0) kembalian = 0; 
        $("#kembalian").val(toRp(kembalian));
    }
}

function hitungTotal(){    
    // hitung total barang
    if($('#todisk').val() == ""){        
        $('#todisk').val(0);
    }
    var total_brg = 0;
    var diskon =  toNilai($('#todisk').val());
    // var ppn =0;
    $('.row-barang').each(function(){
        var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
        var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
        var disc = $(this).closest('tr').find('.inp-disc').val();
    
        diskon += +toNilai(disc);
        var subb = (+qtyb * toNilai(hrgb));
        
        $(this).closest('tr').find('.inp-subb').val(toRp(subb));
        total_brg += +subb;
    });
    $('#totrans').val(toRp(total_brg));
    $('#todisk').val(toRp(diskon));

    var total_disk= toNilai($('#todisk').val());
    var total_stlh = +total_brg - total_disk;
        
    $('#tostlh').val(toRp(total_stlh));
    var total_bayar = toNilai($('#tobyr').val());
    if(total_bayar > 0 ){
        if(kembalian < 0) kembalian = 0;
        kembalian = +total_bayar - +total_stlh;
        $("#kembalian").val(toRp(kembalian));
    }
}

function setHarga(id){
    if(id == '' || id == null){
        $('#qty-barang').val('');
        $('#hrg-barang').val('');
    } else {
        $.ajax({
            url: "{{ url('esaku-master/barang') }}/"+id,
            type: "GET",
            dataType: "json",
            async: false,
            success: function (result) {
                harga = result.daftar.hna;
                $('#modal-edit-harga').val(harga);
            }
        });
        $('#modal-edit-qty').focus();
    }
}

function toRp(num){
    if(num < 0){
        return "("+sepNum(num * -1)+")";
    } else {
        return sepNum(num);
    }
}

function setHarga2(id){
    if (id != ""){
        return $dtBrg[id].harga;  
    } else {
        return "";
    }
};

function setPPN(id){
    if (id != ""){
        return $dtBrg[id].ppn;  
    } else {
        return 0;
    }
};

function toNilai(str_num){
    var parts = str_num.split('.');
    number = parts.join('');
    number = number.replace('Rp', '');
    return +number;
};

function setHarga3(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return false;
        } else {
            return $dtBrg2[id].harga;  
        } 
    } else {
        return "";
    }
};

function setPPN2(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].ppn;  
        } 
    } else {
        return 0;
    }
};

function getKode(id){ 
    if (id != ""){
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].kd_barang;  
        }
    } else {
        return "";
    }
};

function setNama(id){
    if (id != ""){  
        if($dtBrg2[id] == undefined){
            return "";
        } else {
            return $dtBrg2[id].nama;  
        }
    } else {
        return "";
    }
};

function addBarangBarcode() {
    var html = '';
    var kd1 = $('#kd-barang2').val();
    var qty1 = 1;
    var disc1 = 0;
    var hrg1 = setHarga3(kd1);
    var kd= getKode(kd1);
    var nama = setNama(kd1);
    var ppn1 = setPPN2(kd1);
    
    if(kd1 == '' || +hrg1 <= 0){
        msgDialog({
            id: '',
            type:'warning',
            text:'Masukkan data barang yang valid'
        });
    } else {
        var qty = qty1;
        var hrg = hrg1;
        var disc = disc1;
        var sub = (+qty * +hrg) - disc;
        var ppn = ppn1;
            
        // cek barang sama
        $('.row-barang').each(function(){
            var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
            var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
            var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
            var disc_temp = $(this).closest('tr').find('.inp-disc').val();
            var ppn_temp = $(this).closest('tr').find('.inp-ppn').val();
            if(kd_temp == kd){
                qty+=+(toNilai(qty_temp));
                disc+=+(toNilai(disc_temp));
                sub=(hrg*qty)-disc;
            }
        });

        html += `<tr class="row-barang">
            <td style="width: 30%;">
                ${nama}
                <input type="hidden" name="kode_barang[]" class="form-control inp-kdb" value="${kd}" readonly>
            </td>    
            <td style="width: 20%;">
                <input type="text" name="harga_barang[]" class="form-control currencies inp-hrgb" value="${toRp(hrg)}" style="text-align: right;" readonly>
            </td>    
            <td style="width: 15%;">
                <input type="text" name="qty_barang[]" class="form-control currencies inp-qtyb" value="${parseFloat(qty)}" style="text-align: right;">    
            </td>    
            <td style="width: 15%;">
                <input type="text" name="sub_barang[]" class="form-control currencies inp-subb" value="${toRp(sub)}" style="text-align: right;" readonly>    
            </td>    
            <td style="width: 10%;">
                <input type="text" name="disc_barang[]" class="form-control currencies inp-disc" value="${toRp(disc)}" style="text-align: right;" readonly>    
                <input type="hidden" name="ppn_barang[]" class="form-control currencies inp-ppn" value="${parseFloat(ppn)}" readonly>    
            </td>    
            <td style="width: 10%;">
                <a href="#" class="btn btn-sm ubah-barang" style="font-size:18px !important;padding:0"><i class="simple-icon-pencil"></i></a>&nbsp;
                <a href="#" class="btn btn-sm hapus-item" style="font-size:18px !important;margin-left:10px;padding:0"><i class="simple-icon-trash"></i></a>
            </td>    
        </tr>`;
            
        $("#input-grid2").append(html);
            
        hitungTotal();
            
        $('#kd-barang2').val('');
        $("#input-grid2 tr:last").focus();
        $('#kd-barang2').focus();
        $('.gridexample').formNavigation();
            
    }
}

function addBarangSelect() {
    var html = '';
    var barangSelect = $('#kd-barang')[0].selectize.getValue();
    var qtySelect = 1;
    var discSelect = 0;
    var hrgSelect = setHarga2(barangSelect);
    var ppnSelect = setPPN(barangSelect);

    if(barangSelect === '' || +barangSelect <= 0) {
        msgDialog({
            id: '',
            type:'warning',
            text:'Masukkan data barang yang valid'
        });
    } else {
        var barangSelected = $('#kd-barang option:selected').val();
        var namaSelected = $('#kd-barang option:selected').text();
        var qtySelected = qtySelect;
        var hrgSelected = hrgSelect;
        var discSelected = discSelect;
        var subSelected = (+qtySelected * +hrgSelected);
        var ppnSelected = ppnSelect;

        $('.row-barang').each(function(){
            var kd_barang = $(this).closest('tr').find('.inp-kdb').val();
            var qty_barang = $(this).closest('tr').find('.inp-qtyb').val();
            var hrg_barang = $(this).closest('tr').find('.inp-hrgb').val();
            var disc_barang = $(this).closest('tr').find('.inp-disc').val();
            var ppnSelected = $(this).closest('tr').find('.inp-ppn').val();
            if(kd_barang == barangSelected){
                qtySelected+=+(toNilai(qty_barang));
                discSelected+=+(toNilai(disc_barang));
                subSelected=(hrgSelected*qtySelected);
                $(this).closest('tr').remove();
            }
        });

        var tgl = "{{date('Y-m-d')}}";
        
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/penjualan-bonus')}}/"+barangSelected+"/"+tgl+"/"+qtySelected+"/"+hrgSelected,
            dataType: 'json',
            async:false,
            success: function(result) {
                qtySelected = result.data.jumlah;
                discSelected = result.data.diskon;
                subSelected = (hrgSelected*qtySelected);
                html += `<tr class="row-barang">
                    <td style="width: 30%;">
                        ${namaSelected}
                        <input type="hidden" name="kode_barang[]" class="form-control inp-kdb" value="${barangSelected}" readonly>
                    </td>    
                    <td style="width: 20%;">
                        <input type="text" name="harga_barang[]" class="form-control currencies inp-hrgb" value="${toRp(hrgSelected)}" style="text-align: right;" readonly>
                    </td>    
                    <td style="width: 15%;">
                        <input type="text" name="qty_barang[]" class="form-control currencies inp-qtyb" value="${parseFloat(qtySelected)}" style="text-align: right;">    
                    </td>    
                    <td style="width: 15%;">
                        <input type="text" name="sub_barang[]" class="form-control currencies inp-subb" value="${toRp(subSelected)}" style="text-align: right;" readonly>    
                    </td>    
                    <td style="width: 10%;">
                        <input type="text" name="disc_barang[]" class="form-control currencies inp-disc" value="${toRp(discSelected)}" style="text-align: right;" readonly>    
                        <input type="hidden" name="ppn_barang[]" class="form-control currencies inp-ppn" value="${parseFloat(ppnSelected)}" readonly>    
                    </td>    
                    <td style="width: 10%;">
                        <a href="#" class="btn btn-sm ubah-barang" style="font-size:18px !important;padding:0"><i class="simple-icon-pencil"></i></a>&nbsp;
                        <a href="#" class="btn btn-sm hapus-item" style="font-size:18px !important;margin-left:10px;padding:0"><i class="simple-icon-trash"></i></a>
                    </td>    
                </tr>`;
                        
                $("#input-grid2").append(html);
                hitungTotal();
                $('#kd-barang')[0].selectize.setValue('');
                $("#input-grid2 tr:last").focus();
                $('.gridexample').formNavigation();
            }
        });
    }
}

function hapusBarang(rowindex){
    $("#input-grid2 tr:eq("+rowindex+")").remove();
    hitungTotal();
}

function ubahBarang(rowindex){
    $('.row-barang').removeClass('set-selected');
    $("#input-grid2 tbody tr:eq("+rowindex+")").addClass('set-selected');

    var kd = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-kdb').val();
    var qty = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-qtyb').val();
    var harga = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-hrgb').val();    
    var disc = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-disc').val(); 
    var ppn = $("#input-grid2 tbody tr:eq("+rowindex+")").find('.inp-ppn').val();

    $('#modal-edit-kode')[0].selectize.setValue(kd);
    $('#modal-edit-kode').val(kd);
    $('#modal-edit-qty').val(qty);
    $('#modal-edit-harga').val(harga);
    $('#modal-edit-disc').val(disc);
    $('#modal-edit-ppn').val(ppn);
        
    $('#modal-edit').modal('show');
    var selectKode = $('#modal-edit-kode').data('selectize');
    selectKode.disable();
    $('.gridexample').formNavigation();
}

function closePrint() {
    document.body.removeChild(this.__container__);
}

function setPrint() {
    this.contentWindow.__container__ = this;
    this.contentWindow.onbeforeunload = closePrint;
    this.contentWindow.onafterprint = closePrint;
    this.contentWindow.focus();
    this.contentWindow.print();
}

function printPage(sURL) {
    var oHiddFrame = document.createElement("iframe");
    oHiddFrame.onload = setPrint;
    oHiddFrame.style.position = "fixed";
    oHiddFrame.style.right = "0";
    oHiddFrame.style.bottom = "0";
    oHiddFrame.style.width = "0";
    oHiddFrame.style.height = "0";
    oHiddFrame.style.border = "0";
    oHiddFrame.src = sURL;
    document.body.appendChild(oHiddFrame);
}

function resetForm() {
    $('#kd-barang2').val('');
    $('#todisk').val(0);
    $('#totrans').val(0);
    $('#input-grid2 tbody').empty();
    $('#tobyr').val(0);
    $('#tostlh').val(0);
    $('#kembalian').val(0);
    $('#inp-byr').val(0);
    $('#param').val('');
}

$('#cetakBtn').click(function(){
    var no_jual = $('#modal-no_jual').text();
    printPage("{{ url('esaku-trans/nota') }}/?no_jual="+no_jual);
    resetForm();
    $('#modal-bayar2').modal('hide');
}); 

$('#todisk').change(function(e){
    e.preventDefault();
    hitungTotal();
})

$('#kd-barang2').scannerDetection({
    timeBeforeScanTest: 200, // wait for the next character for upto 200ms
    avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
    preventDefault: true,
    endChar: [13],
    onComplete: function(barcode, qty){
    validScan = true;
        $('#kd-barang2').val(barcode);
        addBarangBarcode();
    },
    onError: function(string, qty) {
        console.log('barcode-error');
    }	
});

$('#input-grid2').on('keydown', '.inp-qtyb', function(e){
    if (e.which == 9 || e.which == 40 || e.which == 38) {
        hitungTotal();   
    } else if(e.which == 13){
        hitungTotal();
        $('.inp-qtyb').prop('readonly', false);
    }
});

$('#web-form-pos').on('click', '#edit-qty', function(e){
    $('.inp-qtyb').prop('readonly', false);
    $('.inp-qtyb').first().focus();
    $('.inp-qtyb').first().select(); 
});

$('#web-form-pos').on('click', '#pbyr', function(e){
    $('#tobyr').focus(); 
});

$('#tobyr').change(function(){
    hitungKembali();
});

$('#btn-ok').click(function(){
    var tot = toNilai($('#inp-byr').val());
    $('#tobyr').val(toRp(tot));
    hitungTotal();
    $('#modal-bayar').modal('hide');
    $('#inp-byr').val(0);
    $('#param').val('');
});

$('#kembalian').keydown(function(e){
    var value = String.fromCharCode(e.which) || e.key;
        
    if (e.key == 'ArrowUp') {
        e.preventDefault();
        $('#tobyr').focus();
    }
});

$('#btn-byr').click(function(){
    $('#modal-bayar').modal('show');
});

$("#input-grid2").on("dblclick", '.row-barang',function(){
    var index = $(this).closest('tr').index();
    ubahBarang(index);
});

$("#input-grid2").on("click", '.ubah-barang', function(){
    var index = $(this).closest('tr').index();
    ubahBarang(index);
});
    
$("#input-grid2").on("click", '.hapus-item', function(){
    var index = $(this).closest('tr').index();
    hapusBarang(index);
});

$(document).on("keypress", '#modal-bayar2', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        $('#cetakBtn').click();
    }
});

$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    } 
});

$(':input[type="number"], .currency').on('keydown', function (e){
    var value = String.fromCharCode(e.which) || e.key;
    if (!/[0-9\.]/.test(value) //angka dan titik
        && e.which != 190 // .
        && e.which != 116 // F5
        && e.which != 8   // backspace
        && e.which != 9   // tab
        && e.which != 13   // enter
        && e.which != 46  // delete
        && (e.which < 37 || e.which > 40) // arah 
        && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
    ) {
        e.preventDefault();
        return false;
    }
});
// LIST DATA
var action_html = "<a href='#' title='Edit' class='web_datatable_edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;";

var dataTable = generateTable(
    "table-data",
    "{{ url('esaku-trans/daftar-penjualan') }}", 
    [
        {'targets': 4, data: null, 'defaultContent': action_html, 'className': 'text-center' },
        { 
            'targets': 3, 
            'className': 'text-right',        
            'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
        }
    ],
    [
        { data: 'no_jual' },
        { data: 'nik_user' },
        { data: 'tanggal',  render: function(data,type,row){
            var split = data.split('-');
            var tgl = split[2];
            var bln = split[1];
            var tahun = split[0];
            return tgl+"/"+bln+"/"+tahun;
        } },
        { data: 'nilai' },
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

// BACK FORM
$('#saku-form').on('click', '.web_form_back', function(){
    $('#saku-form').hide();
    $('#saku-datatable').show();
});
// END BACK FORM

// EDIT DATA
$('#saku-datatable').on('click', '.web_datatable_edit', function() {
    $("#input-grid2 tbody").empty();
    var no_bukti = $(this).closest('tr').find('td:eq(0)').text();  
    editData(no_bukti);
})

function editData(no_bukti) {
    $.ajax({
        type: 'GET',
        url: "{{url('esaku-trans/daftar-penjualandetail')}}",
        data: { no_bukti: no_bukti },
        dataType: 'json',
        success:function(result){
            var res = result.data;
            var row = res.data[0]
            if(res.status) {
                $no_open = row.no_open;
                $('#no_bukti').text(row.no_jual);
                $('#no_jual').val(row.no_jual);
                $('#no_open').text(row.no_open)
                $('#tostlh').val(parseFloat(row.total_trans))
                $('#todisk').val(parseFloat(row.diskon))
                $('#totrans').val(parseFloat(row.nilai))
                $('#tobyr').val(parseFloat(row.tobyr))

                if(res.data_detail.length > 0) {
                    var html = '';
                    for(var i=0;i<res.data_detail.length;i++) {
                        var row2 = res.data_detail[i]
                        html += `<tr class="row-barang">
                            <td style="width: 30%;">
                                ${row2.nama_brg}
                                <input type="hidden" name="kode_barang[]" class="form-control inp-kdb" value="${row2.kode_barang}" readonly>
                            </td>    
                            <td style="width: 20%;">
                                <input type="text" name="harga_barang[]" class="form-control currencies inp-hrgb" value="${parseFloat(row2.harga)}" readonly>
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" name="qty_barang[]" class="form-control currencies inp-qtyb" value="${parseFloat(row2.jumlah)}">    
                            </td>    
                            <td style="width: 15%;">
                                <input type="text" name="sub_barang[]" class="form-control currencies inp-subb" value="${parseFloat(row2.subtotal)}" readonly>    
                            </td>    
                            <td style="width: 10%;">
                                <input type="text" name="disc_barang[]" class="form-control currencies inp-disc" value="${parseFloat(row2.diskon)}" readonly>    
                                <input type="hidden" name="ppn_barang[]" class="form-control currencies inp-ppn" value="${parseFloat(row2.ppn)}" readonly>    
                            </td>    
                            <td style="width: 10%;">
                                <a href="#" class="btn btn-sm ubah-barang" style="font-size:18px !important;padding:0"><i class="simple-icon-pencil"></i></a>&nbsp;
                                <a href="#" class="btn btn-sm hapus-item" style="font-size:18px !important;margin-left:10px;padding:0"><i class="simple-icon-trash"></i></a>
                            </td>    
                        </tr>`
                    }
                    $("#input-grid2").append(html);

                    $('.currencies').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { return false; }
                    });
                }

                $('.gridexample').formNavigation();
                $('#saku-datatable').hide();
                $('#saku-form').show();
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
}
// EDIT DATA

// EDIT MODAL
$('#edit-submit').click(function(e){
    e.preventDefault();
    
    var html = '';
    var hrg = toNilai($('#modal-edit-harga').val());
    var ppn = toNilai($('#modal-edit-ppn').val());
    var qty = toNilai($('#modal-edit-qty').val());
    var disc = toNilai($('#modal-edit-disc').val());
    var kd = $('#modal-edit-kode option:selected').val();
    var nama = $('#modal-edit-kode option:selected').text();
    var split = nama.split('-')
    var sub = (+qty * +hrg);
    var tgl = "{{date('Y-m-d')}}";

    $.ajax({
        type:'GET',
        url:"{{url('esaku-trans/penjualan-bonus')}}/"+kd+"/"+tgl+"/"+qty+"/"+hrg,
        dataType: 'json',
        async:false,
        success: function(result) {
            qty=result.data.jumlah;
            disc=result.data.diskon;
            sub = (hrg*qty);

            html += `<tr class="row-barang">
                <td style="width: 30%;">
                    ${split[1]}
                    <input type="hidden" name="kode_barang[]" class="form-control inp-kdb" value="${kd}" readonly>
                </td>    
                <td style="width: 20%;">
                    <input type="text" name="harga_barang[]" class="form-control currencies inp-hrgb" value="${toRp(hrg)}" style="text-align: right;" readonly>
                </td>    
                <td style="width: 15%;">
                    <input type="text" name="qty_barang[]" class="form-control currencies inp-qtyb" value="${parseFloat(qty)}" style="text-align: right;">    
                </td>    
                <td style="width: 15%;">
                    <input type="text" name="sub_barang[]" class="form-control currencies inp-subb" value="${toRp(sub)}" style="text-align: right;" readonly>    
                </td>    
                <td style="width: 10%;">
                    <input type="text" name="disc_barang[]" class="form-control currencies inp-disc" value="${toRp(disc)}" style="text-align: right;" readonly>    
                    <input type="hidden" name="ppn_barang[]" class="form-control currencies inp-ppn" value="${parseFloat(ppn)}" readonly>    
                </td>    
                <td style="width: 10%;">
                    <a href="#" class="btn btn-sm ubah-barang" style="font-size:18px !important;padding:0"><i class="simple-icon-pencil"></i></a>&nbsp;
                    <a href="#" class="btn btn-sm hapus-item" style="font-size:18px !important;margin-left:10px;padding:0"><i class="simple-icon-trash"></i></a>
                </td>    
            </tr>`;
                    
            $('.set-selected').closest('tr').remove();
            $("#input-grid2").append(html);
            hitungTotal();    
            $('.gridexample').formNavigation();
            $('#modal-edit').modal('hide');
        }
    });
});
// END EDIT MODAL

// SAVE FORM
$('#web-form-pos').submit(function(e){
    e.preventDefault();
    var totrans=toNilai($('#totrans').val());
    var todisk=toNilai($('#todisk').val());
    var tostlh=toNilai($('#tostlh').val());
    var tobyr=toNilai($('#tobyr').val());
    var kembalian=tobyr-tostlh;
    
    if(totrans <= 0){
        msgDialog({
            id: '',
            type:'sukses',
            title: 'Error',
            text:'Total Transaksi tidak valid. Total Transaksi tidak boleh kurang dari atau sama dengan 0'
        });
    } else if(tobyr <= 0) {
        msgDialog({
            id: '',
            type:'sukses',
            title: 'Error',
            text:'Total Bayar tidak valid. Total Bayar tidak boleh kurang dari atau sama dengan 0'
        });
    } else if(kembalian < 0) {
        msgDialog({
            id: '',
            type:'sukses',
            title: 'Error',
            text:'Total Bayar kurang dari Total Transaksi'
        });
    } else if($no_open == "" || $no_open == "-") {
        msgDialog({
            id: '',
            type:'warning',
            text:'Anda belum melakukan open kasir'
        });
    } else {
        var formData = new FormData(this);
        formData.append('no_open', $no_open);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }

        $.ajax({
            type: 'POST',
            url: "{{url('esaku-trans/penjualan-ubah')}}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if(result.data.status){
                    $('#modal-totrans').text(sepNum(totrans));
                    $('#modal-diskon').text(sepNum(todisk)); 
                    $('#modal-tostlhdisk').text(sepNum(tostlh));
                    $('#modal-tobyr').text(sepNum(tobyr));
                    $('#modal-kembalian').text(sepNum(kembalian));
                    $('#modal-no_jual').text(result.data.no_jual);
                    $('#modal-bayar2').modal('show');
                } else if(!result.data.status && result.data.message === "Unauthorized") {
                    window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                } else {
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
});
// END SAVE FORM
</script>