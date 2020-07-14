<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts =  Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }
    //
    public function show(Post $post)
    {

        // $post = Post::where('slug', $slug)->first();

        // if (!$post) {
        //     abort(404);
        // }

        return view('posts.show', compact('post'));
    }
}
