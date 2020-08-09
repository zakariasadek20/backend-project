<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    //
    protected $fillable=[
        'nom','tele_cab','docteur_id'
    ];
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
