
<link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
<style>
 .ui-selected{
    background: #e8e8e8 !important;
    color: unset !important;
}
td,th{
    padding:8px !important;
}
.form-group{
    margin-bottom: 5px !important;
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
                        <h5 style="">Setting Menu Web</h5>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-data">
            <div class="col-md-12">
                <div class="card">
                    <div class='card-body py-2 px-4'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href='#' class='sai-treegrid-btn-root btn btn-sm ' ><i class='simple-icon-anchor'></i> Root</a>
                                <a href='#' class='sai-treegrid-btn-tb btn btn-sm ' ><i class='simple-icon-plus'></i> Tambah</a>
                                <a href='#' class='sai-treegrid-btn-ub btn btn-sm ' ><i class='simple-icon-pencil'></i> Edit</a>
                                <a href='#' class='sai-treegrid-btn-del btn btn-sm '><i class='simple-icon-trash'></i> Hapus</a>
                                <!-- <a href='#' class='sai-treegrid-btn-link btn btn-sm '><i class='simple-icon-link'></i> Link</a> -->
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
                        <h6 class='modal-title py-2'>Input Menu</h6>
                        <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5">
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
                            <label for="jenis-set" class="col-3 col-form-label">Jenis</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='jenis' id='jenis-set'>
                                    <option value='' disabled>Pilih Jenis</option>
                                    <option value='Fix' >Fix</option>
                                    <option value='Induk' >Induk</option>
                                    <option value='Dinamis' >Dinamis</option>
                                </select>    
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
                        <div class="form-group row mb-3" style='display:none'>
                            <label for="lv-set" class="col-3 col-form-label">Level</label>
                            <div class="col-9">
                                <input type='number' name='level_menu' maxlength='5' class='form-control' readonly required id='lv-set'> 
                            </div>
                        </div>
                        <div class="form-group row mb-3" style='display:none'>
                            <label for="link-set" class="col-3 col-form-label">Urutan</label>
                            <div class="col-9">
                                <input type='text' name='nu' class='form-control' readonly required id='nu-set'>
                            </div>
                        </div>
                        <div class='form-group row mb-3' style='display:none'>
                            <label for="link-set" class="col-3 col-form-label">Row index</label>
                            <div class='col-9' style='margin-bottom:5px;'>
                            <input type='text' name='rowindex' class='form-control' readonly id='rowindex-set'>
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
    <script src="{{ asset('asset_elite/jquery.treegrid.js') }}"></script>

    <script type="text/javascript">
    var $kode_klp = "{{ Session::get('kodeMenu') }}";
    
    $.fn.DataTable.ext.pager.numbers_length = 5;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function getLink(){
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/menu-web-form') }}",
            dataType: 'json',
            data: {'kode_menu':$kode_klp},
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        var select = $('#link-set').selectize();
                        select = select[0];
                        var control = select.selectize;
                        control.clearOptions();
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].id+' - '+result.data.data[i].nama, value:result.data.data[i].id}]);  
                        }
                    }
                } else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
            }
        });
    }

    function init(){
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/menu-web') }}",
            dataType: 'json',
            async:false,
            success:function(result){ 
                if(result.data.status){
                    $('#detMenu').html('');
                    if(typeof result.data.data !== 'undefined'){
                        var $parent_array = [];
                        var html = `<table class='treegrid table' id='sai-treegrid'>
                            <thead><th>Kode Menu</th><th>Nama Menu</th><th>Kode Form</th></thead>
                            <tbody>`
                            for(var i=0;i<result.data.data.length;i++){
                                var line = result.data.data;
                                if(line[i-1] === undefined){
                                $prev_lv = 0;
                                }else{
                                    $prev_lv = line[i-1].level_menu;
                                }
                                console.log($prev_lv)
                                
                                if(line[i].level_menu == 0){
                                    $parent_to_prt = "";
                                    $prev_prt = i;
                                    $parent_array[line[i].level_menu] = i;
                                }else if(line[i].level_menu > $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+(i-1);
                                    $prev_prt = i-1;
                                    $parent_array[line[i].level_menu] = i - 1;
                                }else if(line[i].level_menu == $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+($prev_prt);
                                }else if(line[i].level_menu < $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+$parent_array[line[i].level_menu];
                                }

                                
                                html+=`<tr class='treegrid-${i} ${$parent_to_prt}'>
                                <td class='set_kd_mn'>${line[i].kode_menu}<input type='hidden' name='kode_menu[]' value='${line[i].kode_menu}'><input type='hidden' class='set_lvl' name='level_menu[]' value='${line[i].level_menu}'></td>
                                <td class='set_nama'>${line[i].nama}<input type='hidden' name='nama[]' value='${line[i].nama}'><input type='hidden' name='jenis[]' value='${line[i].jenis}'></td>
                                <td class='set_link'>${line[i].link}<input type='hidden' name='link[]' value='${line[i].link}'></td>
                                <td class='set_nu' style='display:none'>${line[i].nu2}</td>
                                <td class='set_index' style='display:none'>${line[i].nu}<input type='hidden' name='nu[]' value='${line[i].nu}'></td>
                                </tr>`;
                                
                            }
                            `</tbody>
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
                }
            }
        });
    }

    $(document).ready(function(){
    
        init();
        getLink();
        $('#jenis-set').selectize();

        $('#detMenu').on('click', 'tr', function(){
            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            $(this).addClass('ui-selected');

            var this_index = $(this).index();
            var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
            var node_class = this_class.match(/^treegrid-[0-9]+/gm);

            var this_node = $("."+node_class).treegrid('getId');
            var this_parent = $("."+node_class).treegrid('getParent');
            var this_kode = $("."+node_class).find('.set_kd_mn').text();
            var this_nu = $("."+node_class).treegrid('getChildNodes').last().find('.set_nu').text();
            var this_rowindex = $("."+node_class).treegrid('getChildNodes').last().find('.set_index').text();


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
            $('#rowindex-set').val(rowindex);

        });

        $('.sai-treegrid-btn-root').click(function(){
            // clear
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#link-set')[0].selectize.setValue('');

            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            var root = $('#sai-treegrid').treegrid('getRoots').length;
            var kode=root+1;
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
            
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#link-set')[0].selectize.setValue('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-up').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                return false;
            }else{
                var prev_index = $(".ui-selected").closest('tr').index()-1;
                var prev_id = $(".treegrid-"+prev_index).treegrid('getId');
                var prev_class = $("#sai-treegrid tbody tr:eq("+prev_index+")").attr('class');
                var prev_node_class = prev_class.match(/^treegrid-[0-9]+/gm);
                var prev_node = $("."+prev_node_class).treegrid('getId');
                var prev_parent = $("."+prev_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+prev_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
                var prev_lvl = $("."+prev_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();
                
                var this_index = $(".ui-selected").closest('tr').index();
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[0-9]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                
                if(this_lvl == 0){
                    var tmp = prev_class.split(' ');
                    if(tmp[1] == undefined){
                        prev_parent = -1;
                    }else{
                        var target = tmp[1].split('-');
                        prev_parent = target[2];
                    }
                    
                    if(prev_parent < 0){
                        var seb_node = 'treegrid-'+prev_node;
                        // var seb_node = prev_index;
                        prt_lvl = prev_lvl;
                    }else{
                        var seb_node = 'treegrid-'+prev_parent;
                        // var seb_node = prev_index;
                    }
                }else{
                    prt_lvl = prev_lvl;
                    var seb_node = 'treegrid-'+prev_node;
                }

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
                alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                return false;
            }else{
                
                var this_index = $(".ui-selected").closest('tr').index();
                console.log('this_index:'+this_index);
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[0-9]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var this_child_amount = $("."+this_node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+this_node_class).treegrid('getBranch').length;

                var tambah = 0;
                if(this_child_amount > 0){
                    tambah = parseInt(this_child_amount)+1;
                }else{
                    tambah = 1;
                }
                var next_index = $(".ui-selected").closest('tr').index()+tambah;
                var next_id = $(".treegrid-"+next_index).treegrid('getId');
                var next_class = $("#sai-treegrid tbody tr:eq("+next_index+")").attr('class');
                var next_node_class = next_class.match(/^treegrid-[0-9]+/gm);
                var next_node = $("."+next_node_class).treegrid('getId');
                var next_parent = $("."+next_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+next_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
                var next_lvl = $("."+next_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();

                console.log('next_index:'+next_index);
                console.log('next_id:'+next_id);
                console.log('next_class:'+next_class);
                console.log('next_node_class:'+next_node_class);
                console.log('next_parent:'+next_parent);
                console.log('prt_class:'+prt_class);
                console.log('prt_node_class:'+prt_node_class);
                console.log('next_lvl:'+next_lvl);
                console.log('prt_lvl:'+prt_lvl);
                
                
                if(this_lvl == 0){
                    var tmp = next_class.split(' ');
                    if(tmp[1] == undefined){
                        next_parent = -1;
                    }else{
                        var target = tmp[1].split('-');
                        next_parent = target[2];
                    }
                    
                    if(next_parent < 0){
                        var stlh_node = 'treegrid-'+next_node;
                        // var stlh_node = next_index;
                        prt_lvl = next_lvl;
                    }else{
                        var stlh_node = 'treegrid-'+next_parent;
                        // var stlh_node = next_index;
                    }
                }else{
                    prt_lvl = next_lvl;
                    var stlh_node = 'treegrid-'+next_node;
                }
                console.log('this_lvl:'+this_lvl);
                console.log('prt_lvl:'+prt_lvl);
                console.log('this_node:'+this_node);
                console.log('stlh_node:'+stlh_node);
                console.log('this_depth:'+this_depth);
                console.log('this_child_amount:'+this_child_amount);
                console.log('this_child_branch:'+this_child_branch);

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
                $('#link-set')[0].selectize.setValue('');
                $('#sai-treegrid tbody tr').removeClass('ui-selected');

                // get prev code

                var root = $('#sai-treegrid tbody').treegrid('getRoots').length;
                if (root == 1){
                    var kode=root;
                }else{
                    var kode=root+1;
                }

                $('#lv-set').val(0);
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
            }

            $('#id_edit').val('');
            $('#method').val('post');
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#link-set')[0].selectize.setValue('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-del').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan dihapus terlebih dahulu');
                return false;
            }else{
                var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
                if(sts){
                    var selected_id = $(".ui-selected").closest('tr').find('.set_kd_mn').text();
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('admginas-master/menu-web') }}",
                        data:{kode_menu: selected_id},
                        dataType: 'json',
                        success:function(res){

                            alert(res.data.message);
                            if(res.data.status){
                                init();
                                
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
                
                var sel_class = $("#sai-treegrid tbody tr:eq("+sel_index+")").attr('class');
                var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

                var this_node = $("."+node_class).treegrid('getId');
                var this_parent = $("."+node_class).treegrid('getParent');
                var this_kode = $("."+node_class).find('.set_kd_mn').text();
                var this_nama = $("."+node_class).find('.set_nama').text();
                var this_link = $("."+node_class).find('.set_link').text();
                var this_nu = parseInt($("."+node_class).find('.set_nu').text());
                var this_rowindex = parseInt($("."+node_class).find('.set_index').text());
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;
                var this_induk = $("."+node_class).treegrid('getParent').find('.set_kd_mn').text();
        
                $('#id_edit').val('edit');
                $('#method').val('put');
                $('#kode-set').val(this_kode);
                $('#nama-set').val(this_nama);
                $('#link-set')[0].selectize.setValue(this_link);
                $('#lv-set').val(this_lv-1);
                
                $('#nu-set').val(this_nu);
                $('#rowindex-set').val(this_rowindex);
                $('#sai-treegrid-modal').modal('show');


            }else{
                alert('Harap pilih struktur yang akan diubah terlebih dahulu');
                return false;
            }
        });
        
        $("#sai-treegrid-modal-form").on("submit", function(event){
            event.preventDefault();
            var sel_index = $(".ui-selected").closest('tr').index();
            console.log(sel_index)
            var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
            console.log(sel_node)
            var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
            console.log(sel_depth)
            
            var sel_class = $("#sai-treegrid tbody tr:eq("+sel_index+")").attr('class');
            console.log(sel_class)
            // var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

            var new_node = $("#sai-treegrid tbody tr:last").index() + 1;
            var kode_str = $('#kode-set').val();
            var nama_str = $('#nama-set').val();
            var nu_str = $('#nu-set').val();
            var rowindex_str = $('#rowindex-set').val();
            var link_str = $('#link-set')[0].selectize.getValue();

            
            var parameter = $('#id_edit').val();
            if(parameter == "edit"){
                var url = "{{ url('admginas-master/menu-web') }}";
            }else{
                var url = "{{url('admginas-master/menu-web')}}";
            }

            var formData = new FormData(this);

            for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
            }

            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(res){
                    alert(res.data.message);
                    if(res.data.status){
                        init();
                        $('#sai-treegrid-modal').modal('hide');
                        $('#validation-box').text('');
                    }
                }
            });

        });
    
    });

    $('#menu-form').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('admginas-master/menu-web-move') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert('Perubahan '+result.data.message);
                if(result.data.status){
                    init();
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });

    });
    </script>