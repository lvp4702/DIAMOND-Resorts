<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'name' => 'required|unique:rooms',
            'price' => 'required|numeric|gt:0',
            'describe' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống !',
            'name.unique' => 'Tài phòng đã tồn tại !',
            'price.required' => 'Không được để trống !',
            'price.numeric' => 'Hãy nhập 1 số !',
            'price.gt' => 'Hãy nhập 1 số lớn hơn 0 !',
            'describe.required' => 'Không được để trống !'
        ];
    }
}
