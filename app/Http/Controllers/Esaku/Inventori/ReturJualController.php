<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReturJualController extends Controller
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

    public function getPenjualan(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-jual-bukti',[
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


    public function show($id) {
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/retur-jual-detail?no_bukti='.$id,
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
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function store(Request $request) {
        try {
        $this->validate($request, [
            'tanggal' => 'required',
            'periode' => 'required',
            'no_jual' => 'required',
            'akun_piutang' => 'required',
            'total_return' => 'required',
            'saldo' => 'required',
            'kode_barang' => 'required|array',
            'kode_akun' => 'required|array',
            'qty_jual' => 'required|array',
            'qty_retur' => 'required|array',
            'harga' => 'required|array',
            'satuan' => 'required|array',
            'subtotal' => 'required|array'
        ]);
        $data_harga = array();
        for($i=0;$i<count($request->harga);$i++){
            $data_harga[] = intval(str_replace('.','', $request->harga[$i]));
        }
        $data_jual = array();
        for($i=0;$i<count($request->qty_jual);$i++){
            $data_jual[] = intval(str_replace('.','', $request->qty_jual[$i]));
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
            'no_bukti' => $request->no_jual,
            'akun_piutang' => $request->akun_piutang,
            'total_return' => intval(str_replace('.','', $request->total_return)),
            'saldo' => intval(str_replace('.','', $request->saldo)),
            'kode_barang' => $request->kode_barang,
            'kode_akun' => $request->kode_akun,
            'qty_jual' => $data_jual,
            'qty_return' => $data_retur,
            'harga' => $data_harga,
            'satuan' => $request->satuan,
            'subtotal'=> $data_sub
        );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/retur-jual',[
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
