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
    <div class="grid lg:grid-cols-2 gap-12">
        <div class="bg-indigo-50 p-5 rounded-2xl">
            <div class="text-2xl font-semibold text-blue-500 mb-5 text-center">Pemanggil Nomor Antrean</div>
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-6">
                @foreach($ruang as $r)
                    <!-- Card -->
                    <div class="group flex flex-col h-full bg-blue-100 border border-gray-200 shadow-sm rounded-xl">
                        <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                            <img src="data:image/jpeg;base64,{{ $r->foto }}" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
                        </div>
                        <div class="p-4 md:p-6 hover:bg-blue-200 hover:rounded-b-xl">
                            <a href="{{ route('admin.loket.publik.panggil',strtoupper($r->uuid)) }}">
                                <h3 class="text-xl text-center font-semibold text-blue-500">
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


        <div class="bg-indigo-50 p-5 rounded-2xl">
            <div class="text-2xl font-semibold text-blue-500 mb-5 text-center">Cetak Nomor Antrean</div>
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-6">
                @foreach($ruang as $r)
                    <!-- Card -->
                    <div class="group flex flex-col h-full bg-blue-100 border border-gray-200 shadow-sm rounded-xl">
                        <div class="h-48 flex flex-col justify-center items-center rounded-t-xl text-white">
                            <img src="data:image/jpeg;base64,{{ $r->foto }}" alt="foto ruangan" class="h-48 w-full object-cover object-center rounded-t-xl">
                        </div>
                        <div class="p-4 md:p-6 hover:bg-blue-200 hover:rounded-b-xl">
                            <a href="{{ route('admin.loket.publik.cetak',strtoupper($r->uuid)) }}">
                                <h3 class="text-xl text-center font-semibold text-blue-500">
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
    </div>
</div>

@endsection
