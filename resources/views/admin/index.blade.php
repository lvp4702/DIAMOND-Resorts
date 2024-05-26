@extends('admin.layouts.app')
@section('content')
    <div class="admin_content">
        <div class="admin_content_left">
            <div class="row">
                <div class="col">
                    <div
                        class="admin_col_hover p-3 rounded shadow bg-info bg-gradient text-light d-flex justify-content-between">
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
                    <div
                        class="admin_col_hover p-3 rounded shadow bg-success bg-gradient text-light d-flex justify-content-between">
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
                    <div
                        class="admin_col_hover p-3 rounded shadow bg-secondary bg-gradient text-light d-flex justify-content-between">
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
            <p class="admin_content_right_title">Đơn hàng mới</p>
            <div class="admin_content_right_list">
                @if (count($newBookings) > 0)
                    @foreach ($newBookings as $newBooking)
                        <a href="{{ route('booking.show', $newBooking) }}" class="admin_content_right_item newItem" data-id="{{ $newBooking->id }}">
                            <div class="admin_content_right_item_top">
                                <b>{{ $newBooking->fullname }}</b> đã đặt phòng thành công !
                            </div>
                            <div class="admin_content_right_item_bot">
                                <div class="admin_content_right_item_bot_left">
                                    {{ $newBooking->created_at->format('d-m-Y H:i:s') }}</div>
                                <div class="admin_content_right_item_bot_right">Nhấn để xem</div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

            <p class="admin_content_right_title" style="margin-top: 26px;">Đánh giá mới</p>
            <div class="admin_content_right_list">
                @if (count($newComments) > 0)
                    @foreach ($newComments as $newComment)
                        <a href="{{ route('comment.edit', $newComment) }}" class="admin_content_right_item newItem" data-id="{{ $newComment->id }}">
                            <div class="admin_content_right_item_top">
                                <b>{{ $newComment->user->username }}</b> đã thêm 1 đánh giá mới về
                                <b>{{ $newComment->room->name }}</b> !
                            </div>
                            <div class="admin_content_right_item_bot">
                                <div class="admin_content_right_item_bot_left">
                                    {{ $newComment->created_at->format('d-m-Y H:i:s') }}</div>
                                <div class="admin_content_right_item_bot_right">Nhấn để xem</div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll('.newItem');

            // Kiểm tra localStorage nếu đã click trước đó
            items.forEach(item => {
                const itemClicked = localStorage.getItem(`itemClicked_${item.dataset.id}`);
                if (itemClicked) {
                    item.style.display = 'none';
                }

                item.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a (chuyển hướng trang)
                    const href = item.getAttribute('href');
                    setTimeout(function() {
                        window.location.href = href; // Trước khi ẩn thì chuyển hướng trang
                    }, 100);
                    localStorage.setItem(`itemClicked_${item.dataset.id}`, 'true');
                    setTimeout(function() {
                        item.style.display = 'none'; // thực hiện ẩn thẻ a
                    }, 500);
                });
            });
        });
    </script>
@endsection
