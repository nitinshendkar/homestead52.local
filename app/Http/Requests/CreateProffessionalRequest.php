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
            'designation' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'organization' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'current_working' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'joining_date' => 'required|date',
            'reveliving_date' => 'required|date'
        ];
    }
}
