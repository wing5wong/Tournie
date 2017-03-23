<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tournament;

class RegisterTeamTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_team_can_be_registered_in_the_tournament()
    {
        $tournament = factory(Tournament::class)->create();

        $response = $this->post("/tournaments/" . $tournament->id . "/teams",[
            'name'=>'Test Team',
            'division' => 'Test Division',
            'players' => 8
        ]);
        
        $response->assertStatus(201);
        $tournament = $tournament->fresh();
        $this->assertCount(1, $tournament->teams);
    }
}