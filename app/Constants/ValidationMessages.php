<?php

namespace App\Constants;

class ValidationMessages
{
    public const MESSAGES = [
        'required' => 'The :attribute field is required.',
        'email' => 'The :attribute must be a valid email address.',
        'max' => [
            'string' => 'The :attribute may not be greater than :max characters.',
            'numeric' => 'The :attribute may not be greater than :max.',
        ],
        'min' => [
            'string' => 'The :attribute must be at least :min characters.',
            'numeric' => 'The :attribute must be at least :min.',
        ],
        'unique' => 'The :attribute has already been taken.',
        'confirmed' => 'The :attribute confirmation does not match.',
        'same' => 'The :attribute and :other must match.',
    ];
}
