<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<!-- FORM INPUT -->
<form id="web_form_edit" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Retur Penjualan</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
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
                                    <label>No Jual</label>
                                    <select name="no_jual" id="no_jual" class="form-control">
                                        <option value="">--Pilih--</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Akun Piutang</label>
                                    <input type='text' name='akun_piutang' class='form-control' readonly id='web_form_edit_akun_piutang'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Saldo</label>
                                    <input type='text' name='saldo' class='form-control currency' id='web_form_edit_saldo' readonly>
                                </div>
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
                                        <th width='15%'>Harga Jual</th>
                                        <th width='10%'>Qty Jual</th>
                                        <th width='10%'>Qty Retur</th>
                                        <th width='20%'>Subtotal</th>
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
    <div class="card-body form-header p-3">
        <h6 style="position: absolute;top: 25px;font-size: 1.25rem !important;padding-left: 15px;">Detail Retur</h6>
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
    setHeightForm();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    var $dtBrg = new Array();
    var $dtBrg2 = new Array();

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    // END LIST DATA
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    function getPenjualan(){
        $.ajax({
            type: 'GET',
            url: "{{url('esaku-trans/retur-jual-bukti')}}",
            dataType: 'json',
            async:false,
            success:function(result){  
                var select = $('#no_jual').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].no_jual, value:result.daftar[i].no_jual}]);
                        }
                    }
                }
            }
        });
    }

    getPenjualan();


    function getBarang(id,isEdit=false){
        $.ajax({
            type: 'GET',
            url: "{{url('esaku-trans/retur-jual-detail')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    $('#input-grid tbody').empty();
                    $('#web_form_edit_no_jual').val(result.data[0].no_bukti);
                    $('#web_form_edit_akun_piutang').val(result.data[0].akun_piutang);
                    $('#web_form_edit_saldo').val(toRp2(result.data[0].saldo));  
                    $('#web_form_edit_total_return').val(toRp2(result.data[0].total_return)); 
                    if(isEdit) {
                        var html = null;
                        var no = 1;
                        for(i=0;i<result.detail.length;i++) {
                            var detail = result.detail[i]
                            html = `<tr class="row-barang">
                                <td class="no-barang">${no}</td>
                                <td><select name="kode_barang[]" class="form-control inp-kode ke${no}" value=""></select></td>
                                <td><input type="text" class="form-control inp-harga" name="harga[]" value="${parseFloat(detail.harga)}" readonly></td>
                                <td>
                                    <input type="text" class="form-control inp-qtyjual" name="qty_jual[]" value="${parseFloat(detail.saldo)}" readonly>
                                    <input type="hidden" class="form-control inp-akun" name="kode_akun[]" value="${detail.akun_pers}" readonly >
                                </td>
                                <td>
                                    <input type="text" class="form-control inp-qtyretur" name="qty_retur[]" value="0" >
                                    <input type="text" class="form-control inp-satuanretur hidden" name="satuan[]" value="-">
                                </td>
                                <td><input type="text" class="form-control inp-subb" name="subtotal[]" value="0" readonly></td>
                            </tr>`;

                            $('#input-grid tbody').append(html);
                            
                            no++;

                            $('.inp-kode').change(function(e){
                                var x= $(this).val();
                                $(this).closest('tr').find('.inp-harga').val(setHarga(x));
                                $(this).closest('tr').find('.inp-qtyjual').val(setJumlah(x));
                                $(this).closest('tr').find('.inp-akun').val(setAkun(x));
                                hitungTotal();
                            });

                            $('.inp-qtyretur,.inp-subb,.inp-harga,.inp-qtyjual').inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                        }

                        var option = [];
                        for(var i=0;i<result.detail.length;i++) {
                            var detail = result.detail[i];
                            option.push({text:detail.kode_barang + ' - ' + detail.nama, value:detail.kode_barang})
                            $dtBrg[detail.kode_barang] = {harga:detail.harga,jumlah:detail.saldo,kode_akun:detail.akun_pers};
                        }
                        var num = 1
                        for(var i=0;i<result.detail.length;i++) { 
                            var select = $('.ke'+num).selectize();
                            var control = select[0].selectize;
                            control.addOption(option);
                            num++
                        }

                        var n = 1
                        for(var i=0;i<result.detail.length;i++) {
                            var detail = result.detail[i];
                            var select = $('.ke'+n);
                            var control = select[0].selectize;
                            control.setValue(detail.kode_barang);
                            control.lock();
                            n++;
                        }
                        $('.gridexample').formNavigation();
                    } else {
                        if(typeof result.detail !== 'undefined' && result.detail.length>0){
                            var select = $('.'+param).selectize();
                            console.log('.'+param);
                            select = select[0];
                            var control = select.selectize;
                            for(i=0;i<result.detail.length;i++){
                                control.addOption([{text:result.detail[i].kode_barang + ' - ' + result.detail[i].nama, value:result.detail[i].kode_barang}]);
                                $dtBrg[result.detail[i].kode_barang] = {harga:result.detail[i].harga,jumlah:result.detail[i].saldo,kode_akun:result.detail[i].akun_pers};
                            }
                        }
                    }
                }
            }
        });
    }

    $('#no_jual').change(function(e){
        var no_jual = $('#no_jual')[0].selectize.getValue();
        getBarang(no_jual,true);
    });

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


    $('#web_form_edit').validate({
        ignore: [],
        rules: 
        {
            tanggal:
            {
                required: true
            },
            periode:
            {
                required: true
            },
            no_jual:
            {
                required: true
            },
            akun_piutang:
            {
                required: true
            },
            saldo:
            {
                required: true
            },
            total_return:
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
                var qtyjual = $(this).closest('tr').find('.inp-qtyjual').val();
                if(toNilai(qtyret) > toNilai(qtyjual)){
                    isAda = true;
                }
            });
            
            if(!isAda){
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }
                $.ajax({
                    type: 'POST',
                    url: "{{url('esaku-trans/retur-jual')}}",
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
                    text: 'Jumlah barang yang diretur lebih besar dari jumlah jual'
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
            url: "{{url('esaku-report/lap-retur-jual')}}",
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
        $('#input-grid tbody').empty();
        $('#web_form_edit_no_jual')[0].selectize.setValue('');
        $('#web_form_edit_akun_piutang').val('');
        $('#web_form_edit_saldo').val(0);  
        $('#web_form_edit_total_return').val(0); 
        $('#laporan-retur').hide()
        $('#saku-form').show()
    })
</script>