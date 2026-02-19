<?php

namespace Tests\Unit;

use App\Http\Requests\UpdateAnimalRequest;
use Tests\TestCase;

class UpdateAnimalRequestRulesTest extends TestCase
{
    public function test_update_request_image_is_nullable(): void
    {
        $request = new UpdateAnimalRequest();
        $rules = $request->rules();

        $this->assertArrayHasKey('image', $rules);
        $this->assertContains('nullable', $rules['image']);
    }
}
