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
}
