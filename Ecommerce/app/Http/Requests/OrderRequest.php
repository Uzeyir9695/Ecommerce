<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fullname' => 'required|max:100',
            'email' => 'required|string|email|unique:orders',
            'mobile' => 'required|unique:orders|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'zipcode' => 'required|integer',
            'aptnumber' => 'required|integer',
        ];
    }
}
