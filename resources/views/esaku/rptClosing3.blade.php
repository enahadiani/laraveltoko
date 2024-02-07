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
                                        <td style="width: 201px;">Saldo Awal</td>
                                        <td>: ${sepNum(row.saldo_awal)}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kasir</td>
                                        <td>: ${row.nik_user}</td>
                                    </tr>    
                                    <tr>
                                        <td style="width: 201px;">No Open Kasir</td>
                                        <td>: ${row.no_bukti_open}</td> <br>
                                        <td style="width: 150px;">Waktu</td>
                                        <td>: ${row.tanggal_open} ${row.jam_open}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No Closing Kasir</td>
                                        <td>: ${row.no_bukti_close}</td>
                                        <td style="width: 201px;">Waktu</td>
                                        <td>: ${row.tanggal_close} ${row.jam_close}</td>
                                    </tr>
                                </tbody>
                            </table>      
                        </div>    
                    </div>   
                    <div class="col-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr></tr>
                                    <th class="text-center" rowspan='2'>No</th>       
                                    <th class="text-center" rowspan='2'>No Jual</th>    
                                    <th class="text-center" rowspan='2'>Periode</th>    
                                    <th class="text-center" rowspan='2'>Tanggal</th>    
                                    <th class="text-center" colspan='3'>Nilai</th>   
                                </tr>
                                <tr>
                                    <th width='80' class='header_laporan text-center'>Cash</th>
                                    <th width='80' class='header_laporan text-center'>Qris</th>
                                    <th width='80' class='header_laporan text-center'>Link Aja</th>
                                </tr>  
                                </thead>
                                <tbody>`;
                                var cash=0; var link_aja=0; var qris=0; var total=0;
                                for(var j=0;j<res.res.data_detail.length;j++) {
                                    var detail = res.res.data_detail[j]
                                    if(row.no_bukti_close == detail.no_bukti) {
                                        diskon = parseFloat(detail.diskon) + diskon;
                                        total+= parseFloat(detail.cash) + parseFloat(detail.qris) + parseFloat(detail.link_aja);
                                        cash+= parseFloat(detail.cash);
                                        qris+= parseFloat(detail.qris);
                                        link_aja+= parseFloat(detail.link_aja);
                                        subTot = parseFloat(detail.nilai) - parseFloat(detail.diskon);
                                        
                                        html += `<tr>
                                            <td class="text-center isi-laporan">${no}</td>        
                                            <td class="text-center isi-laporan">${detail.no_jual}</td>    
                                            <td class="text-center isi-laporan">${detail.periode}</td>    
                                            <td class="text-center isi-laporan">${detail.tanggal}</td>     
                                            <td class="text-right isi-laporan">${sepNum(detail.cash)}</td>   
                                            <td class="text-right isi-laporan">${sepNum(detail.qris)}</td>   
                                            <td class="text-right isi-laporan">${sepNum(detail.link_aja)}</td>   
                                        </tr>`
                                        no++;
                                    }
                                }
                        html += `</tbody>
                            <tr>
                                <td class="text-right isi-laporan" colspan="5"><b>${sepNum(cash)}</b></td>    
                                <td class="text-right isi-laporan" ><b>${sepNum(qris)}</b></td>    
                                <td class="text-right isi-laporan" ><b>${sepNum(link_aja)}</b></td>    
                            </tr>
                            <tr>
                                <td class="text-right" colspan="5">Total Nilai</td>    
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