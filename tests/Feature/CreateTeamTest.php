<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\CreateTeamForm;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_teams_can_be_created(): void
    {
        // Si tu proyecto no usa Teams, este test no debe romper la suite
        if (! Features::hasTeamFeatures()) {
            $this->markTestSkipped('Team features are not enabled in this project.');
        }

        $user = User::factory()->withPersonalTeam()->create();

        Livewire::actingAs($user)
            ->test(CreateTeamForm::class)
            ->set('state.name', 'Test Team')
            ->call('createTeam')
            ->assertHasNoErrors();

        $this->assertCount(2, $user->fresh()->ownedTeams);
        $this->assertEquals(
            'Test Team',
            $user->fresh()->ownedTeams()->latest('id')->first()->name
        );
    }
}
