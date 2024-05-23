@extends('admin.layouts.app')
@section('content')
    <div class="admin_content_left">
        <div class="row">
            <div class="col">
                <div class="admin_col_hover p-3 rounded shadow bg-info bg-gradient text-light d-flex justify-content-between">
                    <div>
                        <p class="fs-3">Tổng tài khoản</p>
                        <h3 class="fs-1 fw-bold">{{ $totalUsers }}</h3>
                    </div>
                    <div class="align-items-center d-flex">
                        <i class="fa-solid fa-users" style="font-size: 50px"></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="admin_col_hover p-3 rounded shadow bg-success bg-gradient text-light d-flex justify-content-between">
                    <div>
                        <p class="fs-3">Tổng số đơn</p>
                        <h3 class="fs-1 fw-bold">{{ $totalPaidBookings }}</h3>
                    </div>
                    <div class="align-items-center d-flex">
                        <i class="fa-solid fa-scroll" style="font-size: 50px"></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="admin_col_hover p-3 rounded shadow bg-secondary bg-gradient text-light d-flex justify-content-between">
                    <div>
                        <p class="fs-3">Tổng doanh thu</p>
                        <h3 class="fs-1 fw-bold">{{ number_format($totalRevenue, 0, ',', '.') }}đ</h3>
                    </div>
                    <div class="align-items-center d-flex">
                        <i class="fa-solid fa-square-poll-vertical" style="font-size: 50px"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="chart">
            <p>Top 5 phòng có lượng đặt cao nhất</p>
            <canvas id="top5RoomsChart"></canvas>
        </div>

        <div class="chart">
            <p>Doanh thu theo từng tháng</p>
            <canvas id="monthlyRevenueChart"></canvas>
        </div>


    </div>
    <div class="admin_content_right">

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dữ liệu cho biểu đồ top 5 phong
            const top5Rooms = @json($top5Rooms);
            const labels = top5Rooms.map(room => room.name);
            const counts = top5Rooms.map(room => room.bookings_count);

            // Biểu đồ top 5 phong
            const ctx = document.getElementById('top5RoomsChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Số đơn',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Dữ liệu cho biểu đồ doanh thu hàng tháng
            const monthlyRevenue = @json($monthlyRevenue);
            const months = monthlyRevenue.map(data => `${data.year}-${String(data.month).padStart(2, '0')}`);
            const revenues = monthlyRevenue.map(data => data.revenue);

            // Biểu đồ doanh thu hàng tháng
            const ctx2 = document.getElementById('monthlyRevenueChart').getContext('2d');
            const monthlyRevenueChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Doanh thu',
                        data: revenues,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
