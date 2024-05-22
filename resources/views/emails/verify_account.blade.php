<h2>DIAMOND Resorts</h2>
<h3>Xin chào {{ $account->username }}</h3>
<p>Hãy xác thực tài khoản của bạn để có thể đăng nhập !</p>

<p>
    <a href="{{ route('verify', $account->email) }}">Nhấn vào đây để xác thực tài khoản của bạn !</a>
</p>
