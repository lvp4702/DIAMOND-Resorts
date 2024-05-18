<header>
    <div class="header_main">
        <div class="header_left">
            <a href="{{ route('admin.index') }}" class="logo">
                DIAMOND Resorts
            </a>
        </div>
        <div class="header_right">
            <div class="thongBao">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="admin_avt">
                <img src="{{ asset(Auth::user()->avatar) }}">
                <p class="admin_avt-placehoder">{{ Auth::user()->fullname }}</p>
            </div>
        </div>
    </div>
</header>
