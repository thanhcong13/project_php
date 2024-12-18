<?php

namespace App\Http\Requests;

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
        return[
            'name.required' => trans('vi_validation.required'),
            'email.required' => trans('vi_validation.required'),
            'email.email' => trans('vi_validation.email'),
            'email.unique' => trans('vi_validation.unique'),
            'password.required' =>  trans('vi_validation.required'),
            'password.min' =>  trans('vi_validation.min'),
            'confirm-password.required' =>  trans('vi_validation.required'),
            'confirm-password.same' =>  trans('vi_validation.same'),
        ];
    }
}
