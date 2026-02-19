<?php

namespace Tests\Feature\Animals;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_visiting_animals(): void
    {
        $response = $this->get('/animals');

        $response->assertRedirect('/login');
    }
}
