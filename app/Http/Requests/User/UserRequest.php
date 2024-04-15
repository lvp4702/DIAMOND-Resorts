<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|unique:users|email',
            'fullname' => 'required',
            'phoneNumber' => 'required|size:10',
            'address' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'Không được để trống !',
            'username.unique' => 'Tài khoản đã tồn tại !',
            'password.required' => 'Không được để trống !',
            'password.min' => 'Mật khẩu phải có độ dài từ :min ký tự trở lên !',
            'email.required' => 'Không được để trống !',
            'email.unique' => 'Email đã được sử dụng !',
            'email.email' => 'Email không đúng định dạng !',
            'fullname.required' => 'Không được để trống !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'address.required' => 'Không được để trống !',
        ];
    }
}
