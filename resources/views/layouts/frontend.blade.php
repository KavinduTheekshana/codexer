<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.svg') }}">

    <!-- bootstrap grid css -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap-grid.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css"> --}}
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/font-awesome.min.css') }}">

    <!-- swiper css -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/plugins/swiper.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- itsulu css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    {{-- Animreap --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/animtrap/animtrap.css') }}"> --}}
    @stack('styles')
    <title>Codexer | Transforming Ideas into Digital Reality</title>

    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body>

    <!-- wrapper -->
    <div class="mil-wrapper">
        @include('frontend.components.header')

        @yield('content')

        @include('frontend.components.footer')
    </div>
    <!-- wrapper end -->

    <!-- jQuery js -->
    {{-- <script src="{{ asset('frontend/js/plugins/jquery.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- swiper js -->
    <script src="{{ asset('frontend/js/plugins/swiper.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
    <!-- itsulu js -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    {{-- Animtrap  --}}
    <script src="{{ asset('frontend/js/animtrap/anim-trap.js') }}"></script>
    <script src="{{ asset('frontend/js/animtrap/anim-scroll.js') }}"></script>

    {{-- <script>
    ANIMSCROLL.init({
        easing: 'ease-in-out-sine'
    });
</script> --}}




    @stack('scripts')
</body>

</html>
