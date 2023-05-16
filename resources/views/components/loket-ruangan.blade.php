@csrf
<input type="hidden" name="uuid" id="uuid" value="{{ $ruang->uuid ?? '' }}">
<div class="grid gap-3 lg:gap-5">
    <div>
        <label for="nama_ruang" class="block text-sm text-gray-700 font-medium mb-2">Nama</label>
        <input type="text" name="nama_ruang" id="nama_ruang" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $ruang->nama_ruang ?? '' }}">
    </div>

    <div>
        <label for="foto" class="block text-sm text-gray-700 font-medium mb-2">Foto</label>
        <input type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-700" name="foto" id="foto">
    </div>
</div>
<!-- End Grid -->

<div class="mt-8 grid">
    <button type="submit" class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-sm lg:text-base text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Simpan
    </button>
</div>
