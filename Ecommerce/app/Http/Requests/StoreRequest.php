<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $inputs =implode(',', ['name', 'type', 'org_name', 'identification', 'phone', 'country', 'city', 'street', 'website', 'description']);

        return [
            'name' => 'required|min:2|max:255',
            'type' => 'required',
            'org_name' => 'required|min:2|max:255',
            'identification' => 'bail|required|regex:/[0-9]/|min:9|max:11',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required|string|min:4|max:100',
            'city' => 'required|string|min:4|max:100',
            'street' => 'required|string|min:4|max:100',
            'website' => 'required|url|min:4|max:100',
            'description' => 'required|string|min:4|max:500',
            'agreed' => 'required_with_all:'.$inputs,
            ]+
            ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function messages()
    {
        return [
            'agreed.required_with_all' => 'Almost done! Just agree to our terms and conditions and continue.',
        ];
    }
    protected function store()
    {
        return [
            'email' => 'required|email|unique:stores',
            'logoImage' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'coverImage' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ];
    }

    protected function update()
    {
        return [
            'email' => 'required|email|unique:stores,email,'.(int) request()->segment(2),
            'logoImage' => 'bail|sometimes|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'coverImage' => 'bail|sometimes|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ];
    }
}
