<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'first_name' => 'required|max:255|alpha_num',
            'last_name' => 'required|max:255|alpha_num',
            'home_address' => 'required|alpha_dash',
            'office_address' => 'required|alpha_dash',
            'phone' => 'numeric|required',
            'email' => 'email|required',
            'role' => 'numeric|required',
            'dob' => 'date|required',
            'doj' => 'date|required',
            'profile_photo' => 'required|image',
            'profile_signature' => 'required|image',
        ];
    }
}
