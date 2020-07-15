<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts =  Post::latest()->paginate(6);
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
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        // cara pertama
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;

        // $post->save();

        // return redirect()->to('posts');

        // Cara kedua
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);

        // validate the field
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        $attr['slug'] = \Str::slug(request('title'));
        
        Post::create($attr);
        return back();
    }
}
