<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $name = "Fahmi Dafrin Maulana";

    return view('welcome', ['name' => $name]);
});

// Route::view('/', 'welcome');

Route::get('/contact', function () {
    return view('contact');
});
Route::view('series/create', 'series.premium.show');