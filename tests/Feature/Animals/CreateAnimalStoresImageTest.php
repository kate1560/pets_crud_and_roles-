<?php

namespace Tests\Feature\Animals;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateAnimalStoresImageTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_animal_and_saves_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->withPersonalTeam()->create(['role' => 'user']);

        $payload = [
            'name' => 'Milo',
            'species' => 'Dog',          // debe coincidir con tu Animal::SPECIES
            'breed' => 'Labrador',
            'age' => 1,
            'weight' => 8.5,
            'color' => 'crema',
            'is_vaccinated' => 1,
            'notes' => 'Test notes',
          'image' => UploadedFile::fake()->create('milo.jpg', 200, 'image/jpeg'),

        ];

        $response = $this->actingAs($user)->post(route('animals.store'), $payload);

        $response->assertRedirect(route('animals.index'));

        $this->assertDatabaseHas('animals', [
            'name' => 'Milo',
            'user_id' => $user->id,
            'species' => 'Dog',
        ]);

        $animal = Animal::where('name', 'Milo')->firstOrFail();
        Storage::disk('public')->assertExists($animal->image_path);
    }
}
