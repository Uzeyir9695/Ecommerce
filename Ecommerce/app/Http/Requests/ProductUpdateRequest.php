<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'bail|sometimes|required|min:3|max:100',
            'price' => 'bail|sometimes|required|max:255',
            'description' => 'sometimes|required|min: 5|max: 500',
            'quantity' => 'sometimes|required|max:255',
            'discount' => 'sometimes|required|min:0|max:100',
            'images' => 'sometimes|required',
            'images.*' => 'bail|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ];
    }
}
