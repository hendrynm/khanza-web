<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('fitur') | @yield('menu') | Khanza Web</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-lime-100" style="font-family: Inter">
    <!-- ========== MAIN CONTENT ========== -->

    @include('_layout.sidebar')

    <div class="container">
        @yield('konten')
    </div>

    <!-- ========== END MAIN CONTENT ========== -->
    @vite('resources/js/app.js')

    @stack('script')

    <script type="module">
        $(document).ready(function () {
            let nama_fitur = '#select-' + '@yield('fitur')';
            let nama_fitur_low = nama_fitur.toLowerCase();
            $(nama_fitur_low).addClass('bg-pink-400');
        });
    </script>
</body>
</html>
