@extends('layouts.app', ['current'=>'index'])


@section('title')
    ClinicaSer | Home
@endsection


@section('content')
    @component('component.carrousel')
        
    @endcomponent
@endsection

@section('footer')
    @component('component.footer')
            
    @endcomponent
@endsection
