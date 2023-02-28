<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    protected $limit = 2;

    private function getCategories()
    {
        return Category::with('posts')->orderBy('title', 'desc')->get();
    }

    function index()
    {
        $categories = $this->getCategories();

        $posts = Post::with('author')->with('category')->latestFirst()->published()->paginate($this->limit);

        return view('blog.index', compact('categories', 'posts'));
    }

    function show(Post $post)
    {
        $categories = $this->getCategories();
        return view('blog.show', compact('categories', 'post'));
    }

    function category(Category $category)
    {
        $categories = $this->getCategories();

        $posts = Post::with('author')->where('category_id', $category->id)->latestFirst()->published()->paginate($this->limit);

        return view('blog.category', compact('category', 'categories', 'posts'));
    }
}
