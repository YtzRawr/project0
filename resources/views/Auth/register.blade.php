@extends('layouts.auth-master')

@section('content')
    <form action="/registermy" method="POST">
        @csrf
        <h1>Registrese</h1>
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
        <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Repetir password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <p>¿Ya dispone de una cuenta?, inicie session <a href="/loginmy"><strong>Aqui</strong></a></p>
    </form>
@endsection
