

@extends('layouts.app', ['current'=>'blog', 'nav_fixed'=>'false'])


@section('title')
    Clinica Ser | {{ $post->title }}
@endsection
@section('content')

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p >
            {{ $post->message }}

        </p>
        <div class="comment-section">
            <hr>
            @foreach ($post->comments as $comment)
                <h4>{{ $comment->user->name }}</h4>
                    {{ $comment->comment }}
            @endforeach

        </div>
    </div>
@endsection
