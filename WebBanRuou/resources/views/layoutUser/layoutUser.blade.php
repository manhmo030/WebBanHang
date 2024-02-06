<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assetClient/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetClient/css/style.css') }}" type="text/css">

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @include('layoutUser.header')



    @yield('client_content')



    @include('layoutUser.footer')


    <!-- Js Plugins -->
    <script src="{{ asset('assetClient/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assetClient/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetClient/js/main.js') }}"></script>



</body>

</html>
