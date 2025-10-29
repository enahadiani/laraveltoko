<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class HoldRakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function generateNoBukti(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hold-rak-nobukti',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>[
                    'tanggal' => $this->reverseDate($request->tanggal,'/','-')
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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hold-rak',[
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required|date_format:d/m/Y',
            'keterangan' => 'required|max:200',
            'kode_gudang' => 'required|max:20',
            'kode_rak' => 'required|array',
            'kode_rak.*' => 'required'
        ]);
            
        try{

            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,'/','-'),
                ],
                [
                    'name'=>'keterangan', 
                    'contents'=> $request->input('keterangan')
                ],
                [
                    'name'=>'kode_gudang', 
                    'contents'=> $request->input('kode_gudang')
                ]
            ];

            $fields_kode_rak = array();
            $send_data = $fields;
            if(count($request->kode_rak) > 0){

                for($i=0;$i<count($request->kode_rak);$i++){
                    $fields_kode_rak[$i] = array(
                        'name'     => 'kode_rak[]',
                        'contents' => $request->kode_rak[$i],
                    );
                }
                $send_data = array_merge($send_data,$fields_kode_rak);
            }
            
            $sts_dok = true;
            $msg_dok = "";

            if(!$sts_dok){
                $dt = [
                    'message' => $msg_dok,
                    'status' => $sts_dok
                ];
                return response()->json(['data' => $dt], 200);
            }else{
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-trans/hold-rak',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    // if(isset($data['no_pesan'])){
                    //     $this->sendNotifApproval($data['no_pesan']);
                    // }
                    return response()->json(['data' => $data], 200);  
                }
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function show($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hold-rak-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
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

    public function update(Request $request, $no_bukti)
    {
        $this->validate($request, [
            'no_bukti' => 'required',
            'tanggal' => 'required|date_format:d/m/Y',
            'keterangan' => 'required|max:200',
            'kode_gudang' => 'required',
            'kode_rak' => 'required|array',
            'kode_rak.*' => 'required'
        ]);
            
        try{
            $fields = [
                
                [
                    'name'=>'no_bukti', 
                    'contents'=> $request->input('no_bukti')
                ],
                 [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal,'/','-'),
                ],
                [
                    'name'=>'keterangan', 
                    'contents'=> $request->input('keterangan')
                ],
                [
                    'name'=>'kode_gudang', 
                    'contents'=> $request->input('kode_gudang')
                ]
            ];

            $fields_kode_rak = array();
            $send_data = $fields;
            if(count($request->kode_rak) > 0){

                for($i=0;$i<count($request->kode_rak);$i++){
                    $fields_kode_rak[$i] = array(
                        'name'     => 'kode_rak[]',
                        'contents' => $request->kode_rak[$i],
                    );
                }
                $send_data = array_merge($send_data,$fields_kode_rak);
            }
            
            $sts_dok = true;
            $msg_dok = "";

            if(!$sts_dok){
                $dt = [
                    'message' => $msg_dok,
                    'status' => $sts_dok
                ];
                return response()->json(['data' => $dt], 200);
            }else{
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-trans/hold-rak-ubah',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);
                
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    // if(isset($data['no_pesan'])){
                    //     $this->sendNotifApproval($data['no_pesan']);
                    // }
                    return response()->json(['data' => $data], 200);  
                }
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

        
    }

    public function destroy($no_bukti)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/hold-rak',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
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

    public function getGudang(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hold-rak-gudang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'],'status'=>true,'message'=>'Success!'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getRak(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/hold-rak-rak',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data , 'status'=>true, 'message'=>'success'], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        } 
    }

}
