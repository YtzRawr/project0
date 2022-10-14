@extends('layouts.auth-master')

@section('content')
    <form action="/registermy" method="POST" enctype="multipart/form-data">
        @csrf
        @include('layouts.partials.messages')
        <div class="mb-2 row">
            <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Nombre</strong></label>
            <div class="col-sm-10">
                <input type="text" name="name" placeholder="ej: Mariano" class="form-control">
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label"><strong>Email</strong></label>
            <div class="col-sm-10">
                <input type="email" name="email" placeholder="example@example.cl" class="form-control">
            </div>
        </div>
        <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label"><strong>Repetir password</strong></label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="mb-2 row ">
            <label class="mb-2"><strong>Seleccione un role</strong></label>
            <select class="form-select mb-2 form-control" aria-label="Default select example" name="role">
                <option value="Administrador" name="Administrador">Administrador</option>
                <option value="Usuario" name="Usuario">Usuario</option>
            </select>
        </div>
        <div class="mb-3 row">
            <label for="inputImg" class="col-sm-10 col-form-label"><strong>Selecciona una imagen de perfil</strong></label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        {{-- Lugar de nacimiento --}}
        <div class="mb-2 row">
            <div>
                <label for=""><strong>Pais</strong></label>
                <select id="country_id" name="country_id" onchange="getStates()" class="form-select">
                    <option value="">Seleccione un país</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- country --}}
            <div>
                <label for="" class="mb-1"><Strong>Estado</Strong></label>
                <select class="form-select" aria-label="Default select example" id="state_id" onchange="getCities()"
                    name="state_id">
                    <option value="">Debe seleccionar un estado</option>
                </select>
            </div>
            {{-- state --}}
            <div>
                <label for=""><strong>Ciudad</strong></label>
                <select name="city_id" id="city_id" class="form-select" aria-label="Default select example">
                    <option value="">Debe seleccionar una ciudad</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
        <p>¿Ya dispone de una cuenta?, inicie session <a href="/loginmy"><strong>Aqui</strong></a></p>
    </form>
@endsection
<script>
    function getStates() {
        var item = document.querySelector('#country_id');
        var country_id = item.value;
        var url = '/api/states/' + country_id;
        // console.log(url);
        // hace una consulta
        fetch(url)
            .then(res => res.json())
            .then(res => {
                var content = '';
                var item2 = document.querySelector('#state_id');
                for (var i = 0; i < res.length; i++) {
                    var id = res[i].id;
                    var name = res[i].name;
                    content += "<option value='" + id + "'>" + name + "</option>";
                }
                item2.innerHTML = content;
                getCities();
            });
    }

    function getCities() {
        var item = document.querySelector('#state_id');
        var state_id = item.value;
        var url = '/api/cities/' + state_id;
        // console.log(url);
        // hace una consulta
        fetch(url)
            .then(res => res.json())
            .then(res => {
                var content = '';
                var item2 = document.querySelector('#city_id');
                for (var i = 0; i < res.length; i++) {
                    var id = res[i].id;
                    var name = res[i].name;
                    content += "<option value='" + id + "'>" + name + "</option>";
                }
                item2.innerHTML = content;
            });
    }
</script>
