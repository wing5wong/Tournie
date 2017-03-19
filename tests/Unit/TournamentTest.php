<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Tournament;
use Carbon\Carbon;

class TournamentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_get_formatted_start_date()
    {
        $tournament = Tournament::create([
            'start_date' => Carbon::parse('2017-03-14 9:00am')
        ]);

        $date = $tournament->formatted_start_date;

        $this->assertEquals('Tuesday, 14th March 2017');
    }
}
