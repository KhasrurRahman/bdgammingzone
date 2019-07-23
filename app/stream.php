<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stream extends Model
{
    public function match(){
        return $this->hasMany(Match_shedule::class);
    }
}
