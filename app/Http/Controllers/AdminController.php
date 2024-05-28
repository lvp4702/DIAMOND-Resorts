<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;

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

        // Lấy ngày hiện tại
        $today = Carbon::today();

        // Lấy các đơn hàng trong ngày
        $bookingsToday = Booking::where('status', 'Đã thanh toán')
            ->whereDate('created_at', $today)
            ->orderByDesc('created_at')
            ->get();

        //Lấy bình luận mới
        $newComments = Comment::orderByDesc('created_at')->get();

        // Tính tổng doanh thu của mỗi ngày trong tuần
        // $weeklyRevenue = $this->calculateWeeklyRevenue();

        $dailyRevenue = Booking::getDailyRevenue();

        return view('admin.index', compact(
            'totalUsers',
            'totalPaidBookings',
            'totalRevenue',
            'top5Rooms',
            'monthlyRevenue',
            'bookingsToday',
            'newComments',
            'dailyRevenue'
        ));
    }

    protected function calculateWeeklyRevenue()
    {
        $weeklyRevenue = [];

        // Lấy ngày hiện tại
        $today = Carbon::today();

        // Lặp qua 7 ngày trước đó (tính từ hôm nay)
        for ($i = 6; $i >= 0; $i--) {
            $date = $today->subDays($i)->format('Y-m-d');

            // Tính tổng doanh thu của ngày đó
            $revenue = Booking::where('status', 'Đã thanh toán')
                ->whereDate('created_at', $date)
                ->sum('total');

            // Thêm vào mảng dữ liệu
            $weeklyRevenue[$date] = $revenue;
        }

        return $weeklyRevenue;
    }
}
