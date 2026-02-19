<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\DeleteTeamForm;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteTeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_teams_can_be_deleted(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        // Team NO personal creado por el user
        $team = Team::factory()->create([
            'user_id' => $user->id,
            'personal_team' => false,
            'name' => 'Test Team',
        ]);

        // Otro usuario dentro del team
        $otherUser = User::factory()->create();
        $team->users()->attach($otherUser->id, ['role' => 'test-role']);

        Livewire::actingAs($user)
            ->test(DeleteTeamForm::class, ['team' => $team->fresh()])
            ->call('deleteTeam')
            ->assertHasNoErrors();

        $this->assertNull($team->fresh());

        // Verifica que el otro usuario ya no tenga ese team
        $this->assertDatabaseMissing('team_user', [
            'team_id' => $team->id,
            'user_id' => $otherUser->id,
        ]);
    }

    public function test_personal_teams_cant_be_deleted(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        Livewire::actingAs($user)
            ->test(DeleteTeamForm::class, ['team' => $user->currentTeam->fresh()])
            ->call('deleteTeam')
            ->assertHasErrors(['team']);

        $this->assertNotNull($user->currentTeam->fresh());
    }
}
