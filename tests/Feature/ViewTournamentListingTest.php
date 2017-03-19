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

        $tournament = Tournament::create([
            'title' => 'Tournie 2017',
            'description' => 'A Sample tournament',
            'venue' => 'Sample Venue',
            'starts_at' => Carbon::parse('14 March, 2017'),
            'ends_at' =>  Carbon::parse('16 March, 2017'),
        ]);

        // Act
        $response = $this->get('/tournaments/' . $tournament->id);


        // Assert
        $response->assertSee('Tournie 2017');
        $response->assertSee('A Sample tournament');
        $response->assertSee('Sample Venue');
    }
}
