<?php

namespace App\Http\Requests\ResetPassword;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8',
            'confirm_password' => "required|same:password"
        ];
    }
    public function messages(): array
    {
        return [
            'password.required' => 'Không được để trống !',
            'password.min' => 'Mật khẩu phải có độ dài từ :min ký tự trở lên !',
            'confirm_password.required' => 'Không được để trống !',
            'confirm_password.same' => 'Nhập lại mật khẩu không chính xác !'
        ];
    }
}
