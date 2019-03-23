

@extends('layouts.app', ['current'=>'blog', 'nav_fixed'=>'true'])

@section('content')

    <div class="container" style="width:60%">
            @if (isset($message))
                <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                    {{ $message }}
                </div>
            @endif
        <form action="{{ route('blog.store') }}" method="POST">
            @csrf

            @method('POST')
            <div class="form-group">
                <label for="title" style="font-size: 1.5em">Título</label>
                <input type="text" name="title" id="title-post" class="form-control" placeholder="Insira o titulo" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Escreva um titulo intuitivo</small>
                @if ($errors->first('title'))
                    <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                        O campo título é obrigatório.
                    </div>
                 @endif
            </div>
            <div class="form-group">
                    <label for="Mensagem Do Post" style="font-size: 1.5em">Mensagem Do Post</label>
                    <textarea rows=8 type="text" name="message" id="message-post" class="form-control" placeholder="Insira o post" aria-describedby="helpId"></textarea>
                    <small id="helpId" class="text-muted">Insira a mensagem do post</small>
                    @if ($errors->first('message'))
                        <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                            O campo 'Mensagem do Post' é obrigatório.
                        </div>
                    @endif
            </div>

            <button type="submit" class="btn btn-primary">Enviar post</button>
            <button type="button" id="apagar" class="btn btn-primary">Apagar</button>

        </form>


    </div>

@endsection
@section('scripts')
$( "#apagar" ).click(function() {
    $("#title-post").text(" ");
    $("#title-post").val('');
    $('#message-post').empty();
    $('#message-post').val("");
});

@endsection
