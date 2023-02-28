<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    protected $limit = 2;

    function index()
    {
        $posts = Post::with('author')->latestFirst()->published()->paginate($this->limit);

        return view('blog.index', compact('posts'));
    }

    function show($id)
    {
        $post = Post::published()->findOrFail($id);
        return view('blog.show', compact('post'));
    }
}
