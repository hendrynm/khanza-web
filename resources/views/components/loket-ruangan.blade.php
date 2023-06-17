@csrf
<input type="hidden" name="uuid" id="uuid" value="{{ $ruang->uuid ?? '' }}">
<div class="grid gap-3 lg:gap-5">
    <div>
        <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama</label>
        <input type="text" name="nama_ruang" id="nama_ruang" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-{{$warna}}-500 focus:ring-{{$warna}}-500" value="{{ $ruang->nama_ruang ?? '' }}">
    </div>

    <div class="grid lg:grid-cols-2 gap-3 lg:gap-5">
        <div x-data="{ loket_checked: {{ isset($ruang->loket) ? ($ruang->loket === 1) ? 'true' : 'false' : 'false' }} }">
            <label for="loket_aktif" class="block text-sm text-gray-700 font-medium mb-2">Loket</label>
            <div class="flex items-center">
                <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Mati</label>
                <button id="loket_aktif" type="button" :class="{ 'bg-gray-300': !loket_checked, 'bg-{{$warna}}-500': loket_checked }" class="relative inline-flex h-7 w-14 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-{{$warna}}-500 focus:ring-offset-2" role="switch" :aria-loket_checked="loket_checked.toString()" x-on:click="loket_checked = !loket_checked">
                    <span :class="{ 'translate-x-7': loket_checked, 'translate-x-0': !loket_checked }" class="translate-x-0 pointer-events-none relative inline-block h-6 w-6 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                        <span :class="{ 'opacity-100': !loket_checked, 'opacity-0': loket_checked }" class="opacity-100 ease-in duration-200 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 12 12">
                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <span :class="{ 'opacity-0': !loket_checked, 'opacity-100': loket_checked }" class="opacity-0 ease-out duration-100 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                            <svg class="h-4 w-4 text-{{$warna}}-600" fill="currentColor" viewBox="0 0 12 12">
                                <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                            </svg>
                        </span>
                    </span>
                </button>
                <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Nyala</label>
            </div>
            <input type="hidden" name="loket" id="loket_fix" value="{{ $ruang->loket ?? 0 }}">
        </div>
        <div x-data="{ reservasi_checked: {{ isset($ruang->reservasi) ? ($ruang->reservasi === 1) ? 'true' : 'false' : 'false' }} }">
            <label for="reservasi_aktif" class="block text-sm text-gray-700 font-medium mb-2">Reservasi</label>
            <div class="flex items-center">
                <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Mati</label>
                <button id="reservasi_aktif" type="button" :class="{ 'bg-gray-300': !reservasi_checked, 'bg-{{$warna}}-500': reservasi_checked }" class="relative inline-flex h-7 w-14 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-{{$warna}}-500 focus:ring-offset-2" role="switch" :aria-reservasi_checked="reservasi_checked.toString()" x-on:click="reservasi_checked = !reservasi_checked">
                    <span :class="{ 'translate-x-7': reservasi_checked, 'translate-x-0': !reservasi_checked }" class="translate-x-0 pointer-events-none relative inline-block h-6 w-6 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                        <span :class="{ 'opacity-100': !reservasi_checked, 'opacity-0': reservasi_checked }" class="opacity-100 ease-in duration-200 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 12 12">
                                <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <span :class="{ 'opacity-0': !reservasi_checked, 'opacity-100': reservasi_checked }" class="opacity-0 ease-out duration-100 absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                            <svg class="h-4 w-4 text-{{$warna}}-600" fill="currentColor" viewBox="0 0 12 12">
                                <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                            </svg>
                        </span>
                    </span>
                </button>
                <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Nyala</label>
            </div>
            <input type="hidden" name="reservasi" id="reservasi_fix" value="{{ $ruang->reservasi ?? 0 }}">
        </div>
    </div>

    <div>
        <label for="foto" class="block text-sm text-gray-700 font-medium mb-2">Foto</label>
        <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-{{$warna}}-500 file:text-white hover:file:bg-{{$warna}}-700" name="foto" id="foto">
    </div>
</div>
<!-- End Grid -->

<div class="mt-8 grid">
    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-{{$warna}}-600 hover:bg-{{$warna}}-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-{{$warna}}-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Simpan
    </button>
</div>

<script>
    const tombol_loket = document.getElementById('loket_aktif');
    tombol_loket.addEventListener('click', function() {
        let is_aktif = tombol_loket.getAttribute('aria-loket');
        let nilai = (is_aktif === 'true') ? '0' : '1' ;
        const input = document.getElementById('loket_fix');
        input.setAttribute('value', nilai);
    });

    const tombol_reservasi = document.getElementById('reservasi_aktif');
    tombol_reservasi.addEventListener('click', function() {
        let is_aktif = tombol_reservasi.getAttribute('aria-reservasi');
        let nilai = (is_aktif === 'true') ? '0' : '1' ;
        const input = document.getElementById('reservasi_fix');
        input.setAttribute('value', nilai);
    });

</script>
