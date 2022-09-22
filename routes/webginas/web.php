<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form/{id}', function ($id) {
    $param['view'] = 'webginas.'.$id;
    $param['data'] = [];
    $param['menu'] = $id;
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/form/{id}/{kode}/{name}', function ($id,$kode,$name) {
    $param['view'] = 'webginas.'.$id;
    $param['data'] = array('page' => $kode);
    $param['menu'] = $id;
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
    // $data['page'] = $kode;
    // return view('webginas.'.$id,$data);
});

Route::get('/news/{page}', function ($page) {
    
    // $data['page'] = $page;
    // return view('webginas.article',$data);
    $param['view'] = 'webginas.article';
    $param['data'] = array('page' => $page);
    $param['menu'] = 'daftar article';
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/news/{page}/{bulan}/{tahun}', function ($page,$bulan,$tahun) {
    
    // $data['page'] = $page;
    // $data['bulan'] = $bulan;
    // $data['tahun'] = $tahun;
    // return view('webginas.article',$data);
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('page' => $page,'tahun'=>$tahun,'bulan'=>$bulan);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/news-categories', function (Request $request) {
    
    // $data['jenis'] = 'categories';
    // $data['str'] = $request->str;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('jenis' => 'categories','str'=>$request->str);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/news-search', function (Request $request) {
    
    // $data['jenis'] = 'string';
    // $data['str'] = $request->str;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('jenis' => 'string','str'=>$request->str);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('read-item/{id}', function ($id) {
    // $data['id'] = $id;
    // return view('webginas.vItem',$data);
    
    $param['view'] = 'webginas.vItem';
    $param['data'] = array('id' => $id);
    $param['menu'] = 'daftar article';
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('watch/{id}', function ($id) {
    // $data['id'] = $id;
    // return view('webginas.watch',$data);
    
    $param['view'] = 'webginas.watch';
    $param['data'] = array('id' => $id);
    $param['menu'] = 'watch video';
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/', 'Webginas\WebController@index');
Route::get('/menu', 'Webginas\WebController@getMenu');
Route::get('/gallery', 'Webginas\WebController@getGallery');
Route::get('/home-data', 'Webginas\WebController@getHome');
Route::get('/kontak', 'Webginas\WebController@getKontak');
Route::get('/page/{id}', 'Webginas\WebController@getPage');
Route::get('/news-data', 'Webginas\WebController@getNews');
Route::get('/article-data', 'Webginas\WebController@getArticle');
Route::get('/readitem/{id}', 'Webginas\WebController@readItem');
Route::get('/video-data', 'Webginas\WebController@getVideo');
Route::get('/watch-data', 'Webginas\WebController@getWatch');

Route::get('/article/{page}', function ($page) {
    
    // $data['page'] = $page;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['data'] = array('page' => $page);
    $param['menu'] = 'daftar article';
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/article/{page}/{bulan}/{tahun}', function ($page,$bulan,$tahun) {
    
    // $data['page'] = $page;
    // $data['bulan'] = $bulan;
    // $data['tahun'] = $tahun;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('page' => $page,'tahun'=>$tahun,'bulan'=>$bulan);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/article-categories', function (Request $request) {
    
    // $data['jenis'] = 'categories';
    // $data['str'] = $request->str;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('jenis' => 'categories','str'=>$request->str);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});

Route::get('/article-search', function (Request $request) {
    
    // $data['jenis'] = 'string';
    // $data['str'] = $request->str;
    // return view('webginas.article',$data);
    
    $param['view'] = 'webginas.article';
    $param['menu'] = 'daftar article';
    $param['data'] = array('jenis' => 'string','str'=>$request->str);
    $res = app('App\Http\Controllers\Webginas\WebController')->showView($param);

    return $res;
});




