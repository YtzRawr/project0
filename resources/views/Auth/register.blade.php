@extends('layouts.auth-master')

@section('content')
    <form action="/registermy" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Formulario de registro</h3>
        @include('layouts.partials.messages')
        <div class="mb-2 row">
            <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Nombre</strong></label>
            <div class="col-sm-10">
                <input type="text" name="name" placeholder="ej: Mariano" class="form-control">
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
                <input type="email" name="email" placeholder="example@example.cl" class="form-control">
            </div>
        </div>
        <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Repetir password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="mb-2 row ">
            <label class="mb-2"><strong>Seleccione un role</strong></label>
            <select class="form-select mb-2 form-control" aria-label="Default select example" name="role">
                <option value="Administrador" name="Administrador">Administrador</option>
                <option value="Usuario" name="Usuario">Usuario</option>
            </select>
        </div>
        <div class="mb-3 row">
            <label for="inputImg" class="col-sm-10 col-form-label"><strong>Selecciona una imagen de perfil</strong></label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <p>¿Ya dispone de una cuenta?, inicie session <a href="/loginmy"><strong>Aqui</strong></a></p>
    </form>
@endsection
