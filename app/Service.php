<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable=[
       'nom','prix','docteur_id'
    ];

   
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
