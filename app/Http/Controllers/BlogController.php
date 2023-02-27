<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
