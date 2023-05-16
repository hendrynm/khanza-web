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
            let tampil_fitur = '@yield('fitur')';
            let nama_fitur = '#select-' + tampil_fitur.replaceAll(' ','_');
            let nama_fitur_low = nama_fitur.toLowerCase();

            switch(nama_fitur_low){
                case('#select-loket'):
                    $(nama_fitur_low).addClass('text-blue-500');
                    break;
                case('#select-reservasi'):
                    $(nama_fitur_low).addClass('text-amber-500');
                    break;
                case('#select-rekam_medis'):
                    $(nama_fitur_low).addClass('text-emerald-500');
                    break;
                case('#select-tindakan'):
                    $(nama_fitur_low).addClass('text-red-500');
                    break;
            }
            $(nama_fitur_low).addClass('bg-gray-100');
        });
    </script>
</body>
</html>
