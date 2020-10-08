<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RendezVousResources extends JsonResource
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
            'datetime'=>$this->datetime,
            'status'=>$this->etat,
            'patient'=>new PatientResource($this->whenLoaded('patient')),

        ];
    }
}
