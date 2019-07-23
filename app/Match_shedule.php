<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_shedule extends Model
{
    protected $fillable = ['title','date','time','entry_fee','per_kill','winner','join','map','type','platform','version','description','t','weapon'];




    public function user(){
        return $this->belongsToMany('App\User','match_users');
    }

    public function Participants(){
        return $this->hasMany(Participants::class,'match_id');
    }

    public function results(){
        return $this->hasMany(result::class,'match_id');
    }
    public function stream(){
        return $this->hasMany(stream::class,'match_id');
    }
}
