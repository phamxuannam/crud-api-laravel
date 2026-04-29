<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name'      => ['required','min:10'],
            'email'     => ['required','email', 'unique:users,email'],
            'age'       => ['numeric','min:1'],
            'password'  => ['required', Password::min(10)->mixedCase()->numbers()->symbols()],
        ];
    }

    public function messages(){
        return [
            'name.required'       => 'Bắt buộc nhập tên',
            'name.min'            => 'Tên ít nhất 10 ký tự.',
            'email.required'      => 'Bắt buộc nhập email.',
            'email.email'         => 'Email không đúng dịnh dạng.',
            'email.unique'        => 'Email đã tồn tại.',  
            'age.numeric'         => 'Tuổi phải là số',  
            'age.min'             => 'Tuổi phải >= 1',
            'password.min'        => 'Password ít nhất phải có 10 ký tự.',  
            'password.required'   => 'Mật khâu bắt buộc nhập.',
            'password.mixed_case' => 'Password phải có chữ hoa và chữ thường.',
            'password.numbers'    => 'Password phải có số.',
            'password.symbols'    => 'Password phải có ký tự đặc biệt.'    
        ];
    }
}