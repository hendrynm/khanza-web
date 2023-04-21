@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Tujuan Reservasi')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Pilih Tujuan Reservasi</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan memilih <b>tujuan</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl">
            <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                <img src="https://www.asthahannas.com/wp-content/uploads/2021/10/Desain-tanpa-judul-1-1200x600.png" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
            </div>
            <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.jadwal') }}">
                    <h3 class="text-xl text-center font-semibold text-amber-500">
                        Poliklinik Umum
                    </h3>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl">
            <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                <img src="https://az668752.vo.msecnd.net/images/ckeditor/pictures-data/000/162/498/162498-content.jpeg?1602401784" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
            </div>
            <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.jadwal') }}">
                    <h3 class="text-xl text-center font-semibold text-amber-500">
                        Poliklinik Kandungan
                    </h3>
                </a>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl">
            <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                <img src="https://rstrijata.com/files/image/1609729104_DSC05555.jpg" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
            </div>
            <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                <a href="{{ route('admin.reservasi.jadwal') }}">
                    <h3 class="text-xl text-center font-semibold text-amber-500">
                        Poliklinik Gigi
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
