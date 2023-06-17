@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Riwayat Registrasi')

@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Riwayat Registrasi Dokter</h1>
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
            @foreach($daftar as $d)
                <div class="bg-amber-100 p-10">
                    <form action="{{ route('admin.reservasi.registrasi.konfirmasi.simpan') }}" method="post">
                        @csrf
                        <input type="hidden" name="uuid" id="uuid" value="{{ $d->uuid }}">

                        <div class="grid gap-3 2xl:grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama Ruang</label>
                                <input type="text" name="nama_ruang" id="nama_ruang" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-amber-500 focus:ring-amber-500 disabled:bg-slate-200 text-slate-700" value="{{ $d->nama_ruang }}" disabled>
                            </div>
                            <div class="col-span-2">
                                <label for="id_dokter" class="block text-sm text-gray-700 font-medium mb-2">Nama Dokter</label>
                                <input type="text" name="nama_dokter" id="nama_dokter" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-amber-500 focus:ring-amber-500 disabled:bg-slate-200 text-slate-700" value="{{ $d->nama_dokter }}" disabled>
                            </div>
                            <div class="col-span-2">
                                <label for="tanggal" class="block text-sm text-gray-700 font-medium mb-2">Tanggal</label>
                                <input type="text" name="tanggal_form" id="tanggal_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy"))->format(new DateTime($d->tanggal)) }}" disabled>
                            </div>
                            <div class="grid col-span-2 lg:grid-cols-2 gap-3">
                                <div>
                                    <label for="waktu_mulai" class="block text-sm text-gray-700 font-medium mb-2">Mulai</label>
                                    <input type="text" name="waktu_mulai_form" id="waktu_mulai_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ date("H:i",strtotime($d->waktu_mulai)) }}" disabled>
                                </div>
                                <div>
                                    <label for="waktu_selesai" class="block text-sm text-gray-700 font-medium mb-2">Selesai</label>
                                    <input type="text" name="waktu_selesai_form" id="waktu_selesai_form" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-200 text-slate-700" value="{{ date("H:i",strtotime($d->waktu_selesai)) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- End Grid -->
                    </form>
                </div>
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</div>

@endsection
