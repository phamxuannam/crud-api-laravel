<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'     => ['required','min:5'],
            'price'    => ['required','numeric','min:1'],
            'quantity' => ['required','numeric','min:0'],
            'userId'   => ['required', 'exists:users,id'] 
        ];
    }

    public function messages(){
        return [
            'name.required'     => 'Tên bắt buộc nhập.',
            'name.min'          => 'Tên ít nhấ phải 5 ký tự.',
            'price.required'    => 'Giá bắt buộc nhập.',
            'price.numeric'     => 'Giá phải là số',
            'price.min'         => 'Giá >= 1.',
            'quantity.required' => 'Số lượng bắt buộc nhập.',
            'quantity.numeric'  => 'Số lượng phải là số.',
            'quantity.min'      => 'số lượng >= 0',
            'userId.required'   => 'UserId bắt buộc nhập.',
            'userId.exists'     => 'User không tồn tại'
        ];
    }
}