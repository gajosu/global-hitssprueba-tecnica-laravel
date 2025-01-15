<?php

namespace App\Services;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Collection;

class CargoService
{
    public function getActiveCargos(): Collection
    {
        return Cargo::where('activo', true)->get();
    }
}
