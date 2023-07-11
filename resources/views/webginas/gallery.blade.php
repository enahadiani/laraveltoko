<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>Gallery</h2>
            <p class="lead">Memories are the elements of time</p>
        </div>
        <ul class="portfolio-filter text-center">
        </ul>

        <div class="row">
            <div class="portfolio-items">
            </div>
        </div>
    </div>
</section><!--/#portfolio-item-->
<script>
function cutDate(datetime){
    var str = datetime.split(" ");
    return str[0];
}

function loadGallery()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/gallery') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var html = '';
            if(result.daftar_kategori.length > 0)
            {
                html +=`<li><a class='btn btn-default active' href='#' data-filter='*'>Semua Kategori</a></li>`;
                for(var i=0;i<result.daftar_kategori.length;i++)
                {
                    var line = result.daftar_kategori[i];
                    html +="<li><a class='btn btn-default' style='border:1px solid black;' href='#' data-filter='."+line.kode_ktg+"'>"+line.nama+"</a></li>";
                }
            }
            $('.portfolio-filter').html(html);

            var html='';
            if(result.daftar_gambar.length > 0)
            {
                for(var i=0;i<result.daftar_gambar.length;i++)
                {
                    var line = result.daftar_gambar[i];
                    
                    var tmp = line.file_gambar.split("/");
                    var img = "{{ config('api.url') }}webginas/storage/"+tmp[3];
                    html+=`
                    <div class='portfolio-item `+line.nama_ktg+` col-xs-12 col-sm-4 col-md-3'>
                                <div class='recent-work-wrap'>
                                    <div style='height:250px; background-image: url(`+img+`); background-repeat:no-repeat; background-size:cover;'></div>
                                    <div class='overlay'>
                                        <div class='recent-work-inner'>
                                            <h3><a href='#'>`+cutDate(line.tgl_input)+`</a></h3>
                                            <p>".$gambar["keterangan"]."</p>
                                            <a class='preview' href='`+img+`' rel='prettyPhoto'><i class='fa fa-eye'></i> View</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                    `;
                }
            }
            
            $('.portfolio-items').html('<center>'+html+'</center>');
            var $portfolio_selectors = $('.portfolio-filter >li>a');
            var $portfolio = $('.portfolio-items');
            $portfolio.isotope({
                itemSelector : '.portfolio-item',
                layoutMode : 'fitRows'
            });
            
            $portfolio_selectors.on('click', function(){
                $portfolio_selectors.removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $portfolio.isotope({ filter: selector });
                return false;
            });

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadGallery();
</script>