<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $domain = $_SERVER['SERVER_NAME'];
    // echo $domain;
    switch ($domain){
        case 'fo.simkug.com' : 
            return redirect('dago-auth/login');
        break;
        case 'silo.simkug.com' : 
            return redirect('apv/login');
        break;
        case 'javaturbine.co.id' : 
        case 'www.javaturbine.co.id':
            return redirect('webjava-v2/');
        break;
        case 'trengginasjaya.com' :
        case 'www.trengginasjaya.com' : 
            // echo $domain;
            return redirect('webginas2/');
        break;
        case 'rds.esaku.id': 
            return redirect('esaku-auth/login');
        break;
        case 'tjmart.trengginasjaya.com' : 
            // echo $domain;
            return redirect('esaku-auth/login');
        break;
        case 'sdm.trengginasjaya.com' : 
            // echo $domain;
            return redirect('esaku-auth/login');
        break;
        case 'ts.simkug.com' :
            case 'www.ts.simkug.com' : 
                // echo $domain;
                return redirect('ts-auth/login');
            break;
        case 'sidarwis.com' : 
            return redirect('wisata-auth/login');
        break;
        case 'dash.simkug.com' : 
            return redirect('dash-telu/login');
        break;
        case 'siswa.simkug.com' : 
            return redirect('mobile-tarbak/login');
        break;
        case 'bisimkug.ypt.or.id' : 
            return redirect('dash-ypt/login');
        break;
        case 'devapp.simkug.com' : 
            return redirect('siaga-auth/login');
        break;
        default : 
            return view('welcome');
        break;
    }
});

// Route::get('/midtrans', 'DonationController@index')->name('midtrans');
// Route::get('/midtrans/finish', function(){
//     return redirect()->route('midtrans');
// })->name('donation.finish');

// Route::get('/midtrans/unfinish', function(){
//     return redirect()->route('midtrans');
// })->name('donation.unfinish');

// Route::get('/midtrans/error', function(){
//     return redirect()->route('midtrans');
// })->name('donation.error');
 

// Route::post('/donation/store', 'DonationController@submitDonation')->name('donation.store');
// Route::post('/midtrans/callback', 'DonationController@notificationHandler')->name('notification.handler');
 
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/socialite/callback/{provider}', 'SocialController@callback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
