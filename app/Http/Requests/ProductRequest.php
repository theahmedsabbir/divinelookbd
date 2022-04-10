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
        return [
            'name' => 'required|string',
            'sku' => 'required',
            'cat_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required',
            'qty' => 'required|integer',
            'short_description' => 'required',
            'long_description' => 'required',
            'information' => 'required',
            'type' => 'required|string',
            'features' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
