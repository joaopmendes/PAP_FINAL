

@extends('layouts.app', ['current'=>'blog', 'nav_fixed'=>'false'])


@section('title')
    Clinica Ser | {{ $post->title }}
@endsection
@section('content')

  <div id="blog_show">

    <h1 id=post_title class="display-3 text-center">{{ $post->title }}</h1>

    <div class="container">

      <p id=post_text>
        {{ $post->message }}

      </p>
      <div id="comment-section">

        @foreach ($post->comments as $comment)
          <div id=comment>

            <h6>{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small></h6>
            <p>{{ $comment->comment }}</p>
          </div>

        @endforeach

      </div>
    </div>
  </div>
@endsection
