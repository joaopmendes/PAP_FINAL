@extends('layouts.app', ['current'=>'blog' , 'nav_fixed'=>'false'])


@section('title')
    ClinicaSer | Blog
@endsection

@section('content')
    <div class="container">
        <!-- All page Row -->
            <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Mensagem</th>
                            <th>Data da criação</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogPosts as $post)
                                    <tr>
                                        <td scope="row">{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td width=10% class="word-break" style="
                                        width:400px;">{{ $post->message }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="flex-container flex-center not-justify-center">
                                            <a href="{{ route('blog.show', [$post->id]) }} " style="margin:1em;"><i class="far fa-eye"></i></a>
                                            @auth
                                               @if(Auth::user()->admin == 'true')
                                                    <a href="{{ route('blog.edit', [$post->id]) }}">
                                                            <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('blog.destroy', [$post->id]) }}" method='POST'>
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete" />
                                                        <button class="btn btn-default" type="submit"><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                                                    </form>
                                               @endif
                                            @endauth
                                        </td>

                                    </tr>

                        @endforeach
                </tbody>
            </table>
            <div class="justify-content-center">
                {!! $blogPosts->links() !!}

        </div>
    </div>

@endsection
