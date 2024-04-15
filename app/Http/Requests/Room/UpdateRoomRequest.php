<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
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
        $roomId = $this->route('room');
        return [
            'name' => ['required', Rule::unique('rooms', 'name')->ignore($roomId)],
            'price' => 'required|numeric|gt:0',
            'describe' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống !',
            'name.unique' => 'Tên phòng đã tồn tại !',
            'price.required' => 'Không được để trống !',
            'price.numeric' => 'Hãy nhập 1 số !',
            'price.gt' => 'Hãy nhập 1 số lớn hơn 0 !',
            'describe.required' => 'Không được để trống !'
        ];
    }
}
