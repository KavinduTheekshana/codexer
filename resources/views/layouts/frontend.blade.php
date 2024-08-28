<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.svg') }}">

    <!-- bootstrap grid css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap-grid.css')}}">
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/font-awesome.min.css')}}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/swiper.min.css')}}">
    <!-- itsulu css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    @stack('styles')
    <title>Codexer | Transforming Ideas into Digital Reality</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- wrapper -->
    <div class="mil-wrapper">

        @include('frontend.components.header')

        @yield('content')


</div>
<!-- wrapper end -->

<!-- jQuery js -->
<script src="{{ asset('frontend/js/plugins/jquery.min.js')}}"></script>
<!-- swiper js -->
<script src="{{ asset('frontend/js/plugins/swiper.min.js')}}"></script>
<!-- itsulu js -->
<script src="{{ asset('frontend/js/main.js')}}"></script>

@stack('scripts')
</body>

</html>
