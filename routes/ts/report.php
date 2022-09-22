<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('email-send', 'Ts\DashSiswaController@sendEmail');