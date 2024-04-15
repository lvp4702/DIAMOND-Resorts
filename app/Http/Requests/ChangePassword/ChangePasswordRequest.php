<?php

namespace App\Http\Requests\ChangePassword;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Kiểm tra mật khẩu vừa nhập với mật khẩu hiện tại của người dùng
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật khẩu không chính xác !');
                    }
                },
            ],
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Không được để trống !',
            'new_password.required' => 'Không được để trống !',
            'confirm_password.required' => 'Không được để trống !',
            'confirm_password.same' => 'Mật khẩu nhập lại không chính xác !'
        ];
    }
}
