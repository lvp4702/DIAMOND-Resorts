<div class="sidebar">
    <div class="dashboard">
        <span>DASHBOARD</span>
        <a id="user" class="{{ request()->is('admin/user') || request()->is('admin/employee') || request()->is('admin/customer') ? 'active' : '' }}" href="{{ route('user.index') }}">Quản lý tài khoản</a>
        <a id="room" class="{{ request()->is('admin/room') ? 'active' : '' }}" href="{{ route('room.index') }}">Quản lý room</a>
        <a id="news" class="{{ request()->is('admin/news') ? 'active' : '' }}" href="{{ route('news.index') }}">Quản lý tin tức</a>
        <a id="slide" class="{{ request()->is('admin/slide') ? 'active' : '' }}" href="{{ route('slide.index') }}">Quản lý slide</a>
        <a id="bookings" class="{{ request()->is('admin/booking') ? 'active' : '' }}" href="{{ route('booking.index') }}">Booking</a>
        <a id="comment" class="{{ request()->is('admin/comment') ? 'active' : '' }}" href="{{ route('comment.index') }}">Đánh giá</a>
        <a id="contact" class="{{ request()->is('admin/contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" id="btnLogout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
            </button>
        </form>
    </div>
</div>
