<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('asset_baru/css/nota_pnj.css') }}">
        <title>Receipt example</title>
    </head>
    <body>
        @for($a=0; $a< count($data) ;$a++)
            @php  
                $row = $data[$a];
            @endphp
            <div class="ticket">
                <table>
                    <tbody>
                        <tr>
                            <td class="judul2">{{ $row['nama'] }}</td>
                        </tr>
                        <tr>
                            <td class="judul">{{ $row['alamat'] }}</td>
                        </tr>
                    
                    </tbody>
                </table>
                <hr class="dotted">
                <table>
                    <tbody>
                        <tr>
                            <td class="kolom4">No Bukti : {{ $row['no_jual'] }}</td>
                        </tr>
                        <tr>
                            <td class="kolom4">Kasir : {{ $row['nik_user'] }}</td>
                        </tr>
                        <tr>
                            <td class="kolom4">{{ $row['tgl_print'] }}</td>
                        </tr>
                    
                    
                    </tbody>
                </table>
                <hr class="dotted">
                <table>
                    <tbody>
                    @php 
                        $det ='';
                        $jumlah = 0;
                        $total = 0;
                    @endphp
                    @for($i=0; $i < count($row['detail']); $i++)
                        @php
                            $row2 = $row['detail'][$i];
                            $jumlah+=floatval($row2['jumlah']);
                            $total+=floatval($row2['total']);
                        @endphp
                        <tr>
                            <td class="kolom5" colspan="3">{{ $row2['nama'] }}</td>
                        </tr>
                        <tr>
                            <td class="quantity2" align='center'>{{ number_format($row2['jumlah'],0,",",".") }}x</td>
                            <td class="price">{{ number_format($row2['harga'],0,",",".") }}</td>
                            <td class="price" align='right'>{{ number_format($row2['total'],0,",",".") }}</td>
                        </tr>
                    @endfor
                    @php
                        $total_trans=$row['nilai'];
                        $total_disk=$row['diskon'];
                        $total_stlh=$row['nilai']-$row['diskon'];
                        $total_byr=$row['tobyr'];
                        $kembalian=$row['tobyr']-($total_stlh);
                    @endphp
                    </tbody>
                </table>
                <hr class="dotted">
                <table>
                    <tbody>
                        <tr>
                            <td class="kolom2 bold">Total Transaksi</td>
                            <td class="price bold" align='right'>{{ number_format($total_trans,0,",",".") }}</td>
                        </tr>
                        <tr>
                            <td class="kolom2">Total Diskon</td>
                            <td class="price" align='right'>{{ number_format($total_disk,0,",",".") }}</td>
                        </tr>
                        <tr>
                            <td class="kolom2">Total Set. Disk.</td>
                            <td class="price" align='right'>{{ number_format($total_stlh,0,",",".") }}</td>
                        </tr>
                        <tr>
                            <td class="kolom2">Total Bayar</td>
                            <td class="price" align='right'>{{ number_format($total_byr,0,",",".") }}</td>
                        </tr>
                        <tr>
                            <td class="kolom2">Kembalian</td>
                            <td class="price" align='right'>{{ number_format($kembalian,0,",",".") }}</td>
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
                            <td class="kolom4">Terima Kasih telah berbelanja di {{ $row['nama'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endfor 
    </body>
</html>