@extends('layouts.app', ['current' => 'workshops' , 'nav_fixed'=>'true'])


@section('title')
    ClinicaSer | Workshops
@endsection


@section('content')
    <div class="container">

        @component('component.carrousel')

        @endcomponent

    </div>
@endsection
