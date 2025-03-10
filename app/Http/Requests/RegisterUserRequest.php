<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string'],
            'mobile' => ['required', 'regex:/^(?:\+98|0)?9\d{9}$/', 'unique:users'],
            'email' => ['required', 'email',  'unique:users'],
            'password' => Password::required(),
            'confirm_password' => ['same:password'],
        ];
    }
}
