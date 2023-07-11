<?php

namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BannerController extends Controller {
    
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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/banner',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $response = json_decode($response_data,true);
                $data = $response["data"];
                $mobile = $response["data_mobile"];
            }
            return response()->json(['daftar' => $data, 'mobile' => $mobile, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request,[
            'id_banner' => 'required|array',
            'mode' => 'required|array',
            'file_gambar.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        try {
            $fields_foto = array();
            $fields_gambarke = array();
            $fields_mode = array();
            $fields_id_banner = array();
            $send_data = array();
            $data = array();
            
            for($i=0;$i<count($request->gambarke);$i++) {
                if(isset($request->file('file_gambar')[$i])) {
                    $data[] = $request->gambarke[$i];
                    $image_path = $request->file('file_gambar')[$i]->getPathname();
                    $image_mime = $request->file('file_gambar')[$i]->getmimeType();
                    $image_org  = $request->file('file_gambar')[$i]->getClientOriginalName();
                    $fields_foto[$i] = array(
                        'name'     => 'file_gambar[]',
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen( $image_path, 'r' ),
                    );

                    $fields_id_banner[$i] = array(
                            'name'     => 'id_banner[]',
                            'contents' => $request->id_banner[$i],
                        );
                    $fields_mode[$i] = array(
                            'name'     => 'mode[]',
                            'contents' => $request->mode[$i],
                        );
                    $fields_gambarke[$i] = array(
                            'name'     => 'gambarke[]',
                            'contents' => $request->gambarke[$i],
                        );
                } else {
                    continue;
                }
            }

            $send_data = array_merge($send_data,$fields_foto);
            $send_data = array_merge($send_data,$fields_gambarke);
            $send_data = array_merge($send_data,$fields_mode);
            $send_data = array_merge($send_data,$fields_id_banner);
            
            if(count($data) == 0) {
                $data['message'] = "Banner tidak boleh kosong";
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            } else {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'admginas-master/banner',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $send_data
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();        
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);   
                }
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

?>