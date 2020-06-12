@if($information['id'] == \Illuminate\Support\Facades\Auth::id())
    <li><a href="#" class="active">Información</a></li>
@else
    <li><a {{ (\Illuminate\Support\Facades\Request::path() == 'user/show-profile/' . $information['id']) ? 'class=active' : '' }} href="{{ action('UserController@showProfile', ['id' => $information['id']]) }}">Fotos</a></li>
    <li><a {{ (\Illuminate\Support\Facades\Request::path() == 'user/show-profile-user/' . $information['id']) ? 'class=active' : '' }} href="{{ action('UserController@showAboutUser', ['id' => $information['id']]) }}">Información</a></li>
@endif
