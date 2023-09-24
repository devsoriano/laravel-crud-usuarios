<?php

namespace App\Models;
use App\Models\Rol;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
    ];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'roles_usuarios', 'usuario_id', 'rol_id');
    }
}
