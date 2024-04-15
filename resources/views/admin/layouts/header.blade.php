<header>
    <div class="header_main">
        <div class="header_left">
            <a href="/" class="logo">
                DIAMOND Resorts
            </a>
        </div>
        <div class="header_right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-info" id="btnLogout">Logout</button>
            </form>
        </div>
    </div>
</header>
