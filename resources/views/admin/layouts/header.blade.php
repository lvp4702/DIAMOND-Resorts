<header>
    <div class="header_main">
        <div class="header_left">
            <a href="{{ route('admin.index') }}" class="logo">
                DIAMOND Resorts
            </a>
        </div>
        <div class="header_right">
            <div class="admin_avt">
                <p>{{ Auth::user()->fullname }}</p>
                <img src="{{ asset(Auth::user()->avatar) }}">
            </div>
        </div>
    </div>
</header>
