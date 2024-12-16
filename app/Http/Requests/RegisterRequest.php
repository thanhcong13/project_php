<?php

namespace App\Http\Requests;

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

        // TODO: Remember me
        return [
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm-password'=> 'required|same:password',
        ];
    }

    public function messages()
    {
        // TODO: E tao file constant de dinh nghia format message
        return [
            'name.required' => 'Khong tim thay name',
            'email.required' => 'Email is required!',
            'email.email' => 'Email address',
            'email.unique' => 'Email is only!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password is too short',
        ];

        // *.required :attribute khong tim thay 
    }
}
