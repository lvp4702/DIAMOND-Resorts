@extends('client.layouts.app')

@section('title', 'Phòng')

@section('content')
    <div class="room_1">
        <img src="{{ asset('images/room-1.jpg') }}" alt="">
        <h1>PHÒNG</h1>
    </div>

    <div class="room_2">
        <div class="room_2-list">
            @foreach ($rooms as $room)
                <div class="room_2-item room">
                    <div class="room_2-item-img">
                        <img src="{{ $room->img1 }}" alt="">
                    </div>
                    <div class="room_2-item-content">
                        <h1>{{ $room->name }}</h1>
                        <div class="divider"></div>
                        <div class="room_2-item-bot">
                            <span>{{ number_format($room->price, 0, ',', '.') }}đ</span>
                            <a href="{{ route('client.room_detail', $room->id) }}" class="button">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button id="loadMore" class="button" @if (count($rooms) <= 6) style="display: none;" @endif>
            Xem thêm
        </button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var loadMoreButton = document.getElementById('loadMore');
            var roomItems = document.querySelectorAll('.room_2-item');
            var visibleItemCount = 6;

            // Ẩn các mục vượt quá số lượng mặc định
            for (var i = visibleItemCount; i < roomItems.length; i++) {
                roomItems[i].style.display = 'none';
            }

            // Xử lý sự kiện khi click vào nút "Xem thêm"
            loadMoreButton.addEventListener('click', function() {
                for (var i = visibleItemCount; i < visibleItemCount + 3 && i < roomItems.length; i++) {
                    roomItems[i].style.display = 'block';
                }
                visibleItemCount += 3;

                // Ẩn nút "Xem thêm" nếu không còn mục ẩn
                if (visibleItemCount >= roomItems.length) {
                    loadMoreButton.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rooms = document.querySelectorAll('.room');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('rotate');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            rooms.forEach(room => {
                observer.observe(room);
            });
        });
    </script>
@endsection
