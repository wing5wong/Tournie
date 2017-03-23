<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\InvalidTeamSize;

class Tournament extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['starts_at','ends_at'];

    public function getFormattedStartDateAttribute($value)
    {
        return $this->starts_at->format('l, jS F Y');
    }

    public function getFormattedStartTimeAttribute($value)
    {
        return $this->starts_at->format('ga');
    }

    public function getFormattedEndDateAttribute($value)
    {
        return $this->ends_at->format('l, jS F Y');
    }

    public function getFormattedEndTimeAttribute($value)
    {
        return $this->ends_at->format('ga');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function registerTeam($name, $division, $players)
    {
        if(8 > $players || 12 < $players ) {
            throw new InvalidTeamSize;
        }
        $team = new Team(['name'=>$name,'division'=>$division]);
        $this->teams()->save($team);

        for($p=0;$p<$players;$p++) {
            $team->addPlayer('NAME',0,'Center');
        }

        return $team;
    }
}
