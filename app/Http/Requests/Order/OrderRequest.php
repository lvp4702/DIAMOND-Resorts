<?php

namespace App\Http\Requests\Order;

use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
        if(Auth::check())
        {
            $user = $this->user(); // Lấy thông tin người dùng đang đăng nhập
            $maxPoint = $user->point; // Lấy giá trị point của người dùng
        }

        $rules = [
            'fullname' => 'required',
            'phoneNumber' => 'required|size:10',
            'check_inDate' => 'date|after_or_equal:' . now()->toDateString(),
            'check_outDate' => 'date|after_or_equal:check_inDate',
            'amountOfPeople' => 'required|numeric|gt:0',
        ];

        if (Auth::check()) {
            $user = $this->user(); // Lấy thông tin người dùng đang đăng nhập
            $maxPoint = $user->point; // Lấy giá trị point của người dùng

            $rules['point'] = [
                'required',
                'numeric',
                'gt:-1', // Đảm bảo 'point' là số không âm
                function ($attribute, $value, $fail) {
                    // Lấy giá phòng từ cơ sở dữ liệu dựa trên room_id
                    $room = Room::find($this->input('room_id'));
                    $roomPrice = $room ? $room->price : null;

                    // Kiểm tra nếu giá trị 'point' lớn hơn giá phòng
                    if ($roomPrice && $value > $roomPrice) {
                        $fail('Điểm tích lũy sử dụng không được lớn hơn giá phòng (' . number_format($roomPrice, 0, ',', '.') . 'đ)');
                    }
                },
            ];
        }

        return $rules;
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Không được để trống !',
            'phoneNumber.required' => 'Không được để trống !',
            'phoneNumber.size' => 'Số điện thoại không hợp lệ !',
            'check_inDate.after_or_equal' => 'Không hợp lệ !',
            'check_inDate.date' => 'Không hợp lệ !',
            'check_outDate.after_or_equal' => 'Không hợp lệ !',
            'check_outDate.date' => 'Không hợp lệ !',
            'amountOfPeople.required' => 'Không được để trống !',
            'amountOfPeople.numeric' => 'Hãy nhập 1 số !',
            'amountOfPeople.gt' => 'Hãy nhập 1 số lớn hơn 0 !',
            'point.required' => 'Không được để trống !',
            'point.numeric' => 'Hãy nhập 1 số !',
            'point.gt' => 'Hãy nhập 1 số lớn hơn hoặc bằng 0 !',
            'point.lte' => 'Không hợp lệ !'
        ];
    }
}
