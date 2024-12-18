<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CustomLoginValidate;

class LoginRequest extends FormRequest
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
        // TODO: Tao new Rule: A@B  A: khog bao gom . +  /  B: .com 
        return [
            'email' =>[
                'required',
                'email',
                new CustomLoginValidate('cus_email')
            ],
            'password' =>'required',
        ];
    }
    public function messages()
    {
        return[
            'email.required' => trans('vi_validation.required'),
            'email.email' => trans('vi_validation.email'),
            'password.required' => trans('vi_validation.required'),
        ];
    }
}