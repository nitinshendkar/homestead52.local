<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAddressRequest extends Request
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
            'state_id' => 'required|regex:/^[\pL\s\-]+$/u',
            'district_id' => 'required|regex:/^[\pL\s\-]+$/u',
            'taluka_id' => 'required|regex:/^[\pL\s\-]+$/u',
            'address_type' => 'required|regex:/^[\pL\s\-]+$/u',
            'village' => 'required|regex:/^[\pL\s\-]+$/u'
        ];
    }
}
