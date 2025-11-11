<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SopHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function generateNoBukti(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/soph-nobukti',[
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
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        } 
    }

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/soph',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required|date_format:d/m/Y',
            'keterangan' => 'required|max:200',
            'no_hold' => 'required|max:20',
            'kode_gudang' => 'required|max:10',
            'detail_barang' => 'required|string',
        ]);

        $raw = htmlspecialchars_decode($request->input('detail_barang'));
        try {
            $details = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
            if (empty($details) || count($details) === 0) {
                return response()->json([
                    'message' => 'Detail barang tidak boleh kosong',
                    'status' => false
                ], 400);
            }
        } catch (\JsonException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid JSON',
                'json' => $raw,
                'exception' => $e->getMessage()
            ], 400);
        }
        
        $validator = \Validator::make($details, [
            '*.kode_barang' => 'required|max:20',
            '*.no_rak' => 'required|max:10',
            '*.stok_sistem' => 'required|numeric',
            '*.stok_fisik' => 'required|numeric',
            '*.selisih' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(),'errors' => $validator->errors(), 'status' => false], 422);
        }
            
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/soph',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kode_form' => $request->input('kode_form'),
                    'tanggal' => $this->reverseDate($request->input('tanggal'),'/','-'),
                    'kode_gudang' => $request->input('kode_gudang'),
                    'no_hold' => $request->input('no_hold'),
                    'keterangan' => $request->input('keterangan'),
                    'detail_barang' => $raw
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function show($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/soph-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'no_bukti' => 'required',
            'tanggal' => 'required|date_format:d/m/Y',
            'keterangan' => 'required|max:200',
            'no_hold' => 'required|max:20',
            'kode_gudang' => 'required|max:10',
            'detail_barang' => 'required|string',
        ]);

        $raw = htmlspecialchars_decode($request->input('detail_barang'));
        try {
            $details = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
            if (empty($details) || count($details) === 0) {
                return response()->json([
                    'message' => 'Detail barang tidak boleh kosong',
                    'status' => false
                ], 400);
            }
        } catch (\JsonException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid JSON',
                'json' => $raw,
                'exception' => $e->getMessage()
            ], 400);
        }
        
        $validator = \Validator::make($details, [
            '*.kode_barang' => 'required|max:20',
            '*.no_rak' => 'required|max:10',
            '*.stok_sistem' => 'required|numeric',
            '*.stok_fisik' => 'required|numeric',
            '*.selisih' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(),'errors' => $validator->errors(), 'status' => false], 422);
        }
            
        try{
            
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/soph-ubah',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'no_bukti' => $request->input('no_bukti'),
                    'kode_form' => $request->input('kode_form'),
                    'tanggal' => $this->reverseDate($request->input('tanggal'),'/','-'),
                    'kode_gudang' => $request->input('kode_gudang'),
                    'no_hold' => $request->input('no_hold'),
                    'keterangan' => $request->input('keterangan'),
                    'detail_barang' => $raw,
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        
    }

    public function destroy($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/soph',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function getHold(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/soph-hold',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data['daftar'] = $data['data'];
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function loadData(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/soph-load',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

}
