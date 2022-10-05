@extends('layouts.plantillabase')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
@endsection


@section('contenido')
    <h3><strong>Registro de usuarios</strong></h3>
    <br>
    <br>
    {{-- el datable se trae desde un id --}}
    <table class="table table-light table-striped shadow-lg mt-4" id="usuarios">
        <thead class="bg-primary ">
            <tr>
                <th scope="col"><strong>ID</strong></th>
                <th scope="col"><strong>Nombre</strong></th>
                <th scope="col"><strong>Email</strong></th>
                <th scope="col"><strong>Role</strong></th>
                <th scope="col"><strong>Foto de perfil</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <img src="{{$usuario->image}}" width="60px" height="65px" class="rounded-circle">
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
                "lenghtmenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]
            });
        })
    </script>
@endsection
@endsection
