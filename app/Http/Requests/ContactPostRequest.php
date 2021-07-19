<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|string',
            'name' => 'required|max:100|string',
            'email' => 'required|max:255|email:rfc,dns|string',
            'message' => 'required|max:1000|string',
        ];
    }
}
