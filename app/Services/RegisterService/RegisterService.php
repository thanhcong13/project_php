<?php 
namespace App\Services\RegisterService;

use App\Http\Requests\RegisterRequest;
use App\Repositories\RegisterRepository\IRegisterRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class RegisterService implements IRegisterService
{
    protected $registerRepository;
    public function __construct(IRegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }
    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là địa chỉ email hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'confirm-password.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'confirm-password.same' => 'Xác nhận mật khẩu không khớp.',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed: ' . implode(', ', $validator->errors()->all()));
            throw new ValidationException($validator);
        }
        
        return $this->registerRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

    }
}


?>