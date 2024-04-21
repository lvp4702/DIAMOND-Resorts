<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
</head>

<body>
    <div class="wrapper">

        @include('admin.layouts.header')

        <div class="containner">

            @include('admin.layouts.sidebar')

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
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

@if ($loginSuccess = session('login'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: '{{ $loginSuccess }}' + '{{ Auth::user()->fullname }} !',
            showHideTransition: 'fade',
            bgColor: 'rgb(255, 163, 179)',
            textColor: 'black',
            position: 'top-center'
        })
    </script>
@endif

</html>
