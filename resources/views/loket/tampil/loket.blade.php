@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Pilih Loket')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Pilih Jenis Loket</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>jenis loket</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($loket as $l)
            <!-- Card -->
            <div class="group flex flex-col h-full bg-blue-100 border border-gray-200 shadow-sm rounded-xl   ">
                <div class="h-36 flex flex-col bg-blue-500 rounded-t-xl text-white">
                    <div class="relative">
                        <span class="absolute top-0 right-0 rounded-tr-xl rounded-bl-xl text-xs font-medium text-white py-1.5 px-3
                        @if($l->bpjs === 0)
                            bg-blue-700">
                            Khusus UMUM</span>
                        @elseif($l->bpjs === 1)
                            bg-green-600">
                            Khusus BPJS</span>
                        @else
                            bg-yellow-500">
                            Umum & BPJS</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <span class="text-8xl font-bold">{{ $l->nomor_loket }}</span>
                    </div>
                </div>
                <div class="p-4 md:p-6 hover:bg-blue-200 hover:rounded-b-xl">
                    <a href="{{ route('admin.loket.tampil.tampil',strtoupper($l->uuid)) }}">
                        <h3 class="text-xl text-center font-semibold text-blue-500">
                            {{ $l->nama_loket }}
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
