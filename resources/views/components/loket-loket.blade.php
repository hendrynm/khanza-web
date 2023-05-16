@csrf
<input type="hidden" name="uuid_ruangan" id="uuid_ruangan" value="{{ $ruang->uuid }}">
<input type="hidden" name="uuid_loket" id="uuid_loket" value="{{ $loket->uuid ?? '' }}">
<div class="grid gap-3 lg:gap-5">
    <div>
        <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama Ruangan</label>
        <input type="text" name="nama_ruang" id="nama_ruang"
               class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-100 text-slate-500"
               value="{{ $ruang->nama_ruang }}" disabled="disabled">
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
        <div>
            <label for="kode" class="block text-sm text-gray-700 font-medium mb-2">Kode</label>
            <select name="kode" id="kode"
                    class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="" disabled selected>-- Pilih --</option>
                @foreach(range('A','Z') as $char)
                    @if(isset($loket->kode_loket) && $loket->kode_loket == $char)
                        <option value="{{ $char }}" selected>{{ $char }}</option>
                    @else
                        <option value="{{ $char }}">{{ $char }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div>
            <label for="nomor" class="block text-sm text-gray-700 font-medium mb-2">Nomor</label>
            <input type="number" name="nomor" id="nomor"
                   class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                   value="{{ $loket->nomor_loket ?? '' }}">
        </div>

        <div>
            <label for="bpjs" class="block text-sm text-gray-700 font-medium mb-2">Jenis</label>
            <select name="bpjs" id="bpjs"
                    class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="" disabled selected>-- Pilih --</option>
                <option value="0" @if(isset($loket->bpjs)) @if($loket->bpjs === 0) selected @endif @endif>Umum</option>
                <option value="1" @if(isset($loket->bpjs)) @if($loket->bpjs === 1) selected @endif @endif>BPJS</option>
                <option value="2" @if(isset($loket->bpjs)) @if($loket->bpjs === 2) selected @endif @endif>Umum & BPJS</option>
            </select>
        </div>

        <div>
            <label for="warna" class="block text-sm text-gray-700 font-medium mb-2">Warna</label>
            <div class="relative text-sm font-medium" x-data="{ open: false, warna_dipilih: null }" @click.away="open = false">
                <button class="w-full bg-white rounded-md shadow-sm py-3 text-left px-4 border border-gray-200 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:border-blue-500 focus:ring-blue-500" @click="open = !open" aria-haspopup="true" :aria-expanded="open" x-text="warna_dipilih ? warna_dipilih : '{{ $loket->warna ?? '-- Pilih --'}}'" type="button">
                </button>
                <div x-show="open" id="warna-dropdown" class="absolute z-10 mt-1 bg-white rounded-md shadow-lg">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        @foreach($warna as $w)
                            <button class="w-full text-left flex items-center px-4 py-2 gap-3 text-sm font-normal text-gray-700 hover:bg-gray-500 hover:text-white" role="menuitem" x-on:click="warna_dipilih = '{{ $w->warna }}'; open = false; document.getElementById('warna_fix').value = '{{ $w->id_warna }}';" type="button">
                                <div class="h-5 w-5 rounded-full mr-2 bg-{{ $w->warna }} border-[1px] border-black"></div>
                                {{ $w->warna }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <input type="hidden" name="warna" id="warna_fix" value="{{ $loket->id_warna ?? '' }}">
        </div>
    </div>
    <!-- End Grid -->

    <div>
        <label for="nama" class="block text-sm text-gray-700 font-medium mb-2">Nama</label>
        <input type="text" name="nama" id="nama"
               class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
               value="{{ $loket->nama_loket ?? '' }}">
    </div>

</div>
<!-- End Grid -->

<div class="mt-8 grid">
    <button type="submit"
            class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Simpan
    </button>
</div>

<script>
    const dropdown = document.getElementById('warna-dropdown');

    dropdown.addEventListener('click', function(event) {
        const warna_dipilih = event.target.dataset.value;
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'warna_dipilih';
        input.value = warna_dipilih;
    });
</script>
