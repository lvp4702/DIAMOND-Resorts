@extends('client.layouts.app')
@section('content')
    <h1 class="profile_title">THAY ĐỔI MẬT KHẨU</h1>
    <form action="{{ route('check_change_password', Auth::user()) }}" method="post" class="changePass_form">
        @csrf
        @method('PUT')
        <div>
            <p>Mật khẩu cũ</p>
            <input type="password" name="password" id="password" class="text_input @error('password') border-danger @enderror">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Mật khẩu mới</p>
            <input type="password" name="new_password" id="new_password"
                class="text_input @error('new_password') border-danger @enderror">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <p>Nhập lại mật khẩu mới</p>
            <input type="password" name="confirm_password" id="confirm_password"
                class="text_input @error('confirm_password') border-danger @enderror">
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class="button">XÁC NHẬN</button>
        </div>
    </form>
@endsection
