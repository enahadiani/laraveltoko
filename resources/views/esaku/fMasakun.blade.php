    {{-- Referensi file fVendor folder Esaku --}}
    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Akun" tambah="true" :thead="array('Kode','Nama','Tgl Input','Aksi')" :thwidth="array(20,70,0,10)" :thclass="array('','','','text-center')" />
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
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="modul">Kelompok Akun</label>
                                <select class="form-control selectize" id="modul" name="modul" required>
                                    <option value="">--Pilih Modul--</option>
                                    <option value="A">Aktiva</option>
                                    <option value="P">Passiva</option>
                                    <option value="L">Laba Rugi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">           
                                <label for="jenis">Kelompok Laporan</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="">--Pilih Jenis--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="account">Normal Account</label>
                                <select class="form-control selectize" id="account" name="account" required>
                                    <option value="">--Pilih Normal Account--</option>
                                    <option value="D">D - Debet</option>
                                    <option value="C">C - Kredit</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_curr">Currency</label>
                                <input class="form-control" type="text" placeholder="Kode Currency" id="kode_curr" name="kode_curr" value="IDR" readonly required>            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_akun">Kode</label>
                                <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="switch-toggle">
                                    <label class="switch">
                                        <input type="checkbox" id="status-aktif">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="label-switch">
                                        <span id="active">Aktif</span>
                                        <span id="unactive">Tidak Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="switch-toggle">
                                    <label class="switch">
                                        <input type="checkbox" id="status-anggaran">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="label-switch">
                                        <span id="check">Cek Anggaran</span>
                                        <span id="uncheck">Tidak Cek Anggaran</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_akun">Kode</label>
                                        <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="modul">Modul</label>
                                        <select class="form-control selectize" id="modul" name="modul" required>
                                            <option value="">--Pilih Modul--</option>
                                            <option value="A">Aktiva</option>
                                            <option value="P">Passiva</option>
                                            <option value="L">Laba Rugi</option>
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12">           
                                        <label for="modul">Jenis</label>
                                        <select class="form-control" id="jenis" name="jenis" required>
                                        <option value="">--Pilih Jenis--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_curr">Currency</label>
                                        <input class="form-control" type="text" placeholder="Kode Currency" id="kode_curr" name="kode_curr" value="IDR" readonly required>            
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="blok">Status Blok</label>
                                        <select class="form-control selectize" id="blok" name="blok" required>
                                            <option value="">--Pilih Status Blok--</option>
                                            <option value="0">Unblok</option>
                                            <option value="1">Blok</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="budget">Status Budget</label>
                                        <select class="form-control selectize" id="budget" name="budget" required>
                                            <option value="">--Pilih Status Budget--</option>
                                            <option value="0">Uncheck</option>
                                            <option value="1">Check</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="account">Normal Account</label>
                                        <select class="form-control selectize" id="account" name="account" required>
                                        <option value="">--Pilih Normal Account--</option>
                                        <option value="D">D - Debet</option>
                                        <option value="C">C - Kredit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
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
    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    var $status_aktif = false;
    var $status_cek = false;
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();
    $optionJenis1 = [{value:'Neraca', text:'Neraca'}]
    $optionJenis2 = [{value:'Pendapatan', text:'Pendapatan'},{value:'Beban', text:'Beban'}]
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function isCheckedAktif() {
        if($status_aktif) {
            $('#status-aktif').prop('checked', true)
            $('#active').show()        
            $('#unactive').hide()        
        } else {
            $('#status-aktif').prop('checked', false)
            $('#active').hide()        
            $('#unactive').show()        
        }
    }

    function isCheckedAnggaran() {
        if($status_cek) {
            $('#status-anggaran').prop('checked', true)
            $('#check').show()        
            $('#uncheck').hide()        
        } else {
            $('#status-anggaran').prop('checked', false)
            $('#check').hide()        
            $('#uncheck').show()        
        }
    }

    $('#status-aktif').click(function() {
        $status_aktif = !$status_aktif
        isCheckedAktif()
    })

    $('#status-anggaran').click(function() {
        $status_cek = !$status_cek
        isCheckedAnggaran()
    })

    $('.selectize').selectize();
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
        // $.each(option, function (i, item) {
        // });
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
    
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/masakun') }}", 
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
        isCheckedAktif()
        isCheckedAnggaran()
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Akun');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_akun').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
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
                var url = "{{ url('esaku-master/masakun') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/masakun') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if($status_aktif) {
                formData.append('blok', '1')
            } else {
                formData.append('blok', '0')
            }

            if($status_cek) {
                formData.append('budget', '1')
            } else {
                formData.append('budget', '0')
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
            url: "{{ url('esaku-master/masakun') }}/"+id,
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
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Akun');
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/masakun') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_akun').attr('readonly', true);
                    $('#kode_akun').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    $('#modul').trigger('change');
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#kode_curr').val(result.data[0].kode_curr);
                    // $('#blok')[0].selectize.setValue(result.data[0].block);                  
                    // $('#budget')[0].selectize.setValue(parseInt(result.data[0].status_gar));                  
                    $('#account')[0].selectize.setValue(result.data[0].normal);
                    
                    if(result.data[0].block == 0) {
                        $status_aktif = false
                        isCheckedAktif()
                    } else {
                        $status_aktif = true
                        isCheckedAktif()
                    }
                    
                    if(result.data[0].status_gar == 0) {
                        $status_cek = false
                        isCheckedAnggaran()
                    } else {
                        $status_cek = true
                        isCheckedAnggaran()
                    }

                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#kode_akun,#nama').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_akun','nama'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 15){
                console.log('No event')
                // var akun = $('#akun_hutang').val();
                // getAkun(akun);
            }else{
                $('#'+nxt[idx]).focus();
            }
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
            var data = dataTable.row(this).data();
            var modul = '';
            var block = '';
            var gar = '';
            var normal = '';
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
            var html = `<tr>
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
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
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
        $('#judul-form').html('Edit Data Akun');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/masakun') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_akun').attr('readonly', true);
                    $('#kode_akun').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    $('#modul').trigger('change');
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#kode_curr').val(result.data[0].kode_curr);
                    // $('#blok')[0].selectize.setValue(result.data[0].block);                         
                    // $('#budget')[0].selectize.setValue(parseInt(result.data[0].status_gar));                             
                    $('#account')[0].selectize.setValue(result.data[0].normal);
                    
                    if(result.data[0].block == 0) {
                        $status_aktif = false
                        isCheckedAktif()
                    } else {
                        $status_aktif = true
                        isCheckedAktif()
                    }
                    
                    if(result.data[0].status_gar == 0) {
                        $status_cek = false
                        isCheckedAnggaran()
                    } else {
                        $status_cek = true
                        isCheckedAnggaran()
                    }
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
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