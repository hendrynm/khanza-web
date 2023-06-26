@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Registrasi Penjadwalan')

@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Penjadwalan Dokter</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<div>
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-20 border rounded-xl">
            <!-- Card -->
            <div class="p-10">
                <h2 class="text-2xl font-semibold text-red-500">
                    Panduan Pengisian
                </h2>

                <ul class="mt-3 space-y-2">
                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Nomor Medis</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Nomor medis pasien yang akan melakukan registrasi.<br>
                        <span class="text-sm text-red-400">
                            Jika nomor medis salah, silakan keluar dan pilih pasien yang benar!
                        </span>
                    </span>
                    </li>

                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Nama Pasien</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Nama Pasien yang akan melakukan registrasi.<br>
                        <span class="text-sm text-red-400">
                            Jika nama pasien salah, silakan keluar dan pilih pasien yang benar!
                        </span>
                    </span>
                    </li>

                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Nama Ruangan</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Nama poliklinik atau fasilitas yang akan direservasi<br>
                        <span class="text-sm text-red-400">
                            Jika nama ruangan salah, silakan keluar dan pilih ruangan yang benar!
                        </span>
                    </span>
                    </li>

                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Nama Dokter</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Nama Dokter yang akan direservasi<br>
                        <span class="text-sm text-red-400">
                            Jika nama dokter salah, silakan keluar dan pilih dokter yang benar!
                        </span>
                    </span>
                    </li>

                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Tanggal</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Tanggal yang akan direservasi<br>
                        <span class="text-sm text-red-400">
                            Jika tanggal salah, silakan keluar dan pilih tanggal yang benar!
                        </span>
                    </span>
                    </li>

                    <li class="flex space-x-3">
                        <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Waktu</span>
                        <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                        <span class="text-gray-600">Waktu yang akan direservasi<br>
                        <span class="text-sm text-red-400">
                            Jika waktu salah, silakan keluar dan pilih waktu yang benar!
                        </span>
                    </span>
                    </li>
                </ul>
            </div>

            <div class="bg-red-100 p-10">
                <form action="{{ route('admin.tindakan.jadwal.konfirmasi.simpan') }}" method="post">
                    @csrf
                    <input type="hidden" name="uuid_ruang" id="uuid_ruang" value="{{ $uuid_ruang }}">

                    <div class="grid gap-3 2xl:grid-cols-2">
                        <div class="col-span-2">
                            <label for="nomor_medis" class="block text-sm text-gray-700 font-medium mb-2">Nomor Medis</label>
                            <input type="text" name="nomor_medis_form" id="nomor_medis_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500 disabled:bg-slate-200 text-slate-700" value="{{ $pasien->nomor_medis }}" disabled>
                            <input type="hidden" name="nomor_medis" value="{{ $pasien->nomor_medis }}">
                        </div>
                        <div class="col-span-2">
                            <label for="nama_pasien" class="block text-sm text-gray-700 font-medium mb-2">Nama Pasien</label>
                            <input type="text" name="nama_pasien" id="nama_pasien" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500 disabled:bg-slate-200 text-slate-700" value="{{ $pasien->nama }}" disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama Ruang</label>
                            <input type="text" name="nama_ruang" id="nama_ruang" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500 disabled:bg-slate-200 text-slate-700" value="{{ $ruang->nama_ruang }}" disabled>
                        </div>
                        <div class="col-span-2">
                            <label for="id_dokter" class="block text-sm text-gray-700 font-medium mb-2">Nama Dokter</label>
                            <input type="text" name="nama_dokter" id="nama_dokter" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500 disabled:bg-slate-200 text-slate-700" value="{{ $dokter['nama_dokter'] }}" disabled>
                            <input type="hidden" name="id_dokter" value="{{ $kode_dokter }}">
                        </div>
                        <div class="col-span-2">
                            <label for="tanggal" class="block text-sm text-gray-700 font-medium mb-2">Tanggal</label>
                            <input type="text" name="tanggal_form" id="tanggal_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy"))->format(new DateTime($tanggal)) }}" disabled>
                            <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                        </div>
                        <div class="grid col-span-2 lg:grid-cols-2 gap-3">
                            <div>
                                <label for="waktu_mulai" class="block text-sm text-gray-700 font-medium mb-2">Mulai</label>
                                <input type="text" name="waktu_mulai_form" id="waktu_mulai_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ date("H:i",strtotime($waktu)) }}" disabled>
                                <input type="hidden" name="waktu_mulai" value="{{ $waktu }}">
                            </div>
                            <div>
                                <label for="waktu_selesai" class="block text-sm text-gray-700 font-medium mb-2">Selesai</label>
                                <input type="text" name="waktu_selesai_form" id="waktu_selesai_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ date("H:i", strtotime($waktu) + (15 * 60)) }}" disabled>
                                <input type="hidden" name="waktu_selesai" value="{{ date("H:i:s", strtotime($waktu) + (15 * 60)) }}">
                            </div>
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-8 grid">
                        <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-red-600 hover:bg-red-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</div>

@endsection
