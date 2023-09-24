@extends('layouts.app')

@section('content')
    <h1>Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST" id="formulario">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo">
        <label for="roles">Roles:</label>
        <select name="roles[]" id="roles" multiple>
            @foreach($roles as $rol)
                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
            @endforeach
        </select>
        <button type="submit">Crear Usuario</button>
    </form>
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>

    <script>
        const formulario = document.getElementById('formulario');

        formulario.addEventListener('submit', function (event) {
            let nombreInput = document.getElementById('nombre');
            let correoInput = document.getElementById('correo');
            let rolesSelect = document.getElementById('roles');

            if (nombreInput.value === '' || correoInput.value === '' || rolesSelect.value.length === 0) {
                event.preventDefault();
                alert('Todos los campos son obligatorios');
            }
        });
    </script>
@endsection
