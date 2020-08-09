<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edication extends Model
{
    //

    protected $fillable =[
        'degre','universite','annee','docteur_id'
    ];
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
