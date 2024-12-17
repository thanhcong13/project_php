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
            // function ($attribute, $value, $fail) {
            //     $parts = explode('@', $value);
            //     if (count($parts) !== 2 || str_contains($parts[0], '.') || str_contains($parts[0], '/')) {
            //         $fail(':attribute không chứa "." hoặc "/" trước "@"');
            //     }

            //     if (!str_ends_with($parts[1], '.com')) {
            //         $fail(':attribute phải kết thúc là ".com"');
            //     }
            // }
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
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là địa chỉ email hợp lệ.',
            'email.unique' => 'Email da ton tai.',
            'email' => 'Email không hợp lệ theo định dạng yêu cầu (A@B, A không chứa dấu . hoặc /, B phải kết thúc bằng .com).',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'confirm-password.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'confirm-password.same' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
