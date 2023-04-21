@extends('_master.app')
@section('fitur', 'Rekam Medis')
@section('menu', 'Profil')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-emerald-600">Dokumen Rekam Medis</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="bg-emerald-100 px-4 py-5 shadow sm:rounded-lg sm:p-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-semibold leading-6 text-gray-900">Informasi Pribadi</h3>
                <p class="mt-1 text-sm text-gray-500">Berisi seluruh data pribadi yang disimpan oleh aplikasi SIMRS Khanza.</p>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="nik" class="block text-sm font-semibold text-gray-700">NIK</label>
                        <input type="text" name="nik" id="nik" autocomplete="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="1234567890123456" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="nama-lengkap" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama-lengkap" id="nama-lengkap" autocomplete="nama-lengkap" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Aku Bukan Caca Dido" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="tempat-lahir" class="block text-sm font-semibold text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat-lahir" id="tempat-lahir" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Kota Kabupaten" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="tanggal-lahir" class="block text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                        <input type="text" name="tanggal-lahir" id="tanggal-lahir" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="01-01-2001" disabled="disabled">
                    </div>

                    <div class="col-span-6">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat Lengkap</label>
                        <input type="text" name="alamat" id="alamat" autocomplete="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Jalan Karangan No. 1" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="kota" class="block text-sm font-semibold text-gray-700">Kota</label>
                        <input type="text" name="kota" id="kota" autocomplete="address-level2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Kota Kabupaten" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="provinsi" class="block text-sm font-semibold text-gray-700">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" autocomplete="address-level1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="Provinsi Sesuatu Barat" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="kode-pos" class="block text-sm font-semibold text-gray-700">Kode Pos</label>
                        <input type="text" name="kode-pos" id="kode-pos" autocomplete="postal-code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="12345" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="telepon" class="block text-sm font-semibold text-gray-700">No. Telepon</label>
                        <input type="text" name="telepon" id="telepon" autocomplete="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="08123456789" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="posel" class="block text-sm font-semibold text-gray-700">Posel</label>
                        <input type="text" name="posel" id="posel" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="email@mail.com" disabled="disabled">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-emerald-100 px-4 py-5 shadow sm:rounded-lg sm:p-8 mt-10">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-semibold leading-6 text-gray-900">Riwayat Rekam Medis</h3>
                <p class="mt-1 text-sm text-gray-500">Berisi linimasa riwayat kesehatan terakhir.</p>
            </div>

            <div class="mt-5 md:col-span-2 md:mt-0">
                <ol class="relative border-l border-gray-200">
                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                            </svg>
                        </span>

                        <h3 class="flex items-center text-base mb-1 font-semibold text-gray-900">
                            Dr. Aku Bukan Caca, S.Pd., M.Pd.I.
                            <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">Dokter Umum</span>
                            <span class="bg-emerald-300 text-emerald-800 text-sm font-medium mr-2 px-3 py-1 rounded ml-3">Baru!</span>
                        </h3>

                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Sabtu, 1 April 2023 pukul 19.05</time>

                        <div class="mb-4 text-base font-normal text-gray-500">
                            <div class="">
                                <span class="font-semibold">Keluhan:</span>
                                <span class="">Sakit kepala, demam, batuk, pilek, dan nyeri otot.</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Diagnosa:</span>
                                <span class="">Flu.</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Tindakan:</span>
                                <span class="">Rawat jalan</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Obat:</span>
                                <span class="">Paracetamol 500 mg, 3x sehari.</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Catatan:</span>
                                <span class="">Jangan lupa minum obat.</span>
                            </div>
                        </div>

                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-500 bg-blue-100 border border-blue-200 rounded-lg hover:bg-blue-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-200 focus:text-blue-700">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                            </svg>
                            Unduh Rekam Medis
                        </a>
                    </li>

                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>

                        <h3 class="flex items-center text-base mb-1 font-semibold text-gray-900">
                            Dita Leni Rafia, A.Ak.
                            <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-medium bg-red-500 text-white">Petugas Lab. Darah</span>
                        </h3>

                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Sabtu, 1 April 2023 pukul 17.00</time>

                        <div class="mb-4 text-base font-normal text-gray-500">
                            <div class="">
                                <span class="font-semibold">Hasil Laboratorium:</span>
                                <span class="">Kadar darah putih normal.</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Catatan:</span>
                                <span class="">Tidak ditemukan tanda-tanda DBD.</span>
                            </div>
                        </div>

                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 bg-red-100 border border-red-200 rounded-lg hover:bg-red-200 hover:text-red-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-red-200 focus:text-red-700">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                            </svg>
                            Unduh Hasil Laboratorium
                        </a>
                    </li>

                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l6-6m0 0l-6-6m6 6H9a6 6 0 000 12h3" />
                            </svg>
                        </span>

                        <h3 class="flex items-center text-base mb-1 font-semibold text-gray-900">
                            Dr. Aku Bukan Caca, S.Pd., M.Pd.I.
                            <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">Dokter Umum</span>
                        </h3>

                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Jumat, 31 Maret 2023 pukul 09.18</time>

                        <div class="mb-4 text-base font-normal text-gray-500">
                            <div class="">
                                <span class="font-semibold">Memberi Rujukan ke:</span>
                                <span class="">Laboratorium Darah</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Catatan:</span>
                                <span class="">Ada gejala Demam Berdarah Dengue.</span>
                            </div>
                        </div>
                    </li>

                    <li class="mb-10 ml-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </span>

                        <h3 class="flex items-center text-base mb-1 font-semibold text-gray-900">
                            Dr. Aku Bukan Caca, S.Pd., M.Pd.I.
                            <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">Dokter Umum</span>
                        </h3>

                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Jumat, 31 Maret 2023 pukul 09.00</time>

                        <div class="mb-4 text-base font-normal text-gray-500">
                            <div class="">
                                <span class="font-semibold">Keluhan:</span>
                                <span class="">Sakit kepala, demam, batuk, pilek, dan nyeri otot.</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Diagnosa:</span>
                                <span class="">DBD</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Tindakan:</span>
                                <span class="">Rujukan ke Laboratorium Darah</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Obat:</span>
                                <span class="">-</span>
                            </div>
                            <div class="">
                                <span class="font-semibold">Catatan:</span>
                                <span class="">Dijadwalkan untuk besok jam 5 sore.</span>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Card Blog -->

@endsection
