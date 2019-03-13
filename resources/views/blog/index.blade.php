@extends('layouts.app', ['current'=>'blog' , 'nav_fixed'=>'true'])


@section('title')
    ClinicaSer | Blog
@endsection

@section('content')
    <div class="container">
        <!-- All page Row -->
        <div class="row">
            <div class="col-2 border">

            </div>
            <div class="col-10 border">
                @foreach ($blogPosts as $post)
                    <div class="row border">
                        <div class="col-12">
                            <h1>{{$post->title}}</h1>
                            <p>{{$post->message}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
    
@endsection