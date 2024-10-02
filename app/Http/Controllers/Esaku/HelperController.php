<?php
    namespace App\Http\Controllers\Esaku;

    use App\Http\Controllers\Controller;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Exception\BadResponseException;

    class HelperController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('esaku-auth/login');
            }
        }

        public function getFilterBuktiKontrolMutasi() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-kontrol-mutasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterBuktiMutasiTerima() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/filter-bukti-mutasi-terima',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterBuktiMutasiKirim() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/filter-bukti-mutasi-kirim',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterMutasiBarang(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/filter-barang-mutasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $res = $data;
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'res' => $res, 'status' => true], 200);
        }

        public function getFilterKlpBarang() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-barang-klp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }
          

        public function getFilterGudang() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-gudang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }
        
        public function getFilterAkun(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-akun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->all()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getRefPindahBuku() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/reftrans?jenis=PINDAH BUKU',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getRefPengeluaran() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/reftrans?jenis=PENGELUARAN',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getRefPemasukan() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/reftrans?jenis=PEMASUKAN',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getRef($jenis) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/reftrans-kode?jenis='.$jenis,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getCurr() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/masakun-curr',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getModul() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/masakun-modul',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getLabMenu() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/form',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getKlpMenu() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/menu-klp',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiRetur() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-retur',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiReturJual() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-retur-jual',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodeReturJual() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-retur-jual',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getNikReturJual() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik-retur-jual',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getNikRetur() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik-retur',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodeRetur() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-retur',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBarang(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-barang',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'kode_gudang' => $request->query('kode_gudang'),
            ]
            
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiClose(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-close',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode'),
                'tanggal' => $request->query('tanggal'),
                'nik_kasir' => $request->query('kasir'),
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterDefault() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-default',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200);
        }

        public function getFilterDefaultPnj() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-default-pnj',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200);
        }

        public function getFilterDefaultPmb() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-default-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200);
        }

        public function getFilterVendor(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-vendor',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_lokasi' => $request->query('kode_lokasi'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        
        public function getFilterLokasi() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-lokasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterJenisSaldo() {
            $data = array(
                0 => array(
                    'kode' => 'Saldo'
                )
            );
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getNikClose() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik-close',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodeClose() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-close',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getTanggalClose(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tanggal-close',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiPmb() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getNikPmb() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getGudangPmb(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-gudang-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodePmb() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiPnj(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode'),
                'tanggal' => $request->query('tanggal'),
                'nik_kasir'=> $request->query('kasir')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getNikPnj() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getTanggalPnj(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tanggal',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getBuktiFaktur(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-faktur',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode'),
                'tanggal' => $request->query('tanggal'),
                'kode_gudang'=> $request->query('gudang')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getTglStok(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tanggal-stok',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodePnj() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-pnj',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getAkunCust() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/cust-akun',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getAkunVend(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/vendor-akun',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_akun' => $request->kode_akun
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getNIKGud() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/gudang-nik',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPPGud() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/gudang-pp',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getAkunPersKelBar(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/barang-klp-persediaan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_akun' => $request->kode_akun
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getAkunPdptKelBar(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/barang-klp-pendapatan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_akun' => $request->kode_akun
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getAkunHPPKelBar(Request $request) {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/barang-klp-hpp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_akun' => $request->kode_akun
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterPeriodeKeuangan() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-keu',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterPeriodeKB() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-kb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterFS() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-fs',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterLevel() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-level',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterFormat() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-format',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterSumju() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-sumju',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterModul() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-modul',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterBuktiJurnal(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-jurnal',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'modul' => $request->modul,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterBuktiJurnalKB(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-report/filter-bukti-jurnal-kb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterMutasi(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-report/filter-mutasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'periode' => $request->periode,
                    'modul' => $request->modul,
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterTahun() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tahun-keu',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterOutput() {

            $data =  array(
                0 => array('kode' => "Laporan"),
                1 => array('kode' => "Grid"),
                // 2 => array('kode' => "Laporan Scroll")
            );
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterJenisCOA() {

            $data =  array(
                0 => array('kode' => "COA"),
                1 => array('kode' => "Struktur")
            );
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterPP() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-pp-keu',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getFilterModePrint() {
            $data = array(
                0 => array(
                    'nama' => 'lama'
                ),
                1 => array(
                    'nama' => 'baru'
                )
                );
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getVendor(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-vendor',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'kode_vendor' => $request->query('kode_vendor')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getPeriodeJualSetor() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-periode-jualstr',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getTahunJualSetor() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tahun-jualstr',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        
        public function getNikJualSetor() {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-nik-jualstr',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

        public function getFilterGudangJualSetor() {

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-gudang-jualstr',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status' => true], 200);
        }

        public function getTanggalPmb(Request $request) {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-report/filter-tanggal-pmb',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'periode' => $request->query('periode')
            ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

    }
?>