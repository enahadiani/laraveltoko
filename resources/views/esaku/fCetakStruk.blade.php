<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />    

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                </div>
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <div class="form-group row" id="row-id">
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="periode" name="periode">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="no_jual">No Bukti</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_no_jual" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-no_jual" id="no_jual" name="no_jual" value="" title="">
                                <span class="info-name_no_jual hidden">
                                    <span></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_no_jual"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="cetak">&nbsp;</label>
                            <button class="btn btn-info btn-block" type="button" id="previewBtn">Cetak</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <hr style="border: 0pxsolid lightgrey;width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12" id="detail-struk">
                            
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div> 
</form>
<!-- END FORM INPUT -->

<!-- FORM MODAL BAYAR 2-->
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
                <div class="btn-group btn-block" role="group">
                    <button id="closeBtn" type="button" class="btn btn-light" style="border-bottom-left-radius: 15px;">Close</button>
                    <button id="cetakBtn" type="button" class="btn btn-info" style="border-bottom-right-radius: 15px;">Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modal_search')

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script>
    // Small Form
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    // var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";

    init();

    function init(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Cetak Ulang Struk');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#no_jual').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    }
    
    setHeightForm();

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

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
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    $('[data-toggle="tooltip"]').tooltip(); 
    $('.selectize').selectize();

    
    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    function loadDetail(no_jual,periode) {
        var no_bukti 
        no_bukti= ['=',no_jual,''];
        periode = ['=',periode,''];
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-report/lap-nota-jual') }}",
            dataType: 'json',
            async: false,
            data: {
                no_bukti: no_bukti,
                periode: periode,
            },
            success: function(result) {
                var data = result.result;
                if (result.status) {
                    if (data.length > 0) {
                        // var per = periode[1];
                        var lokasi = result.lokasi;
                        console.log(periode);
                        console.log(lokasi);
                        var html = `<div>
                        <style>
                            .info-table thead{
                                background:#4286f5;
                                color:white;
                            }
                            td{
                                padding:2px !important;
                            }
                            .bold {
                                font-weight:bold;
                            }
                            @media print{
                                @page  
                                { 
                                    size: auto;   /* auto is the initial value */ 
                                    /* this affects the margin in the printer settings */ 
                                    margin: 0mm 5mm 0mm 5mm !important;  
                                } 
                            }   
                        </style>
                        `;
                        html+=judul_lap("LAPORAN NOTA PENJUALAN","",'Periode '+periode[1]);
                        for(a=0; a< data.length ;a++){
                            var line2 = data[a];
                            html+=`
                            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                <td colspan='2' align='center' class='size_judul'>${line2.nama}</td>
                                </tr>
                                <tr>
                                <td colspan='2' align='center' class='size_judul'>${line2.alamat}</td>
                                </tr>
                                <tr>
                                <td>&nbsp;</td>
                                <td align='right'>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0' id='table-det' style='padding-bottom:20px'>`;
                                var det = '';
                                for(i=0; i< line2.detail.length ;i++){
                                    var line = line2.detail[i];
                                    var sub=(line['harga']*line['jumlah'])-line['diskon']; 
                                    det+=`
                                    <tr>
                                    <td width='100%' class='size_isi' colspan="3">`+line.nama+`</td>
                                    </tr>
                                    <tr>
                                    <td width='30%' class='size_isi'>`+sepNum(line.jumlah)+`x </td>
                                    <td width='30%' class='size_isi'>`+sepNum(line.harga)+`</td>
                                    <td width='40%' align='right' class='size_isi'>`+sepNum(line.total)+`</td>
                                    </tr>`;
                                } 
                                var total_trans=line2.nilai;
                                var total_disk=line2.diskon;
                                var total_stlh=line2.nilai-line2.diskon;
                                var total_byr=line2.tobyr;
                                var kembalian=line2.tobyr-(total_stlh);
                            html+=det+`
                            </table>
                            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                <td class='size_isi'>Total Transaksi</td>
                                <td align='right' class='size_isi' id='totrans'>`+sepNum(total_trans)+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>Total Diskon</td>
                                <td align='right' class='size_isi' id='todisk'>`+sepNum(total_disk)+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>Total Set. Disc</td>
                                <td align='right' class='size_isi' id='tostlh'>`+sepNum(total_stlh)+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>Total Bayar</td>
                                <td align='right' class='size_isi' id='tobyr'>`+sepNum(total_byr)+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>Kembalian</td>
                                <td align='right' class='size_isi' id='kembali'>`+sepNum(kembalian)+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>&nbsp;</td>
                                <td align='right' class='size_isi'>&nbsp;</td>
                                </tr>
                                <tr>
                                <tr>
                                <td class='size_isi' colspan='2' id='no_bukti'>`+line2.no_jual+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi' colspan='2' id='tgl'>`+line2.tanggal+`</td>
                                </tr>
                                <tr>
                                <td class='size_isi'>Kasir:<span id='nik'>`+line2.nik_user+`</span></td>
                                <td class='size_isi'></td>
                                </tr>
                                <tr>
                                <td class='size_isi'>&nbsp;</td>
                                <td align='right' class='size_isi'>&nbsp;</td>
                                </tr>
                                <tr>
                                <td colspan='2' align='center' class='size_judul'>Terima Kasih </td>
                                </tr>
                            </table>`;
                        }
                        html+="</div>"; 
                        $('#detail-struk').html(html);
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Gagal memuat',
                        text: JSON.stringify(result.message)
                    });
                }
            }
        });
    }


    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'no_jual':
                var options = {
                    id : id,
                    header : ['Kode', 'Tanggal'],
                    url : "{{ url('esaku-trans/daftar-penjualan-cetak') }}",
                    columns : [
                        { data: 'no_jual' },
                        { data: 'tanggal' }
                        // { data: 'nilai', render : $.fn.dataTable.render.number( '.', ',', 0, '' )  }
                    ],
                    judul : "Daftar Penjualan",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    orderby:[[0,"desc"]],
                    onItemSelected: function(data){
                        showInfoField('no_jual',data.no_jual,data.no_jual);
                        loadDetail(data.no_jual,data.periode);

                        $('#modal-totrans').text(sepNum(data.totrans));
                        $('#modal-diskon').text(sepNum(data.todisk)); 
                        $('#modal-tostlhdisk').text(sepNum(data.tostlh));
                        $('#modal-tobyr').text(sepNum(data.tobyr));
                        $('#modal-kembalian').text(sepNum(data.kembalian));
                        $('#modal-no_jual').text(data.no_jual);
                    }
                }
            break;
        }
        showInpFilter(options);
    });

