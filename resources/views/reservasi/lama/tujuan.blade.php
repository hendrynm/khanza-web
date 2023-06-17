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
        @foreach($ruang as $r)
            <!-- Card -->
            <div class="group flex flex-col h-full bg-amber-100 border border-gray-200 shadow-sm rounded-xl">
                <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                    <img src="data:image/jpeg;base64,{{ $r->foto }}" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
                </div>
                <div class="p-4 md:p-6 hover:bg-amber-200 hover:rounded-b-xl">
                    <a href="{{ route('admin.reservasi.pasien.jadwal', [$nomor_medis, strtoupper($r->uuid)]) }}">
                        <h3 class="text-xl text-center font-semibold text-amber-500">
                            {{ $r->nama_ruang }}
                        </h3>
                    </a>
                </div>
            </div>
            <!-- End Card -->
        @endforeach
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
