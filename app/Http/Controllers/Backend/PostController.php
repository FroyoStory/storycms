<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.post.index');
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('backend.post.edit', compact('post'));
    }
}
