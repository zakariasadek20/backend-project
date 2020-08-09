<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    //

    protected $fillable =[
        'nom','prenom','tele_Portable','sexe','a_propos','code_postal','prix_visite','specialite_id','ville_id'
    ];

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

    public function cabinets()
    {
        return $this->hasMany(Cabinet::class);
    }

    public function edications(){
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
}
