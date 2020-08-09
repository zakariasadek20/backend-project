<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JourDeTravail extends Model
{

    //
    protected $fillable=[
        'heure_deb','heure_fin','jour_index','docteur_id'
    ];
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
