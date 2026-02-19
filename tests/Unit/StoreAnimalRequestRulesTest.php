<?php

namespace Tests\Unit;

use App\Http\Requests\StoreAnimalRequest;
use Tests\TestCase;

class StoreAnimalRequestRulesTest extends TestCase
{
    public function test_store_request_requires_image(): void
    {
        $request = new StoreAnimalRequest();
        $rules = $request->rules();

        $this->assertArrayHasKey('image', $rules);
        $this->assertContains('required', $rules['image']);
    }
}
