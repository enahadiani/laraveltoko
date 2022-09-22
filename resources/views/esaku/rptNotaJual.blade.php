<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-nota-jual', null, formData, null, function(res){
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
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                td{
                    padding:2px !important;
                }
                .bold {
                    font-weight:bold;
                }
                @media print{
                    @page  
                    { 
                        size: auto;   /* auto is the initial value */ 
                        /* this affects the margin in the printer settings */ 
                        margin: 0mm 5mm 0mm 5mm !important;  
                    } 
                }   
            </style>
            `;
            periode = $periode;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN NOTA PENJUALAN","",'Periode '+periode.fromname);
            for(a=0; a< data.length ;a++){
                var line2 = data[a];
            html+=`
            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                <td colspan='2' align='center' class='size_judul'>${line2.nama}</td>
                </tr>
                <tr>
                <td colspan='2' align='center' class='size_judul'>${line2.alamat}</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td align='right'>&nbsp;</td>
                </tr>
            </table>
            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0' id='table-det' style='padding-bottom:20px'>`;
                var det = '';
                for(i=0; i< line2.detail.length ;i++){
                    var line = line2.detail[i];
                    var sub=(line['harga']*line['jumlah'])-line['diskon']; 
                    det+=`
                    <tr>
                    <td width='100%' class='size_isi' colspan="3">`+line.nama+`</td>
                    </tr>
                    <tr>
                    <td width='30%' class='size_isi'>`+sepNum(line.jumlah)+`x </td>
                    <td width='30%' class='size_isi'>`+sepNum(line.harga)+`</td>
                    <td width='40%' align='right' class='size_isi'>`+sepNum(line.total)+`</td>
                    </tr>`;
                } 
                var total_trans=line2.nilai;
                var total_disk=line2.diskon;
                var total_stlh=line2.nilai-line2.diskon;
                var total_byr=line2.tobyr;
                var kembalian=line2.tobyr-(total_stlh);
            html+=det+`
            </table>
            <table class="mx-auto" width='35%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                <td class='size_isi'>Total Transaksi</td>
                <td align='right' class='size_isi' id='totrans'>`+sepNum(total_trans)+`</td>
                </tr>
                <tr>
                <td class='size_isi'>Total Diskon</td>
                <td align='right' class='size_isi' id='todisk'>`+sepNum(total_disk)+`</td>
                </tr>
                <tr>
                <td class='size_isi'>Total Set. Disc</td>
                <td align='right' class='size_isi' id='tostlh'>`+sepNum(total_stlh)+`</td>
                </tr>
                <tr>
                <td class='size_isi'>Total Bayar</td>
                <td align='right' class='size_isi' id='tobyr'>`+sepNum(total_byr)+`</td>
                </tr>
                <tr>
                <td class='size_isi'>Kembalian</td>
                <td align='right' class='size_isi' id='kembali'>`+sepNum(kembalian)+`</td>
                </tr>
                <tr>
                <td class='size_isi'>&nbsp;</td>
                <td align='right' class='size_isi'>&nbsp;</td>
                </tr>
                <tr>
                <tr>
                <td class='size_isi' colspan='2' id='no_bukti'>`+line2.no_jual+`</td>
                </tr>
                <tr>
                <td class='size_isi' colspan='2' id='tgl'>`+line2.tanggal+`</td>
                </tr>
                <tr>
                <td class='size_isi'>Kasir:<span id='nik'>`+line2.nik_user+`</span></td>
                <td class='size_isi'></td>
                </tr>
                <tr>
                <td class='size_isi'>&nbsp;</td>
                <td align='right' class='size_isi'>&nbsp;</td>
                </tr>
                <tr>
                <td colspan='2' align='center' class='size_judul'>Terima Kasih </td>
                </tr>
            </table>`;
            }  
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   