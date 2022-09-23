@extends('layouts.plantillabase');


@section('contenido')
    <h3><strong>Registro de productos</strong></h3>
    <br>
    <a href="articulos/create" class="btn btn-success"><Strong>Crear registro</Strong></a>
    <br>
    <br>
    <table class="table table-light table-striped">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->codigo }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->cantidad }}</td>
                    <td>{{ $articulo->precio }}</td>
                    <td>
                        <form action="{{route('articulos.destroy', $articulo->id)}}" method="POST">
                            <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-warning">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
