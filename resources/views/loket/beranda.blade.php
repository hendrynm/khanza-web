@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Fitur Loket Antrean</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-3 gap-10">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-blue-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-blue-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-blue-200 hover:rounded-b-xl">
                <a href="{{ route('admin.loket.tampil.ruang') }}">
                    <h3 class="text-2xl text-center font-semibold text-blue-500">
                        Pemanggil Antrean
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Lakukan pemanggilan nomor antrean dan kontrol loket.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-indigo-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-indigo-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-indigo-200 hover:rounded-b-xl">
                <a href="{{ route('admin.loket.publik.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-indigo-500">
                        Penampil Loket
                    </h3>
                    <p class="mt-3 text-center text-slate-500">
                        Tampilkan nomor antrean yang dipanggil ke layar display.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-slate-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-slate-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-slate-200 hover:rounded-b-xl">
                <a href="{{ route('admin.loket.atur.beranda') }}">
                    <h3 class="text-2xl text-center font-semibold text-slate-500">
                        Pengaturan
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Tambah atau ubah data ruangan dan loket sebelum program dijalankan.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- Card Blog -->

@endsection
