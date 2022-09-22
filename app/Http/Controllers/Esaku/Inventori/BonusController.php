<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BonusController extends Controller
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

    public function index(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/bonus',[
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
            'kode_barang' => 'required',
            'keterangan' => 'required',
            'ref_qty' => 'required',
            'bonus_qty' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        try {   
                $explode_tgl_mulai = explode('/', $request->tgl_mulai);
                $tgl_mulai = $explode_tgl_mulai[0];
                $bln_mulai = $explode_tgl_mulai[1];
                $tahun_mulai = $explode_tgl_mulai[2];
                $tanggal_mulai = $tahun_mulai."-".$bln_mulai."-".$tgl_mulai;

                $explode_tgl_selesai = explode('/', $request->tgl_selesai);
                $tgl_selesai = $explode_tgl_selesai[0];
                $bln_selesai = $explode_tgl_selesai[1];
                $tahun_selesai = $explode_tgl_selesai[2];
                $tanggal_selesai = $tahun_selesai."-".$bln_selesai."-".$tgl_selesai;

                $client = new Client();
                $response = $client->request('POST',  config('api.url').'esaku-master/bonus',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_barang' => $request->kode_barang,
                        'keterangan' => $request->keterangan,
                        'ref_qty' => intval(str_replace('.','',$request->ref_qty)),
                        'bonus_qty' => intval(str_replace('.','',$request->bonus_qty)),
                        'tgl_mulai' => $tanggal_mulai,
                        'tgl_selesai' => $tanggal_selesai
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
            $response = $client->request('GET',  config('api.url').'esaku-master/bonus?kode_barang='.$id,
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
            'keterangan' => 'required',
            'ref_qty' => 'required',
            'bonus_qty' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        try {
                $explode_tgl_mulai = explode('/', $request->tgl_mulai);
                $tgl_mulai = $explode_tgl_mulai[0];
                $bln_mulai = $explode_tgl_mulai[1];
                $tahun_mulai = $explode_tgl_mulai[2];
                $tanggal_mulai = $tahun_mulai."-".$bln_mulai."-".$tgl_mulai;

                $explode_tgl_selesai = explode('/', $request->tgl_selesai);
                $tgl_selesai = $explode_tgl_selesai[0];
                $bln_selesai = $explode_tgl_selesai[1];
                $tahun_selesai = $explode_tgl_selesai[2];
                $tanggal_selesai = $tahun_selesai."-".$bln_selesai."-".$tgl_selesai;

                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'esaku-master/bonus?kode_barang='.$id,[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_barang' => $request->kode_barang,
                        'keterangan' => $request->keterangan,
                        'ref_qty' => intval(str_replace('.','',$request->ref_qty)),
                        'bonus_qty' => intval(str_replace('.','',$request->bonus_qty)),
                        'tgl_mulai' => $tanggal_mulai,
                        'tgl_selesai' => $tanggal_selesai
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
            $response = $client->request('DELETE',  config('api.url').'esaku-master/bonus?kode_barang='.$id,
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
