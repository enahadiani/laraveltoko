<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('tahun-ajaran', 'Ts\TahunAjaranController@index');