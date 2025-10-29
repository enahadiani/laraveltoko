<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class ReleaseRakController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/release-rak-nobukti',[
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/release-rak',[
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
            'no_hold' => 'required|max:20',
            'kode_gudang' => 'required|max:10'
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
                    'name'=>'no_hold', 
                    'contents'=> $request->input('no_hold')
                ],
                [
                    'name'=>'kode_gudang', 
                    'contents'=> $request->input('kode_gudang')
                ]
            ];

            $send_data = $fields;

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
                $response = $client->request('POST',  config('api.url').'esaku-trans/release-rak',[
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/release-rak-detail',[
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
            'keterangan' => 'required|max:200',
            'no_hold' => 'required|max:20',
            'kode_gudang' => 'required|max:10'
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
                    'name'=>'no_hold', 
                    'contents'=> $request->input('no_hold')
                ],
                [
                    'name'=>'kode_gudang', 
                    'contents'=> $request->input('kode_gudang')
                ]
            ];
            
            $send_data = $fields;
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
                $response = $client->request('POST',  config('api.url').'esaku-trans/release-rak-ubah',[
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
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/release-rak',[
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

    public function getHold(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/release-rak-hold',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $request->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data['daftar'] = $data['data'];
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

    public function loadData(Request $request){
        try{
            
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/release-rak-load',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
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
