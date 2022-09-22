<?php

namespace App\Http\Controllers\Esaku\Inventori;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class PenjualanLangsungController extends Controller
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

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cekBonus($kd_barang, $tanggal, $jumlah, $harga) {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-trans/penjualan-langsung-bonus?tanggal='.$tanggal.
            '&kode_barang='.$kd_barang.'&jumlah='.$jumlah.'&harga='.$harga,[
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
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'kode_cust'=>'required',
            'nama'=>'required',
            'no_tel'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'provinsi'=>'required',
            'kecamatan'=>'required',
            'service'=>'required',
            'berat'=>'required',
            'catatan'=>'required',
            'kode_kirim'=>'required',
            'nilai_ongkir'=>'required',
            'total_trans'=>'required',
            'label_kota'=>'required',
            'label_provinsi'=>'required',
            'label_kecamatan'=>'required',
            'label_service'=>'required',
            'kode_barang' => 'required|array',
            'qty_barang' => 'required|array',
            'harga_barang' => 'required|array',
            'disc_barang' => 'required|array',
            'sub_barang' => 'required|array',
        ]);

        try {
            $data_harga = array();
            $data_diskon = array();
            $data_sub = array();
            for($i=0;$i<count($request->harga_barang);$i++){
                $data_harga[] = $this->joinNum($request->harga_barang[$i]);
                $data_diskon[] = $this->joinNum($request->disc_barang[$i]);
                $data_sub[] = $this->joinNum($request->sub_barang[$i]);
            }

            if($request->lama_hari == ""){
                $lama_hari="-";
            }else{
                $lama_hari=$request->lama_hari;
            }
            $fields = array (
                'tanggal'=>date('Y-m-d H:i:s'),
                'kode_cust'=>$request->kode_cust,
                'nama_cust'=>$request->nama,
                'notel_cust'=>$request->no_tel,
                'alamat_cust'=>$request->alamat,
                'kota_cust'=>$request->kota.'|'.$request->label_kota,
                'kecamatan_cust'=>$request->kecamatan.'|'.$request->label_kecamatan,
                'prop_cust'=>$request->provinsi.'|'.$request->label_provinsi,
                'catatan'=>$request->catatan,
                'service'=>$request->service.'|'.$request->label_service,
                'berat'=>$this->joinNum($request->berat),
                'lama_hari'=>$lama_hari,
                'kode_kirim'=>$request->kode_kirim,
                'no_resi'=>'-',
                'nilai_ongkir'=>$this->joinNum($request->nilai_ongkir),
                'nilai_pesan'=>$this->joinNum($request->total_trans),
                'kode_barang' => $request->kode_barang,
                'qty_barang' => $request->qty_barang,
                'harga_barang' => $data_harga,
                'diskon_barang' => $data_diskon,
                'sub_barang'=> $data_sub
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-trans/penjualan-langsung',[
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

    public function getProvinsi(Request $request){

        try {

            $query = array();
            if(isset($request->id)){
                $query = array(
                    'id' => $request->id
                );
            }

            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-trans/provinsi',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $query
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $data = $data["data"];
            }
            return response()->json(['daftar' => $data, 'status'=>true], 200);
            
            return response()->json(['message' => 'tes', 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    
    public function getKota(Request $request){
        try {
            
            $query = array();
            if(isset($request->id)){
                $kota = array(
                    'id' => $request->id
                );
                $query = array_merge($query,$kota);
            }
            if(isset($request->province)){
                $provinsi = array(
                    'province' => $request->province
                );
                $query = array_merge($query,$provinsi);
            }

            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-trans/kota',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $query
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

    public function getKecamatan(Request $request){
        try {
            
            $query = array();
            if(isset($request->id)){
                $kota = array(
                    'id' => $request->id
                );
                $query = array_merge($query,$kota);
            }
            if(isset($request->province)){
                $provinsi = array(
                    'province' => $request->province
                );
                $query = array_merge($query,$provinsi);
            }

            if(isset($request->city)){
                $city = array(
                    'city' => $request->city
                );
                $query = array_merge($query,$city);
            }

            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-trans/kecamatan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $query
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

    public function getService(Request $request){
        try {
            
            $query = array(
                'destination' => $request->destination,
                'origin' => Session::get('kode_kota'),
                'weight' => $request->weight,
                'courier' => $request->courier,
            );

            $client = new Client();

            $response = $client->request('GET',  config('api.url').'esaku-trans/nilai-ongkir',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => $query
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res["data"];
            }
            return response()->json(['daftar' => $data,'status'=>true,'kode_kota'=>Session::get('kode_kota')], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

}
