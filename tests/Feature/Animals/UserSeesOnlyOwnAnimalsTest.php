<?php

namespace Tests\Feature\Animals;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSeesOnlyOwnAnimalsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_sees_only_own_animals_in_index(): void
    {
        $user = User::factory()->withPersonalTeam()->create(['role' => 'user']);
        $otherUser = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        Animal::factory()->create(['user_id' => $user->id, 'name' => 'Milo']);
        Animal::factory()->create(['user_id' => $otherUser->id, 'name' => 'Rocky']);

        $response = $this->actingAs($user)->get(route('animals.index'));

        $response->assertOk();
        $response->assertSee('Milo');
        $response->assertDontSee('Rocky');
    }
}
