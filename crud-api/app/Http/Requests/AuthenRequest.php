<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthenRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'    => ['required','email'],
            'password' => ['required']
        ];
    }

    public function messages(){
        return [
            'email.required'    => 'Bắt buộc nhập email.',
            'email.email'       => 'Email phải đúng định dạng.',
            'password.required' => 'Bắt buộc nhập password.'
        ];
    }
}