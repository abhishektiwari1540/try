<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|digits_between:10,15',
            'message' => 'required',
        ];

        if (session()->get('_previous')['url'] == "https://ymp.dev.obdemo.com/privacy-policy") {
            $rules['terms_conditions'] = 'required|accepted';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => trans("The name field is required"),
            'email.required' => trans("The email field is required"),
            'email.email' => trans("The email must be a valid email address"),
            'message.required' => trans("The message field is required"),
            'phone_number.required' => trans("The phone number field is required."),
            'phone_number.digits_between' => trans("The phone number must be a valid number with 10 to 15 digits."),
            'terms_conditions.required' => trans("The checkbox must be checked."),
        ];
    }
}
