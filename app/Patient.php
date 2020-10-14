<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable =[
        'nom','prenom','date_naissance','email','telephone','num_cnss','groupe_sanguin_id','ville_id','pay_id'
    ];
    protected $with =  [
        'groupe_sanguin', 'ville', 'pays'
    ];
    public function rendez_vouses(){
        return $this->hasMany(RendezVous::class);
    }

    public function groupe_sanguin(){
        return $this->belongsTo(GroupeSanguin::class);
    }
    public function ville(){
        return $this->belongsTo(Ville::class);
    }
    public function pays(){
        return $this->belongsTo(Pays::class);
    }
}
