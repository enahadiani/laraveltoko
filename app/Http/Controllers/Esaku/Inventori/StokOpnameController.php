<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class StokOpnameController extends Controller
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
            $response = $client->request('GET',  config('api.url').'toko-trans/stok-opname',[
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
    
    public function execSP(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/stok-opname-exec',[
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
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    } 

    public function load(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/stok-opname-load',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_gudang' => $request->kode_gudang
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

    public function storeRekon(Request $request) {
        $this->validate($request, [
            'kode_barang' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/stok-opname-rekon',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_barang' => $request->kode_barang,
                    'jumlah' => $request->jumlah,
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json($data, 200);  
            }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json($data, 500);
            }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode_gudang' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/stok-opname',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'tanggal' => $request->tanggal,
                    'deskripsi' => $request->deskripsi,
                    'kode_gudang' => $request->kode_gudang,
                    'kode_pp' => Session::get('kodePP')
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json($data, 200);  
            }

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json($data, 500);
        }
    }

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'toko-trans/stok-opname-edit?no_bukti='.$request->no_bukti,
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

    public function update(Request $request) {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'kode_gudang' => 'required'
        ]);

        try {
            $client = new Client();
            $response = $client->request('PUT',config('api.url').'toko-trans/stok-opname?no_bukti='.$request->no_bukti,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'tanggal' => $request->tanggal,
                    'deskripsi' => $request->deskripsi,
                    'kode_gudang' => $request->kode_gudang,
                    'kode_pp' => Session::get('kodePP')
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json($data, 200);  
            }

        } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                // $data = $res;
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function destroy(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'toko-trans/stok-opname?no_bukti='.$request->no_bukti,
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

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file_dok' => 'required'
        ]);
            
        try{
                
            $image_path = $request->file('file_dok')->getPathname();
            $image_mime = $request->file('file_dok')->getmimeType();
            $image_org  = $request->file('file_dok')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r' ),
            );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'toko-trans/upload-barang-fisik',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json($data, 200);  
            }
            
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json($request, 200);
        } 
                
    }
   
}
