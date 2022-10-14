@extends('layouts.auth-master')
<div class="d-flex justify-content-center">
    @section('content2')
        <form class="row g-3 p-5" action="/registermy" method="POST" enctype="multipart/form-data" id="form_register_id">
            @csrf
            @include('layouts.partials.messages')
            <h3 class="mb-3 text-primary">Formulario de registro</h3>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="inputEmail3" name="name">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label"><strong>Email</strong></label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label"><strong>Contraseña</strong></label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label"><strong>Repetir contraseña</strong></label>
                <input type="password" class="form-control" id="inputPassword4" name="password_confirmation">
            </div>
            <div class="col-md-6">
                <label class="mb-2 form-label"><strong>Seleccione un role</strong></label>
                <select class="form-select mb-2 form-control" aria-label="Default select example" name="role">
                    <option value="Administrador" name="Administrador">Administrador</option>
                    <option value="Usuario" name="Usuario">Usuario</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputImg" class="col-sm-10 form-label"><strong>Selecciona una imagen de
                        perfil</strong></label>
                <div class="col-sm-10">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            {{-- residencia --}}
            <div>
                <h4 class="mb-2 text-primary">Lugar de residencia</h4>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label"><strong>Pais</strong></label>
                <select name="country_id" id="country_id" onchange="getStates()" class="form-select">
                    <option value="">Seleccione un país</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label"><strong>Estado</strong></label>
                <select class="form-select" aria-label="Default select example" id="state_id" onchange="getCities()"
                    name="state_id">
                    <option value="">Seleccione un estado</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label"><strong>Ciudad</strong></label>
                <select name="city_id" id="city_id" class="form-select">
                    <option value="">Seleccione una ciudad</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Registrarse</strong></button>
            </div>
            <p>¿Ya dispone de una cuenta?, inicie session <a href="/loginmy"><strong>Aqui</strong></a></p>
        </form>
    @endsection
</div>

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
