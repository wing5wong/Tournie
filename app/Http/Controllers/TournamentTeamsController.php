<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;

use App\Exceptions\InvalidTeamSize;

class TournamentTeamsController extends Controller
{
    function store(Tournament $tournament){
        try {
            $team = $tournament->registerTeam(request('name'),request('division'), request('players') );
            return response($team, 201);
        } 
        catch(InvalidTeamSize $e) {
            return response('Team must have 8 or more players', 422);
        }
    }
}