$('#btn-simpan').click(function(e){
    e.preventDefault();
    $(this).text("Please Wait...").attr('disabled', 'disabled');
    // $('#form-tambah').submit();
});

function resetForm() {
    // $('#no_jual').val('');    
}

$('#cetakBtn').click(function(){
    var no_jual = $('#no_jual').val();
    let myWindow;
    myWindow = window.open("{{ url('esaku-report/lap-nota-jual-print-baru') }}/?periode[]=all&periode[]=&periode[]=&no_bukti[]==&no_bukti[]="+no_jual+"&no_bukti[]=","","width=200,height=100");
    
    setTimeout(function (){

        myWindow.close();
                
    }, 2000);
    resetForm();
    // $('#modal-bayar2').modal('hide');
});

$('#closeBtn').click(function(){
    resetForm();
    $('#modal-bayar2').modal('hide');
}); 

$('#previewBtn').click(function(){
    $('#modal-bayar2').modal('show');
})

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

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    // oncleared: function () { self.Value(''); }
});

$('.modal-header').on('click','#btn-cetak',function(e){
    e.stopPropagation();
    $('.dropdown-ke1').addClass('hidden');
    $('.dropdown-ke2').removeClass('hidden');
    console.log('ok');
});

$('.modal-header').on('click','#btn-cetak2',function(e){
    // $('#dropdownAksi').dropdown('toggle');
    e.stopPropagation();
    $('.dropdown-ke1').removeClass('hidden');
    $('.dropdown-ke2').addClass('hidden');
});

</script>