<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        Departamento::create([
            'codigo' => 'IT',
            'nombre' => 'Tecnología',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);

        Departamento::create([
            'codigo' => 'RH',
            'nombre' => 'Recursos Humanos',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);
    }
}
