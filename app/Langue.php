<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    //
    protected $fillable=[
        'langue'
    ];
    public function docteurs(){
        return $this->belongsToMany(Docteur::class)->withTimestamps();
    }
}
