@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Pilih Pasien Catat')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Pilih Pasien</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>pasien</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($pasien as $p)
            <!-- Card -->
            <div class="group flex flex-col h-full bg-red-100 border border-gray-200 shadow-sm rounded-xl">
                <div class="h-40 flex flex-col justify-center px-5 bg-red-500 rounded-t-xl text-white leading-tight">
                    <div class="text-lg font-bold uppercase">
                        {{ $p->nama }}
                    </div>
                    <div class="inline-flex text-sm items-center font-medium mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <span class="pl-3">{{ ($p->nomor_bpjs === '-') ? 'KTP: '.$p->nomor_ktp : 'BPJS: '.$p->nomor_bpjs }}</span>
                    </div>
                    <div class="inline-flex text-sm items-center font-medium mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        <span class="pl-3">
                            {{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"dd MMMM yyyy"))->format(new DateTime($p->tanggal_lahir)) }}
                        </span>
                    </div>
                </div>
                <div class="p-4 hover:bg-red-200 hover:rounded-b-xl">
                    <a href="{{ route('admin.tindakan.catat.beranda',base64_encode($p->nomor_medis)) }}">
                        <h3 class="text-sm text-center font-semibold text-red-500">
                            Pilih
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
