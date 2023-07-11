<?php

namespace App\Http\Controllers\Webginas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WebController extends Controller
{

    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $agen = getenv('HTTP_USER_AGENT');
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        if($agen != false){
            $client = new Client();
            date_default_timezone_set('Asia/Jakarta');
            $ins = array(
                'nik'=>'visitor',
                'tanggal' => date('Y-m-d H:i:s'),
                'ip' => $ip,
                'agen' => $agen,
                'kota' => $details->city,
                'loc' => $details->loc,
                'region' => $details->region,
                'negara' => $details->country,
                'kode_lokasi' => '17',
                'kode_pp' => '-',
                'page' => 'Home'
            );
            $response = $client->request('POST',  config('api.url').'webginas/lab-log/webginas',[
                'form_params' => $ins
            ]);
        }
        return view('webginas.templateWeb');
        
    }

    public function showView($param){

        $ip = $_SERVER['REMOTE_ADDR'];
        $agen = getenv('HTTP_USER_AGENT');
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        if($agen != false){
            $client = new Client();
            date_default_timezone_set('Asia/Jakarta');
            $ins = array(
                'nik'=>'visitor',
                'tanggal' => date('Y-m-d H:i:s'),
                'ip' => $ip,
                'agen' => $agen,
                'kota' => $details->city,
                'loc' => $details->loc,
                'region' => $details->region,
                'negara' => $details->country,
                'kode_lokasi' => '17',
                'kode_pp' => '-',
                'page' => $param['menu']
            );
            $response = $client->request('POST',  config('api.url').'webginas/lab-log/webginas',[
                'form_params' => $ins
            ]);
        }
        return view($param['view'],$param['data']);
    }

    public function cek_session()
    {
        // return view('login');
        if(!Session::get('login')){
            return response()->json(['status'=>false], 200);
        }
        else{
            return response()->json(['status'=>true], 200);
        }
        
    }

    public function login(){
        return view('saku.login');
    }

    public function logout(){
        Session::flush();
        return redirect('saku/login')->with('alert','Kamu sudah logout');
    }

    public function getMenu(){
        
        $client = new Client();
        $url = url('webginas/form/');
        $response = $client->request('GET',  config('api.url').'webginas/menu/',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'domain' => 'trengginasjaya',
                'url_web' => $url
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['html'] = "" ;
            $success['data'] = [] ;
            $success['message'] = "error" ;
        }
                
        return response()->json([$success], 200);     
    }
    
    public function getHome(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/home',[
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

    public function getGallery(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/gallery',[
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

    public function getKontak(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/kontak',[
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

    public function getPage($id){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/page/'.$id,[
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

    public function getNews(Request $request){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webginas/news',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'page' => $request->page,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'jenis' => $request->jenis,
                'str' => $request->str,
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }

    public function getArticle(Request $request){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webginas/article',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'page' => $request->page,
                'bln' => $request->bln,
                'thn' => $request->thn,
                'jenis' => $request->jenis,
                'str' => $request->str,
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }
    
    public function readItem($id){
        $client = new Client();
        $response = $client->request('GET',  config('api.url').'webginas/read-item',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'id' => $id
            ]
        ]);

        $hasil = "";
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            $success = json_decode($response_data,true);
    
        }else{
            $success['status'] = true;
            $success['daftar_artikel'] = [] ;
            $success['categories'] = [] ;
            $success['archive'] = [] ;
            $success['jumlah_artikel'] = 0 ;
            $success['item_per_page'] = 0 ;
            $success['active_page'] = 0 ;
        }
                
        return response()->json([$success], 200);     
    }

    public function getVideo(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/video',[
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

    public function getWatch(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'webginas/watch/'.$request->id,[
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

    
}
