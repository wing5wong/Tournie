<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    function addPlayer()
    {
        $player = factory(Player::class)->create();
        $this->players()->save($player);
    }
}
