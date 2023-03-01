<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    protected $limit = 2;

    function index()
    {
        $posts = Post::with('author')->with('category')->latestFirst()->published()->paginate($this->limit);
        return view('blog.index', compact('posts'));
    }

    function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    function category(Category $category)
    {
        $posts = Post::with('author')->where('category_id', $category->id)->latestFirst()->published()->paginate($this->limit);

        return view('blog.category', compact('category', 'posts'));
    }
}
