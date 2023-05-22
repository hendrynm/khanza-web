@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Tampilkan Loket')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Tampilkan Loket Antrean</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih menu yang tersedia di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Section -->
<div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
    <!-- Grid -->
    <div class="grid md:grid-cols-3 rounded-xl overflow-hidden gap-5">
        <!-- Card -->
        <div class="flex flex-col bg-blue-100 border shadow-sm rounded-xl  ">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-blue-500 rounded-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-sm -mb-1 tracking-wide text-gray-500">
                            Lokasi Ruangan
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                    Lokasi ruangan loket antrean
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-lg sm:text-xl font-semibold text-blue-500">
                            {{ $tampil->nama_ruang }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-blue-100 border shadow-sm rounded-xl">
            <div class="relative">
                <span class="absolute top-0 right-0 rounded-tr-xl rounded-bl-xl text-xs font-medium text-white py-1.5 px-3
                @if($tampil->bpjs === 0) bg-blue-700">Khusus UMUM</span>
                @elseif($tampil->bpjs === 1) bg-green-600">Khusus BPJS</span>
                @else bg-yellow-500">Umum & BPJS</span> @endif
            </div>
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-blue-500 rounded-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-sm -mb-1 tracking-wide text-gray-500">
                            Tipe Loket
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                    Jenis / tipe loket antrean
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-lg sm:text-xl font-semibold text-blue-500">
                            {{ $tampil->nama_loket }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-blue-100 border shadow-sm rounded-xl  ">
            <div class="relative">
                    <span class="absolute top-0 right-0 rounded-tr-xl rounded-bl-xl text-xs font-medium text-white py-1.5 px-3 bg-red-700">
                        Sisa Antrean: <span id="sisa-antrean">0</span>
                    </span>
            </div>
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-blue-500 rounded-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-sm -mb-1 tracking-wide text-gray-500">
                            Nomor Loket
                        </p>
                        <div class="hs-tooltip">
                            <div class="hs-tooltip-toggle">
                                <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                    Nomor loket antrean di ruangan ini
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-lg sm:text-xl font-semibold text-blue-500">
                            Loket {{ $tampil->nomor_loket }} - Kode {{ $tampil->kode_loket }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Section -->

<!-- Card Section -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-3 mx-auto">
    <div class="bg-blue-100 border rounded-xl shadow-sm flex">
        <div class="flex-shrink-0 relative w-[30vw] rounded-t-xl overflow-hidden">
            <div class="pt-3 flex justify-center items-center h-20">
                <h3 class="text-xl text-gray-500 font-medium">
                    Nomor Antrean Sekarang
                </h3>
            </div>
            <div class="pb-8 gap-x-4 flex justify-center items-center">
                <div class="flex-shrink-0 flex justify-center items-center w-[25vw] h-60 bg-blue-500 rounded-xl text-white p-0 text-8xl font-bold" id="nomor-antrean">
                    {{ $tampil->kode_loket . '000' }}
                </div>
            </div>
        </div>

        <div class="px-3 pt-20 pb-3">
            <!-- Grid -->
            <div class="grid grid-cols-1 overflow-hidden px-1 py-1 gap-5">
                <div class="grid grid-cols-2 gap-5">
                    <div class="hs-tooltip inline-block">
                        <a class="flex-shrink-0 flex justify-center items-center w-[12rem] h-16 bg-emerald-500 hover:bg-emerald-700 rounded-md text-white hs-tooltip-toggle focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2" href="#" id="panggil">
                            <div class="flex flex-row">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                                    </svg>
                                </div>
                                <div class="flex items-center pl-4">
                                    <span class="text-2xl font-medium">Panggil</span>
                                </div>

                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                Panggil nomor antrean berikutnya (otomatis mencari)
                            </span>
                            </div>
                        </a>
                    </div>

                    <div class="hs-tooltip inline-block">
                        <a class="flex-shrink-0 flex justify-center items-center w-[12rem] h-16 bg-red-500 hover:bg-red-700 rounded-md text-white hs-tooltip-toggle focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" href="#" id="ulang">
                            <div class="flex flex-row">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                                    </svg>
                                </div>
                                <div class="flex items-center pl-4">
                                    <span class="text-2xl font-medium">Ulang</span>
                                </div>

                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                Ulangi pemanggilan nomor antrean saat ini
                            </span>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="hs-tooltip inline-block">
                    <button class="flex-shrink-0 flex justify-center items-center w-[15rem] h-16 bg-orange-500 hover:bg-orange-700 rounded-md text-white hs-tooltip-toggle focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2" id="sebelumnya">
                        <div class="flex flex-row">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z" />
                                </svg>
                            </div>
                            <div class="flex items-center pl-4">
                                <span class="text-2xl font-medium">Sebelumnya</span>
                            </div>

                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                Setel nomor antrean ke nomor sebelumnya
                            </span>
                        </div>
                    </button>
                </div>

                <div class="hs-tooltip inline-block">
                    <button class="flex-shrink-0 flex justify-center items-center w-[15rem] h-16 bg-yellow-500 hover:bg-yellow-700 rounded-md text-white hs-tooltip-toggle focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2" id="berikutnya">
                        <div class="flex flex-row">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
                                </svg>
                            </div>
                            <div class="flex items-center pl-4">
                                <span class="text-2xl font-medium">Berikutnya</span>
                            </div>

                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-sm font-medium text-white rounded-md shadow-sm" role="tooltip">
                                Setel nomor antrean ke nomor berikutnya
                            </span>
                        </div>
                    </button>
                </div>
            </div>
            <!-- End Grid -->
        </div>
    </div>
</div>
<!-- End Card Section -->

@endsection

@push('script')

<script type="module">
    const panggil = $('#panggil');
    const ulang = $('#ulang');
    const sebelumnya = $('#sebelumnya');
    const berikutnya = $('#berikutnya');
    const sisa_antrean = $('#sisa-antrean');
    const nomor = $('#nomor-antrean');

    $(document).ready(function () {
        cek_sisa_nomor_urut();
        setInterval(cek_sisa_nomor_urut, 10000);
        ulang.on('click', function(){
            tekan_tombol_ulang(ambil_nomor(nomor));
        });
        panggil.on('click', function (){
            tekan_tombol_panggil();
        });
        sebelumnya.on('click', function (){
            tekan_tombol_sebelumnya(ambil_nomor(nomor));
        });
        berikutnya.on('click', function (){
            tekan_tombol_berikutnya(ambil_nomor(nomor));
        });
    });

    function cek_sisa_nomor_urut() {
        let sisa = 0;
        $.ajax('{{ route('ajax.antrean.cek_sisa_nomor') }}', {
            method: 'POST',
            data: {
                'id_ruang': '{{ $tampil->id_ruang }}',
                'kode_loket': '{{ $tampil->kode_loket }}',
            }
        }).done(function (hasil) {
            if (hasil.status === 200) {
                sisa = hasil.data.sisa;

                sisa_antrean.text();
                sisa_antrean.text(sisa);
            }
        });
        return sisa;
    }

    function tekan_tombol_ulang(nomor_antrean) {
        $.ajax('{{ route('ajax.antrean.ulang_antrean') }}', {
            method: 'POST',
            data: {
                'id_ruang': '{{ $tampil->id_ruang }}',
                'id_loket': '{{ $tampil->id_loket }}',
                'nomor_antrean': nomor_antrean,
            }
        });
    }

    function tekan_tombol_panggil() {
        $.ajax('{{ route('ajax.antrean.panggil_antrean') }}', {
            method: 'POST',
            data: {
                'id_ruang': '{{ $tampil->id_ruang }}',
                'id_loket': '{{ $tampil->id_loket }}',
            }
        }).done(function (hasil){
            if(hasil.status === 200){
                let nomor_tampil = hasil.data.nomor_dipanggil.toString().padStart(3, '0');
                nomor.text();
                nomor.text('{{ $tampil->kode_loket }}'+(nomor_tampil));
            }
        });
    }

    function tekan_tombol_sebelumnya(nomor_saja) {
        if(nomor_saja !== 0){
            let nomor_sekarang = nomor_saja - 1;
            let nomor_tampil = nomor_sekarang.toString().padStart(3, '0');
            nomor.text();
            nomor.text('{{ $tampil->kode_loket }}'+(nomor_tampil));
        }
    }

    function tekan_tombol_berikutnya(nomor_saja) {
        let nomor_sekarang = nomor_saja + 1;
        let nomor_tampil = nomor_sekarang.toString().padStart(3, '0');
        nomor.text();
        nomor.text('{{ $tampil->kode_loket }}'+(nomor_tampil));
    }

    function ambil_nomor(nomor){
        let nomor_teks = nomor.text();
        let nomor_saja = nomor_teks.replace('{{ $tampil->kode_loket }}', '');
        return parseInt(nomor_saja);
    }
</script>

@endpush
