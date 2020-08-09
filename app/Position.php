<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //

    protected $fillable =[
        'latitude','longitude','docteur_id'
    ];

    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
