<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tournament;
use App\Team;
use Carbon\Carbon;

use App\Exceptions\InvalidTeamSize;

class TournamentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_get_formatted_start_date()
    {
        $tournament = factory(Tournament::class)->make([
            'starts_at' => Carbon::parse('2017-03-14')
        ]);

        $date = $tournament->formatted_start_date;

        $this->assertEquals('Tuesday, 14th March 2017', $tournament->formatted_start_date);
    }

    /** @test */
    function can_get_formatted_start_time()
    {
        $tournament = factory(Tournament::class)->make([
            'starts_at' => Carbon::parse('2017-03-14 9:00am')
        ]);

        $date = $tournament->formattedStartTime;

        $this->assertEquals('9am', $tournament->formattedStartTime);
    }

    /** @test */
    function can_get_formatted_end_date()
    {
        $tournament = factory(Tournament::class)->make([
            'ends_at' => Carbon::parse('2017-03-14')
        ]);

        $date = $tournament->formattedEndDate;

        $this->assertEquals('Tuesday, 14th March 2017', $tournament->formattedEndDate);
    }

    /** @test */
    function can_get_formatted_end_time()
    {
        $tournament = factory(Tournament::class)->make([
            'ends_at' => Carbon::parse('2017-03-14 9:00am')
        ]);

        $date = $tournament->formattedEndTime;

        $this->assertEquals('9am', $tournament->formattedEndTime);
    }

    /** @test */
    function a_tournament_can_return_its_teams(){
        $tournament = factory(Tournament::class)->create();
        $team = factory(Team::class)->create(['tournament_id'=>$tournament->id]);

        $teams = $tournament->fresh()->teams;
      
        $this->assertCount(1, $teams);

    }


    function test_cannot_register_a_team_with_under_8_players()
    {
        $this->expectException(InvalidTeamSize::class);
        $tournament = factory(Tournament::class)->create();

        $tournament->registerTeam('Test Team','Test Division',6);
    }

    function test_cannot_register_a_team_with_over_12_players()
    {
        $this->expectException(InvalidTeamSize::class);
        $tournament = factory(Tournament::class)->create();

        $tournament->registerTeam('Test Team','Test Division',15);
    }

    function test_a_registered_team_has_players()
    {
        $tournament = factory(Tournament::class)->create();

        $team = $tournament->registerTeam('Test Team','Test Division',10);

        $this->assertCount(10,$team->players);
    }
}
