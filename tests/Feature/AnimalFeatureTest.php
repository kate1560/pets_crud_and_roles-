<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnimalFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_their_animals_index(): void
    {
        // En tu app el rol es "user", no "client"
        //  Con Jetstream: con team personal para evitar "Attempt to read property name on null"
        $user = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        Animal::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get(route('animals.index'))
            ->assertStatus(200);
    }

    public function test_admin_sees_owner_column_in_index(): void
    {
        $admin = User::factory()->withPersonalTeam()->create(['role' => 'admin']);
        $user  = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        Animal::factory()->create(['user_id' => $user->id]);

        $this->actingAs($admin)
            ->get(route('animals.index'))
            ->assertStatus(200)
            ->assertSee('Dueño');
    }

    public function test_user_can_create_animal_with_required_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        $payload = [
            'name' => 'Luna',
            // ✅ Debe coincidir con tu Animal::SPECIES (en tu modelo son 'Dog', 'Cat', etc.)
            'species' => 'Dog',

            // ✅ Usamos create() (no image()) para no depender de GD
            'image' => UploadedFile::fake()->create('luna.jpg', 200, 'image/jpeg'),
        ];

        $this->actingAs($user)
            ->post(route('animals.store'), $payload)
            ->assertRedirect(route('animals.index'));

        $animal = Animal::first();

        $this->assertDatabaseHas('animals', [
            'name' => 'Luna',
            'user_id' => $user->id,
            'species' => 'Dog',
        ]);

        Storage::disk('public')->assertExists($animal->image_path);
    }

    public function test_user_cannot_edit_other_users_animal(): void
    {
        $user1 = User::factory()->withPersonalTeam()->create(['role' => 'user']);
        $user2 = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        $animal = Animal::factory()->create(['user_id' => $user1->id]);

        $this->actingAs($user2)
            ->get(route('animals.edit', $animal))
            ->assertStatus(403);
    }
}
