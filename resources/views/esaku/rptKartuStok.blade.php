<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-kartu-stok', null, formData, null, function(res){
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

function drawRptPage(data,res,from,to) { 
    var data = data;
    if(res.back){
        $('.navigation-lap').removeClass('hidden');
    }else{
        $('.navigation-lap').addClass('hidden');
    }
    var html = "";
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var x=1;

    if(data.length > 0) { 
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) { 
            var value = data[i];
            html += "<table class='table table-bordered'>";
            html += "<tbody>";
            html += "<tr>";
            html += "<th>Kode Barang</th>"
            html += "<th colspan='6'>"+value.kode_barang+"</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th>Nama Barang</th>";
            html += "<th colspan='6'>"+value.nama_barang+"</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th>Gudang</th>";
            html += "<th colspan='6'>"+value.nama_gudang+"</th>";
            html += "</tr>";
            html += "<tr>"
            html += "<th>Stok Awal</th>";
            html += "<th colspan='6'>"+sepNum(value.stok)+"</th>";
            html += "</tr>";
            html += "</tbody>";
            html += "<tbody>";
            html += "<tr>";
            html += "<th class='text-center'>Tanggal</th>";
            html += "<th class='text-center'>No. Bukti</th>";
            html += "<th class='text-center'>Modul</th>";
            html += "<th class='text-center'>Masuk</th>";
            html += "<th class='text-center'>Keluar</th>";
            html += "<th class='text-center'>Stok</th>";
            html += "</tr>";
            //ini data detail
            var debet=0;
            var kredit=0;
            var stok=0;
            for(var j=0; j < res.res.data_detail.length; j++){
                var line = res.res.data_detail[j];
                if(value.kode_barang == line.kode_barang){
                    debet+= parseFloat(line.debet);
                    kredit+= parseFloat(line.kredit);
                    stok+= parseFloat(line.stok);

                    html += "<tr>";
                    html += "<td class=''>"+line.tgl+"</td>";
                    html += "<td class=''>"+line.no_bukti+"</td>";
                    html += "<td class=''>"+line.modul+"</td>";
                    html += "<td class='text-right'>"+number_format(line.debet)+"</td>";
                    html += "<td class='text-right'>"+number_format(line.kredit)+"</td>";
                    html += "<td class='text-right'>"+number_format(line.stok)+"</td>";
                    html += "</tr>";
                }
            }
            html += "<tr>";
            html += "<td colspan='3' class='text-right isi_laporan'>Jumlah</td>"
            html += "<td class='text-right isi_laporan'>"+number_format(debet)+"</td>"
            html += "<td class='text-right isi_laporan'>"+number_format(kredit)+"</td>"
            html += "<td class='text-right isi_laporan'>"+number_format(stok)+"</td>"
            html += "</tr>";
            html += "</tbody>";
            html += "</table>";
        }
        html += "<div style='page-break-after:always'></div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>