<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', 'HomeController');

// Route::view('/', 'welcome');

Route::get('/contact', function () {
    // return view('contact');
    // return request()->path() == 'contact' ? 'sama' : 'tidak';
    // return request()->is('contact') ? 'sama' : 'tidak';
    return view('contact');
});
Route::view('/about', 'about');
Route::view('/login', 'login');


// Post
Route::get('posts', 'PostController@index');
Route::get('posts/create','PostController@create');
Route::post('posts/store','PostController@store');

Route::get('posts/{post:slug}/edit','PostController@edit');
Route::patch('posts/{post:slug}/update','PostController@update');

// put -> semua yang kita update di field
// patch -> sebagian field yang kita update

Route::get('posts/{post:slug}', 'PostController@show');
