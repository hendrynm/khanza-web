@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Tindakan')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-indigo-600">Isi Tindakan</h1>
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
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">Hasil Asesmen Dokter</h3>
                    <p class="mt-1 text-sm text-gray-500">Berisi penilaian kondisi pasien menggunakan metode SOAP.</p>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="gejala" class="block text-sm font-semibold text-gray-700">Gejala</label>
                            <div class="mt-1">
                                <textarea id="gejala" name="gejala" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Masukkan gejala yang dialami oleh pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="tanda-vital" class="block text-sm font-semibold text-gray-700">Tanda Vital</label>
                            <div class="mt-1">
                                <textarea id="tanda-vital" name="tanda-vital" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Masukkan hasil tanda vital yang ada pada pasien"></textarea>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="diagnosa1" class="block text-sm font-semibold text-gray-700">Diagnosa 1</label>
                            <select id="diagnosa1" name="diagnosa1" autocomplete="diagnosa1" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option selected>--- Pilih salah satu ---</option>
                                <option>Flu</option>
                                <option>Batuk</option>
                                <option>Demam</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="diagnosa2" class="block text-sm font-semibold text-gray-700">Diagnosa 2</label>
                            <select id="diagnosa2" name="diagnosa2" autocomplete="diagnosa2" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option selected>--- Pilih salah satu ---</option>
                                <option>Tidak ada</option>
                                <option>Flu</option>
                                <option>Batuk</option>
                                <option>Demam</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="tindakan" class="block text-sm font-semibold text-gray-700">Tindakan</label>
                            <select id="tindakan" name="tindakan" autocomplete="tindakan" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option selected>--- Pilih salah satu ---</option>
                                <option>Rujukan Internal</option>
                                <option>Rawat Jalan</option>
                                <option>Rawat Inap</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="jadwal-tindakan" class="block text-sm font-semibold text-gray-700">Penjadwalan</label>
                            <select id="jadwal-tindakan" name="jadwal-tindakan" autocomplete="jadwal-tindakan" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option selected>--- Pilih salah satu ---</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-10">
                <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batal</button>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- End Card Blog -->

@endsection
