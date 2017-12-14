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
            'phone' => 'numeric|required',
            'email' => 'email|required',
            'role_type' => 'numeric|required'
        ];
    }
}
