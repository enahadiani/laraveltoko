    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Barang" tambah="true" :thead="array('Kode Barang','Nama Barang','Satuan','Keterangan','Harga','Tgl Input','Aksi')" :thwidth="array(15,30,5,25,15,0,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_barang">*Kode Barang</label>
                                <input class="form-control" type="text" id="kode_barang" name="kode_barang" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="barcode">*Barcode</label>
                                <input class="form-control" type="text" id="barcode" name="barcode" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">*Nama</label>
                                <input class="form-control" type="text" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="satuan">*Satuan Barang</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_satuan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-satuan" id="satuan" name="satuan" value="" title="">
                                    <span class="info-name_satuan hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_satuan"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_klp">*Kelompok Barang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_klp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_klp" id="kode_klp" name="kode_klp" value="" title="">
                                    <span class="info-name_kode_klp hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_klp"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- <div class="form-group col-md-6 col-sm-12">
                               <label for="keterangan">Keterangan</label>
                                <input class="form-control" type="text" id="keterangan" name="keterangan" required>
                            </div> -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_gudang">*Gudang/Toko</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_gudang" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_gudang" id="kode_gudang" name="kode_gudang" value="" title="">
                                    <span class="info-name_kode_gudang hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_gudang"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="hrg_satuan">*Harga Satuan</label>
                                <input class="form-control currency nominal"  value="0" type="text" id="hrg_satuan" name="hrg_satuan" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="ppn">*PPN (%)</label>
                                <input class="form-control nominal" type="text" id="ppn" name="ppn" value="0" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tarif-ppn">&nbsp;</label>
                                <input class="form-control currency" type="text" id="tarif-ppn" value="0" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="hna">*Harga Jual</label>
                                <input class="form-control currency"  value="0" type="text" id="hna" name="hna" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="flag_aktif">*Status Aktif</label>
                                <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                    <option value='' disabled selected>--- Pilih Status Aktif ---</option>
                                    <option value='1'>AKTIF</option>
                                    <option value='0'>NON-AKTIF</option>
                                </select>     
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="profit">Profit (%)</label>
                                <input class="form-control nominal" type="text" id="profit" name="profit" value="0" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tarif-profit">&nbsp;</label>
                                <input class="form-control currency" type="text" id="tarif-profit" value="0" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="sm">Slow Moving</label>
                                <input class="form-control currency" type="text" id="sm1" name="sm1" required value="0">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="sm2">&nbsp;</label>
                                <input class="form-control currency" type="text" id="sm2" name="sm2" required value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="mm1">Medium Moving</label>
                                <input class="form-control currency" type="text" id="mm1" name="mm1" required value="0">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="mm2">&nbsp;</label>
                                <input class="form-control currency" type="text" id="mm2" name="mm2" required value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="fm">Fast Moving</label>
                                <input class="form-control currency" type="text" id="fm1" name="fm1" required value="0">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="fm2">&nbsp;</label>
                                <input class="form-control currency" type="text" id="fm2" name="fm2" required value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="ss">Safety Stock</label>
                                <input class="form-control currency" type="text"  id="ss" name="ss" value="0">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar" accept="image/*" onchange="readURL(this)">
                                        <label class="custom-file-label" for="file_gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12" style="height: 150px;">
                                <label>Preview</label>
                                <div class="preview text-center" style="height:120px;width:120px;margin: 0 auto;">Preview</div>
                            </div>
                        </div>
                    </div>
                    {{-- Save Button --}}
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log('change');
                reader.onload = function (e) {
                    var html = `<img id="img-preview" width="120px" src="`+e.target.result+`" alt="Preview" style='margin:0 auto'>`;
                    $('.preview').html(html);
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }

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

        function hitungHargaJual() {
            var hrg_satuan = toNilai($('#hrg_satuan').val());
            var ppn = toNilai($('#ppn').val());
            var profit = toNilai($('#profit').val());

            var nilai_ppn = (hrg_satuan*ppn)/100;
            var hrg_ppn = hrg_satuan + nilai_ppn;
            var nilai_profit = (hrg_ppn*profit)/100;
            var hrg_jual = hrg_satuan + nilai_ppn + nilai_profit;
            console.log(`${hrg_satuan} + ${nilai_ppn} + ${nilai_profit}`);
            $('#tarif-ppn').val(nilai_ppn);
            $('#tarif-ppn').attr('value',nilai_ppn);
            $('#tarif-profit').val(nilai_profit.toFixed());
            $('#tarif-profit').attr('value',nilai_profit.toFixed());
            $('#hna').val(hrg_jual.toFixed());
            $('#hna').attr('value',hrg_jual.toFixed());
        }

        $('input.nominal').change(function(){
            hitungHargaJual();
        });
        
        $('.info-icon-hapus').click(function(){
            var par = $(this).closest('div').find('input').attr('name');
            $('#'+par).val('');
            $('#'+par).attr('readonly',false);
            $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
            $('.info-code_'+par).parent('div').addClass('hidden');
            $('.info-name_'+par).addClass('hidden');
            $(this).addClass('hidden');
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

        function getKelBar(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp') }}",
                dataType: 'json',
                data:{'kode_klp':id},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            showInfoField('kode_klp',result.daftar[0].kode_klp,result.daftar[0].nama);
                        }else{
                            $('#kode_klp').attr('readonly',false);
                            $('#kode_klp').css('border-left','1px solid #d7d7d7');
                            $('#kode_klp').val('');
                            $('#kode_klp').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getSatuan(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-satuan') }}",
                dataType: 'json',
                data:{'kode_satuan':id},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            showInfoField('satuan',result.daftar[0].kode_satuan,result.daftar[0].nama);
                        }else{
                            $('#satuan').attr('readonly',false);
                            $('#satuan').css('border-left','1px solid #d7d7d7');
                            $('#satuan').val('');
                            $('#satuan').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getGudang(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/gudang') }}",
                dataType: 'json',
                data:{'kode_gudang':id},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            showInfoField('kode_gudang',result.daftar[0].kode_gudang,result.daftar[0].nama);
                        }else{
                            $('#kode_gudang').attr('readonly',false);
                            $('#kode_gudang').css('border-left','1px solid #d7d7d7');
                            $('#kode_gudang').val('');
                            $('#kode_gudang').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
        }

        $('[data-toggle="tooltip"]').tooltip(); 
        $('.selectize').selectize();

        
        // PLUGIN SCROLL di bagian preview dan form input
        var scroll = document.querySelector('#content-preview');
        var psscroll = new PerfectScrollbar(scroll);

        var scrollform = document.querySelector('.form-body');
        var psscrollform = new PerfectScrollbar(scrollform);
        // END PLUGIN SCROLL di bagian preview dan form input

        //LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
        var act_hapus = "&nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        var dataTable = generateTable(
            "table-data",
            "{{ url('esaku-master/barang') }}", 
            [
                {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
                    'targets': 4, 
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
                },
                {
                    "targets": [5],
                    "visible": false,
                    "searchable": false
                }
            ],
            [
                { data: 'kode_barang' },
                { data: 'nama' },
                { data: 'satuan' },
                { data: 'kode_gudang' },
                { data: 'hna' },
                { data: 'tgl_input' },
            ],
            "{{ url('esaku-auth/sesi-habis') }}",
            [[5 ,"desc"]]
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
            $('#judul-form').html('Tambah Data Barang');
            $('#btn-update').attr('id','btn-save');
            $('#btn-save').attr('type','submit');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $('#method').val('post');
            $('#kode_barang').attr('readonly', false);
            $('#saku-datatable').hide();
            $('#saku-form').show();
            $('.input-group-prepend').addClass('hidden');
            $('span[class^=info-name]').addClass('hidden');
            $('.info-icon-hapus').addClass('hidden');
            $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
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
            var kode = $('#kode_barang').val();
            msgDialog({
                id:kode,
                type:'edit'
            });
        });
        
        // END BUTTON KEMBALI

         // HANDLER untuk enter dan tab
        $('#kode_barang,#barcode,#nama,#satuan,#kode_klp,#kode_gudang,#hrg_satuan,#ppn,#profit,#hna,#ss,#sm1,#sm2,#mm1,#mm2,#fm1,#fm2,#file_gambar').keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['kode_barang','barcode','nama','satuan','kode_klp','kode_gudang','hrg_satuan','ppn','profit','hna','ss','sm1','sm2','mm1','mm2','fm1','fm2','file_gambar'];
            if (code == 13 || code == 40) {
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx++;
                // if(idx == 15){
                //     var akun = $('#akun_hutang').val();
                //     getAkun(akun);
                // }else{
                    $('#'+nxt[idx]).focus();
                // }
            }else if(code == 38){
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx--;
                if(idx != -1){ 
                    $('#'+nxt[idx]).focus();
                }
            }
        });
        // END HANDLER


    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_klp':
                showInpFilter({
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang-klp') }}",
                    columns : [
                        { data: 'kode_klp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Kelompok Barang",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                });
            break;
            case 'satuan':
                showInpFilter({
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/barang-satuan') }}",
                    columns : [
                        { data: 'kode_satuan' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Satuan",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                });
            break;
            case 'kode_gudang':
                showInpFilter({
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/gudang') }}",
                    columns : [
                        { data: 'kode_gudang' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Gudang",
                    pilih : "gudang",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                });
            break;
        }
    });

    $('#form-tambah').on('change', '#kode_klp', function(){
        var par = $(this).val();
        getKelBar(par);
    });

    $('#form-tambah').on('change', '#satuan', function(){
        var par = $(this).val();
        getSatuan(par);
    });

    $('#form-tambah').on('change', '#kode_gudang', function(){
        var par = $(this).val();
        getGudang(par);
    });

    $('#btn-simpan').click(function(e){
        e.preventDefault();
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $('#form-tambah').submit();
    });

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_barang:{
                required: true 
            },
            nama:{
                required: true  
            },
            barcode:{
                required: true
            },
            satuan:{
                required: true
            },
            kode_klp:
            {
                required: true
            },
            hrg_satuan:
            {
                required: true
            },
            kode_gudang:
            {
                required: true
            },
            ppn:
            {
                required: true
            },
            // profit:
            // {
            //     required: true
            // },
            hna:
            {
                required: true
            }, 
            // ss:
            // {
            //     required: true
            // }, 
            flag_aktif:
            {
                required: true
            }, 
            // sm1:
            // {
            //     required: true
            // }, 
            // sm2:
            // {
            //     required: true
            // },
            // fm2:
            // {
            //     required: true
            // },
            // fm1:
            // {
            //     required: true
            // },
            // mm1:
            // {
            //     required: true
            // },
            // mm2:
            // {
            //     required: true
            // }
            // ,
            // flag_ppn:
            // {
            //     required: true
            // }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_barang').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/barang') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/barang') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

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
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Barang');
                        $('#method').val('post');
                        $('#kode_barang').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_barang",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode Barang sudah digunakan'
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
            url: "{{ url('esaku-master/barang') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Barang ('+id+') berhasil dihapus ');
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
            url: "{{ url('esaku-master/barang') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_barang').val(id);
                    $('#id').val(id);
                    $('#kode_barang').attr('readonly',true);
                    $('#nama').val(result.data[0].nama);;
                    $('#satuan').val(result.data[0].satuan);
                    $('#hna').val(parseFloat(result.data[0].hna));
                    $('#ppn').val(parseFloat(result.data[0].ppn));
                    $('#profit').val(parseFloat(result.data[0].profit));
                    $('#hrg_satuan').val(parseFloat(result.data[0].hrg_satuan)).trigger('change');
                    $('#ss').val(parseFloat(result.data[0].ss));
                    $('#sm1').val(parseFloat(result.data[0].sm1));
                    $('#sm2').val(parseFloat(result.data[0].sm2));
                    $('#mm1').val(parseFloat(result.data[0].mm1));
                    $('#mm2').val(parseFloat(result.data[0].mm2));
                    $('#fm1').val(parseFloat(result.data[0].fm1));
                    $('#fm2').val(parseFloat(result.data[0].fm2));
                    $('#kode_klp').val(result.data[0].kode_klp);
                    $('#kode_gudang').val(result.data[0].kode_gudang);
                    // $('#keterangan').val(result.data[0].keterangan);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    $('#barcode').val(result.data[0].barcode);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    var html = "<img style='width:120px' style='margin:0 auto' src='"+result.data[0].file_gambar+"'>";
                    $('.preview').html(html);
                    showInfoField('kode_klp',result.data[0].kode_klp,result.data[0].nama_klp);
                    showInfoField('satuan',result.data[0].satuan,result.data[0].nama_satuan);
                    showInfoField('kode_gudang',result.data[0].kode_gudang,result.data[0].nama_gudang);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Barang');
        editData(id);
    });
    // END BUTTON EDIT

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Barang</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Barcode</td>
                <td>`+data.barcode+`</td>
            </tr>
            <tr>
                <td>Gudang</td>
                <td>`+data.kode_gudang+`</td>
            </tr>
            <tr>
                <td>Satuan</td>
                <td>`+data.satuan+`</td>
            </tr>
            <tr>
                <td>Kelompok Barang</td>
                <td>`+data.kode_klp+`</td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td>`+sepNum(data.hrg_satuan)+`</td>
            </tr>
            <tr>
                <td>PPN</td>
                <td>`+sepNum(data.ppn)+`</td>
            </tr>
            <tr>
                <td>Profit</td>
                <td>`+sepNum(data.profit)+`</td>
            </tr>
            <tr>
                <td>Harga Jual</td>
                <td>`+sepNum(data.hna)+`</td>
            </tr>
            <tr>
                <td>Status Aktif</td>
                <td>`+data.flag_aktif+`</td>
            </tr>
            <tr>
                <td>Safety Stock</td>
                <td>`+sepNum(data.ss)+`</td>
            </tr>
            <tr>
                <td>Slow Moving 1</td>
                <td>`+sepNum(data.sm1)+`</td>
            </tr>
            <tr>
                <td>Slow Moving 2</td>
                <td>`+sepNum(data.sm2)+`</td>
            </tr>
            <tr>
                <td>Medium Moving 1</td>
                <td>`+sepNum(data.mm1)+`</td>
            </tr>
            <tr>
                <td>Medium Moving 2</td>
                <td>`+sepNum(data.mm2)+`</td>
            </tr>
            <tr>
                <td>Fast Moving 1</td>
                <td>`+sepNum(data.fm1)+`</td>
            </tr>
            <tr>
                <td>Fast Moving 2</td>
                <td>`+sepNum(data.fm2)+`</td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><img src='`+data.file_gambar+`'></td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Barang').removeClass('py-2');
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
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

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Barang');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
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