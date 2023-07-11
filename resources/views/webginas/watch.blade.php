<section>
    <div class="container">
        <div class="center">
            <h2 id="judul"></h2>
            <p class="lead">
            By Admin
            </p>
        </div>

        <div class="row" id="content-video">
            <center>
               
            </center>
        </div>

        <br><br>
        
        <div class="row" id="keterangan" style="text-align: justify; text-justify: inter-word; width:95%;">
            <center>
            </center>
        </div>
    </div>
</section>
@php
if(isset($id)){
    $id = $id;
}else{
    $id = null;
}
@endphp
<script>
    var $nid = "{{ $id }}";
    console.log($nid);
function cutDate(datetime)
{
    var str = datetime.split(" ");
    return str[0];
}

function loadWatch($nid)
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/watch-data') }}",
        dataType: 'json',
        data: { id: $nid },
        async:false,
        success:function(result)
        {
            var html = '';
            if(result.video.length > 0)
            {
                var line = result.video[0];
                if(line.file_type == 'youtube'){

                    var tmp = line.link.split("?");
                    tmp = tmp[1].split("=");
                    var link = tmp[1];
                }
                $('#judul').html(line.judul);
                $('#keterangan center').html(line.keterangan);
                html+="<iframe width='90%' height='50%' style='width:80%; height:50%; min-height:280px; min-width:280px; max-width:560px;' src='"+(line.file_type == 'youtube' ? "https://www.youtube.com/embed/"+link : line.link )+"'></iframe>";
            }
            $('#content-video center').html(html);

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    })
}

loadWatch($nid);
</script>