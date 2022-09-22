<script type="text/javascript">
function drawLap(formData){
    $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
    // saiPostLoad('esaku-report/lap-kartu-stok', null, formData, null, function(res){
    //     if(res.result.length > 0){
    //         $('#pagination').html('');
    //         var show = $('#show').val();
    //         generatePaginationDore('pagination',show,res);        
    //     }else{
    //         $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
    //     }
    // });
}

drawLap($formData);


</script>