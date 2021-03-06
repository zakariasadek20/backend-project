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

    protected $with =  [
        'specialites', 'ville', 'position', 'cabinet', 'services', 'edications', 'experiences', 'awards', 'jourDeTravails'
    ];



    //relationShip
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
    public function rendez_vouses(){
        return $this->hasMany(RendezVous::class);
    }


    //scopes

    public function scopeGetByVille(Builder $builder, $ville_name)
    {
        return $builder->whereHas('ville', function ($query) use ($ville_name) {
            $query->where('nom', 'like', '%' . $ville_name . '%');
        });
    }

    public function ScopeGetBySpecialite(Builder $builder, $idSpecialite)
    {
        return $builder->whereHas('specialites', function ($query) use ($idSpecialite) {
            $query->whereIn('specialite_id', $idSpecialite);
        });
    }

    public function ScopeWithoutEdicationsExperiencesAwards(Builder $builder)
    {
        return $builder->without(['edications', 'experiences', 'awards', 'jourDeTravails']);
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



    public static function booted()
    {
        static::addGlobalScope('nom', function (Builder $builder) {
            $builder->orderBy('nom', 'ASC');
        });
    }
}
