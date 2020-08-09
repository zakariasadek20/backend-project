<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocteurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'docteur_id'=>$this->id,
            'nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'tele_portable'=>$this->tele_Portable,
            'sexe'=>$this->sexe,
            'a_propos'=>$this->a_propos,
            'code_postal'=>$this->code_postal,
            'prix_visite'=>$this->prix_visite,
            'ville'=>new VilleResource($this->whenLoaded('ville'))
        ];
    }
}
