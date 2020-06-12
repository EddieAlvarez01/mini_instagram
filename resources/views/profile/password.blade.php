@extends('layouts.prof')

@section('option-timeline')
    <li></li>
@endsection

@section('content-sidebar')
    @include('layouts.sidebar.edit-sidebar')
@endsection

@section('content-page')
    <div class="edit-profile-container">
        <div class="block-title">
            <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Cambiar contraseña</h4>
            <div class="line"></div>
        </div>
        <div class="edit-block">
            <form name="update-pass" id="education" class="form-inline" action="{{ action('UserController@updatePassword') }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="my-password">Contraseña actual</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="oldPassword" title="Enter password" placeholder="contraseña actual" required/>
                        @error('oldPassword')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label>Nueva contarseña</label>
                        <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Nueva contraseña" required/>
                        @error('password')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Confirmar contraseña</label>
                        <input class="form-control input-group-lg" type="password" name="password_confirmation" title="Enter password" placeholder="Confirmar contraseña" required/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
            </form>
        </div>
    </div>
@endsection
