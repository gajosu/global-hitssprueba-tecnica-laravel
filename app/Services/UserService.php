<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function getAllUsers(): Collection
    {
        return User::with(['departamento', 'cargo'])->get();
    }

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function updateUser(User $user, array $data): User
    {
        $user->update($data);
        return $user->fresh();
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
