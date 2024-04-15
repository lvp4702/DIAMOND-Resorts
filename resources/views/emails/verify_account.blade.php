<h3>Xin chào {{ $account->username }}</h3>
<p>Hãy xác thực tài khoản của bạn để có thể đăng nhập !</p>

<p>
    <a href="{{ route('verify', $account->email) }}">Click here to verify your account!</a>
</p>
