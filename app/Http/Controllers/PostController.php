<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function show($slug)
    {

        $post = \DB::table('posts')->where('slug', $slug)->first();
        // dd($post);
        return view('posts.show', compact('post'));
    }
}
