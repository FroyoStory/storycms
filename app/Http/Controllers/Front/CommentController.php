<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\CommentRequest;
use Auth;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends FrontController
{
    public function store(CommentRequest $request, $id)
    {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back();
    }
}
