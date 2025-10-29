function format_number(x){
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function reverseDate2(date_str, separator, newseparator){
    if(typeof separator === 'undefined'){separator = '-'}
    if(typeof newseparator === 'undefined'){newseparator = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);

    return str[2]+newseparator+str[1]+newseparator+str[0];
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
    setTimeout(function() {
        $('.selected td:eq(0)').removeClass('last-add');
        dataTable.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

function generateTable(id,url,columnDefs,columns,url_sesi,byOrder = [],param = {},scrollX=false,scrollY='') {
    var options_dt = {
        destroy: true,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': url,
            'async':false,
            'type': 'GET',
            'data': function(prm) {
                return $.extend({}, prm, eval(param));
            },
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = url_sesi;
                    return [];
                }else{
                    return [];
                }
            }
        },
        'order':byOrder,
        'columns': columns,
        'columnDefs': columnDefs,
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
    };
    if(scrollX){
        options_dt = Object.assign(options_dt, {scrollX: scrollX});
    }
    if(scrollY != ''){
        options_dt = Object.assign(options_dt, {scrollY: scrollY});
    }
    var dataTable = $("#"+id).DataTable(options_dt);

    return dataTable;
}

function generateTableWithoutAjax(id,columnDefs,columns,data_def,byOrder = []) {
    var dataTable = $("#"+id).DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: data_def,
        columnDefs: columnDefs,
        columns: columns,
        order:byOrder,
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

    return dataTable;
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

function removeInfoField(par){
    $('#'+par).val('');
    $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_'+par).parent('div').addClass('hidden');
    $('.info-name_'+par).addClass('hidden');
    $('#search_'+par).siblings('i').addClass('hidden');
}

function resizeNameField(kode){
    var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
    var height =$('#'+kode).height();
    var pos =$('#'+kode).position();
    $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
}

function showInpFilter(settings){
    var par = settings.id;
    var header = settings.header;
    $target = settings.target1;
    $target2 = settings.target2;
    $target3 = settings.target3;
    $target4 = settings.target4;
    var parameter = settings.parameter;
    var toUrl = settings.url;
    var columns = settings.columns;
    var judul = settings.judul;
    var jTarget1 = settings.jTarget1;
    var jTarget2 = settings.jTarget2;
    var width = settings.width;

    var header_html = '';
    for(i=0; i<header.length; i++){
        header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
    }

    
    if(settings.multi != undefined){
        var headerpilih_html = '';
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        headerpilih_html +=  "<th style='width:10%'>Action</th>";
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
    else if(settings.multi2 != undefined){
        var headerpilih_html = '';
        headerpilih_html +=  "<th style='width:5%' id='checkbox_search'><input id='check-all_search' name='select_all_search' value='1' type='checkbox'></th>";
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        var table = `<table class='' width='100%' id='table-search'><thead><tr>`+headerpilih_html+`</tr></thead>
        <tbody></tbody></table>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        if(!$('#modal-search .modal-header ul').hasClass('hidden')){
            $('#modal-search .modal-header ul').addClass('hidden');
            $('#modal-search .modal-header').css('padding-bottom','1.75rem');
        }
    }
    else{

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        if(!$('#modal-search .modal-header ul').hasClass('hidden')){
            $('#modal-search .modal-header ul').addClass('hidden');
            $('#modal-search .modal-header').css('padding-bottom','1.75rem');
        }
    }
    table += "<tbody></tbody></table>";

    $('#modal-search .modal-body').html(table);

    if(settings.multi2 != undefined){
        if ( $.fn.dataTable.isDataTable( '#table-search' ) ) {
            var searchTable = $('#table-search').DataTable();
        }
        else {
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
                bDestroy: true,
                columnDefs: [
                    {
                        "targets": 0,
                        "searchable": false,
                        "orderable": false,
                        "className": 'selectall-checkbox_search',
                        'render': function (data, type, full, meta){
                            return '<input type="checkbox" name="checked_search[]">';
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
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
        }

        searchTable.on('select.dt deselect.dt', function (e, dt, type, indexes){
        
            var countSelectedRows = searchTable.rows({ selected: true }).count();
            var countItems = searchTable.rows().count();
    
            if (countItems > 0) {
                if (countSelectedRows == countItems){
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', true);
                } else {
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', false);
                }
            }
    
            if (e.type === 'select') {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: true }).nodes()).prop('checked', true);
            } else {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: false }).nodes()).prop('checked', false);
            }
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search', function() {
            $('input[type="checkbox"]', this).trigger('click');
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search input[type="checkbox"]', function(e) {
            if (this.checked) {
                searchTable.rows().select();
            } else {
                searchTable.rows().deselect();
            }
            e.stopPropagation();
        });

    }else{
        if ( $.fn.dataTable.isDataTable( '#table-search' ) ) {
            var searchTable = $('#table-search').DataTable();
        }
        else {
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
                bDestroy: true,
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
        }
    }


    $('#modal-search .modal-title').html(judul);
    if(typeof M == 'undefined'){
        $('#modal-search').modal('show');
    }else{
        $('#modal-search').modal('open');
    }
    searchTable.columns.adjust().draw();

    if(settings.multi != undefined){
        if ( $.fn.dataTable.isDataTable( '#table-search2' ) ) {
            var searchTable2 = $('#table-search2').DataTable();
        }
        else {
            var searchTable2 = $("#table-search2").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                columns: columns,
                order: settings.orderby,
                bDestroy: true,
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
                    "targets": settings.header.length, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                }]
            });
        }
        searchTable2.columns.adjust().draw();

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }else{
                $(this).addClass('selected');
            }
            var datain = searchTable.rows('.selected').data();
            searchTable2.clear().draw();
            if(typeof datain !== 'undefined' && datain.length>0){
                searchTable2.rows.add(datain).draw(false);
            }
        });

        $('#table-search2 tbody').on('click', '.hapus-item', function () {
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            searchTable2.row( $(this).parents('tr') ).remove().draw();
            var rowIndexes = [];
            searchTable.rows( function ( idx, data, node ) {             
                if(data[settings.id] === kode){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            searchTable.row(rowIndexes).deselect();
        });

        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.rows('.selected').data();
            if (settings.onItemSelected != undefined){
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, datain);
                }
            }else{
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
            }
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            if(typeof M == 'undefined'){
                $('#modal-search').modal('hide');
            }else{
                $('#modal-search').modal('close');
            }
        });
    }
    else if(settings.multi2 != undefined){
        $('#modal-search').on('click','#btn-ok',function(){
            var datain = searchTable.rows({ selected: true }).data();
            if (settings.onItemSelected != undefined){
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, datain);
                }
            }else{
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
            }
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            if(typeof M == 'undefined'){
                $('#modal-search').modal('hide');
            }else{
                $('#modal-search').modal('close');
            }
        });
    }
    else{
        if (settings.onItemSelected != undefined) {
                
            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).toggleClass('selected');
    
                    var select_data = searchTable.row(this).data();
                    if (typeof settings.onItemSelected === "function") {
                        settings.onItemSelected.call(this, select_data);
                    }
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                }
            });
    
        }else{
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
                        $($target3).text(nama);
                    }
        
                    if($target4 != ""){
                        if($target4 == "custom"){
                            custTarget($target,$(this).closest('tr'));
                        }
                        $($target).closest('tr').find($target4).click();
                    }
                    if(typeof M == 'undefined'){
                        $('#modal-search').modal('hide');
                    }else{
                        $('#modal-search').modal('close');
                    }
                }
            });
        }
    }


}

function showInpFilterBSheet(settings){
    var par = settings.id;
    var header = settings.header;
    $target = settings.target1;
    $target2 = settings.target2;
    $target3 = settings.target3;
    $target4 = settings.target4;
    var parameter = settings.parameter;
    var toUrl = settings.url;
    var columns = settings.columns;
    var judul = settings.judul;
    var jTarget1 = settings.jTarget1;
    var jTarget2 = settings.jTarget2;
    var width = settings.width;

    var header_html = '';
    for(i=0; i<header.length; i++){
        header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
    }
    $('.c-bottom-sheet').removeClass('active');
    var content = `
    <div id="search-content">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $('#content-bottom-sheet').html(content);

    $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
    var scrollsrc = document.querySelector('.search-body');
    var psscrollsrc = new PerfectScrollbar(scrollsrc);
    
    if(settings.multi != undefined){
        var headerpilih_html = '';
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        headerpilih_html +=  "<th style='width:10%'>Action</th>";
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
        $('.search-header').css('padding-bottom','0');
        $('.search-header ul').removeClass('hidden');
    }
    else if(settings.multi2 != undefined){
        var headerpilih_html = '';
        headerpilih_html +=  "<th style='width:5%' id='checkbox_search'><input id='check-all_search' name='select_all_search' value='1' type='checkbox'></th>";
        for(i=0; i<header.length; i++){
            headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }
        var table = `<table class='' width='100%' id='table-search'><thead><tr>`+headerpilih_html+`</tr></thead>
        <tbody></tbody></table>
        <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
        }
    }
    else{

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
        }
    }
    table += "<tbody></tbody></table>";

    $('.search-body').html(table);



    if(settings.multi2 != undefined){
        if ( $.fn.dataTable.isDataTable( '#table-search' ) ) {
            var searchTable = $('#table-search').DataTable();
        }
        else {
            var searchTable = $("#table-search").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                bDestroy: true,
                ajax: {
                    "url": toUrl,
                    "data": parameter,
                    "type": "GET",
                    "async": false,
                    "dataSrc" : function(json) {
                        return json.daftar;
                    }
                },
                columnDefs: [
                    {
                        "targets": 0,
                        "searchable": false,
                        "orderable": false,
                        "className": 'selectall-checkbox_search',
                        'render': function (data, type, full, meta){
                            return '<input type="checkbox" name="checked_search[]">';
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
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
        }

        searchTable.on('select.dt deselect.dt', function (e, dt, type, indexes){
        
            var countSelectedRows = searchTable.rows({ selected: true }).count();
            var countItems = searchTable.rows().count();
    
            if (countItems > 0) {
                if (countSelectedRows == countItems){
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', true);
                } else {
                    $('thead .selectall-checkbox_search input[type="checkbox"]', this).prop('checked', false);
                }
            }
    
            if (e.type === 'select') {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: true }).nodes()).prop('checked', true);
            } else {
                $('.selectall-checkbox_search input[type="checkbox"]', searchTable.rows({ selected: false }).nodes()).prop('checked', false);
            }
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search', function() {
            $('input[type="checkbox"]', this).trigger('click');
        });
    
        searchTable.on('click', 'thead .selectall-checkbox_search input[type="checkbox"]', function(e) {
            if (this.checked) {
                searchTable.rows().select();
            } else {
                searchTable.rows().deselect();
            }
            e.stopPropagation();
        });

    }else{
        if ( $.fn.dataTable.isDataTable( '#table-search' ) ) {
            var searchTable = $('#table-search').DataTable();
        }
        else {
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
                bDestroy: true,
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
        }
    }


    $('.search-header .title').html(judul);
    $('#trigger-bottom-sheet').trigger("click");
    // if(typeof M == 'undefined'){
    //     $('#modal-search').modal('show');
    // }else{
    //     $('#modal-search').modal('open');
    // }
    searchTable.columns.adjust().draw();

    if(settings.multi != undefined){
        if ( $.fn.dataTable.isDataTable( '#table-search2' ) ) {
            var searchTable2 = $('#table-search2').DataTable();
        }
        else {
            var searchTable2 = $("#table-search2").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                columns: columns,
                bDestroy: true,
                order: settings.orderby,
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
                    "targets": settings.header.length, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                }]
            });
        }
        searchTable2.columns.adjust().draw();

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }else{
                $(this).addClass('selected');
            }
            var datain = searchTable.rows('.selected').data();
            searchTable2.clear().draw();
            if(typeof datain !== 'undefined' && datain.length>0){
                searchTable2.rows.add(datain).draw(false);
            }
        });

        $('#table-search2 tbody').on('click', '.hapus-item', function () {
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            searchTable2.row( $(this).parents('tr') ).remove().draw();
            var rowIndexes = [];
            searchTable.rows( function ( idx, data, node ) {             
                if(data[settings.id] === kode){
                    rowIndexes.push(idx);                  
                }
                return false;
            }); 
            searchTable.row(rowIndexes).deselect();
        });

        $('#search-content').on('click','#btn-ok',function(){
            var datain = searchTable.rows('.selected').data();
            if (settings.onItemSelected != undefined){
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, datain);
                }
            }else{
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
            }
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            // if(typeof M == 'undefined'){
            //     $('#modal-search').modal('hide');
            // }else{
            //     $('#modal-search').modal('close');
            // }
            $('.c-bottom-sheet').removeClass('active');
        });
    }
    else if(settings.multi2 != undefined){
        $('#search-content').on('click','#btn-ok',function(){
            var datain = searchTable.rows({ selected: true }).data();
            if (settings.onItemSelected != undefined){
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, datain);
                }
            }else{
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
            }
            $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
            // if(typeof M == 'undefined'){
            //     $('#modal-search').modal('hide');
            // }else{
            //     $('#modal-search').modal('close');
            // }
            
            $('.c-bottom-sheet').removeClass('active');
        });
    }
    else{
        if (settings.onItemSelected != undefined) {
                
            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).toggleClass('selected');
    
                    var select_data = searchTable.row(this).data();
                    if (typeof settings.onItemSelected === "function") {
                        settings.onItemSelected.call(this, select_data);
                    }
                    // if(typeof M == 'undefined'){
                    //     $('#modal-search').modal('hide');
                    // }else{
                    //     $('#modal-search').modal('close');
                    // }
                    
                    $('.c-bottom-sheet').removeClass('active');
                }
            });
    
        }else{
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
                        $($target3).text(nama);
                    }
        
                    if($target4 != ""){
                        if($target4 == "custom"){
                            custTarget($target,$(this).closest('tr'));
                        }
                        $($target).closest('tr').find($target4).click();
                    }
                    // if(typeof M == 'undefined'){
                    //     $('#modal-search').modal('hide');
                    // }else{
                    //     $('#modal-search').modal('close');
                    // }
                    
                    $('.c-bottom-sheet').removeClass('active');
                }
            });
        }
    }


}

function showRptFilterBSheet(settings,idx,target1,tipe,aktif=null){
    
    target = target1;
    var tmp = target.attr('id');
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
    $('.c-bottom-sheet').removeClass('active');
    var content = `
    <div id="search-content">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $('#content-bottom-sheet').html(content);

    $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
    var scrollsrc = document.querySelector('.search-body');
    var psscrollsrc = new PerfectScrollbar(scrollsrc);

    if(type == "range"){
        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
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
        
        $('.search-header').css('padding-bottom','0');
        $('.search-header ul').removeClass('hidden');
    }
    else{
        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";
        if(!$('.search-header ul').hasClass('hidden')){
            $('.search-header ul').addClass('hidden');
            $('.search-header').css('padding-bottom','1.75rem');
        }
    }


    table += "<tbody></tbody></table>";

    $('.search-body').html(table);
    
    $('#btn-ok').addClass('disabled');
    $('#btn-ok').prop('disabled', true);
    if ( $.fn.dataTable.isDataTable( '#table-search' ) ) {
        var searchTable = $('#table-search').DataTable();
    }
    else {
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
            bDestroy: true,
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
    }

    $('.search-header .title').html(judul);
    $('#trigger-bottom-sheet').trigger("click");
    searchTable.columns.adjust().draw();

    if(type == "range"){
        if ( $.fn.dataTable.isDataTable( '#table-search2' ) ) {
            var searchTable2 = $('#table-search2').DataTable();
        }
        else {
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
                bDestroy: true,
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
        }

        $('#search-content .modal-subtitle').html('[Rentang Awal]');
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
            $('#search-content .modal-subtitle').html('[Rentang Awal]');
        }); 
        $('.bootstrap-tagsinput').css({'text-align':'left','border':'0','min-height':'41.2px'});
    }else if(type == "in"){
        if ( $.fn.dataTable.isDataTable( '#table-search2' ) ) {
            var searchTable2 = $('#table-search2').DataTable();
        }
        else {
            var searchTable2 = $("#table-search2").DataTable({
                sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                columns: columns,
                order: orderby,
                bDestroy: true,
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
        }
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
                    $(target).val(kode+' - '+nama);
                }else if(display == "name"){
                    $(target).val(nama);
                }else{   
                    $(target).val(kode);
                }
                
                $(target).trigger('change');
                field["from"] = kode;
                field["fromname"] = nama;
                
                $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
               
                $('#table-search_wrapper').addClass('hidden');
                $('#table-search2_wrapper').removeClass('hidden');
                $('#search-content .modal-subtitle').html('[Rentang Akhir]');
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
                    $(target).val(kode+' - '+nama);
                }else if(display == "name"){
                    $(target).val(nama);
                }else{   
                    $(target).val(kode);
                }
                
                $(target).trigger('change');
                field[target2] = kode;
                field[target3] = nama;
                $('.c-bottom-sheet').removeClass('active');
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
                    $(target).val(kode+' - '+nama);
                }else if(display == "name"){
                    $(target).val(nama);
                }else{   
                    $(target).val(kode);
                }
                $(target).trigger('change');

                field["to"] = kode;
                field["toname"] = nama;   
                
                $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode }); 
                
                onCloseBSheet(aktif,field,display);      
                $('.c-bottom-sheet').removeClass('active');
            }
        }
    });

    $('#table-search2 tbody').on('click', '.hapus-item', function () {
        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
        searchTable2.row( $(this).parents('tr') ).remove().draw();
        var rowIndexes = [];
        searchTable.rows( function ( idx, data, node ) {             
            if(data[kunci] === kode){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        searchTable.row(rowIndexes).deselect();
    });

    $('#search-content').on('click','#btn-ok',function(){
        var datain = searchTable.cells('.selected',0).data();
        var kode = '';
        var nama = '';
        for(var i=0;i<datain.length;i++){
            if(i == 0){
                kode +=datain[i];
            }else{
                kode +=','+datain[i];
            }
        }   
        $(target).val(kode);
        $(target).trigger('change');
        field[target2] = kode;
        field[target3] = kode;
        $('.c-bottom-sheet').removeClass('active');
    });
}

function showRptDatePickerBSheet(options,idx,target1,tipe,kunci,aktif=null){
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

    $('.c-bottom-sheet').removeClass('active');
    var content = `
    <div id="search-content" class="ml-3">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $('#content-bottom-sheet').html(content);

    $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
    var scrollsrc = document.querySelector('.search-body');
    var psscrollsrc = new PerfectScrollbar(scrollsrc);
    
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var datenow = dd+"/"+mm+"/"+yyyy;
    
    var datenow = (field['from'] == "" ? dd+"/"+mm+"/"+yyyy : field['from']);
    var datenowto = (field['to'] == "" ? dd+"/"+mm+"/"+yyyy : field['to']);

    switch(type){
        case '=':
            case '<=':
            var html = `<div class='row sama'>
                <div class='col-md-12' id='date-`+kunci+`' data-date='`+datenow+`'></div>
            </div>`;
            $('.search-body').html(html);
            $('#date-'+kunci).bootstrapDP({
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
            $('#date-'+kunci).on('changeDate', function() {
                $($target).val($('#date-'+kunci).bootstrapDP('getFormattedDate'));
                $($target).trigger('change');
                field[target2] = $('#date-'+kunci).bootstrapDP('getFormattedDate');
                field[target3] = $('#date-'+kunci).bootstrapDP('getFormattedDate');
                $('.c-bottom-sheet').removeClass('active');
            });
            break;
        case 'in':
            var html = `<div class='row in'>
                <input type='text' class='form-control col-md-12' id='inp_date-`+kunci+`-in'>
                <div class='col-md-12' id='date-`+kunci+`-in' data-date='`+datenow+`'></div>
                <div class='col-md-4 float-right'><button id='btn-ok-`+kunci+`-in' class='btn btn-primary'>OK</button></div>
            </div>`;
            $('.search-body').html(html);
            $('#date-'+kunci+'-in').bootstrapDP({
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                },
                multidate:true
            });
            $('#date-'+kunci+'-in').on('changeDate', function() {
                $('#inp_date-'+kunci+'-in').val(
                    $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate')
                );
            });
            $('div.in').on('click','#btn-ok-'+kunci+'-in',function(){
                $($target).val($('#date-'+kunci+'-in').bootstrapDP('getFormattedDate'));
                $($target).trigger('change');
                field[target2] = $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate');
                field[target3] = $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate');
                $('.c-bottom-sheet').removeClass('active');
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
            
            $('.search-body').html(html);
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
                    $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate')
                );
            });
            $('#date-'+kunci+'-to').bootstrapDP({
                autoclose: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
            $('#date-'+kunci+'-to').on('changeDate', function() {
                $('#inp_date-'+kunci+'-to').val(
                    $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate')
                );
            });
            $('div.range').on('click','#btn-ok-'+kunci+'-range',function(){
                var tmp = $target.attr("id").split("-");
                $('#'+tmp[0]+'-from').val($('#date-'+kunci+'-from').bootstrapDP('getFormattedDate'));
                $('#'+tmp[0]+'-from').trigger('change');
                $('#'+tmp[0]+'-to').val($('#date-'+kunci+'-to').bootstrapDP('getFormattedDate'));
                $('#'+tmp[0]+'-to').trigger('change');
                field["from"] = $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate');
                field["fromname"] = $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate');
                field["to"] = $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate');;
                field["toname"] = $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate');;  
                $('.c-bottom-sheet').removeClass('active');
                onCloseBSheet(aktif,field,display);
            });
            break;
    }
    
    $('#trigger-bottom-sheet').trigger("click");
}

function showRptDatePickerBSheet2(options,idx,target1,tipe,kunci,aktif=null){
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

    $('.c-bottom-sheet').removeClass('active');
    var content = `
    <div id="search-content" class="ml-3">
        <div style="display: block;" class="search-header">
            <h6 class="title" style="padding-left: 1.8rem;"></h6>
            <ul class="nav nav-tabs col-12 hidden justify-content-end" style="margin-top:15px" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
            </ul>
        </div>
        <div class='separator'></div>
        <div class="search-body p-3" style="height: calc(75vh - 56px);position:sticky">
                    
        </div>
    </div>
    `;
    $('#content-bottom-sheet').html(content);

    $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
    var scrollsrc = document.querySelector('.search-body');
    var psscrollsrc = new PerfectScrollbar(scrollsrc);
    
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var datenow = (field['from'] == "" ? mm+"-"+yyyy : field['from']);
    var datenowto = (field['to'] == "" ? mm+"-"+yyyy : field['to']);

    switch(type){
        case '=':
            case '<=':
            var html = `<div class='row sama'>
                <div class='col-md-12' id='date-`+kunci+`' data-date='`+datenow+`'></div>
            </div>`;
            $('.search-body').html(html);
            $('#date-'+kunci).bootstrapDP({
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
            $('#date-'+kunci).on('changeDate', function() {
                $($target).val($('#date-'+kunci).bootstrapDP('getFormattedDate'));
                $($target).trigger('change');
                field[target2] = $('#date-'+kunci).bootstrapDP('getFormattedDate');
                field[target3] = $('#date-'+kunci).bootstrapDP('getFormattedDate');
                $('.c-bottom-sheet').removeClass('active');
            });
            break;
        case 'in':
            var html = `<div class='row in'>
                <input type='text' class='form-control col-md-12' id='inp_date-`+kunci+`-in'>
                <div class='col-md-12' id='date-`+kunci+`-in' data-date='`+datenow+`'></div>
                <div class='col-md-4 float-right'><button id='btn-ok-`+kunci+`-in' class='btn btn-primary'>OK</button></div>
            </div>`;
            $('.search-body').html(html);
            $('#date-'+kunci+'-in').bootstrapDP({
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                },
                multidate:true
            });
            $('#date-'+kunci+'-in').on('changeDate', function() {
                $('#inp_date-'+kunci+'-in').val(
                    $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate')
                );
            });
            $('div.in').on('click','#btn-ok-'+kunci+'-in',function(){
                $($target).val($('#date-'+kunci+'-in').bootstrapDP('getFormattedDate'));
                $($target).trigger('change');
                field[target2] = $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate');
                field[target3] = $('#date-'+kunci+'-in').bootstrapDP('getFormattedDate');
                $('.c-bottom-sheet').removeClass('active');
            });
            break;
        case 'range':
            var html = `<div class='row range'>
                <input type='text' class='form-control col-md-6' id='inp_date-`+kunci+`-from' value='`+datenow+`'>
                <input type='text' class='form-control col-md-6' id='inp_date-`+kunci+`-to' value='`+datenowto+`'>
                <div class='col-md-6' id='date-`+kunci+`-from' data-date='`+datenow+`'></div>
                <div class='col-md-6' id='date-`+kunci+`-to' data-date='`+datenowto+`'></div>
                <div class='col-md-4 float-right'><button id='btn-ok-`+kunci+`-range' class='btn btn-primary'>OK</button></div>
            </div>`;
            
            $('.search-body').html(html);
            $('#date-'+kunci+'-from').bootstrapDP({
                autoclose: true,
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
            $('#date-'+kunci+'-from').on('changeDate', function() {
                $('#inp_date-'+kunci+'-from').val(
                    $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate')
                );
            });
            $('#date-'+kunci+'-to').bootstrapDP({
                autoclose: true,
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                }
            });
            $('#date-'+kunci+'-to').on('changeDate', function() {
                $('#inp_date-'+kunci+'-to').val(
                    $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate')
                );
            });
            $('div.range').on('click','#btn-ok-'+kunci+'-range',function(){
                
                var tmp = $target.attr("id").split("-");
                $('#'+tmp[0]+'-from').val($('#date-'+kunci+'-from').bootstrapDP('getFormattedDate'));
                $('#'+tmp[0]+'-from').trigger('change');
                $('#'+tmp[0]+'-to').val($('#date-'+kunci+'-to').bootstrapDP('getFormattedDate'));
                $('#'+tmp[0]+'-to').trigger('change');
                field["from"] = $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate');
                field["fromname"] = $('#date-'+kunci+'-from').bootstrapDP('getFormattedDate');
                field["to"] = $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate');;
                field["toname"] = $('#date-'+kunci+'-to').bootstrapDP('getFormattedDate');;  
                $('.c-bottom-sheet').removeClass('active');
                onCloseBSheet(aktif,field,display);
            });
            break;
    }
    
    $('#trigger-bottom-sheet').trigger("click");
}

function onCloseBSheet(aktif,field,display){
    if(aktif != ""){

        field.type = "range";
        field.from = field.from;
        field.to = field.to;
        field.fromname =  field.fromname ;
        field.toname =  field.toname ;
        aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
        aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
        if(display == "nama"){
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
        }else if(display == "kodename"){
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from+' - '+field.fromname);
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to+' - '+field.toname);
        }else{
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from);
            aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to);
        }
        aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
        aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
        aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
        aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
    }
}
function generateRptFilter(id,settings){
    
    $(id+' .sai-rpt-filter-type').unbind('change');
    $(id+' .search-item').unbind('click');
    $(id+' .sai-rpt-filter-type ').bind('change', function(){
        var type = $(this).val();
        
        var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
        var field = eval('$'+kunci);
        var idx = settings.kode.indexOf(kunci);
        
        var target1 = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
        var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
        var tmp = tmp.split(" ");
        datepicker = tmp.includes("datepicker");
        datepicker1 = tmp.includes("datepicker1");
        switch(type){
            case "all":
                
                $aktif = '';
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                pilih = $('label[for="'+kunci+'"]').html();
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+pilih);
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').trigger('change');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                
                field.type = "all";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";
                
            break;
            case "=": 
            case "<=":
                
                $aktif = "";
                if(datepicker){
                    showRptDatePickerBSheet(settings,idx,target1,type,kunci);
                }else if(datepicker1){
                    showRptDatePickerBSheet2(settings,idx,target1,type,kunci);
                }else{
                    showRptFilterBSheet(settings,idx,target1);
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
            break;
            case "range":
                
                $aktif = $(this);
                if(datepicker){
                    showRptDatePickerBSheet(settings,idx,target1,type,kunci,$aktif);
                }else if(datepicker1){
                    showRptDatePickerBSheet2(settings,idx,target1,type,kunci,$aktif);
                }else{
                    showRptFilterBSheet(settings,idx,target1,"range",$aktif);
                }
                
            break;
            case "in":
                
                $aktif = '';
                
                if(datepicker){
                    showRptDatePickerBSheet(settings,idx,target1,type,kunci);
                }else if(datepicker1){
                    showRptDatePickerBSheet2(settings,idx,target1,type,kunci);
                }else{
                    showRptFilterBSheet(settings,idx,target1,"in");
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
                
            break;
        }
       
    });

    $(id+' .search-item').bind('click', function(){
        
        var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
        var idx = settings.kode.indexOf(kunci);
        var target1 = $(this).closest('.input-group').find('input');
        
        var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
        var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
        var datepicker = tmp.split(" ");
        if(datepicker.includes("datepicker")){
            showRptDatePickerBSheet(settings,idx,target1,type,kunci,$(this));
        }
        else if(datepicker.includes("datepicker1")){
            showRptDatePickerBSheet2(settings,idx,target1,type,kunci,$(this));
        }
        else{

            if(type == "in"){
                showRptFilterBSheet(settings,idx,target1,type);
            }else{
                showRptFilterBSheet(settings,idx,target1);
            }
        }

    });    

}


function setSelectValue(kode,nama,url,url_sesi,parameter,columns,display,default_value,type='normal'){
    $.ajax({
        type:"GET",
        url:url,
        data: parameter,
        dataType: "JSON",
        success: function(result){
            $("#"+kode+"-type").selectize();
            
            $('#'+kode+'-from').removeAttr("multiple");
            var select = $("#"+kode+"-from").selectize();
            select = select[0];
            var control = select.selectize;
            var field = eval('$'+kode);

            if(type == "in"){
                $('#'+kode+'-from').attr("multiple","multiple");
                control.destroy();
                var select = $("#"+kode+"-from").selectize({
                    maxItems: 5,
                    onChange: function(value) {
                        field.type = $("#"+kode+"-type")[0].selectize.getValue();
                        field.from = value;
                        field.to = "";
                        field.fromname = $("#"+kode+"-from option:selected").text();
                        field.toname = "";
                    }
                });
                select = select[0];
                var control = select.selectize;
            }else{
                $('#'+kode+'-from').removeAttr("multiple");
                control.destroy();
                var select = $("#"+kode+"-from").selectize({
                    onChange: function(value) {
                        field.type = $("#"+kode+"-type")[0].selectize.getValue();
                        field.from = value;
                        field.to = "";
                        field.fromname = $("#"+kode+"-from option:selected").text();
                        field.toname = "";
                    }
                });
                select = select[0];
                var control = select.selectize;
            }

            $('#'+kode+'-to').removeAttr("multiple");
            var select2 = $("#"+kode+"-to").selectize();
            select2 = select2[0];
            var control2 = select2.selectize;

            if(type == "in"){
                $('#'+kode+'-to').attr("multiple","multiple");
                control2.destroy();
                var select2 = $("#"+kode+"-to").selectize({
                    maxItems: 5,
                    onChange: function(value) {
                        field.type = $("#"+kode+"-type")[0].selectize.getValue();
                        field.from = field.from;
                        field.to = value;
                        field.fromname = field.fromname;
                        field.toname = $("#"+kode+"-to option:selected").text();
                    }
                });
                select2 = select2[0];
                var control2 = select2.selectize;
            }else{
                $('#'+kode+'-to').removeAttr("multiple");
                control2.destroy();
                var select2 = $("#"+kode+"-to").selectize({
                    onChange: function(value) {
                        field.type = $("#"+kode+"-type")[0].selectize.getValue();
                        field.from = field.from;
                        field.to = value;
                        field.fromname = field.fromname;
                        field.toname = $("#"+kode+"-to option:selected").text();
                    }
                });
                select2 = select2[0];
                var control2 = select2.selectize;
            }

            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    for(i=0;i<result.daftar.length;i++){
                        if(display == 'kode'){
                            control.addOption([{text:result.daftar[i][columns[0].data], value:result.daftar[i][columns[0].data]}]);
                            control2.addOption([{text:result.daftar[i][columns[0].data], value:result.daftar[i][columns[0].data]}]);
                        }else if(display == 'name'){
                            control.addOption([{text:result.daftar[i][columns[1].data], value:result.daftar[i][columns[0].data]}]);
                            control2.addOption([{text:result.daftar[i][columns[1].data], value:result.daftar[i][columns[0].data]}]);
                        }else if(display == 'kodename'){
                            control.addOption([{text:result.daftar[i][columns[0].data] +' - '+result.daftar[i][columns[1].data], value:result.daftar[i][columns[0].data]}]);
                            control2.addOption([{text:result.daftar[i][columns[0].data] +' - '+result.daftar[i][columns[1].data], value:result.daftar[i][columns[0].data]}]);
                        }
                    }

                    control.setValue(default_value);
                    control2.setValue(default_value);
                }                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location=url_sesi;
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

function generateRptFilterSelect(id,settings){
    
    $('.selectize').selectize();
    for(var i=0; i < settings.kode.length; i++){
        setSelectValue(settings.kode[i],settings.nama[i],settings.url[i],settings.url_sesi,settings.parameter[i],settings.columns[i],settings.display[i],settings.default_value[i]);
    }
    $(id+' .sai-rpt-filter-type').unbind('change');
    $(id+' .sai-rpt-filter-type ').bind('change', function(){
        var type = $(this).val();
        
        var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
        var field = eval('$'+kunci);
        var idx = settings.kode.indexOf(kunci);
        
        var target1 = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select');
        var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > select').last().attr('class');
        var tmp = tmp.split(" ");
        switch(type){
            case "all":
                
                $aktif = '';
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('hidden');
                pilih = $('label[for="'+kunci+'"]').html();
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select')[0].selectize.setValue('');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to select')[0].selectize.setValue('');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select').trigger('change');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                
                field.type = "all";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";
                
            break;
            case "=": 
            case "<=":
                
                $aktif = "";
                setSelectValue(settings.kode[idx],settings.nama[idx],settings.url[idx],settings.url_sesi,settings.parameter[idx],settings.columns[idx],settings.display[idx],settings.default_value[idx],"=");
                
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select')[0].selectize.setValue(field.fromname);
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                field.type = type;
                field.from = field.from;
                field.to = "";
                field.fromname = field.fromname;
                field.toname = "";
            break;
            case "range":
                
                $aktif = $(this);
                setSelectValue(settings.kode[idx],settings.nama[idx],settings.url[idx],settings.url_sesi,settings.parameter[idx],settings.columns[idx],settings.display[idx],settings.default_value[idx],"range");
                
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select')[0].selectize.setValue('');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
                
            break;
            case "in":
                
                $aktif = '';
                setSelectValue(settings.kode[idx],settings.nama[idx],settings.url[idx],settings.url_sesi,settings.parameter[idx],settings.columns[idx],settings.display[idx],settings.default_value[idx],"in");
                // showSelectRptFilter(settings,idx,target1,"in");
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from select')[0].selectize.setValue('');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                
                field.type = "in";
                field.from = "";
                field.to = "";
                field.fromname = "";
                field.toname = "";
                
            break;
        }
    
    });
}


function getKodeTW($bulan){
    switch($bulan){
        case '01':
        case '02':
        case '03':
            return "TW-I";
        break;
        case '04':
        case '05':
        case '06':
            return "TW-II";
        break;
        case '07':
        case '08':
        case '09':
            return "TW-III";
        break;
        case '10':
        case '11':
        case '12':
            return "TW-IV";
        break;
    }
}

function getNamaTW($bulan){
    switch($bulan){
        case '01':
        case '02':
        case '03':
        case 'TW-I':
            return "Triwulan I";
        break;
        case '04':
        case '05':
        case '06':
        case 'TW-II':
            return "Triwulan II";
        break;
        case '07':
        case '08':
        case '09':
        case 'TW-III':
            return "Triwulan III";
        break;
        case '10':
        case '11':
        case '12':
        case 'TW-IV':
            return "Triwulan IV";
        break;
    }
}

function getArrTW($bulan){
    switch($bulan){
        case '01':
        case '02':
        case '03':
        case 'TW-I':
            return ["Januari","Februari","Maret"];
        break;
        case '04':
        case '05':
        case '06':
        case 'TW-II':
            return ["April","Mei","Juni"];
        break;
        case '07':
        case '08':
        case '09':
        case 'TW-III':
            return ["Juli","Agustus","September"];
        break;
        case '10':
        case '11':
        case '12':
        case 'TW-IV':
            return ["Oktober","November","Desember"];
        break;
    }
}

function isiEdit(value, tipe, kode, view, defaultVal = false) {
    var hasil = "";
    switch (tipe) {
        case "number":
            hasil =
                value == "" || value == null || value == undefined ? 0 : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "text":
            hasil =
                value == "" || value == null || value == undefined
                    ? "-"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "cbbl":
            hasil =
                value == "" || value == null || value == undefined
                    ? "-"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            if (view) {
                $(kode).parent(".input-group").addClass("readonly");
            } else {
                $(kode).parent(".input-group").removeClass("readonly");
            }
            break;
        case "select":
            hasil =
                value == "" || value == null || value == undefined
                    ? defaultVal
                    : value;
            $(kode)[0].selectize.setValue(hasil);
            if (view) {
                $(kode)[0].selectize.lock();
            } else {
                $(kode)[0].selectize.unlock();
            }
            break;
        case "date":
            hasil =
                value == "" || value == null || value == undefined
                    ? "01/01/1990"
                    : value;
            $(kode).val(hasil);
            $(kode).prop("readonly", view);
            break;
        case "button":
            if (view) {
                $(kode).addClass("disabled");
            } else {
                $(kode).removeClass("disabled");
            }
            $(kode).prop("disabled", view);
            break;
    }
}

function showInfoField(kode, isi_kode, isi_nama) {
    $("#" + kode).val(isi_kode);
    $("#" + kode).attr(
        "style",
        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;color: #ffffff !important;"
    );
    $(".info-code_" + kode)
        .text(isi_kode)
        .parent("div")
        .removeClass("hidden");
    $(".info-code_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).removeClass("hidden");
    $(".info-name_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).css({ width: "68%", left: "30px" });
    $(".info-name_" + kode + " span").text(isi_nama);
    $(".info-name_" + kode)
        .closest("div")
        .find(".info-icon-hapus")
        .removeClass("hidden");
    resizeNameField(kode);
}

function removeInfoField(par) {
    $('#' + par).val('');
    $('#' + par).attr('style', 'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_' + par).parent('div').addClass('hidden');
    $('.info-name_' + par).addClass('hidden');
    $('#search_' + par).siblings('i').addClass('hidden');
}

function resizeNameField(kode) {
    var width = $('#' + kode).width() - $('#search_' + kode).width() - 10;
    var height = $('#' + kode).height();
    var pos = $('#' + kode).position();
    $('.info-name_' + kode).width(width).css({ 'left': pos.left, 'height': height });
}

$('.info-icon-hapus').click(function () {
    var par = $(this).closest('div').find('input').attr('name');
    $('#' + par).val('');
    $('#' + par).attr('readonly', false);
    $('#' + par).attr('style', 'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_' + par).parent('div').addClass('hidden');
    $('.info-name_' + par).addClass('hidden');
    $(this).addClass('hidden');
});

