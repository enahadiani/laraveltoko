<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Nota Penjualan"/>
            <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                        <!-- <x-inp-filter kode="tanggal" nama="Tanggal" selected="1" :option="array('1','3','i')"/>
                                        <x-inp-filter kode="kasir" nama="Kasir" selected="1" :option="array('1','3')"/> -->
                                        <x-inp-filter kode="no_bukti" nama="No Bukti" selected="3" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="mode" nama="Mode Print" selected="3" :option="array('3')"/>
                                        <!-- END COMPONENT -->
                                    </div>
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                 <x-report-paging :option="array()" default="10" />  
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Nota Penjualan" padding="px-4 py-4"/>

@include('modal_search')
@include('modal_email')

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var $periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
            to : "",
            toname : "",
        }

    var $mode = {
        type : "=",
        from : "lama",
        fromname : "lama",
        to : "",
        toname : "",
    }

    var $tanggal = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
    var $kasir = {
            type : "=",
            from : "{{ Session::get('userLog') }}",
            fromname : "",
            to : "",
            toname : "",
        }
    var $no_bukti = {
            type : "=",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
    var $aktif = "";

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));
    $('#mode-from').val("lama");

    $('#btn-filter').click(function(e){
        $('#collapseFilter').show();
        $('#collapsePaging').hide();
        if($(this).hasClass("btn-primary")){
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-light");
        }
            
        $('#btn-filter').addClass("hidden");
        $('#btn-export').addClass("hidden");
    });

     $('#btn-tutup').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
    });

    $('#btn-tampil').click(function(e){
        $('#collapseFilter').hide();
        $('#collapsePaging').show();
        $('#btn-filter').addClass("btn-primary");
        $('#btn-filter').removeClass("btn-light");
        $('#btn-filter').removeClass("hidden");
        $('#btn-export').removeClass("hidden");
    });

    $('.selectize').selectize();
    $('#inputFilter').reportFilter({
        kode : ['periode','no_bukti','mode'],
        nama : ['Periode','No Bukti','Mode'],
        header : [['Periode'],['No Bukti','Keterangan'],['Nama']],
        headerpilih : [['Periode','Action'],['No Bukti','Keterangan','Action'],['Nama','Action'],],
        columns: [
            [
                { data: 'periode' },
            ],
            [
                { data: 'no_jual' },
                { data: 'keterangan' }
            ],
            [
                { data: 'nama' },
            ],
        ],
        url :["{{ url('esaku-report/filter-periode') }}","{{ url('esaku-report/filter-bukti-pnj') }}","{{ url('esaku-report/filter-mode-print') }}"],
        parameter:[{},{
            'periode': $periode.from,
            'tanggal': $tanggal.from,
            'kasir': $kasir.from
        },{}],
        orderby:[[[0,"desc"]],[[0,"desc"]],[[0,"asc"]]],
        width:[['30%','70%'],['30%','70%'],['30%','70%']],
        display:['kode','kode','kode'],
        pageLength:[12,10,10]
    })
    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
                kode : ['periode','no_bukti','mode'],
                nama : ['Periode','No Bukti','Mode'],
                header : [['Periode'],['No Bukti','Keterangan'],['Nama']],
                headerpilih : [['Periode','Action'],['No Bukti','Keterangan','Action'],['Nama','Action'],],
                columns: [
                    [
                        { data: 'periode' },
                    ],
                    [
                        { data: 'no_jual' },
                        { data: 'keterangan' }
                    ],
                    [
                        { data: 'nama' },
                    ],
                ],
                url :["{{ url('esaku-report/filter-periode') }}","{{ url('esaku-report/filter-bukti-pnj') }}","{{ url('esaku-report/filter-mode-print') }}"],
                parameter:[{},{
                    'periode': $periode.from,
                    'tanggal': $tanggal.from,
                    'kasir': $kasir.from
                },{}],
                orderby:[[[0,"desc"]],[[0,"desc"]],[[0,"asc"]]],
                width:[['30%','70%'],['30%','70%'],['30%','70%']],
                display:['kode','kode','kode'],
                pageLength:[12,10,10]
            })
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        // $formData.append("tanggal[]",$tanggal.type);
        // $formData.append("tanggal[]",$tanggal.from);
        // $formData.append("tanggal[]",$tanggal.to);
        $formData.append("nik_kasir[]",$kasir.type);
        $formData.append("nik_kasir[]",$kasir.from);
        $formData.append("nik_kasir[]",$kasir.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptNotaJual') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        // $formData.append("tanggal[]",$tanggal.type);
        // $formData.append("tanggal[]",$tanggal.from);
        // $formData.append("tanggal[]",$tanggal.to);
        $formData.append("nik_kasir[]",$kasir.type);
        $formData.append("nik_kasir[]",$kasir.from);
        $formData.append("nik_kasir[]",$kasir.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptNotaJual') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    function closePrint () {
        document.body.removeChild(this.__container__);
    }

    function setPrint() {
        this.contentWindow.__container__ = this;
        this.contentWindow.onbeforeunload = closePrint;
        this.contentWindow.onafterprint = closePrint;
        this.contentWindow.focus();
        this.contentWindow.print();
    }

    function printPage (sURL) {
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

    $('#sai-rpt-print').click(function(){
        // $('#saku-report #canvasPreview').printThis({
        //     removeInline: true
        // });
        if($mode.from == "lama"){
            printPage("{{ url('esaku-report/lap-nota-jual-print') }}/?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to);
        }else{
            window.open("{{ url('esaku-report/lap-nota-jual-print-baru') }}/?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to);
        }
    });

    $('#sai-rpt-print-prev').click(function(){
        var newWindow = window.open();
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
        newWindow.document.write(html);
    });

    $("#sai-rpt-excel").click(function(e) {
        e.preventDefault();
        $("#saku-report #canvasPreview").table2excel({
            // exclude: ".excludeThisClass",
            name: "Lap_NotaJual_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_NotaJual_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });

    $("#sai-rpt-email").click(function(e) {
        e.preventDefault();
        alert('Incoming')
        // $('#formEmail')[0].reset();
        // $('#modalEmail').modal('show');
    });

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        alert('Incoming')
        // var link = "{{ url('esaku-report/lap-jurnal-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to+"&sum_ju[]="+$sum_ju.type+"&sum_ju[]="+$sum_ju.from+"&sum_ju[]="+$sum_ju.to;
        // window.open(link, '_blank'); 
    });
</script>