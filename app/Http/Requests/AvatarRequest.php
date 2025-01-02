<?php

namespace App\Http\Requests;

use App\Constants\ValidationMessages;
use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "avatar" => [
                'required' ,
                'image' ,
                'mimes:mimes:jpeg,png,jpg,gif|',
                'dimensions:max_width=1000,max_height=1000',
            ]
        ];
    }
    public function messages()
    {
        return ValidationMessages::MESSAGES;
    }
}
