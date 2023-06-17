@csrf
<input type="hidden" name="uuid_ruang" id="uuid_ruang" value="{{ $uuid_ruang }}">
<input type="hidden" name="uuid_jadwal" id="uuid_jadwal" value="{{ $uuid_jadwal ?? '' }}">
<div class="grid gap-3 2xl:grid-cols-2">
    <div class="col-span-2">
        <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama Ruang</label>
        <input type="text" name="nama_ruang" id="nama_ruang" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-amber-500 focus:ring-amber-500 disabled:bg-slate-200 text-slate-700" value="{{ $ruang->nama_ruang ?? '' }}" disabled>
    </div>
    <div class="col-span-2">
        <label for="id_dokter" class="block text-sm text-gray-700 font-medium mb-2">Dokter</label>
        <select name="id_dokter" id="id_dokter" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-amber-500 focus:ring-amber-500">
            <option value="" disabled selected>-- Pilih --</option>
            @foreach($dokter as $d)
                @if(isset($jadwal) && isset($jadwal->id_dokter) && $jadwal->id_dokter == $d->id_dokter)
                    <option value="{{ $d->id_dokter }}" selected>{{ $d->nama_dokter }}</option>
                @else
                    <option value="{{ $d->id_dokter }}">{{ $d->nama_dokter }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-span-2 2xl:col-span-1">
        <label for="tanggal" class="block text-sm text-gray-700 font-medium mb-2">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-100 text-slate-700" value="{{ $jadwal->tanggal ?? '' }}">
    </div>
    <div class="grid lg:grid-cols-2 gap-3">
        <div>
            <label for="waktu_mulai" class="block text-sm text-gray-700 font-medium mb-2">Mulai</label>
            <input type="time" name="waktu_mulai" id="waktu_mulai" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-100 text-slate-700" value="{{ $jadwal->waktu_mulai ?? '' }}">
        </div>
        <div>
            <label for="waktu_selesai" class="block text-sm text-gray-700 font-medium mb-2">Selesai</label>
            <input type="time" name="waktu_selesai" id="waktu_selesai" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:bg-slate-100 text-slate-700" value="{{ $jadwal->waktu_selesai ?? '' }}">
        </div>
    </div>
</div>
<!-- End Grid -->

<div class="mt-8 grid">
    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Simpan
    </button>
</div>
