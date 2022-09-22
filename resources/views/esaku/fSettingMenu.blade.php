<link href="{{ asset('asset_dore/css/jquery.treegrid.css') }}" rel="stylesheet">
    <style>
        .ui-selected{
            background: #e8e8e8 !important;
            color: unset !important;
        }
        .selected{
            background: #e8e8e8 !important;
            color: unset !important;
        }
        .selected2{
            background: #e8e8e8 !important;
            color: unset !important;
        }
        td,th{
            padding:8px !important;
        }
        .form-group{
            margin-bottom: 5px !important;
        }
        .px-0{
            padding-left: 2px !important;
            padding-right: 2px !important;
        }

        .hidden{
            display:none;
        }
    </style>
    <form id="menu-form">
        <div class="row" id="saku-filter">
            <div class="col-12 mb-2">
                <div class="card" >
                    <div class="card-body py-4 px-4" style="min-height:69.2px">
                        <h6 style="">Struktur Menu</h6>
                            <div class="form-group row mb-0">
                                <div class="col-md-3 col-sm-12">
                                    <select name='kode_klp' id='kode_klp' class='form-control selectize'>
                                    <option value=''>Pilih Kelompok Menu</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    &nbsp;
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <button type='button' class='sai-treegrid-btn-load btn btn-sm btn-outline-primary ' >Tampilkan</button>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-data" style="display:none">
            <div class="col-md-12">
                <div class="card">
                    <div class='card-body py-2 px-4'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href='#' class='sai-treegrid-btn-root btn btn-sm ' ><i class='simple-icon-anchor'></i> Root</a>
                                <a href='#' class='sai-treegrid-btn-tb btn btn-sm ' ><i class='simple-icon-plus'></i> Tambah</a>
                                <a href='#' class='sai-treegrid-btn-ub btn btn-sm ' ><i class='simple-icon-pencil'></i> Edit</a>
                                <a href='#' class='sai-treegrid-btn-del btn btn-sm '><i class='simple-icon-trash'></i> Hapus</a>
                                <a href='#' class='sai-treegrid-btn-link btn btn-sm '><i class='simple-icon-link'></i> Link</a>
                                <a href='#' class='sai-treegrid-btn-down btn btn-sm ' ><i class='simple-icon-arrow-down'></i> Turun</a>
                                <a href='#' class='sai-treegrid-btn-up btn btn-sm ' ><i class='simple-icon-arrow-up'></i> Naik</a>
                                <button type='submit' class='sai-treegrid-btn-save btn btn-sm btn-primary float-right' ><i class='fas fa-save'></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div id="detMenu" class="card-body pt-0">
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <div class="modal fade" id="sai-treegrid-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0.75em">
                <form id="sai-treegrid-modal-form">
                    <div class='modal-header py-0'>
                        <h6 class='modal-title py-2 my-0'>Input Setting Menu</h6>
                        <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="right:-25px">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body mb-0 pb-0" style="border:0">
                        <div class="form-group row mt-40 mb-3" hidden>
                            <label for="id-edit-set" class="col-3 col-form-label">Id</label>
                            <div class="col-9">
                                <input type='text' name='id_edit' maxlength='5' class='form-control' required id='id-edit-set' style='text-align:left' value="0">
                                <input type='text' name='_method' class='form-control' required id='method' style='text-align:left' value="post">
                            </div>
                        </div>
                        <div class="form-group row mt-40 mb-3">
                            <label for="kode-set" class="col-3 col-form-label">Kode</label>
                            <div class="col-9">
                                <input type='text' name='kode_menu' maxlength='5' class='form-control' required id='kode-set' style='text-align:left'>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama-set" class="col-3 col-form-label">Nama</label>
                            <div class="col-9">
                                <input type='text' name='nama' maxlength='100' class='form-control' required id='nama-set'>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="link-set" class="col-3 col-form-label">Link</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='link' id='link-set'>
                                    <option value='' disabled>Pilih Link</option>
                                    <option value='-'>-</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="icon-set" class="col-3 col-form-label">Icon</label>
                            <div class="col-9">
                                <input type='text' name='icon' maxlength='100' class='form-control' required id='icon-set'> 
                            </div>
                        </div>
                        <div class="form-group row mb-3 hidden" >
                            <label for="lv-set" class="col-3 col-form-label">Level</label>
                            <div class="col-9">
                                <input type='number' name='level_menu' maxlength='5' class='form-control' readonly required id='lv-set'> 
                            </div>
                        </div>
                        <div class="form-group row mb-3 hidden" >
                            <label for="link-set" class="col-3 col-form-label">Urutan</label>
                            <div class="col-9">
                                <input type='text' name='nu' class='form-control' readonly required id='nu-set'>
                            </div>
                        </div>
                        <div class='form-group row mb-3 hidden' >
                            <label for="link-set" class="col-3 col-form-label">Row index</label>
                            <div class='col-9' style='margin-bottom:5px;'>
                            <input type='text' name='rowindex' class='form-control' readonly id='rowindex-set'>
                            </div>
                        </div>
                        <div class='form-group row mb-3 hidden' >                        
                            <label class='control-label col-3'>Kode Klp Menu</label>
                            <div class='col-9' style='margin-bottom:5px;'>
                            <input type='text' name='kode_klp' class='form-control' readonly id='klp-set'>
                            </div>
                        </div>
                        <div id='validation-box'></div>
                    </div>
                    <div class="modal-footer" style="border:0">
                        <button type="submit" class="btn btn-primary" id="tb-set-index">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- JS Tree -->
