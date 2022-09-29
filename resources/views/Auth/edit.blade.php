@extends('layouts.plantillabase');


@section('contenido')
    <h3><strong>Editar usuario</strong></h3>
    <form action="/usuarios/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        {{-- lo que hace el value me trae el valor que ya se habia ingresado anteriormente --}}
        <div class="mb-3 row">
            <label for="codigo" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nameID" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3 row">
            <label for="precio" class="form-label">Correo</label>
            <input type="text" class="form-control" id="emailID" name="email" value="{{$user->email}}">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="4">Editar</button>
        <a href="/usuarios" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </form>
@endsection
