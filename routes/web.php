<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-api', function () {
    return view('test_api');
});