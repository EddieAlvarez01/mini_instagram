@extends('layouts.prof')

@section('option-timeline')
    @include('layouts.timeline.normal-timeline')
@endsection

@section('separation-timeline')
    <br>
    <br>
    <br>
@endsection

@section('content-sidebar')
    @include('layouts.sidebar.normal-sidebar')
@endsection

@section('content-page')
    @include('layouts.about')
@endsection
