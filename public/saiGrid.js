(function ( $ ) {

    function hitungTotalRow(id){
        var total_row = $('#'+id+' tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        number = number.replace(',', '.');
        return +number;
    }

    function hitungTotal(settings){
        var total_d = 0;
        var total_k = 0;

        $('.row-'+settings.id).each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        if(settings.target1 != undefined){
            $('#'+settings.target1).val(total_d);    
        }
        if(settings.target2 != undefined){
            $('#'+settings.target2).val(total_k);  
        } 
    }

    function addRowGrid(settings) {
        var no=$('#'+settings.id+' .row-'+settings.id+':last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-"+settings.id+"'>";
        input += "<td class='no-"+settings.id+" text-center'><span class='no-"+settings.id+"'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        for(var i=0;i < settings.columns.length; i++){
            var kode = settings.columns[i];
            switch(settings.tipe[i]){
                case 'text' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name="+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+" ></td>";
                break;
                case 'textarea' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><textarea name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+"></textarea></td>";
                break;
                case 'number' :
                    input += "<td class='text-right'><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='' "+settings.attr[i]+"></td>";
                break;
                case 'select' :
                    var options = "";
                    if(settings.options[i].length > 0){
                        for(var x=0; x < settings.options[i].length; x++){
                            options += "<option value='"+settings.options[i][x].value+"'>"+settings.options[i][x].text+"</option>";
                        }
                    }
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><select hidden name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+"' value='' "+settings.attr[i]+">"+options+"</select></td>";
                break;
                case 'search' :
                    input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'></span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden' value='' "+settings.attr[i]+" style='z-index: 1;position: relative;'  id='akunkode"+no+"' "+settings.attr[i]+"><a href='#' class='search-item search-"+kode+" search-"+kode+"ke"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                break;
            }
        }
        input += "</tr>";

        $('#'+settings.id+' tbody').append(input);
        $('.row-'+settings.id+':last').addClass('selected-row');
        $('#'+settings.id+' tbody tr').not('.row-'+settings.id+':last').removeClass('selected-row');

        for(var i=0;i < settings.columns.length; i++){
            switch(settings.tipe[i]){
                case 'text' :
                case 'textarea' :
                break;
                case 'number' :
                    $('.'+settings.columns[i]+'ke'+no).inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                break;
                case 'select' :
                    $('.'+settings.columns[i]+'ke'+no).selectize({
                        selectOnTab:true,
                        onChange: function(value) {
                            $('.td'+settings.columns[i]+'ke'+no).text(value);
                            hitungTotal(settings);
                        }
                    });
                    $('.selectize-control.'+settings.columns[i]+'ke'+no).hide();
                break;
                case 'search' :
                    $('#'+settings.columns[i]+'ke'+no).typeahead({
                        source: eval('$dt'+settings.columns[i]),
                        displayText:function(item){
                            return item.id+' - '+item.name;
                        },
                        autoSelect:false,
                        changeInputOnSelect:false,
                        changeInputOnMove:false,
                        selectOnBlur:false,
                        afterSelect: function (item) {
                            console.log(item.id);
                        }
                    });
                break;
            }
        }        

        switch(settings.tipe[0]){
            case 'search' :
                $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".td-"+settings.columns[0]).hide();
                $('#'+settings.id+' tbody tr:last').find(".search-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).focus();
            break;
            default :
                $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).show();
                $('#'+settings.id+' tbody tr:last').find(".td-"+settings.columns[0]).hide();
                $('#'+settings.id+' tbody tr:last').find(".inp-"+settings.columns[0]).focus();
            break;

        }

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        hitungTotalRow(settings.id);
        hideUnselectedRow(settings);
    }

    function hideUnselectedRow(settings) {
        $('#'+settings.id+' > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {

                for( var i =0; i < settings.columns.length ; i++){
                    eval('var '+settings.columns[i]+' = "'+$('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val()+'" ');

                    if(settings.tipe[i] == 'select'){
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i])[0].selectize.setValue(eval(settings.columns[i]));
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                    }else if(settings.tipe[i] == 'search'){
                        
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val(kode_akun);
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".search-"+settings.columns[i]).hide();
                    }else{
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).val(kode_akun);
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));

                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".inp-"+settings.columns[i]).hide();
                        $('#'+settings.id+' > tbody > tr:eq('+index+') > td').find(".td-"+settings.columns[i]).show();
                    }
    
                }
               
            }
        })
    }

    function showSelectedColumn(id,tipe,kolom,no){
        if(tipe == 'select'){
            $('#'+id+' tbody').find(".selectize-control."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find("."+kolom+"ke"+no)[0].selectize.focus();
        }else if(tipe == 'search') {
            $('#'+id+' tbody').find("."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".search-"+kolom+"ke"+no).show();
            $('#'+id+' tbody').find("."+kolom+"ke"+no).trigger('focus');
        }else{
            $('#'+id+' tbody').find("."+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find("."+kolom+"ke"+no).trigger('focus');
        }

    }

    function hideUnSelectedColumn(id,tipe,kolom,no){
        if(tipe == 'select'){
            $('#'+id+' tbody').find(".selectize-control."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
        }else if(tipe == 'search') {
            $('#'+id+' tbody').find("."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
            $('#'+id+' tbody').find(".search-"+kolom+"ke"+no).hide();
        }else{
            $('#'+id+' tbody').find("."+kolom+"ke"+no).hide();
            $('#'+id+' tbody').find(".td"+kolom+"ke"+no).show();
        }

    }
    
    $.fn.saiGrid = function( options ) {
       
        var settings = options;
        return this.each(function() {
            
            $(this).on('click', '.add-row', function(){
                addRowGrid(settings);
            }); 

            $('#'+settings.id).on('keydown',"input",function(e){
                var code = (e.keyCode ? e.keyCode : e.which);
                var nxt = settings.columns;
                var nxt2 = settings.columns;
                if (code == 13 || code == 9) {
                    e.preventDefault();
                    var idx = $(this).closest('td').index()-2;
                    var idx_next = idx+1;
                    var kunci = $(this).closest('td').index()+1;
                    var isi = $(this).val();
                    for(var i=0; i < settings.columns.length; i++){
                        var tipe = settings.tipe[i];
                        var tipenext = ( settings.tipe[i+1] != undefined ? settings.tipe[i+1] : '') ;

                        switch (tipe) {
                            case 'search':
                                var noidx = $(this).parents("tr").find("span.no-"+settings.id).text();
                                var kode = $(this).val();
                                var target1 = (settings.target[i][0] != '' ? settings.target[i][0]+"ke"+noidx : '');
                                var target2 = (settings.target[i][1] != '' ? settings.target[i][1]+"ke"+noidx : '');
                                var target3 = (settings.target[i][2] != '' ? settings.target[i][2]+"ke"+noidx : '');
                                getData(kode,settings.url[i],target1,target2,target3,'tab');                    
                            break;
                            case 'select':
                                var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).parents("tr").find('.inp-'+nxt[idx])[0].selectize.setValue(isi);
                                $(this).parents("tr").find('.td-'+nxt2[idx]).text(isi);
                                $(this).parents("tr").find(".selectize-control").hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();
                            break;
                            case 'text':
                            case 'textarea' :
                            if($.trim($(this).val()).length){
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).closest('tr').find('.inp-'+nxt[idx]).val(isi);
                                $(this).closest('tr').find('.td-'+nxt2[idx]).text(isi);
                                $(this).closest('tr').find('.inp-'+nxt[idx]).hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();
                            }else{
                                alert('Text yang dimasukkan tidak valid');
                                return false;
                            }
                            break;
                            case 'nilai':
                            if(isi != "" && isi != 0){
                                $("#'+settings.id+' td").removeClass("px-0 py-0 aktif");
                                $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                                $(this).closest('tr').find('.inp-'+nxt[idx]).val(isi);
                                $(this).closest('tr').find('.td-'+nxt2[idx]).text(isi);
                                $(this).closest('tr').find('.inp-'+nxt[idx]).hide();
                                $(this).closest('tr').find('.td-'+nxt2[idx]).show();

                                hitungTotal(settings);
                            }else{
                                alert('Nilai yang dimasukkan tidak valid');
                                return false;
                            }
                            break; 
                            default:
                            break;
                        }

                        if(tipenext != ''){
                            
                            switch(tipenext){
                                case 'search':
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).trigger('focus');
                                    $(this).closest('tr').find('.search-'+nxt2[idx_next]).show();
                                break;
                                case 'select':
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).parents("tr").find(".selectize-control").show();
                                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                                break;
                                default :
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).show();
                                    $(this).closest('tr').find('.td-'+nxt2[idx_next]).hide();
                                    $(this).closest('tr').find('.inp-'+nxt[idx_next]).trigger('focus');
                                break;
                            }
                        }

                        if(i == (settings.columns.length-1)){
                            var cek = $(this).parents('tr').next('tr').find('.td-'+settings.columns[0]);
                            if(cek.length > 0){
                                cek.trigger('click');
                            }else{
                                $('.add-row').trigger('click');
                            }
                        }
                    }

                }else if(code == 38){
                    e.preventDefault();
                    var idx = nxt.indexOf(e.target.id);
                    idx--;
                }
            });

            $('#'+settings.id+' tbody').on('click', 'tr', function(){
                $(this).addClass('selected-row');
                $('#'+settings.id+' tbody tr').not(this).removeClass('selected-row');
                hideUnselectedRow(settings);
            });

            $('#'+settings.id).on('click', 'td', function(){
                var idx = $(this).index();
                if(idx == 0){
                    return false;
                }else{
                    if($(this).hasClass('px-0 py-0 aktif')){
                        return false;            
                    }else{
                        $('#'+settings.id+' td').removeClass('px-0 py-0 aktif');
                        $(this).addClass('px-0 py-0 aktif');
                        var no = $(this).parents("tr").find("span.no-"+settings.id).text();
                        var urut = 2;
                        for( var i =0; i < settings.columns.length ; i++){
                            if(settings.tipe[i] != 'select'){
                                eval('var '+settings.columns[i]+' = "'+$(this).parents("tr").find(".inp-"+settings.columns[i]).val()+'" ');

                                $(this).parents("tr").find(".inp-"+settings.columns[i]).val(eval(settings.columns[i]));
                                $(this).parents("tr").find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));
                            }else{
                                eval('var '+settings.columns[i]+' = "'+$(this).parents("tr").find(".td-"+settings.columns[i]).text()+'" ');
                                $(this).parents("tr").find(".inp-"+settings.columns[i])[0].selectize.setValue(eval(settings.columns[i]));
                                $(this).parents("tr").find(".td-"+settings.columns[i]).text(eval(settings.columns[i]));
                            }

                            if(idx == urut){
                                showSelectedColumn(settings.id,settings.tipe[i],settings.columns[i],no);
                            }else{
                                hideUnSelectedColumn(settings.id,settings.tipe[i],settings.columns[i],no);
                            }
                            urut++;
                        }
                        hitungTotal(settings);
                    }
                }
            });
        
            // COPY ROW //
            $('.nav-control').on('click', '#copy-row', function(){
                if($(".selected-row").length != 1){
                    alert('Harap pilih row yang akan dicopy terlebih dahulu!');
                    return false;
                }else{

                    var no=$('#'+settings.id+' .row-'+settings.id+':last').index();
                    no=no+2;
                    var input = "";
                    input += "<tr class='row-"+settings.id+"'>";
                    input += "<td class='no-"+settings.id+" text-center'><span class='no-"+settings.id+"'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
                    input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";

                    for( var i =0; i < settings.columns.length ; i++){
                        if(settings.tipe[i] != 'select'){
                            eval('var '+settings.columns[i]+' = "'+$('#'+settings.id+' tbody tr.selected-row').find(".inp-"+settings.columns[i]).val()+'" ');
                        }else{
                            eval('var '+settings.columns[i]+' = "'+$('#'+settings.id+' tbody tr.selected-row').find(".td-"+settings.columns[i]).text()+'" ');
                        }

                        var kode = settings.columns[i];
                        switch(settings.tipe[i]){
                            case 'text' :
                                input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'>"+eval(kode)+"</span><input autocomplete='off' type='text' name="+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='"+eval(kode)+"' "+settings.attr[i]+" ></td>";
                            break;
                            case 'textarea' :
                                input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'>"+eval(kode)+"</span><textarea name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='"+eval(kode)+"' "+settings.attr[i]+">"+eval(kode)+"</textarea></td>";
                            break;
                            case 'number' :
                                input += "<td class='text-right'><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'>"+eval(kode)+"</span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden'  value='"+eval(kode)+"' "+settings.attr[i]+">"+eval(kode)+"</td>";
                            break;
                            case 'select' :
                                var options = "";
                                if(settings.options[i].length > 0){
                                    for(var x=0; x < settings.options[i].length; x++){
                                        options += "<option value='"+settings.options[i][x].value+"'>"+settings.options[i][x].text+"</option>";
                                    }
                                }
                                input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'>"+eval(kode)+"</span><select hidden name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+"' value='' "+settings.attr[i]+">"+options+"</select></td>";
                            break;
                            case 'search' :
                                input += "<td><span class='td-"+kode+" td"+kode+"ke"+no+" tooltip-span'>"+eval(kode)+"</span><input type='text' name='"+kode+"[]' class='form-control inp-"+kode+" "+kode+"ke"+no+" hidden' value='"+eval(kode)+"' "+settings.attr[i]+" style='z-index: 1;position: relative;'  id='akunkode"+no+"' "+settings.attr[i]+"><a href='#' class='search-item search-"+kode+" search-"+kode+"ke"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            break;
                        }
                        
                    }

                    input += "</tr>";
                    $('#'+settings.id+' tbody').append(input);

                    for(var i=0;i < settings.columns.length; i++){
                        switch(settings.tipe[i]){
                            case 'text' :
                            case 'textarea' :
                            break;
                            case 'number' :
                                $('.'+settings.columns[i]+'ke'+no).inputmask("numeric", {
                                    radixPoint: ",",
                                    groupSeparator: ".",
                                    digits: 2,
                                    autoGroup: true,
                                    rightAlign: true,
                                    oncleared: function () { self.Value(''); }
                                });
                            break;
                            case 'select' :
                                $('.'+settings.columns[i]+'ke'+no).selectize({
                                    selectOnTab:true,
                                    onChange: function(value) {
                                        $('.td'+settings.columns[i]+'ke'+no).text(value);
                                        hitungTotal(settings);
                                    }
                                });
                                $('.'+settings.columns[i]+'ke'+no).val(eval(settings.columns[i]));
                                $('.selectize-control.'+settings.columns[i]+'ke'+no).hide();
                            break;
                            case 'search' :
                                $('#'+settings.columns[i]+'ke'+no).typeahead({
                                    source: eval('$dt'+settings.columns[i]),
                                    displayText:function(item){
                                        return item.id+' - '+item.name;
                                    },
                                    autoSelect:false,
                                    changeInputOnSelect:false,
                                    changeInputOnMove:false,
                                    selectOnBlur:false,
                                    afterSelect: function (item) {
                                        console.log(item.id);
                                    }
                                });
                            break;
                        }
                    }   
                    hitungTotal(settings);
                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    })
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                }
        
            });
            // END COPY ROW //
        
            // DELETE ROW //
            $('#'+settings.id+'').on('click', '.hapus-item', function(){
                $(this).closest('tr').remove();
                no=1;
                $('.row-'+settings.id).each(function(){
                    var nom = $(this).closest('tr').find('.no-'+settings.id);
                    nom.html(no);
                    no++;
                });
                hitungTotal(settings);
                hitungTotalRow(settings.id);
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            });
            // END DELETE ROW //

        });
    };
 
}( jQuery ));
