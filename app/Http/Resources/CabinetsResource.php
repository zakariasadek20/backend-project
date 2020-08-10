<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CabinetsResource extends JsonResource
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
            'cabinet_id'=>$this->id,
            'nom'=>$this->nom,
            'tele_cabinet'=>$this->tele_cab,
            'address_cabinet'=>$this->address_cab,
        ];
    }
}
