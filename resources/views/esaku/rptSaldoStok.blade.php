<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-saldo-stok', null, formData, null, function(res){
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
    var html = null;
    if(data.length > 0) {
        html = `<div id="sai-rpt-table-export-tbl-daftar-pnj" class="row">
            <div class="col-12">
                ${judul_lap('Laporan Saldo Stok', '', '')}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;" rowspan="2">Kode Barang</th>    
                                <th class="text-center" style="width: 30%;" rowspan="2">Nama Barang</th>    
                                <th class="text-center" style="width: 10%;" rowspan="2">Kode Gudang</th>    
                                <th class="text-center" style="width: 10%;" rowspan="2">Stok Awal</th>    
                                <th class="text-center" style="width: 10%;" rowspan="2">Mutasi</th>    
                                <th class="text-center" style="width: 15%;" rowspan="2">Stok Akhir</th>    
                                <th class="text-center" style="width: 15%;" rowspan="2">Harga Beli Terakhir</th>    
                            </tr>  
                        </thead>
                        <tbody>`
                        for(var i=0;i<data.length;i++) {
                            var dt = data[i];
                            html += `<tr>
                                <td class="text-left">${dt.kode_barang}</td>    
                                <td class="text-left">${dt.nm_barang}</td>    
                                <td class="text-left">${dt.kode_gudang}</td>    
                                <td class="text-right">${sepNum(dt.sop_awal)}</td>    
                                <td class="text-right">${sepNum(dt.mutasi)}</td>    
                                <td class="text-right">${sepNum(dt.sop)}</td>    
                                <td class="text-right">${sepNum(dt.hrg_beli_akhir)}</td>    
                            </tr>`
                        }
                    html += `</tbody>
                    </table>
                </div>
            </div>
        </div>`;

        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
}
</script>