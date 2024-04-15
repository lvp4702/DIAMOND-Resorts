<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'phoneNumber' => 'required|size:10',
            'address' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Không được để trống !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'address.required' => 'Không được để trống !',
        ];
    }
}
