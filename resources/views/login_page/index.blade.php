<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
            <h2>_ _ Login now _ _</h2>
            <form action="{{ route('login') }}" method="POST" id="formLogin">
                @csrf
                <div class="form-sub-w3">
                    <input type="text" name="username" placeholder="Username" />
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3">
                    <input type="password" name="password" placeholder="Password" />
                    <div class="icon-w3">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    </div>
                </div>
                <label class="anim">
                    <input type="checkbox" class="checkbox">
                    <span>Remember Me</span>
                    <a href="{{ route('forgot_password') }}">Forgot Password</a>
                </label>
                <div class="clear"></div>
                <div class="submit-agileits">
                    <input type="submit" value="Login">
                </div>
            </form>
            <p>Bạn chưa có tài khoản ? Hãy <a href="{{ route('formRegister') }}">đăng ký</a>.</p>

        </div>
        <!--//form-ends-here-->

    </div>
    <!--//main-->

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

@if ($message = session('message'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: '{{ $message }}',
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-center'
        })
    </script>
@endif

@if ($error = session('error'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: '{{ $error }}',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-center'
        })
    </script>
@endif

</html>
