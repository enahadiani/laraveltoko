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
.barang-table {
    overflow-y: scroll;
    margin: 0; 
    padding: 0;
    border: 1.5px solid #d6d6d6;
    border-radius: 10px;
}
.table-grid {
    margin: 0 !important;
}
.table-grid tbody td {
    padding: 8px !important;
}
.total-trans-box {
    height: 120px;
    width: 100%;
    background-color: #e9e9e9;
    border-radius: 20px;
    padding: 15px;
}
.btn-helper {
    padding: 8px;
    height: 55px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.btn-helper > .btn-helper-icon {
    margin-top: 8px;
}
.btn-helper > .btn-helper-text {
    margin-top: 8px;
    margin-left: 30px;
}
.btn-helper-text > .label-text {
    display: inline;
    font-size: 16px !important;
}
.right {
    text-align: right;
}
.hidden {
    display: none;
}
.inp-qty {
    width: 90%;
}
.nominal-bayar {
    margin-top: -8px;
    font-weight: bold;
}
.input-bayar {
    height: 40px;
    font-size: 16px !important;
}
.nominal-shortcut {
    display: flex;
    justify-content: flex-end;
    margin-left: 24px !important;
}
.btn-nominal {
    height: 40px !important;
    width: 100%;
    padding: 4px !important;
    font-size: 16px !important;
}
.nominal-bayar-button {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body">
                    <form class="form" id="web-form-pos" method="POST">

                        <div class="row">
                            <div class="col-8">
                                <div class="grid-table barang-table">
                                    <table class="table table-bordered table-condensed table-grid" id="input-grid">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%; text-align: center;">Barang</th>
                                                <th style="width: 15%; text-align: center;">Qty</th>
                                                <th style="width: 10%; text-align: center;">Harga</th>
                                                <th style="width: 10%; text-align: center;">Diskon</th>
                                                <th style="width: 15%; text-align: center;">Harga Akhir</th>
                                                <th style="width: 10%; text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="total-trans-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Total</h6>
                                        </div>
                                        <div class="col-12">
                                            <input type="hidden" name="tot_trans" id="totrans">
                                            <h3 id="total-trans">Rp. 0</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <input type='text' class='form-control' placeholder="Barcode [F1]" id="barcode">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-light btn-helper" id="input-pembayaran">
                                            <div class="btn-helper-icon">
                                                <img style="width:25px;height:25px;position:absolute" src="{{url('asset_dore/img/debit-card.png')}}">
                                            </div>
                                            <div class="btn-helper-text">
                                                <p class="label-text">Pembayaran</p>
                                                <span class="label-text-shortcut">(F8)</span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-light btn-helper" id="edit-qty">
                                            <div class="btn-helper-icon">
                                                <img style="width:25px;height:25px;position:absolute" src="{{ url('asset_dore/img/edit.png') }}">
                                            </div>
                                            <div class="btn-helper-text">
                                                <p class="label-text">Edit Qty</p>
                                                <span class="label-text-shortcut">(F7)</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit-pos" class="hidden"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="area_print"></div>
</div>

{{-- Modal Edit --}}
<div class="modal" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-barang">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Barang</h6>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class="modal-body">
                    <div class="mt-40">
                        <div class="form-group">
                            <label for="judul">Barang</label>
                            <input type="text" class="form-control" id="modal-kode_barang" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Harga Barang</label>
                            <input type="text" class="form-control currency" id="modal-harga" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Qty Barang</label>
                            <input type="text" class="form-control currency" id="modal-qty">
                        </div>
                        <div class="form-group">
                            <label for="judul">Diskon Barang</label>
                            <input type="text" class="form-control currency" id="modal-diskon">
                        </div>
                        <div class="form-group">
                            <label for="judul">Subtotal</label>
                            <input type="text" class="form-control currency" id="modal-subtotal" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-edit">Simpan</button>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Bayar --}}
<div class="modal" id="modal-bayar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row mt-1">
                    <div class="col-12" style="text-align: center;">
                        <p>Total <span id="total-trans-modal">Rp. 0</span></p>
                    </div>
                    <div class="col-12" style="text-align: center;">
                        <p>Potongan <span id="total-potongan">Rp. 0</span></p>
                    </div>
                    <div class="col-12" style="text-align: center;">
                        <p id="total-potongan">Nilai Bayar</p>
                        <h5 id="nominal-bayar" class="nominal-bayar">Rp. 0</h5>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="input-bayar form-control currency" id="input-bayar">
                        </div>
                    </div>
                    <div class="col-12 nominal-shortcut">
                        <div class="p-1">
                            <button id="nominal-1" class="btn btn-light btn-nominal">100.000</button>
                        </div>
                        <div class="p-1">
                            <button id="nominal-2" class="btn btn-light btn-nominal">50.000</button>
                        </div>
                        <div class="p-1">
                            <button id="nominal-3" class="btn btn-light btn-nominal">20.000</button>
                        </div>
                        <div class="p-1">
                            <button id="nominal-4" class="btn btn-light btn-nominal">10.000</button>
                        </div>
                    </div>
                    <div class="col-12 mt-2 nominal-bayar-button">
                        <button type="button" id="submit-bayar" class="btn btn-primary">Bayar Tunai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Kembalian --}}
