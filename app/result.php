<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{


    public function Participants(){
        return $this->belongsTo(Participants::class,'participants_id');
    }

    public function match(){
        return $this->belongsTo(Match_shedule::class,'match_id');
    }
}
