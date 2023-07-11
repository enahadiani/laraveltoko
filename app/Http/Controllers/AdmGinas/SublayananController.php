<?php 
namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SublayananController extends Controller {
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

    public function index() {
         try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/sublayanan',[
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

    public function store(Request $request) {
        $this->validate($request,[
            'id_sublayanan' => 'required',
            'nama_sublayanan' => 'required',
            'id_layanan' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'file_gambar.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        try {

            $fields = array();
            $image_path = $request->file('file_gambar')->getPathname();
            $image_mime = $request->file('file_gambar')->getmimeType();
            $image_org  = $request->file('file_gambar')->getClientOriginalName();
            $field[] = array(
                'name'=>'file_gambar',
                'file_name' => $image_org,
                'Mime-Type' => $image_mime,
                'contents' => fopen($image_path, 'r')
                );
            $field[] = array(
                'name' => 'id_sublayanan',
                'contents' => $request->id_sublayanan
                );
            $field[] = array(
                'name' => 'nama_sublayanan',
                'contents' => $request->nama_sublayanan
                );
            $field[] = array(
                'name' => 'id_layanan',
                'contents' => $request->id_layanan
                );
            $field[] = array(
                'name' => 'deskripsi_singkat',
                'contents' => $request->deskripsi_singkat
                );
            $field[] = array(
                'name' => 'deskripsi',
                'contents' => $request->deskripsi
                );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/sublayanan-simpan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $field
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

    public function show($id) {
         try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'admginas-master/sublayanan-show?id_sublayanan='.$id,[
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
            return response()->json(['data' => $data, 'status'=>true], 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res['message'], 'status'=>false], 200);
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'id_sublayanan' => 'required',
            'nama_sublayanan' => 'required',
            'id_layanan' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'file_gambar.*' => 'image|mimes:jpeg,png,jpg'
        ]);
        
         try {
            
            $fields = array();
            if($request->hasFile('file_gambar')) {
            $image_path = $request->file('file_gambar')->getPathname();
            $image_mime = $request->file('file_gambar')->getmimeType();
            $image_org  = $request->file('file_gambar')->getClientOriginalName();
            $field[] = array(
                'name'=>'file_gambar',
                'file_name' => $image_org,
                'Mime-Type' => $image_mime,
                'contents' => fopen($image_path, 'r')
                );
            } else {
                $field[] = array(
                    'name'=>'file_gambar',
                    'contents' => null
                );
            }
            $field[] = array(
                'name' => 'id_sublayanan',
                'contents' => $request->id_sublayanan
                );
            $field[] = array(
                'name' => 'nama_sublayanan',
                'contents' => $request->nama_sublayanan
                );
            $field[] = array(
                'name' => 'id_layanan',
                'contents' => $request->id_layanan
                );
            $field[] = array(
                'name' => 'deskripsi_singkat',
                'contents' => $request->deskripsi_singkat
                );
            $field[] = array(
                'name' => 'deskripsi',
                'contents' => $request->deskripsi
                );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/sublayanan-ubah?id_sublayanan='.$id,[
                 'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $field
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
            return response()->json(['message' => $res, 'status'=>false], 200);
        }
    }
}

?>