<div class="modal" id="modal-kembalian" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row mt-1">
                    <div class="col-12" style="text-align: center;">
                        <p id="total-kembalian">Kembalian</p>
                        <h5 id="nominal-kembalian" class="nominal-bayar">Rp. 0</h5>
                    </div>
                    <div class="col-12 mt-2 nominal-bayar-button">
                        <button type="button" id="cetak-bayar" class="btn btn-primary" data-dismiss='modal'>Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>
<script type="text/javascript">
    var scrollform = document.querySelector('.barang-table');
    var keyupFiredCount = 0;
    var $no_open = "";
    var $totDisk = 0;
    var $totTrans = 0;
    var $totByr = 0;
    var $dtBrg = [];
    var $index = 0;
    setHeightFormPOS();
    getNoOpen();
    getBarang();
    new PerfectScrollbar(scrollform);

    $('#barcode').focus();
    $('#area_print').hide();

    function resetForm() {
        $('#input-grid tbody').empty();
        $('#totrans').val(0);
        $('#total-trans').text("Rp. 0");
        $('#barcode').val('');
        $('#modal-kode_barang').val('');
        $('#modal-harga').val(0);
        $('#modal-qty').val(0);
        $('#modal-diskon').val(0);
        $('#modal-subtotal').val(0);
        $('#total-trans-modal').text("Rp. 0");
        $('#total-potongan').text("Rp. 0");
        $('#nominal-bayar').text("Rp. 0");
        $('#input-bayar').val(0);
    }

    function cekBarang(kode_barang) {
        var cek = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return cek.length;
    }

    function displayNamaBarang(kode_barang) {
        var display = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return display[0].displayNama;
    }

    function getNama(kode_barang) {
        var nama = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return nama[0].nama;
    }

    function getHarga(kode_barang) {
        var harga = $dtBrg.filter(index => kode_barang.includes(index.kode));
        return parseFloat(harga[0].harga);
    }

    function cekDiskondanBonus(kode_barang, callback) {
        var tanggal = "{{ date('Y-m-d')}}";
        var disc = 0;
        var qty = 1;
        var harga = getHarga(kode_barang);
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/penjualan-bonus')}}/"+kode_barang+"/"+tanggal+"/"+qty+"/"+harga,
            dataType: 'json',
            success: function(result) {
                if(result.status) {
                    disc = result.data.diskon;
                    qty = result.data.jumlah
                }
                callback(kode_barang, disc, qty, harga);        
            }
        });
    }

    function tambahBarang(kode_barang, disc, qty, harga) {
        var cek = cekBarang(kode_barang);
        if(cek == 0) {
            alert('Barcode barang tidak ditemukan')
            return;
        }
        var input = "";
        var nama = getNama(kode_barang);
        var displayTable = kode_barang+"-"+nama;
        var subtotal = (qty * harga) - disc;

        $('.row-grid').each(function(){
            var kodeBrgInTtable = $(this).closest('tr').find('.inp-kode').val();
            var hargaBrgInTtable = $(this).closest('tr').find('.span-harga').text();
            var qtyBrgInTtable = $(this).closest('tr').find('.inp-qty').val();
            var diskBrgInTtable = $(this).closest('tr').find('.span-diskon').text();

            if(kode_barang == kodeBrgInTtable) {
                qty = qty + toNilai(qtyBrgInTtable);
                disc = disc + toNilai(diskBrgInTtable);
                subtotal = (harga * qty) - disc;
                $(this).closest('tr').remove();
            }
        });

        input += "<tr class='row-grid'>";
        input += "<td class='td-kode'><span class='span-kode'>"+displayTable+"</span><input type='hidden' name='kode_barang[]' value='"+kode_barang+"' class='inp-kode' readonly></td>";
        input += "<td class='td-qty'><input type='text' name='qty_barang[]' value='"+qty+"' class='inp-qty' readonly></td>";
        input += "<td class='td-harga right'><span class='span-harga'>"+sepNum(harga)+"</span><input type='text' name='harga_barang[]' value='"+parseFloat(harga)+"' class='inp-harga hidden' readonly></td>";
        input += "<td class='td-diskon right'><span class='span-disc'>"+sepNum(disc)+"</span><input type='text' name='disc_barang[]' value='"+parseFloat(disc)+"' class='inp-disc hidden' readonly></td>";
        input += "<td class='td-sub right'><span class='span-sub'>"+sepNum(subtotal)+"</span><input type='text' name='sub_barang[]' value='"+parseFloat(subtotal)+"' class='inp-sub hidden' readonly></td>";
        input += "<td class='text-center'><a href='#' class='btn btn-sm ubah-barang' style='font-size:18px !important;padding:0'><i class='simple-icon-pencil'></i></a>&nbsp;<a href='#' class='btn btn-sm hapus-item' style='font-size:18px !important;margin-left:10px;padding:0'><i class='simple-icon-trash'></i></td>";
        input += "</tr>";

        $('#input-grid tbody').prepend(input);

        $('.inp-qty').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true
        });
        hitungTotal();
        $("#input-grid tr:last").focus();
        $('.table-grid').formNavigation();
    }

    function hitungTotal() {
        var diskon = 0;
        var total = 0;
        $('#input-grid .row-grid').each(function(){
            var diskonInRow = parseInt($(this).find('.inp-disc').val());
            var subtotal = parseInt($(this).find('.inp-sub').val());
            diskon = diskon + diskonInRow;
            total += subtotal;
        });
        $totDisk = diskon;
        $totTrans = total;
        $('#totrans').val(total);
        $('#total-trans').text("Rp. "+sepNum(total));
    }

    

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-master/barang')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    for(var i=0;i<result.daftar.length;i++) {
                        var barang = result.daftar[i];
                        $dtBrg.push({
                            harga: barang.hna,
                            nama: barang.nama,
                            kode: barang.kode_barang,
                            displayNama: barang.kode_barang+"-"+barang.nama
                        });
                    }

                }else if(!result.data.status && result.data.message == "Unauthorized"){
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
    }

    function getNoOpen() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-trans/penjualan-open')}}",
            dataType:'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    $no_open = result.data.no_open;
                    $('#no_open').text(result.data.no_open)
                }
            }
        });
    }

    function hapusBarang(rowindex){
        $("#input-grid tbody tr:eq("+rowindex+")").remove();
        hitungTotal();
    }

    function editBarang(rowIndex) {
        $index = rowIndex;
        var row = $("#input-grid tbody");
        var kode_barang = row.find("tr:eq("+rowIndex+")").find('.td-kode').text();
        var qty = row.find("tr:eq("+rowIndex+")").find('.td-qty').find('.inp-qty').val();
        var harga = row.find("tr:eq("+rowIndex+")").find('.td-harga').text();
        var diskon = row.find("tr:eq("+rowIndex+")").find('.td-diskon').text();
        var subtotal = row.find("tr:eq("+rowIndex+")").find('.td-sub').text();
        
        $('#modal-kode_barang').val(kode_barang);
        $('#modal-qty').val(toNilai(qty));
        $('#modal-harga').val(toNilai(harga));
        $('#modal-diskon').val(toNilai(diskon));
        $('#modal-subtotal').val(toNilai(subtotal));
        $('#modal-edit').modal('show');
    }

    function DelayExecution(f, delay) {
        var timer = null;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = window.setTimeout(function () {
                f.apply(context, args);
            },
            delay || 300);
        };
    }

     $.fn.ConvertToBarcodeTextbox = function () {
         $(this).keydown(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if ($(this).val() == '') {
                keyupFiredCount = 0;
            } 
            if (keycode == 13) {//enter key
                    $(".nextcontrol").focus();
                    return false;
                    event.stopPropagation();
            }
        });
        $(this).keyup(DelayExecution(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which); 
                keyupFiredCount = keyupFiredCount + 1; 
        }));
         $(this).blur(function (event) {
             if ($(this).val() == '')
                 return false;
 
             if(keyupFiredCount <= 1)
             {
                console.log('By Scanner');
                var kode_barang = $(this).val();
                cekDiskondanBonus(kode_barang, tambahBarang);
                $(this).val('');
                $(this).focus();
             }else {
                console.log('By Manual Typing');
                var kode_barang = $(this).val();
                cekDiskondanBonus(kode_barang, tambahBarang);
                $(this).val('');
                $(this).focus();
             } 
             keyupFiredCount = 0;
         });
    };

    $('#barcode').ConvertToBarcodeTextbox();

    document.onkeyup = function (event) {
        event.preventDefault();
        var ctrl = event.ctrlKey;
        var f1 = 112;
        var f7 = 118;
        var f8 = 119;
        if(ctrl && event.which == f1) {
            $('#barcode').focus();
        }

        if(ctrl && event.which == f7) {
            $('#edit-qty').click();
        }

        if(ctrl && event.which == f8) {
            $('#input-pembayaran').click();
        }
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $('#nominal-1,#nominal-2,#nominal-3,#nominal-4').click(function(){
        var nominal = toNilai($(this).text());
        $('#input-bayar').val(nominal);
    })

    $('#modal-qty, #modal-diskon').change(function(){
        var qty = $('#modal-qty').val();
        var diskon = $('#modal-diskon').val();
        var harga = $('#modal-harga').val();

        var subtotal = (toNilai(qty) * toNilai(harga)) - toNilai(diskon);
        $('#modal-subtotal').val(subtotal);
    });

    $('#btn-edit').click(function() {
        var row = $("#input-grid tbody");
        var kode_barang = $('#modal-kode_barang').val();
        var kodeBrg = kode_barang.split('-');
        var qty = $('#modal-qty').val();
        if(qty.length <= 2) {
            qty = parseFloat(qty);
        } else {
            qty = toNilai(qty);
        }
        var harga = toNilai($('#modal-harga').val());
        var diskon = toNilai($('#modal-diskon').val());
        var subtotal = toNilai($('#modal-subtotal').val());

        row.find("tr:eq("+$index+")").find('.td-kode').find('span-kode').text(kode_barang);
        row.find("tr:eq("+$index+")").find('.td-kode').find('inp-kode').val(kodeBrg[0]);
        row.find("tr:eq("+$index+")").find('.td-qty').find('.inp-qty').val(qty);
        row.find("tr:eq("+$index+")").find('.td-harga').find('.span-qty').text(sepNum(harga));
        row.find("tr:eq("+$index+")").find('.td-harga').find('.inp-harga').val(harga);
        row.find("tr:eq("+$index+")").find('.td-diskon').find('.span-disc').text(sepNum(diskon));
        row.find("tr:eq("+$index+")").find('.td-diskon').find('.inp-disc').val(diskon);
        row.find("tr:eq("+$index+")").find('.td-sub').find('.span-sub').text(sepNum(subtotal)); 
        row.find("tr:eq("+$index+")").find('.td-sub').find('.inp-sub').val(subtotal); 

        hitungTotal();
        $('#modal-edit').modal('hide');
        $('#barcode').focus();
    });

    $('#edit-qty').click(function(){
        var barang = $('#input-grid tbody tr').length;
        if(barang < 1) {
            alert('Data barang belum dimasukkan');
        }
        $('.inp-qty').first().prop('readonly', false);
        $('.inp-qty').first().focus();
    });

    $('#input-grid tbody').on('change', '.inp-qty', function(){
        var harga = $(this).closest('tr').find('.inp-harga').val();
        var qty = $(this).val();
        if(qty.length <= 2) {
            qty = parseFloat(qty);
        } else {
            qty = toNilai(qty);
        }
        var subtotal = parseFloat(harga) * qty;
        $(this).closest('tr').find('.inp-sub').val(subtotal);
        $(this).closest('tr').find('.inp-sub').prop('readonly', true);
        $(this).closest('tr').find('.span-sub').text(sepNum(subtotal));
        hitungTotal();
    });

    $("#input-grid tbody").on("click", '.hapus-item', function(){
        var index = $(this).closest('tr').index();
        hapusBarang(index);
    });

    $("#input-grid tbody").on("click", '.ubah-barang', function(){
        var index = $(this).closest('tr').index();
        editBarang(index);
    });

    $('#input-pembayaran').click(function(){
        if($totTrans == 0) {
            alert('Transaksi tidak valid')
            return;
        }
        $('#total-trans-modal').text("Rp. "+sepNum($totTrans));
        $('#total-potongan').text("Rp. "+sepNum($totDisk));
        $totByr = $totTrans - $totDisk;
        $('#nominal-bayar').text("Rp. "+sepNum($totByr));
        $('#modal-bayar').modal('show');
        $('#input-bayar').focus();
    });

    $('#submit-bayar').click(function(){
        $no_open = "test";
        var nominal = toNilai($('#input-bayar').val());
        if(nominal == '' || nominal <= 0 || nominal < $totByr) {
            msgDialog({
                id: '',
                type:'sukses',
                title: 'Error',
                text:'Nilai Bayar kurang dari Total Bayar'
            });
            return;
        }

        if($no_open == "" || $no_open == "-") {
            msgDialog({
                id: '',
                type:'warning',
                text:'Anda belum melakukan open kasir'
            });
            return; 
        }
        $('#web-form-pos').submit();
    });

    $('#web-form-pos').submit(function(event){
        event.preventDefault();
        var nominal = toNilai($('#input-bayar').val());
        var formData = new FormData(this);
        
        formData.append('no_open', $no_open);
        formData.append('total_disk', $totDisk);
        formData.append('total_bayar', $totByr);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $.ajax({
            type: 'POST',
            url: "{{url('esaku-trans/penjualan')}}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if(result.data.status){
                    $('#modal-bayar').modal('hide');
                    $('#modal-kembalian').modal('show');
                    var kembalian = nominal - $totByr;
                    if(kembalian <= 0) {
                        kembalian = 0;
                    }
                    $('#nominal-kembalian').text("Rp. "+sepNum(kembalian));
                    resetForm();
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
    });
</script>