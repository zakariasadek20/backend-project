<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'firstname'=>$this->nom,
            'lastname'=>$this->prenom,
            'DateOfBirth'=>$this->date_naissance,
            'email'=>$this->email,
            'tele'=>$this->telephone,
            'type'=>$this->type,
            'rendez_vouses_count'=>$this->rendez_vouses_count
        ];
    }
}
