@extends('layouts.auth-master')
@section('content')
    <form action="/loginmy" method="POST">
        @csrf
        <div class="mb-2">
                <img src="/img/user-logo2.webp" width="200px" height="180px">
                <h3><strong>Inicio de session</strong></h3>
        </div>
        @include('layouts.partials.messages')
        <div class="mb-2 row">
            <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
                <input type="text" name="email" placeholder="example@example.cl" class="form-control">
            </div>
        </div>
        <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb">
                <p>¿No dispone de una cuenta?, registrese <a href="/registermy"><strong>Aqui</strong></a></p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar session</button>
    </form>
@endsection
