@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Riwayat Registrasi')

@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Riwayat Registrasi Dokter</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>data</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<div>
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-3 gap-6 rounded-xl">
            @foreach($daftar as $d)
                <div class="bg-amber-100 p-5 rounded-xl">
                    <form action="{{ route('admin.reservasi.registrasi.hapus', $d->uuid) }}" method="get">
                        @csrf

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

                        @if(($d->tanggal . " " . $d->waktu_mulai) >= date('Y-m-d H:i:s'))
                            <div class="mt-8 grid">
                                <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-amber-600 hover:bg-amber-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-amber-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    Batalkan Reservasi
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</div>

@endsection
