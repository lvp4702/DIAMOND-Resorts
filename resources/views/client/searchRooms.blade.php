@extends('client.layouts.app')

@section('title', 'Phòng')

@section('content')
    <div class="room_1">
        <img src="{{ asset('images/room-1.jpg') }}" alt="">
        <h1>PHÒNG</h1>
    </div>

    <div class="room_2">
        <div class="room_2_search">
            <div class="room_2_search_left">
                <form id="searchForm" action="{{ route('searchRooms') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="from_date"><b>Phòng còn trống:</b> Từ</label>
                    <input type="date" name="from_date" id="from_date" value="{{ old('from_date', $fromDate) }}"
                        class="@error('from_date') border-danger @enderror">
                    <label for="to_date">-</label>
                    <input type="date" name="to_date" id="to_date" value="{{ old('to_date', $toDate) }}"
                        class="@error('to_date') border-danger @enderror">
                    <button type="submit" class="search_button">Tìm kiếm</button>
                </form>
            </div>
            <div class="room_2_search_right">
                <button class="search_button"><a href="{{ route('client.rooms') }}">Xem tất cả</a></button>
            </div>
        </div>
        @if (count($rooms) > 0)
            <h1 style="width: 80%; margin: auto; margin-bottom: 10px">Kết quả tìm kiếm({{ count($rooms) }})</h1>
        @else
            <h1 style="width: 80%; margin: auto; margin-bottom: 10px"><i class="fa-solid fa-triangle-exclamation"></i> Không có kết quả</h1>
        @endif
        <div class="room_2-list">
            @foreach ($rooms as $room)
                <div class="room_2-item">
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
@endsection
