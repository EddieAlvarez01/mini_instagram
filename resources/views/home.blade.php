@extends('layouts.dash')

@section('content-images')
    @foreach($images as $image)
        <div class="grid-item col-md-6 col-sm-6">
            <div class="media-grid">
                <div class="img-wrapper" data-toggle="modal" data-target=".modal-{{ $image->id }}">
                    <img src="{{ action('ImageController@getImage', ['path' => $image->path, 'option' => 0]) }}" alt="" class="img-responsive post-image" />
                </div>
                <div class="media-info">
                    <div class="reaction">
                        <a class="btn text-green"><i class="fa fa-thumbs-up"></i> 63</a>
                    </div>
                    <div class="user-info">
                        <img src="{{ ($image->user->image != '') ? action('ImageController@getImage', ['path' => $image->user->image, 'option' => 1]) : asset('images/user.svg') }}" alt="" class="profile-photo-sm pull-left" />
                        <div class="user">
                            <h6><a href="#" class="profile-link">{{ $image->user->nickname }}</a></h6>
                        </div>
                    </div>
                </div>

                <!--Popup-->
                <div class="modal fade modal-{{ $image->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="post-content">
                                <img src="{{ action('ImageController@getImage', ['path' => $image->path, 'option' => 0]) }}" alt="post-image" class="img-responsive post-image" />
                                <div class="post-container">
                                    <img src="{{ ($image->user->image != '') ? action('ImageController@getImage', ['path' => $image->user->image, 'option' => 1]) : asset('images/user.svg') }}" alt="user" class="profile-photo-md pull-left" />
                                    <div class="post-detail">
                                        <div class="user-info">
                                            <h5><a href="timeline.html" class="profile-link">{{ $image->user->name . ' ' . $image->user->surname }}</a></h5>
                                            <p class="text-muted">{{ FormatTime::relativeDate($image->created_at) }}</p>
                                        </div>
                                        <div class="reaction">
                                            <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                                        </div>
                                        <div class="line-divider"></div>
                                        <div class="post-text">
                                            <p>{{ $image->description }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                                        </div>
                                        <div class="line-divider"></div>
                                        <div class="post-comment">
                                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                            <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                        </div>
                                        <div class="post-comment">
                                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                            <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                        </div>
                                        <div class="post-comment">
                                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                                            <input type="text" class="form-control" placeholder="Post a comment">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Popup End-->

            </div>
        </div>
    @endforeach
    {{ $images->links() }}
@endsection
