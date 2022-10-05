@extends('layouts.plantillabase');


@section('contenido')
    <h3>Agrergar un registro</h3>
    <form action="/articulos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="CodigoID" name="codigo">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="DescripcionID" name="descripcion">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="CantidadID" name="cantidad">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="PrecioID" name="precio">
        </div>
        <div class="mb-3 row">
            <label for="inputImg" class="col-sm-10 col-form-label"><strong>Seleccione la imagen del
                    producto</strong></label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" tabindex="4">Agregar</button>
        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </form>
@endsection
