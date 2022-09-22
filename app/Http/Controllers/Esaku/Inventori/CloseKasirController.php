<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class CloseKasirController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexNew(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/close-kasir-new',[
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

    public function indexFinish(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/close-kasir-finish',[
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/close-kasir-detail?no_open='.$id,
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

    public function store(Request $request) {
        $this->validate($request, [
            'no_open' => 'required',
            'total_pnj' => 'required',
            'total_disk' => 'required',
            // 'total_ppn' => 'required',
            'no_jual' => 'required|array',
        ]);

        try {
            $fields = array(
                'no_open'=>$request->no_open,
                'total_pnj'=>intval(str_replace('.','', $request->total_pnj)),
                'total_diskon'=>intval(str_replace('.','', $request->total_disk)),
                // 'total_ppn'=>intval(str_replace('.','', $request->total_ppn)),
                'no_jual'=>$request->no_jual,
                'kode_pp'=>Session::get('kodePP'),
                'tanggal'=>date('Y-m-d')
                );

                if(isset($request->no_beli)){
                    $fields = array_merge($fields,array('no_beli' => $request->no_beli));
                }

                if(isset($request->no_retur)){
                    $fields = array_merge($fields,array('no_retur' => $request->no_retur));
                }
                
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-trans/close-kasir',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Content-Type'     => 'application/json',
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }
   
}
