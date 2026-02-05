<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Pembelian V2"/>
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
                                        <x-inp-filter kode="gudang" nama="Gudang" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="vendor" nama="Vendor" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="no_bukti" nama="No Bukti" selected="3" :option="array('3')"/>
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
<x-report-result judul="Laporan Pembelian V2" padding="px-4 py-4"/>

@include('modal_search')
@include('modal_email')

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

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
    var $gudang = {
            type : "=",
            from : "{{ Session::get('pabrik') }}",
            fromname : "{{ Session::get('pabrik') }}",
            to : "",
            toname : "",
        }
    var $vendor = {
            type : "all",
            from : "",
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

    console.log("{{ Session::get('pabrik') }}");

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));
    $('#gudang-from').val("{{ Session::get('pabrik') }}");

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
        kode : ['periode','gudang','vendor','no_bukti'],
        nama : ['Periode','Gudang','Vendor','No Bukti'],
        header : [
            ['Kode','Nama'],
            ['Kode','Nama'],
            ['Kode','Nama'],
            ['No Bukti','Keterangan']
        ],
        headerpilih : [
            ['Periode','Action'],
            ['Kode','Nama','Action'],
            ['Kode','Nama','Action'],
            ['No Bukti','Keterangan','Action']
        ],
        columns: [
            [
                { data: 'periode' },
                { data: 'nama' },
            ],
            [
                { data: 'kode_gudang' },
                { data: 'nama' }
            ],
            [
                { data: 'kode_vendor' },
                { data: 'nama' }
            ],
            [
                { data: 'no_bukti' },
                { data: 'keterangan' }
            ]
        ],
        url :[
            "{{ url('esaku-report/filter-periode-pmb2') }}",
            "{{ url('esaku-report/filter-gudang') }}",
            "{{ url('esaku-report/filter-vendor') }}",
            "{{ url('esaku-report/filter-bukti-pmb2') }}"
         ],
        parameter:[
            {},
            {},
            {},
            {
                'periode[0]':$periode.type,
                'periode[1]':$periode.from,
                'periode[2]':$periode.to,
                'vendor[0]':$vendor.type,
                'vendor[1]':$vendor.from,
                'vendor[2]':$vendor.to,
                'gudang[0]':$gudang.type,
                'gudang[1]':$gudang.from,
                'gudang[2]':$gudang.to
            }
        ],
        orderby:[
            [[0,"desc"]],
            [[0,"desc"]],
            [[0,"desc"]],
            [[0,"desc"]],
        ],
         width:[
            ['30%','70%'],
            ['30%','70%'],
            ['30%','70%'],
            ['30%','70%'],   
        ],
        display:['name','kode','kode','kode'],
        pageLength:[12,10,10,10]
    })
    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
                kode : ['periode','gudang','vendor','no_bukti'],
                nama : ['Periode','Gudang','Vendor','No Bukti'],
                header : [
                    ['Kode','Nama'],
                    ['Kode','Nama'],
                    ['Kode','Nama'],
                    ['No Bukti','Keterangan']
                ],
                headerpilih : [
                    ['Periode','Action'],
                    ['Kode','Nama','Action'],
                    ['Kode','Nama','Action'],
                    ['No Bukti','Keterangan','Action']
                ],
                columns: [
                    [
                        { data: 'periode' },
                        { data: 'nama' },
                    ],
                    [
                        { data: 'kode_gudang' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode_vendor' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'no_bukti' },
                        { data: 'keterangan' }
                    ]
                ],
                url :[
                    "{{ url('esaku-report/filter-periode-pmb2') }}",
                    "{{ url('esaku-report/filter-gudang') }}",
                    "{{ url('esaku-report/filter-vendor') }}",
                    "{{ url('esaku-report/filter-bukti-pmb2') }}"
                ],
                parameter:[
                    {},
                    {},
                    {},
                    {
                        'periode[0]':$periode.type,
                        'periode[1]':$periode.from,
                        'periode[2]':$periode.to,
                        'vendor[0]':$vendor.type,
                        'vendor[1]':$vendor.from,
                        'vendor[2]':$vendor.to,
                        'gudang[0]':$gudang.type,
                        'gudang[1]':$gudang.from,
                        'gudang[2]':$gudang.to
                    }
                ],
                orderby:[
                    [[0,"desc"]],
                    [[0,"desc"]],
                    [[0,"desc"]],
                    [[0,"desc"]],
                ],
                width:[
                    ['30%','70%'],
                    ['30%','70%'],
                    ['30%','70%'],
                    ['30%','70%'],   
                ],
                display:['name','kode','kode','kode'],
                pageLength:[12,10,10,10]
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
        $formData.append("gudang[]",$gudang.type);
        $formData.append("gudang[]",$gudang.from);
        $formData.append("gudang[]",$gudang.to);
        $formData.append("vendor[]",$vendor.type);
        $formData.append("vendor[]",$vendor.from);
        $formData.append("vendor[]",$vendor.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptPembelian') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("gudang[]",$gudang.type);
        $formData.append("gudang[]",$gudang.from);
        $formData.append("gudang[]",$gudang.to);
        $formData.append("vendor[]",$vendor.type);
        $formData.append("vendor[]",$vendor.from);
        $formData.append("vendor[]",$vendor.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptPembelian') }}";
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
        var no_sop = $no_bukti.from;
        printPage("{{ url('esaku-trans/nota') }}/?no_sop="+no_sop);
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
            name: "Lap_Pembelian_V2_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_Pembelian_V2_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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