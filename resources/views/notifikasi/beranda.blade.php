@extends('_master.app')
@section('fitur', 'Notifikasi')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-purple-600">Notifikasi WhatsApp</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Section -->
<div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
    <!-- Grid -->
    <div class="grid md:grid-cols-2 gap-20 border rounded-xl">
        <!-- Card -->
        <div class="p-10">
            <h2 class="text-2xl font-semibold text-purple-500">
                Panduan Pengisian
            </h2>

            <ul class="mt-3 space-y-2">
                <li class="flex space-x-3">
                    <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Nomor HP</span>
                    <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                    <span class="text-gray-600">
                        Nomor HP yang akan digunakan untuk menerima notifikasi melalui WhatsApp.
                    </span>
                </li>

                <li class="flex space-x-3">
                    <span class="flex-shrink-0 h-6 w-20 text-gray-600 font-medium">Aktivasi</span>
                    <span class="flex-shrink-0 h-6 w-auto text-gray-600">:</span>
                    <span class="text-gray-600">
                        Apakah notifikasi WhatsApp diaktifkan? klik Nyala untuk mengaktifkan, klik Mati untuk menonaktifkan.
                    </span>
                </li>
            </ul>
        </div>

        <div class="bg-purple-100 p-10">
            <form action="" method="post">
                <div class="grid grid-cols-6 gap-5 2xl:gap-8">
                    @csrf
                    <div class="col-span-6 lg:col-span-3">
                        <label for="nomor_hp" class="block text-sm text-gray-700 font-medium mb-2">Nomor HP</label>
                        <input type="text" name="nomor_hp" id="nomor_hp" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-purple-500 focus:ring-purple-500 disabled:bg-slate-100 text-slate-700" placeholder="08123456789" value="{{ $notifikasi->nomor_wa ?? '' }}">
                    </div>

                    <div class="col-span-6 lg:col-span-3">
                        <div x-data="{ hp_checked: {{ isset($notifikasi->is_aktif) ? ($notifikasi->is_aktif === 1) ? 'true' : 'false' : 'false' }} }">
                            <label for="hp_aktif" class="block text-sm text-gray-700 font-medium mb-2">Aktivasi</label>
                            <div class="flex items-center lg:mt-4">
                                <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Mati</label>
                                <button id="hp_aktif" type="button" :class="{ 'bg-gray-300': !hp_checked, 'bg-purple-500': hp_checked }" class="relative inline-flex h-7 w-14 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2" role="switch" :aria-hp="hp_checked.toString()" x-on:click="hp_checked = !hp_checked">
                                    <span :class="{ 'translate-x-7': hp_checked, 'translate-x-0': !hp_checked }" class="translate-x-0 pointer-events-none relative inline-block h-6 w-6 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                        <span :class="{ 'opacity-100': !hp_checked, 'opacity-0': hp_checked }" class="opacity-100 ease-in duration-200 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 12 12">
                                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>

                                        <span :class="{ 'opacity-0': !hp_checked, 'opacity-100': hp_checked }" class="opacity-0 ease-out duration-100 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                                            <svg class="h-4 w-4 text-purple-600" fill="currentColor" viewBox="0 0 12 12">
                                                <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                                <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Nyala</label>
                            </div>
                            <input type="hidden" name="aktivasi" id="aktivasi" value="{{ $notifikasi->is_aktif ?? 0 }}">
                        </div>
                    </div>
                </div>

                <div class="mt-8 grid">
                    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-purple-600 hover:bg-purple-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-purple-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Grid -->

    <div class="mt-10">
        <button id="kirim-pesan-pengingat" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Kirim Pesan Pengingat
        </button>

        <button id="kirim-pesan-rekap" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Kirim Pesan Rekap
        </button>
    </div>
</div>
<!-- End Card Section -->

@endsection

@push('script')

<script type="module">
    $(document).ready(function() {
        const tombol_hp = document.getElementById('hp_aktif');
        tombol_hp.addEventListener('click', function() {
            let is_aktif = tombol_hp.getAttribute('aria-hp');
            let nilai = (is_aktif === 'true') ? '1' : '0' ;
            const input = document.getElementById('aktivasi');
            input.setAttribute('value', nilai);
        });

        $('#kirim-pesan-pengingat').on('click', function() {
            $.ajax({
                url: "{{ route('ajax.notifikasi.reservasi') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        $('#kirim-pesan-rekap').on('click', function() {
            $.ajax({
                url: "{{ route('ajax.notifikasi.rekap') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
    });
</script>

@endpush
