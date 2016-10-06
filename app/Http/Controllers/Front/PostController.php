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
    public function show($slug)
    {
        $post = Post::with('comment', 'comment.user')->where('slug', $slug)->firstOrFail();

        $this->data['post']      = $post;
        $this->data['comments']  = $post->comment;
        $this->data['relateds']  = $post->related();

        return view('front.posts.show', $this->data);
    }
}
