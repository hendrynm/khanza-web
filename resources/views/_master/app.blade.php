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
<body class="bg-lime-100" style="font-family: Inter">
    <!-- ========== MAIN CONTENT ========== -->

    @include('_layout.sidebar')

    <div class="container">
        <!-- Content -->
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72 z-[0]">

            @yield('konten')
        </div>
        <!-- End Content -->
    </div>

    @yield('modal')

    <!-- ========== END MAIN CONTENT ========== -->
    @vite('resources/js/app.js')

    @stack('script')

    <script type="module">
        $(document).ready(function () {
            let nama_fitur = '#select-' + '@yield('fitur')';
            let nama_fitur_low = nama_fitur.toLowerCase();
            $(nama_fitur_low).addClass('bg-pink-300');
        });
    </script>
</body>
</html>
