@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="timeline">
            <div class="timeline-cover">
                <!--Timeline Menu for Large Screens-->
                <div class="timeline-nav-bar hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-info">
                                <img src="{{ ($image_p == '') ? asset('images/user.svg') : action('ImageController@getImage', ['path' => $image_p, 'option' => 1]) }}" alt="" class="img-responsive profile-photo" />
                                <h3>{{ $information['nickname'] }}</h3>
                                <p class="text-muted">{{ $information['name'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="list-inline profile-menu">
                                @yield('option-timeline')
                            </ul>
                        </div>
                    </div>
                </div><!--Timeline Menu for Large Screens End-->
            </div>
            @yield('separation-timeline')
            <div id="page-contents">
                <div class="row">
                    @yield('content-sidebar')
                    <div class="col-md-7">
                        @yield('content-page')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
