<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
    #input-grid2 th {
        position: sticky;
        top: 0;
    }
    th {
        background-color: #f3f3f3 !important;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-pos-body">
                    <form class="form" id="web-form-pos" method="POST">
                        <div class="row">
                            <div class="col-12" style="position: relative;margin-bottom: 8px;">
                                <button class="btn btn-info" type="submit" id="btn-simpan" style="float: right !important;">Simpan</button>
                            </div>
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
                                    <div class="text-left" id="edit-qty" style="width: 90px;height:42px;padding: 5px;border: 1px solid #d0cfcf;background: white;border-radius: 5px;vertical-align: middle;margin-right:5px">
                                        <img style="width:30px;height:30px;position:absolute" src="{{ url('asset_dore/img/edit.png') }}">
                                        <p style="line-height:1.5;font-size: 10px !important;padding-left: 35px;margin-bottom: 0 !important;text-align:center">Edit Qty</p>
                                        <p style="line-height:1.5;font-size: 9px !important;padding-left: 35px;text-align:center">F7</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <h3><input type="text" style="font-size: 60px !important;height:unset !important"  name="total_stlh" min="1" class="form-control currency" id="tostlh" required readonly></h3>
                            </div>
                            <div class="col-12">
                                <ul class="nav nav-tabs col-12 nav-grid" role="tablist" style="padding-bottom:0;margin-top:0.1rem;border-bottom:none">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#barang" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customer" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Customer</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kirim" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Jasa Kirim</span></a> </li>
                                </ul>
                            </div>
                            <div class="tab-content tabcontent-border col-12 p-0">
                                <div class="tab-pane active" id="barang" role="tabpanel">
                                    <div class='col-xs-12'>
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
                                                <th style='padding: 3px;width:5%'>Disc</th>
                                                <th style='padding: 3px;width:20%'>
                                                    <input type="text" name="total_disk" min="1" class='form-control currency' id='todisk' required value="0">
                                                </th>
                                                <th style='padding: 3px;width:5%'>Total</th>
                                                <th style='padding: 3px;width:20%'>
                                                    <input type='text' name="total_trans" min="1" class='form-control currency' id='totrans' required readonly>
                                                </th>
                                            </tr>
                                        </table>
                                        <div class="col-12" style="overflow-y: scroll; margin:0px; padding:0px;height:280px !important;">
                                            <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2">
                                                <tr>
                                                    <th style='width:19%'>Barang</th>
                                                    <th style='width:10%'>Harga</th>
                                                    <th style='width:5%'>Qty</th>
                                                    <th style='width:10%'>Disc</th>
                                                    <th style='width:10%'>Subtotal</th>
                                                    <th style='width:8%'></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane" id="customer" role="tabpanel">
                                    <div class="col-12 mt-4" style="min-height:328px">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="kode_cust">Kode Customer</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_kode_cust" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-kode_cust" id="kode_cust" name="kode_cust" value="" title="">
                                                            <span class="info-name_kode_cust hidden">
                                                                <span></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_kode_cust"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="nama">Nama Customer</label>
                                                        <input class="form-control" type="text" id="nama" name="nama" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="provinsi">Provinsi</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_provinsi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-provinsi" id="provinsi" name="provinsi" value="" title="">
                                                            <span class="info-name_provinsi hidden">
                                                                <span id="label_provinsi"></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_provinsi"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="kota">Kota</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_kota" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-kota" id="kota" name="kota" value="" title="">
                                                            <span class="info-name_kota hidden">
                                                                <span id="label_kota"></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_kota"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="kecamatan">Kecamatan</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_kecamatan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-kecamatan" id="kecamatan" name="kecamatan" value="" title="">
                                                            <span class="info-name_kecamatan hidden">
                                                                <span id="label_kecamatan"></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_kecamatan"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="no_tel">No Telp Customer</label>
                                                        <input class="form-control" type="text" id="no_tel" name="no_tel" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="alamat">Alamat</label>
                                                        <input class="form-control" type="text" id="alamat" name="alamat" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="kirim" role="tabpanel">
                                    <div class="col-12 mt-4 ongkir" style="min-height:328px">
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="kode_kirim">Jasa Kirim</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_kode_kirim" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-kode_kirim" id="kode_kirim" name="kode_kirim" value="" title="">
                                                            <span class="info-name_kode_kirim hidden">
                                                                <span id="label-kode_kirim"></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_kode_kirim"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="berat">Berat Produk (Gram)</label>
                                                        <input class="form-control currency" type="text" id="berat" name="berat" value="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="service">Services Kirim</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                <span class="input-group-text info-code_service" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                            </div>
                                                            <input type="text" class="form-control inp-label-service" id="service" name="service" value="" title="">
                                                            <span class="info-name_service hidden">
                                                                <span id="label_service"></span> 
                                                            </span>
                                                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                                            <i class="simple-icon-magnifier search-item2" id="search_service"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="nilai_ongkir">Nilai Ongkir</label>
                                                        <input class="form-control currency" type="text" id="nilai_ongkir" name="nilai_ongkir" value="0" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="lama_hari">Lama Pengiriman</label>
                                                        <input class="form-control" type="text" id="lama_hari" name="lama_hari" value="0" required readonly>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                        <label for="catatan">Catatan</label>
                                                        <input class="form-control" type="text" id="catatan" name="catatan" required>
                                                    </div>  
                                                </div>   
                                            </div>
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
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'></button>
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
                            <input type='text' class='form-control currency' readonly id='modal-edit-harga'>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <label for="judul" class="col-3 col-form-label">Disc</label>
                        <div class="col-9">
                            <input type='text' class='form-control currency' id='modal-edit-disc' >
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

<div class="modal" id="modal-bayar2" tabindex="-1" role="dialog" aria-modal="true">
    <div role="document" style="" class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px !important;">
            <div class="modal-header " style="display:block">
                <div class="row text-center" style="">
                    <div class="col-md-12">
                        <h5 class="">Total Transaksi</h5>
                        <h5 id="modal-no_bukti" hidden></h5>
                        <h1 class="text-info" id="modal-total_all"></h1>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="margin-top: 55px;">
                <div class="row mb-2" style="">
                    <div class="col-6" style="">
                    Total Transaksi
                    </div>
                    <div class="col-6 text-right" id="modal-total_trans"></div>
                </div>
                <div class="row mb-2">
                <div class="col-6">
                    Diskon 
                    </div>
                    <div class="col-6 text-right" id="modal-diskon"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Nilai Ongkir
                    </div>
                    <div class="col-6 text-right" id="modal-nilai_ongkir"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                    Lama Pengiriman
                    </div>
                    <div class="col-6 text-right" id="modal-lama_hari"></div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0;">
            <button id="cetakBtn" type="button" class="btn btn-info btn-block" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;margin:0">Cetak</button>
            </div>
        </div>
    </div>
</div>

@include('modal_search')

<script src="{{ asset('helper.js') }}"></script>
<script src="{{url('asset_dore/js/inputmask.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.scannerdetection.js')}}"></script>
<script src="{{url('asset_dore/js/jquery.formnavigation.js')}}"></script>
<script type="text/javascript">
    $('.gridexample').formNavigation();
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();
    var count= 0;
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
    };

    function resetForm() {
        $('#tostlh').val('0')
        $('#todisk').val('0')
        $('#input-grid2 tr:not(:first)').remove();
        $('#customer').find('input:text').val('');
        $('#kirim').find('input:text').val('');
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

    $('#web-form-pos').submit(function(e){
        e.preventDefault()
        hitungTotal();
        var total_trans=toNilai($('#tostlh').val());
        var diskon=toNilai($('#todisk').val());
        var nilai_ongkir=toNilai($('#nilai_ongkir').val());
        var total_all = total_trans+diskon+nilai_ongkir;
        var lama_hari=$('#lama_hari').val();
        if(totrans <= 0){
            msgDialog({
                id: '',
                type:'sukses',
                title: 'Error',
                text:'Total Transaksi tidak valid. Total Transaksi tidak boleh kurang dari atau sama dengan 0'
            });
        }else{
            var formData = new FormData(this);
            
            $("[id^=label]").each(function(e){
                formData.append($(this).attr('id'),$(this).text());
            });

            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{url('esaku-trans/penjualan-langsung')}}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if(result.data.status){
                        resetForm();
                        $('#modal-total_all').text(toRp(total_all));
                        $('#modal-total_trans').text(toRp(total_trans)); 
                        $('#modal-diskon').text(toRp(diskon)); 
                        $('#modal-nilai_ongkir').text(toRp(nilai_ongkir));
                        $('#modal-lama_hari').text(lama_hari + 'hari');
                        $('#modal-bayar2').modal('show');
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

    function custTarget(target, tr) {
        $(target).parents('.ongkir').find('#nilai_ongkir').val(tr.find('td:nth-child(3)').text());
        $(target).parents('.ongkir').find('#lama_hari').val(tr.find('td:nth-child(4)').text());
    }

    $('#web-form-pos').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'kode_cust': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/cust') }}",
                    columns : [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Customer",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    }
            break;
            case 'provinsi': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/provinsi') }}",
                    columns : [
                        { data: 'province_id' },
                        { data: 'province' }
                    ],
                    judul : "Daftar Provinsi",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'kota': 
                var province = $('#provinsi').val();
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama', 'Type'],
                    url : "{{ url('esaku-trans/kota') }}",
                    columns : [
                        { data: 'city_id' },
                        { data: 'city_name' },
                        { data: 'type' },
                    ],
                    judul : "Daftar Kota/Kabupaten",
                    parameter: {province: province},
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'kecamatan': 
                var province = $('#provinsi').val();
                var city = $('#kota').val();
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/kecamatan') }}",
                    columns : [
                        { data: 'subdistrict_id' },
                        { data: 'subdistrict_name' },
                    ],
                    judul : "Daftar Kecamatan",
                    parameter: {
                        province: province,
                        city: city
                    },
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'kode_kirim': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/jasa-kirim') }}",
                    columns : [
                        { data: 'kode_kirim' },
                        { data: 'nama' },
                    ],
                    judul : "Daftar Jasa Kirim",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'service': 
                var destination = $('#kecamatan').val();
                var weight = toNilai($('#berat').val());
                var courier = $('#kode_kirim').val();
                var settings = {
                    id : id,
                    header : ['Service','Description','Nilai','Lama Hari'],
                    url : "{{ url('esaku-trans/service') }}",
                    columns : [
                        { data: 'service' },
                        { data: 'description' },
                        { data: 'cost' },
                        { data: 'etd' },
                    ],
                    parameter:{
                        destination: destination,
                        weight: weight,
                        courier: courier
                    },
                    judul : "Daftar Jasa Kirim",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    jTarget3 : "val",
                    jTarget4 : "val",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "custom",
                    target4 : "custom",
                    width : ["30%","70%"],
                }
            break;
        }
        showInpFilter(settings);
    })

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
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

    function getBarang() {
        $.ajax({
            type:'GET',
            url:"{{url('esaku-master/barang')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    var res = result.daftar;
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
                        $dtBrg[res[i].kode_barang] = {harga:res[i].hna};  
                        $dtBrg2[res[i].barcode] = {harga:res[i].hna, nama:res[i].nama, kd_barang:res[i].kode_barang};
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
    getBarang();

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

    function toNilai(str_num="0"){
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

    function getKode(id){ 
        if (id != ""){
            return $dtBrg2[id].kd_barang;  
        }else{
            return "";
        }
    };

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
        var diskon =  0;
        $('.row-barang').each(function(){
            var qtyb = $(this).closest('tr').find('.inp-qtyb').val();
            var hrgb = $(this).closest('tr').find('.inp-hrgb').val();
            var disc = $(this).closest('tr').find('.inp-disc').val();
            //var todis= (toNilai(hrgb) * toNilai(disc)) / 100
            // var subb = (+qtyb * toNilai(hrgb)) - disc;
            diskon += +toNilai(disc);
            var subb = (+qtyb * toNilai(hrgb));
            $(this).closest('tr').find('.inp-subb').val(toRp(subb));
            total_brg += +subb;
        });
        $('#totrans').val(toRp(total_brg));
        $('#todisk').val(toRp(diskon));

        var total_disk= toNilai($('#todisk').val());
        var nilai_ongkir = toNilai($('#nilai_ongkir').val());
        var total_stlh = +total_brg - +total_disk +nilai_ongkir;
        $('#tostlh').val(toRp(total_stlh));  
    }

     $('#modal-edit-kode').selectize({
        selectOnTab: true,
        onChange: function (){
            var id = $('#modal-edit-kode').val();
        }
    });

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

    $("#input-grid2").on("click", '.ubah-barang', function(){
        // get clicked index
        var index = $(this).closest('tr').index();
        ubahBarang(index);
    });

    function ubahBarang(rowindex){
        $('.row-barang').removeClass('set-selected');
        $("#input-grid2 tr:eq("+rowindex+")").addClass('set-selected');

        var kd = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-kdb').val();
        var qty = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-qtyb').val();
        var harga = toNilai($("#input-grid2 tr:eq("+rowindex+")").find('.inp-hrgb').val());      
        var disc = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-disc').val();
        var sub = $("#input-grid2 tr:eq("+rowindex+")").find('.inp-subb').val();
        

        $('#modal-edit-kode')[0].selectize.setValue(kd);
        $('#modal-edit-kode').val(kd);
        $('#modal-edit-qty').val(qty);
        $('#modal-edit-harga').val(harga);
        $('#modal-edit-disc').val(disc);
        $('#modal-edit-subb').val(sub);
        
        $('#modal-edit').modal('show');
        var selectKode = $('#modal-edit-kode').data('selectize');
        selectKode.disable();
    }

    function addBarangSelect(id=null){
        var barangSelect = $('#kd-barang')[0].selectize.getValue();
        var qtySelect = 1;
        var discSelect = 0;
        var hrgSelect = setHarga2(barangSelect);
        if(barangSelect === ''){
            msgDialog({
                id: '',
                type:'warning',
                text:'Masukkan data barang yang valid'
            });
        }else{
            var barangSelected = $('#kd-barang option:selected').val();
            var namaSelected = $('#kd-barang option:selected').text();
            var qtySelected = qtySelect;
            var hrgSelected = hrgSelect;
            var discSelected = discSelect;
            var subSelected = (+qtySelected * +hrgSelected);
            
            // cek barang sama
            $('.row-barang').each(function(){
                var kd_barang = $(this).closest('tr').find('.inp-kdb').val();
                var qty_barang = $(this).closest('tr').find('.inp-qtyb').val();
                var hrg_barang = $(this).closest('tr').find('.inp-hrgb').val();
                var disc_barang = $(this).closest('tr').find('.inp-disc').val();
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
                url:"{{url('esaku-trans/penjualan-langsung-bonus')}}/"+barangSelected+"/"+tgl+"/"+qtySelected+"/"+hrgSelected,
                dataType: 'json',
                async:false,
                success: function(result) {
                    var no = $('#input-grid2 tr:last').index()+1;
                    var input = "";
                    qtySelected = result.data.jumlah;
                    discSelected = result.data.diskon;
                    subSelected = (hrgSelected*qtySelected);

                    input = "<tr class='row-barang'>";
                    input += "<td>"+namaSelected+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+barangSelected+"' readonly required></td>";
                    input += "<td><input type='text' name='harga_barang[]' class='change-validation text-right inp-hrgb form-control'  value='"+toRp(hrgSelected)+"' readonly required></td>";
                    input += "<td><input type='text' name='qty_barang[]' class='change-validation text-right inp-qtyb form-control'  value='"+qtySelected+"' readonly required></td>";
                    input += "<td><input type='text' name='disc_barang[]' class='change-validation text-right inp-disc form-control'  value='"+toRp(discSelected)+"' readonly required></td>";
                    input += "<td><input type='text' name='sub_barang[]' class='change-validation text-right inp-subb form-control'  value='"+toRp(subSelected)+"' readonly required></td>";
                    input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important;cursor: pointer;'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important;cursor: pointer;'><i class='simple-icon-trash'></i></td>";
                    input += "</tr>";
                    
                    $("#input-grid2").append(input);
                    $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                    });
                    hitungTotal();
                    $('#kd-barang')[0].selectize.setValue('');
                    $("#input-grid2 tr:last").focus();
                    $('.gridexample').formNavigation();
                }
            });
            
            $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
            });
        }
    }

    $('#edit-submit').click(function(e){
        e.preventDefault();
        
        var hrg = toNilai($('#modal-edit-harga').val());
        var qty = toNilai($('#modal-edit-qty').val());
        var disc = toNilai($('#modal-edit-disc').val());
        var kd = $('#modal-edit-kode option:selected').val();
        var nama = $('#modal-edit-kode option:selected').text();
        var sub =  toNilai($('#modal-edit-subb').val());

        var input="";
        input += "<td >"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
        input += "<td><input type='text' name='harga_barang[]' class='change-validation text-right inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
        input += "<td><input type='text' name='qty_barang[]' class='change-validation text-right inp-qtyb form-control'  value='"+qty+"' readonly required></td>";
        input += "<td><input type='text' name='disc_barang[]' class='change-validation text-right inp-disc form-control'  value='"+toRp(disc)+"' readonly required></td>";
        input += "<td><input type='text' name='sub_barang[]' class='change-validation text-right inp-subb form-control'  value='"+toRp(sub)+"' readonly required></td>";
        input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important;cursor: pointer;'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important;cursor: pointer;'><i class='simple-icon-trash'></i></td>"
        
        $(".set-selected").closest('tr').text('');
        $(".set-selected").closest('tr').append(input);


        $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
        });
        hitungTotal();
        $('.gridexample').formNavigation();
        $('#modal-edit').modal('hide');
    });

    $('#kd-barang2').scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
        preventDefault: true,
        endChar: [13],
        onComplete: function(barcode, qty){
            // validScan = true;
            validScan = true;
            $('#kd-barang2').val(barcode);
            // addBarangBarcode();
        
        } // main callback function	,
        ,
        // onKeyDetect:true,
        onError: function(string, qty) {
            console.log('barcode-error');
        }	
    });

    // function addBarangBarcode(){
    //     var barangSelect = $('#kd-barang2').val();
    //     var hrgSelect = setHarga2(barangSelect);
    //     var qtySelect = 1;
    //     var discSelect = 0;
    //     var hrgSelect = setHarga3(barangSelect);
    //     var kd=getKode(kd1);
    //     var nama = kd+"-"+setNama(barangSelect);
    //     if(kd1 == '' ){
    //         msgDialog({
    //             id: '',
    //             type:'warning',
    //             text:'Masukkan data barang yang valid'
    //         });
    //     }else{
    //         var qtySelected = qtySelect;
    //         var hrgSelected = hrgSelect;
    //         var discSelected = discSelect;
    //         var subSelected = (+qtySelected * +hrgSelected);
            
    //         // cek barang sama
    //         $('.row-barang').each(function(){
    //             var kd_temp = $(this).closest('tr').find('.inp-kdb').val();
    //             var qty_temp = $(this).closest('tr').find('.inp-qtyb').val();
    //             var hrg_temp = $(this).closest('tr').find('.inp-hrgb').val();
    //             var disc_temp = $(this).closest('tr').find('.inp-disc').val();
    //             var subb_temp = $(this).closest('tr').find('.inp-subb').val();
    //             if(kd_temp == kd){
    //                 qty+=+(toNilai(qty_temp));
    //                 // hrg+=+(toNilai(hrg_temp));
    //                 disc+=+(toNilai(disc_temp));
    //                 sub+=+(toNilai(subb_temp));
    //                 //todis+=+(hrg*toNilai(disc_temp))/100;
    //                 // sub=(hrg*qty)-disc;
    //                 $(this).closest('tr').remove();
    //             }
    //         });

    //         var no = $('#input-grid2 tr:last').index()+1;
    //         var input = "";
            
    //         input = "<tr class='row-barang'>";
    //         input += "<td style='text-align:center' class='no-barang'>"+no+"</td>";
    //         input += "<td >"+nama+"<input type='hidden' name='kode_barang[]' class='change-validation inp-kdb form-control' value='"+kd+"' readonly required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='saldo[]' class='change-validation inp-saldo form-control'  value='"+toRp(saldo)+"' readonly required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='harga_seb[]' class='change-validation inp-hrgseb form-control'  value='"+toRp(hrg_seb)+"' readonly required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='harga_jual[]' class='change-validation inp-hrgjual form-control'  value='"+toRp(hrgjual)+"'  required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='harga_barang[]' class='change-validation inp-hrgb form-control'  value='"+toRp(hrg)+"' readonly required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='satuan_barang[]' class='change-validation inp-satuanb form-control'  value='"+setSatuan(kd)+"' readonly required><input type='hidden' name='kode_akun[]' class='change-validation inp-satuanb'  value='"+setAkun(kd)+"' readonly></td>";
    //         input += "<td style='text-align:right'><input type='text' name='qty_barang[]' class='change-validation inp-qtyb form-control currency'  value='"+qty+"' required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='disc_barang[]' class='change-validation inp-disc form-control currency'  value='"+disc+"' readonly required></td>";
    //         input += "<td style='text-align:right'><input type='text' name='sub_barang[]' class='change-validation inp-subb form-control currency'  value='"+sub+"' required></td>";
    //         input += "<td class='text-center'></a><a class='btn btn-sm ubah-barang' style='padding:0;font-size:18px !important'><i class='simple-icon-pencil'></i></a>&nbsp;<a class='btn btn-sm hapus-item ml-2' style='padding:0;font-size:18px !important'><i class='simple-icon-trash'></i></td>";
    //         input += "</tr>";
            
    //         $("#input-grid2").append(input);
            
    //         $('.inp-qtyb,.inp-subb,.inp-disc,.inp-hrgjual').inputmask("numeric", {
    //             radixPoint: ",",
    //             groupSeparator: ".",
    //             digits: 2,
    //             autoGroup: true,
    //             rightAlign: true,
    //         });
    //         hitungTotal();
            
    //         $('#kd-barang2').val('');
    //         $("#input-grid2 tr:last").focus();
    //         $('#kd-barang2').focus();
    //         $('.gridexample').formNavigation();
    //     }
    // }

</script>