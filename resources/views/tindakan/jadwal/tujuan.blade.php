@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Jadwal Poliklinik')
@section('konten')
<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Pilih Jadwal Poliklinik</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>ketersediaan jadwal</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jadwal as $j)
                <?php
                $sisa_kuota = $j->kuota - $j->jumlah_pasien;
                $is_habis = ($sisa_kuota === 0) ? 'slate' : 'red';
                ?>
                <!-- Card -->
            <div class="group flex flex-col h-full bg-{{ $is_habis }}-100 border border-gray-200 shadow-sm rounded-xl">
                <div class="h-40 flex flex-col bg-{{ $is_habis }}-500 rounded-t-xl text-white">
                    <div class="bg-{{ $is_habis }}-600 rounded-t-xl py-2 px-4">
                        <div class="text-sm text-white text-center font-medium">
                            <b>{{ ($sisa_kuota === 0) ? 'Kuota HABIS' : 'Sisa Kuota: ' . $sisa_kuota . ' orang' }}</b>
                        </div>
                    </div>
                    <div class="flex flex-col p-4 items-center justify-center">
                        <div class="text-white text-xl font-bold text-center">
                            {{ $j->nama_dokter }}
                        </div>
                        <div class="mt-2 text-white text-center">
                            {{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy"))->format(new DateTime($j->tanggal)) }}
                        </div>
                        <div class="text-white font-semibold text-center">
                            {{ date_format(date_create($j->waktu_mulai), 'H:i') }} - {{ date_format(date_create($j->waktu_selesai), 'H:i') }}
                        </div>
                    </div>
                </div>
                @if($sisa_kuota === 0)
                    <div class="flex-grow flex flex-col justify-center items-center">
                        <div class="text-sm font-semibold text-{{ $is_habis }}-500 p-3 hover:bg-{{ $is_habis }}-200 hover:rounded-b-xl text-center w-full">
                            Pilih
                        </div>
                    </div>
                @else
                    <form action="{{ route('admin.tindakan.jadwal.konfirmasi') }}" method="post">
                        @csrf
                        <input type="hidden" id="uuid_ruang" name="uuid_ruang" value="{{ last(request()->segments()) }}">
                        <input type="hidden" id="uuid_jadwal" name="uuid_jadwal" value="{{ $j->uuid }}">
                        <input type="hidden" id="nomor_medis" name="nomor_medis" value="{{ request()->segment(count(request()->segments())-2) }}">
                        <input type="hidden" id="kode_dokter" name="kode_dokter" value="{{ $j->id_dokter }}">
                        <input type="hidden" id="tanggal" name="tanggal" value="{{ $j->tanggal }}">
                        <input type="hidden" id="waktu_mulai" name="waktu_mulai" value="{{ $j->waktu_mulai }}">
                        <input type="hidden" id="waktu_selesai" name="waktu_selesai" value="{{ $j->waktu_selesai }}">

                        <button class="text-sm font-semibold text-{{ $is_habis }}-500 p-3 hover:bg-{{ $is_habis }}-200 hover:rounded-b-xl text-center w-full" type="submit">
                            Pilih
                        </button>
                        @endif
                    </form>
            </div>
            <!-- End Card -->
        @endforeach
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->

@endsection
