@extends('themes.'.$theme.'.layouts.default')

@section('title', $post->title)

@section('content')
  <div class="row">
    <div class="col-md-8">
      <section class="header">
        {{ $post->title }}
      </section>
      <section class="body">
        {!! $post->html !!}
      </section>

      @if (Auth::check())
        <h3>Please leave a comment</h3>
        <form id="comment_form" class="cmtform" method="post" action="/comment/{{ $post->id }}">
          {{ csrf_field() }}
          <textarea id="comment" name="comment" class="cmt_textarea"></textarea>
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
          <button type="submit">Send a comment</button>
        </form>
      @else
        <h3>Please login to comment</h3>
      @endif

      @if ($comments->count() === 0)
        <h3>Be the first to comment</h3>
      @else
        @foreach($comments as $comment)
          <div class="usercmt">{{ $comment->user->name }}</div>
          <div class="cmtcontent">{{ $comment->comment }}</div>

        @endforeach
      @endif

    </div>
    <div class="col-md-4">
      @foreach($relateds as $related)
        <section>
          <a href="/blog/{{ $related->slug }}">{{ $related->title }}</a>
        </section>
      @endforeach
    </div>
  </div>
@stop
