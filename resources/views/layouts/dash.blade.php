@extends('layouts.app')

@section('content')
    <div id="page-contents">
        <div class="container">
            <div class="row">

                @include('layouts.sidebar.normal-sidebar')

                <div class="col-md-7">

                    <!-- Post Create Box
                    ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <form action="{{ action('ImageController@createImage') }}" method="post" name="form-publish" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <img src="{{ (\Illuminate\Support\Facades\Auth::user()->image == '') ? asset('images/user.svg') : action('ImageController@getImage', ['path' => \Illuminate\Support\Facades\Auth::user()->image, 'option' => 1]) }}" alt="user" class="profile-photo-md" />
                                        <textarea name="description" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Descripción" required></textarea>
                                        @error('description')
                                            <strong class="error-validate">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="tools">
                                        <ul class="publishing-tools list-inline">
                                            <li><a href="#" id="btnImage"><i class="ion-images"></i></a></li>
                                        </ul>
                                        <button type="submit" class="btn btn-primary pull-right">Publicar</button>
                                    </div>
                                </div>
                                @error('image')
                                    <strong class="error-validate">{{ $message }}</strong>
                                @enderror
                            </form>
                        </div>
                    </div><!-- Post Create Box End -->

                    <!-- Media
                    ================================================= -->
                    <div class="media">
                        <div class="row js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
                            <div class="grid-sizer col-md-6 col-sm-6"></div>

                            @yield('content-images')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
