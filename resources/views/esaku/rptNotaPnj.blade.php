<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad("{{ url('esaku-report/lap-nota-pnj') }}", null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $($form_parent).load("{{ url('esaku-auth/form/blank') }}");
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
            var html = `<div align="center">
            <link rel="stylesheet" href="{{ asset('asset_baru/css/nota_pnj.css?version=_').time() }}" />
            `;
            periode = $periode;
            var lokasi = res.lokasi;
            for(a=0; a< data.length ;a++){
                var row = data[a];
                html+=`<div class="ticket">
                    <table>
                        <tbody>
                            <tr>
                                <td class="judul2">${row.nama}</td>
                            </tr>
                            <tr>
                                <td class="judul">${row.alamat}</td>
                            </tr>
                        
                        </tbody>
                    </table>
                    <hr class="dotted">
                    <table>
                        <tbody>
                            <tr>
                                <td class="kolom4">No Bukti: ${row.no_jual}</td>
                            </tr>
                            <tr>
                                <td class="kolom4">Kasir: ${row.nik_user}</td>
                            </tr>
                            <tr>
                                <td class="kolom4">${row.tgl_print}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="dotted">
                    <table>
                        <tbody>`;
                        var det ='';
                        var jumlah = 0;
                        var total = 0;
                        for(var i=0; i < row.detail.length; i++){
                            var row2 = row.detail[i];
                            jumlah+=parseFloat(row2.jumlah);
                            total+=parseFloat(row2.total);
                            det+= `
                            <tr>
                                <td class="kolom5" colspan="3">${row2.nama}</td>
                            </tr>
                            <tr>
                                <td class="quantity2" align='center'>${number_format(row2.jumlah)}x</td>
                                <td class="price" align='right'>${number_format(row2.harga)}</td>
                                <td class="price" align='right'>${number_format(row2.total)}</td>
                            </tr>`;

                        }

                        var total_trans=row.nilai;
                        var total_disk=row.diskon;
                        var total_stlh=row.nilai-row.diskon;
                        var total_byr=row.tobyr;
                        var kembalian=row.tobyr-(total_stlh);
                        html+=det+`
                        </tbody>
                    </table>
                    <hr class="dotted">
                    <table>
                        <tbody>
                            <tr>
                                <td class="kolom2 bold">Total Transaksi</td>
                                <td class="price bold" align='right'>${number_format(total_trans)}</td>
                            </tr>
                            <tr>
                                <td class="kolom2">Total Diskon</td>
                                <td class="price" align='right'>${number_format(total_disk)}</td>
                            </tr>
                            <tr>
                                <td class="kolom2">Total Set. Disk.</td>
                                <td class="price" align='right'>${number_format(total_stlh)}</td>
                            </tr>
                            <tr>
                                <td class="kolom2">Total Bayar</td>
                                <td class="price" align='right'>${number_format(total_byr)}</td>
                            </tr>
                            <tr>
                                <td class="kolom2">Kembalian</td>
                                <td class="price" align='right'>${number_format(kembalian)}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="dotted">
                    <table>
                        <tbody>
                            <tr>
                                <td class="kolom4">Harap periksa belanjaan anda<br/>Barang yang telah dibeli<br/>tidak dapat ditukarkan</td>
                            </tr>
                            <tr>
                                <td class="kolom4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="kolom4">Terima Kasih telah berbelanja di ${row.nama}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>`;
            }  
            html+="</div>"; 
        }
        $($form_parent).html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   