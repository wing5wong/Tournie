<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function registerTeam($name, $division)
    {
        $team = new Team(['name'=>$name,'division'=>$division]);
        $this->teams()->save($team);
        return $team;
    }
}
