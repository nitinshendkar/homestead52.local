<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProffessionalRequest extends Request
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
            'designation' => 'required|max:255|alpha_num',
            'organization' => 'required|max:255|alpha_num',
            'current_working' => 'required|max:255|alpha_dash',
            'joining_date' => 'required|date',
            'reveliving_date' => 'required|date'
        ];
    }
}
