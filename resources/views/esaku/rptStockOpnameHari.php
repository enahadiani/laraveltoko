<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-stock-opname-hari', null, formData, null, function(res){
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
                        <td colspan="12" class="vtop" style='width:1320px'>&nbsp;</td>
                        <td class="vmiddle text-center" style='width:120px'></td>
                    </tr>
                    <tr>
                        <td colspan="3" >LAPORAN STOCK OPNAME HARIAN</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>NO HOLD</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.no_hold+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>KETERANGAN</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.keterangan+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>GUDANG</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.kode_gudang+` `+data.nama_gudang+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>TGL CETAK</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+data.tanggal_hold+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
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
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>No Rak</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Barang</th>
                        <th width='200' class='header_laporan text-center' style='text-transform:uppercase'>Nama Barang </th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Stok Sistem</th>
                        <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Stok Fisik</th>
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
                            if(data.no_hold == line2.no_hold){
                                stok_sistem+=parseFloat(line2.stok_sistem);
                                stok_fisik+=parseFloat(line2.stok_fisik);
                                det+=`<tr>
                                <td align='center' class='isi_laporan'>`+no+`</td>
                                <td class='isi_laporan'>`+line2.no_rak+`</td>
                                <td class='isi_laporan'>`+line2.kode_barang+`</a></td>
                                <td class='isi_laporan'>`+line2.nama+`</td>
                                <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.stok_sistem))+`</td>
                                <td  class='isi_laporan text-right'></td>
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
                <table class="borderless mb-2 table-header" style="width:100%;" >
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='width:200px' >&nbsp;</td>
                        <td style='width:250px' >&nbsp;</td>
                        <td style='width:250px' >&nbsp;</td>
                        <td style='width:250px' >&nbsp;</td>
                        <td style='width:250px' >&nbsp;</td>
                        <td style='width:250px' class="vtop text-center">Bandung, `+data.tanggal+`</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>`;
                html+=`<DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
    
</script>