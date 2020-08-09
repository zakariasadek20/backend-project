<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $fillable=[
        'hospital_name','from','to','docteur_id'
    ];
    public function docteur(){
        return $this->belongsTo(Docteur::class);
    }
}
