<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JasaKirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/jasa-kirim',[
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

    public function store(Request $request) {
        $this->validate($request, [
            'kode_kirim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_tel' => 'required',
            'email' => 'required',
            'pic' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'no_pictel' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-master/jasa-kirim',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_kirim' => $request->kode_kirim,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_tel,
                    'email' => $request->email,
                    'pic' => $request->pic,
                    'bank' => $request->bank,
                    'cabang' => $request->cabang,
                    'no_rek' => $request->no_rek,
                    'nama_rek' => $request->nama_rek,
                    'no_pic' => $request->no_pictel
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
            return response()->json(['data' => $data], 500);
        }
    }

    public function getData(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/jasa-kirim',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_kirim' =>htmlspecialchars_decode($request->kode_kirim)
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

    public function update(Request $request) {
        $this->validate($request, [
            'kode_kirim' =>'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_tel' => 'required',
            'email' => 'required',
            'pic' => 'required',
            'bank' => 'required',
            'cabang' => 'required',
            'no_rek' => 'required',
            'nama_rek' => 'required',
            'no_pictel' => 'required',
        ]);

        try {
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-master/jasa-kirim',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_kirim' => $request->kode_kirim,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_tel,
                    'email' => $request->email,
                    'pic' => $request->pic,
                    'bank' => $request->bank,
                    'cabang' => $request->cabang,
                    'no_rek' => $request->no_rek,
                    'nama_rek' => $request->nama_rek,
                    'no_pic' => $request->no_pictel
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
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/jasa-kirim',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_kirim' => htmlspecialchars_decode($request->kode_kirim)
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
   
}
