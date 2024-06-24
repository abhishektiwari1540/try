<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class System_documentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|max:250',
        ];

      
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'sometimes|image|mimes:jpg,jpeg,png';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => trans("Title is required."),
            'title.max' => trans("Title must not exceed 250 characters."),
            'image.required' => trans("Image is required."),
            'image.image' => trans("Image must be a valid image file."),
            'image.mimes' => trans("Image must be a JPG, JPEG, or PNG file."),
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}
