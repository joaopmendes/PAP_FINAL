

@extends('layouts.app', ['current'=>'admin', 'nav_fixed'=>'true'])

@section('content')

    <div class="container" style="width:60%">
        @if (isset($message))
            @if ($message == 'Error')
                <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                    Alguma coisa correu mal.
                </div>
            @else
                <div class="alert alert-success" style='height: 2.5em; padding: 0.5em; '>
                    Utilizador Criado
                </div>
            @endif
        @endif

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            @method('POST')
            {{-- Name --}}
            <div class="form-group">
                <label for="name" style="font-size: 1.5em">Nome de Utilizador</label>
                <input type="text" name="name" id="title_post" class="form-control" placeholder="Insira o nome de utilizador" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Escreva o nome de utilizador que deseja criar.</small>
                @if ($errors->first('name'))
                    <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                        O campo Nome de Utilizador é obrigatório.
                    </div>
                 @endif
            </div>
            {{-- email --}}
            <div class="form-group">
                <label for="email" style="font-size: 1.5em">E-mail do Utilizador</label>
                <input type="text" name="email" id="title_post" class="form-control" placeholder="Insira o email do utilizdor" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Escreva o email do utilizador que deseja criar.</small>
                @if ($errors->first('email'))
                    <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                        {{ $errors->first('email') }}
                    </div>
                 @endif
            </div>
            {{-- password --}}
            <div class="form-group">
                <label for="password" style="font-size: 1.5em">Password</label>
                <input type="password" name="password" id="title_post" class="form-control" placeholder="Insira a palavra-pass do utilizador" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Escreva a palavra-passe do utilizador que deseja criar.</small>
                @if ($errors->first('password'))
                    <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                        {{ $errors->first('password') }}

                    </div>
                 @endif
            </div>
            {{-- Confirm Password --}}
                <div class="form-group">
                    <label for="password_confirm" style="font-size: 1.5em">Password</label>
                    <input type="password_confirm" name="password_confirm" id="title_post" class="form-control" placeholder="Insira a palavra-pass do utilizador" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Escreva a palavra-passe do utilizador que deseja criar.</small>
                    @if ($errors->first('password_confirm'))
                        <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                            {{ $errors->first('password_confirm') }}

                        </div>
                        @endif
                </div>
            {{-- admin --}}
            <div class="form-group">
                <label for="administrador" style="font-size: 1.5em">Administrador</label><br>
                <input type="radio" name="administrador" value="sim">Sim
                <input type="radio" name="administrador" value="nao">Não
            </div>
            @if ($errors->first('admin'))
            <div class="alert alert-danger" style='height: 2.5em; padding: 0.5em; '>
                {{ $errors->first('admin') }}

            </div>
         @endif
            <button type="submit" class="btn btn-primary">Criar Utilizador</button>
            <button type="button" id="apagar" class="btn btn-primary">Apagar</button>

        </form>


    </div>

@endsection
@section('scripts')

@endsection
