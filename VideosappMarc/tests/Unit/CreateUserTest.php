<?php

namespace Tests\Unit;

use App\Helpers\CreateUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreacioUsuariDefecte()
    {
        $user = (new CreateUsers)->creacioUsuariDefecte([
            'name' => config('defaultusers.user.name'),
            'email' => config('defaultusers.user.email'),
            'password' => config('defaultusers.user.password'),
        ]);

        $this->assertEquals(config('defaultusers.user.name'), $user->name);
        $this->assertEquals(config('defaultusers.user.email'), $user->email);
        $this->assertTrue(\Hash::check(config('defaultusers.user.password'), $user->password));
        $this->assertCount(1, $user->ownedTeams);
    }

    public function testCreacioProfessorDefecte()
    {
        $user = (new CreateUsers)->creacioUsuariDefecte([
            'name' => config('defaultusers.professor.name'),
            'email' => config('defaultusers.professor.email'),
            'password' => config('defaultusers.professor.password'),
        ]);

        $this->assertEquals(config('defaultusers.professor.name'), $user->name);
        $this->assertEquals(config('defaultusers.professor.email'), $user->email);
        $this->assertTrue(\Hash::check(config('defaultusers.professor.password'), $user->password));
        $this->assertCount(1, $user->ownedTeams);
    }

    public function testUserHasCurrentTeamId()
    {
        $user = User::factory()->create([
            'current_team_id' => config('team.default_team_id'),
        ]);

        $this->assertNotNull($user->current_team_id);
        $this->assertEquals(config('team.default_team_id'), $user->current_team_id);
    }
}
