<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $pageLimit = 3;

    public function index()
    {
        $posts = Post::with('author')
                ->latestFirst()
                ->published()
                ->simplePaginate($this->pageLimit);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
