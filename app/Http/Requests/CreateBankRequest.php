<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBankRequest extends Request
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
            'bank_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'branch_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'ifsc_code' => 'required|regex:/^[\pL\s\-]+$/u',
            'account_no' => 'required|alpha_dash',
        ];
    }
}
