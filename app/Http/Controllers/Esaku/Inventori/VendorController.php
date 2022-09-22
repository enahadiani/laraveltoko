<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class VendorController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-master/vendor',[
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
            'kode_vendor' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'alamat2' => 'required',
            'no_tel' => 'required',
            'email' => 'required',
            'no_fax' => 'required',
            'npwp' => 'required',
            'pic' => 'required',
            'akun_hutang' => 'required',            
            'no_pictel' => 'required',
        ]);

        try {   

            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            if($request->input('no_rek') !== null) {
                if(count($request->input('no_rek')) > 0) {
                    for($i=0;$i<count($request->input('no_rek'));$i++) {
                        array_push($no_rek, $request->input('no_rek')[$i]);
                        array_push($nama_rek, $request->input('nama_rek')[$i]);
                        array_push($bank, $request->input('bank')[$i]);
                        array_push($cabang, $request->input('cabang')[$i]);
                    }
                }
            }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-master/vendor',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_vendor' => $request->kode_vendor,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'alamat2' => $request->alamat2,
                    'no_tel' => $request->no_tel,
                    'no_fax' => $request->no_fax,
                    'npwp' => $request->npwp,
                    'email' => $request->email,
                    'pic' => $request->pic,
                    'akun_hutang' => $request->akun_hutang,
                    'no_rek' => $no_rek,
                    'nama_rek' => $nama_rek,
                    'bank' => $bank,
                    'cabang' => $cabang,
                    'no_pictel' => $request->no_pictel,
                    'bank_trans' => '-',
                    'kode_klpvendor' => '-',
                    'penilaian' => '-',
                    'spek' => '-',
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

    public function getData($id) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/vendor?kode_vendor='.$id,
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
            'kode_vendor' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'alamat2' => 'required',
            'no_tel' => 'required',
            'no_fax' => 'required',
            'npwp' => 'required',
            'email' => 'required',
            'pic' => 'required',
            'akun_hutang' => 'required',            
            'no_pictel' => 'required',
        ]);

        try {

            $no_rek = array();
            $nama_rek = array();
            $bank = array();
            $cabang = array();
            if($request->input('no_rek') !== null) {
                if(count($request->input('no_rek')) > 0) {
                    for($i=0;$i<count($request->input('no_rek'));$i++) {
                        array_push($no_rek, $request->input('no_rek')[$i]);
                        array_push($nama_rek, $request->input('nama_rek')[$i]);
                        array_push($bank, $request->input('bank')[$i]);
                        array_push($cabang, $request->input('cabang')[$i]);
                    }
                }
            }
            $client = new Client();
            $response = $client->request('PUT',  config('api.url').'esaku-master/vendor?kode_vendor='.$id,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' => [
                    'kode_vendor' => $request->kode_vendor,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'alamat2' => $request->alamat2,
                    'no_tel' => $request->no_tel,
                    'email' => $request->email,
                    'no_fax' => $request->no_fax,
                    'npwp' => $request->npwp,
                    'pic' => $request->pic,
                    'akun_hutang' => $request->akun_hutang,
                    'no_rek' => $no_rek,
                    'nama_rek' => $nama_rek,
                    'bank' => $bank,
                    'cabang' => $cabang,
                    'no_pictel' => $request->no_pictel,
                    'bank_trans' => '-',
                    'kode_klpvendor' => '-',
                    'penilaian' => '-',
                    'spek' => '-',
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/vendor?kode_vendor='.$id,
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
