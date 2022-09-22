<?php

namespace App\Http\Controllers\Esaku\Setting;

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
            return redirect('esaku-auth/login');
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
                $response = $client->request('POST',  config('api.url').'esaku-master/menu',[
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

    public function storeMove(Request $request) {
        $this->validate($request, [
            'kode_klp' => 'required',
            'kode_menu' => 'required|array',
            'level_menu' => 'required|array',
            'nama' => 'required|array',
            'jenis_menu' => 'required|array',
            'link' => 'required|array',
            'icon' => 'required|array',
        ]);

        try {
            $jenis_menu = array();
            for($i=0;$i<count($request->kode_menu);$i++){
                $jenis_menu[] = '-';
            }

            $fields = array(
                'kode_menu' => $request->kode_menu,
                'kode_klp' => $request->kode_klp,
                'level_menu' => $request->level_menu,
                'kode_form' => $request->link,
                'nama_menu' => $request->nama,
                'jenis_menu' => $jenis_menu,
                'icon' => $request->icon
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'esaku-master/menu-move',[
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

    public function show(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'esaku-master/menu',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>[
                    'kode_klp' => $request->kode_klp
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $daftar = $data["data"];
                $data = $data;
                $html = "";
                if(count($daftar) > 0){
                    $pre_prt = 0;
                    $parent_array = array();
                    // node == i
                    for($i=0; $i<count($daftar); $i++){
                        if(!ISSET($daftar[$i-1]['level_menu'])){
                            $prev_lv = 0;
                        }else{
                            $prev_lv = $daftar[$i-1]['level_menu'];
                        }

                        if($daftar[$i]['level_menu'] == 0){
                            $parent_to_prt = "";
                            $prev_prt = $i;
                            $parent_array[$daftar[$i]['level_menu']] = $i;
                        }else if($daftar[$i]['level_menu'] > $prev_lv){
                            $parent_to_prt = "treegrid-parent-".($i-1);
                            $prev_prt = $i-1;
                            $parent_array[$daftar[$i]['level_menu']] = $i - 1;
                        }else if($daftar[$i]['level_menu'] == $prev_lv){
                            $parent_to_prt = "treegrid-parent-".($prev_prt);
                        }else if($daftar[$i]['level_menu'] < $prev_lv){
                            $parent_to_prt = "treegrid-parent-".$parent_array[$daftar[$i]['level_menu']];
                        }
                        
                        $html .= "
                        <tr class='treegrid-".$i." $parent_to_prt'>
                        <td class='set_kd_menu'>".$daftar[$i]['kode_menu']."<input type='hidden' name='kode_menu[]' value='".$daftar[$i]['kode_menu']."'><input type='hidden' class='set_lvl' name='level_menu[]' value='".$daftar[$i]['level_menu']."'></td>
                        <td class='set_nama'>".$daftar[$i]['nama']."<input type='hidden' name='nama[]' value='".$daftar[$i]['nama']."'><input type='hidden' class='set_icon' name='icon[]' value='".$daftar[$i]['icon']."'><input type='hidden' class='set_jenis_menu' name='jenis_menu[]' value='".$daftar[$i]['jenis_menu']."'></td>
                        <td >".$daftar[$i]['kode_form']."<input type='hidden' name='link[]' class='set_link' value='".$daftar[$i]['kode_form']."'></td>
                        <td class='set_nu' style='display:none'>".$daftar[$i]['nu']."</td>
                        <td class='set_index' style='display:none'>".$daftar[$i]['rowindex']."</td>
                        </tr>
                        ";
                    }
                }
            }
            return response()->json(['data' => $data,'html'=>$html], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $data['message'] = $res['message'];
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }
    }

    public function update(Request $request) {
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
            $response = $client->request('PUT',  config('api.url').'esaku-master/menu',[
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

    public function delete(Request $request) {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'esaku-master/menu',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_klp' => $request->kode_klp,
                    'kode_menu' => $request->kode_menu
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 200);
        }

    }

    public function storeCSV(Request $request) {
        $this->validate($request, [
            'kode_klp' => 'required',
            'file' => 'required'
        ]);

        try {

            $send_data = array();
            $fields = [
                [
                    'name' => 'kode_klp',
                    'contents' => $request->kode_klp,
                ]
            ];

            array_merge($send_data,$fields);

            $image_path = $request->file('file_gambar')->getPathname();
            $image_mime = $request->file('file_gambar')->getmimeType();
            $image_org  = $request->file('file_gambar')->getClientOriginalName();
            $fields_file[$i] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r' ),
            );

            array_merge($send_data,$fields_file);

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'tes-csv',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $send_data
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
            return response()->json($data, 500);
        }
    }
   
}
