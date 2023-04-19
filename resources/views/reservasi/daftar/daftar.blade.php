@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Daftar')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Daftar Pasien Baru</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-8">
        <form class="space-y-10" action="#" method="post">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Informasi Pribadi</h3>
                    <p class="mt-1 text-sm text-gray-500">Berisi seluruh data pribadi yang disimpan oleh aplikasi SIMRS Khanza.</p>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nik" class="block text-sm font-semibold text-gray-700">NIK</label>
                            <input type="text" name="nik" id="nik" autocomplete="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="1234567890123456">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="nama-lengkap" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama-lengkap" id="nama-lengkap" autocomplete="nama-lengkap" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Aku Bukan Caca Dido">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="tempat-lahir" class="block text-sm font-semibold text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat-lahir" id="tempat-lahir" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Kota Kabupaten">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="tanggal-lahir" class="block text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                            <input type="text" name="tanggal-lahir" id="tanggal-lahir" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="01-01-2001">
                        </div>

                        <div class="col-span-6">
                            <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat Lengkap</label>
                            <input type="text" name="alamat" id="alamat" autocomplete="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Jalan Karangan No. 1">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="kota" class="block text-sm font-semibold text-gray-700">Kota</label>
                            <input type="text" name="kota" id="kota" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Kota Kabupaten">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="provinsi" class="block text-sm font-semibold text-gray-700">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" autocomplete="address-level1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Provinsi Sesuatu Barat">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="kode-pos" class="block text-sm font-semibold text-gray-700">Kode Pos</label>
                            <input type="text" name="kode-pos" id="kode-pos" autocomplete="postal-code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="12345">
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="telepon" class="block text-sm font-semibold text-gray-700">No. Telepon</label>
                            <input type="text" name="telepon" id="telepon" autocomplete="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="08123456789">
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="posel" class="block text-sm font-semibold text-gray-700">Posel</label>
                            <input type="text" name="posel" id="posel" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="email@mail.com">
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex justify-end mt-10">
                <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">Batal</button>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-amber-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- End Card Blog -->

@endsection
