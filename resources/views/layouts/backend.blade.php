<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codexer | Transforming Ideas into Digital Reality</title>
    <link rel="icon" type="image/png" href="{{ asset('backend/images/favicon.png')}}" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('backend/css/remixicon.css')}}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/bootstrap.min.css')}}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/apexcharts.css')}}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/dataTables.min.css')}}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/lib/editor.quill.snow.css')}}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/flatpickr.min.css')}}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/full-calendar.css')}}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/jquery-jvectormap-2.0.5.css')}}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/magnific-popup.css')}}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('backend/css/lib/slick.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
    @stack('styles')
</head>
<body>
    {{-- Sidebar  --}}
    @include('backend.components.sidebar')

    <main class="dashboard-main">

        {{-- Header --}}
        @include('backend.components.header')

        {{-- Content  --}}
        @yield('content')

        {{-- Footer  --}}
        @include('backend.components.footer')

    </main>
    <!-- jQuery library js -->
    <script src="{{ asset('backend/js/lib/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/js/lib/bootstrap.bundle.min.js')}}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('backend/js/lib/apexcharts.min.js')}}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('backend/js/lib/dataTables.min.js')}}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('backend/js/lib/iconify-icon.min.js')}}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('backend/js/lib/jquery-ui.min.js')}}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('backend/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <script src="{{ asset('backend/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Popup js -->
    <script src="{{ asset('backend/js/lib/magnifc-popup.min.js')}}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('backend/js/lib/slick.min.js')}}"></script>
    <!-- main js -->
    <script src="{{ asset('backend/js/app.js')}}"></script>

    <script src="{{ asset('backend/js/homeTwoChart.js')}}"></script>

    @stack('scripts')

</body>

</html>
