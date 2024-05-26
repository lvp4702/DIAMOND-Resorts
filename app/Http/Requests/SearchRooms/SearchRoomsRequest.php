<?php

namespace App\Http\Requests\SearchRooms;

use Illuminate\Foundation\Http\FormRequest;

class SearchRoomsRequest extends FormRequest
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
            'from_date' => 'date|after_or_equal:' . now()->toDateString(),
            'to_date' => 'date|after_or_equal:from_date'
        ];
    }
    public function messages(): array
    {
        return [

            'from_date.after_or_equal' => 'Không hợp lệ !',
            'from_date.date' => 'Không hợp lệ !',
            'to_date.after_or_equal' => 'Không hợp lệ !',
            'to_date.date' => 'Không hợp lệ !',
        ];
    }
}
