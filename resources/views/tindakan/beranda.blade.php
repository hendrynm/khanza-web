@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Fitur Tindakan Medis</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-red-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-red-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-red-200 hover:rounded-b-xl">
                <a href="{{ route('admin.tindakan.jadwal.pilih') }}">
                    <h3 class="text-2xl text-center font-semibold text-red-500">
                        Jadwalkan Pasien
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Jadwalkan pemeriksaan pasien secara langsung.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-pink-100 border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-60 flex flex-col justify-center items-center bg-pink-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-36 h-36">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-pink-200 hover:rounded-b-xl">
                <a href="{{ route('admin.tindakan.catat.pilih') }}">
                    <h3 class="text-2xl text-center font-semibold text-pink-500">
                        Hasil Pemeriksaan
                    </h3>
                    <p class="mt-3 text-center text-gray-500">
                        Masukkan hasil pemeriksaan pasien ke sistem.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
