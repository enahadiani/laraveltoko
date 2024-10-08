<link rel="stylesheet" href="{{ asset('report.css?version=_').time() }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Buku Besar Barang"/>
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
                                        <x-inp-filter kode="tanggal" nama="Tanggal" selected="3" :option="array('3')" datepicker="true"/>
                                        <x-inp-filter kode="kode_gudang" nama="Gudang" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="kode_barang" nama="Barang" selected="3" :option="array('3')"/>
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
<x-report-result judul="Laporan Buku Besar Barang" padding="px-4 py-4"/>

@include('modal_search')
@include('modal_email')

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js?version=_').time() }}"></script>

<script type="text/javascript">


    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var d = new Date();
    var day = String(d.getDate()).padStart(2, '0');
    var mm = String(d.getMonth() + 1).padStart(2, '0');
    var yyyy = d.getFullYear();
    
    $date = day + '/'+ mm + '/' + yyyy;

    var $tanggal = {
        type: "=",
        from: $date,
        fromname: $date,
        to: "",
        toname: "",
    }

    var $kode_gudang = {
        type : "=",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $kode_barang = {
        type : "=",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $kode_lokasi = {
        type : "=",
        from : "{{ Session::get('lokasi') }}",
        fromname : "{{ Session::get('namaLokasi') }}",
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
                    $('#kode_lokasi-from').val(result.kode_lokasi);
                    $('#kode_gudang-from').val(result.kode_gudang);
                   
                    $kode_lokasi = {
                        type : "=",
                        from : result.kode_lokasi,
                        fromname : result.kode_lokasi,
                        to : "",
                        toname : "",
                    }

                    $kode_gudang = {
                        type : "=",
                        from : result.kode_gudang,
                        fromname : result.kode_gudang,
                        to : "",
                        toname : "",
                    }
                    
                    $('#tanggal-from').val($date);
                    $('#tanggal-to').addClass("datepicker");

                    generateRptFilter('#inputFilter',{
                        kode : ['kode_lokasi','tanggal','kode_gudang','kode_barang'],
                        nama : ['Lokasi','Tanggal','Kode Gudang','Barang'],
                        header : [['Kode', 'Nama'],['Kode'],['Kode', 'Nama'],['Kode', 'Nama']],
                        headerpilih : [['Kode', 'Nama','Action'],['Kode','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
                        columns: [
                            [
                                { data: 'kode_lokasi' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'kode'}
                            ],
                            [
                                { data: 'kode_gudang' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'kode_barang' },
                                { data: 'nama' }
                            ]
                        ],
                        url :["{{ url('esaku-report/filter-lokasi') }}","","{{ url('esaku-report/filter-gudang') }}","{{ url('esaku-report/filter-barang') }}"],
                        parameter:[{},{},{
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                        },{
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                            'kode_gudang':$kode_gudang.from
                        }],
                        orderby:[[],[],[],[]],
                        width:[['30%','70%'],['100%'],['30%','70%'],['30%','70%']],
                        display:['kode','kode','kode','kode'],
                        pageLength:[10,10,10,10]
                    });
                
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
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
            var kode_gudang = $kode_gudang;

            generateRptFilter('#inputFilter',{
                kode : ['kode_lokasi','tanggal','kode_gudang','kode_barang'],
                nama : ['Lokasi','Tanggal','Kode Gudang','Barang'],
                header : [['Kode', 'Nama'],['Kode'],['Kode', 'Nama'],['Kode', 'Nama']],
                headerpilih : [['Kode', 'Nama','Action'],['Kode','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
                columns: [
                    [
                        { data: 'kode_lokasi' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode'}
                    ],
                    [
                        { data: 'kode_gudang' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode_barang' },
                        { data: 'nama' }
                    ]
                ],
                url :["{{ url('esaku-report/filter-lokasi') }}","","{{ url('esaku-report/filter-gudang') }}","{{ url('esaku-report/filter-barang') }}"],
                parameter:[{},{},{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                },{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                    'kode_gudang':kode_gudang.from
                }],
                orderby:[[],[],[],[]],
                width:[['30%','70%'],['100%'],['30%','70%'],['30%','70%']],
                display:['kode','kode','kode','kode'],
                pageLength:[10,10,10,10]
            });
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("kode_gudang[]",$kode_gudang.type);
        $formData.append("kode_gudang[]",$kode_gudang.from);
        $formData.append("kode_gudang[]",$kode_gudang.to);
        $formData.append("kode_barang[]",$kode_barang.type);
        $formData.append("kode_barang[]",$kode_barang.from);
        $formData.append("kode_barang[]",$kode_barang.to);
        $formData.append("tanggal[]", $tanggal.type);
        $formData.append("tanggal[]", ($tanggal.from != "" ? reverseDate2($tanggal.from, "/", "-") : "") );
        $formData.append("tanggal[]", ($tanggal.to != "" ? reverseDate2($tanggal.to, "/", "-") : ""));
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptBukuBarang') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("kode_gudang[]",$kode_gudang.type);
        $formData.append("kode_gudang[]",$kode_gudang.from);
        $formData.append("kode_gudang[]",$kode_gudang.to);
        $formData.append("kode_barang[]",$kode_barang.type);
        $formData.append("kode_barang[]",$kode_barang.from);
        $formData.append("kode_barang[]",$kode_barang.to);
        $formData.append("tanggal[]", $tanggal.type);
        $formData.append("tanggal[]", ($tanggal.from != "" ? reverseDate2($tanggal.from, "/", "-") : "") );
        $formData.append("tanggal[]", ($tanggal.to != "" ? reverseDate2($tanggal.to, "/", "-") : ""));
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/rptBukuBarang') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#sai-rpt-print').click(function(){
        $('#saku-report #canvasPreview').printThis({
            removeInline: true
        });
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
            name: "LapBukuBesarBarang_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "LapBukuBesarBarang_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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