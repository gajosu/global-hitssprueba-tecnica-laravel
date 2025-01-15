<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'usuario' => 'admin',
            'primerNombre' => 'Admin',
            'email' => 'admin@example.com',
            'segundoNombre' => '',
            'primerApellido' => 'System',
            'segundoApellido' => '',
            'idDepartamento' => 1, // IT
            'idCargo' => 1, // DEV
        ]);

        User::create([
            'usuario' => 'jdoe',
            'email' => 'jdoe@example.com',
            'primerNombre' => 'John',
            'segundoNombre' => '',
            'primerApellido' => 'Doe',
            'segundoApellido' => '',
            'idDepartamento' => 2, // RH
            'idCargo' => 2, // PM
        ]);

        User::create([
            'usuario' => 'jsmith',
            'email' => 'jsmith@example.com',
            'primerNombre' => 'Jane',
            'segundoNombre' => 'Marie',
            'primerApellido' => 'Smith',
            'segundoApellido' => 'Johnson',
            'idDepartamento' => 1, // IT
            'idCargo' => 1, // DEV
        ]);
    }
}
