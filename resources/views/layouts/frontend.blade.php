<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="IT services, software development, web development, mobile app development, cloud solutions, IoT integration, data analytics, custom software, enterprise solutions, SaaS applications">
    <meta name="description"
        content="Codexer delivers top-tier IT services including custom software development, web and mobile app solutions, cloud integration, and advanced data analytics. Transform your business with our expertise.">


    <meta property="og:title" content="Codexer | Transforming Ideas into Digital Reality">
    <meta property="og:description"
        content="Codexer delivers top-tier IT services including custom software development, web and mobile app solutions, cloud integration, and advanced data analytics.">
    <meta property="og:image" content="{{ asset('favicon.svg') }}">
    <meta property="og:url" content="https://www.codexer.co.uk">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Codexer | Transforming Ideas into Digital Reality">
    <meta name="twitter:description" content="Codexer delivers top-tier IT services including custom software development, web and mobile app solutions, cloud integration, and advanced data analytics.">
    <meta name="twitter:image" content="{{ asset('favicon.svg') }}">


    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.svg') }}">

    <!-- bootstrap grid css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap-grid.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css"
        integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
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
