<?php

namespace Tests\Unit;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalOwnerRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_animal_belongs_to_owner_user(): void
    {
        $user = User::factory()->create();

        $animal = Animal::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertNotNull($animal->owner);
        $this->assertEquals($user->id, $animal->owner->id);
    }
}
