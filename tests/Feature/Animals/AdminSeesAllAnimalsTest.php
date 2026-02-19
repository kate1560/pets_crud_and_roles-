<?php

namespace Tests\Feature\Animals;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSeesAllAnimalsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_sees_all_animals_in_index(): void
    {
        $admin = User::factory()->withPersonalTeam()->create(['role' => 'admin']);
        $user = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        Animal::factory()->create(['user_id' => $admin->id, 'name' => 'AdminPet']);
        Animal::factory()->create(['user_id' => $user->id, 'name' => 'UserPet']);

        $response = $this->actingAs($admin)->get(route('animals.index'));

        $response->assertOk();
        $response->assertSee('AdminPet');
        $response->assertSee('UserPet');
    }
}
