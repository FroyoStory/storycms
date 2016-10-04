<?php

namespace App\Http\Controllers\Front;

use App\Post;

class PostController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = Post::paginate();

        return view('front.posts.index', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('slug', $id)->firstOrFail();

        $this->data['post']     = $post;
        $this->data['relateds'] = $post->related();

        return view('front.posts.show', $this->data);
    }
}
