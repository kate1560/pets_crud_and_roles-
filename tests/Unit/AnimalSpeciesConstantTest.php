<?php

namespace Tests\Unit;

use App\Models\Animal;
use PHPUnit\Framework\TestCase;

class AnimalSpeciesConstantTest extends TestCase
{
    public function test_species_constant_has_expected_keys(): void
    {
        $this->assertArrayHasKey('Dog', Animal::SPECIES);
        $this->assertArrayHasKey('Cat', Animal::SPECIES);
        $this->assertArrayHasKey('Bird', Animal::SPECIES);
        $this->assertArrayHasKey('Reptile', Animal::SPECIES);
        $this->assertArrayHasKey('Fish', Animal::SPECIES);
        $this->assertArrayHasKey('Other', Animal::SPECIES);
    }
}
