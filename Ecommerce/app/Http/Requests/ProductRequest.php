<?php

namespace App\Http\Requests;

use App\Models\Subcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use function PHPUnit\Framework\at;

class ProductRequest extends FormRequest
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
        $inputs =implode(',', ['category_id', 'subcategory_id', 'description', 'quantity', 'images']);

        return [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'bail|required|min:3|max:100',
            'price' => 'bail|required|max:255',
            'description' => 'required|min: 5|max: 500',
            'quantity' => 'required|max:10000',
            'images' => 'required',
            'images.*' => 'bail|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'agreed' => 'required_with_all:'.$inputs.','.(request('subcategory_id') ? $this->dynamicData()[1] : ''),

            ] + (request()->filled('subcategory_id') ? $this->dynamicData()[0] : []);
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category field is required!',
            'subcategory_id.required' => 'The subcategory field is required!',
            'agreed.required_with_all' => 'Almost done! Just agree to our terms and conditions and continue.',
        ];
    }

    public function dynamicData()
    {
        if (request()->has('subcategory_id')){
            $assocArray = [];
            $inputNames = [];
            $attributes = Subcategory::find(request('hidden_subcategory_id'))->attributes()->get()->groupBy(function ($data) {
                return $data->name;
            });
            foreach ($attributes as $name => $values) {
                $snakeCaseAttribute = Str::replace(' ', '_', $name);
                $lowerCaseAttribute = strtolower($snakeCaseAttribute);
                $assocArray[$lowerCaseAttribute] = 'required_with:subcategory_id,*';
                $inputNames[] = $lowerCaseAttribute;
                $attributesAsString =  implode(',', $inputNames);
            }
            return [$assocArray, $attributesAsString];
        }
    }
}
