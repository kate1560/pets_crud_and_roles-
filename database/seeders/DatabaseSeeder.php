<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Crear Admin (con Jetstream team si lo estás usando)
        $admin = User::factory()->withPersonalTeam()->create([
            'name' => 'Admin Pets',
            'email' => 'admin@pets.com',
            'password' => Hash::make('Admin12345*'),
            'role' => 'admin',
        ]);

        // ✅ 60 animales del admin
        Animal::factory()->count(60)->create([
            'user_id' => $admin->id,
        ]);

        // (Opcional) crear un user normal
        User::factory()->withPersonalTeam()->create([
            'name' => 'User Pets',
            'email' => 'user@pets.com',
            'password' => Hash::make('User12345*'),
            'role' => 'user',
        ]);
    }
}
