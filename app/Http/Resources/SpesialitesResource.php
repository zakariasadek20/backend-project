<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpesialitesResource extends JsonResource
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
            'specialite_id'=>$this->id,
            'nom'=>$this->nom,
            'docteurs_count'=>$this->docteurs_count
        ];
    }
}
