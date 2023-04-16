@extends('_master.app')
@section('fitur', 'Beranda')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <p class="text-2xl -mb-1 font-semibold text-blue-600">Selamat Datang</p>
    <h1 class="text-4xl font-bold text-gray-800">Dokter ABC</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih menu yang tersedia di sebelah kiri atau bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-36 flex flex-col justify-center items-center bg-blue-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="#">
                    <h3 class="text-xl font-semibold text-blue-500">
                        Loket Antrean
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Atur dan panggil antrean pasien secara langsung.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-36 flex flex-col justify-center items-center bg-rose-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="#">
                    <h3 class="text-xl font-semibold text-rose-600">
                        Penjadwalan Pasien
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Jadwalkan pemeriksaan selanjutnya untuk pasien secara langsung.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-36 flex flex-col justify-center items-center bg-amber-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="#">
                    <h3 class="text-xl font-semibold text-amber-500">
                        Reservasi Pasien
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Jadwalkan pemeriksaan atau pengobatan dengan mudah.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-36 flex flex-col justify-center items-center bg-emerald-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                </svg>

            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="#">
                    <h3 class="text-xl font-semibold text-emerald-500">
                        Rekam Medis
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Lihat identitas dan riwayat medis pasien secara langsung.
                    </p>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl   ">
            <div class="h-36 flex flex-col justify-center items-center bg-indigo-500 rounded-t-xl text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                </svg>
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="#">
                    <h3 class="text-xl font-semibold text-indigo-500">
                        Tindakan Medis
                    </h3>
                    <p class="mt-3 text-gray-500">
                        Beri rujukan internal untuk pasien secara langsung.
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
