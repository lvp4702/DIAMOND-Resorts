@extends('client.layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
    <h1 class="profile_title">THÔNG TIN CÁ NHÂN</h1>
    <form action="{{ route('client.up_profile', Auth::user()) }}" method="post" class="profile_form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <p>Username</p>
            <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" class="text_input" disabled
                style="border: 2px solid #fff">
        </div>

        <div>
            <p>Email</p>
            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="text_input"
                disabled style="border: 2px solid #fff">
        </div>

        <div>
            <p>Fullname</p>
            <input type="text" name="fullname" id="fullname" value="{{ old('fullname', Auth::user()->fullname) }}"
                class="text_input @error('fullname') border-danger @enderror">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Phone number</p>
            <input type="text" name="phoneNumber" id="phoneNumber"
                value="{{ old('phoneNumber', Auth::user()->phoneNumber) }}"
                class="text_input @error('phoneNumber') border-danger @enderror">
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Address</p>
            <input type="text" name="address" id="address" value="{{ old('address', Auth::user()->address) }}"
                class="text_input @error('address') border-danger @enderror">
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Avatar</p>
            <img src="{{ Auth::user()->avatar }}" alt="Avatar"> <br>
            <input type="file" name="avatar" id="avatar">
            <img id="previewAvatar" src="#" alt="Preview">
        </div>

        <div>
            <p>Password*</p>
            <input type="password" name="password" id="password"
                class="text_input @error('password') border-danger @enderror">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <span>*Nhập mật khẩu của bạn để cập nhật thông tin cá nhân</span>
        </div>

        <div style="display: flex; justify-content: right;">
            <a class="button" href="{{ route('change_password') }}">Đổi mật khẩu</a>
            <button type="submit" class="button">Update</button>
        </div>
    </form>

    <div class="history">
        <h1>LỊCH SỬ ĐẶT PHÒNG</h1>
        @if (count($bookings) > 0)
            @foreach ($bookings as $item)
                <div class="bookings_item">
                    <div class="bookings_item_col">
                        <div class="bookings_item_row">
                            <span>| Họ Tên</span>
                            <span>{{ $item->fullname }}</span>
                        </div>
                        <div class="bookings_item_row">
                            <span>| Số điện thoại</span>
                            <span>{{ $item->phoneNumber }}</span>
                        </div>
                    </div>
                    <div class="bookings_item_col">
                        <div class="bookings_item_row">
                            <span>| Ngày nhận</span>
                            <span>{{ $item->check_inDate }}</span>
                        </div>
                        <div class="bookings_item_row">
                            <span>| Ngày trả</span>
                            <span>{{ $item->check_outDate }}</span>
                        </div>
                    </div>
                    <div class="bookings_item_col">
                        <div class="bookings_item_row">
                            <span>| Phòng</span>
                            <span>{{ $item->room->name }}</span>
                        </div>
                        <div class="bookings_item_row">
                            <span>| Số người</span>
                            <span>{{ $item->amountOfPeople }}</span>
                        </div>
                    </div>
                    <div class="bookings_item_col">
                        <div class="bookings_item_row">
                            <span>| Ngày đặt</span>
                            <span>{{ $item->created_at->format('d-m-Y') }}</span>
                        </div>
                        <div class="bookings_item_row">
                            <span>| Tổng</span>
                            <span>{{ number_format($item->total, 0, ',', '.') }}đ</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no_bookings">
                <i class="fa-solid fa-sack-xmark"></i>
                <p>Bạn chưa đặt phòng nào !</p>
            </div>
        @endif
    </div>

    <script>
        //render img
        document.getElementById('avatar').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.getElementById('previewAvatar');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });
    </script>

@endsection
