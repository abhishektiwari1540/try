<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EventsRequestUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|max:250',
            'short_des' => 'max:250',
            'description' => 'required',
        ];

        // Check if the request is a POST request (create) or PUT/PATCH request (update)
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
            'short_des.required' => trans("Short description is required."),
            'short_des.max' => trans("Short description must not exceed 250 characters."),
            'description.required' => trans("Description is required."),
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}
