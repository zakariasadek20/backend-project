<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    //

    protected $fillable = [
        'nom', 'prenom', 'tele_Portable', 'sexe', 'a_propos', 'code_postal', 'prix_visite', 'specialite_id', 'ville_id'
    ];

    protected $with =  ['specialites', 'ville', 'position', 'cabinet','services'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class)->withTimestamps();
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }


    public function jourDeTravails()
    {
        return $this->hasMany(JourDeTravail::class);
    }

    public function cabinet()
    {
        return $this->hasOne(Cabinet::class);
    }

    public function edications()
    {
        return $this->hasMany(Edication::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function langues()
    {
        return $this->belongsToMany(Langue::class)->withTimestamps();
    }
    public function awards()
    {
        return $this->hasMany(Award::class);
    }
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }



    //scopes
    public function scopeOrderByName(Builder $builder){
        $builder->orderBy('nom','ASC');
    }



    public function calcDistance($lat2, $long2)
    {
        $degrees =

            (sin(deg2rad($this->position->latitude)) * sin(deg2rad($lat2))) +
            (cos(deg2rad($this->position->latitude)) * cos(deg2rad($lat2)) *
                cos(deg2rad($this->position->longitude - $long2)));

        $degrees = acos($degrees);
        $degrees = rad2deg($degrees);
        $distance = $degrees * 111.13384;
        return  round($distance, 2);
    }

}
