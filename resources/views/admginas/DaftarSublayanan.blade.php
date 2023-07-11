<style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }

        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }

        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        .hidden{
            display:none;
        }

        .datetime-reset-button {
            margin-right: 20px !important;
            margin-top: 3px !important;
        }
        #table-search
        {
            border-collapse:collapse !important;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
        padding-left: 5px;
        padding-right: 5px; }
        .px-0{
            padding-left: 2px !important;
            padding-right: 2px !important;
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }

        .btn-light2{
            background:#F8F8F8;
            color:#D4D4D4;
        }

        .btn-light2:hover{
            color:#131113;
        }

        .btn-light2:active{
            color: #131113;
            background-color: #d8d8d8;
        }

        .custom-file-label::after{
            content:"Cari berkas" !important;
            border-left:0;
            color: var(--theme-color-1) !important;
        }
        .focus{
            /* border:none !important; */
            box-shadow:none !important;
        }
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }
        th{
            vertical-align:middle !important;
        }
        #input-nilai .selectize-input.focus, #input-nilai input.form-control, #input-nilai .custom-file-label,  #input-dok .selectize-input.focus, #input-dok input.form-control, #input-dok .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }
        
        #input-nilai .selectize-input,  #input-dok .selectize-input
        {
            border-radius:0 !important;
        } 
        
        .modal-header .close {
            padding: 1rem;
            margin: -1rem 0 -1rem auto;
        }
        .check-item{
            cursor:pointer;
        }
        .selected{
            cursor:pointer;
            /* background:#4286f5 !important; */
            /* color:white; */
        }
        #input-nilai td:not(:nth-child(1)):not(:nth-child(5)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-dok td:not(:nth-child(1)):not(:nth-child(7)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-nilai input:hover,
        #input-nilai .selectize-input:hover,
        {
            width:inherit;
        }

        #input-dok input:hover,
        #input-dok .selectize-input:hover,
        {
            width:inherit;
        }

        #input-nilai ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }

        #input-dok ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-nilai td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }
        
        #input-nilai span
        {
            padding:0px 10px !important;
        }
        
        #input-nilai input,#input-nilai .selectize-input
        {
            overflow:hidden !important;
        }

        #input-dok td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }
        
        #input-dok span
        {
            padding:0px 10px !important;
        }
        
        #input-dok input,#input-dok .selectize-input
        {
            overflow:hidden !important;
        }
        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .readonly > .input-group-prepend{
            background: #e9ecef !important;
        }

        .readonly > .search-item2{
            background: #e9ecef !important;
            cursor:not-allowed;
            display:none;
        }

        .input-group > .form-control 
        {
            border-radius: 0.5rem !important;
        }

        .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #e9ecef !important;
            border: 1px solid #e9ecef !important;
            border-radius: 0.25rem !important;
            color: var(--theme-color-1);
            font-weight:bold;
            cursor:pointer;
        }

        .readonly > .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #d7d7d7 !important;
            border: 1px solid #d7d7d7 !important;
            border-radius: 0.25rem !important;
            color: black;
            font-weight:bold;
            cursor:pointer;
        }

        span[class^=info-name]{
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
        }

        .readonly > span[class^=info-name] {
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
            background: #e9ecef !important;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .readonly >  .info-icon-hapus{
            display:none;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
            
        }

        .readonly >  .form-control{
            background: #e9ecef !important;
        }

        .selectize-input {
            min-height: unset !important;
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            line-height: 30px;
            border-radius: 0.5rem;
        }

        label{
            margin-bottom: 0.2rem;
        }        
    </style>

    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Klien</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">
                            <div class="input-group-append" >
                                <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th>ID Sublayanan</th>
                                    <th>Nama Sublayanan</th>
                                    <th>ID Layanan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body" id="form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id_sublayanan">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="nama_klien">ID Sublayanan</label>
                                        <input class="form-control" type="text" id="id_sub" name="id_sublayanan">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="select-from-library-container mb-1">
                                            <label for="file_gambar">Banner</label>
                                            <div class="select-from-library-button sfl-single mb-5" data-library-id="#libraryModal" data-count="1">
                                                <div id="div-banner" class="card d-flex flex-row mb-4 media-thumb-container justify-content-center align-items-center" style="cursor: pointer;">
                                                    <span id="span-banner">Drop photo here to upload</span>
                                                    <img id="banner-preview" alt="banner" src="#" height="90" width="300" />
                                                </div>
                                                <input type="file" id="upload-banner" name="file_gambar" style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;cursor: pointer;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top: -99px;">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="nama_perusahaan">Nama Sublayanan</label>
                                        <input class="form-control" type="text" id="nama_sublayanan" name="nama_sublayanan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="id_layanan">ID Layanan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_id_layanan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-id_layanan" id="id_layanan" name="id_layanan" value="" title="" readonly style="background:#e9ecef">
                                            <span class="info-name_id_layanan hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_id_layanan" readonly style="background:#e9ecef"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="deskripsi_singkat">Deskripsi Singkat</label>
                                        <textarea class="form-control" name="deskripsi_singkat" id="deskripsi_singkat" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
            <div class="modal-content" style="border-radius:0.75em">
                <div class="modal-header py-0" style="display:block;">
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Client <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="dropdown d-inline-block float-right">
                        <button class="btn dropdown-toggle mb-1" type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0">
                        <h6 class="mx-0 my-0 py-2">Aksi <i class="simple-icon-arrow-down ml-1" style="font-size: 10px;"></i></h6>
                        </button>
                        <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            {{-- <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a> --}}
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                            {{-- <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a> --}}
                            {{-- <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="content-preview" style="height:450px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->

    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h5 class="modal-title" style="position: absolute;"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
        setHeightForm();
        var $iconLoad = $('.preloader');
        $('#process-upload').addClass('disabled');
        $('#process-upload').prop('disabled', true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var editor1 = CKEDITOR.replace('deskripsi_singkat', {
            removeButtons: 'Save,Source,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,Image,Unlink,Link,Flash,Table,Anchor,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Language,JustifyBlock,JustifyRight,JustifyCenter,BidiRtl,BidiLtr,JustifyLeft,Blockquote,CreateDiv,Indent,Outdent,BulletedList,RemoveFormat,CopyFormatting,NumberedList,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About'
        });

        var editor2 = CKEDITOR.replace('deskripsi', {
            toolbarGroups: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
	        ],
            removeButtons: 'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,Language,BidiRtl,BidiLtr,Link,Unlink,Anchor,Flash,Image,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,BGColor,TextColor,Maximize,ShowBlocks,About'
        });

        function fileReader(input, idImg, idSpan) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#'+idImg).show();
                    $('#'+idSpan).hide();
                    $("#"+idImg).attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        $('#upload-banner').change(function(){
            var parent = $('#div-banner').children();
            var idSpan = $(parent[0]).attr('id');
            var idGbr = $(parent[1]).attr('id');
            fileReader(this, idGbr, idSpan);
        });

        // var scrollform = document.querySelector('.form-body');
        var psscrollform = new PerfectScrollbar('#form-body');
        
        // var scroll = document.querySelector('#content-preview');
        // var psscroll = new PerfectScrollbar(scroll);

        $('#form-tambah').on('click', '.search-item2', function(){
            if($(this).css('cursor') == "not-allowed"){
                return false;
            }
            var par = $(this).closest('div').find('input').attr('name');
            showFilter(par);
        });

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

        function showFilter(param,target1=null,target2=null){
            var par = param;

            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            var parameter = {param:par};
            
            switch(par){
                case 'id_layanan': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('admginas-master/layanan') }}";
                    var columns = [
                        { data: 'id_layanan' },
                        { data: 'nama_layanan' }
                    ];
                    var judul = "Daftar Layanan";
                    var pilih = "id_layanan";
                    var jTarget1 = "text";
                    var jTarget2 = "text";
                    $target = ".info-code_"+par;
                    $target2 = ".info-name_"+par;
                    $target3 = "";
                    $target4 = "";
                    var width = ["30%","70%"];
                break;
            }

            var header_html = '';
            for(i=0; i<header.length; i++){
                header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
            }

            var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table>";

            $('#modal-search .modal-body').html(table);

            var searchTable = $("#table-search").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                ajax: {
                    "url": toUrl,
                    "data": parameter,
                    "type": "GET",
                    "async": false,
                    "dataSrc" : function(json) {
                        return json.daftar;
                    }
                },
                columns: columns,
                drawCallback: function () {
                    $($(".dataTables_wrapper .pagination li:first-of-type"))
                        .find("a")
                        .addClass("prev");
                    $($(".dataTables_wrapper .pagination li:last-of-type"))
                        .find("a")
                        .addClass("next");

                    $(".dataTables_wrapper .pagination").addClass("pagination-sm");
                },
                language: {
                    paginate: {
                        previous: "<i class='simple-icon-arrow-left'></i>",
                        next: "<i class='simple-icon-arrow-right'></i>"
                    },
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    lengthMenu: "Items Per Page _MENU_",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(terfilter dari _MAX_ total entri)"
                },
            });

            $('#modal-search .modal-title').html(judul);
            $('#modal-search').modal('show');
            searchTable.columns.adjust().draw();

            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(kode == "No data available in table"){
                        return false;
                    }

                    if(jTarget1 == "val"){
                        $($target).val(kode);
                    }else{
                        $('#'+par).css('border-left',0);
                        $('#'+par).val(kode);
                        $($target).text(kode);
                        $($target).attr("title",nama);
                        $($target).parents('div').removeClass('hidden');
                    }

                    if(jTarget2 == "val"){
                        $($target2).val(nama);
                    }else if(jTarget2 == "title"){
                        $($target2).attr("title",nama);
                        $($target2).removeClass('hidden');
                    }else if(jTarget2 == "text2"){
                        $($target2).text(nama);
                    }else{
                        var width= $('#'+par).width()-$('#search_'+par).width()-10;
                        var pos =$('#'+par).position();
                        var height = $('#'+par).height();
                        console.log(par);
                        $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                        $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                        $($target2+' span').text(nama);
                        $($target2).attr("title",nama);
                        $($target2).removeClass('hidden');
                        $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
                    }

                    if($target3 != ""){
                        
                    }

                    if($target4 != ""){

                    }
                    $('#modal-search').modal('hide');
                }
            });
        }

        $('.info-icon-hapus').click(function(){
            var par = $(this).closest('div').find('input').attr('name');
            $('#'+par).val('');
            $('#'+par).attr('readonly',false);
            $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
            $('.info-code_'+par).parent('div').addClass('hidden');
            $('.info-name_'+par).addClass('hidden');
            $(this).addClass('hidden');
        });

        // LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
        
        var dataTable = $("#table-data").DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            'ajax': {
                'url': "{{ url('admginas-master/sublayanan') }}",
                'async':false,
                'type': 'GET',
                'dataSrc' : function(json) {
                    if(json.status){
                        return json.daftar;   
                    }else if(!json.status && json.message == "Unauthorized"){
                        window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                        return [];
                    }else{
                        return [];
                    }
                }
            },
            'columnDefs': [
                {
                    "targets": 0,
                    "createdCell": function (td, cellData, rowData, row, col) {
                        if ( rowData.status == "baru" ) {
                            $(td).parents('tr').addClass('selected');
                            $(td).addClass('last-add');
                        }
                    }
                },
                {'targets': 3, data: null, 'defaultContent': action_html, 'className': 'text-center' }
            ],
            'columns': [
                { data: 'id_sublayanan' },
                { data: 'nama_sublayanan' },
                { data: 'id_layanan' },
            ],
            order:[[3,'desc']],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            }
        });

        $.fn.DataTable.ext.pager.numbers_length = 5;

        $("#searchData").on("keyup", function (event) {
            dataTable.search($(this).val()).draw();
        });

        $("#page-count").on("change", function (event) {
            var selText = $(this).val();
            dataTable.page.len(parseInt(selText)).draw();
        });

    // END LIST DATA

        $('#saku-form').on('click', '#btn-kembali', function(){
            var kode = null;
            msgDialog({
                id:kode,
                type:'keluar'
            });
        });

        $('#saku-datatable').on('click', '#btn-tambah', function(){
            $('#row-id').hide();
            $('#method').val('post');
            $('#judul-form').html('Tambah Data Sublayanan');
            $('#btn-update').attr('id','btn-save');
            $('#btn-save').attr('type','submit');
            $('#form-tambah')[0].reset();
            $('#id_sub').attr('readonly',false);
            $('#form-tambah').validate().resetForm();
            $('#id').val('');
            $('#id_edit').val('');
            editor1.setData('');
            editor2.setData('');
            $('#saku-datatable').hide();
            $('#saku-form').show();
            $('#banner-preview').hide();
            $('#span-banner').show();
            $('.input-group-prepend').addClass('hidden');
            $('span[class^=info-name]').addClass('hidden');
            $('.info-icon-hapus').addClass('hidden');
            $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        });

        $('#form-tambah').validate({
            ignore: [],
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var id = $('#id_sublayanan').val();
                if(parameter == "edit"){
                    var url = "{{ url('admginas-master/sublayanan-ubah') }}/"+id;
                    var pesan = "updated";
                }else{
                    var url = "{{ url('admginas-master/sublayanan-simpan') }}";
                    var pesan = "saved";
                }
                CKEDITOR.instances['deskripsi_singkat'].updateElement()
                CKEDITOR.instances['deskripsi'].updateElement()
                var formData = new FormData(form);
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
                            Swal.fire(
                                'Data berhasil tersimpan!',
                                'Your data has been '+pesan,
                                'success'
                                ) 
                            $('#upload-banner').val(null);
                            $('#banner-preview').attr('src', '');
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                            window.location.href = "{{ url('/admginas-auth/sesi-habis') }}";
                            
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
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

        $('#table-data tbody').on('click','td',function(e){
            if($(this).index() != 3){
                var id = $(this).closest('tr').find('td').eq(0).html();
                var nama = $(this).closest('tr').find('td').eq(1).html();
                var data = dataTable.row(this).data();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admginas-master/sublayanan') }}/" + id,
                    dataType:"JSON",
                    success: function(result) {
                        var url = "{{ config('api.url') }}";
                        var html = `<tr>
                            <td style='border:none'>ID Sublayanan</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Nama Sublayanan</td>
                            <td style='border:none'>`+nama+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>ID Layanan</td>
                            <td style='border:none'>`+result.data[0].id_layanan+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Nama Layanan</td>
                            <td style='border:none'>`+result.data[0].nama_layanan+`</td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td>
                                <img height='90' width='200' src=${url+'admginas-auth/storage/'+result.data[0].file_gambar} />
                            </td>
                        </tr>   
                    `;
                        $('#table-preview tbody').html(html);
                    
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                })
            }
        });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Layanan');
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/sublayanan') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                                console.log(result);
                console.log(res);
                if(res.status){
                    var url = "{{ config('api.url') }}";
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id_sublayanan').val(id);
                    $('#id_sub').val(id);
                    $('#id_sub').attr('readonly',true);
                    $('#id').val(id);
                    $('#nama_sublayanan').val(result[0].nama_sublayanan);
                    editor1.setData(result[0].deskripsi_singkat);
                    editor2.setData(result[0].deskripsi); 
                    $('#banner-preview').show();
                    $('#span-banner').hide();     
                    $("#banner-preview").attr('src', url+'admginas-auth/storage/'+result[0].file_gambar)                              
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('id_layanan', result[0].id_layanan, result[0].nama_layanan);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Layanan');
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/sublayanan') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                console.log(result);
                console.log(res);
                if(res.status){
                    var url = "{{ config('api.url') }}";
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id_sublayanan').val(id);
                    $('#id_sub').val(id);
                    $('#id_sub').attr('readonly',true);
                    $('#id').val(id);
                    $('#nama_klien').val(result[0].nama_klien); 
                    $('#banner-preview').show();
                    $('#span-banner').hide();     
                    $("#banner-preview").attr('src', url+'admginas-auth/storage/'+result[0].file_gambar)                              
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    </script>