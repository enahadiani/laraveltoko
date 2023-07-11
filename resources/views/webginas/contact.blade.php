<section id="contact-info">
    <div class="center">                
        <h2 class="judul"></h2>
    </div>
    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="latitude" hidden></div>
                    <div class="longitude" hidden></div>
                    <div id="map" style="height:100%; width:100%; min-width:200px; min-height:300px;">
                    </div>
                </div>

                <br>

                <div class="col-sm-5 map-content">
                    <address>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
<script>
function loadKontak()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/kontak') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.kontak.length > 0)
            {
                var line = result.kontak[0];
                $('.latitude').html(line.latitude);
                $('.judul').html(line.judul);
                $('.longitude').html(line.longitude);
                $('.map-content address').html(line.keterangan);
            }

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadKontak();
initialize();
</script>
