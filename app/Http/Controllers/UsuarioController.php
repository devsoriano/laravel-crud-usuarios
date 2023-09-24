<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:75',
            'correo' => 'required|email|unique:usuarios,correo',
        ]);

        $usuario = new Usuario([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
        ]);
        $usuario->save();

        $roles = $request->input('roles');
        $usuario->roles()->attach($roles);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:75',
            'correo' => 'required|email|unique:usuarios,correo,' . $id,
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->save();

        $roles = $request->input('roles');
        $usuario->roles()->sync($roles);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->roles()->detach();
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
