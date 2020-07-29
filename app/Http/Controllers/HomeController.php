<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::latest()->limit(10)->get();
        return view('home', compact('posts'));
    }
}
