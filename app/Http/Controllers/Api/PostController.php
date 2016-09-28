<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Parsedown;
use Responder;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post = Post::paginate();

        return $post ? Responder::success($post) : Responder::error();
    }

    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title'            => $request->input('title'),
            'slug'             => $request->input('slug'),
            'markdown'         => $request->input('markdown'),
            'html'             => (new Parsedown)->text($request->input('markdown')),
            'is_featured'      => $request->input('is_featured') ? 1 : 0,
            'is_page'          => $request->input('is_page') ? 1 : 0,
            'status'           => $request->input('status'),
            'visibility'       => $request->input('visibility') ? 'public' : 'private',
            'meta_title'       => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'author_id'        => $request->user()->id,
            'category_id'      => $request->input('category_id'),
        ]);

        return $post ? Responder::success($post) : Responder::error();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return Responder::success($post);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->title            = $request->input('title');
        $post->slug             = $request->input('slug');
        $post->markdown         = $request->input('markdown');
        $post->html             = (new Parsedown)->text($request->input('markdown'));
        $post->is_featured      = $request->input('is_featured') ? 1 : 0;
        $post->is_page          = $request->input('is_page') ? 1 : 0;
        $post->status           = $request->input('status');
        $post->visibility       = $request->input('visibility') ? 'public' : 'private';
        $post->meta_title       = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->category_id      = $request->input('category_id');

        return $post->save() ? Responder::success($post) : Responder::error();

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        return $post->delete() ? Responder::success('OK') : Responder::error();
    }
}
