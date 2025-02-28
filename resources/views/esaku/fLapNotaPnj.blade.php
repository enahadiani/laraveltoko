<link href="{{ asset('asset_dore/css/jquery.treegrid.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('report-new.css?version=_').time() }}" />
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
                                        <x-inp-filter kode="kode_lokasi" nama="Lokasi" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','2','3','i')"/>
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

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('asset_dore/js/jquery.treegrid.js') }}"></script>

<script type="text/javascript">


var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var $kode_lokasi = {
        type : "=",
        from : "{{ Session::get('lokasi') }}",
        fromname : "{{ Session::get('namaLokasi') }}",
        to : "",
        toname : "",
    }
    var $periode = {
        type : "=",
        from : "{{ date('Ym') }}",
        fromname : namaPeriode("{{ date('Ym') }}"),
        to : "",
        toname : "",
    }
    var $no_bukti = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $aktif = "";

    $.fn.DataTable.ext.pager.numbers_length = 5;

    function loadFilterDefault(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-report/filter-default') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                if(result.status){

                    $('#kode_lokasi-from').val("{{ Session::get('lokasi') }}");
                    $('#periode-from').val(namaPeriode(result.periode));
                    $periode = {
                        type : "=",
                        from : result.periode,
                        fromname : namaPeriode(result.periode),
                        to : "",
                        toname : "",
                    }
                    generateRptFilter('#inputFilter',{
                        kode : ['kode_lokasi','periode','no_bukti'],
                        nama : ['Lokasi','Periode','No Bukti'],
                        header : [['Lokasi','Nama'],['Periode','Nama'],['No Bukti','Keterangan']],
                        headerpilih : [['Lokasi','Nama','Action'],['Periode','Nama','Action'],['No Bukti','Keterangan','Action']],
                        columns: [
                            [
                                { data: 'kode_lokasi' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'periode' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'no_jual' },
                                { data: 'keterangan' }
                            ]
                        ],
                        url :["{{ url('esaku-report/filter-lokasi') }}","{{ url('esaku-report/filter-periode') }}","{{ url('esaku-report/filter-bukti-pnj') }}"],
                        parameter:[{},
                        {
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                        },{
                            // 'kode_lokasi[0]':$kode_lokasi.type,
                            // 'kode_lokasi[1]':$kode_lokasi.from,
                            // 'kode_lokasi[2]':$kode_lokasi.to,
                            // 'periode[0]':$periode.type,
                            // 'periode[1]':$periode.from,
                            // 'periode[2]':$periode.to,
                            'kode_lokasi': $kode_lokasi.from,
                            'periode': $periode.from
                        }],
                        orderby:[[],[[0,"desc"]],[[0,"asc"]]],
                        width:[['30%','70%'],['30%','70%'],['30%','70%']],
                        display:['kode','name','kode'],
                        pageLength:[10,12,10,10]
                    })

                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    alert(JSON.stringify(result.message));
                }
            }
        });
    }

    loadFilterDefault();

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
    
    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            var kode_lokasi = $kode_lokasi;
            var periode = $periode;
            generateRptFilter('#inputFilter',{
                kode : ['kode_lokasi','periode','no_bukti'],
                nama : ['Lokasi','Periode','No Bukti'],
                header : [['Lokasi','Nama'],['Periode','Nama'],['No Bukti','Keterangan']],
                headerpilih : [['Lokasi','Nama','Action'],['Periode','Nama','Action'],['No Bukti','Keterangan','Action']],
                columns: [
                    [
                        { data: 'kode_lokasi' },
                        { data: 'nama' },
                    ],
                    [
                        { data: 'periode' },
                        { data: 'nama' },
                    ],
                    [
                        { data: 'no_jual' },
                        { data: 'keterangan' }
                    ]
                ],
                url :["{{ url('esaku-report/filter-lokasi') }}","{{ url('esaku-report/filter-periode') }}","{{ url('esaku-report/filter-bukti-pnj') }}"],
                parameter:[{},{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                },{
                    // 'kode_lokasi[0]':kode_lokasi.type,
                    // 'kode_lokasi[1]':kode_lokasi.from,
                    // 'kode_lokasi[2]':kode_lokasi.to,
                    // 'periode[0]':periode.type,
                    // 'periode[1]':periode.from,
                    // 'periode[2]':periode.to,
                    'kode_lokasi': $kode_lokasi.from,
                    'periode': $periode.from
                }],
                orderby:[[],[[0,"desc"]],[[0,"asc"]]],
                width:[['30%','70%'],['30%','70%'],['30%','70%']],
                display:['kode','name','kode'],
                pageLength:[10,12,10,10]
            })
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptNotaPnj') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptNotaPnj') }}";
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
        printPage("{{ url('esaku-report/lap-nota-pnj-print') }}/?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&kode_lokasi[]="+$kode_lokasi.type+"&kode_lokasi[]="+$kode_lokasi.from+"&kode_lokasi[]="+$kode_lokasi.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to);
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
    });

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        alert('Incoming')
        // var link = "{{ url('esaku-report/lap-jurnal-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to+"&sum_ju[]="+$sum_ju.type+"&sum_ju[]="+$sum_ju.from+"&sum_ju[]="+$sum_ju.to;
        // window.open(link, '_blank'); 
    });
</script>