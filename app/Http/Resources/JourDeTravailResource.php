<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JourDeTravailResource extends JsonResource
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
            'jour_id'=>$this->id,
            'jour_index'=>$this->jour_index,
            'heure_deb'=>$this->heure_deb,
            'heure_fin'=>$this->heure_fin
        ];
    }
}
