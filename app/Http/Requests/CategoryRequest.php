<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category.name'=>'required|string|max:20',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,svg,webp',
            'category.category_explanation'=>'nullable|string|max:200',
        ];
    }
}
