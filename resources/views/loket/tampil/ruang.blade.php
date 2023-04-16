@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Pilih Ruangan')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Pilih Lokasi Ruangan</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>lokasi ruangan</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                <img src="https://rumahsakitkartini.com/upload/images/gallery/img_vDsU2Vy.jpg" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="{{ route('admin.loket.tampil.loket') }}">
                    <h3 class="text-xl text-center font-semibold text-blue-500">
                        Lobby Utama
                    </h3>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                <img src="https://rumahsakit.unair.ac.id/website/wp-content/uploads/2014/04/DSC_a007a8.jpg" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
            </div>
            <div class="p-4 md:p-6 hover:bg-gray-200 hover:rounded-b-xl">
                <a href="{{ route('admin.loket.tampil.loket') }}">
                    <h3 class="text-xl text-center font-semibold text-blue-500">
                        Laboratorium Darah
                    </h3>
                </a>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>

@endsection
