<h2>DIAMOND Resorts</h2>
<h3>Xin chào {{ $user->username }}</h3>

<p>
    Để lấy lại mật khẩu đã mất, <a href="{{ route('reset_password', $token) }}">hãy kích vào đây để tiếp tục !</a>
</p>
