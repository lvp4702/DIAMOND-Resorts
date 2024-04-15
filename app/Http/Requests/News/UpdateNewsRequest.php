<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
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
        $newsId = $this->route('news');
        return [
            'title' => ['required', Rule::unique('news', 'title')->ignore($newsId)],
            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Không được để trống !',
            'title.unique' => 'Tiêu đề đã tồn tại !',
            'content.required' => 'Không được để trống !'
        ];
    }
}
