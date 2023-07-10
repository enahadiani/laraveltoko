<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-saldo-hutang') }}", null, formData, null, function(res){
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
            periode = $periode;
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
                        <td colspan="3" >LAPORAN SALDO HUTANG</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>PERIODE</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+namaPeriode($periode.from)+`</td>
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
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>No Beli</th>
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>Tanggal</th>
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>Vendor</th>
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>Nilai</th>
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>Nilai PPN</th>
                        <th width='100' class='header_laporan text-center' style='text-transform:uppercase'>Total</th>
                        <th width='160' class='header_laporan text-center' style='text-transform:uppercase'>Bayar</th>
                        <th width='160' class='header_laporan text-center' style='text-transform:uppercase'>Saldo Hutang</th>
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
                        var nilai=0;
                        var nilai_ppn=0;
                        var total=0;
                        var bayar=0;
                        var saldo_hutang=0;
                        for (var x=0;x<data.length;x++)
                        {
                            var line2 = data[x];
                            nilai+=parseFloat(line2.nilai);
                            nilai_ppn+=parseFloat(line2.nilai_ppn);
                            total+=parseFloat(line2.total);
                            bayar+=parseFloat(line2.bayar);
                            saldo_hutang+=parseFloat(line2.saldo_hutang);
                            
                        // kode_gudang	nama	no_beli	tanggal	vendor	nilai	nilai_ppn	total	bayar	saldo_hutang
                            det+=`<tr>
                            <td align='center' class='isi_laporan'>`+no+`</td>
                            <td class='isi_laporan'>`+line2.no_beli+`</td>
                            <td class='isi_laporan'>`+line2.tanggal+`</td>
                            <td class='isi_laporan'>`+line2.vendor+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.nilai))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.nilai_ppn))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.total))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.bayar))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.saldo_hutang))+`</td>
                            </tr>`;	
                            no++;
                            
                        }
                        det+=`<tr>
                        <th colspan='4' class='text-right bold'>Total</th>
                        <th class='bold text-right'>`+number_format(nilai)+`</th>
                        <th class='bold text-right'>`+number_format(nilai_ppn)+`</th>
                        <th class='bold text-right'>`+number_format(total)+`</th>
                        <th class='bold text-right'>`+number_format(bayar)+`</th>
                        <th class='bold text-right'>`+number_format(saldo_hutang)+`</th>
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
   