<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        .table {
            width: 100%;
            border: 1px solid #999999;
        }
    </style>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Precio</strong></th>
                <th><strong>Descripcion</strong></th>
                <th><strong>Codigo</strong></th>
                <th><strong>Cantidad</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->precio }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->cantidad }}</td>
                    <td>{{ $articulo->codigo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
