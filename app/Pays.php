<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    
    protected $fillable =[
        'nom'
    ];
    public function patients(){
        return $this->hasMany(Patient::class);
    }
}
