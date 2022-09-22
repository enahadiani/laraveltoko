
    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <style>
        .icon-tambah {
            background: #505050;
            /* mask: url("{{ url('img/add.svg') }}"); */
            -webkit-mask-image: url("{{ url('img/add.svg') }}");
            mask-image: url("{{ url('img/add.svg') }}");
            width: 12px;
            height: 12px;
        }
        .icon-close {
            background: #d4d4d4;
            /* mask: url("{{ url('img/lock.svg') }}");
                    */
            -webkit-mask-image: url("{{ url('img/lock.svg') }}");
            mask-image: url("{{ url('img/lock.svg') }}");
            width: 18px;
            height: 18px;
        }
        .icon-open {
            background: #d4d4d4;
            /* mask: url("{{ url('img/lock.svg') }}");
                    */
            -webkit-mask-image: url("{{ url('img/lock.svg') }}");
            mask-image: url("{{ url('img/lock.svg') }}");
            width: 18px;
            height: 18px;
        }
        .card-body-footer{
            background: white;
            position: fixed;
            bottom: 15px;
            right: 0;
            margin-right: 30px;
            z-index:3;
            height: 60px;
            border-top: ;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Akun" tambah="true" :thead="array('Kode','Nama','Tgl Input','Aksi')" :thwidth="array(20,70,0,10)" :thclass="array('','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
   <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Umum</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_modul" role="tab" aria-selected="true"><span class="hidden-xs-down">Relasi Modul</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_laporan" role="tab" aria-selected="true"><span class="hidden-xs-down">Relasi Laporan</span></a> </li>
                        </ul>
                        <div class="tab-content tab-form-content col-12 p-0">
                            <div class="tab-pane active" id="tab_umum" role="tabpanel">
                                <div class="form-group row " id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="nama">Nama</label>
                                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="modul">Kelompok Akun</label>
                                                <select class="form-control selectize" id="modul" name="modul" required>
                                                    <option value="">--Pilih--</option>
                                                    <option value="A">Aktiva</option>
                                                    <option value="P">Passiva</option>
                                                    <option value="L">Laba Rugi</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">           
                                                <label for="jenis">Kelompok Laporan</label>
                                                <select class="form-control" id="jenis" name="jenis" required>
                                                <option value="">--Pilih--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="account">Normal Akun</label>
                                                <select class="form-control selectize" id="account" name="account" required>
                                                <option value="">--Pilih--</option>
                                                <option value="D">D - Debet</option>
                                                <option value="C">C - Kredit</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_curr">Mata Uang</label>
                                                <input class="form-control" type="text" id="kode_curr" name="kode_curr" value="IDR" readonly required>            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kode_akun">Kode</label>
                                        <input class="form-control" type="text" id="kode_akun" name="kode_akun" required>
                                    </div>
                                    <div class="error-side col-md-6 col-sm-12">
                                        <p class="error-text" id="error-akun">Kode Akun sudah ada</p>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:70px">
                                    <div class="form-group col-md-2 col-12 mb-0">
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" id="block" name="blok" type="checkbox" value="0">
                                            <label class="custom-switch-btn" for="block"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-10 col-12">
                                        <label for="block">Aktif</label>
                                    </div>
                                    <div class="form-group col-md-2 col-12">
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" name="budget" id="budget" type="checkbox" value="0">
                                            <label class="custom-switch-btn" for="budget"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-10 col-12">
                                        <label for="block">Cek Anggaran</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_modul" role="tabpanel">
                                <!-- <div class='col-md-12 nav-control' style="padding: 0px 5px;height:38px">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div> -->
                                <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <style>
                                        th{
                                            vertical-align:middle !important;
                                        }
                                        /* #input-grid td{
                                            padding:0 !important;
                                        } */
                                        .gridexample .selectize-input.focus, .gridexample input.form-control, .gridexample .custom-file-label
                                        {
                                            border:1px solid black !important;
                                            border-radius:0 !important;
                                        }

                                        .gridexample .selectize-input
                                        {
                                            border-radius:0 !important;
                                        } 
                                        
                                        .modal-header .close {
                                            padding: 1rem;
                                            margin: -1rem 0 -1rem auto;
                                        }
                                        .hapus-item{
                                            cursor:pointer;
                                        }
                                        .selected{
                                            cursor:pointer;
                                            /* background:#4286f5 !important; */
                                            /* color:white; */
                                        }
                                        .gridexample td:not(:nth-child(1)):not(:nth-child(9)):hover
                                        {
                                            /* background: var(--theme-color-6) !important;
                                            color:white; */
                                            background:#f8f8f8;
                                            color:black;
                                        }

                                        .gridexample input:hover,
                                        .gridexample .selectize-input:hover,
                                        {
                                            width:inherit;
                                        }
                                        .gridexample ul.typeahead.dropdown-menu
                                        {
                                            width:max-content !important;
                                        }
                                        .gridexample td
                                        {
                                            overflow:hidden !important;
                                            height:37.2px !important;
                                            padding:0px !important;
                                        }

                                        .gridexample span
                                        {
                                            padding:0px 10px !important;
                                        }

                                        .gridexample input,.gridexample .selectize-input
                                        {
                                            overflow:hidden !important;
                                            height:35px !important;
                                        }
                                    </style>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th width="15%" colspan="2">Aksi</th>
                                            <th width="85%">Relasi Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_laporan" role="tabpanel">
                                <!-- <div class='col-md-12 nav-control' style="padding: 0px 5px;height:38px">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-lap" ></span></a>
                                </div> -->
                                <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-lap" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th width="15%" colspan="2">Aksi</th>
                                                <th width="40%">Versi Laporan</th>
                                                <th width="45%">Kelompok Akun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row-lap" class="add-row-lap btn btn-light2 btn-block btn-sm"> 
                                    <i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-footer row mx-auto" style="padding: 0 25px;">
                            <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                                <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                            </div>
                            <div style="text-align: right;" class="col-md-2 p-0 ">
                                <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->
    
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#error-akun').hide();

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    $optionJenis1 = [{value:'Neraca', text:'Neraca'}]
    $optionJenis2 = [{value:'Pendapatan', text:'Pendapatan'},{value:'Beban', text:'Beban'}]
    $dtkode_flag = [];
    $dtkode_fs = [];
    $dtkode_neraca = [];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();
    
    $('input[type="checkbox"]').click(function(){
        if($(this).is(":checked")){
            $(this).val(1);
        }
        else if($(this).is(":not(:checked)")){
            $(this).val(0);
        }
    });

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowLap(){
        var total_row = $('#input-lap tbody tr').length;
        $('#total-row-lap').html(total_row+' Baris');
    }

    //EVENT DROPDOWN//
    var jenis = $('#jenis').selectize();

    $('#modul').change(function(){
        var  select = jenis[0];
        var control = select.selectize;
        control.clearOptions();
        var value = $(this).val();
        var option = null;
        if(value == "A" || value == "P") {
            option = $optionJenis1;
        } else {
            option = $optionJenis2
        }
        
        control.addOption(option);
    })

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {             
            if(data[param] === isi){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    function getFlag(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        if(kode == ""){
            return false;
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/msakundet-flag') }}",
            dataType: 'json',
            data:{kode_flag:kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            var cek = $('.td'+target1).parents('tr').next('tr').find('.td-kode');
                            if(cek.length > 0){
                                cek.click();
                            }else{
                                $('.add-row').click();
                            }
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode PP tidak valid');   
                    }
                }
            }
        });
    }

    function getFS(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        if(kode == ""){
            return false;
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/fs') }}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode+" - "+result.data.data[0].nama);
                            $('.td'+target1).text(kode+" - "+result.data.data[0].nama);
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(kode+" - "+result.data.data[0].nama);
                            $('.td'+target1).text(kode+" - "+result.data.data[0].nama);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.td'+target2).addClass("px-0 py-0 aktif");
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                        getDataTypeAhead("{{ url('esaku-master/msakundet-neraca') }}","kode_neraca","kode_neraca",{ kode_fs: kode});
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode FS tidak valid');
                    }
                }
            }
        });
    }

    function getNeraca(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        if(kode == ""){
            return false;
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/msakundet-neraca') }}",
            dataType: 'json',
            data:{kode_neraca:kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            var cek = $('.td'+target1).parents('tr').next('tr').find('.td-kode_fs');
                            if(cek.length > 0){
                                cek.click();
                            }else{
                                $('.add-row-lap').click();
                            }
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode Neraca tidak valid');   
                    }
                }
            }
        });
    }
    

    function getDataTypeAhead(url,param,kode,filter={}){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data:filter,
            async:false,
            success:function(result){  
                eval('$dt'+param+' = []');    
                if(result.status) {
                    if(kode == "kode_flag" || kode == "kode_fs" || kode == "kode_neraca"){
                        for(i=0;i<result.daftar.length;i++){
                            eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode)+' - '+result.daftar[i].nama,name:result.daftar[i].nama}));  
                        }
                    }else{

                        for(i=0;i<result.daftar.length;i++){
                            eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
                        }
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getDataTypeAhead("{{ url('esaku-master/msakundet-flag') }}","kode_flag","kode_flag");
    getDataTypeAhead("{{ url('esaku-master/fs') }}","kode_fs","kode_fs");
    getDataTypeAhead("{{ url('esaku-master/msakundet-neraca') }}","kode_neraca","kode_neraca");
    // PLUGIN SCROLL di bagian preview dan form input

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/msakundet') }}", 
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [2],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_akun' },
            { data: 'nama' },
            { data: 'tgl_input' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[2 ,"desc"]]
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

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Akun');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_akun').attr('readonly', false);
        $('#input-grid tbody').html('');
        $('#input-lap tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        addRow("default");
        addRowLap("default");
        setWidthFooterCardBody();
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_akun').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_akun:{
                required: true,
                maxlength:10   
            },
            nama:{
                required: true,
                maxlength:50   
            },
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_akun').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/msakundet') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/msakundet') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            if(!formData.has('blok')){
                formData.append('blok',0);  
            }
            if(!formData.has('budget')){
                formData.append('budget',0);  
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            $.ajax({
                type: 'POST', 
                url: url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        dataTable.ajax.reload();
                        var kode = $('#kode_akun').val();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Akun');
                        $('#method').val('post');
                        $('#kode_akun').attr('readonly', false);
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add("kode_akun",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode akun sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/msakundet') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Akun ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS
    

    // BUTTON EDIT

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/msakundet') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#kode_akun').attr('readonly', true);
                    $('#kode_akun').val(id);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    $('#modul').trigger('change');
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#kode_curr').val(result.data[0].kode_curr);
                    // $('#blok')[0].selectize.setValue(result.data[0].block);                  
                    // $('#budget')[0].selectize.setValue(parseInt(result.data[0].status_gar));                  
                    if(result.data[0].block == 1){
                        $('#block').prop('checked', true);
                    }else{
                        $('#block').prop('checked', false);
                    }
                    
                    if(result.data[0].status_gar == 1){
                        $('#budget').prop('checked', true);
                    }else{
                        $('#budget').prop('checked', false);
                    }
                    $('#account')[0].selectize.setValue(result.data[0].normal);
                    
                    $('#input-grid tbody').html('');
                    if(result.detail_relasi.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_relasi.length;i++){
                            var line =result.detail_relasi[i];
                            input += "<tr class='row-jurnal'>";
                            input += "<td class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-kode tdflagke"+no+" tooltip-span'>"+line.kode_flag+" - "+line.nama_flag+"</span><input type='text' id='flagkode"+no+"' name='kode_flag[]' class='form-control inp-kode flagke"+no+" hidden' value='"+line.kode_flag+" - "+line.nama_flag+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-flag hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.detail_relasi.length;i++){
                            var line =result.detail_relasi[i];
                           
                            $('#flagkode'+no).typeahead({
                                source:$dtkode_flag,
                                displayText:function(item){
                                    return item.id;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            no++;
                        }
                        
                    }

                    $('#input-lap tbody').html('');
                    if(result.detail_keuangan.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_keuangan.length;i++){
                            var line =result.detail_keuangan[i];
                            input += "<tr class='row-lap'>";
                            input += "<td class='no-lap text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-kode_fs tdfske"+no+" tooltip-span'>"+line.kode_fs+" - "+line.nama_fs+"</span><input type='text' id='fskode"+no+"' name='kode_fs[]' class='form-control inp-kode_fs fske"+no+" hidden' value='"+line.kode_fs+" - "+line.nama_fs+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-kode_neraca tdneracake"+no+" tooltip-span'>"+line.kode_neraca+" - "+line.nama_neraca+"</span><input type='text' id='neracakode"+no+"' name='kode_neraca[]' class='form-control inp-kode_neraca neracake"+no+" hidden' value='"+line.kode_neraca+" - "+line.nama_neraca+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-neraca hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-lap tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.detail_relasi.length;i++){
                            var line =result.detail_relasi[i];
                           
                            $('#fskode'+no).typeahead({
                                source:$dtkode_fs,
                                displayText:function(item){
                                    return item.id;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            $('#neracakode'+no).typeahead({
                                source:$dtkode_neraca,
                                displayText:function(item){
                                    return item.id;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            no++;
                        }
                        
                    }
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    // $('#modal-preview').modal('hide');
                    $('.c-bottom-sheet').removeClass('active');
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Akun');
        editData(id);
       
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#kode_akun,#nama,#modul,#jenis,#kode_curr,#blok,#budget,#account').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_akun','nama','modul','jenis','kode_curr','blok','budget','account'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){
            var id = $(this).closest('tr').find('td').eq(0).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/msakundet') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        var data = result.data[0];
                        if(data.modul == 'A') {
                            modul = "Aktiva"
                        } else if(data.modul == 'P') {
                            modul = "Passiva"
                        } else {
                            modul = "Laba Rugi"
                        }

                        if(data.block == "0") {
                            block = "Unblock"
                        } else {
                            block = "Block"
                        }

                        if(data.status_gar == "0") {
                            gar = "Uncheck"
                        } else {
                            gar = "Check"
                        }

                        if(data.normal == "D") {
                            normal = "Debet"
                        } else {
                            normal = "Kredit"
                        }
                        var html = `
                        <div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
                            <div class="dropdown d-inline-block float-right">
                                <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                                <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class='separator'></div>
                        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) position:sticky'>
                                <table class="table table-prev mt-2" width="100%">
                                    <tr>
                                        <td style='border:none'>Kode Akun</td>
                                        <td style='border:none'>`+id+`</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Akun</td>
                                        <td>`+data.nama+`</td>
                                    </tr>
                                    <tr>
                                        <td>Modul</td>
                                        <td>`+modul+`</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td>`+data.jenis+`</td>
                                    </tr>
                                    <tr>
                                        <td>Currency</td>
                                        <td>`+data.kode_curr+`</td>
                                    </tr>
                                    <tr>
                                        <td>Status Block</td>
                                        <td>`+block+`</td>
                                    </tr>
                                    <tr>
                                        <td>Status Budget</td>
                                        <td>`+gar+`</td>
                                    </tr>
                                    <tr>
                                        <td>Normal Account</td>
                                        <td>`+normal+`</td>
                                    </tr>
                                </table>
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#prev-flag" role="tab" aria-selected="true"><span class="hidden-xs-down">Relasi Modul</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prev-lap" role="tab" aria-selected="true"><span class="hidden-xs-down">Relasi Laporan</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="prev-flag" role="tabpanel">
                                        <div class='col-md-12' style='margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="tbprev-flag" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="30%">Kode Flag</th>
                                                    <th width="65%">Nama Flag</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="prev-lap" role="tabpanel">
                                        <div class='col-md-12' style='margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="tbprev-lap" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                <thead style="background:#F8F8F8">
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="15%">Kode FS</th>
                                                        <th width="25%">Nama FS</th>
                                                        <th width="15%">Kode Lap</th>
                                                        <th width="40%">Nama Lap</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        `;

                        $('#content-bottom-sheet').html(html);
                        
                        $('#tbprev-flag tbody').html('');
                        if(result.detail_relasi.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.detail_relasi.length;i++){
                                var line =result.detail_relasi[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td>"+line.kode_flag+"</td>";
                                input += "<td>"+line.nama_flag+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#tbprev-flag tbody').html(input);
                            
                        }
                        
                        $('#tbprev-lap tbody').html('');
                        if(result.detail_keuangan.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.detail_keuangan.length;i++){
                                var line =result.detail_keuangan[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td>"+line.kode_fs+"</td>";
                                input += "<td>"+line.nama_fs+"</td>";
                                input += "<td>"+line.kode_neraca+"</td>";
                                input += "<td>"+line.nama_neraca+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#tbprev-lap tbody').html(input);
                        }

                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);

                        
                        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});

                        $('.preview-header').on('click','#btn-delete2',function(e){
                            var id = $('#preview-id').text();
                            $('.c-bottom-sheet').removeClass('active');
                            msgDialog({
                                id:id,
                                type:'hapus'
                            });
                        });

                        $('.preview-header').on('click', '#btn-edit2', function(){
                            var id= $('#preview-id').text();
                            $('#judul-form').html('Edit Data Jurnal');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            
                            $('#btn-save').attr('type','button');
                            $('#btn-save').attr('id','btn-update');
                            $('.c-bottom-sheet').removeClass('active');
                            editData(id);
                        });

                        $('.preview-header').on('click','#btn-cetak',function(e){
                            e.stopPropagation();
                            $('.dropdown-ke1').addClass('hidden');
                            $('.dropdown-ke2').removeClass('hidden');
                            console.log('ok');
                        });

                        $('.preview-header').on('click','#btn-cetak2',function(e){
                            // $('#dropdownAksi').dropdown('toggle');
                            e.stopPropagation();
                            $('.dropdown-ke1').removeClass('hidden');
                            $('.dropdown-ke2').addClass('hidden');
                        });

                        $('#trigger-bottom-sheet').trigger("click");
                        
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    // GRID

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_flag = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_flag = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_flag);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_flag);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_flag);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_flag);
               
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-flag").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
            }
        })
    }

    function hideUnselectedRowLap() {
        $('#input-lap > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_fs = $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_fs").val();
                var nama_fs = $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").val();
                var kode_neraca = $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_neraca").val();
                var nama_neraca = $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_neraca").val();

                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_fs").val(kode_fs);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-kode_fs").text(kode_fs);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").val(nama_fs);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-nama_fs").text(nama_fs);
               
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_neraca").val(kode_neraca);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-kode_neraca").text(kode_neraca);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_neraca").val(nama_neraca);
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-nama_neraca").text(nama_neraca);

                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_fs").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-kode_fs").show();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".search-fs").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-nama_fs").show();
                
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-kode_neraca").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-kode_neraca").show();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".search-neraca").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".inp-nama_neraca").hide();
                $('#input-lap > tbody > tr:eq('+index+') > td').find(".td-nama_neraca").show();
            }
        })
    }

    function addRow(param){
        if(param == "copy"){
            var kode_flag = $('#input-grid tbody tr.selected-row').find(".inp-kode").val();
            var nama_flag = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
        }else{
            
            var kode_flag = "";
            var nama_flag = "";
        }
        var no=$('#input-grid .row-jurnal:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdflagke"+no+" tooltip-span'>"+kode_flag+"</span><input type='text' name='kode_flag[]' class='form-control inp-kode flagke"+no+" hidden' value='"+kode_flag+"' required='' style='z-index: 1;position: relative;' id='flagkode"+no+"'><a href='#' class='search-item search-flag hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);

        if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        }
        
        hideUnselectedRow();
        if(param == "add"){
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(2)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-kode").show();
            $('#input-grid tbody tr:last').find(".td-kode").hide();
            $('#input-grid tbody tr:last').find(".search-flag").show();
            $('#input-grid tbody tr:last').find(".inp-kode").focus();
        }

        $('#flagkode'+no).typeahead({
            source:$dtkode_flag,
            displayText:function(item){
                return item.id;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
    }

    function addRowLap(param){
        if(param == "copy"){
            var kode_fs = $('#input-lap tbody tr.selected-row').find(".inp-kode_fs").val();
            var nama_fs = $('#input-lap tbody tr.selected-row').find(".inp-nama_fs").val();
            var kode_neraca = $('#input-lap tbody tr.selected-row').find(".inp-kode_neraca").val();
            var nama_neraca = $('#input-lap tbody tr.selected-row').find(".inp-nama_neraca").val();
        }else{
            
            var kode_fs = "";
            var nama_fs = "";
            var kode_neraca = "";
            var nama_neraca = "";
        }
        var no=$('#input-lap .row-lap:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-lap'>";
        input += "<td class='no-lap text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode_fs tdfske"+no+" tooltip-span'>"+kode_fs+"</span><input type='text' name='kode_fs[]' class='form-control inp-kode_fs fske"+no+" hidden' value='"+kode_fs+"' required='' style='z-index: 1;position: relative;' id='fskode"+no+"'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-kode_neraca tdneracake"+no+" tooltip-span'>"+kode_neraca+"</span><input type='text' name='kode_neraca[]' class='form-control inp-kode_neraca neracake"+no+" hidden' value='"+kode_neraca+"' required='' style='z-index: 1;position: relative;' id='neracakode"+no+"'><a href='#' class='search-item search-neraca hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "</tr>";
        $('#input-lap tbody').append(input);

        if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-lap tbody tr').not('.row-grid:last').removeClass('selected-row');
        }
        
        hideUnselectedRowLap();
        if(param == "add"){
            $('#input-lap td').removeClass('px-0 py-0 aktif');
            $('#input-lap tbody tr:last').find("td:eq(2)").addClass('px-0 py-0 aktif');
            $('#input-lap tbody tr:last').find(".inp-kode_fs").show();
            $('#input-lap tbody tr:last').find(".td-kode_fs").hide();
            $('#input-lap tbody tr:last').find(".search-fs").show();
            $('#input-lap tbody tr:last').find(".inp-kode_fs").focus();
        }

        $('#fskode'+no).typeahead({
            source:$dtkode_fs,
            displayText:function(item){
                return item.id;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('#neracakode'+no).typeahead({
            source:$dtkode_neraca,
            displayText:function(item){
                return item.id;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRowLap();
    }

    $('#form-tambah').on('click', '.add-row', function(){
        addRow("add");
    });

    $('#form-tambah').on('click', '.add-row-lap', function(){
        addRowLap("add");
    });

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var no =  $(this).parents("tr").find(".no-jurnal").text();
        switch(par){
            case 'kode_flag[]': 
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        switch(par){
            case 'kode_flag[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/msakundet-flag') }}",
                    columns : [
                        { data: 'kode_flag' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Flag",
                    pilih : "flag",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data){
                        $('.flagke'+no).val(data.kode_flag+" - "+data.nama);
                        $('.tdflagke'+no).html(data.kode_flag+" - "+data.nama);
                    },
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilterBSheet(options);

    });

    $('#input-lap').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var no =  $(this).parents("tr").find(".no-lap").text();
        console.log(par);
        switch(par){
            case 'kode_fs[]': 
            break;
            case 'kode_neraca[]': 
                var tmp = $(this).closest('tr').find('input[name="kode_fs[]"]').attr('class');
                var tmp2 = tmp.split(" ");
                var kode_fs = tmp2[2];
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        switch(par){
            case 'kode_fs[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/fs') }}",
                    columns : [
                        { data: 'kode_fs' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar FS",
                    pilih : "fs",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data){
                        $('.fske'+no).val(data.kode_fs+" - "+data.nama);
                        $('.tdfske'+no).html(data.kode_fs+" - "+data.nama);
                        getDataTypeAhead("{{ url('esaku-master/msakundet-neraca') }}","kode_neraca","kode_neraca",{ kode_fs: data.kode_fs});
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'kode_neraca[]': 
                var tmp = $(this).closest('tr').find('.inp-kode_fs').val().split(" - ");
                var kode_fs = tmp[0];
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/msakundet-neraca') }}",
                    columns : [
                        { data: 'kode_neraca' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Neraca",
                    pilih : "neraca",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data){
                        $('.neracake'+no).val(data.kode_neraca+" - "+data.nama);
                        $('.tdneracake'+no).html(data.kode_neraca+" - "+data.nama);
                    },
                    parameter : {kode_fs: kode_fs},
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilterBSheet(options);

    });
    
    $('#input-grid').on('keydown','.inp-kode',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode'];
        var nxt2 = ['.td-kode'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 1:
                    var noidx = $(this).parents("tr").find(".no-jurnal").text();
                    var kode = $(this).val();
                    var target1 = "flagke"+noidx;
                    var target2 = "nmflagke"+noidx;
                    var target3 = "";
                    getFlag(kode,target1,target2,target3,'tab');                    
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#input-lap').on('keydown','.inp-kode_fs, .inp-kode_neraca',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode_fs','.inp-kode_neraca'];
        var nxt2 = ['.td-kode_fs','.td-kode_neraca'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 1:
                    var noidx = $(this).parents("tr").find(".no-lap").text();
                    var kode = $(this).val();
                    var target1 = "fske"+noidx;
                    var target2 = "neracake"+noidx;
                    var target3 = "";
                    getFS(kode,target1,target2,target3,'tab');                    
                    break;
                case 2:
                    var noidx = $(this).parents("tr").find(".no-lap").text();
                    var kode = $(this).val();
                    var target1 = "neracake"+noidx;
                    var target2 = "nmneracake"+noidx;
                    var target3 = "";
                    getNeraca(kode,target1,target2,target3,'tab'); 
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        $('#input-lap tbody tr').removeClass('selected-row');
        
        hideUnselectedRow();
    });

    $('#input-lap tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-lap tbody tr').not(this).removeClass('selected-row');
        $('#input-grid tbody tr').removeClass('selected-row');
        hideUnselectedRowLap();
    });

    $('#data-flag > .nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            addRow("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });

    $('#data-lap > .nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            addRowLap("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var no = $(this).parents("tr").find(".no-jurnal").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-flag").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-flag").hide();
                    
                }
            }
        }
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-lap').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-lap td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_fs = $(this).parents("tr").find(".inp-kode_fs").val();
                var kode_neraca = $(this).parents("tr").find(".inp-kode_neraca").val();

                var no = $(this).parents("tr").find(".no-lap").text();

                $(this).parents("tr").find(".inp-kode_fs").val(kode_fs);
                $(this).parents("tr").find(".td-kode_fs").text(kode_fs);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode_fs").show();
                    $(this).parents("tr").find(".td-kode_fs").hide();
                    $(this).parents("tr").find(".search-fs").show();
                    $(this).parents("tr").find(".inp-kode_fs").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode_fs").hide();
                    $(this).parents("tr").find(".td-kode_fs").show();
                    $(this).parents("tr").find(".search-fs").hide();
                    
                }

                $(this).parents("tr").find(".inp-kode_neraca").val(kode_neraca);
                $(this).parents("tr").find(".td-kode_neraca").text(kode_neraca);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-kode_neraca").show();
                    $(this).parents("tr").find(".td-kode_neraca").hide();
                    $(this).parents("tr").find(".search-neraca").show();
                    $(this).parents("tr").find(".inp-kode_neraca").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode_neraca").hide();
                    $(this).parents("tr").find(".td-kode_neraca").show();
                    $(this).parents("tr").find(".search-neraca").hide();
                    
                }
            }
        }
    });

    $('#input-lap').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-lap').each(function(){
            var nom = $(this).closest('tr').find('.no-lap');
            nom.html(no);
            no++;
        });
        hitungTotalRowLap();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    </script>