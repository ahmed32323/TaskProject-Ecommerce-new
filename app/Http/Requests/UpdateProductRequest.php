<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $productId = $this->route('product')->id;

        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $productId,
            'price' => 'required|numeric',
            'description' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ];
    }

}
