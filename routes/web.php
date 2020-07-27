<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('posts')->middleware('auth')->group( function () {
    
    Route::get('all-posts', 'PostController@index')->name('posts.index')->withoutMiddleware('auth');

    Route::get('create','PostController@create')->name('posts.create');
    Route::post('store','PostController@store');

    Route::get('{post:slug}/edit','PostController@edit');
    Route::patch('{post:slug}/update','PostController@update');
    Route::delete('{post:slug}/delete','PostController@destroy');

});
// put -> semua yang kita update di field
// patch -> sebagian field yang kita update

Route::get('posts/{post:slug}', 'PostController@show');

// Category
Route::get('categories/{category:slug}','CategoryController@show');
// Tag
Route::get('tags/{tag:slug}','TagController@show');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
