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
        <div class="md:grid md:grid-cols-4 md:gap-10">
            <div class="md:col-span-1">
                <h3 class="text-xl font-bold leading-6 text-gray-900 uppercase">Informasi Pribadi</h3>
                <p class="mt-3 text-md text-gray-500">Berisi seluruh data pribadi yang disimpan oleh aplikasi SIMRS Khanza.</p>
                <p class="mt-2 text-md text-gray-500">Untuk melakukan perubahan atau penghapusan data ini, silakan hubungi instansi terkait.</p>
            </div>
            <div class="mt-5 md:col-span-3 md:mt-0">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->nama }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nomor_medis" class="block text-sm font-semibold text-gray-700">Nomor Rekam Medis</label>
                        <input type="text" name="nomor_medis" id="nomor_medis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->nomor_medis }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nomor_ktp" class="block text-sm font-semibold text-gray-700">Nomor KTP / NIK</label>
                        <input type="text" name="nomor_ktp" id="nomor_ktp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->nomor_ktp }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nomor_bpjs" class="block text-sm font-semibold text-gray-700">Nomor BPJS / Asuransi</label>
                        <input type="text" name="nomor_bpjs" id="nomor_bpjs" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->nomor_bpjs }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 2xl:col-span-1">
                        <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->jenis_kelamin }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 2xl:col-span-3">
                        <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->tempat_lahir }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ (new IntlDateFormatter("id_ID",IntlDateFormatter::LONG,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"dd MMMM yyyy'"))->format(new DateTime($pasien->tanggal_lahir)) }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 2xl:col-span-1">
                        <label for="golongan_darah" class="block text-sm font-semibold text-gray-700">Golongan Darah</label>
                        <input type="text" name="golongan_darah" id="golongan_darah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->golongan_darah }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2 2xl:col-span-1">
                        <label for="pendidikan" class="block text-sm font-semibold text-gray-700">Pendidikan</label>
                        <input type="text" name="pendidikan" id="pendidikan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->pendidikan }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="agama" class="block text-sm font-semibold text-gray-700">Agama</label>
                        <input type="text" name="agama" id="agama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->agama }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="status_nikah" class="block text-sm font-semibold text-gray-700">Status Pernikahan</label>
                        <input type="text" name="status_nikah" id="status_nikah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->status_nikah }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="pekerjaan" class="block text-sm font-semibold text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->pekerjaan }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="telepon" class="block text-sm font-semibold text-gray-700">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->telepon }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="nama_ibu" class="block text-sm font-semibold text-gray-700">Nama Ibu</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->nama_ibu }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 lg:col-span-4">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat Domisili</label>
                        <input type="text" name="alamat" id="alamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->alamat }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-3 2xl:col-span-2">
                        <label for="kelurahan" class="block text-sm font-semibold text-gray-700">Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->kelurahan }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-3 2xl:col-span-2">
                        <label for="kecamatan" class="block text-sm font-semibold text-gray-700">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->kecamatan }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 2xl:col-span-2">
                        <label for="kabupaten" class="block text-sm font-semibold text-gray-700">Kota / Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->kabupaten }}" disabled="disabled">
                    </div>

                    <div class="col-span-6 sm:col-span-3 2xl:col-span-2">
                        <label for="provinsi" class="block text-sm font-semibold text-gray-700">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm disabled:bg-gray-200" value="{{ $pasien->provinsi }}" disabled="disabled">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-emerald-100 px-4 py-5 shadow sm:rounded-lg sm:p-8 mt-10">
        <div class="md:grid md:grid-cols-4 md:gap-10">
            <div class="md:col-span-1 mb-5">
                <h3 class="text-xl font-bold leading-6 text-gray-900 uppercase">Riwayat Perawatan</h3>
                <div class="mt-3 text-md text-gray-500">Berisi linimasa pemeriksaan kesehatan yang diterima pasien.</div>
            </div>

            <div class="mt-10 md:col-span-3 md:mt-0">
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($periksa as $p)
                        <!-- Card -->
                        <div class="group flex flex-col h-full bg-emerald-200 border border-gray-200 shadow-sm rounded-xl">
                            <div class="h-20 flex flex-col justify-center px-5 bg-emerald-500 rounded-t-xl text-white leading-tight">
                                <div class="text-base font-medium">
                                    {{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::SHORT,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy 'pukul' HH.mm z"))->format(new DateTime($p->tanggal_registrasi.' '.$p->jam_registrasi)) }}
                                </div>
                            </div>
                            <div class="p-4 hover:bg-emerald-300 hover:rounded-b-xl">
                                <a href="{{ route('admin.rekam_medis.detail', [base64_encode($pasien->nomor_medis), base64_encode($p->nomor_rawat)]) }}">
                                    <h3 class="text-sm text-center font-semibold text-emerald-700">
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
        </div>
    </div>
</div>
<!-- End Card Blog -->
@endsection
