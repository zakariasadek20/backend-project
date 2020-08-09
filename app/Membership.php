<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    //

    protected $fillable=[
        'membership','docteur_id'
    ];
  
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
