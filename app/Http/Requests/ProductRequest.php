<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $rules = [
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|between:0,999999.99',
            'old_price' => 'sometimes|nullable|numeric|between:0,999999.99',
            'description' => 'sometimes|nullable|string',
            'short_description' => 'required|string|max:200',
            'images' => 'required|array|min:1',
            'images.*' => 'required|file|image|max:5000',
            'brand_id' => 'required|exists:brands,id',
            'is_available' => 'required_if:type,1|in:0,1',
            'type' => 'required|in:1,2,3',
            'values' => 'sometimes|nullable|array|min:1',
            'values.*' => 'sometimes|nullable|exists:attribute_values,id',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['images'] = 'nullable|sometimes|array|min:1';
            $rules['images.*'] = 'nullable|sometimes|file|image|max:5000';
            unset($rules['values']);
            unset($rules['values.*']);

        }

//        if ($this->request->get('type') != 1)
//        {
//            $rules['brand_id'] = 'sometimes|nullable|exists:brands,id';
//        }

        return $rules;
    }
}
