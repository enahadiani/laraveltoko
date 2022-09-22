<style>
    .info-table thead{
        background:#e9ecef;
    }
    .no-border td{
    border:0 !important;
     }
    .bold {
        font-weight:bold;
    }
</style>
<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-barang', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show').val();
            generatePaginationDore('pagination',show,res);        
        }else{
            $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
        }
    });
}

drawLap($formData);

function drawRptPage(data,res,from,to){ 
    var data = data;
    var html = "";
    var no = 1;
    if(data.length > 0) {
        html += "<div align='center'>";
        html += judul_lap("Laporan Barang",'','');
        html += "<table class='table table-bordered' width='100%'>";
        html += "<tr>";
        html += "<td class='text-center;' width='5%'>No</td>"
        html += "<td class='text-center;' width='10%'>Kode Barang</td>"
        html += "<td class='text-center;' width='30%'>Nama Barang</td>"
        html += "<td class='text-center;' width='5%'>Satuan Barang</td>"
        html += "<td class='text-center;' width='10%'>Harga Satuan</td>"
        html += "<td class='text-center;' width='10%'>PPN</td>"
        html += "<td class='text-center;' width='10%'>Profit</td>"
        html += "<td class='text-center;' width='10%'>Harga Jual</td>"
        html += "<td class='text-center;' width='10%'>Kelompok Barang</td>"
        html += "<td class='text-center;' width='15%'>Barcode</td>"
        html += "</tr>";
        for(var i=0;i<data.length;i++) {
            var value = data[i];
            html += "<tr>";
            html += "<td valign='middle' class='isi_laporan' align='center'>"+no+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='center'>"+value.kode_barang+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='left'>"+value.nama+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='center'>"+value.satuan+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='right'>"+sepNum(value.hrg_satuan)+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='right'>"+sepNum(value.ppn)+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='right'>"+sepNum(value.profit)+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='right'>"+sepNum(value.harga)+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='left'>"+value.kode_klp+"</td>";
            html += "<td valign='middle' class='isi_laporan' align='left'>"+value.barcode+"</td>";
            html += "</tr>";
            no++;
        }
        html += "</table>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>