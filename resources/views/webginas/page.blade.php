<section>
    <div class="container">
		<div class='row'>
            <div class='col-md-12'>
                <center>
                    <h2 class="text-primary" id="judul"></h2>
                </center>
            </div>
			<div class='col-md-12'>
                <hr style="margin-center: 0;text-align: left;width: 50%;"/>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-6' id="header_url">
            </div>
            <div class='col-md-6'>
                <div class="row" style="text-align: justify; text-justify: inter-word;" id="keterangan">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var page = "{{ $page }}";
function loadPage()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webginas/page') }}/"+page,
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.page.length > 0)
            {
                var line = result.page[0];
                $('#judul').html(line.judul);
                var tmp = line.header_url.split("/");
                var img = "{{ config('api.url') }}webginas/storage/"+tmp[3];
                $('#header_url').html(`<center>
                    <img src='`+img+`' class='img-responsive'>
                </center>`);
                $('#keterangan').html(line.keterangan);
            }

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadPage();
</script>