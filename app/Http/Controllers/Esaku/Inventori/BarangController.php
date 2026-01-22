<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('esaku-auth/login')->with('alert','Session telah habis !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $r){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/barang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $r->input()
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data, 'res'=>$res, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kode_barang' => 'required',
            'nama' => 'required',
            'barcode' => 'required',
            'kode_klp' => 'required',
            'kode_gudang' => 'required',
            'no_rak' => 'required',
            'satuan' => 'required',
            'hrg_satuan' => 'required',
            'ppn' => 'required',
            // 'profit' => 'required',
            'hna' => 'required',
            // 'ss' => 'required',
            // 'sm1' => 'required',
            // 'sm2' => 'required',
            // 'mm1' => 'required',
            // 'mm2' => 'required',
            // 'fm1' => 'required',
            // 'fm2' => 'required',
            'flag_aktif' => 'required',
            // 'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try { 
            if($request->hasfile('file_gambar')) {
                $name = array('kode_barang','nama','sat_kecil','sat_besar','jml_sat','hna','kode_gudang','no_rak','flag_aktif','ss','sm1','sm2','mm1','mm2','fm1','fm2','kode_klp','barcode','hrg_satuan','ppn','profit','file_gambar');
            } else {
                $name = array('kode_barang','nama','sat_kecil','sat_besar','jml_sat','hna','kode_gudang','no_rak','flag_aktif','ss','sm1','sm2','mm1','mm2','fm1','fm2','kode_klp','barcode','hrg_satuan','ppn','profit');
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
                } else if($name[$i] == 'sat_kecil') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['satuan'] 
                    );
                } else if($name[$i] == 'sat_besar') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['satuan'] 
                    );
                } else if($name[$i] == 'jml_sat') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => 0 
                    );
                } else if($name[$i] == 'hna') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'ss') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'sm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'sm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'mm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'mm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'fm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'fm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'hrg_satuan') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
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
                $response = $client->request('POST',  config('api.url').'esaku-master/barang',[
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
            $response = $client->request('GET',  config('api.url').'esaku-master/barang?kode_barang='.$id,
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
            'kode_barang' => 'required',
            'nama' => 'required',
            'barcode' => 'required',
            'kode_klp' => 'required',
            'kode_gudang' => 'required',
            'no_rak' => 'required',
            'satuan' => 'required',
            'hrg_satuan' => 'required',
            'ppn' => 'required',
            'profit' => 'required',
            'hna' => 'required',
            'ss' => 'required',
            'sm1' => 'required',
            'sm2' => 'required',
            'mm1' => 'required',
            'mm2' => 'required',
            'fm1' => 'required',
            'fm2' => 'required',
            'flag_aktif' => 'required',
            'file_gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if($request->hasfile('file_gambar')) {
                $name = array('kode_barang','nama','sat_kecil','sat_besar','jml_sat','hna','kode_gudang','no_rak','flag_aktif','ss','sm1','sm2','mm1','mm2','fm1','fm2','kode_klp','barcode','hrg_satuan','ppn','profit','file_gambar');
            } else {
                $name = array('kode_barang','nama','sat_kecil','sat_besar','jml_sat','hna','kode_gudang','no_rak','flag_aktif','ss','sm1','sm2','mm1','mm2','fm1','fm2','kode_klp','barcode','hrg_satuan','ppn','profit');
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
                } else if($name[$i] == 'sat_kecil') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['satuan'] 
                    );
                } else if($name[$i] == 'sat_besar') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => $req['satuan'] 
                    );
                } else if($name[$i] == 'jml_sat') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => 0 
                    );
                } else if($name[$i] == 'hna') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'ss') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'sm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'sm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'mm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'mm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'fm1') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'fm2') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
                    );
                } else if($name[$i] == 'hrg_satuan') {
                    $fields_data[$i] = array(
                        'name' => $name[$i],
                        'contents' => intval(str_replace('.','', $req[$name[$i]])) 
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
                $response = $client->request('POST',  config('api.url').'esaku-master/barang-ubah?kode_barang='.$id,[
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
                dd(json_decode($response->getBody(),true));
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function delete($id) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/barang?kode_barang='.$id,
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
