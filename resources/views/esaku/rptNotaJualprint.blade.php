<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nota Penjualan</title>
        <style>
            .size_judul{
              font-size:12px;
            }
            
            .size_isi{
              font-size:10px;
            }

        </style>
        <style media="print">
            
            #nonPrint
            {
               display:none;
            }
        </style>
    </head>
    <body onload="window.print()">
    @if(isset($data))
    @for($a=0; $a < count($data); $a++)
    @php  $line2 = $data[$a];  @endphp
    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td colspan='2' align='center' class='size_judul'>TJ Mart</td>
        </tr>
        <tr>
          <td colspan='2' align='center' class='size_judul'>Jl.Sumur Bandung No. 12</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align='right'>&nbsp;</td>
        </tr>
    </table>
    <table width='100%' border='0' cellspacing='0' cellpadding='0' id='table-det' style='padding-bottom:20px'>
        @for($i=0; $i< count($data[$a]['detail']) ;$i++)
            @php
                $line = $data[$a]['detail'][$i];
                $sub=($line['harga']*$line['jumlah'])-$line['diskon']; 
            @endphp
            <tr>
            <td width='100%' class='size_isi' colspan="3">{{ $line['nama'] }}</td>
            </tr>
            <tr>
            <td width='30%' class='size_isi'>{{ number_format($line['jumlah'],0,",",".") }}x </td>
            <td width='30%' class='size_isi'>{{ number_format($line['harga'],0,",",".") }}</td>
            <td width='40%' align='right' class='size_isi'>{{ number_format($line['total'],0,",",".") }}</td>
            </tr>
        @endfor
        @php 
            $total_trans=$line2['nilai'];
            $total_disk=$line2['diskon'];
            $total_stlh=$line2['nilai']-$line2['diskon'];
            $total_byr=$line2['tobyr'];
            $kembalian=$line2['tobyr']-($total_stlh);
        @endphp
      </table>
      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td class='size_isi'>Total Transaksi</td>
          <td align='right' class='size_isi' id='totrans'>{{ number_format($total_trans,0,",",".") }}</td>
        </tr>
        <tr>
          <td class='size_isi'>Total Diskon</td>
          <td align='right' class='size_isi' id='todisk'>{{ number_format($total_disk,0,",",".") }}</td>
        </tr>
        <tr>
          <td class='size_isi'>Total Set. Disc</td>
          <td align='right' class='size_isi' id='tostlh'>{{ number_format($total_stlh,0,",",".") }}</td>
        </tr>
        <tr>
          <td class='size_isi'>Total Bayar</td>
          <td align='right' class='size_isi' id='tobyr'>{{ number_format($total_byr,0,",",".") }}</td>
        </tr>
        <tr>
          <td class='size_isi'>Kembalian</td>
          <td align='right' class='size_isi' id='kembali'>{{ number_format($kembalian,0,",",".") }}</td>
        </tr>
        <tr>
          <td class='size_isi'>&nbsp;</td>
          <td align='right' class='size_isi'>&nbsp;</td>
        </tr>
        <tr>
        <tr>
          <td class='size_isi' colspan='2' id='no_bukti'>{{ $line2['no_jual'] }}</td>
        </tr>
        <tr>
          <td class='size_isi' colspan='2' id='tgl'>{{ $line2['tanggal'] }}</td>
        </tr>
        <tr>
          <td class='size_isi'>Kasir:<span id='nik'>{{ $line2['nik_user'] }}</span></td>
          <td class='size_isi'></td>
        </tr>
        <tr>
          <td class='size_isi'>&nbsp;</td>
          <td align='right' class='size_isi'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='2' align='center' class='size_judul'>Terima Kasih </td>
        </tr>
      </table>
      <div style="height:50px;border-bottom:1px dashed black;">&nbsp;</div>
      @endfor
      @endif
      {{-- <a href='#' id='nonPrint' class='btn btn-secondary' style='margin-top:20px'><i class='fa fa-arrow-left'></i> Back </a> --}}
    </body>
</html>                
