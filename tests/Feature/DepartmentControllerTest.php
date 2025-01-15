<?php

namespace Tests\Feature;

use App\Models\Departamento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_active_departments(): void
    {
        Departamento::create([
            'codigo' => 'IT',
            'nombre' => 'Technology',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);

        Departamento::create([
            'codigo' => 'HR',
            'nombre' => 'Human Resources',
            'activo' => false,
            'idUsuarioCreacion' => 1
        ]);

        $response = $this->getJson('/api/departamentos');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'codigo',
                    'nombre',
                    'activo',
                    'idUsuarioCreacion'
                ]
            ])
            ->assertJsonFragment(['codigo' => 'IT'])
            ->assertJsonMissing(['codigo' => 'HR']);
    }
}
