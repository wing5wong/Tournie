<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tournament;
use Carbon\Carbon;

class ViewTournamentListingTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    function user_can_view_a_tournament_listing()
    {
        //Arrange
        $tournament = factory(Tournament::class)->create();


        // Act
        $response = $this->get('/tournaments/' . $tournament->id);
        

        // Assert
        $response->assertStatus(200);
        $response->assertSee($tournament->title);
        $response->assertSee($tournament->description);
        $response->assertSee($tournament->venue);
        $response->assertSee($tournament->formattedStartDate);
        $response->assertSee($tournament->formattedStartTime);
        $response->assertSee($tournament->formattedEndDate);
        $response->assertSee($tournament->formattedEndTime);
    }
}
