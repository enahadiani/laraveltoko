<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-rekap-beli', null, formData, null, function(res){
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
            var nilai = 0;
            var ppn = 0;
            var total = 0;
            var totalNilai = 0;
            var totalPPN = 0;
            var totalTot = 0;

            html += `<div class="card card-body" style="margin-bottom: 50px;">
            <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="width: 83%;">PT. Tregginas Jaya</td>        
                </tr>
                <tr>
                    <td style="width: 83%;">TJ Mart Sumur Bandung</td>        
                </tr>
                <tr>
                    <td>Vendor : ${row.kode_vendor}</td>
                </tr>    
                </tbody>
            </table>
            <div class="table-responsive m-t-40">
                <table class="table table-bordered  info-table mt-4">
                    <thead>
                        <tr>
                            <td colspan="12" class="text-center"><b>Laporan Pembelian Tanggal ${row.tanggal}</b></td>    
                        </tr>   
                        <tr>
                            <th style="width='20'" class="text-center">No</th>       
                            <th style="width='20'" class="text-center">No Bukti</th>    
                            <th style="width='20'" class="text-center">Tanggal</th>    
                            <th style="width='20'" class="text-center">Vendor</th>    
                            <th style="width='20'" class="text-center">Nilai</th>    
                            <th style="width='20'" class="text-center">PPN</th>    
                            <th style="width='20'" class="text-center">Total</th>    
                        </tr> 
                    </thead>    
                    <tbody>`
                    for(var j=0;j<dataRes.data_detail.length;j++) {
                        var row2 = dataRes.data_detail[j];
                        if(row.nik_user == row2.kasir) {
                            total +=+ parseFloat(row2.nilai)+parseFloat(row2.nilai_ppn);
                            totalNilai +=+ parseFloat(row2.nilai);
                            totalPPN +=+ parseFloat(row2.nilai_ppn);
                            totalTot +=+ parseFloat(total);

                            html += `
                            <tr>
                                <td style="text-align: center;">${no}</td>    
                                <td style="text-align: center;">${row2.no_beli}</td>    
                                <td style="text-align:;">${(row2.tgl)}</td>    
                                <td style="text-align:;">${(row2.vendor)}</td>    
                                <td style="text-align: right;">${sepNum(row2.nilai)}</td>    
                                <td style="text-align: right;">${sepNum(row2.nilai_ppn)}</td>    
                                <td style="text-align: right;">${sepNum(row2.total)}</td>  
                            </tr>
                            `
                            no++;
                        }
                    }
            html += `</tbody>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalNilai)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalPPN)}</td>    
                        <td style="text-align: right; font-weight: bold;">${sepNum(totalTot)}</td>    
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