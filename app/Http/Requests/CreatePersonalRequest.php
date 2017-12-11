<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePersonalRequest extends Request
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
            'dob' => 'date|required',
            'doj' => 'date|required',
            'profile_photo' => 'required|image',
            'profile_signature' => 'required|image',
        ];
    }
}
