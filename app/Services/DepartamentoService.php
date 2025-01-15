<?php

namespace App\Services;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Collection;

class DepartamentoService
{
    public function getActiveDepartamentos(): Collection
    {
        return Departamento::where('activo', true)->get();
    }
}
