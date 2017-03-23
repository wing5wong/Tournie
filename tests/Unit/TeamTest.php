<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    function test_a_team_can_add_players()
    {
        $team = factory(Team::class)->create();

        $team->addPlayer('Test Name',44,'Center');

        $team = $team->fresh();
        $this->assertCount(1, $team->players);
    }
}