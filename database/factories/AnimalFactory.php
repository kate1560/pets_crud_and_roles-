<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        $speciesKey = $this->faker->randomElement(array_keys(Animal::SPECIES));

        return [
            'user_id' => null, // se lo ponemos en el seeder
            'name' => $this->faker->firstName(),
            'species' => $speciesKey, // ✅ dog/cat/etc (key)
            'breed' => $this->faker->optional()->word(),
            'age' => $this->faker->optional()->numberBetween(0, 15),
            'weight' => $this->faker->optional()->randomFloat(2, 1, 40),
            'color' => $this->faker->optional()->safeColorName(),
            'is_vaccinated' => $this->faker->boolean(),
            'notes' => $this->faker->optional()->sentence(),
            'image_path' => null, // ✅ para que no reviente si no hay imagen real
        ];
    }
}
