<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="public/assetAdmin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetAdmin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetAdmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assetAdmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetAdmin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    @include('layoutAdmin.header')
    <!-- Navbar End -->

    @yield('admin_content')

    <!-- Footer Start -->
    @include('layoutAdmin.footer');


</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assetAdmin/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assetAdmin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assetAdmin/js/main.js') }}"></script>

</html>
