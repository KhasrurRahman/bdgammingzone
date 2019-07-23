<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    public function match(){
        return $this->belongsTo(Match_shedule::class);
    }

    public function results(){
        return $this->hasMany(result::class,'participants_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
