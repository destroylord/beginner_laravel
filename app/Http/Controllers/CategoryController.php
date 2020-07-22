<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function show(Category $category)
    {

        // menampilkan semua post berdasarkan kategori
        $posts = $category->posts()->paginate();

        return view('posts.index', compact('posts','category'));
    }
}
