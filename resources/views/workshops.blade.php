@extends('layouts.app', ['current' => 'workshops' , 'nav_fixed'=>'true'])


@section('title')
    ClinicaSer | Workshops
@endsection


@section('content')
    @component('component.carrousel')
        
    @endcomponent
@endsection
