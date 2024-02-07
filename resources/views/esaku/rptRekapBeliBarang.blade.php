<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-rekap-beli-perbrg') }}", null, formData, null, function(res){
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
        var dataRes = res.res;
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

            for(var i=0;i<data.length;i++) {
                var row = data[i];
                var total=0; 
                var det = '';
                if(from != undefined){
                    var no=from+1;
                }else{
                    var no=1;
                }
                var tot_harga=0;
                var tot_jumlah=0;
                var tot_total=0;
                var stok=0;
                var nilai_stok=0;
                html+=`

                <div class="card card-body" style="margin-bottom: 50px;">
                    <table class="borderless mb-2 table-header" style="width:100%;" >
                        <tr>
                            <td colspan="3" class="vtop" style='width:500px'><h6 class="text-primary bold">TJ MART</h6></td>
                            <td colspan="12" class="vtop" style='width:1320px'>&nbsp;</td>
                            <td class="vmiddle text-center" style='width:120px'></td>
                        </tr>
                        <tr>
                            <td colspan="3" >LAPORAN REKAP PEMBELIAN PER BARANG</td>
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
                            <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+row.kode_gudang+`</td>
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
                    <div class='table-responsive'>
                        <table width='100%' class='table table-bordered table-striped'>
                            <thead>
                            <tr>
                                <th width='20' class='header_laporan text-center' style='text-transform:uppercase'>No</th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Tanggal</th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Barang</th>
                                <th width='200' class='header_laporan text-center' style='text-transform:uppercase'>Nama Barang </th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Kode Gudang</th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Harga</th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Jumlah</th>
                                <th width='80' class='header_laporan text-center' style='text-transform:uppercase'>Total</th>
                            </tr>
                            </thead>
                            <tbody>`;
                                
                                for (var x=0;x<dataRes.data_detail.length;x++)
                                {
                                    var row2 = dataRes.data_detail[x];
                                    if(row.kode_gudang == row2.kode_gudang) {
                                        tot_harga+=parseFloat(row2.harga);
                                        tot_jumlah+=parseFloat(row2.jumlah);
                                        tot_total+=parseFloat(row2.total);
                                        det+=`<tr>
                                        <td align='center' class='isi_laporan'>`+no+`</td>
                                        <td class='isi_laporan'>`+row2.tanggal+`</td>
                                        <td class='isi_laporan'>`+row2.kode_barang+`</td>
                                        <td class='isi_laporan'>`+row2.nama+`</td>
                                        <td class='isi_laporan'>`+row2.kode_gudang+`</td>
                                        <td  class='isi_laporan text-right'>`+number_format(parseFloat(row2.harga))+`</td>
                                        <td  class='isi_laporan text-right'>`+number_format(parseFloat(row2.jumlah))+`</td>
                                        <td  class='isi_laporan text-right'>`+number_format(parseFloat(row2.total))+`</td>
                                        </tr>`;	
                                        no++;
                                    }
                                }
                                det+=`<tr>
                                <th colspan='5' class='text-right bold'>Total</th>
                                <th class='bold text-right'>`+number_format(tot_harga)+`</th>
                                <th class='bold text-right'>`+number_format(tot_jumlah)+`</th>
                                <th class='bold text-right'>`+number_format(tot_total)+`</th>
                                </tr>`;
                                html+=det+`
                            </tbody>
                            </table>
                        <DIV style='page-break-after:always'></DIV>
                    </div>
                </div>`;
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   