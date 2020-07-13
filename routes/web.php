<?php

// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {

    return view('Home');
});

// Route::view('/', 'welcome');

Route::get('/contact', function () {
    // return view('contact');
    // return request()->path() == 'contact' ? 'sama' : 'tidak';
    // return request()->is('contact') ? 'sama' : 'tidak';
    return view('contact');
});
Route::view('/about', 'about');
Route::view('/login', 'login');