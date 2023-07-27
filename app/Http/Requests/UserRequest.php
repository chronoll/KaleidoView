<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user.nickname'=>'required|string|max:20',
            'user.user_image'=>'nullable|mimes:jpg,jpeg,png,gif,svg,webp',
            'user.self_introduciton'=>'nullable|string|max:200',
        ];
    }
}
