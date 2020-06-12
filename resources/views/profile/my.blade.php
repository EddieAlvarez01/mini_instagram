@extends('layouts.prof')

@section('option-timeline')
    @include('layouts.timeline.normal-timeline')
@endsection

@section('content-sidebar')
    @include('layouts.sidebar.edit-sidebar')
@endsection

@section('content-page')
    @include('layouts.about')
@endsection
