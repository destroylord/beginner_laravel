<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('Home');
});

// Route::view('/', 'welcome');

Route::get('/contact', function () {
    return view('contact');
});
Route::view('/about', 'about');
Route::view('login', 'login');