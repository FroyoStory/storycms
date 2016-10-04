@extends('themes.'.$theme.'.layouts.default')

@section('title', 'Froyo CMS Blog - Page '.$posts->currentPage().' of '.$posts->total())

@section('content')
  @foreach($posts as $post)
    <article>
      <section class="title">
        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
      </section>
      <section class="body">
        {!! $post->html !!}
      </section>
    </article>
  @endforeach

  {!! $posts->links() !!}
@stop
