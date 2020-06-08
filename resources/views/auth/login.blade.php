@extends('layouts.app')

@section('content')
    <!-- Landing Page Contents
        ================================================= -->
    <div id="lp-register">
        <div class="container wrapper">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="reg-form-container">

                        <!-- Register/Login Tabs-->
                        <div class="reg-options">
                            <ul class="nav nav-tabs">
                                <li><a href="#register" data-toggle="tab">Registrarse</a></li>
                                <li class="active"><a href="#login" data-toggle="tab">Iniciar Sesión</a></li>
                            </ul><!--Tabs End-->
                        </div>

                        <!--Registration Form Contents-->
                        <div class="tab-content">
                            <div class="tab-pane" id="register">
                                <h3>Registrate ahora!!</h3>

                                <!--Register Form-->
                                <form name="registration_form" id='registration_form' class="form-inline" method="post" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <label for="firstname" class="sr-only">Primer Nombre</label>
                                            <input id="name" class="form-control input-group-lg" type="text" name="name" title="Enter first name" placeholder="Primer nombre" required autofocus/>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="lastname" class="sr-only">Primer Apellido</label>
                                            <input id="surname" class="form-control input-group-lg" type="text" name="surname" title="Enter last name" placeholder="Segundo nombre" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="email" class="sr-only">Correo</label>
                                            <input id="email" class="form-control input-group-lg" type="email" name="email" title="Enter Email" placeholder="Correo" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="nickname" class="sr-only">Nombre de usuario</label>
                                            <input id="nickname" class="form-control input-group-lg" type="text" name="nickname" title="Enter password" placeholder="Nombre de Usuario" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="password" class="sr-only">Password</label>
                                            <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Contraseña" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="password_confirmation" class="sr-only">Confirmar contrseña</label>
                                            <input id="password_confirmation" class="form-control input-group-lg" type="password" name="password_confirmation" title="COnfirmar contraseña" placeholder="Confirmar contraseña" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <input class="btn btn-primary" type="submit" value="Registrarse"/>
                                        </div>
                                    </div>
                                </form><!--Register Now Form Ends-->
                            </div><!--Registration Form Contents Ends-->

                            <!--Login-->
                            <div class="tab-pane active" id="login">
                                <h3>Iniciar Sesión</h3>
                                <p class="text-muted">Inicia sesión en tu cuenta</p>

                                <!--Login Form-->
                                <form name="Login_form" id='Login_form' method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="my-nickname" class="sr-only">Nombre de usuario</label>
                                            <input id="my-nickname" class="form-control input-group-lg" type="text" name="nickname" title="Introduce tu correo" value="{{ old('nickname') }}" placeholder="Nombre de usuario" required autofocus/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="my-password" class="sr-only">Contraseña</label>
                                            <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Ingresa tu contraseña" placeholder="Contraseña" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <input class="btn btn-primary" type="submit" value="Iniciar sesión"/>
                                        </div>
                                    </div>
                                </form><!--Login Form Ends-->
                                <p><a href="{{ route('password.request') }}">¿Olvido su contraseña?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
