<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateTeamNameForm;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateTeamNameTest extends TestCase
{
    use RefreshDatabase;

    public function test_team_names_can_be_updated(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $this->actingAs($user);

        Livewire::test(UpdateTeamNameForm::class, [
                'team' => $user->currentTeam,
            ])
            ->set('state', [
                'name' => 'Test Team',
            ])
            ->call('updateTeamName')
            ->assertHasNoErrors();

        // 🔁 Refrescamos todo para validar con datos reales de BD
        $user = $user->fresh();
        $team = $user->currentTeam->fresh();

        $this->assertCount(1, $user->ownedTeams);
        $this->assertEquals('Test Team', $team->name);
    }
}
