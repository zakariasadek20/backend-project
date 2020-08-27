<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    //
    protected $fillable=[
        'datetime','etat','docteur_id','patient_id'
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
