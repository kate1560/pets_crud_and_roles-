<?php

namespace Tests\Unit;

use App\Models\Animal;
use PHPUnit\Framework\TestCase;

class AnimalUnitTest extends TestCase
{
    public function test_species_constant_has_values(): void
    {
        $this->assertIsArray(Animal::SPECIES);
        $this->assertNotEmpty(Animal::SPECIES);
    }
}
