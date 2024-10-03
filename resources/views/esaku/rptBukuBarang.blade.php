<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-buku-barang') }}", null, formData, null, function(res){
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
                        <td colspan="3" >LAPORAN BUKU BESAR BARANG</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>TANGGAL</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+$tanggal.from+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                </table>`;
                for (var x=0;x<data.length;x++)
                {
                    var row = data[x];
                    html+=`
                    <table class="borderless mb-2 table-header" style="width:100%;" >
                        <tr>
                            <td colspan="2" style='width:100px'>Kode Barang</td>
                            <td colspan="6" style='width:400px;'>:&nbsp; ${row.kode_barang}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style='width:100px'>Nama Barang</td>
                            <td colspan="6" style='width:400px;'>:&nbsp; ${row.nama}</td>
                        </tr>
                    </table>
                    <table width='100%' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                            <th width='20' class='header_laporan text-right' style='' colspan='7'>Stok Awal</th>
                            <th width='20' class='header_laporan text-right' style=''>${number_format(row.so_awal)}</th>
                        </tr>
                        <tr>
                            <th width='20' class='header_laporan text-center' style=''>No</th>
                            <th width='80' class='header_laporan text-center' style=''>No Bukti</th>
                            <th width='80' class='header_laporan text-center' style=''>Tanggal </th>
                            <th width='200' class='header_laporan text-center' style=''>Keterangan</th>
                            <th width='80' class='header_laporan text-center' style=''>Modul</th>
                            <th width='80' class='header_laporan text-center' style=''>Debet</th>
                            <th width='80' class='header_laporan text-center' style=''>Kredit</th>
                            <th width='80' class='header_laporan text-center' style=''>Balance</th>
                        </tr>
                        </thead>
                        <tbody>`;
                            var total=0; 
                            var det = '';
                            var no=1;
                            var so_akhir=parseFloat(row.so_awal);
                            var debet=0;
                            var kredit=0;
                            for (var i=0;i<row.detail.length;i++)
                            {
                                var line2 = row.detail[i];
                                debet+=parseFloat(line2.debet);
                                kredit+=parseFloat(line2.kredit);
                                so_akhir+=parseFloat(line2.debet) - parseFloat(line2.kredit);
                                det+=`<tr>
                                <td align='center' class='isi_laporan'>`+no+`</td>
                                <td class='isi_laporan'>`+line2.no_bukti+`&nbsp;</td>
                                <td class='isi_laporan'>`+line2.tgl_ed+`</td>
                                <td class='isi_laporan'>`+line2.keterangan+`</td>
                                <td class='isi_laporan'>`+line2.modul+`</td>
                                <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.debet))+`</td>
                                <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.kredit))+`</td>
                                <td  class='isi_laporan text-right'>`+number_format(so_akhir)+`</td>
                                </tr>`;	
                                no++;
                                
                            }
                            det+=`<tr>
                            <th colspan='5' class='text-right bold'>Total</th>
                            <th class='bold text-right'>`+number_format(debet)+`</th>
                            <th class='bold text-right'>`+number_format(kredit)+`</th>
                            <th class='bold text-right'>`+number_format(so_akhir)+`</th>
                            </tr>`;
                            html+=det+`
                        </tbody>
                        </table>
                    <DIV style='page-break-after:always'></DIV>`;
                }
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   