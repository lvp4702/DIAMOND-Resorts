<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot password</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
</head>

<body>
    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->
        <div class="wthree-form">
            <a href="/" class="logo">
                DIAMOND Resorts
            </a>
            <h2>_ _ Forgot password _ _</h2>
            <form action="{{ route('check_forgot_password') }}" method="POST" id="">
                @csrf
                <div class="form-sub-w3">
                    <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}"/>
                    <div class="icon-w3">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>
                @error('email')
                <div class="msg_error">
                    {{ $message }}
                </div>
                @enderror
                <span style="color: #ccc; font-size: 14px; font-style: italic;">*Nhập email mà bạn đã dùng để đăng ký tài khoản !</span>

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

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

</html>
