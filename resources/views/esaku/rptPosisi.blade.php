<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('siaga-report/lap-jurnal', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('siaga-auth/form/blank') }}");
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
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            periode = $periode;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN TRANSAKSI JURNAL",lokasi,'Periode '+periode.fromname)+`
                <table width='100%' class='table table-bordered'>
                    <tr>
                        <td width='20'  class='header_laporan' align='center'>No</td>
                        <td width='80' class='header_laporan' align='center'>No Bukti</td>
                        <td width='80' class='header_laporan' align='center'>No Dokumen</td>
                        <td width='50' class='header_laporan' align='center'>Tanggal</td>
                        <td width='70' height='25' class='header_laporan' align='center'>Akun</td>
                        <td width='200' class='header_laporan' align='center'>Nama Akun </td>
                        <td width='40' class='header_laporan' align='center'>PP</td>
                        <td width='40' class='header_laporan' align='center'>Modul</td>
                        <td width='250' class='header_laporan' align='center'>Keterangan</td>
                        <td width='80' class='header_laporan' align='center'>Debet</td>
                        <td width='80' class='header_laporan' align='center'>Kredit</td>
                    </tr>`;
                        var total=0; 
                        var det = '';
                        if(from != undefined){
                            var no=from+1;
                        }else{
                            var no=1;
                        }
                        var first = true;
                        var debet=0; var kredit=0;var beda ='';var tmp='';
                        for (var x=0;x<data.length;x++)
                        {
                            var line2 = data[x];
                            
                            if(res.sumju == "Ya"){
                                
                                beda = tmp!=line2.no_bukti; 
                                if (tmp!=line2.no_bukti)
                                {
                                    tmp=line2.no_bukti;
                                    first = true;
                                    
                                    if (no>1)
                                    {
                                        debet=0;kredit=0;no=1;
                                        det+=`<tr>
                                        <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                                        <td class='bold' align='right'>`+ndebet+`</td>
                                        <td class='bold' align='right'>`+nkredit+`</td>
                                        </tr>`;
                                    }
                                    
                                }
                            }
                            
                            
                            debet=debet+parseFloat(line2.debet);
                            kredit=kredit+parseFloat(line2.kredit);
                            ndebet=sepNum(debet);
                            nkredit=sepNum(kredit);
                            
                            det+=`<tr>
                            <td align='center' class='isi_laporan'>`+no+`</td>
                            <td  class='isi_laporan'>`+line2.no_bukti+`</td>
                            <td class='isi_laporan'>`+line2.no_dokumen+`</td>
                            <td class='isi_laporan'>`+line2.tgl+`</td>
                            <td class='isi_laporan'>`+line2.kode_akun+`</td>
                            <td  class='isi_laporan'>`+line2.nama_akun+`</td>
                            <td  class='isi_laporan'>`+line2.kode_pp+`</td>
                            <td  class='isi_laporan'>`+line2.modul+`</td>
                            <td  class='isi_laporan'>`+line2.keterangan+`</td>
                            <td  class='isi_laporan'>`+sepNum(parseFloat(line2.debet))+`</td>
                            <td  class='isi_laporan'>`+sepNum(parseFloat(line2.kredit))+`</td>
                            </tr>`;	
                            first = true;
                            no++;
                            
                            
                        }
                        ndebet=sepNum(debet);
                        nkredit=sepNum(kredit);
                        if(res.sumju == "Ya"){
                            
                            det+=`<tr>
                            <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                            <td class='bold' align='right'>`+ndebet+`</td>
                            <td class='bold' align='right'>`+nkredit+`</td>
                            </tr>`;
                        }else{
                            det+=`<tr>
                            <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                            <td class='bold' align='right'>`+sepNum(debet)+`</td>
                            <td class='bold' align='right'>`+sepNum(kredit)+`</td>
                            </tr>`;
                        }
                        html+=det+`
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   