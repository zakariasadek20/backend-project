<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJourDeTravailRequest extends FormRequest
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
            'jour_index'=>'required|integer|min:1|max:7',
            'heure_deb'=>'required|date_format:H:i:s',
            'heure_fin'=>'required|date_format:H:i:s',
        ];
    }
}
