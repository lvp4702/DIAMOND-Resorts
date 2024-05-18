<header>

    <div class="header_wrapper">
        <div class="header_top">
            <div class="header_top_left">
                <div class="header_top_left_phone">
                    <i class="fa-solid fa-phone"></i>
                    <p>0376365516</p>
                </div>
                <div class="header_top_left_mail">
                    <i class="fa-regular fa-envelope"></i>
                    <p>phucvanle472002@gmail.com</p>
                </div>
            </div>
            <div class="header_top_right">
                <a href="" class="FB">
                    <i class="fa-brands fa-facebook-f"></i>
                    <p class="FB_placehoder">Follow on Facebook</p>
                </a>
                <a href="" class="insta">
                    <i class="fa-brands fa-instagram"></i>
                    <p class="insta_placehoder">Follow on Instagram</p>
                </a>
                <a href="" class="pinterest">
                    <i class="fa-brands fa-pinterest"></i>
                    <p class="pinterest_placehoder">Follow on Pinterest</p>
                </a>
                <a href="" class="twiter">
                    <i class="fa-brands fa-twitter"></i>
                    <p class="twiter_placehoder">Follow on Twiter</p>
                </a>
            </div>
        </div>

        <div class="header_main">
            <a href="/" class="logo">
                DIAMOND Resorts
            </a>
            <nav class="navbar">
                <a href="{{ route('client.index') }}" class="{{ request()->is('/') ? 'active' : '' }}">TRANG CHỦ</a>
                <a href="{{ route('client.introduce') }}" class="{{ request()->is('introduce') ? 'active' : '' }}">GIỚI THIỆU</a>
                <a href="{{ route('client.rooms') }}" class="{{ request()->is('rooms') ? 'active' : '' }}">PHÒNG</a>
                <a href="{{ route('client.news') }}" class="{{ request()->is('news') ? 'active' : '' }}">TIN TỨC</a>
                <a href="{{ route('client.contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">LIÊN HỆ</a>
            </nav>
            <div class="header_main_right">
                {{-- <i class="fa-solid fa-magnifying-glass search_icon"></i> --}}
                @if (Auth::check())

                    <div class="option">
                        @if (Auth::user()->avatar)
                            <img src="{{asset(Auth::user()->avatar)}}" class="option_avt">
                        @else
                            <img src="{{asset('images/avt-default.png')}}" class="option_avt">
                        @endif
                            <div class="option_menu-avt">
                                <a class="option_menu-item" href="{{ route('client.profile') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Thông tin cá nhân</p>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="option_menu-item" type="submit">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <p>Đăng xuất</p>
                                    </button>
                                </form>
                            </div>
                        {{-- @else
                            <i class="fa-solid fa-bars option_icon"></i>
                            <div class="option_menu">
                                <a class="option_menu-item" href="{{ route('client.profile') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Thông tin cá nhân</p>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="option_menu-item" type="submit">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <p>Đăng xuất</p>
                                    </button>
                                </form>
                            </div>
                        @endif --}}
                    </div>

                @else
                    <a href="{{ route('formLogin') }}" class="button btn_login">ĐĂNG NHẬP</a>
                @endif
            </div>
        </div>
    </div>

</header>
