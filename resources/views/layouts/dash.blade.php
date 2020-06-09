@extends('layouts.app')

@section('content')
    <div id="page-contents">
        <div class="container">
            <div class="row">

                <!-- Newsfeed Common Side Bar Left
          ================================================= -->
                <div class="col-md-3 static">
                    <div class="profile-card">
                        <img src="{{ (\Illuminate\Support\Facades\Auth::user()->image == '') ? asset('images/user.svg') : action('ImageController@getImage', ['path' => \Illuminate\Support\Facades\Auth::user()->image]) }}" alt="user" class="profile-photo" />
                        <h5><a href="timeline.html" class="text-white">{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</a></h5>
                    </div><!--profile card ends-->
                    <ul class="nav-news-feed">
                        <li><i class="icon ion-home"></i><div><a href="newsfeed-images.html">Inicio</a></div></li>
                        <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Mis imágenes</a></div></li>
                        <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">Mi perfil</a></div></li>
                        <li><i class="icon ion-ios-settings"></i><div><a href="{{ action('UserController@showEdit') }}">Editar perfil</a></div></li>
                        <li><i class="icon ion-ios-locked-outline"></i><div><a href="newsfeed-images.html">Cambiar contraseña</a></div></li>
                    </ul><!--news-feed links ends-->
                </div>

                <div class="col-md-7">

                    <!-- Post Create Box
                    ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                    <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <ul class="publishing-tools list-inline">
                                        <li><a href="#"><i class="ion-images"></i></a></li>
                                    </ul>
                                    <button class="btn btn-primary pull-right">Publish</button>
                                </div>
                            </div>
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
