<?php
    namespace App\Http\Controllers\Esaku\Inventori;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;
    use PDF;
    
    use Mike42\Escpos\Printer;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
    
    class LaporanController extends Controller {


        public function __contruct() {
            if(!Session::get('login')){
            return redirect('esaku-auth/login');
            }
        }

        function buatBaris3KolomBarang($kolom1, $kolom2, $kolom3) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 26;
            $lebar_kolom_2 = 2;
            $lebar_kolom_3 = 2;
        
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
        
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
        
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));
        
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
        
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
        
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
        
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
        
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
            }
        
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode("\n",$hasilBaris) . "\n";
        } 

        function buatBaris2Kolom($kolom1, $kolom2, $kolom3) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 18;
            $lebar_kolom_2 = 0;
            $lebar_kolom_3 = 8;
        
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
        
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
        
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));
        
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
        
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
        
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
        
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
        
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
            }
        
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode("\n",$hasilBaris) . "\n";
        } 

        function buatBaris3Kolom($kolom1, $kolom2, $kolom3) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 10;
            $lebar_kolom_2 = 8;
            $lebar_kolom_3 = 8;
        
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
        
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
        
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));
        
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
        
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
        
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
        
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
        
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
            }
        
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode("\n",$hasilBaris) . "\n";
        } 

        function getNamaBulan($no_bulan){
            switch ($no_bulan){
                case 1 : case '1' : case '01': $bulan = "Januari"; break;
                case 2 : case '2' : case '02': $bulan = "Februari"; break;
                case 3 : case '3' : case '03': $bulan = "Maret"; break;
                case 4 : case '4' : case '04': $bulan = "April"; break;
                case 5 : case '5' : case '05': $bulan = "Mei"; break;
                case 6 : case '6' : case '06': $bulan = "Juni"; break;
                case 7 : case '7' : case '07': $bulan = "Juli"; break;
                case 8 : case '8' : case '08': $bulan = "Agustus"; break;
                case 9 : case '9' : case '09': $bulan = "September"; break;
                case 10 : case '10' : case '10': $bulan = "Oktober"; break;
                case 11 : case '11' : case '11': $bulan = "November"; break;
                case 12 : case '12' : case '12': $bulan = "Desember"; break;
                default: $bulan = null;
            }
    
            return $bulan;
        }

        function lastOfMonth($year, $month) {
            return date("d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
        }

        public function getRekapJual(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-rekap-jual',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'tanggal' => $request->tanggal,
                        'nik_kasir' => $request->nik_kasir,
                        'gudang' => $request->kode_gudang
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getRekapJualSetor(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-rekap-jualstr',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'nik_kasir' => $request->nik_kasir,
                         'gudang' => $request->kode_gudang
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                     $res['back']=true;
                 }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getRekapBeli(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-rekap-beli',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'tanggal' => $request->tanggal,
                         'kode_vendor' => $request->kode_vendor
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                     $res['back']=true;
                 }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getSaldoStok(Request $request) {
           try{

                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-saldo-stok',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'tanggal' => $request->tanggal,
                        'kode_gudang' => $request->kode_gudang
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->tanggal != ""){
                    $tanggal = $request->tanggal;
                }else{
                    $tanggal = "Semua tanggal";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'tanggal'=>$tanggal,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getKartuStok(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-kartu-stok',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_gudang' => $request->kode_gudang,
                        'kode_klp' => $request->kode_klp,
                        'kode_barang' => $request->kode_barang
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'back'=>$back,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getStok(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-stok',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_klp' => $request->kode_klp,
                         'kode_barang' => $request->kode_barang
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getKartu(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap_kartu',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res['data'];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }
        
        public function getSaldo(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap_saldo',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'kode_pp' => $request->kode_pp
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res['data'];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getPenjualanHarian(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-penjualan-harian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'tanggal' => $request->tanggal,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getPenjualanHarianV2(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-penjualan-harian-v2',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'tanggal' => $request->tanggal,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getReturBeli(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-retur-beli',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }

                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        
        public function getReturJual(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-retur-jual',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'nik_kasir' => $request->nik_kasir,
                         'no_bukti' => $request->no_bukti
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                     $res['back']=true;
                 }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getBarang(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-barang',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_gudang' => $request->kode_gudang,
                        'kode_barang' => $request->kode_barang,
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->kode_barang != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getClosing(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-closing',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'nik_kasir' => $request->nik_kasir,
                        'tanggal' => $request->tanggal,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getClosingPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\Inventori\LaporanController')->getClosing($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            if($request->periode != ""){
                $periode = $request->periode;
            }else{
                $periode = "Semua Periode";
            }

            // return view('esaku.rptClosing3PDF',['data'=>$data["result"],'periode'=>$periode,'sumju'=>$data['sumju'],'res'=>$data['res']]);
            $pdf = PDF::loadview('esaku.rptClosing3PDF',['data'=>$data["result"],'periode'=>$periode,'sumju'=>$data['sumju'],'res'=>$data['res']])->setPaper('a4', 'landscape');
            return $pdf->download('laporan-closing-pdf.pdf');   
        }

        public function getPembelian(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-pembelian',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'nik_kasir' => $request->nik_kasir,
                        'kode_gudang' => $request->kode_gudang,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function getFakturPnj(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-faktur-pnj',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'tangal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                         'no_bukti' => $request->no_bukti
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                     $res['back']=true;
                 }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getPenjualan(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-penjualan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'tanggal' => $request->tanggal,
                        'nik_kasir' => $request->nik_kasir,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                }
                if($request->periode != ""){
                    $periode = $request->periode;
                }else{
                    $periode = "Semua Periode";
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        
        function getNrcLajur(Request $request){
            try{
                
                $client = new Client();
        
                if(isset($request->jenis)){
                    $jenis = $request->jenis;
                }else{
                    $jenis = "";
                }
        
                if(isset($request->trail)){
                    $trail = $request->trail;
                }else{
                    $trail = "";
                }
        
                if(isset($request->kode_neraca)){
                    $kode_neraca = $request->kode_neraca;
                }else{
                    $kode_neraca = "";
                }
        
                if(isset($request->kode_fs)){
                    $kode_fs = $request->kode_fs;
                }else{
                    $kode_fs = "";
                }
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'jenis' => $jenis,
                    'trail' => $trail,
                    'kode_neraca' => $kode_neraca,
                    'kode_fs' => $kode_fs,
                    'nik_user' => Session::get('nikUser')
                ];
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nrclajur',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $query
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
        
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true,'lokasi'=>$lokasi, 'auth_status'=>1,'back'=>$back], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getSaldoKB(Request $request){
            try{
                
                $client = new Client();
        
                if(isset($request->jenis)){
                    $jenis = $request->jenis;
                }else{
                    $jenis = "";
                }
        
                if(isset($request->trail)){
                    $trail = $request->trail;
                }else{
                    $trail = "";
                }
        
                if(isset($request->kode_neraca)){
                    $kode_neraca = $request->kode_neraca;
                }else{
                    $kode_neraca = "";
                }
        
                if(isset($request->kode_fs)){
                    $kode_fs = $request->kode_fs;
                }else{
                    $kode_fs = "";
                }
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'jenis' => $jenis,
                    'trail' => $trail,
                    'kode_neraca' => $kode_neraca,
                    'kode_fs' => $kode_fs,
                    'nik_user' => Session::get('nikUser')
                ];
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-saldo-kb',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $query
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
        
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true,'lokasi'=>$lokasi, 'auth_status'=>1,'back'=>$back], 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getSaldoKBPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getSaldoKB($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('esaku.rptKbSaldoPDF',['data'=>$data["result"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-saldo-kb-pdf');   
        }

        function getBuktiJurnal(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-buktijurnal',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'modul' => $request->modul,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $detail = $res["detail_jurnal"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'detail_jurnal'=>$detail,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getBuktiJurnalPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getBuktiJurnal($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptBuktiJurnalPDF',['data'=>$data["result"],'periode'=>$periode,'lokasi'=>$data['lokasi'],'detail_jurnal'=>$data["detail_jurnal"]]);
            return $pdf->download('laporan-bukti-jurnal-pdf');   
        }

        function getBuktiJurnalKB(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-buktijurnal-kb',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $detail = $res["detail_jurnal"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'detail_jurnal'=>$detail,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getBuktiJurnalKBPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getBuktiJurnalKB($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptKbBuktiPDF',['data'=>$data["result"],'detail'=>$data["detail_jurnal"],'periode'=>$periode,'sumju'=>$request->sum_ju[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-bukti-kas-pdf');   
        }

        function getJurnal(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-jurnal',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'modul' => $request->modul,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sum_ju[1],'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getJurnalPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getJurnal($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptJurnalPDF',['data'=>$data["result"],'periode'=>$periode,'sumju'=>$request->sum_ju[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-jurnal-pdf');   
        }

        function getJurnalKB(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-jurnal-kb',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'no_bukti' => $request->no_bukti,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    $lokasi = $res["lokasi"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1, 'sumju'=>$request->sum_ju[1],'lokasi'=>$lokasi,'back'=>$back], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        function getJurnalKBPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getJurnalKB($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptKbJurnalPDF',['data'=>$data["result"],'periode'=>$periode,'sumju'=>$request->sum_ju[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-jurnal-kb-pdf');   
        }
    
        function getBukuBesar(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-bukubesar',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'mutasi' => $request->mutasi,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $detail = $res["data_detail"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'detail'=>$detail,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getBukuBesarPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getBukuBesar($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('esaku.rptBukuBesarPDF',['data'=>$data["result"],'detail'=>$data["detail"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-bukubesar-pdf');   
        }

        function getBukuKas(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-buku-kb',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'tgl_awal' => $request->tgl_awal,
                        'tgl_akhir' => $request->tgl_akhir,
                        'mutasi' => $request->mutasi,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $detail = $res["data_detail"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'detail'=>$detail,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getBukuKasPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getBukuKas($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            
            $pdf = PDF::loadview('esaku.rptKbBukuBesarPDF',['data'=>$data["result"],'detail'=>$data["detail"],'periode'=>$request->periode[1],'lokasi'=>$data["lokasi"]]);
    	    return $pdf->download('laporan-bukubesar-kb-pdf');   
        }


        function getNeraca(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-neraca',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }
        
        function getNeracaPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNeraca($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $pdf = PDF::loadview('esaku.rptNeracaPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode]);
    	    return $pdf->download('laporan-neraca-pdf');   
        }

        function getLabaRugi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-labarugi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'format' => $request->format,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $pdf = PDF::loadview('esaku.rptLabaRugiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode]);
    	    return $pdf->download('laporan-labarugi-pdf');   
        }

        function sendMail(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'periode' => $request->periode,
                    'kode_akun' => $request->kode_akun,
                    'email' => $request->email
                ];
        
                $response = $client->request('POST',  config('api.url').'esaku-report/send-laporan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                        'Content-Type'     => 'application/json',
                    ],
                    'body' => json_encode($query)
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res;
                }

                return response()->json($data, 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            } 
        }


        function sendNrcLajur(Request $request){
            try{
                
                $client = new Client();
                
                $query = [
                    'from' => 'devsaku5@gmail.com',
                    'to' => $request->email,
                    'html' => $request->html,
                    'text' => 'Berikut ini kami lampirkan laporan neraca lajur:',
                    'subject' => 'Laporan Neraca Lajur [SAI Esaku]'
                ];
        
                $response = $client->request('POST',config('api.url').'esaku-report/send-email',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                    ],
                    'form_params' => $query
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res;
                }

                return response()->json($data, 200);    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res, 'status'=>false], 200);
                // var_dump($response);
            } 
        }

        function getNeracaKomparasi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-neraca-komparasi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'periode2' => $request->periode2,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2));
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'tgl_akhir'=>$tgl_akhir,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeracaKomparasiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNeracaKomparasi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $periode2 = $request->periode2[1];
            $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptNeracaKomparasiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'tgl_akhir'=>$tgl_akhir,'periode' => $periode, 'periode2' => $periode2]);
    	    return $pdf->download('laporan-neraca-komparasi-pdf');   
        }

        function getLabaRugiKomparasi(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-labarugi-komparasi',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'periode2' => $request->periode2,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                
                $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back,'tgl_akhir' => $tgl_akhir], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiKomparasiPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugiKomparasi($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $periode = $request->periode[1];
            $periode2 = $request->periode2[1];
            $tgl_akhir = $this->lastOfMonth(substr($request->periode[1],0,4),substr($request->periode[1],4,2)). ' '.$this->getNamaBulan(substr($request->periode[1],4,2)).' '.substr($request->periode[1],0,4);
            $pdf = PDF::loadview('esaku.rptLabaRugiKomparasiPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode'=>$periode,'periode2' => $periode2,'tgl_akhir' => $tgl_akhir]);
    	    return $pdf->download('laporan-labarugi-komparasi-pdf');   
        }

        function getNrcLajurBulan(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nrclajur-bulan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_akun' => $request->kode_akun,
                        'jenis' => $request->mutasi,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNrcLajurBulanPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNrcLajurBulan($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $pdf = PDF::loadview('esaku.rptNrcLajurBulanPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode' => $request->periode[1]])->setPaper('f4', 'landscape');
    	    return $pdf->download('laporan-nrclajur-bulan-pdf');   
        }

        function getLabaRugiBulan(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-labarugi-bulan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiBulanPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugiBulan($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $pdf = PDF::loadview('esaku.rptLabaRugiBulanPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode' => $request->periode[1]])->setPaper('f4', 'landscape');
    	    return $pdf->download('laporan-labarugi-bulan-pdf');   
        }

        function getNeracaBulan(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-neraca-bulan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getNeracaBulanPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getNeracaBulan($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $pdf = PDF::loadview('esaku.rptNeracaBulanPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'periode' => $request->periode[1]])->setPaper('f4', 'landscape');
    	    return $pdf->download('laporan-neraca-bulan-pdf');   
        }

        function getCOA(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-coa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_fs' => $request->kode_fs,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getCOAPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getCOA($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $data2 = (isset($data["res"]["data2"]) ? $data["res"]["data2"] : array()) ;
            $data3 = (isset($data["res"]["data3"]) ? $data["res"]["data3"] : array());
            $pdf = PDF::loadview('esaku.rptCOAPDF',['data'=>$data["result"],'data2' => $data2,'data3' => $data3,'lokasi'=>Session::get('namaLokasi')]);
    	    return $pdf->download('laporan-coa-pdf');   
        }

        function getCOAStruktur(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-coa-struktur',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_fs' => $request->kode_fs,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getCOAStrukturPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getCOAStruktur($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $data2 = (isset($data["res"]["data2"]) ? $data["res"]["data2"] : array()) ;
            $data3 = (isset($data["res"]["data3"]) ? $data["res"]["data3"] : array());
            $pdf = PDF::loadview('esaku.rptCOAStrukturPDF',['data'=>$data["result"],'data2' => $data2,'data3' => $data3,'lokasi'=>Session::get('namaLokasi')]);
    	    return $pdf->download('laporan-coa-struktur-pdf');   
        }

        function getLabaRugiUnit(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-labarugi-unit',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'kode_pp' => $request->kode_pp,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiUnitPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugiUnit($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $detail = $data['res']['detail'];
            $pdf = PDF::loadview('esaku.rptLabaRugiUnitPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'detail'=>$detail,'periode' => $request->periode[1]])->setPaper('f4', 'landscape');
    	    return $pdf->download('laporan-labarugi-unit-pdf');   
        }

        function getLabaRugiUnitDC(Request $request){
            try{
    
                $client = new Client();
        
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-labarugi-unit-dc',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'kode_fs' => $request->kode_fs,
                        'level' => $request->level,
                        'kode_pp' => $request->kode_pp,
                        'id' => $request->id,
                        'nik_user' => Session::get('nikUser')
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res["data"];
                    $lokasi = $res["lokasi"];
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'res'=>$res,'lokasi'=>$lokasi,'back'=>$back], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
           
        }

        function getLabaRugiUnitDCPDF(Request $request)
        {
            set_time_limit(300);
            $tmp = app('App\Http\Controllers\Esaku\LaporanController')->getLabaRugiUnitDC($request);
            $tmp = json_decode(json_encode($tmp),true);
            $data = $tmp['original'];
            $detail = $data['res']['detail'];
            $pdf = PDF::loadview('esaku.rptLabaRugiUnitDCPDF',['data'=>$data["result"],'lokasi'=>Session::get('namaLokasi'),'detail'=>$detail,'periode' => $request->periode[1]])->setPaper('f4', 'landscape');
    	    return $pdf->download('laporan-labarugi-unit-dc-pdf');   
        }

        function getNotaJual(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nota-jual',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'periode' => $request->periode,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function printNotaJual(Request $request) {
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nota-jual',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $request->all()
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                }
                return view('esaku.rptNotaJualprint',$data);
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return dump($res);
            }
        }

        public function getPosisiStok(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-posisi-stok',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'tanggal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_lokasi' => $request->kode_lokasi
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => date('Y-m-d H:i:s'), 'status'=>true, 'auth_status'=>1,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }

        public function getRekapJualBarang(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-rekap-jual-perbrg',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'tanggal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_barang' => $request->kode_barang
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => date('Y-m-d H:i:s'), 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }

        public function getRekapBeliBarang(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-rekap-beli-perbrg',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'tanggal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_barang' => $request->kode_barang
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => date('Y-m-d H:i:s'), 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }

        public function getSaldoHutang(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-saldo-hutang',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_vendor' => $request->kode_vendor,
                         'jenis' => $request->jenis,
                         'kode_lokasi' => $request->kode_lokasi
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => date('Y-m-d H:i:s'), 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }

        public function printNotaJualBaru(Request $request) {
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nota-jual',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $request->all()
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    if(isset($data['data']) && count($data['data']) > 0){

                        try {
                            // $ip = '192.168.31.231'; // IP Komputer kita atau printer lain yang masih satu jaringan
                            $printer = "TM-U220"; // Nama Printer yang di sharing
                            // $connector = new WindowsPrintConnector("smb://" . $ip . "/" . $printer);
                            // $connector = new NetworkPrintConnector($ip, 9100);
                            $connector = new WindowsPrintConnector($printer);
                            // $connector = new NetworkPrintConnector("10.79.241.85", 9100);
                            /* Start the printer */
                            $printer = new Printer($connector);
                            foreach($data['data'] as $row){
                                
                                $printer -> setJustification(Printer::JUSTIFY_CENTER);
                                /* Name of shop */
                                $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                                $printer -> text($row['nama']."\n");
                                $printer -> selectPrintMode();
                                $printer -> text($row['alamat']."\n");
                                $printer -> text("---------------------------------\n");
                        
                                $printer -> setJustification(Printer::JUSTIFY_CENTER);
                                /* Title of receipt */
                                $printer -> setEmphasis(false);
                                
                                $printer -> text("No Bukti: ".$row['no_jual']."\n");
                                $printer -> text("Kasir: ".$row['nik_user']."\n");
                                $new_time = date("Y-m-d H:i:s", strtotime('+7 hours', strtotime(date("Y-m-d H:i:s"))));
                                $printer -> text($new_time."\n");
                                $printer -> text("---------------------------------\n");
                                $printer -> setEmphasis(false);
                        
                                /* Items */
                                $printer -> setEmphasis(true);
                                foreach ($row['detail'] as $item) {
                                    $printer->text($this->buatBaris3KolomBarang($item['nama'],"",""));
                                    $printer->text($this->buatBaris3Kolom(number_format($item['jumlah'],0,",",".")."x", number_format($item['harga'],0,",","."), number_format($item['total'],0,",",".")));
                                }
                                $printer -> setEmphasis(true);
                                $printer -> text("---------------------------------\n");
                                
                                $total_trans=$row['nilai'];
                                $total_disk=$row['diskon'];
                                $total_stlh=$row['nilai']-$row['diskon'];
                                $total_byr=$row['tobyr'];
                                $kembalian=$row['tobyr']-($total_stlh);
        
                                $printer -> setEmphasis(true);
                                $printer->text($this->buatBaris2Kolom("Total Transaksi", "", number_format($total_trans,0,",",".")));
                                $printer -> setEmphasis(false);
                                $printer->text($this->buatBaris2Kolom("Total Diskon", "", number_format($total_disk,0,",",".")));
                                $printer->text($this->buatBaris2Kolom("Total Set. Disk.", "", number_format($total_stlh,0,",",".")));
                                $printer->text($this->buatBaris2Kolom("Total Bayar", "", number_format($total_byr,0,",",".")));
                                $printer->text($this->buatBaris2Kolom("Kembalian", "", number_format($kembalian,0,",",".")));
                                $printer -> text("---------------------------------");
                                
                        
                                /* Tax and total */
                                // $printer -> text($tax);
                                
                                $printer -> setJustification(Printer::JUSTIFY_CENTER);
                                $printer -> selectPrintMode();
                        
                                /* Footer */
                                $printer -> text("Harap periksa belanjaan anda\nBarang yang telah dibeli\ntidak dapat ditukarkan\n");
                                $printer -> text("\nTerima Kasih telah berbelanja di ".$row['nama']);
                                $printer -> feed(1);
                        
                            }
                            /* Cut the receipt and open the cash drawer */
                            $printer -> cut();
                            $printer -> pulse();
                    
                            $printer -> close();
                    
                    
                            $response = ['success'=>true,'message'=>'Berhasil!'];
                        } catch (Exception $e) {
                            $response = ['success'=>false,'message'=>$e->getMessage()];
                        }
                    }else{
                        $response = ['success'=>false,'message'=>'Error Api 2'];
                    }
                }else{
                    $response = ['success'=>false,'message'=>'Error Api'];
                }
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $response = ['success'=>false,'message'=>$res];
            }

            return response()->json($response, 200);
        }

        public function getRekapStockOpname(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-stock-opname',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'tanggal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->tanggal != ""){
                     $tanggal = $request->input('tanggal')[1];
                 }else{
                     $tanggal = date('Y-m-d H:i:s');
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => $tanggal, 'status'=>true, 'auth_status'=>1,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }

        public function getRekapStockOpnameHari(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-stock-opname-hari',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'periode' => $request->periode,
                         'gudang' => $request->gudang,
                         'no_bukti' => $request->no_bukti
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
                 if($request->periode != ""){
                     $periode = $request->periode;
                 }else{
                     $periode = "Semua Periode";
                 }
 
                 if(isset($request->back)){
                     $res['back']=true;
                 }
                 
                 return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'periode'=>$periode,'sumju'=>$request->sumju,'res'=>$res], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
         }

        public function getBukuBarang(Request $request) {
            try{
                 $client = new Client();
                 $response = $client->request('GET',  config('api.url').'esaku-report/lap-buku-barang',[
                     'headers' => [
                         'Authorization' => 'Bearer '.Session::get('token'),
                         'Accept'     => 'application/json',
                     ],
                     'query' => [
                         'kode_lokasi' => $request->kode_lokasi,
                         'tanggal' => $request->tanggal,
                         'kode_gudang' => $request->kode_gudang,
                         'kode_barang' => $request->kode_barang,
                     ]
                 ]);
 
                 if ($response->getStatusCode() == 200) { // 200 OK
                     $response_data = $response->getBody()->getContents();
                     
                     $res = json_decode($response_data,true);
                     $data = $res["data"];
                 }
 
                 if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                date_default_timezone_set('Asia/Jakarta');
                return response()->json(['result' => $data, 'tgl_cetak' => date('Y-m-d H:i:s'), 'status'=>true, 'auth_status'=>1,'res'=>$res,'back'=>$back], 200); 
             } catch (BadResponseException $ex) {
                 $response = $ex->getResponse();
                 $res = json_decode($response->getBody(),true);
                 return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
             } 
        }


        public function getNotaPnj(Request $request){
            try{
    
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nota-pnj',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_lokasi' => $request->kode_lokasi,
                        'periode' => $request->periode,
                        'no_bukti' => $request->no_bukti
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $result = $res["data"];
                    
                }
                if(isset($request->back)){
                    $back = true;
                }else{
                    $back = false;
                }
                return response()->json(['result' => $result, 'status'=>true, 'auth_status'=>1,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
                
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }

        public function printNotaPnj(Request $request) {
            try {
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'esaku-report/lap-nota-pnj',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => $request->all()
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                }
                return view('esaku.rptNotaPnjPrint',$data);
    
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return dump($res);
            }
        }

    }
?>