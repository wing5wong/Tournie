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
            'starts_at' => Carbon::parse('March 14, 2017 9:00am'),
            'ends_at' =>  Carbon::parse('March 16, 2017 5:00pm'),
        ]);


        // Act
        $response = $this->get('/tournaments/' . $tournament->id);
        

        // Assert
        $response->assertStatus(200);
        $response->assertSee('Tournie 2017');
        $response->assertSee('A Sample tournament');
        $response->assertSee('Sample Venue');
        $response->assertSee('Tuesday, 14th March 2017');
        $response->assertSee('9am');
        $response->assertSee('Thursday, 16th March 2017');
        $response->assertSee('5pm');
    }
}
