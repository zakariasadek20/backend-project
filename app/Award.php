<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //

    protected $fillable =[
        'award','annee','docteur_id'
    ];

    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }

}
