<?php

namespace Tests\Feature;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private Departamento $department;
    private Cargo $position;

    protected function setUp(): void
    {
        parent::setUp();

        $this->department = Departamento::create([
            'codigo' => 'IT',
            'nombre' => 'Technology',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);

        $this->position = Cargo::create([
            'codigo' => 'DEV',
            'nombre' => 'Developer',
            'activo' => true,
            'idUsuarioCreacion' => 1
        ]);
    }

    public function test_can_list_users(): void
    {
        User::create([
            'usuario' => 'jdoe',
            'email' => 'jdoe@example.com',
            'primerNombre' => 'John',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => $this->department->id,
            'idCargo' => $this->position->id
        ]);

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'usuario',
                    'email',
                    'primerNombre',
                    'primerApellido',
                    'idDepartamento',
                    'idCargo',
                    'departamento',
                    'cargo'
                ]
            ]);
    }

    public function test_can_create_user(): void
    {
        $userData = [
            'usuario' => 'jdoe',
            'email' => 'jdoe@example.com',
            'primerNombre' => 'John',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => $this->department->id,
            'idCargo' => $this->position->id
        ];

        $response = $this->postJson('/api/users', $userData);

        $response->assertStatus(201)
            ->assertJsonFragment($userData);

        $this->assertDatabaseHas('users', $userData);
    }

    public function test_can_update_user(): void
    {
        $user = User::create([
            'usuario' => 'jdoe',
            'email' => 'jdoe@example.com',
            'primerNombre' => 'John',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => $this->department->id,
            'idCargo' => $this->position->id
        ]);

        $updatedData = [
            'usuario' => 'johndoe',
            'email' => 'johndoe@example.com',
            'primerNombre' => 'Johnny',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => $this->department->id,
            'idCargo' => $this->position->id
        ];

        $response = $this->putJson("/api/users/{$user->id}", $updatedData);
        $response->assertStatus(200);

        $this->assertDatabaseHas('users', $updatedData);

        $response->assertJsonStructure([
            'id',
            'usuario',
            'email',
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApellido',
            'idDepartamento',
            'idCargo',
            'created_at',
            'updated_at'
        ]);

        $response->assertJson([
            'usuario' => 'johndoe',
            'email' => 'johndoe@example.com',
            'primerNombre' => 'Johnny',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => (string)$this->department->id,
            'idCargo' => (string)$this->position->id
        ]);
    }

    public function test_can_delete_user(): void
    {
        $user = User::create([
            'usuario' => 'jdoe',
            'email' => 'jdoe@example.com',
            'primerNombre' => 'John',
            'segundoNombre' => 'Doe',
            'primerApellido' => 'Doe',
            'segundoApellido' => 'Doe',
            'idDepartamento' => $this->department->id,
            'idCargo' => $this->position->id
        ]);

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_validates_required_fields_when_creating_user(): void
    {
        $response = $this->postJson('/api/users', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['usuario', 'email', 'primerNombre', 'primerApellido', 'idDepartamento', 'idCargo']);
    }
}
