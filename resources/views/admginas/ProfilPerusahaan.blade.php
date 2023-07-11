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

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px">Profil Perusahaan</h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        {{-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> --}}
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body" id="form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id_perusahaan" name="id_perusahaan" value="TRG">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="nama_klien">Nama Perusahaan</label>
                                        <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan">
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
                                        <label for="nama_perusahaan">Koordinat</label>
                                        <input class="form-control" type="text" id="koordinat" name="koordinat">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="deskripsi">Deskripsi Tentang Perusahaan</label>
                                        <textarea class="form-control" name="deskripsi" id="editor" rows="10" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="alamat">Alamat</label>
                                        <input class="form-control" type="text" id="alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="no_telp">No Telepon</label>
                                        <input class="form-control" type="text" id="no_telp" name="no_telp">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="no_fax">No Fax</label>
                                        <input class="form-control" type="text" id="no_fax" name="no_fax">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="wa">Link WA</label>
                                        <input class="form-control" type="text" id="wa" name="wa">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="visi">Visi</label>
                                        <textarea class="form-control" id="visi" name="visi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#btambah" role="tab" aria-selected="true"><span class="hidden-xs-down">Misi Perusahaan</span></a> </li>                                
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" role="tabpane" id="btambah">
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;width:1200px !important;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <style>
                                        th{
                                            vertical-align:middle !important;
                                        }
                                        /* #input-grid td{
                                            padding:0 !important;
                                        } */
                                        #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label
                                        {
                                            border:1px solid black !important;
                                            border-radius:0 !important;
                                        }

                                        #input-grid .selectize-input
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
                                        #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover
                                        {
                                            /* background: var(--theme-color-6) !important;
                                            color:white; */
                                            background:#f8f8f8;
                                            color:black;
                                        }
                                        #input-grid input:hover,
                                        #input-grid .selectize-input:hover,
                                        {
                                            width:inherit;
                                        }
                                        #input-grid ul.typeahead.dropdown-menu
                                        {
                                            width:max-content !important;
                                        }
                                        #input-grid td
                                        {
                                            overflow:hidden !important;
                                            height:37.2px !important;
                                            padding:0px !important;
                                        }

                                        #input-grid span
                                        {
                                            padding:0px 10px !important;
                                        }

                                        #input-grid input,#input-grid .selectize-input
                                        {
                                            overflow:hidden !important;
                                            height:35px !important;
                                        }

                                        #input-grid td:nth-child(5)
                                        {
                                            overflow:unset !important;
                                        }
                                    </style>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap;">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">No</th>
                                                <th width="12%" class="text-center"></th>   
                                                <th class="text-center">Misi</th>                                                                                                                                   
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
        var editor = CKEDITOR.replace('editor', {
                        removeButtons: 'Save,Source,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,Image,Unlink,Link,Flash,Table,Anchor,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Language,JustifyBlock,JustifyRight,JustifyCenter,BidiRtl,BidiLtr,JustifyLeft,Blockquote,CreateDiv,Indent,Outdent,BulletedList,RemoveFormat,CopyFormatting,NumberedList,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About'
                    });
        setHeightForm();
        var $iconLoad = $('.preloader');
        $('#process-upload').addClass('disabled');
        $('#process-upload').prop('disabled', true);
        function getDataProfil() {
            $.ajax({
                type:'GET',
                url: "{{ url('admginas-master/profil') }}",
                dataType: 'JSON',
                success: function(result) {
                    if(result.status) {
                        $('#nama_perusahaan').val(result.daftar[0].nama_perusahaan);
                        $('#koordinat').val(result.daftar[0].koordinat);
                        $('#visi').val(result.daftar[0].visi);
                        $('#no_telp').val(result.daftar[0].no_telp);
                        $('#no_fax').val(result.daftar[0].no_fax);
                        $('#wa').val(result.daftar[0].link_wa);
                        $('#email').val(result.daftar[0].email);
                        $('#alamat').val(result.daftar[0].alamat);
                        
                        editor.setData(result.daftar[0].deskripsi);
                        var url = "{{ config('api.url') }}";
                        if(result.daftar[0].file_gambar != null || result.daftar[0].file_gambar != undefined || result.daftar[0].file_gambar != '') {
                            $('#span-banner').hide();
                            $('#banner-preview').show();
                            $("#banner-preview").attr('src', url+'admginas-auth/storage/'+result.daftar[0].file_gambar)
                        } else {
                            $('#banner-preview').hide();
                            $('#span-banner').show();
                        }

                        $('#input-grid tbody').empty();
                        if(result.detail.length > 0) {
                            var html = "";
                            var no = 1;
                            for(var i=0;i<result.detail.length;i++) {
                                html += "<tr class='row-grid'>";
                                html += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' value="+result.detail[i].no_urut+" name='no_urut[]'></td>";
                                html += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                                html += "<td><span class='td-misi tdmisike"+result.detail[i].no_urut+" tooltip-span'>"+result.detail[i].misi+"</span><textarea autocomplete='off' name='misi[]' class='form-control inp-misi misike"+result.detail[i].no_urut+" hidden'>"+result.detail[i].misi+"</textarea></td>";
                                html += "</tr>";
                                no++;
                            }
                            $('#input-grid tbody').append(html);
                            hitungTotalRow();
                        } else {
                            addRowGridDefault();
                        }
                    }
                }
            });
        }
        getDataProfil();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
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

        var psscrollform = new PerfectScrollbar('#form-body');

        $('#form-tambah').on('click', '.add-row', function(){
            addRowGrid();
        });

        function hitungTotalRow(){
            var total_row = $('#input-grid tbody tr').length;
            $('#total-row').html(total_row+' Baris');
        }

        function addRowGridDefault() {
            var no=$('#input-grid .row-grid:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-grid'>";
            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' value="+no+" name='no_urut[]'></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "<td><span class='td-misi tdmisike"+no+" tooltip-span'></span><textarea autocomplete='off' name='misi[]' class='form-control inp-misi misike"+no+" hidden'></textarea></td>";
            input += "</tr>";

            $('#input-grid tbody').append(input);
            $('.row-grid:last').addClass('selected-row');

            hitungTotalRow();
        }

        function addRowGrid() {
            var no=$('#input-grid .row-grid:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-grid'>";
            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' value="+no+" name='no_urut[]'></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "<td><span class='td-misi tdmisike"+no+" tooltip-span'></span><textarea autocomplete='off' name='misi[]' class='form-control inp-misi misike"+no+" hidden'></textarea></td>";
            input += "</tr>";

            $('#input-grid tbody').append(input);
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');

            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-misi").show();
            $('#input-grid tbody tr:last').find(".td-misi").hide();
            $('#input-grid tbody tr:last').find(".inp-misi").focus();

            hitungTotalRow();
            hideUnselectedRow();
        }

        function hideUnselectedRow() {
            $('#input-grid > tbody > tr').each(function(index, row) {
                if(!$(row).hasClass('selected-row')) {
                    var misi = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").val();

                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").val(misi);
                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-misi").text(misi);

                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-misi").hide();
                    $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-misi").show();
                }
            })
        }

        $('#input-grid tbody').on('click', 'tr', function(){
            $(this).addClass('selected-row');
            $('#input-grid tbody tr').not(this).removeClass('selected-row');
            hideUnselectedRow();
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
                    console.log(idx);
                    var misi = $(this).parents("tr").find(".inp-misi").val();
                    var no = $(this).parents("tr").find("span.no-grid").text();
                    $(this).parents("tr").find(".inp-misi").val(misi);
                    $(this).parents("tr").find(".td-misi").text(misi);
                    if(idx == 2){
                        $(this).parents("tr").find(".inp-misi").show();
                        $(this).parents("tr").find(".td-misi").hide();
                        $(this).parents("tr").find(".inp-misi").focus();
                    }else{
                        $(this).parents("tr").find(".inp-misi").hide();
                        $(this).parents("tr").find(".td-misi").show();
                    }
                }
            }
        });

        $('#input-grid').on('click', '.hapus-item', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid');
                nom.html(no);
                no++;
            });
            hitungTotalRow();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-grid').on('keydown','.inp-misi',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['.inp-misi'];
            var nxt2 = ['.td-misi'];
            if (code == 13 || code == 9) {
                e.preventDefault();
                var idx = $(this).closest('td').index()-2;
                var idx_next = idx+1;
                var kunci = $(this).closest('td').index()+1;
                var isi = $(this).val();
                switch (idx) {
                    case 0:
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        
                        var cek = $(this).parents('tr').next('tr').find('.td-misi');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
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
        
        $('#saku-form').on('click', '#btn-kembali', function(){
            var kode = null;
            msgDialog({
                id:kode,
                type:'keluar'
            });
        });
        
        $('#banner-preview').hide();
        $('#span-banner').show();

        $('#form-tambah').validate({
            ignore: [],
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var id = $('#id_perusahaan').val();
                if(parameter == "edit"){
                    var url = "{{ url('admginas-master/profil') }}/"+id;
                    var pesan = "updated";
                }else{
                    var url = "{{ url('admginas-master/profil') }}";
                    var pesan = "saved";
                }
                CKEDITOR.instances['editor'].updateElement()
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
                            Swal.fire(
                                'Data berhasil tersimpan!',
                                'Your data has been '+pesan,
                                'success'
                                ) 
                            $('#upload-banner').val(null);
                            $('#banner-preview').attr('src', '');
                            getDataProfil();
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
    </script>