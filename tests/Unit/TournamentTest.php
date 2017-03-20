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
}
