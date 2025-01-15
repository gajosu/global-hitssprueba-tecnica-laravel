<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['codigo', 'nombre', 'activo', 'idUsuarioCreacion'];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'idDepartamento');
    }
}