<script src="{{ asset('asset_dore/js/jquery.treegrid.js') }}"></script>
<script type="text/javascript">
    var $kode_klp = "{{ Session::get('kodeMenu') }}";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function init(kode_klp){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/setting-menu') }}",
            dataType: 'json',
            data: {'kode_klp':kode_klp},
            success:function(result){    
                $('#detMenu').html('');
                if(result.data.status){
                    if(typeof result.html !== 'undefined'){
                        var html = `<table class='treegrid table' id='sai-treegrid'>
                            <thead><th>Kode Menu</th><th>Nama Menu</th><th>Kode Form</th></thead>
                            <tbody>
                            `+result.html+`
                            </tbody>
                        </table>`;
                        $('#detMenu').html(html);
                        $('.treegrid').treegrid({
                            enableMove: true, 
                            onMoveOver: function(item, helper, target, position) {
                                console.log(target);
                                console.log(position); 
                            }
                        });
                    }
                } else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getKlpMenu(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/menu-klp') }}",
            dataType: 'json',
            success:function(result){    
                var select = $('#kode_klp').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_klp, value:result.daftar[i].kode_klp}]);  
                        }
                    }
                } else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getForm(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/form') }}",
            dataType: 'json',
            success:function(result){    
                var select = $('#link-set').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_form, value:result.daftar[i].kode_form}]);  
                        }
                    }
                } else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    var $error_msg = "";
    function reportError(){

        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-auth/report-error') }}",
            dataType: 'json',
            data: { error: $error_msg, kode_form: $form_aktif },
            success:function(result){
                if(result.data.status){
                    msgDialog({
                        id: '',
                        type: 'sukses',
                        text: result.data.message
                    });
                }else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    $error_msg = result.data.message;
                    msgDialog({
                        id: '',
                        type: 'warning',
                        title: 'Error',
                        text: '<p>Internal Server Error</p>'
                    });
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }


    $(document).ready(function(){
    
        getKlpMenu();
        getForm();
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
        $('.selectize').selectize();
        $('.sai-treegrid-btn-load').click(function(){
            var kode_klp = $('#kode_klp')[0].selectize.getValue();
            $('#saku-data').show();
            init(kode_klp);

        });

        $('#detMenu').on('click', 'tr', function(){
            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            $(this).addClass('ui-selected');

            var this_index = $(this).index();
            var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
            var node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

            var this_node = $("."+node_class).treegrid('getId');
            var this_parent = $("."+node_class).treegrid('getParent');
            var this_kode = $("."+node_class).find('.set_kode').text();
            var this_icon = $("."+node_class).find('.set_icon').val();
            var this_nu = $("."+node_class).treegrid('getBranch').last().find('.set_nu').text();
            var this_rowindex = $("."+node_class).treegrid('getBranch').last().find('.set_index').text();

            if(this_nu == ""){
                var this_nu = $("."+node_class).find('.set_nu').text();
                var this_rowindex = $("."+node_class).find('.set_index').text();
            }

            
            var this_lv = $("."+node_class).treegrid('getDepth');
            var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
            var this_child_branch = $("."+node_class).treegrid('getBranch').length;

            var nu = parseInt(this_nu) + 1;
            var rowindex = parseInt(this_rowindex) + 1;

            if(nu == null || nu == '' || isNaN(nu)){
                nu = 101;
            }else{
                nu = nu;
            }

            if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                rowindex = 1;
            }else{
                rowindex = rowindex;
            }
            
            // $('#kode-set').val(this_kode.concat(+this_child_amount + 1));
            $('#lv-set').val(this_lv);
            $('#nu-set').val(nu);
            $('#icon-set').val(this_icon);
            $('#rowindex-set').val(rowindex);
            var klp_menu = $('#kode_klp')[0].selectize.getValue();
            $('#klp-set').val(klp_menu);
        });

        $('.sai-treegrid-btn-root').click(function(){
            // clear
            $('#kode-set').val('');
            $('#nama-set').val(''); 
            $('#icon-set').val('');
            $('#link-set')[0].selectize.setValue('');

            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            var root = $('#sai-treegrid').treegrid('getRoots').length;
            var kode=root+1;
            var klp_menu = $('#kode_klp')[0].selectize.getValue();
            $('#klp-set').val(klp_menu);
            $('#lv-set').val(0);
            var nu = parseInt($("#sai-treegrid tbody tr:last").find('.set_nu').text());
            if(nu == null || nu == '' || isNaN(nu)){
                nu = 100;
            }else{
                nu = nu;
            }
            $('#nu-set').val(nu + 1);
            var this_rowindex = parseInt($("#sai-treegrid tbody tr:last").find('.set_index').text());
            if(this_rowindex == null || this_rowindex == '' || isNaN(this_rowindex)){
                this_rowindex = 0;
            }else{
                this_rowindex = this_rowindex;
            }
            $('#rowindex-set').val(this_rowindex+1);
            $('.del-gl-index').attr('href', '#');
            
            $('#id-edit-set').val('0');
            $('#method').val('post');
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#icon-set').val('');
            $('#link-set')[0].selectize.setValue('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-up').click(function(){
            if($(".ui-selected").length != 1){
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dipindah terlebih dahulu'
                });
                return false;
            }else{
                var this_index = $(".ui-selected").closest('tr').index();
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var i = this_index;
                var index_prev = this_index;
                while (i > 0){
                    var index_prev = index_prev - 1;
                    var class_prev = $("#sai-treegrid tbody tr:eq("+index_prev+")").attr('class');
                    var node_class_prev = class_prev.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                    var lvl_prev = $("."+node_class_prev).find('.set_lvl').val();
                    if(lvl_prev == this_lvl){
                        break;
                    }
                    i--;
                }
                var prev_index = index_prev;
                var prev_id = $(".treegrid-"+prev_index).treegrid('getId');
                var prev_class = $("#sai-treegrid tbody tr:eq("+prev_index+")").attr('class');
                var prev_node_class = prev_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var prev_node = $("."+prev_node_class).treegrid('getId');
                var prev_parent = $("."+prev_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+prev_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var prev_lvl = $("."+prev_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();
                
                var tmp = prev_class.split(' ');
                var seb_node = tmp[0];
                prt_lvl = prev_lvl;

                if(prev_index >= 0){
                    if(this_lvl == prt_lvl){
                        $('.treegrid-'+this_node).treegrid('move', $('.'+seb_node), 0);
                    }else{
                        return false;
                    }

                }

            }
        });

        $('.sai-treegrid-btn-down').click(function(){
            if($(".ui-selected").length != 1){
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dipindah terlebih dahulu!'
                });
                return false;
            }else{
                
                var this_index = $(".ui-selected").closest('tr').index();
                console.log('this_index:'+this_index);
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var this_child_amount = $("."+this_node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+this_node_class).treegrid('getBranch').length;

                var i = this_index;
                var index_next = this_index;
                while (i < 8){
                    var index_next = index_next + 1;
                    var class_next = $("#sai-treegrid tbody tr:eq("+index_next+")").attr('class');
                    var node_class_next = class_next.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                    var lvl_next = $("."+node_class_next).find('.set_lvl').val();
                    if(lvl_next == this_lvl){
                        break;
                    }
                    i++;
                }

                next_index = index_next;
                var next_id = $(".treegrid-"+next_index).treegrid('getId');
                var next_class = $("#sai-treegrid tbody tr:eq("+next_index+")").attr('class');
                var next_node_class = next_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var next_node = $("."+next_node_class).treegrid('getId');
                var next_parent = $("."+next_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+next_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var next_lvl = $("."+next_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();

                var tmp = next_class.split(' ');
                var stlh_node = tmp[0];
                prt_lvl = next_lvl;

                if(next_index >= 0){
                    if(this_lvl == prt_lvl){
                        $('.'+stlh_node).treegrid('move', $('.treegrid-'+this_node), 0);
                    }else{
                        return false;
                    }

                }

            }
        });

        $('.sai-treegrid-btn-tb').click(function(){
            if($(".ui-selected").length != 1){
                // clear
                $('#kode-set').val('');
                $('#nama-set').val('');
                $('#icon-set').val('');
                $('#link-set')[0].selectize.setValue('');
                $('#sai-treegrid tbody tr').removeClass('ui-selected');

                // get prev code

                var root = $('#sai-treegrid tbody').treegrid('getRoots').length;
                if (root == 1){
                    var kode=root;
                }else{
                    var kode=root+1;
                }
                var klp_menu = $('#kode_klp')[0].selectize.getValue();

                $('#lv-set').val(0);
                $('#klp-set').val(klp_menu);
                var nu = parseInt($("#sai-treegrid tbody tr:last").find('.set_nu').text());
                if(nu == null || nu == '' || isNaN(nu)){
                    nu = 100;
                }else{
                    nu = nu;
                }
                $('#nu-set').val(nu+1);
                var rowindex = parseInt($("#sai-treegrid tbody tr:last").find('.set_index').text());

                if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                    rowindex = 0;
                }else{
                    rowindex = rowindex;
                }

                $('#rowindex-set').val(rowindex+1);
                $('.del-gl-index').attr('href', '#');

                getForm();
                
                $('#id-edit-set').val('0');
                $('#method').val('post');
                $('#kode-set').val('');
                $('#nama-set').val('');
                $('#icon-set').val('');
                $('#link-set')[0].selectize.setValue('');
                $('#sai-treegrid-modal').modal('show');
            }else{

                var this_index = $('.ui-selected').index();
                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

                var this_node = $("."+node_class).treegrid('getId');
                var this_parent = $("."+node_class).treegrid('getParent');
                var this_kode = $("."+node_class).find('.set_kode').text();
                var this_nu = $("."+node_class).treegrid('getBranch').last().find('.set_nu').text();
                var this_rowindex = $("."+node_class).treegrid('getBranch').last().find('.set_index').text();

                if(this_nu == ""){
                    var this_nu = $("."+node_class).find('.set_nu').text();
                    var this_rowindex = $("."+node_class).find('.set_index').text();
                }

                
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;

                var nu = parseInt(this_nu) + 1;
                var rowindex = parseInt(this_rowindex) + 1;

                if(nu == null || nu == '' || isNaN(nu)){
                    nu = 101;
                }else{
                    nu = nu;
                }

                if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                    rowindex = 1;
                }else{
                    rowindex = rowindex;
                }
                
                $('#lv-set').val(this_lv);
                $('#nu-set').val(nu);
                $('#rowindex-set').val(rowindex);

                var tipe = $(".ui-selected").closest('tr').find('.set_tipe').val();
                var kode = $(".ui-selected").closest('tr').find('.set_kode').text();
                if(tipe == "Posting"){
                    msgDialog({
                        id: '',
                        type: 'warning',
                        text: "Kode "+kode+" tidak boleh bertipe posting. Ubah tipenya dulu ke Header atau Sum Posted, jika akan ditambahkan sub item"
                    });
                }else{
                    getForm();
                    
                    $('#id-edit-set').val('1');
                    $('#method').val('post');
                    $('#kode-set').val('');
                    $('#nama-set').val('');
                    $('#icon-set').val('');
                    $('#link-set')[0].selectize.setValue('');
                    $('#sai-treegrid-modal').modal('show');
                }
            }
        });

        $('.sai-treegrid-btn-del').click(function(){
            if($(".ui-selected").length != 1){
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dihapus terlebih dahulu'
                });
                return false;
            }else{
                var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
                if(sts){
                    var selected_id = $(".ui-selected").closest('tr').find('.set_kd_menu').text();
                    var kode_klp=$('#kode_klp')[0].selectize.getValue();
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('esaku-master/setting-menu') }}",
                        dataType: 'json',
                        data: {'kode_klp':kode_klp,'kode_menu':selected_id},
                        success:function(result){
                            // alert(result.data.message);
                            
                            if(result.data.status){
                                msgDialog({
                                    id: '',
                                    type: 'sukses',
                                    text: result.data.message
                                });
                                init(kode_klp);
                                
                            } else if(!result.data.status && result.data.message == 'Unauthorized'){
                                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                            }else{
                                msgDialog({
                                    id: '',
                                    type: 'sukses',
                                    title: 'Error',
                                    text: result.data.message
                                });
                            }
                        }
                    });

                }else{
                    return false;
                }
            }
        });

        $('.sai-treegrid-btn-ub').click(function(){
            if($(".ui-selected").length == 1){
                var sel_index = $(".ui-selected").closest('tr').index();
                var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
                var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
                // alert(sel_index);
                
                var sel_class = $("#sai-treegrid tbody tr:eq("+sel_index+")").attr('class');
                var node_class = sel_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

                var this_node = $("."+node_class).treegrid('getId');
                var this_parent = $("."+node_class).treegrid('getParent');
                var this_kode = $("."+node_class).find('.set_kd_menu').text();
                var this_nama = $("."+node_class).find('.set_nama').text();
                var this_link = $("."+node_class).find('.set_link').val(); 
                var this_icon = $("."+node_class).find('.set_icon').val();       

                var this_nu = parseInt($("."+node_class).find('.set_nu').text());
                var this_rowindex = parseInt($("."+node_class).find('.set_index').text());
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;
                var this_induk = $("."+node_class).treegrid('getParent').find('.set_kd_mn').text();
                var klp_menu = $('#kode_klp')[0].selectize.getValue();
                $('#id-edit-set').val('1');
                $('#method').val('put');
                $('#kode-set').val(this_kode);
                $('#nama-set').val(this_nama);
                $('#icon-set').val(this_icon);
                $('#lv-set').val(this_lv-1);
                
                $('#link-set')[0].selectize.setValue(this_link);
                $('#nu-set').val(this_nu);
                $('#rowindex-set').val(this_rowindex);
                $('#sai-treegrid-modal').modal('show');
            }else{
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan diubah terlebih dahulu'
                });
                return false;
            }
        });
        
        $("#sai-treegrid-modal-form").on("submit", function(event){
            event.preventDefault();
            var kode_klp = $('#kode_klp')[0].selectize.getValue();
            var formData = new FormData(this);
            formData.append('kode_klp', kode_klp);

            $.ajax({
                type: 'POST',
                url:"{{ url('esaku-master/setting-menu') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    // alert(result.data.message);
                    
                    if(result.data.status){
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            text: result.data.message
                        });
                        
                        init(kode_klp);
                        $('#sai-treegrid-modal').modal('hide');
                        $('#validation-box').text('');
                    }else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }else{
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                }
            });

        });

        
    
        $('#menu-form').submit(function(e){
        e.preventDefault();
            
            var formData = new FormData(this);
            var kode_klp = $('#kode_klp')[0].selectize.getValue();
            
            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-master/setting-menu-move') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            text: 'Perubahan '+result.data.message
                        });
                        init(kode_klp);
                    }else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }else{
                        $error_msg = result.data.message;
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            title: 'Error',
                            text: 'Internal Server Error <br> <a href="#" class="btn btn-primary btn-sm mx-auto my-2" onclick="reportError()"> Kirim Error</a>'
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        });

    });

</script>
