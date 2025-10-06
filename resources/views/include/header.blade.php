<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FK1KFKNP7E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FK1KFKNP7E');
    </script>
    @auth
        <script>
            gtag('config', 'G-FK1KFKNP7E', {
                user_id: {{ auth()->user()->id ?? '' }}
            });
        </script>
    @else
        <script>
            gtag('config', 'G-FK1KFKNP7E', {
                user_id: null // Signed-out or anonymous
            });
        </script>
    @endauth
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id"
        content="930369423455-8jsjucb90ns0glstji99v8gdjugo2sl2.apps.googleusercontent.com">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title', 'Vazhithunai Matrimony | Home')</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.webp') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.webp') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">



    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/toastify/toastify.min.css') }}" rel="stylesheet" type="text/css">

</head>
@yield('content')
