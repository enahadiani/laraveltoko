<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-closing', null, formData, null, function(res){
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
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var x=1;
    if(data.length > 0) {
        var no_id = 1;
        html = `<div id="sai-rpt-table-export-tbl-daftar-pnj">`;
        for(var i=0;i<data.length;i++) {
            var row = data[i];
            var diskon = 0;
            var total = 0;
            var subTot = 0;
            var no = 1;
            var totalPenj = parseFloat(row.saldo_awal) + parseFloat(row.total_pnj);

            html += `<div class="card card-body" style="margin-bottom: 32px;">
                <div class="row">
                    <div class="col-12">
                        <div class="pull-left">
                            <h3>
                                <b>No Closing</b>
                                <span class="pull-right">#${row.no_bukti_close}</span>
                            </h3>
                            <hr />
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 201px;">No Open Kasir</td>
                                        <td>: ${row.no_bukti_open}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Waktu</td>
                                        <td>: ${row.tanggal_open} ${row.jam_open}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No Closing Kasir</td>
                                        <td>: ${row.no_bukti_close}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Waktu</td>
                                        <td>: ${row.tanggal_close} ${row.jam_close}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Saldo Awal</td>
                                        <td>: ${sepNum(row.saldo_awal)}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Total Penjualan</td>
                                        <td>: ${sepNum(row.total_pnj)}</td>
                                    </tr>    
                                    <tr>
                                        <td style="width: 201px;">Total</td>
                                        <td>: ${sepNum(totalPenj)}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kasir</td>
                                        <td>: ${row.nik_user}</td>
                                    </tr>    
                                </tbody>
                            </table>      
                        </div>    
                    </div>   
                    <div class="col-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <th class="text-center">No</th>    
                                    <th class="text-center">No Bukti</th>    
                                    <th class="text-center">No Jual</th>    
                                    <th class="text-center">Periode</th>    
                                    <th class="text-center">Tanggal</th>    
                                    <th class="text-center">Diskon</th>    
                                    <th class="text-center">Nilai</th>    
                                    <th class="text-center">Keterangan</th>    
                                </thead>
                                <tbody>`
                                for(var j=0;j<res.res.data_detail.length;j++) {
                                    var detail = res.res.data_detail[j]
                                    if(row.no_bukti_close == detail.no_bukti) {
                                        diskon = parseFloat(detail.diskon) + diskon;
                                        total = parseFloat(detail.nilai) + total;
                                        subTot = parseFloat(detail.nilai) - parseFloat(detail.diskon);
                                        html += `<tr>
                                            <td class="text-center isi-laporan">${no}</td>    
                                            <td class="text-center isi-laporan">${detail.no_bukti}</td>    
                                            <td class="text-center isi-laporan">${detail.no_jual}</td>    
                                            <td class="text-center isi-laporan">${detail.periode}</td>    
                                            <td class="text-center isi-laporan">${detail.tanggal}</td>    
                                            <td class="text-right isi-laporan">${sepNum(detail.diskon)}</td>    
                                            <td class="text-right isi-laporan">${sepNum(detail.nilai)}</td>    
                                            <td class="text-left isi-laporan">${detail.keterangan}</td>    
                                        </tr>`
                                        no++;
                                    }
                                }
                        html += `</tbody>
                            <tr>
                                <td style="border-bottom: solid 0.5px black;" class="text-right" colspan="5">Diskon</td>
                                <td style="border-bottom: solid 0.5px black;">:</td>    
                                <td style="border-bottom: solid 0.5px black;" class="text-right isi-laporan"><b>${sepNum(diskon)}</b></td>    
                            </tr>
                            <tr>
                                <td class="text-right" colspan="5">Total</td>    
                                <td>:</td>
                                <td class="text-right isi-laporan"><b>${sepNum(total)}</b></td>    
                            </tr>
                            </table>    
                        </div>    
                    </div> 
                    <div class="clearfix"></div>
                </div>
            </div>`
            no_id++
        }
        html += `<div style='page-break-after:always'></div>
        </div>`;
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>