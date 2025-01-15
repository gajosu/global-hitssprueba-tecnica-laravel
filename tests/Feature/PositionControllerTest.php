<?php

namespace Tests\Feature;

use App\Models\Cargo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PositionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_active_positions(): void
    {
        Cargo::create([
            'codigo' => 'DEV',
            'nombre' => 'Developer',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);

        Cargo::create([
            'codigo' => 'PM',
            'nombre' => 'Project Manager',
            'activo' => false,
            'idUsuarioCreacion' => 1
        ]);

        $response = $this->getJson('/api/cargos');

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
            ->assertJsonFragment(['codigo' => 'DEV'])
            ->assertJsonMissing(['codigo' => 'PM']);
    }
}
