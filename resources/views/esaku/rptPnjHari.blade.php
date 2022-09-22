<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-penjualan-harian', null, formData, null, function(res){
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

function sepNum2(x) {
    var num = parseFloat(x).toFixed(0);
    var parts = num.toString().split(".");
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g, "$1.");
    return parts.join(",");
}

function drawRptPage(data,res,from,to){ 
    var data = data;
    var html = "";
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var x=1;
    if(data.length > 0) {
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) {
            var value = data[i];
            var harga=0; 
            var diskon=0; 
            var jumlah=0; 
            var bonus=0; 
            var total=0;  
            var subTot=0;
            var no=1;
            html += "<div class='card card-body display' style='display: block;'>";
            html += "<h3><b>Tanggal</b> <span class='pull-right'>#"+value.tanggal+"</span></h3>";
            html += "<hr/>";
            html += "<div class='row'>";
            html += "<div class='col-md-12'>";
            html += "<div class='pull-left'>";
            html += "<p class='text-muted m-l-5'>";
            html += "Gudang: "+value.kode_gudang+" - "+value.nama_gudang;
            html += "<br/> Kasir:"+value.nik_kasir;
            html += "</p>";
            html += "</div>"
            html += "</div>";
            html += "<div class='col-md-12'>";
            html += "<div class='table-responsive mt-40'>";
            html += "<table class='table table-hover'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th class='text-center'>No</th>";
            html += "<th>Kode Barang</th>";
            html += "<th>Nama Barang</th>";
            html += "<th>Satuan</th>";
            html += "<th class='text-right'>Harga</th>";
            html += "<th class='text-right'>Diskon</th>";
            html += "<th class='text-right'>Jumlah</th>";
            html += "<th class='text-right'>Bonus</th>";
            html += "<th class='text-right'>Sub Total</th>";
            html += "</tr>";
            html += "</thead>";
            html += "<tbody>";
            for (var j=0;j<res.res.data_detail.length;j++) {
                var value2 = res.res.data_detail[j];
                if(value.tanggal == value2.tanggal && value.nik_kasir == value2.nik_user) {
                    harga+=+value2.harga;
                    diskon+=+value2.diskon;
                    jumlah+=parseFloat(value2.jumlah);
                    bonus+=+value2.bonus;
                    total+=parseFloat(value2.total_ex);
                    subTot = subTot + parseFloat(value2.total_ex);
                    html += "<tr>"
                    html += "<td align='center' class='isi_laporan'>"+no+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.kode_barang+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.nama_brg+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.satuan+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.harga)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.diskon)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum2(value2.jumlah)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.bonus)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum2(value2.total)+"</td>";
                    html += "</tr>";
                    no++;
                }
            }
            html += "<tr>";
            html += "<td colspan='5' style='text-align: right; font-weight: bold;'>Total</td>"
            html += "<td style='text-align: right; font-weight: bold;'>"+sepNum(diskon)+"</td>"
            html += "<td style='text-align: right; font-weight: bold;'>"+sepNum2(jumlah)+"</td>"
            html += "<td style='text-align: right; font-weight: bold;'>"+sepNum(bonus)+"</td>"
            html += "<td style='text-align: right; font-weight: bold;'>"+sepNum2(total)+"</td>"
            html += "</tr>";
            html += "</tbody>";
            html += "</table>";
            html += "</div>";
            html += "</div>"
            html += "</div>";
            html += "</div>";
            html += `<div class="display" id="break_page"  style='display: block; page-break-after: always;'></div>`;
        }
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>