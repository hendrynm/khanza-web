@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Isi Hasil Pemeriksaan')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Isi Hasil Pemeriksaan</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="bg-red-100 px-4 py-5 shadow sm:rounded-lg sm:p-8">
        <form class="space-y-10" action="#" method="post">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                @csrf
                <div class="md:col-span-1">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Hasil Pemeriksaan</h3>
                    <p class="mt-1 text-sm text-gray-500">Berisi penilaian kondisi pasien berdasarkan tanda vital dan elemen pendukung lainnya.</p>

                    <div class="mt-7 col-span-2">
                        <label for="nomor_rawat" class="block text-sm font-semibold mb-2">Nomor Rawat</label>
                        <div class="relative">
                            <input type="text" id="nomor_rawat" name="nomor_rawat" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500 disabled:bg-gray-200" placeholder="0" value="{{ $catat }}" disabled>
                            <input type="hidden" id="nomor_rawat_form" name="nomor_rawat_form" value="{{ $catat }}">
                        </div>
                        <label for="nomor_rawat" class="block text-sm mt-2 text-red-500">
                            Jika nomor rawat salah, coba refresh halaman.
                        </label>
                    </div>
                </div>

                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 2xl:col-span-3">
                            <label for="subjek" class="block text-sm font-semibold text-gray-700">Subjek / Keluhan</label>
                            <div class="mt-1">
                                <textarea id="subjek" name="subjek" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan subjek yang dialami oleh pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6 2xl:col-span-3">
                            <label for="objek" class="block text-sm font-semibold text-gray-700">Objek / Pemeriksaan</label>
                            <div class="mt-1">
                                <textarea id="objek" name="objek" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan objek yang dialami oleh pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2 2xl:col-span-1">
                            <label for="suhu" class="block text-sm font-semibold mb-2">Suhu</label>
                            <div class="relative">
                                <input type="text" id="suhu" name="suhu" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">°C</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2 2xl:col-span-1">
                            <label for="tinggi" class="block text-sm font-semibold mb-2">Tinggi</label>
                            <div class="relative">
                                <input type="text" id="tinggi" name="tinggi" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">cm</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2 2xl:col-span-1">
                            <label for="berat" class="block text-sm font-semibold mb-2">Berat</label>
                            <div class="relative">
                                <input type="text" id="berat" name="berat" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">kg</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2 2xl:col-span-1">
                            <label for="spo2" class="block text-sm font-semibold mb-2">SpO<sub>2</sub></label>
                            <div class="relative">
                                <input type="text" id="spo2" name="spo2" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2 2xl:col-span-1">
                            <label for="perut" class="block text-sm font-semibold mb-2">Lingkar Perut</label>
                            <div class="relative">
                                <input type="text" id="perut" name="perut" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">cm</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2">
                            <label for="tensi" class="block text-sm font-semibold mb-2">Tensi</label>
                            <div class="relative">
                                <input type="text" id="tensi" name="tensi" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="000/000">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">mmHg</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2">
                            <label for="respirasi" class="block text-sm font-semibold mb-2">Respirasi</label>
                            <div class="relative">
                                <input type="text" id="respirasi" name="respirasi" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">kali/menit</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2">
                            <label for="nadi" class="block text-sm font-semibold mb-2">Nadi</label>
                            <div class="relative">
                                <input type="text" id="nadi" name="nadi" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">kali/menit</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3 lg:col-span-2">
                            <label for="gcs" class="block text-sm font-semibold mb-2">GCS</label>
                            <div class="relative">
                                <input type="text" id="gcs" name="gcs" class="py-2 px-3 pl-3 pr-10 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-red-500 focus:ring-red-500" placeholder="0,0,0">
                                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none z-20 pr-3">
                                    <span class="text-gray-500">E,V,M</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="kesadaran" class="block text-sm font-semibold text-gray-700">Kesadaran</label>
                            <select id="kesadaran" name="kesadaran" class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-red-500 focus:outline-none focus:ring-red-500 sm:text-sm">
                                <option selected disabled>--- Pilih salah satu ---</option>
                                <option value="Compos Mentis">Compos Mentis</option>
                                <option value="Somnolence">Somnolence</option>
                                <option value="Sopor">Sopor</option>
                                <option value="Coma">Coma</option>
                                <option value="Alert">Alert</option>
                                <option value="Confusion">Confusion</option>
                                <option value="Voice">Voice</option>
                                <option value="Pain">Pain</option>
                                <option value="Unresponsive">Unresponsive</option>
                            </select>
                        </div>

                        <div class="col-span-6">
                            <label for="alergi" class="block text-sm font-semibold text-gray-700">Alergi</label>
                            <div class="mt-1">
                                <input type="text" id="alergi" name="alergi" class="block form-input w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan alergi yang dialami oleh pasien">
                            </div>
                        </div>

                        <div class="col-span-6 2xl:col-span-3">
                            <label for="asesmen" class="block text-sm font-semibold text-gray-700">Asesmen</label>
                            <div class="mt-1">
                                <textarea id="asesmen" name="asesmen" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan asesmen untuk pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6 2xl:col-span-3">
                            <label for="plan" class="block text-sm font-semibold text-gray-700">Plan</label>
                            <div class="mt-1">
                                <textarea id="plan" name="plan" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan plan untuk pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6 2xl:col-span-3">
                            <label for="instruksi" class="block text-sm font-semibold text-gray-700">Instruksi</label>
                            <div class="mt-1">
                                <textarea id="instruksi" name="instruksi" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan instruksi untuk pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6 2xl:col-span-3">
                            <label for="evaluasi" class="block text-sm font-semibold text-gray-700">Evaluasi</label>
                            <div class="mt-1">
                                <textarea id="evaluasi" name="evaluasi" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Masukkan plan untuk pasien"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-10">
                <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Batal</button>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- End Card Blog -->

@endsection
