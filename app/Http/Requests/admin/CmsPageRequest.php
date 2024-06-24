<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Password;

class CmsPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $enuserid = $this->validationData()['enuserid'];
        $actionName = $this->route()->getActionMethod();

        $commonRules = [
            'page_name' => 'required',
            // 'title' => 'required',

        ];

        if ($actionName == 'store') {
            return $commonRules + [
                'body' => 'required',
            ];
        } elseif ($actionName == 'update') {
            $additionalRules = [];

            if ($this->slug != 'banner') {
                $additionalRules = [

                ];
            }

            if ($this->has('image')) {
                $additionalRules['image'] = 'required|mimes:jpeg,png,jpg';
            }

            if ($this->has('button_link')) {
                $additionalRules['button_link'] = 'required';
            }

            if ($this->has('button_title')) {
                $additionalRules['button_title'] = 'required';
            }

            if ($this->has('second_title')) {
                $additionalRules['second_title'] = 'required';
            }

            if ($this->has('second_des')) {
                $additionalRules['second_des'] = 'required';
            }

            if ($this->has('frist_des')) {
                $additionalRules['frist_des'] = 'required';
            }

            if ($this->hasFile('second_image')) {
                $additionalRules['second_image'] = 'nullable|mimes:jpeg,png,jpg';
            }
            if ($this->hasFile('Frist_image')) {
                $additionalRules['Frist_image'] = 'nullable|mimes:jpeg,png,jpg';
            }

            return $commonRules + $additionalRules;
        }

        return [];
    }

    public function messages()
    {
        return [
            'page_name.required' => 'The page name is required.',
            'title.required' => 'The title is required.',
            'body.required' => 'The body is required.',
            'image.required' => 'The image is required.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'Frist_image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'second_title.required' => 'The second title is required.',
            'second_des.required' => 'The second description is required.',
            'frist_des.required' => 'The second description is required.',
            'button_link.required' => 'The Button Link is required.',
            'button_title.required' => 'The Button Title is required.',
            'second_image.mimes' => 'The second image must be a file of type: jpeg, png, jpg.',

        ];
    }
    public function validationData()
    {
        return array_merge($this->all(), [
            'enuserid' => base64_decode($this->route('user'))
        ]);
    }
}
