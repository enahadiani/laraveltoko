(function ( $ ) {
 
    $.fn.labelEdit = function( options ) {
 
        // Default options
        var settings = $.extend({
            param: '',
            target1:'',
            target2:'',
            url:"{{ url('saku/nikperiksa') }}",
            columns:[
                { data: 'kode_pp'},
                { data: 'nama'},
            ],
            button: `<a href='#' class='search-item' style='position: absolute;z-index: 2;margin-top: 10px;margin-left:5px'><i class='fa fa-search' style='font-size: 18px;'></i></a>`,
            label: `<label id="label_nik" style="margin-left:20px"></label>`
        }, options );
        
        // Apply options
        return this.append('Hello ' + settings.name + '!');
 
    };
 
}( jQuery ));