<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Room;
use App\Models\User;

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
        //Lấy đơn hàng mới
        $newBookings = Booking::where('status', 'Đã thanh toán')->orderByDesc('created_at')->get();
        //Lấy bình luận mới
        $newComments = Comment::orderByDesc('created_at')->get();

        return view('admin.index', compact('totalUsers', 'totalPaidBookings',
                    'totalRevenue', 'top5Rooms', 'monthlyRevenue', 'newBookings', 'newComments'));
    }
}
