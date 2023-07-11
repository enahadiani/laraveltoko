<?php

namespace App\Http\Controllers\Webginas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use App\Http\Controllers\ReviewController;

class Web2Controller extends Controller
{
    public function getAllInfo() 
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/info-all-web',[
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
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getTop3Info()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/info-3-web',[
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
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getProfilPerusahaan()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/perusahaan-web',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $response = json_decode($response_data,true);
                $data['data'] = $response["data"];
                $data['misi'] = $response["detail"];
            }
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getReview()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/review-web',[
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
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getSertifikat()
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/sertifikat-web',[
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
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getInfoDetail($id) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/info-detail-web?id_info='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $response = json_decode($response_data,true);
                $data['data'] = $response["data"];
            }
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getDetailLayanan($id) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/detail-layanan-web?id_layanan='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $response = json_decode($response_data,true);
                $data['data'] = $response["data"];
                $data['detail'] = $response["data_detail"];
            }
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getLayananDetail($id,$sub_id) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/layanan-detail-web?id_layanan='.$id.'&id_sublayanan='.$sub_id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $response = json_decode($response_data,true);
                $data['data'] = $response["data"];
            }
            return $data; 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function index()
    {
        $review = $this->getReview();
        $info = $this->getTop3Info();
        return view('webginas.templateWeb2',['review' => $review, 'info' => $info]);   
    }

    public function viewPerusahaan() {
        $data = $this->getProfilPerusahaan();
        $sertifikat = $this->getSertifikat();
        return view('webginas.perusahaan', ['deskripsi' => $data['data'][0]['deskripsi'], 'visi' => $data['data'][0]['visi'], 'misi' => $data['misi'], 'sertifikat' => $sertifikat]);
    }

    public function viewKontak() {
        return view('webginas.kontak');
    }

    public function viewBerita() {
        $info = $this->getAllInfo();
        return view('webginas.berita', ['info' => $info]);
    }

    public function viewContentBerita($id) {
        $content = $this->getInfoDetail($id);
        return view('webginas.contentBerita', ['content' => $content['data'][0]]);
    }

    public function viewContentLayanan($id) {
        $content = $this->getDetailLayanan($id);
        return view('webginas.contentLayanan', ['content' => $content['data'][0], 'detail' => $content['detail']]);
    }

    public function viewContentLayananDetail($id,$sub_id) {
        $content = $this->getLayananDetail($id, $sub_id);
        return view('webginas.contentDetailLayanan', ['content' => $content['data'][0]]);
    }

    public function viewContentCleaningService() {
        return view('webginas.contentCleaningService');
    }

    public function viewContentCatering() {
        return view('webginas.contentCatering');
    }

    public function viewContentRentalCar() {
        return view('webginas.contentRentalCar');
    }

    public function viewContentBuildingMaintenance() {
        return view('webginas.contentBuildingMaintenance');
    }

    public function viewContentTenagaAhli() {
        return view('webginas.contentTenagaAhli');
    }

    public function viewContentInovasiTeknologi() {
        return view('webginas.contentInovasiTeknologi');
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
