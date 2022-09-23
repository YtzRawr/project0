@extends('layouts.plantillabase');


@section('contenido')
    <h3><strong>Editar registro</strong></h3>
    <form action="/articulos/{{$articulo->id}}" method="POST">
        @csrf
        @method('PUT')
        {{-- lo que hace el value me trae el valor que ya se habia ingresado anteriormente --}}
        <div class="mb-3">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="CodigoID" name="codigo" value="{{$articulo->codigo}}">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="DescripcionID" name="descripcion" value="{{$articulo->descripcion}}">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="CantidadID" name="cantidad" value="{{$articulo->cantidad}}">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="PrecioID" name="precio" value="{{$articulo->precio}}">
        </div>
        <button type="submit" class="btn btn-primary" tabindex="4">Editar</button>
        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </form>
@endsection
