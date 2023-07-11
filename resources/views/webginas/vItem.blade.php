
    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <div class='row' style='margin-bottom:15px;'>
                            <div class='col-xs-12 col-sm-2 text-center'>
                                <div class='entry-meta'>
                                    <span id='publish_date'></span>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-10'>
                                <h2 style='margin-top:5px;'><a href='#' id="judul"></a></h2>
                            </div>
                        </div>

                        <div id="videoimage"></div>
                        
                        <div class="row">  
                            <div class="col-xs-12 col-sm-12 blog-content">
                            </div>
                        </div>
                    </div><!--/.blog-item-->
                </div>
                
                <aside class="col-md-4">
                    <div class="widget search">
                        <form role="form" id="form-search" method='GET'>
                            <input type="text" name='str' class="form-control search_box" autocomplete="on" placeholder="Search" required>
                        </form>
                    </div>
                    <div class="widget categories">
                        <h3>Categories</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.categories-->
                
                    <div class="widget archieve">
                        <h3>Archive</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                </ul>
                            </div>
                        </div>                     
                    </div>
                </aside>  
            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->
@php
if(isset($id)){
    $id = $id;
}else{
    $id = 1;
}
@endphp
<script>
    var $nid = "{{ $id }}";
    // function generateSEO(id, judul)
    // {
    //     seo = judul.toLowerCase().replace(" ","-");
    //     seo = seo.replace(["(",")","'","/","'\'",':','"',',','?','%'], "");
    //     return id+"/"+seo;
    // }

    function ucfirst(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    function removeTags(str) {
        if ((str===null) || (str===''))
        return false;
        else
        str = str.toString();
        return str.replace( /(<([^>]+)>)/ig, '');
    }

    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }

    function reverseDate(date_str, separator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+separator+str[1]+separator+str[0];
    }

     // template corlate only
    function generateWebPaging(sub_url, data_array_count, item_per_page=5, active_page_number=1, protection=true)
    {
        // protect
        var page = Math.ceil(data_array_count/item_per_page);
        if(protection){
            if(active_page_number > page){
                // redirect(sub_url);
            }
        }
        
        var list = (active_page_number > 1 ? "<li><a href='#' data-href='"+sub_url+(active_page_number - 1)+"'><i class='fa fa-long-arrow-left'></i>Previous Page</a></li>" : "");

        for(var i=1; i <= page; i++)
        {
            list += (i == active_page_number ? "<li class='active'><a href='#' data-href='#'>"+i+"</a></li>" : "<li><a href='#' data-href='"+sub_url+""+i+"'>"+i+"</a></li>");
        }

        list += (active_page_number < page ? "<li><a href='#' data-href='"+sub_url+(parseInt(active_page_number) + 1)+"'>Next Page<i class='fa fa-long-arrow-right'></i></a></li>" : "");

        var html = "<ul class='pagination pagination-lg pageControl'>"+list+"</ul>";
        return html;
    }

    function loadReadItem($nid)
    {
        if($nid == undefined){
            $nid = 1;
        }else{
            $nid = $nid;
        }

        $.ajax({
            type: 'GET',
            url: "{{ url('webginas/readitem') }}/"+$nid,
            dataType: 'json',
            async:false,
            success:function(res)
            {
                var html ='';
                var result = res[0];
                if(result.artikel.length > 0)
                {
                    var line = result.artikel[0];
                    $('#publish_date').html(reverseDate(line.tgl_input));
                    $('#judul').html(line.judul);
                    var arr = line.file_type.split("/");

                    var img = '';

                    var tmp = line.header_url.split("/");
                    var header_url = "{{ config('api.url') }}webginas/storage/"+tmp[3];

                    if(arr[0] == 'video'){
                        img +="<video controls  style='min-width:200px; min-height:200px; display:block; margin-left: auto; margin-right: auto;'><source src='"+header_url+"' type='"+line.file_type+"'></video>";
                    }else{
                        img +="<img class='img-responsive img-blog' src='"+header_url+"' width='100%' alt='' />";
                    }
                    
                    $('#videoimage').html(img);
                    html += line.keterangan + `<div class="post-tags">`;
                    var str = '';
                    if(line.tag != undefined){

                        var tag = line.tag.split(',');
                        str += "<a href='/webginas/search/all/tag/?str="+tag[0].toLowerCase()+"'>"+ucfirst(tag[0].toLowerCase())+"</a> ";
                        for(var i=1; i<tag.length; i++){
                            str += "/<a href='/webginas/search/all/tag/?str="+tag[i].toLowerCase()+"'>"+ucfirst(tag[i].toLowerCase())+"</a> ";
                        }
                    }
                    html+= `<strong>Tag:</strong>`+str+`
                    </div>`;

                    var categori = '';
                    if(result.categories.length > 0){

                        for(var i=0; i<result.categories.length;i++)
                        {
                            var cat = result.categories[i];
                            categori += "<li><a href='webginas/search/all/categories/?str="+cat.kode_kategori+"'>"+cat.nama+" <span class='badge'>"+cat.jml+"</span></a></li>";
                        }
                    }
                    
                    $('.blog_category').html(categori);

                    var archive = '';
                    if(result.archive.length > 0){

                        for(var i=0; i<result.archive.length;i++)
                        {
                            var arc = result.archive[i];
                            archive += "<li><a href='webginas/article/1/'"+arc.bulan+"'/'"+arc.tahun+"'><i class='fa fa-angle-double-right'></i> "+getNamaBulan(arc.bulan)+""+arc.tahun+"<span class='pull-right'>("+arc.jml+")</span></a></li>";
                        }
                    }
                    $('.blog_archieve').html(archive);
                }
                $('.blog-content').html(html);

            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }

    loadReadItem($nid);

    $('.pageControl,.blog_archieve,.blog-content,.blog_category').on('click','a',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        var url = form;
        if(form == "" || form == "-"){
            return false;
        }else{
            loadForm(url);
            
        }
    });

    $('#form-search').submit(
        function(e){
        e.preventDefault();
    });

    $('.search_box').change(function(e){
        var str = $('.search_box').val();
        var url = "webginas/news-search/?str="+str;
        loadForm(url);
    });

    $('.search_box').keydown(function(e){
        if(e.which == 13) 
        {
            e.preventDefault();
            
            var str = $('.search_box').val();
            var url = "webginas/news-search/?str="+str;

            loadForm(url);
        }
    });

    
</script>
