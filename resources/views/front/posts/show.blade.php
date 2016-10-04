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
