@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $usuario->nombre }}">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="{{ $usuario->correo }}">
        <label for="roles">Roles:</label>
        <select name="roles[]" id="roles" multiple>
            @foreach($roles as $rol)
                <option value="{{ $rol->id }}" {{ $usuario->roles->contains($rol->id) ? 'selected' : '' }}>
                    {{ $rol->nombre }}
                </option>
            @endforeach
        </select>
        <button type="submit">Actualizar Usuario</button>
    </form>
    <a href="{{ route('usuarios.index') }}">Volver a la lista</a>
@endsection
