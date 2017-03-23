<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Team;

class TournamentTeamsController extends Controller
{
    function store(Tournament $tournament){
        $team = $tournament->registerTeam(request('name'),request('division') );
        return response($team, 201);
    }
}
