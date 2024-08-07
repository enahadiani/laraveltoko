<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-posisi-stok') }}", null, formData, null, function(res){
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
        if(data.length > 0){
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            var html = `
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .table-header td{
                    padding: 2px !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            var lokasi = "{{ Session::get('namaLokasi') }}";
            html+=`
            <div class='table-responsive'>
                <table class="borderless mb-2 table-header" style="width:100%;" >
                    <tr>
                        <td colspan="3" class="vtop" style='width:500px'><h6 class="text-primary bold">TJ MART</h6></td>
                        <td colspan="12" class="vtop" style='width:1320px'>&nbsp;</td>
                        <td class="vmiddle text-center" style='width:120px'></td>
                    </tr>
                    <tr>
                        <td colspan="3" >LAPORAN POSISI STOK</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>TANGGAL</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+$tanggal.from+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>GUDANG</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+$kode_gudang.from+` `+$kode_gudang.fromname+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>TGL CETAK</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+res.tgl_cetak+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                </table>
                <table width='100%' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th width='20' class='header_laporan text-center' style='text-transform:uppercase'>No</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Barang</th>
                        <th width='200' class='header_laporan text-center' style='text-transform:uppercase'>Nama Barang </th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Rak</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Stok Awal</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Penerimaan</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Pengeluaran</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Stok Akhir</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Hrg Avg</th>
                        <th width='160' class='header_laporan text-center' style='text-transform:uppercase'>Nilai Stok Akhir</th>
                    </tr>
                    </thead>
                    <tbody>`;
                        var total=0; 
                        var det = '';
                        if(from != undefined){
                            var no=from+1;
                        }else{
                            var no=1;
                        }
                        var so_awal=0;
                        var debet=0;
                        var kredit=0;
                        var stok=0;
                        var nilai_stok=0;
                        for (var x=0;x<data.length;x++)
                        {
                            var line2 = data[x];
                            so_awal+=parseFloat(line2.so_awal);
                            debet+=parseFloat(line2.debet);
                            kredit+=parseFloat(line2.kredit);
                            stok+=parseFloat(line2.stok);
                            nilai_stok+=parseFloat(line2.nilai_stok);
                            det+=`<tr>
                            <td align='center' class='isi_laporan'>`+no+`</td>
                            <td class='isi_laporan'>`+line2.kode_barang+`&nbsp;</td>
                            <td class='isi_laporan'>`+line2.nama+`</td>
                            <td class='isi_laporan'>`+line2.kode_rak+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.so_awal))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.debet))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.kredit))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.stok))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.h_avg))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.nilai_stok))+`</td>
                            </tr>`;	
                            no++;
                            
                        }
                        det+=`<tr>
                        <th colspan='3' class='text-right bold'>Total</th>
                        <th class='bold text-right'></th>
                        <th class='bold text-right'>`+number_format(so_awal)+`</th>
                        <th class='bold text-right'>`+number_format(debet)+`</th>
                        <th class='bold text-right'>`+number_format(kredit)+`</th>
                        <th class='bold text-right'>`+number_format(stok)+`</th>
                        <th class='bold text-right'></th>
                        <th class='bold text-right'>`+number_format(nilai_stok)+`</th>
                        </tr>`;
                        html+=det+`
                    </tbody>
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   