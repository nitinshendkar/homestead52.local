<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEducationRequest extends Request
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
            'degree' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'board' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'percentage' => 'required|numeric',
            'specialization' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'year_of_passing' => 'numeric|required',
        ];
    }
}
