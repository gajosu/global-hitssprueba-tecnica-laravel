<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        Cargo::create([
            'codigo' => 'DEV',
            'nombre' => 'Desarrollador',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);

        Cargo::create([
            'codigo' => 'PM',
            'nombre' => 'Project Manager',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);
    }
}
