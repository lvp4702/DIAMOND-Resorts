<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required',
            'satisfaction' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Không được để trống nội dung bình luận !',
            'satisfaction.required' => 'Vui lòng chọn mức độ hài lòng của bạn !'
        ];
    }
}
