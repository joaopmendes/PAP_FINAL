


@extends('layouts/app', ['current'=>'admin', 'nav_fixed'=>'true'])

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('blog.create') }}" role="button">Criar Post</a>
    </div>

@endsection
