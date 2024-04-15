Xin chào<h3> {{ $user->username }}</h3>
<hr>
<br>
<p>
    Để lấy lại mật khẩu đã mất, <a href="{{ route('reset_password', $token) }}">hãy kích vào đây để tiếp tục !</a>
</p>
