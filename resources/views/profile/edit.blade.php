@extends('layouts.prof')

@section('option-timeline')
    <li></li>
@endsection

@section('content-sidebar')
    @include('layouts.sidebar.edit-sidebar')
@endsection

@section('content-page')
    <!-- Basic Information
              ================================================= -->
    <div class="edit-profile-container">
        <div class="block-title">
            <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Editar la información básica</h4>
            <div class="line"></div>
        </div>
        <div class="edit-block">
            <form name="basic-info" id="basic-info" class="form-inline" action="{{ action('UserController@updateUser') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="firstname">Primer Nombre</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="name" placeholder="Primer nombre" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" required/>
                        @error('name')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="lastname" class="">Primer Apellido</label>
                        <input id="lastname" class="form-control input-group-lg" type="text" name="surname" title="Primer apellido" placeholder="Primer apellido" value="{{ \Illuminate\Support\Facades\Auth::user()->surname }}" required/>
                        @error('surname')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="email">Correo</label>
                        <input id="email" class="form-control input-group-lg" type="email" name="email" title="Enter Email" placeholder="My Email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" required/>
                        @error('email')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="image">Imagen</label>
                        <input id="image" class="form-control input-group-lg" type="file" name="image" />
                        @error('image')
                            <strong class="error-validate">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection
