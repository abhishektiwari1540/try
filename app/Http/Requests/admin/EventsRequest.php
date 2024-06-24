<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EventsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:250',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'short_des' => 'max:250',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans("Title is required."),
            'title.max' => trans("Title must not exceed 250 characters."),
            'image.required' => trans("Image is required."),
            'image.image' => trans("Image must be a valid image file."),
            'image.mimes' => trans("Image must be a JPG, JPEG, or PNG file."),
            'short_des.max' => trans("Short description must not exceed 250 characters."),
            'description.required' => trans("Description is required."),
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}
