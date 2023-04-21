@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Ubah Loket')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Ubah Loket Antrean</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Section -->
<div class="max-w-[40rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
    <!-- Card -->
    <div class="bg-gray-100 rounded-xl shadow p-4 sm:px-8 sm:py-6">
        <form method="post" action="#">
            <!-- Card -->
            <div class="bg-gray-100 rounded-xl ">
                <!-- Grid -->
                <div class="space-y-4 sm:space-y-6">
                    <div class="space-y-2">
                        <label for="ruangan-loket" class="inline-block text-lg font-semibold text-gray-800 mt-2.5">
                            Ruangan Loket
                        </label>

                        <select id="ruangan-loket" class="py-2 px-3 pr-9 block w-full border-gray-200 shadow-sm rounded-lg text-base focus:border-blue-500 focus:ring-blue-500">
                            <option selected disabled>--- Pilih salah satu ---</option>
                            <option>Lobby Utama</option>
                            <option>Laboratorium Darah</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="jenis-loket" class="inline-block text-lg font-semibold text-gray-800 mt-2.5 ">
                            Jenis Loket
                        </label>

                        <select id="jenis-loket" class="py-2 px-3 pr-9 block w-full border-gray-200 shadow-sm rounded-lg text-base focus:border-blue-500 focus:ring-blue-500">
                            <option selected disabled>--- Pilih salah satu ---</option>
                            <option>Pendaftaran Pasien Baru</option>
                            <option>Pendaftarab Pasien Lama</option>
                            <option>Kasir</option>
                            <option>Apotek</option>
                            <option>Customer Service</option>
                        </select>
                    </div>
                </div>
                <!-- End Grid -->

                <div class="mt-10 flex justify-center gap-x-2">
                    <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-2xl ">
                        Simpan Pengaturan
                    </button>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

@endsection
