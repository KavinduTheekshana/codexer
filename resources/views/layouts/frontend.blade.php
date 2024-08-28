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
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">
    {{-- Animreap --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/animtrap/animtrap.css')}}">
    @stack('styles')
    <title>Codexer | Transforming Ideas into Digital Reality</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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
<script src="{{ asset('frontend/js/plugins/jquery.min.js')}}"></script>
<!-- swiper js -->
<script src="{{ asset('frontend/js/plugins/swiper.min.js')}}"></script>
<!-- itsulu js -->
<script src="{{ asset('frontend/js/main.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
{{-- Animtrap  --}}
<script src="{{ asset('frontend/js/animtrap/anim-trap.js')}}"></script>
<script src="{{ asset('frontend/js/animtrap/anim-scroll.js')}}"></script>


{{-- <script>
    ANIMSCROLL.init({
        easing: 'ease-in-out-sine'
    });
</script> --}}


<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            const offsetTop = target.offsetTop;

            smoothScrollTo(offsetTop, 1000); // 1000ms (1 second) for scrolling
        });
    });

    function smoothScrollTo(targetPosition, duration) {
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }
</script>


@stack('scripts')
</body>

</html>
