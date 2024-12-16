<?php

return [
    // Định nghĩa các thông điệp lỗi cho validation
    'validation' => [
        'required' => ':attribute không được để trống.',
        'email' => 'Địa chỉ email không hợp lệ.',
        'unique' => ':attribute đã được sử dụng.',
        'min' => ':attribute phải có ít nhất :min ký tự.',
        'same' => ':attribute xác nhận không khớp.',
        'email_custom' => ':attribute không được chứa dấu "." hoặc "/" trước "@" và phải kết thúc bằng ".com".',
    ],

];
