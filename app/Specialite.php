<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    //
    protected $fillable=[
        'nom'
    ];

    public function docteurs(){
        return $this->belongsToMany(Docteur::class)->withTimestamps();
    }
}
