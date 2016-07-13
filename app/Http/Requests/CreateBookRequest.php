<?php

namespace App\Http\Requests;


class CreateBookrequest extends Request
{
    protected function rules()
    {
        return [
            'title' => 'required|max:255',
            'author_id' => 'required',
            'description' => 'required|max:255',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     * note: plan to have authorization logic in another part of your application
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}
