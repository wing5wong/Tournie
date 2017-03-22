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

        $response = $this->post("/tournaments/teams",[
            'name'=>'Test Team',
            'Division' => 'Test Division',
            'players' => 8
        ]);
        
        $response->assertStatus(201);
        // assert team in database
    }
}