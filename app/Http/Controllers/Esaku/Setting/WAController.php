<?php

namespace App\Http\Controllers\Esaku\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class WAController extends Controller
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

    

    public function sendMessage(Request $request) {
        $this->validate($request, [
            'id_pesan' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/send-whatsapp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'id_pesan' => $request->id_pesan
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
            return response()->json(['data' => $data], 500);
        }
    }

    public function storePooling(Request $request) {
        $this->validate($request, [
            'pesan' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ]);

        try {   
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/pooling',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'phone' => $request->no_telp,
                    'body' => $request->pesan,
                    'email' => $request->email
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
            $data['message'] = 'tes';
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

   
   
}
