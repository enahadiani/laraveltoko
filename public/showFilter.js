(function ( $ ) {
    var defaults = {}, options = $.extend({}, defaults, options);
    function showFilter(options){
        var settings = {
            title:'',
            header:[],
            width:[],
            columns:[],
            url:'',
            parameter:{},
            orderBy:[],
            onItemSelected:null
        }
        
        $.extend(settings, options);
        var header_html = '';
        for(i=0; i < settings.header.length; i++){
            header_html +=  "<th style='width:"+settings.width[i]+"'>"+settings.header[i]+"</th>";
        }

        var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";
        console.log(settings.parameter);
        $('#modal-search .modal-body').html(table);
        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                "url": settings.url,
                "data": settings.parameter,
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            order:settings.orderBy,
            'columns': settings.columns,
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

                    var select_data = searchTable.row(this).data();
                    if (typeof settings.onItemSelected === "function") {
                        settings.onItemSelected.call(this, select_data);
                    }
                    $('#modal-search').modal('hide');
                }
            });

        }

        
    }

    $.fn.showFilter = function( options ) {
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
            $(this).on('click', '.simple-icon-magnifier', function(){
                // console.log(settings);
                showFilter(settings);
            }); 
        });
    };
 
}( jQuery ));
