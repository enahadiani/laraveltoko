<?php

namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('wisata-auth/login');
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
            $response = $client->request('GET',  config('api.url').'admginas-master/layanan',[
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
            'id_layanan' => 'required',
            'nama_layanan' => 'required'          
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/layanan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'id_layanan' => $request->id_layanan,
                    'nama_layanan' => $request->nama_layanan                        
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/layanan-detail',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id_layanan' => $id
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

    public function update(Request $request, $id) {
        $this->validate($request, [
            'id_layanan' => 'required',
            'nama_layanan' => 'required'
        ]);

        try {
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'admginas-master/layanan?id_layanan='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'id_layanan' => $request->id_layanan,
                    'nama_layanan' => $request->nama_layanan
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

    // public function delete($id) {
    //     try{
    //         $client = new Client();
    //         $response = $client->request('DELETE',  config('api.url').'wisata-master/bidang?kode_bidang='.$id,
    //         [
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Accept'     => 'application/json',
    //             ]
    //         ]);
    
    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $data = json_decode($response_data,true);
    //         }
    //         return response()->json(['data' => $data], 200); 
    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $data['message'] = $res['message'];
    //         $data['status'] = false;
    //         return response()->json(['data' => $data], 200);
    //     }

    // }
   
}
