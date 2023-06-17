@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Ubah Jadwal Dokter')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Ubah Jadwal Dokter</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid md:grid-cols-2 gap-20 border rounded-xl">
        <!-- Card -->
        <div class="p-10">
            <h2 class="text-2xl font-semibold text-amber-500">
                Panduan Pengisian
            </h2>

            <x-panduan-reservasi-dokter/>
        </div>

        <div class="bg-amber-100 p-10">
            <form action="" method="post" enctype="multipart/form-data">
                <x-form-reservasi-dokter :uuidRuang="request()->segment(count(request()->segments())-2)" :dokter="$dokter" :ruang="$ruang" :jadwal="$jadwal" :uuidJadwal="last(request()->segments())"/>
                <input type="hidden" name="type" value="update">
            </form>
        </div>
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
