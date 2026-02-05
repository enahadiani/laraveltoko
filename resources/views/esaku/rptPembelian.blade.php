<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-pembelian-v2', null, formData, null, function(res){
            if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);        
            }else{
                console.log('test');
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
            var data = data[0];
            var lokasi = "{{ Session::get('namaLokasi') }}";
            html+=`
            <div class='table-responsive'>
                <table class="borderless mb-2 table-header" style="width:100%;" >
                    <tr>
                        <td colspan="3" class="vtop" style='width:500px'><h6 class="text-primary bold">TJ MART</h6></td>
                        <td colspan="3" class="vtop" style='width:1320px'>&nbsp;</td>
                        <td class="vmiddle text-center" style='width:120px'></td>
                    </tr>
                    <tr>
                        <td colspan="3" >LAPORAN PEMBELIAN</td>
                        <td colspan="3" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:200px'>NO PEMBELIAN</td>
                        <td colspan="1" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.no_pembelian+`</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop">TOTAL BARANG</td>
                        <td class="vtop">:&nbsp;</td>
                        <td class="vtop text-right">`+number_format(parseFloat(data.total_barang))+`</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>TANGGAL</td>
                        <td colspan="1" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.tanggal+`</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop">PPN</td>
                        <td class="vtop">:&nbsp;</td>
                        <td class="vtop text-right">`+number_format(parseFloat(data.ppn))+`</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>KETERANGAN</td>
                        <td colspan="1" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.keterangan+`</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop">DISKON</td>
                        <td class="vtop">:&nbsp;</td>
                        <td class="vtop text-right">`+number_format(parseFloat(data.diskon))+`</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>GUDANG</td>
                        <td colspan="1" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.toko+` `+data.nama_toko+`</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop">TOTAL HUTANG</td>
                        <td class="vtop">:&nbsp;</td>
                        <td class="vtop text-right">`+number_format(parseFloat(data.total_hutang))+`</td>
                    
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>VENDOR</td>
                        <td colspan="1" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.vendor+` `+data.nama_vendor+`</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <table width='100%' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th width='20' class='header_laporan text-center' style='text-transform:uppercase'>No</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>No Sistem</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Barang</th>
                        <th width='200' class='header_laporan text-center' style='text-transform:uppercase'>Nama Barang </th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Qty</th>
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
                        var stok_sistem=0;
                        var stok_fisik=0;
                        for (var x=0;x<res.res.data_detail.length;x++)
                        {
                            var line2 = res.res.data_detail[x];
                            if(data.no_pembelian == line2.no_bukti){
                                det+=`<tr>
                                <td align='center' class='isi_laporan'>`+no+`</td>
                                <td class='isi_laporan'>`+line2.no_sistem+`</td>
                                <td class='isi_laporan'>`+line2.kode_barang+`</a></td>
                                <td class='isi_laporan'>`+line2.nama_barang+`</td>
                                <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.qty))+`</td>
                                </tr>`;	
                                no++;
                            }
                            
                        }
                        // det+=`<tr>
                        // <th colspan='3' class='text-right bold'>Total</th>
                        // <th class='bold text-right'></th>
                        // <th class='bold text-right'>`+number_format(stok_sistem)+`</th>
                        // <th class='bold text-right'>`+number_format(stok_fisik)+`</th>
                        // </tr>`;
                        html+=det+`
                    </tbody>
                    </table>`;
                html+=`
                <table width='100%' class='borderless mb-2'>
                    <tr></tr>
                    <tr></tr>
                </tabel>
                <table width='100%' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th width='20' class='header_laporan text-center' style='text-transform:uppercase'>No</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>No Bukti</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Akun</th>
                        <th width='200' class='header_laporan text-center' style='text-transform:uppercase'>Nama Akun </th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Debit</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kredit</th>
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
                        var debit=0;
                        var kredit=0;
                        var total_debit=0;
                        var total_kredit=0;
                        for (var x=0;x<res.res.data_jurnal.length;x++)
                        {
                            var line3 = res.res.data_jurnal[x];
                            if(data.no_pembelian == line3.no_bukti){
                                debit = (line3.dc == 'D' ? number_format(parseFloat(line3.nilai)) : '-');
                                kredit = (line3.dc == 'C' ? number_format(parseFloat(line3.nilai)) : '-');

                                total_debit+=parseFloat((line3.dc == 'D' ? line3.nilai : 0));
                                total_kredit+=parseFloat((line3.dc == 'C' ? line3.nilai : 0));
                                det+=`<tr>
                                <td align='center' class='isi_laporan'>`+no+`</td>
                                <td class='isi_laporan'>`+line3.no_bukti+`</td>
                                <td class='isi_laporan'>`+line3.kode_akun+`</a></td>
                                <td class='isi_laporan'>`+line3.nama+`</td>
                                <td class='isi_laporan text-right'>`+debit+`</td>
                                <td class='isi_laporan text-right'>`+kredit+`</td>
                                </tr>`;	
                                no++;
                            }
                            
                        }
                        det+=`<tr>
                        <th colspan='4' class='text-right bold'>Total</th>
                        <th class='bold text-right'>`+number_format(total_debit)+`</th>
                        <th class='bold text-right'>`+number_format(total_kredit)+`</th>
                        </tr>`;
                        html+=det+`
                    </tbody>
                </table>`;
                html+=`<DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
    
</script>