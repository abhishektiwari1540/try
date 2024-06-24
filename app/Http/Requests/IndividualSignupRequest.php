<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use DB;

class IndividualSignupRequest extends FormRequest
{
    public function __construct(ValidationFactory $validationFactory) {
        $validationFactory->extend('email_role_unique', function($attribute,$value,$parameters,$validator){
            $formData = $validator->getData();
            $getinfo  =   DB::table("users")->where("user_role_id",$formData['user_role_id'])->where("email",$value)->first();
            if(!empty($getinfo)){
                return false;
            }else {
                return true;
            }
        });
    }

    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            "user_role_id"            =>   "required",
            "first_name"              =>   "required|regex:/^[a-zA-Z\s]+$/",
            "last_name"               =>   "required|regex:/^[a-zA-Z\s]+$/",
            "username"                =>   "required|regex:/^[a-zA-Z]+$/|unique:users,username",
            "email"                   =>   "required|email|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/|email_role_unique",
            "country"                 =>   "required",
            "age"                     =>   "required",
            'password'                =>   "required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
            'confirm_password'        =>   "required|same:password",
            "privacy_policy"          =>   "required",
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'username.unique'               =>    "The enter your username already exists.",
            'email.email'                   =>    "The email must be a valid email address.",
            'email.regex'                   =>    "The email must be a valid email address.",
            'email.email_role_unique'       =>    "The enter your email already registered.",
            'password.regex'                =>    "Be sure to add a minimum 6-digit password that includes at least 1 uppercase, 1 lowercase and 1 number.",
            'confirm_password.same'         =>    "The confirmed password does not match with the password.",
            'privacy_policy.required'       =>    "The Terms and Conditions field is required.",
        ];
    }

}
