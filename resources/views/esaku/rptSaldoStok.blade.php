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
                                <th class="text-center" style="width: 15%;" rowspan="2">Stok Awal</th>    
                                <th class="text-center" style="width: 25%;" colspan="2">Mutasi</th>    
                                <th class="text-center" style="width: 15%;" rowspan="2">Stok Akhir</th>    
                            </tr>
                            <tr>
                                <th class="text-center">Masuk</th>    
                                <th class="text-center">Keluar</th>    
                            </tr>    
                        </thead>
                        <tbody>`
                        for(var i=0;i<data.length;i++) {
                            var dt = data[i];
                            var so_akhir = parseFloat(dt.so_awal) + (parseFloat(dt.debet) - parseFloat(dt.kredit))
                            html += `<tr>
                                <td class="text-left">${dt.kode_barang}</td>    
                                <td class="text-left">${dt.nama_barang}</td>    
                                <td class="text-right">${sepNum(dt.so_awal)}</td>    
                                <td class="text-right">${sepNum(dt.debet)}</td>    
                                <td class="text-right">${sepNum(dt.kredit)}</td>    
                                <td class="text-right">${sepNum(so_akhir)}</td>    
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