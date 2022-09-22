<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MutasiController extends Controller { 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function show(Request $request)
    {
        try{
            $no_bukti = $request->no_bukti;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/mutasi-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $no_bukti
                ]

            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function getBarangMutasiKirim(Request $request) {
        try {
            $no_bukti = $request->no_bukti;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/barang-mutasi-kirim',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getMutasiKirim() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/mutasi-kirim',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['daftar' => $data['data'], 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getMutasiTerima() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/mutasi-terima',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['daftar' => $data['data'], 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $no_bukti = $request->no_bukti;
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/mutasi-barang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'no_bukti' => $no_bukti
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function update(Request $request) {
        try {
            $this->validate($request, [
                'no_dokumen' => 'required',
                'tanggal' => 'required',
                'no_bukti' => 'required',
                'bukti_kirim' => 'required',
                'keterangan' => 'required',
                'asal' => 'required',
                'tujuan' => 'required',
                'kode_barang.*' => 'required',
                'satuan.*' => 'required',
                'stok.*' => 'required',
                'jumlah.*' => 'required'
            ]);

            $detail = array();
            if(isset($request->kode_barang)){
                $kode_barang = $request->kode_barang;
                $satuan = $request->satuan;
                $stok = $request->stok;
                $jumlah = $request->jumlah;
                for($i=0;$i<count($kode_barang);$i++){
                    $detail[] = array(
                        'kode_barang' => $kode_barang[$i],
                        'satuan' => $satuan[$i],
                        'stok' => $this->joinNum($stok[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                    );
                }
            }

            $jenis = "";
            if(substr($request->no_bukti,0,2) == "MK") {
                $jenis = "KRM";
            } else {
                $jenis = "TRM";
            }

            $fields['mutasi'][0] = array(
                'no_dokumen' => $request->no_dokumen,
                'bukti_kirim' => $request->bukti_kirim,
                'tanggal' => $this->reverseDate($request->tanggal,'/','-'),
                'no_bukti' => $request->no_bukti,
                'jenis' => $jenis,
                'keterangan' => $request->keterangan,
                'gudang_asal' => $request->asal,
                'gudang_tujuan' => $request->tujuan,
                'detail' => $detail
            );

            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-trans/mutasi-barang',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                    return response()->json(["data" =>$data["success"]], 200);  
                }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return $res;
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function store(Request $request) {
        try {
            $this->validate($request, [
                'no_dokumen' => 'required',
                'tanggal' => 'required',
                'no_bukti' => 'required',
                'bukti_kirim' => 'required',
                'keterangan' => 'required',
                'asal' => 'required',
                'tujuan' => 'required',
                'kode_barang.*' => 'required',
                'satuan.*' => 'required',
                'stok.*' => 'required',
                'jumlah.*' => 'required'
            ]);

            $detail = array();
            if(isset($request->kode_barang)){
                $kode_barang = $request->kode_barang;
                $satuan = $request->satuan;
                $stok = $request->stok;
                $jumlah = $request->jumlah;
                for($i=0;$i<count($kode_barang);$i++){
                    $detail[] = array(
                        'kode_barang' => $kode_barang[$i],
                        'satuan' => $satuan[$i],
                        'stok' => $this->joinNum($stok[$i]),
                        'jumlah' => $this->joinNum($jumlah[$i]),
                    );
                }
            }

            $jenis = "";
            if(substr($request->no_bukti,0,2) == "MK") {
                $jenis = "KRM";
            } else {
                $jenis = "TRM";
            }

            $fields['mutasi'][0] = array(
                'no_dokumen' => $request->no_dokumen,
                'bukti_kirim' => $request->bukti_kirim,
                'tanggal' => $this->reverseDate($request->tanggal,'/','-'),
                'no_bukti' => $request->no_bukti,
                'jenis' => $jenis,
                'keterangan' => $request->keterangan,
                'gudang_asal' => $request->asal,
                'gudang_tujuan' => $request->tujuan,
                'detail' => $detail
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/mutasi-barang',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json'
                    ],
                    'body' => json_encode($fields)
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    $data = json_decode($response_data,true);
                    return response()->json(["data" =>$data["success"]], 200);  
                }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return $res;
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function getBarangDetail(Request $request) {
        try {
            $this->validate($request, [
                'kode_barang' => 'required',
                'kode_gudang' => 'required',
            ]);
            $barang = $request->kode_barang;
            $gudang = $request->kode_gudang;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/barang-mutasi-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_barang' => $barang,
                    'kode_gudang' => $gudang
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['result' => $data, 'status'=>true], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
    
    public function generateKode(Request $request){
        try {
            $this->validate($request, [
                'tanggal' => 'required',
                'jenis' => 'required',
            ]);

            $explode = explode("/", $request->tanggal);
            $tanggal = "$explode[2]-$explode[1]-$explode[0]";
            $jenis = $request->jenis;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/generate-mutasi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'tanggal' => $tanggal,
                    'jenis' => $jenis
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['result' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }
}

?>