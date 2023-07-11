(function ( $ ) {
    var defaults = {}, options = $.extend({}, defaults, options);
    function showFilter(options){
        var settings = {
            title:'',
            header:[],
            columns:[],
            url:'',
            parameter:{},
            onItemSelected:null
        }
        
        $.extend(settings, options);
        var header_html = '';
        for(i=0; i < settings.header.length; i++){
            header_html +=  "<th>"+settings.header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);
        var target_cek = settings.header.length;
        var searchTable = $("#table-search").DataTable({
            "select": true,
            "ajax": {
                "url": settings.url,
                "data": settings.parameter,
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": target_cek, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': settings.columns
            // "iDisplayLength": 25,
        });

        $('#table-search tbody').find('tr:first').toggleClass('selected');
        $('#modal-search .modal-title').html(settings.title);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        if (settings.onItemSelected != null) {
            
            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).toggleClass('selected');
                }
            });

            $('#table-search').on('click','.check-item',function(){
                var select_data = searchTable.row($(this).parents('tr')).data();
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, select_data);
                }
                $('#modal-search').modal('hide');
            });
    
            $('#table-search tbody').on('dblclick','tr',function(){
                
                var select_data = searchTable.row(this).data();
                if (typeof settings.onItemSelected === "function") {
                    settings.onItemSelected.call(this, select_data);
                }
                $('#modal-search').modal('hide');
            });

            $('#modal-search').keydown(function(e) {
                $('input[type=search]').unbind("keydown");
                var selectRow = $('.selected').index();
                var jumRow = $('.selected').parents('table').find('tbody tr').length;
                var last = false;
                var first = false;
                if(selectRow == 0){
                    first = true;
                    last = false;
                }else if(selectRow == (jumRow - 1)){
                    first = false;
                    last = true;
                }else{
                    first = false;
                    last = false;
                }
                var tr = searchTable.$('tr.selected');
                if (e.keyCode == 40){ 
                    e.preventDefault();
                    //arrow down
                    if(!last){
                        tr.removeClass('selected');
                        tr.next().toggleClass('selected');
                    }else{
                        if($('#table-search_next').hasClass('disabled')){
                            return false;
                        }
                        tr.removeClass('selected');
                        $('#table-search_next').click();
                        $('#table-search tbody').find('tr:first').toggleClass('selected');
                    }
                }
                if (e.keyCode == 38){ //arrow up
                    
                    e.preventDefault();
                    if(!first){
                        
                        tr.removeClass('selected');
                        tr.prev().toggleClass('selected');
                    }else{
                        if($('#table-search_previous').hasClass('disabled')){
                            return false;
                        }
                        tr.removeClass('selected');
                        $('#table-search_previous').click();
                        $('#table-search tbody').find('tr:last').toggleClass('selected');
                    }
                }
    
                if (e.keyCode == 13){
                    
                    e.preventDefault();
                    console.log(searchTable.row('.selected').index());
                    var select_data = searchTable.row('.selected').data();
                    if (typeof settings.onItemSelected === "function") {
                        settings.onItemSelected.call(this, select_data);
                    }
                    $('#modal-search').modal('hide');
                }
            })
        }

        
    }

    $.fn.inputSearch = function( options ) {
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
            $(this).click(function () {
                showFilter(settings);
            });
        });
    };
 
}( jQuery ));
