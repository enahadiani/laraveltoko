<?php

namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SettingMenuController extends Controller
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

    public function store(Request $request) {
        $this->validate($request, [
            'kode_menu' => 'required',
            'nama' => 'required',
            'link' => 'required',
            'icon' => 'required',
            'level_menu' => 'required',
            'nu' => 'required',
            'rowindex' => 'required',
            'kode_klp' => 'required',
        ]);

        try {   
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'admginas-master/menu',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_menu' => $request->kode_menu,
                        'kode_klp' => $request->kode_klp,
                        'level_menu' => $request->level_menu,
                        'link' => $request->link,
                        'kode_form' => $request->link,
                        'nama' => $request->nama,
                        'nu' => $request->nu,
                        'rowindex'=>$request->rowindex,
                        'jenis_menu' => '-',
                        'icon' => $request->icon,
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

        public function storeMenu(Request $request) {
        $this->validate($request, [
            'kode_klp' => 'required',
            'kode_menu' => 'required|array',
            'level_menu' => 'required|array',
            'nama_menu' => 'required|array',
            'jenis_menu' => 'required|array',
            'kode_form' => 'required|array',
            'icon' => 'required|array',
        ]);

        $icon = array();
        for($i=0;$i<count($request->kode_menu);$i++){
            $icon[] = '-';
        }
        $jenis_menu = array();
        for($i=0;$i<count($request->kode_menu);$i++){
            $jenis_menu[] = '-';
        }

        try {
                $fields = array(
                    'kode_menu' => $request->kode_menu,
                    'kode_klp' => $request->kode_klp,
                    'level_menu' => $request->level_menu,
                    'kode_form' => $request->kode_form,
                    'nama_menu' => $request->nama_menu,
                    'jenis_menu' => $jenis_menu,
                    'icon' => $icon
                 );

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'admginas-master/menu-move',[
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/menu?kode_klp='.$id,
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

    public function update(Request $request, $kd_menu,$kd_klp) {
        $this->validate($request, [
            'kode_menu' => 'required',
            'nama' => 'required',
            'link' => 'required',
            'icon' => 'required',
            'level_menu' => 'required',
            'nu' => 'required',
            'rowindex' => 'required',
            'kode_klp' => 'required',
        ]);

        try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'admginas-master/menu?kode_menu='.$kd_menu."&kode_klp=".$kd_klp,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_menu' => $request->kode_menu,
                        'kode_klp' => $request->kode_klp,
                        'level_menu' => $request->level_menu,
                        'link' => $request->link,
                        'kode_form' => $request->link,
                        'nama' => $request->nama,
                        'rowindex'=>$request->rowindex,
                        'nu' => $request->nu,
                        'jenis_menu' => '-',
                        'icon' => $request->icon,
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

    public function delete($kd_menu,$kd_klp) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'admginas-master/menu?kode_menu='.$kd_menu."&kode_klp=".$kd_klp,
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
   
}
