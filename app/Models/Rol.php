<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla en plural
    protected $table = 'roles';

    public function usuarios()
    {
        // Especifica la tabla pivot correctamente
        return $this->belongsToMany(Usuario::class, 'roles_usuarios', 'rol_id', 'usuario_id');
    }
}
