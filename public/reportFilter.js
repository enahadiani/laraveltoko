(function ( $ ) {
    var pilih = '';
    var display = '';
    var defaults = {}, options = $.extend({}, defaults, options);

    function showFilter(options,idx,target1,tipe){
        var settings = {
            header:[],
            columns:[],
            url:[],
            parameter:[],
            nama:[],
            kode:[],
            orderby:[],
            width:[],
            headerpilih:[],
            display:[],
            pageLength:[]
        }
        
        $.extend(settings, options);
        
        $target = target1;
        var tmp = $target.attr('id');
        tmp = tmp.split("-");
        var target2 = tmp[1];
        var target3 = tmp[1]+'name';
        
        var toUrl = settings.url[idx];
        var columns = settings.columns[idx];
        var parameter = settings.parameter[idx];
        var judul = "Daftar "+settings.nama[idx]+" <span class='modal-subtitle'></span>";
        pilih = settings.nama[idx];
        display = settings.display[idx];
        var field = eval('$'+settings.kode[idx]);
        var kunci = settings.kode[idx];
        var orderby = settings.orderby[idx];
        var width = settings.width[idx];
        var type = tipe;
        if(settings.pageLength != undefined){
            if(settings.pageLength[idx] != undefined){
                var pageLength = settings.pageLength[idx];
            }else{
                var pageLength = 10;
            }
        }else{
            var pageLength =10;
        }
        
        var header_html = '';
        for(i=0; i < settings.header[idx].length; i++){
            header_html +=  "<th style='"+width[i]+"'>"+settings.header[idx][i]+"</th>";
        }

        if(type == "range"){
            var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table>";
            if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                $('#modal-search .modal-header ul').addClass('hidden');
                $('#modal-search .modal-header').css('padding-bottom','1.75rem');
            }
        }
        else if(type == "in"){
            var headerpilih_html = '';
            var width = ["25%","70%","5%"];
            for(i=0; i<settings.headerpilih[idx].length; i++){
                headerpilih_html +=  "<th style='width:"+width[i]+"'>"+settings.headerpilih[idx][i]+"</th>";
            }

            var table = `
            <div class="tab-content tabcontent-border col-12 p-0">
                <div class="tab-pane active" id="list" role="tabpanel">
                    <table class='' width='100%' id='table-search'><thead><tr>`+header_html+`</tr></thead>
                    <tbody></tbody></table>
                </div>
                <div class="tab-pane" id="terpilih" role="tabpanel">
                    <table class='' width='100%' id='table-search2'><thead><tr>`+headerpilih_html+`</tr></thead>
                    <tbody></tbody></table>
                </div>
            </div>
            <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
            $('#modal-search .modal-header').css('padding-bottom','0');
            $('#modal-search .modal-header ul').removeClass('hidden');
        }
        else{
            var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
            table += "<tbody></tbody></table>";
            if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                $('#modal-search .modal-header ul').addClass('hidden');
                $('#modal-search .modal-header').css('padding-bottom','1.75rem');
            }
        }


        $('#modal-search .modal-body').html(table);
        
        $('#btn-ok').addClass('disabled');
        $('#btn-ok').prop('disabled', true);

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
            order: orderby,
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
                lengthMenu: "Items Per Page _MENU_"
            },
            pageLength : pageLength
        });

        $('#modal-search .modal-title').html(judul);
        if(typeof M == 'undefined'){
            $('#modal-search').modal('show');
        }else{
            $('#modal-search').modal('open');
        }
        searchTable.columns.adjust().draw();

        if(type == "range"){
            var searchTable2 = $("#table-search2").DataTable({
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
                order: orderby,
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
                    lengthMenu: "Items Per Page _MENU_"
                },
                pageLength : pageLength
            });

            $('#modal-search .modal-subtitle').html('[Rentang Awal]');
            searchTable2.columns.adjust().draw();
            
            $('#table-search2_wrapper').addClass('hidden');

            $("<input class='form-control mb-1' type='text' id='rentang-tag'>").insertAfter('#table-search_filter label');
            $("<input class='form-control mb-1' type='text' id='rentang-tag2'>").insertAfter('#table-search2_filter label');
            $("#rentang-tag").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13],
                itemValue: 'id',
                itemText: 'text'
            });
            $("#rentang-tag2").tagsinput({
                cancelConfirmKeysOnEmpty: true,
                confirmKeys: [13],
                itemValue: 'id',
                itemText: 'text'
            });
            $('#rentang-tag').on('itemAdded', function(event) {
                $('#rentang-tag2').tagsinput('add', {id:event.item.id,text:event.item.text});
            }); 
            
            $('#rentang-tag2').on('itemRemoved', function(event) {
                $('#rentang-tag').tagsinput('remove', {id:event.item.id,text:event.item.text});
                var rowIndexes = [];
                searchTable.rows( function ( idx, data, node ) {             
                    if(data[kunci] === event.item.id){
                        rowIndexes.push(idx);                  
                    }
                    return false;
                }); 
                searchTable.row(rowIndexes).deselect();
                
                $('#table-search_wrapper').removeClass('hidden');
                $('#table-search2_wrapper').addClass('hidden');
                $('#modal-search .modal-subtitle').html('[Rentang Awal]');
            }); 
            $('.bootstrap-tagsinput').css({'text-align':'left','border':'0','min-height':'41.2px'});
        }else if(type == "in"){
            var searchTable2 = $("#table-search2").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                columns: columns,
                order: orderby,
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
                    lengthMenu: "Items Per Page _MENU_"
                },
                "columnDefs": [{
                    "targets": settings.headerpilih[idx].length - 1, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                }],
                pageLength : pageLength
            });
            searchTable2.columns.adjust().draw();
        }

        $('#table-search tbody').on('click', 'tr', function () {
            
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                if(type == "in"){
                    var datain = searchTable.rows('.selected').data();
                    if(datain.length > 1){
                        
                        $('#btn-ok').removeClass('disabled');
                        $('#btn-ok').prop('disabled', false);
                    }else{
                        
                        $('#btn-ok').addClass('disabled');
                        $('#btn-ok').prop('disabled', true);
                    }
                    searchTable2.clear().draw();
                    if(typeof datain !== 'undefined' && datain.length>0){
                        searchTable2.rows.add(datain).draw(false);
                    }
                }
            }
            else {
                if(type == "range"){
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    searchTable2.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    
                    $($target).trigger('change');
                    field["from"] = kode;
                    field["fromname"] = nama;
                    
                    $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
                   
                    $('#table-search_wrapper').addClass('hidden');
                    $('#table-search2_wrapper').removeClass('hidden');
                    $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                }
                else if (type == "in"){
                    $(this).addClass('selected');
                    var datain = searchTable.rows('.selected').data();
                    if(datain.length > 1){
                        
                        $('#btn-ok').removeClass('disabled');
                        $('#btn-ok').prop('disabled', false);
                    }else{
                        
                        $('#btn-ok').addClass('disabled');
                        $('#btn-ok').prop('disabled', true);
                    }
                    searchTable2.clear().draw();
                    if(typeof datain !== 'undefined' && datain.length>0){
                        searchTable2.rows.add(datain).draw(false);
                    }
                }
                else{
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    
                    $($target).trigger('change');
                    field[target2] = kode;
                    field[target3] = nama;
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                }

            }
        });

        $('#table-search2 tbody').on('click', 'tr', function () {
            if(type == "range"){

                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    
                    searchTable.$('tr.selected').removeClass('selected');
                    searchTable2.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                    if(display == "kodename"){
                        $($target).val(kode+' - '+nama);
                    }else if(display == "name"){
                        $($target).val(nama);
                    }else{   
                        $($target).val(kode);
                    }
                    $($target).trigger('change');

                    field["to"] = kode;
                    field["toname"] = nama;   
                    console.log(field);      
                    
                    $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode });       
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                }
            }
        });

        $('#table-search2 tbody').on('click', '.hapus-item', function () {
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            searchTable2.row( $(this).parents('tr') ).remove().draw();
            console.log('kode_akun='+kode);
            var rowIndexes = [];
            searchTable.rows( function ( idx, data, node ) {             
                if(data[kunci] === kode){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            searchTable.row(rowIndexes).deselect();
        });

        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.cells('.selected',0).data();
            console.log(datain.length);
            var kode = '';
            var nama = '';
            for(var i=0;i<datain.length;i++){
                if(i == 0){
                    kode +=datain[i];
                }else{
                    kode +=','+datain[i];
                }
            }   
            $($target).val(kode);
            $($target).trigger('change');
            field[target2] = kode;
            field[target3] = kode;
            if(typeof M == 'undefined'){
                $('#modal-search').modal('hide');
            }else{
                $('#modal-search').modal('close');
            }
        });
    }

    function showDatePicker(options,idx,target1,tipe,kunci){
        var settings = {
            header:[],
            columns:[],
            url:[],
            parameter:[],
            nama:[],
            kode:[],
            orderby:[],
            width:[],
            headerpilih:[],
            display:[],
            pageLength:[]
        }
        
        $.extend(settings, options);
        
        $target = target1;
        var tmp = $target.attr('id');
        tmp = tmp.split("-");
        var target2 = tmp[1];
        var target3 = tmp[1]+'name';
        
        var toUrl = settings.url[idx];
        var columns = settings.columns[idx];
        var parameter = settings.parameter[idx];
        var judul = "Pilih "+settings.nama[idx]+" <span class='modal-subtitle'></span>";
        pilih = settings.nama[idx];
        display = settings.display[idx];
        var field = eval('$'+settings.kode[idx]);
        var kunci = settings.kode[idx];
        var orderby = settings.orderby[idx];
        var width = settings.width[idx];
        var type = tipe;
        if(settings.pageLength != undefined){
            if(settings.pageLength[idx] != undefined){
                var pageLength = settings.pageLength[idx];
            }else{
                var pageLength = 10;
            }
        }else{
            var pageLength =10;
        }

        $('#modal-search .modal-title').html(judul);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var datenow = dd+"/"+mm+"/"+yyyy;

        switch(type){
            case '=':
                case '<=':
                var html = `<div class='row sama'>
                    <div class='col-md-12' id='date-`+kunci+`' data-date='`+datenow+`'></div>
                </div>`;
                $('#modal-search .modal-body').html(html);
                $('#date-'+kunci).datepicker({
                    format: 'dd/mm/yyyy',
                    templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>'
                    }
                });
                $('#date-'+kunci).on('changeDate', function() {
                    $($target).val($('#date-'+kunci).datepicker('getFormattedDate'));
                    $($target).trigger('change');
                    field[target2] = $('#date-'+kunci).datepicker('getFormattedDate');
                    field[target3] = $('#date-'+kunci).datepicker('getFormattedDate');
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                });
                break;
            case 'in':
                var html = `<div class='row in'>
                    <input type='text' class='form-control col-md-12' id='inp_date-`+kunci+`-in'>
                    <div class='col-md-12' id='date-`+kunci+`-in' data-date='`+datenow+`'></div>
                    <div class='col-md-4 float-right'><button id='btn-ok-`+kunci+`-in' class='btn btn-primary'>OK</button></div>
                </div>`;
                $('#modal-search .modal-body').html(html);
                $('#date-'+kunci+'-in').datepicker({
                    format: 'dd/mm/yyyy',
                    templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>'
                    },
                    multidate:true
                });
                $('#date-'+kunci+'-in').on('changeDate', function() {
                    $('#inp_date-'+kunci+'-in').val(
                        $('#date-'+kunci+'-in').datepicker('getFormattedDate')
                    );
                });
                $('div.in').on('click','#btn-ok-'+kunci+'-in',function(){
                    $($target).val($('#date-'+kunci+'-in').datepicker('getFormattedDate'));
                    $($target).trigger('change');
                    field[target2] = $('#date-'+kunci+'-in').datepicker('getFormattedDate');
                    field[target3] = $('#date-'+kunci+'-in').datepicker('getFormattedDate');
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                });
                break;
            case 'range':
                var html = `<div class='row range'>
                    <input type='text' class='form-control col-md-6' id='inp_date-`+kunci+`-from' value='`+datenow+`'>
                    <input type='text' class='form-control col-md-6' id='inp_date-`+kunci+`-to' value='`+datenow+`'>
                    <div class='col-md-6' id='date-`+kunci+`-from' data-date='`+datenow+`'></div>
                    <div class='col-md-6' id='date-`+kunci+`-to' data-date='`+datenow+`'></div>
                    <div class='col-md-4 float-right'><button id='btn-ok-`+kunci+`-range' class='btn btn-primary'>OK</button></div>
                </div>`;
                
                $('#modal-search .modal-body').html(html);
                $('#date-'+kunci+'-from').datepicker({
                    autoclose: true,
                    format: 'dd/mm/yyyy',
                    templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>'
                    }
                });
                $('#date-'+kunci+'-from').on('changeDate', function() {
                    $('#inp_date-'+kunci+'-from').val(
                        $('#date-'+kunci+'-from').datepicker('getFormattedDate')
                    );
                });
                $('#date-'+kunci+'-to').datepicker({
                    autoclose: true,
                    format: 'dd/mm/yyyy',
                    templates: {
                        leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        rightArrow: '<i class="simple-icon-arrow-right"></i>'
                    }
                });
                $('#date-'+kunci+'-to').on('changeDate', function() {
                    $('#inp_date-'+kunci+'-to').val(
                        $('#date-'+kunci+'-to').datepicker('getFormattedDate')
                    );
                });
                $('div.range').on('click','#btn-ok-'+kunci+'-range',function(){
                    $($target).val($('#date-'+kunci+'-from').datepicker('getFormattedDate'));
                    $($target).trigger('change');
                    field["from"] = $('#date-'+kunci+'-from').datepicker('getFormattedDate');
                    field["fromname"] = $('#date-'+kunci+'-from').datepicker('getFormattedDate');
                    field["to"] = $('#date-'+kunci+'-to').datepicker('getFormattedDate');;
                    field["toname"] = $('#date-'+kunci+'-to').datepicker('getFormattedDate');;  
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                });
                break;
        }
        if(typeof M == 'undefined'){
            $('#modal-search').modal('show');
        }else{
            $('#modal-search').modal('open');
        }
    }

    $.fn.reportFilter = function( options ) {
       
        var options = (function (opts, def) {
            var _opts = {};
            if (typeof opts[0] !== "object") {
                _opts[opts[0]] = opts[1];
            };
            return opts.length === 0 
                   ? def 
                   : typeof opts[0] === "object" 
                     ? opts[0] : _opts
        }([].slice.call(arguments), defaults));

        var settings = options;
        
        return this.each(function() {
           
            $(this).on('change', '.sai-rpt-filter-type', function(){
                var type = $(this).val();
                var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
                var field = eval('$'+kunci);
                var idx = settings.kode.indexOf(kunci);
                
                var target1 = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
                var tmp = tmp.split(" ");
                datepicker = tmp.includes("datepicker");
                switch(type){
                    case "all":
                        
                        $aktif = '';
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+pilih);
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                        
                        field.type = "all";
                        field.from = "";
                        field.to = "";
                        field.fromname = "";
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                        
                    break;
                    case "=": 
                    case "<=":
                        
                        $aktif = "";
                        if(datepicker){
                            showDatePicker(settings,idx,target1,type,kunci);
                        }else{
                            showFilter(settings,idx,target1);
                        }
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        field.type = type;
                        field.from = field.from;
                        field.to = "";
                        field.fromname = field.fromname;
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                    break;
                    case "range":
                        
                        $aktif = $(this);
                        if(datepicker){
                            showDatePicker(settings,idx,target1,type,kunci);
                        }else{
                            showFilter(settings,idx,target1,"range");
                        }
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            if($aktif != ""){
        
                                field.type = "range";
                                field.from = field.from;
                                field.to = field.to;
                                field.fromname =  field.fromname ;
                                field.toname =  field.toname ;
            
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                                if(display == "nama"){
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                                }else if(display == "kodename"){
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from+' - '+field.fromname);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to+' - '+field.toname);
                                }else{
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from);
                                    $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to);
                                }
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                            }
                        });
                        
                    break;
                    case "in":
                        
                        $aktif = '';
                        
                        if(datepicker){
                            showDatePicker(settings,idx,target1,type,kunci);
                        }else{
                            showFilter(settings,idx,target1,"in");
                        }
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                        $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        
                        field.type = "in";
                        field.from = "";
                        field.to = "";
                        field.fromname = "";
                        field.toname = "";
                        $('#modal-search').on('hide.bs.modal', function (e) {
                            //
                        });
                        
                    break;
                }
               
            });
        
            $(this).on('click', '.search-item', function(){
                
                var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
                var idx = settings.kode.indexOf(kunci);
                var target1 = $(this).closest('.input-group').find('input');
                
                var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
                var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
                var datepicker = tmp.split(" ");
                if(datepicker.includes("datepicker")){
                    showDatePicker(settings,idx,target1,type,kunci);
                }else{

                    if(type == "in"){
                        showFilter(settings,idx,target1,type);
                    }else{
                        showFilter(settings,idx,target1);
                    }
                }

            });
        
        });
    };
 
}( jQuery ));
