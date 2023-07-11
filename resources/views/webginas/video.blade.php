    <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Video Gallery</h2>
               <p class="lead">Memories are the elements of time</p>
            </div>
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

function loadVideo()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/video-data') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var html = '';
            if(result.daftar_video.length > 0)
            {
                for(var i=0, dtlength=result.daftar_video.length;i<dtlength;i++){
                    var line = result.daftar_video[i];
                    // var tmp = line.file_gambar.split("/");
                    // var video = "{{ config('api.url') }}webginas/storage/"+tmp[3];
                    var tmp = line.link.split("?");
                    tmp = tmp[1].split("=");
                    var link = tmp[1];
                    
                    var watch = "{{ url('webginas/watch') }}/"+line.id;
                    html+=`
                        <div class='portfolio-item apps col-xs-12 col-sm-4 col-md-3'>
                            <div class='recent-work-wrap'>
                                <iframe class='img-responsive' src='https://www.youtube.com/embed/`+link+`'></iframe> 
                                <div class='overlay'>
                                    <div class='recent-work-inner'>
                                        <p>`+line.judul+`</p>
                                        <p>`+cutDate(line.tgl_input)+`</p>
                                        <a href='#' data-href="`+watch+`" style='color:white;'><i class='fa fa-eye'></i> Watch</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    `;
                }
            }

            if(result.daftar_video_new.length > 0)
            {
                for(var i=0, dtlength=result.daftar_video_new.length;i<dtlength;i++){
                    var line = result.daftar_video[i];
                    var tmp = line.link.split("?");
                    tmp = tmp[1].split("=");
                    var link = tmp[1];
                    var watch = "{{ url('webginas/watch') }}/"+line.id;
                    html+=`
                        <div class='portfolio-item apps col-xs-12 col-sm-4 col-md-3'>
                            <div class='recent-work-wrap'>
                                <iframe class='img-responsive' src='https://www.youtube.com/embed/`+link+`'></iframe> 
                                <div class='overlay'>
                                    <div class='recent-work-inner'>
                                        <p>`+line.judul+`</p>
                                        <p>`+cutDate(line.tgl_input)+`</p>
                                        <a href='#' data-href="`+watch+`" style='color:white;'><i class='fa fa-eye'></i> Watch</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
            $('.portfolio-items').html(html);
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

loadVideo();

$('.recent-work-inner').on('click','a',function(e){
    e.preventDefault();
    var form = $(this).data('href');
    var url = form;
    console.log(url);
    if(form == "" || form == "-"){
        return false;
    }else{
        loadForm(url);
        
    }
});
</script>