<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderByDesc('id')->paginate(5);

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $rooms = Room::all();
        return view('admin.booking.create', compact('users', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $body = $request->all();
        $checkInDate = $body['check_inDate'];
        $checkOutDate = $body['check_outDate'];
        $roomID = $body['room_id'];

        // Tìm tất cả các đặt phòng có $roomID và đã thanh toán
        $existingBookings = Booking::where('room_id', $roomID)->where('status', 'Đã thanh toán')->get();

        // Kiểm tra để xác định ngày đặt có trùng trong khoảng thời gian đặt của người khác hay không
        foreach ($existingBookings as $existingBooking) {
            if (($existingBooking->check_inDate <= $checkInDate && $checkInDate <= $existingBooking->check_outDate)
                || ($existingBooking->check_inDate <= $checkOutDate && $checkOutDate <= $existingBooking->check_outDate)
                || ($checkInDate <= $existingBooking->check_inDate && $existingBooking->check_inDate <= $checkOutDate)
                || ($checkInDate <= $existingBooking->check_outDate && $existingBooking->check_outDate <= $checkOutDate)
            ) {
                return redirect()->back()->with('error', 'Phòng đã có người đặt trong khoảng thời gian bạn chọn !');
            }
        }

        if ($body['user_id'] == "") {
            $body['user_id'] = null;
        }

        Booking::create($body);
        return redirect()->route('booking.index')->with('message', 'Thêm mới thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('admin.booking.detail', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        return view('admin.booking.edit', compact('rooms', 'booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('booking.index')->with('message', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('message', 'Xóa thành công !');
    }

    public function thongKe()
    {
        $bookings = Booking::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(id) as total_orders'),
            DB::raw('SUM(total) as total_amount')
        )
            ->where('status', 'Đã thanh toán')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->get();

        return view('admin.booking.thongKe', compact('bookings'));
    }
}
