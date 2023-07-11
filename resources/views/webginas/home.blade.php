<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner">
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->

<script>

function loadHome()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/home-data') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var html = '';
            var html2 = '';

            if(result.slider.length > 0)
            {
                for(var i=0; i<result.slider.length; i++){
                    var item = result.slider[i];
                    if(i == 0){
                        var sts = "active";
                    }else{
                        var sts = "";
                    }

                    html+="<li data-target='#main-slider' data-slide-to='"+i+"' class='"+sts+"'></li>";
                    var tmp = item.file_gambar.split("/");
                    var img = "{{ config('api.url') }}webginas/storage/"+tmp[3];

                    html2+=`
                        <div class='item `+sts+`' style='background-image: url(`+img+`)'>
                            <div style='background-color: rgba(0, 0, 0, 0.3); position: absolute; top: 0; left: 0; width: 100%; height: 100%;'></div>
                            <div class='container'>
                                <div class='row slide-margin'>
                                    <div class='col-sm-6 pull-right'>
                                        <div class='carousel-content'>
                                            <div align='right'>
                                                <h1 class='animation animated-item-1'> `+item.nama+`</h1>
                                                <h2 class='animation animated-item-2'> `+item.keterangan+`</h2>
                                            </div>
                                            <a class='btn-slide animation animated-item-3 pull-right' href='#'>Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
            $('.carousel-indicators').html(html);
            $('.carousel-inner').html(html2);

            $('#main-slider.carousel').carousel({
                interval: 8000
            });
           

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadHome();
</script>
