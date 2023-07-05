@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Fitur Reservasi Pasien</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @if(session('level_akses') === 1)
        <!-- Card -->
        <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-amber-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.pasien.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-amber-500">
                        Buat Reservasi
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Lakukan pembuatan reservasi baru untuk kunjungan dokter atau fasilitas.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-orange-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-orange-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-orange-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.registrasi.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-orange-500">
                        Lihat Daftar Reservasi
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Lihat daftar dan riwayat reservasi yang telah dibuat.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->
        @endif

        @if(session('level_akses') === 3)
        <!-- Card -->
        <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl">
            <div class="h-60 flex flex-col justify-center items-center bg-amber-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.simpan.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-amber-500">
                        Lihat Reservasi Pasien
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Lihat daftar reservasi yang telah dibuat oleh pasien.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->
        @endif

        @if(session('level_akses') === 2 || session('level_akses') === 3)
        <!-- Card -->
        <div class="group flex flex-col h-full bg-slate-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-slate-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-slate-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.atur.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-slate-500">
                        Atur Ruangan dan Dokter
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Lakukan pengaturan ruangan dan jadwal dokter untuk reservasi.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->
        @endif
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
