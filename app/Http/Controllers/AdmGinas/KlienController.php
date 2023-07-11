<?php 
namespace App\Http\Controllers\AdmGinas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class KlienController extends Controller {
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
            $response = $client->request('GET',  config('api.url').'admginas-master/klien',[
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
        $this->validate($request,[
            'nama_klien' => 'required',
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
                'name' => 'nama_klien',
                'contents' => $request->nama_klien
                );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/klien',[
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
            $response = $client->request('GET',  config('api.url').'admginas-master/klien-show?id_klien='.$id,[
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
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'nama_klien' => 'required',
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
                'name' => 'nama_klien',
                'contents' => $request->nama_klien
                );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'admginas-master/klien-ubah?id_klien='.$id,[
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