<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    //

    public function show()
    {
        return view('tournaments.show');
    }
}
