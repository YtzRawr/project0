@extends('layouts.app-master')

@section('content')
    <br>
    @auth
        <p>
            {{-- ?? ->evalua una operacion --}}
            Bienvenido , <strong>{{ auth()->user()->name ?? auth()->user()->name }}</strong> estas autenticado!
        </p>
        <p>
            <a href="/logout">Cerrar session</a>
        </p>
    @endauth
    @guest
        <p>
            Para ver el contenido debes de iniciar sesion!  <a href="/loginmy"><strong>inicia sesion</strong></a>
        </p>
    @endguest
@endsection

