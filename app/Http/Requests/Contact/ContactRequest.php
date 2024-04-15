<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'phoneNumber' => 'required|size:10',
            'address' => 'required',
            'message' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Không được để trống !',
            'email.required' => 'Không được để trống !',
            'email.email' => 'Email không đúng định dạng !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'address.required' => 'Không được để trống !',
            'message.required' => 'Không được để trống !'
        ];
    }
}
