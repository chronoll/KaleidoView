<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        $rules = [
            'post.category_id' => 'required|integer|exists:categories,id',
            'post.title' => 'required|string|max:50',
            'post.body' => 'required|string|max:2000',
            'cropped_image' => 'required',
        ];
            
        if ($this->isMethod('put')) {
            $rules['image'] = 'nullable';
        }
        
        return $rules;
        
    }




}
