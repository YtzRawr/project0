@extends('layouts.auth-master')
<div class="d-flex justify-content-center">
    @section('content')
    <form action="/loginmy" method="POST">
        @csrf
        <div class="mb-2">
            <img src="/img/user-logo2.webp" width="200px" height="180px">
            <h3><strong>Inicio de session</strong></h3>
        </div>
        @include('layouts.partials.messages')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><strong>Contraseña</strong></label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary"><strong>Iniciar session</strong></button>
        <div>
            <p>¿No dispone de una cuenta?, registrese <a href="/registermy"><strong>Aqui</strong></a></p>
        </div>
    </form>
    @endsection
</div>
