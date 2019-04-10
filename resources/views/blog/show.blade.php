

@extends('layouts.app', ['current'=>'blog', 'nav_fixed'=>'false'])


@section('title')
    Clinica Ser | {{ $post->title }}
@endsection
@section('content')

  <div id="blog_show">

    <h1 id=post_title class="display-3 text-center">{{ $post->title }}</h1>

    <div class="container-fluid">

      <p id=post_text>
        {{ $post->message }}

      </p>
      <div id="comment-section" class="margin-bottom" style="margin-bottom:3em">
        <form class='margin-top' action="{{ route('comment_post') }}" method="post">
            @csrf
                <div class="card text-left">
                  <div style="height: 4em">
                        <input type="text"  name="comment" id="comment_input" class="" placeholder="Escreva um comentário" aria-describedby="helpId">
                        <input type="hidden" name='blog_id' id='blog_id' value={{ $post->id }}>
                  </div>
                </div>


        </form>

        @foreach ($post->comments as $comment)
        <div id=comment class="">

            <div class="card text-left">
              <div class="card-body">
                    <h6 class="card-title">{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small></h6>
                    <hr>
                    <p id=comment-text class="card-text">{{ $comment->comment }}</p>

              </div>
            </div>

          </div>

        @endforeach

      </div>
    </div>
  </div>
@endsection
