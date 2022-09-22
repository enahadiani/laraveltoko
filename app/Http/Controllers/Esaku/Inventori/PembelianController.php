<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PembelianController extends Controller
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
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data['data'];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function getBarang(){
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian-barang',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data;
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
            'no_faktur' => 'required',
            'total_trans' => 'required',
            'total_disk' => 'required',
            'total_ppn' => 'required',
            'keterangan' => 'required'
        ]);
        try {

            $fields = array (
                'kode_pp' => Session::get('kodePP'),
                'nik_user' => Session::get('nikUser'),
                'kode_vendor' => $request->kode_vendor,
                'no_faktur' => $request->no_faktur,
                'keterangan' => $request->keterangan,
                'total_trans' => intval(str_replace('.','', $request->total_trans)),
                'total_diskon' => intval(str_replace('.','', $request->total_disk)),
                'total_ppn' => intval(str_replace('.','', $request->total_ppn))
            );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/pembelian',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function storeDetail(Request $request) {
        $this->validate($request, [
            'nik_user' => 'required',
            'kode_akun' => 'required',
            'kode_barang' => 'required',
            'harga_jual' => 'required',
            'harga_seb' => 'required',
            'stok_barang' => 'required',
            'qty_barang' => 'required',
            'harga_barang' => 'required',
            'satuan_barang' => 'required',
            'disc_barang' => 'required',
            'sub_barang' => 'required'
        ]);
        try {

            $fields = array (
                'nik_user' => $request->input('nik_user'),
                'kode_akun' => $request->input('kode_akun'),
                'kode_barang' => $request->input('kode_barang'),
                'harga_jual' => $request->input('harga_jual'),
                'harga_seb' => $request->input('harga_seb'),
                'stok_barang' => $request->input('stok_barang'),
                'qty_barang' => $request->input('qty_barang'),
                'harga_barang' => $request->input('harga_barang'),
                'satuan_barang' => $request->input('satuan_barang'),
                'disc_barang' => $request->input('disc_barang'),
                'sub_barang' => $request->input('sub_barang')
            );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/pembelian-detail',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function updateDetail(Request $request) {
        $this->validate($request, [
            'nik_user' => 'required',
            'no_urut' => 'required',
            'kode_barang' => 'required',
            'harga_jual' => 'required',
            'harga_seb' => 'required',
            'qty_barang' => 'required',
            'harga_barang' => 'required',
            'disc_barang' => 'required',
            'sub_barang' => 'required'
        ]);
        try {

            $fields = array (
                'nik_user' => $request->input('nik_user'),
                'no_urut' => $request->input('no_urut'),
                'kode_barang' => $request->input('kode_barang'),
                'harga_jual' => $request->input('harga_jual'),
                'harga_seb' => $request->input('harga_seb'),
                'qty_barang' => $request->input('qty_barang'),
                'harga_barang' => $request->input('harga_barang'),
                'disc_barang' => $request->input('disc_barang'),
                'sub_barang' => $request->input('sub_barang')
            );
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/pembelian-detail-ubah',[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function show(Request $request) {
        try{
            $id = $request->no_bukti;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian-detail?no_bukti='.$id,
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

    public function showDetail(Request $request) {
        try{
            $id = $request->no_bukti;
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian-detail-tmp',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik_user' => Session::get('nikUser')
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function update(Request $request) {
        $this->validate($request, [
            'kode_vendor' => 'required',
            'no_faktur' => 'required',
            'total_trans' => 'required',
            'total_disk' => 'required',
            'total_ppn' => 'required',
            'keterangan' => 'required',
            'kode_akun' => 'required|array',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'disc_barang' => 'required|array',
            'satuan_barang' => 'required|array',
            'sub_barang' => 'required|array',
            'harga_jual' => 'required|array'
        ]);
        try {
            $data_harga = array();
            $data_diskon = array();
            $data_sub = array();
            $data_harga_jual = array();
            for($i=0;$i<count($request->kode_barang);$i++){
                $data_harga[] = intval(str_replace('.','', $request->harga_barang[$i]));
                $data_diskon[] = intval(str_replace('.','', $request->disc_barang[$i]));
                $data_sub[] = intval(str_replace('.','', $request->sub_barang[$i]));
                $data_harga_jual[] = intval(str_replace('.','', $request->harga_jual[$i]));
            }

            $fields = array (
                'kode_pp' => Session::get('kodePP'),
                'kode_vendor' => $request->kode_vendor,
                'no_faktur' => $request->no_faktur,
                'keterangan' => $request->keterangan,
                'total_trans' => intval(str_replace('.','', $request->total_trans)),
                'total_diskon' => intval(str_replace('.','', $request->total_disk)),
                'total_ppn' => intval(str_replace('.','', $request->total_ppn)),
                'kode_barang' => $request->kode_barang,
                'kode_akun' => $request->kode_akun,
                'qty_barang' => $request->qty_barang,
                'satuan_barang' => $request->satuan_barang,
                'harga_barang' => $data_harga,
                'harga_jual' => $data_harga_jual,
                'disc_barang' => $data_diskon,
                'sub_barang'=> $data_sub
            );
            $client = new Client();
            $no_bukti = $request->no_bukti;
            $response = $client->request('PUT',  config('api.url').'esaku-trans/pembelian?no_bukti='.$no_bukti,[
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function delete($id1,$id2,$id3) {
        try{
            $id = $id1."/".$id2."/".$id3;
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/pembelian?no_bukti='.$id,
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

    public function clearTmp(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/pembelian-detail-tmp',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nik_user' => Session::get('nikUser')
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
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function destroyDetail(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-trans/pembelian-detail',
            [
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
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json($data, 200);
        }
    }

    public function getDataNota(Request $request) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian-nota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }

    public function printNota(Request $request) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/pembelian-nota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bukti' => $request->no_bukti
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return view('esaku.fNotaBeli',$data);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return dump($res);
        }
    }
}
