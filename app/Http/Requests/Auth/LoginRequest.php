<?php

namespace App\Http\Requests\Auth;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use DB;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "user_name"         => "required",
            "password"      => "required",
        ];
    }

    // public function failedValidation(Validator $validator) {
    //     throw new HttpResponseException(response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'data'      => $validator->errors()
    //     ]));
    // }

    public function messages()
    {

    return [
        'user_name.required'                    => trans("messages.The_user_name_field_is_required_login"),
        'password.required'                    => trans("messages.The_password_field_is_required_login"),
        // 'email.email'                       => trans("messages.The_email_must_be_a_valid_email_address_login"),
    ];
    }
}
