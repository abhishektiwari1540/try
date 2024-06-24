<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use DB;

class BusinessSignupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            "full_name"     			=> 		"required",
            "user_role_id"  			=> 		"required",
            "phone_prefix"  			=> 		"required",
            "phone_code"    			=> 		"required",
            "phone_number"  			=> 		"required",
            "number_of_workers"  		=> 		"required",
            "business_category"  		=> 		"required",
            "location"  				=> 		"required",
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
            'full_name.required'          	  => trans("messages.The_business_name_field_is_required"),
            'phone_number.required'           => trans("messages.The_phone_number_field_is_required"),
            'number_of_workers.required'      => trans("messages.The_number_of_workers_field_is_required"),
            'business_category.required'      => trans("messages.The_business_category_field_is_required"),
            'location.required'           	  => trans("messages.The_location_field_is_required"),
        ];
    }

}
