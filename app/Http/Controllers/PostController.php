<?php

namespace App\Http\Controllers;

use App\{Category, Post, Tag};
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

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
        return view('posts.create', [
                    'post' => new Post(),
                    'categories' => Category::get(),
                    'tags' => Tag::get()
                ]);
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
        $attr = $this->validateRequest();

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));
        // menambkan kategori
        $attr['category_id'] = request('category');
        
        // create new post
        $post = auth()->user()->posts()->create($attr); //craete post sesuai yang login

        // menyimpan field tags
        $post->tags()->attach(request('tags'));

        session()->flash('success','The post was created');
        // session()->flash('error','The post was created');
        
        return redirect('posts/all-posts');
        //return back(); // redirect kehalaman form add posts
    }
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }
    public function update(Post $post)
    {

        $attr = $this->validateRequest();
        // validate the field
        
        $attr['category_id'] = request('category');
        $post->update($attr);
        // update tags kedalam database
        $post->tags()->sync(request('tags'));

        session()->flash('success','The pos was updated');
        
        return redirect('posts/all-posts');
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->is($post->author)) {
            $post->tags()->detach();
            $post->delete();
            session()->flash('success',"The post was destroyed");
            
            return redirect('posts/all-posts');

        }else{
 
            session()->flash('danger',"It wasn't your Pos");
            
            return redirect('posts/all-posts');
        }
    }

    public function validateRequest()
    {
        return request()->validate([
            'title'     => 'required|min:3',
            'body'      => 'required',
            'category'  => 'required',
            'tags'      => 'array|required'
        ]);
    }
}
