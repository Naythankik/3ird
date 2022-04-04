<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|integer',
            'brand' => 'required',
            'description' => 'required|min:15',
            'feature' => 'required|min:15',
            'quantity' => 'required|integer',
            'image' => 'required|array|max:9',
            'image.*' => 'image|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product\'s name is required',
            'price.required' => 'Price tag is required',
            'price.integer' => 'Price must be Integer',
            'brand.required' => 'Brand is required',
            'description.required' => 'Product\'s description is required',
            'description.min' => 'Description is Short',
            'feature.required' => 'Product\'s Features is empty',
            'feature.min' => 'Feature is Short!!!',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be Integer',
            'image.required' => 'Image File is required for Product\'s preview',
            'image.max' => 'File upload must be less than 6',
            'image.*.image' => 'File extension must be an image',
            'image.*.max' => 'Each image must be less than 2MB'
        ];
    }
}
