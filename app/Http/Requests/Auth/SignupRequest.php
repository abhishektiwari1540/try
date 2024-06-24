<?php

namespace App\Http\Requests\Auth;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use DB;

class SignupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
{
    return [
        "name"               => "required|string|max:255",
        "user_name"          => "required|string|unique:users,user_name|max:255",
        "email"              => "required|email|unique:users,email|max:255",
        "password"           => "required|string|min:5|confirmed",
        "password_confirmation" => "required_with:password|same:password",
        "checkbox_privacy"   => "required|accepted",
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
        'name.required'                     => trans("messages.The_name_field_is_required"),
        'user_name.required'                => trans("messages.The_user_name_field_is_required"),
        'user_name.unique'                  => trans("messages.The_user_name_has_already_been_taken"),
        'email.required'                    => trans("messages.The_email_field_is_required"),
        'email.email'                       => trans("messages.The_email_must_be_a_valid_email_address"),
        'email.unique'                      => trans("messages.The_email_has_already_been_taken"),
        'password.required'                 => trans("messages.The_password_field_is_required"),
        'password.min'                      => trans("messages.The_password_field_must_be_at_least_8_characters"),
        'password.regex'                    => trans("messages.The_password_format_is_invalid"),
        'confirmpassword.required'          => trans("messages.The_confirm_password_field_is_required"),
        'confirmpassword.confirmed'         => trans("messages.The_password_confirmation_does_not_match"),
        'checkbox_privacy.required'         => trans("messages.The_privacy_policy_must_be_accepted"),
        'checkbox_privacy.accepted'         => trans("messages.The_privacy_policy_must_be_accepted"),
    ];
    }

}
