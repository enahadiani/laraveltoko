<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-rekap-jual', null, formData, null, function(res){
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
    var dataRes = res.res;
    if(data.length) {
        var html = "";
        for(var i=0;i<data.length;i++) {
            var row = data[i];
            var month = $periode.from.slice(-2);
            var no = 1;
            var totalTot = 0;
            var totalPPN = 0;
            var totalBersih = 0;
            var totalHPP = 0;
            var totalMargin = 0;
            var totalPersen = 0;
            var totalStruk = 0;
            var totalRata = 0;
            var totalPajak = 0;
            var totalNonPajak = 0;

            html += `<div class="card card-body" style="margin-bottom: 50px;">
            <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="width: 83%;">PT. Tregginas Jaya</td>        
                </tr>
                <tr>
                    <td style="width: 83%;">${row.kode_gudang}</td>        
                </tr>
                <tr>
                    <td>Kasir : ${row.nik_user}</td>
                </tr>    
                </tbody>
            </table>
            <div class="table-responsive m-t-40">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td colspan="12" class="text-center"><b>Laporan Penjualan Bulan ${getNamaBulan(month)}</b></td>    
                        </tr>   
                        <tr>
                            <th style="width: 8px;" class="text-center">No</th>       
                            <th style="width: 20px;" class="text-center">Tanggal</th>    
                            <th style="width: 25px;" class="text-center">Total</th>    
                            <th style="width: 25px;" class="text-center">PPN</th>    
                            <th style="width: 25px;" class="text-center">Bersih</th>    
                            <th style="width: 25px;" class="text-center">HPP</th>    
                            <th style="width: 25px;" class="text-center">Margin</th>    
                            <th style="width: 25px;" class="text-center">%</th>    
                            <th style="width: 25px; display:none;" class="text-center">Struk</th>    
                            <th style="width: 25px; display:none;" class="text-center">Rata2</th>    
                            <th style="width: 50px; display:none;" class="text-center">Brg Kena Pajak</th>    
                            <th style="width: 50px; display:none;" class="text-center">Brg Non Pajak</th>    
                        </tr> 
                    </thead>    
                    <tbody>`
                    for(var j=0;j<dataRes.data_detail.length;j++) {
                        var row2 = dataRes.data_detail[j];
                        if(row.nik_user == row2.kasir && row.kode_gudang == row2.kode_gudang) {
                            totalTot +=+ parseFloat(row2.total)
                            totalPPN +=+ parseFloat(row2.ppn);
                            totalBersih +=+ parseFloat(row2.bersih);
                            totalHPP +=+ parseFloat(row2.hpp);
                            totalMargin +=+ parseFloat(row2.margin);
                            totalPersen +=+ parseFloat(row2.persen);
                            totalStruk +=+ parseFloat(row2.struk);
                            totalRata +=+ parseFloat(row2.rata);
                            totalPajak +=+ parseFloat(row2.brg_pajak);
                            totalNonPajak +=+ parseFloat(row2.brg_non_pajak);

                            html += `
                            <tr>
                                <td style="text-align: center;">${no}</td>    
                                <td style="text-align: center;">${row2.tanggal}</td>    
                                <td style="text-align: right;">${sepNum(row2.total)}</td>    
                                <td style="text-align: right;">${sepNum(row2.ppn)}</td>    
                                <td style="text-align: right;">${sepNum(row2.bersih)}</td>    
                                <td style="text-align: right;">${sepNum(row2.hpp)}</td>    
                                <td style="text-align: right;">${sepNum(row2.margin)}</td>    
                                <td style="text-align: right;">${sepNum(row2.persen)}</td>    
                                <td style="text-align: right; display:none;">${sepNum(row2.struk)}</td>    
                                <td style="text-align: right; display:none;">${sepNum(row2.rata)}</td>    
                                <td style="text-align: right; display:none;">${sepNum(row2.brg_pajak)}</td>    
                                <td style="text-align: right; display:none;">${sepNum(row2.brg_non_pajak)}</td>    
                            </tr> 
                            `
                            no++;
                        }
                    }
            html += `</tbody>
                    <tr>
                        <td colspan="2" style="text-align: right; font-weight: bold;">Total</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalTot)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalPPN)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalBersih)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalHPP)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalMargin)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalPersen)}</td>    
                        <td style="text-align: right; font-weight: bold; display:none;">${sepNum(totalStruk)}</td>    
                        <td style="text-align: right; font-weight: bold; display:none;">${sepNum(totalRata)}</td>    
                        <td style="text-align: right; font-weight: bold; display:none;">${sepNum(totalPajak)}</td>    
                        <td style="text-align: right; font-weight: bold; display:none;">${sepNum(totalNonPajak)}</td>    
                    </tr>
                </table>    
            </div>    
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
} 
</script>