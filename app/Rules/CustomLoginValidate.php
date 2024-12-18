<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomLoginValidate implements Rule
{
    protected $type;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        switch ($this->type) {
            case 'no_spaces':
                return !preg_match('/\s/', $value);
            case 'cus_email':
                $parts = explode('@', $value);
                if (count($parts) !== 2 || str_contains($parts[0], '.') || str_contains($parts[0], '/')) {
                    return false;
                }

                if (!str_ends_with($parts[1], '.com')) {
                    return false;
                }
                return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch ($this->type) {
            case 'no_spaces':
                return 'The :attribute must not spaces ';
            case 'cus_email':
                return 'The :attribute khong dung dinh dang';
        }
    }
}
