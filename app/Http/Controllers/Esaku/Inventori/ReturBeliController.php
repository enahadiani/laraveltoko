<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReturBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'https://api.simkug.com/api/esaku-trans/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getNew(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-beli-new',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getFinish(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-beli-finish',[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getBarang($id1,$id2,$id3){
        try {
            $id = $id1."/".$id2."/".$id3;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-beli-barang?no_bukti='.$id,[
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
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function show($id1,$id2,$id3) {
        try{
            $id = $id1."/".$id2."/".$id3;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-beli-detail?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
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

    public function delete(Request $request) {
        try{
            $id = $request->no_bukti;
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/retur-beli?no_bukti='.$id,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['data' => $data], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function store(Request $request) {
        try {
        $this->validate($request, [
            'tanggal' => 'required',
            'periode' => 'required',
            'no_beli' => 'required',
            'kode_vendor' => 'required',
            'akun_hutang' => 'required',
            'total_return' => 'required',
            'saldo' => 'required',
            'kode_barang' => 'required|array',
            'kode_akun' => 'required|array',
            'qty_beli' => 'required|array',
            'qty_retur' => 'required|array',
            'harga' => 'required|array',
            'satuan' => 'required|array',
            'subtotal' => 'required|array'
        ]);
        $data_harga = array();
        for($i=0;$i<count($request->harga);$i++){
            $data_harga[] = intval(str_replace('.','', $request->harga[$i]));
        }
        $data_beli = array();
        for($i=0;$i<count($request->qty_beli);$i++){
            $data_beli[] = intval(str_replace('.','', $request->qty_beli[$i]));
        }
        $data_retur = array();
        for($i=0;$i<count($request->qty_retur);$i++){
            $data_retur[] = intval(str_replace('.','', $request->qty_retur[$i]));
        }
        $data_sub = array();
        for($i=0;$i<count($request->subtotal);$i++){
            $data_sub[] = intval(str_replace('.','', $request->subtotal[$i]));
        }

        $fields = array (
            'kode_pp' => Session::get('kodePP'),
            'tanggal' => $request->tanggal,
            'periode' => $request->periode,
            'no_bukti' => $request->no_beli,
            'kode_vendor' => substr($request->kode_vendor,0,3),
            'akun_hutang' => $request->akun_hutang,
            'total_return' => intval(str_replace('.','', $request->total_return)),
            'saldo' => intval(str_replace('.','', $request->saldo)),
            'kode_barang' => $request->kode_barang,
            'kode_akun' => $request->kode_akun,
            'qty_beli' => $data_beli,
            'qty_return' => $data_retur,
            'harga' => $data_harga,
            'satuan' => $request->satuan,
            'subtotal'=> $data_sub
        );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/retur-beli',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Content-Type'     => 'application/json'
                ],
                'body' => json_encode($fields)
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }
}
