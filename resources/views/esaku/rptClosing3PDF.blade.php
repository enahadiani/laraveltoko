<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajun Beban</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        body{
            text-align:left;
            font-size: 0.8rem !important;
            margin:0;
            font-family: 'Roboto', sans-serif !important;
        }
        .row{
            padding-right : 15px;
            padding-left : 15px;
        }
        .no-bukti{
            padding: 10px;
        }
        table{
            border-collapse:collapse;
            width: 100%;
            margin-bottom: 8px;
            color: #3a3a3a;
            padding: .75rem;
        }
        th, td {
            padding: 6px;
        }   
        .tabel-detail thead th{
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .tabel-detail th, .tabel-detail td {
            border-color: #f3f3f3 !important;
            border-top: 1px solid #dee2e6;
            font-size: 0.8rem !important;
        }
        h3{
            margin:0px;
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-size: 1.75rem !important;
        }
        h3 span{
            font-size: 0.8rem !important;
            font-weight: 500 !important;
        }
        hr{
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
        .text-center{
            text-align:center;
        }
        .text-right{
            text-align:right;
        }
    </style>
</head>
<body>
    @php
        $data = $data;
        $html = "";
        $arr_tl = [0,0,0,0,0,0,0,0,0];
        $x=1; 
        // echo '<pre>'; print_r($data); echo '</pre>';
    @endphp
    @if(count($data) > 0)
        @php
            $no_id = 1;
        @endphp
        <div>
            @for($i=0; $i < count($data); $i++) 
                @php
                    $row = $data[$i];
                    $diskon = 0;
                    $total = 0;
                    $subTot = 0;
                    $no = 1;
                    $totalPenj = floatval($row['saldo_awal']) + floatval($row['total_pnj']);
                    // echo '<pre>'; print_r($totalPenj); echo '</pre>';

                @endphp
                <div class="no-bukti" style="margin-bottom: 32px;">
                    <div class="row">
                        <h3>
                            <b>No Closing</b>
                            <span>#{{ $row['no_bukti_close'] }}</span>
                        </h3>
                        <hr/>
                        <table>
                            <tbody>
                            <tr>
                                    <td style="width: 151px;">Saldo Awal</td>
                                    <td>: {{ number_format($row['saldo_awal'],0,",",".") }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 151px;">Kasir</td>
                                    <td>: {{ $row['nik_user'] }}</td>
                                </tr>    
                                <tr>
                                    <td style="width: 151px;">No Open Kasir</td>
                                    <td>: {{ $row['no_bukti_open'] }}</td> <br>
                                    <td style="width: 151px;">Waktu</td>
                                    <td>: {{ $row['tanggal_open'] }} {{ $row['jam_open'] }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 151px;">No Closing Kasir</td>
                                    <td>: {{$row['no_bukti_close']}}</td>
                                    <td style="width: 151px;">Waktu</td>
                                    <td>: {{$row['tanggal_close']}} {{$row['jam_close']}}</td>
                                </tr>
                            </tbody>
                        </table>      
                    </div>   
                    <div class="row">
                        <table class="tabel-detail">
                            <thead>
                            <tr>
                                <th class="text-center" rowspan='2'>No</th>       
                                <th class="text-center" rowspan='2'>No Jual</th>    
                                <th class="text-center" rowspan='2'>Periode</th>    
                                <th class="text-center" rowspan='2'>Tanggal</th>    
                                <th class="text-center" colspan='3'>Nilai</th>   
                            </tr>
                            <tr>
                                <th width='80' class='header_laporan text-center'>Cash</th>
                                <th width='80' class='header_laporan text-center'>Qris</th>
                                <th width='80' class='header_laporan text-center'>Link Aja</th>
                            </tr>  
                            </thead>
                            <tbody>
                                @php
                                    $cash=0; $link_aja=0; $qris=0; $total=0;
                                    // echo '<pre> res :'; print_r($res['data_detail']); echo '</pre>';

                                @endphp
                                @for($j=0;$j<count($res['data_detail']);$j++)
                                    @php
                                        $detail = $res['data_detail'][$j];
                                        // echo '<pre>'; print_r($detail); echo '</pre>';
                                    @endphp
                                    @if ($row['no_bukti_close'] == $detail['no_bukti'])
                                        @php
                                            $diskon = floatval($detail['diskon']) + $diskon;
                                            $total+= floatval($detail['cash']) + floatval($detail['qris']) + floatval($detail['link_aja']);
                                            $cash+= floatval($detail['cash']);
                                            $qris+= floatval($detail['qris']);
                                            $link_aja+= floatval($detail['link_aja']);
                                            // $subTot = floatval($detail['nilai']) - floatval($detail['diskon']);
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>        
                                            <td class="text-center">{{ $detail['no_jual'] }}</td>    
                                            <td class="text-center">{{ $detail['periode'] }}</td>    
                                            <td class="text-center">{{ $detail['tanggal'] }}</td>     
                                            <td class="text-right">{{ number_format($detail['cash'],0,",",".") }}</td>   
                                            <td class="text-right">{{ number_format($detail['qris'],0,",",".") }}</td>   
                                            <td class="text-right">{{ number_format($detail['link_aja'],0,",",".") }}</td>   
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endif
                                @endfor
                            </tbody>
                            <tr>
                                <td class="text-right" colspan="5"><b>{{ number_format($cash,0,",",".") }}</b></td>    
                                <td class="text-right" ><b>{{ number_format($qris,0,",",".") }}</b></td>    
                                <td class="text-right" ><b>{{ number_format($link_aja,0,",",".")  }}</b></td>    
                            </tr>
                            <tr>
                                <td class="text-right" colspan="5">Total Nilai</td>    
                                <td>:</td>
                                <td class="text-right"><b>{{ number_format($total,0,",",".") }}</b></td>    
                            </tr>
                        </table>    
                    </div>
                </div>
                @if($i != (count($data)-1))
                <DIV style='page-break-after:always'></DIV>
                @endif
            @endfor
            {{-- <div style='page-break-after:always'></div> --}}
        </div>
        
        
    @endif

</body>
</html>