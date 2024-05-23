<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        //tong user da xac minh tai khoan
        $totalUsers = User::count();
        //tong so don da thanh toan
        $totalPaidBookings = Booking::where('status', 'Đã thanh toán')->count();
        //tong doanh thu
        $totalRevenue = Booking::where('status', 'Đã thanh toán')->sum('total');
        //top 5 phong
        $top5Rooms = Room::topRoomsByBookings();

        // Doanh thu theo từng tháng
        $monthlyRevenue = Booking::getMonthlyRevenue();

        return view('admin.index', compact('totalUsers', 'totalPaidBookings', 'totalRevenue', 'top5Rooms', 'monthlyRevenue'));
    }
}
