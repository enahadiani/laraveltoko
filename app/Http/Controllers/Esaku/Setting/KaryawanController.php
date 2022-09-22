<?php

namespace App\Http\Controllers\Esaku\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KaryawanController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-master/karyawan',[
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

    public function store(Request $request) {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kode_pp' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('nik','nama','alamat','email','kode_pp','jabatan','no_telp','no_hp','status','flag_aktif','file_gambar');
            } else {
                $name = array('nik','nama','alamat','email','kode_pp','jabatan','no_telp','no_hp','status','flag_aktif');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'status') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['flag_aktif'] 
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
                $fields = array_merge($fields,$fields_data);

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-master/karyawan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $fields
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
            $response = $client->request('GET',  config('api.url').'esaku-master/karyawan-detail?nik='.$id,
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

    public function update(Request $request, $id) {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kode_pp' => 'required',
            'jabatan' => 'required',
            'no_telp' => 'required',
            'no_hp' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('nik','nama','alamat','email','kode_pp','jabatan','no_telp','no_hp','status','flag_aktif','file_gambar');
            } else {
                $name = array('nik','nama','alamat','email','kode_pp','jabatan','no_telp','no_hp','status','flag_aktif');
            }
            $req = $request->all();
            $fields = array();
            $data = array();
            for($i=0;$i<count($name);$i++) {
                if($name[$i] == 'file_gambar') {
                    $image_path = $request->file('file_gambar')->getPathname();
                    $image_mime = $request->file('file_gambar')->getmimeType();
                    $image_org  = $request->file('file_gambar')->getClientOriginalName();
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'filename' => $image_org,
                        'Mime-Type'=> $image_mime,
                        'contents' => fopen($image_path, 'r' ),
                    );
                } else if($name[$i] == 'status') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['flag_aktif'] 
                    );
                } else {
                    $fields_data[$i] = array(
                        'name'     => $name[$i],
                        'contents' => $req[$name[$i]],
                    );
                }
                $data[$i] = $name[$i];
            }
                $fields = array_merge($fields,$fields_data);

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-master/karyawan-ubah?nik='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'multipart' => $fields
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

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/karyawan?nik='.$id,
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
