<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembayaranPembelianController extends Controller 
{
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

    public function index() {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/bayar-beli',[
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

    public function GenerateBukti(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/bayar-beli-nobukti',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>[
                    'tanggal' => $this->reverseDate($request->tanggal,'/','-')
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    public function getVendor() {

        $client = new Client();
        $response = $client->request('GET',  config('api.url').'esaku-trans/bayar-beli-vendor',[
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

    public function getDetailPembelian(Request $request) {
        try {
            $this->validate($request, [
                'kode_vendor' => 'required',
                'periode' => 'required',
            ]);
            $vendor = $request->kode_vendor;
            $periode = $request->periode;

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/bayar-beli-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_vendor' => $vendor,
                    'periode' => $periode
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

    public function store(Request $request) {
        try {
            $this->validate($request, [
                'tanggal' => 'required',
                'no_bukti' => 'required',
                'vendor' => 'required',
                'keterangan' => 'required',
                'no_dokumen' => 'required',
                'total_pembayaran' => 'required',
                'status_bayar.*' => 'required',
                'no_beli.*' => 'required',
                'tgl.*' => 'required',
                'saldo.*' => 'required'
            ]);

            $detail = array();
            if(isset($request->no_beli)){
                $no_beli = $request->no_beli;
                $status_bayar = $request->status_bayar;
                $tgl = $request->tgl;
                $saldo = $request->saldo;
                for($i=0;$i<count($no_beli);$i++){
                    // $tanggal = $this->reverseDate($tanggal[$i],'/','-');
                    $detail[] = array(
                        'no_beli' => $no_beli[$i],
                        'status_bayar' => $status_bayar[$i],
                        'tgl' => $this->reverseDate($tgl[$i],'/','-'),
                        'saldo' => $this->joinNum($saldo[$i]),
                    );
                }
            }

            $fields['bayarbeli'][0] = array(
                'tanggal' => $this->reverseDate($request->tanggal,'/','-'),
                'no_bukti' => $request->no_bukti,
                'vendor' => $request->vendor,
                'keterangan' => $request->keterangan,
                'no_dokumen' => $request->no_dokumen,
                'total_pembayaran' => $this->joinNum($request->total_pembayaran),
                'detail' => $detail
            );

            // dd($fields);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/bayar-beli',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            // dd($response);
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

    public function destroy(Request $request)
    {
        try{
            $no_bukti = $request->no_bukti;
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/bayar-beli',[
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

}
