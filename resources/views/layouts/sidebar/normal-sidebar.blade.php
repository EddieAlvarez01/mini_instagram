<div class="col-md-3 static">
    <div class="profile-card">
        <img src="{{ (\Illuminate\Support\Facades\Auth::user()->image == '') ? asset('images/user.svg') : action('ImageController@getImage', ['path' => \Illuminate\Support\Facades\Auth::user()->image, 'option' => 1]) }}" alt="user" class="profile-photo" />
        <h5><a href="{{ action('UserController@showProfile', ['id' => \Illuminate\Support\Facades\Auth::id()]) }}" class="text-white">{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</a></h5>
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
        <li><i class="icon ion-home"></i><div><a href="{{ action('HomeController@index') }}">Inicio</a></div></li>
        <li><i class="icon ion-images"></i><div><a href="{{ route('home.myImages') }}">Mis imágenes</a></div></li>
        <li><i class="icon ion-ios-paper"></i><div><a href="{{ action('UserController@showProfile', ['id' => \Illuminate\Support\Facades\Auth::id()]) }}">Mi perfil</a></div></li>
        <li><i class="icon ion-ios-settings"></i><div><a href="{{ action('UserController@showEdit') }}">Editar perfil</a></div></li>
        <li><i class="icon ion-ios-locked-outline"></i><div><a href="{{ action('UserController@showChangePassword') }}">Cambiar contraseña</a></div></li>
        <li><i class="icon ion-ios-close-outline"></i><div><a id="btnLogout" href="#">Cerrar sesión</a></div></li>
    </ul><!--news-feed links ends-->
</div>
