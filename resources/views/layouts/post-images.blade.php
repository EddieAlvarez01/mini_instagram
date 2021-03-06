@foreach($images as $image)
    <div class="grid-item col-md-6 col-sm-6">
        <div class="media-grid">
            <div class="img-wrapper" data-toggle="modal" data-target=".modal-{{ $image->id }}">
                <img src="{{ action('ImageController@getImage', ['path' => $image->path, 'option' => 0]) }}" alt="" class="img-responsive post-image" />
            </div>
            <div class="media-info">
                <div class="reaction">
                    @foreach($image->likes as $like)
                        @if($like->image_id == $image->id && $like->user_id == \Illuminate\Support\Facades\Auth::id())
                            <a class="btn text-green hand" id="btnLike" data-id="{{ $image->id }}"><i class="fa fa-thumbs-up"></i> {{ count($image->likes) }}</a>
                            <?php $isV = true; ?>
                            @break
                        @endif
                    @endforeach
                    @if(!isset($isV))
                            <a class="btn hand" id="btnLike" data-id="{{ $image->id }}"><i class="fa fa-thumbs-up"></i> {{ count($image->likes) }}</a>
                    @else
                        <?php unset($isV); ?>
                    @endif
                </div>
                <div class="user-info">
                    <img src="{{ ($image->user->image != '') ? action('ImageController@getImage', ['path' => $image->user->image, 'option' => 1]) : asset('images/user.svg') }}" alt="" class="profile-photo-sm pull-left" />
                    <div class="user">
                        <h6><a href="{{ action('UserController@showProfile', ['id' => $image->user->id]) }}" class="profile-link">{{ $image->user->nickname }}</a></h6>
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
                                        <h5><a href="{{ action('UserController@showProfile', ['id' => $image->user_id]) }}" class="profile-link">{{ $image->user->name . ' ' . $image->user->surname }}</a></h5>
                                        <p class="text-muted">{{ FormatTime::relativeDate($image->created_at) }}</p>
                                    </div>
                                    <div class="reaction">
                                        @foreach($image->likes as $like)
                                            @if($like->image_id == $image->id && $like->user_id == \Illuminate\Support\Facades\Auth::id())
                                                <a class="btn text-green hand" id="btnLike" data-id="{{ $image->id }}"><i class="fa fa-thumbs-up"></i> {{ count($image->likes) }}</a>
                                                <?php $isV = true; ?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(!isset($isV))
                                            <a class="btn hand" id="btnLike" data-id="{{ $image->id }}"><i class="fa fa-thumbs-up"></i> {{ count($image->likes) }}</a>
                                        @else
                                            <?php unset($isV); ?>
                                        @endif
                                    </div>
                                    <div class="line-divider"></div>
                                    <div class="post-text">
                                        <p>{{ $image->description }}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                                    </div>
                                    <div class="line-divider"></div>
                                    @foreach($image->comments as $comment)
                                        <div class="post-comment">
                                            <img src="{{ ($comment->user->image != '') ? action('ImageController@getImage', ['path' => $comment->user->image, 'option' => 1]) : asset('images/user.svg') }}" alt="" class="profile-photo-sm" />
                                            @if($comment->user->id == \Illuminate\Support\Facades\Auth::id())
                                                <ul class="publishing-tools list-inline">
                                                    <li><a href="{{ action('CommentController@deleteComment', ['id' => $comment->id]) }}"><i class="icon ion-ios-trash-outline"></i></a></li>
                                                </ul>
                                            @endif
                                            <p><a href="{{ action('UserController@showProfile', ['id' => $comment->user_id]) }}" class="profile-link">{{ $comment->user->nickname }} </a><i class="em em-laughing"></i>{{ $comment->content }}</p>
                                        </div>
                                    @endforeach
                                    <form id="formComment">
                                        @csrf
                                        <div class="post-comment">
                                            <img src="{{ (\Illuminate\Support\Facades\Auth::user()->image != '') ? action('ImageController@getImage', ['path' => \Illuminate\Support\Facades\Auth::user()->image, 'option' => 1]) : asset('images/user.svg') }}" alt="" class="profile-photo-sm" />
                                            <input type="hidden" value="{{ $image->id }}" name="img_id">
                                            <input type="text" name="content" id="cleanInput" class="form-control" placeholder="Escribe un comentario" required>
                                            @error('content')
                                                <strong class="error-validate">{{ $message }}</strong>
                                            @enderror
                                            <button type="submit" class="btn btn-primary pull-right">Postear</button>
                                        </div>
                                    </form>
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
