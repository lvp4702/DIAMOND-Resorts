<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('css/login_page/css/style.css') }}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- //css files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->
        <div class="wthree-form">
            <h2>_ _ Register now _ _</h2>
            <form id="registerForm" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-sub-w3">
                    <input type="text" name="username" placeholder="Nhập username" value="{{ old('username') }}" />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                @error('username')
                    <div class="msg_error">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-sub-w3">
                    <input type="password" name="password" placeholder="Nhập password*" />
                    <div class="icon-w3">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    </div>
                </div>
                @error('password')
                    <div class="msg_error">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-sub-w3">
                    <input type="text" name="email" placeholder="Nhập email" value="{{ old('email') }}" />
                    <div class="icon-w3">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>
                @error('email')
                    <div class="msg_error">
                        {{ $message }}
                    </div>
                @enderror
                <span style="color: #ccc; font-size: 14px; font-style: italic;">*Mật khẩu tối thiểu 8 ký tự !</span>

                <div class="clear"></div>
                <div class="submit-agileits">
                    <input type="submit" value="Send">
                </div>
            </form>
            <p>Bạn đã có tài khoản ? Hãy <a href="{{ route('formLogin') }}">đăng nhập</a>.</p>

        </div>
        <!--//form-ends-here-->

    </div>
    <!--//main-->
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var formIsValid = this.checkValidity(); // Kiểm tra tính hợp lệ của form
            if (!formIsValid) {
                event.preventDefault(); // Ngăn chặn submit mặc định của form
                var inputs = this.querySelectorAll('input'); // Lấy tất cả các input trong form
                inputs.forEach(function(input) {
                    if (!input.checkValidity()) {
                        input.reportValidity(); // Hiển thị thông báo lỗi nếu input không hợp lệ
                    }
                });
            }
        });
    </script>
</body>
</html>
