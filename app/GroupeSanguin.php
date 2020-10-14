<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeSanguin extends Model
{
    
    protected $fillable =[
        'label'
    ];
    public function patients(){
        return $this->hasMany(Patient::class);
    }
}
