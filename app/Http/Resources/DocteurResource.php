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
            'docteur_nom'=>$this->nom,
            'prenom'=>$this->prenom,
            'tele_portable'=>$this->tele_Portable,
            'sexe'=>$this->sexe,
            'a_propos'=>$this->a_propos,
            'code_postal'=>$this->code_postal,
            'prix_visite'=>$this->prix_visite,
            'ville'=>new VilleResource($this->whenLoaded('ville')),
            'position'=> new PositionResource($this->whenLoaded('position')),
            'specialites'=>SpesialitesResource::collection($this->whenLoaded('specialites')),
            'cabinets'=>CabinetsResource::collection($this->whenLoaded('cabinets')),
            'jourDeTravail'=>JourDeTravailResource::collection($this->whenLoaded('jourDeTravails')),
            'services'=>ServicesResource::collection(($this->whenLoaded('services'))),
            'educations'=>EdicationResource::collection(($this->whenLoaded('edications'))),
            'experiences'=>ExperienceResource::collection(($this->whenLoaded('experiences'))),
            'awards'=>AwardResource::collection(($this->whenLoaded('awards'))),

            
        ];
    }
}
