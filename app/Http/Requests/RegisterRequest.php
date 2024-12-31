<?php

namespace App\Http\Requests;


use App\Constants\ValidationMessages;
use App\Rules\CustomLoginValidate;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return[
            'name'=>'required',
            'email' => [
            'required',
            'unique:users,email',
            'email',
            new CustomLoginValidate('cus_email')
            ],
            'password' => [
                'required',
                'min:6',
                'no_spaces'
            ],
            'confirm-password'=> 'required|same:password',
        ];
    }

    public function messages()
    {
       return ValidationMessages::MESSAGES;
    }
}
