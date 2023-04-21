@extends('_master.app')
@section('fitur', 'Rekam Medis')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-emerald-600">Fitur Rekam Medis</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>pasien</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-emerald-100 border border-gray-200 shadow-sm rounded-xl">
            <div class="h-40 flex flex-col justify-center px-5 bg-emerald-500 rounded-t-xl text-white">
                <span class="text-sm font-medium">
                    Nomor Kartu:
                </span>
                <span class="text-xl font-bold">
                    1234567890
                </span>
                <span class="text-sm font-medium mt-3">
                    Nama Pasien:
                </span>
                <span class="text-xl font-bold">
                    Nama Pasien
                </span>
            </div>
            <div class="p-4 hover:bg-emerald-200 hover:rounded-b-xl">
                <a href="{{ route('admin.rekam_medis.profil') }}">
                    <h3 class="text-lg text-center font-semibold text-emerald-500">
                        Pilih
                    </h3>
                </a>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
