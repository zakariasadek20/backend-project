<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable =[
        'nom','prenom','date_naissance','email','telephone','num_cnss'
    ];

    public function rendez_vouses(){
        return $this->hasMany(RendezVous::class);
    }
}
