@extends('layouts.plantillabase');

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
@endsection


@section('contenido')
    <h3><strong>Registro de productos</strong></h3>
    <br>
    <a href="articulos/create" class="btn btn-success"><Strong>Crear registro</Strong></a>
    <br>
    <br>
    {{-- el datable se trae desde un id --}}
    <table class="table table-light table-striped shadow-lg mt-4" id="articulos">
        <thead class="bg-primary ">
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
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
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
@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
    {{-- script de la paginacion --}}
    <script>
        $(document).ready(function() {
            $('#articulos').DataTable({
                "lenghtmenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
            });
        })
    </script>
@endsection
@endsection
