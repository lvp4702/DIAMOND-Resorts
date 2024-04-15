<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'fullname' => 'required',
            'phoneNumber' => 'required|size:10',
            'address' => 'required',
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Kiểm tra mật khẩu vừa nhập với mật khẩu hiện tại của người dùng
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật khẩu không chính xác !');
                    }
                },
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Không được để trống !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'address.required' => 'Không được để trống !',
            'password.required' => 'Không được để trống !'
        ];
    }
}
