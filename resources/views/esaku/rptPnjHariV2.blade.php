<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-penjualan-harian-v2', null, formData, null, function(res){
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
    var dataRes = res.res;

    if(data.length > 0) {
        var html = "";
        for(var i=0;i<data.length;i++) {
            var row = data[i];
            var no = 1;
            var total = 0;
            html += `<div class="card card-body" style="margin-bottom: 50px;">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td style="width: 83%;">PT. Tregginas Jaya</td>    
                            <td style="text-align: right;">Tanggal :</td>    
                            <td style="text-align: right;">${dataRes.tanggal}</td>    
                        </tr>
                        <tr>
                            <td style="width: 83%;">TJ Mart Sumur Bandung</td>    
                            <td style="text-align: right;">Jam :</td>    
                            <td style="text-align: right;">${dataRes.jam}</td>    
                        </tr>
                        <tr>
                            <td>Kasir : ${dataRes.kasir[i]}</td>
                        </tr>    
                    </tbody>    
                </table>
                <div class="table-responsive m-t-40">
                    <table class="table table-hover">
                        <thead>   
                            <tr>
                                <td colspan="9" class="text-center"><b>Laporan Penjualan Per Tanggal</b></td>    
                            </tr>
                            <tr>
                                <td colspan="9" class="text-center"><b>No Closing: ${row.no_close}</b></td>    
                            </tr>
                            <tr>
                                <td colspan="9" class="text-center"><b>Tanggal: ${row.tanggal}</b></td>    
                            </tr>
                            <tr>
                                <th style="width: 5%;" class="text-center">No</th>       
                                <th style="width: 15%;" class="text-center">Kode Barang</th>    
                                <th style="width: 25%;" class="text-center">Nama Barang</th>    
                                <th style="width: 10%;" class="text-center">Satuan</th>    
                                <th style="width: 10%;" class="text-center">HPP</th>    
                                <th style="width: 8%;" class="text-center">Jumlah</th>    
                                <th style="width: 20%;" class="text-center">Sub Total</th>    
                                <th style="width: 20%;" class="text-center">Stok Akhir</th>    
                                <th style="width: 15%;" class="text-center">Keterangan</th>    
                            </tr>
                        </thead>
                        <tbody>`
                            for(var j=0;j<dataRes.data_detail.length;j++) {
                                var row2 = dataRes.data_detail[j];
                                if(row.tanggal === row2.tanggal && row.nik_kasir == row2.nik_user && row.no_close == row2.no_bukti) {
                                    total +=+ parseFloat(row2.total_ex);
                                    
                                    html += `<tr>
                                        <td>${no}</td>        
                                        <td>${row2.kode_barang}</td>    
                                        <td>${row2.nama_brg}</td>    
                                        <td>${row2.satuan}</td>    
                                        <td style="text-align: right;">${sepNum(row2.hpp)}</td>    
                                        <td style="text-align: right;">${sepNum(row2.jumlah)}</td>    
                                        <td style="text-align: right;">${sepNum(row2.total)}</td>    
                                        <td style="text-align: right;">${sepNum(row2.stok_akhir)}</td>    
                                        <td>${row2.keterangan}</td>    
                                    </tr>`
                                    no++;
                                }
                            }
                            
                html += `<tr>
                        <td colspan="8" style="text-align: right;">Total</td>
                        <td style="text-align: right;">${sepNum(total)}</td>
                    </tr>
                </tbody>    
                    </table> 
                </div>
            </div>`
        }
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>