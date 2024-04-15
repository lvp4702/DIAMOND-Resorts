<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <link rel="stylesheet" href="{{ asset('css/client/main.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

</head>

<body>
    <div class="wrapper">

        @include('client.layouts.header')
        <div class="content">
            @yield('content')
        </div>
        @include('client.layouts.footer')

        <div class="back-to-top">
            <i class="fa-solid fa-chevron-up"></i>
        </div>

        <div>
            <df-messenger
            intent="WELCOME"
            chat-title="DIAMOND_Resorts"
            agent-id="cb24ac73-2441-4f42-8c77-00302a2f251e"
            language-code="en" Height="230px"
            ></df-messenger>
        </div>
    </div>
</body>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1);
        });

        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('.header_top').fadeOut();
                $('header').addClass('sticky');
            } else {
                $('.header_top').fadeIn();
                $('header').removeClass('sticky');
            }

        })
    })
</script>


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

@if ($message = session('error'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: '{{ $message }}',
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-center'
        })
    </script>
@endif

</html>
