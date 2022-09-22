<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SyncController extends Controller
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

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function getSyncMaster(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-master',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success','res' => $res], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    // public function syncMaster(Request $request)
    // {
        
    //     try{
    
    //         $client = new Client();
    //         $response = $client->request('POST',  config('api.url').'esaku-trans/sync-master',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Content-Type'     => 'application/json'
    //             ]
    //         ]);
            
    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $data = json_decode($response_data,true);
    //             return response()->json(["data" =>$data], 200);  
    //         }
    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }

    // public function syncMaster(Request $request)
    // {
        
    //     try{
    //         $vendor = "";
    //         $barang = "";
    //         $bonus = "";
    //         $satuan = "";
    //         $gudang = "";
    //         $klp = "";
    //         $histori = "";

    //         $clientlog = new Client();
    //         $responselog = $clientlog->request('POST',  config('api.url').'gl/login',[
    //             'form_params' => [
    //                 'nik' => 'kasir',
    //                 'password' => 'saisai'
    //             ]
    //         ]);
    //         if ($responselog->getStatusCode() == 200) { // 200 OK
    //             $responselog_data = $responselog->getBody()->getContents();
    //             $dt = json_decode($responselog_data,true);
    //             if($dt["message"] == "success"){
    //                 $token = $dt["token"];
    //             }else{
    //                 $token = "-";
    //             }
    //         }else{
    //             $token = "-";
    //         }

    //         $client = new Client();
    //         $response = $client->request('GET',  config('api.url').'esaku-trans/load-sync-master',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.$token,
    //                 'Accept'     => 'application/json',
    //             ]
    //         ]);

    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $res = json_decode($response_data,true);
    //             if($res["status"]){
    //                 $vendor = $res["vendor"];
    //                 $barang = $res["barang"];
    //                 $bonus = $res["bonus"];
    //                 $satuan = $res["satuan"];
    //                 $gudang = $res["gudang"];
    //                 $klp = $res["klp"];
    //                 $histori = $res["histori"];
    //             }
    //         }

    //         $fields = array(
    //             'vendor' => $vendor,
    //             'barang' => $barang,
    //             'bonus' => $bonus,
    //             'satuan' => $satuan,
    //             'gudang' => $gudang,
    //             'klp' => $klp,
    //             'histori' => $histori,
    //         );

    //         $client2 = new Client();
    //         $response2 = $client2->request('POST',  config('api.url').'esaku-trans/sync-master',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //             ],
    //             'form_params' => $fields
    //         ]);
            
    //         if ($response2->getStatusCode() == 200) { // 200 OK
    //             $response_data2 = $response2->getBody()->getContents();
                
    //             $data2 = json_decode($response_data2,true);
    //             return response()->json(["data" =>$data2], 200);  
    //         }
    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }


    public function syncMaster(Request $request)
    {
        try{

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sync-master',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }


    public function getSyncPnj(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-pnj',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success','res' => $res], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getSyncPnjDetail(Request $request){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-pnj-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id' => $request->id
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
            }
            return response()->json(['data' => $res], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }


    // public function syncPnj(Request $request)
    // {
        
    //     try{
    //         $transm = "";
    //         $transj = "";
    //         $brgjual = "";
    //         $brgtrans = "";
    //         $histori = "";
    //         $client = new Client();
    //         $response = $client->request('GET',  config('api.url').'esaku-trans/load-sync-pnj',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Accept'     => 'application/json',
    //             ]
    //         ]);

    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $res = json_decode($response_data,true);
    //             if($res["status"]){
    //                 $transm = $res["transm"];
    //                 $transj = $res["transj"];
    //                 $brgjual = $res["brgjual"];
    //                 $brgtrans = $res["brgtrans"];
    //                 $histori = $res["histori"];
    //             }
    //         }

    //         if($transm == "" && $transj == "" && $brgjual == "" && $brgtrans == ""){
    //             $data = array(
    //                 "status" => false,
    //                 "message" => "Data sudah Sinkron!"
    //             );
    //             return response()->json(["data" =>$data], 200);  
    //         }else{
    //             $fields = array(
    //                 'transm' => $transm,
    //                 'transj' => $transj,
    //                 'brgjual' => $brgjual,
    //                 'brgtrans' => $brgtrans,
    //                 'histori' => $histori,
    //             );
    
    //             $clientlog = new Client();
    //             $responselog = $clientlog->request('POST',  config('api.url').'gl/login',[
    //                 'form_params' => [
    //                     'nik' => 'kasir',
    //                     'password' => 'saisai'
    //                 ]
    //             ]);
    //             if ($responselog->getStatusCode() == 200) { // 200 OK
    //                 $responselog_data = $responselog->getBody()->getContents();
    //                 $dt = json_decode($responselog_data,true);
    //                 if($dt["message"] == "success"){
    //                     $token = $dt["token"];
    //                 }else{
    //                     $token = "-";
    //                 }
    //             }else{
    //                 $token = "-";
    //             }
    
    //             $client2 = new Client();
    //             $response2 = $client2->request('POST',  config('api.url').'esaku-trans/sync-pnj',[
    //                 'headers' => [
    //                     'Authorization' => 'Bearer '.$token,
    //                 ],
    //                 'form_params' => $fields
    //             ]);
                
    //             if ($response2->getStatusCode() == 200) { // 200 OK
    //                 $response_data2 = $response2->getBody()->getContents();
                    
    //                 $data2 = json_decode($response_data2,true);
    //                 return response()->json(["data" =>$data2], 200);  
    //             }

    //         }

    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }

    public function syncPnj(Request $request)
    {
        try{

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sync-pnj',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    
    public function getSyncPmb(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-pmb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success','res' => $res], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getSyncPmbDetail(Request $request){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-pmb-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id' => $request->id
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
            }
            return response()->json(['data' => $res], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }


    // public function syncPmb(Request $request)
    // {
        
    //     try{
    //         $transm = "";
    //         $transj = "";
    //         $brgbeli = "";
    //         $brgtrans = "";
    //         $histori = "";
    //         $client = new Client();
    //         $response = $client->request('GET',  config('api.url').'esaku-trans/load-sync-pmb',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Accept'     => 'application/json',
    //             ]
    //         ]);

    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $res = json_decode($response_data,true);
    //             if($res["status"]){
    //                 $transm = $res["transm"];
    //                 $transj = $res["transj"];
    //                 $brgbeli = $res["brgbeli"];
    //                 $brgtrans = $res["brgtrans"];
    //                 $histori = $res["histori"];
    //             }
    //         }

    //         if($transm == "" && $transj == "" && $brgbeli == "" && $brgtrans == ""){
    //             $data = array(
    //                 "status" => false,
    //                 "message" => "Data sudah Sinkron!"
    //             );
    //             return response()->json(["data" =>$data], 200);  
    //         }else{
    //             $fields = array(
    //                 'transm' => $transm,
    //                 'transj' => $transj,
    //                 'brgbeli' => $brgbeli,
    //                 'brgtrans' => $brgtrans,
    //                 'histori' => $histori,
    //             );
    
    //             $clientlog = new Client();
    //             $responselog = $clientlog->request('POST',  config('api.url').'gl/login',[
    //                 'form_params' => [
    //                     'nik' => 'kasir',
    //                     'password' => 'saisai'
    //                 ]
    //             ]);
    //             if ($responselog->getStatusCode() == 200) { // 200 OK
    //                 $responselog_data = $responselog->getBody()->getContents();
    //                 $dt = json_decode($responselog_data,true);
    //                 if($dt["message"] == "success"){
    //                     $token = $dt["token"];
    //                 }else{
    //                     $token = "-";
    //                 }
    //             }else{
    //                 $token = "-";
    //             }
    
    //             $client2 = new Client();
    //             $response2 = $client2->request('POST',  config('api.url').'esaku-trans/sync-pmb',[
    //                 'headers' => [
    //                     'Authorization' => 'Bearer '.$token,
    //                 ],
    //                 'form_params' => $fields
    //             ]);
                
    //             if ($response2->getStatusCode() == 200) { // 200 OK
    //                 $response_data2 = $response2->getBody()->getContents();
                    
    //                 $data2 = json_decode($response_data2,true);
    //                 return response()->json(["data" =>$data2], 200);  
    //             }

    //         }

    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }

    public function syncPmb(Request $request)
    {
        try{

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sync-pmb',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

    public function getSyncReturBeli(){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-retur-beli',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true, 'message' => 'success','res' => $res], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

    public function getSyncReturBeliDetail(Request $request){
        try { 
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/sync-retur-beli-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'id' => $request->id
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
            }
            return response()->json(['data' => $res], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }


    // public function syncReturBeli(Request $request)
    // {
        
    //     try{
    //         $transm = "";
    //         $transj = "";
    //         $brgbeli = "";
    //         $brgtrans = "";
    //         $histori = "";
    //         $client = new Client();
    //         $response = $client->request('GET',  config('api.url').'esaku-trans/load-sync-retur-beli',[
    //             'headers' => [
    //                 'Authorization' => 'Bearer '.Session::get('token'),
    //                 'Accept'     => 'application/json',
    //             ]
    //         ]);

    //         if ($response->getStatusCode() == 200) { // 200 OK
    //             $response_data = $response->getBody()->getContents();
                
    //             $res = json_decode($response_data,true);
    //             if($res["status"]){
    //                 $transm = $res["transm"];
    //                 $transj = $res["transj"];
    //                 $brgbeli = $res["brgbeli"];
    //                 $brgtrans = $res["brgtrans"];
    //                 $histori = $res["histori"];
    //             }
    //         }

    //         if($transm == "" && $transj == "" && $brgbeli == "" && $brgtrans == ""){
    //             $data = array(
    //                 "status" => false,
    //                 "message" => "Data sudah Sinkron!"
    //             );
    //             return response()->json(["data" =>$data], 200);  
    //         }else{
    //             $fields = array(
    //                 'transm' => $transm,
    //                 'transj' => $transj,
    //                 'brgbeli' => $brgbeli,
    //                 'brgtrans' => $brgtrans,
    //                 'histori' => $histori,
    //             );
    
    //             $clientlog = new Client();
    //             $responselog = $clientlog->request('POST',  config('api.url').'gl/login',[
    //                 'form_params' => [
    //                     'nik' => 'kasir',
    //                     'password' => 'saisai'
    //                 ]
    //             ]);
    //             if ($responselog->getStatusCode() == 200) { // 200 OK
    //                 $responselog_data = $responselog->getBody()->getContents();
    //                 $dt = json_decode($responselog_data,true);
    //                 if($dt["message"] == "success"){
    //                     $token = $dt["token"];
    //                 }else{
    //                     $token = "-";
    //                 }
    //             }else{
    //                 $token = "-";
    //             }
    
    //             $client2 = new Client();
    //             $response2 = $client2->request('POST',  config('api.url').'esaku-trans/sync-pmb',[
    //                 'headers' => [
    //                     'Authorization' => 'Bearer '.$token,
    //                 ],
    //                 'form_params' => $fields
    //             ]);
                
    //             if ($response2->getStatusCode() == 200) { // 200 OK
    //                 $response_data2 = $response2->getBody()->getContents();
                    
    //                 $data2 = json_decode($response_data2,true);
    //                 return response()->json(["data" =>$data2], 200);  
    //             }

    //         }
            

    //     } catch (BadResponseException $ex) {
    //         $response = $ex->getResponse();
    //         $res = json_decode($response->getBody(),true);
    //         $result['message'] = $res["message"];
    //         $result['status']=false;
    //         return response()->json(["data" => $result], 200);
    //     } 
        
    // }

    public function syncReturBeli(Request $request)
    {
        try{

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/sync-retur-beli',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                ]
            ]);
            
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(["data" =>$data], 200);  
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

}
