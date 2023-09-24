@extends('layouts.app')

@section('content')
    <h1>Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>
                        <ul>
                            @foreach($usuario->roles as $rol)
                                <li>{{ $rol->nombre }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('usuarios.create') }}">Crear Usuario</a>
@endsection
