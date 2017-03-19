<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;

class TournamentsController extends Controller
{
    //

    public function show(Tournament $tournament)
    {
        return view('tournaments.show')->with(compact('tournament'));
    }
}
