<?php

namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class MenuWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('admginas-auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/menu-web',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $daftar = $data["data"];
                $data = $data;
               
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_menu' =>'required',
            'nama' =>'required',
            'link' =>'required',
            'jenis' =>'required',
            'level_menu' =>'required',
            'nu' => 'required'
        ]);
            
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/menu-web',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_menu' => $request->kode_menu,
                    'nama' => $request->nama,
                    'link' => $request->link,
                    'jenis' => $request->jenis,
                    'level_menu' => $request->level_menu,
                    'nu' =>  $request->nu
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
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'kode_menu' =>'required',
            'nama' =>'required',
            'link' =>'required',
            'jenis' =>'required',
            'level_menu' =>'required',
            'nu' => 'required',
            'rowindex' => 'required',
        ]);

        try{
            
            $client = new Client();
    
            $response = $client->request('PUT',  config('api.url').'admginas-master/menu-web',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_menu' => $request->kode_menu,
                    'nama' => $request->nama,
                    'link' => $request->link,
                    'jenis' => $request->jenis,
                    'level_menu' => $request->level_menu,
                    'nu' =>  $request->rowindex
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'kode_menu' => 'required',
        ]);

        try{

            $client = new Client();
            
            $response = $client->request('DELETE',  config('api.url').'admginas-master/menu-web',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_menu' => $request->kode_menu
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res['message'];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }

    public function getForm()
    {
        try{

            $client = new Client();
            
            $response = $client->request('GET',  config('api.url').'admginas-master/menu-web-form',[
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
            return response()->json(['data' => $data], 200); 
        }catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    
    }

    public function simpanMove(Request $request)
    {
        
        $request->validate([
            'kode_menu' =>'required|array',
            'nama' =>'required|array',
            'link' =>'required|array',
            'jenis' =>'required|array',
            'level_menu' =>'required|array',
            'nu' => 'required|array'
        ]);
            
        try{
            $fields = [
                'kode_menu' => $request->kode_menu,
                'nama' => $request->nama,
                'link' => $request->link,
                'jenis' => $request->jenis,
                'level_menu' => $request->level_menu,
                'nu' =>  $request->nu
            ];

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/menu-web-move',[
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
            
            $result['message'] = $res['message'];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
    }
}

