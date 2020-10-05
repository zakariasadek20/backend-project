<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRDVGuestPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|string|email|max:255',
            'telephone'=>'required|string',
            'docteur_id'=>'required',
            'datetime'=>'required|date_format:Y-m-d H:i:s'
        ];
    }
}
