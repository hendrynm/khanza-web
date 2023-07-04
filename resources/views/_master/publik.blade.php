<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo khanza-web mini.png') }}">

    <title>@yield('fitur') | @yield('menu') | Khanza Web</title>

    @vite('resources/css/app.css')

    @stack('style')
</head>
<body class="bg-white" style="font-family: Inter,sans-serif">
<!-- ========== MAIN CONTENT ========== -->

<div class="container">
    <!-- Content -->
    <div class="w-full z-[0]">

        @yield('konten')
    </div>
    <!-- End Content -->
</div>

@yield('modal')

@include('sweetalert::alert')

<!-- ========== END MAIN CONTENT ========== -->
@livewireScripts

@vite('resources/js/app.js')

@stack('script')
</body>
</html>
