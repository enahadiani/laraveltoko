<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-retur-jual', null, formData, null, function(res){
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
    console.log(data);
    if(data.length > 0) {
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) {
            var value = data[i];
            var harga=0; 
            var diskon=0; 
            var jual=0; 
            var retur=0; 
            var total=0;  
            var subTot=0;
            var no=1;
            html += "<div class='card card-body'>";
            html += "<h3><b>No Retur</b> <span class='pull-right'>#"+value.no_jual+"</span></h3>";
            html += "<hr/>";
            html += "<div class='row'>";
            html += "<div class='col-md-12'>";
            html += "<div class='pull-left'>";
            html += "<p class='text-muted m-l-5'>";
            html += value.tanggal+"<br/>";
            html += "Keterangan: "+value.keterangan;
            html += "</p>";
            html += "</div>"
            html += "</div>";
            html += "<div class='col-md-12'>";
            html += "<div class='table-responsive mt-40' style='clear: both;'>";
            html += "<table class='table table-hover'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th class='text-center'>No</th>";
            html += "<th>Kode Barang</th>";
            html += "<th>Nama Barang</th>";
            html += "<th>Satuan</th>";
            html += "<th class='text-right'>Harga</th>";
            html += "<th class='text-right'>Qty Jual</th>";
            html += "<th class='text-right'>Qty Retur</th>";
            html += "<th class='text-right'>Sub Total</th>";
            html += "</tr>";
            html += "</thead>";
            html += "<tbody>";
            if(value.data_detail.length > 0) {
                for (var j=0;j<value.data_detail.length;j++) {
                    var value2 = value.data_detail[j];
                    harga+=+value2.harga;
                    diskon+=+value2.diskon;
                    jual+=+value2.stok;
                    retur+=+value2.jumlah;
                    total+=+value2.total;
                    subTot+= +parseFloat(value2.total)+parseFloat(value2.diskon);
                    html += "<tr>"
                    html += "<td align='center' class='isi_laporan'>"+no+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.kode_barang+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.nama_brg+"</td>";
                    html += "<td  class='isi_laporan'>"+value2.satuan+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.harga)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.stok)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum2(value2.jumlah)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.total)+"</td>";
                    html += "</tr>";
                    no++;
                }
            }
            
            html += "</tbody>";
            html += "</table>";
            html += "</div>";
            html += "</div>"
            html += "<div class='col-md-12'>";
            html += "<div class='pull-right m-t-30 text-right'>";
            html += "<p>Sub - Total amount: "+sepNum(subTot)+"</p>";
            html += "<p>Discount: "+sepNum(diskon)+"</p>";
            html += "<hr/>";
            html += "<h3><b>Total: </b>"+sepNum(total)+"</h3>"
            html += "</div>";
            html += "<div class='clearfix'></div>"
            html += "</div>";
            html += "</div>";
            html += "</div>";
        }
        html += "<div style='page-break-after:always'></div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>