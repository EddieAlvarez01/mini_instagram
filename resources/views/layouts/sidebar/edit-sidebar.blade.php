<div class="col-md-3">

    <!--Edit Profile Menu-->
    <ul class="edit-menu">
        <li {{ (\Illuminate\Support\Facades\Request::path() == '/') ? 'class=active' : '' }}><i class="icon ion-home"></i><a href="{{ action('HomeController@index') }}">Inicio</a></li>
        <li><i class="icon ion-images"></i><a href="{{ route('home.myImages') }}">Mis imágenes</a></li>
        <li><i class="icon ion-ios-paper"></i><a href="{{ action('UserController@showProfile', ['id' => \Illuminate\Support\Facades\Auth::id()]) }}">Mi perfil</a></li>
        <li {{ (\Illuminate\Support\Facades\Request::path() == 'user/show-edit') ? 'class=active' : '' }}><i class="icon ion-ios-settings"></i><a href="{{ '' }}">Editar perfil</a></li>
        <li><i class="icon ion-ios-locked-outline"></i><a href="edit-profile-password.html">Cambiar contraseña</a></li>
        <li><i class="icon ion-ios-close-outline"></i><a id="btnLogout" href="#">Cerrar sesión</a></li>
    </ul>
</div>
