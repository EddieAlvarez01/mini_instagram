@extends('layouts.prof')

@section('option-timeline')
    @include('layouts.timeline.normal-timeline')
@endsection

@section('content-sidebar')
    @include('layouts.sidebar.edit-sidebar')
@endsection

@section('content-page')
    <div class="about-profile">
        <div class="about-content-block">
            <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Información personal</h4>
            <p>Nombre:     {{ $information['name'] }}<br>
                Nombre de usuario:     {{ $information['nickname'] }} <br>
                Correo:     {{ $information['email'] }}
            </p>
        </div>
    </div>
@endsection
