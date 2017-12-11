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
            'bank_name' => 'required|max:255|alpha_num',
            'branch_name' => 'required|max:255|alpha_num',
            'ifsc_code' => 'required|alpha_dash',
            'account_no' => 'required|alpha_dash',
        ];
    }
}