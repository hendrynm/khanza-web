@extends('_master.publik')
@section('fitur', 'Selamat Datang')
@section('menu', 'Daftar')

@section('konten')

<div class="flex justify-center items-center bg-gray-100">
    <div class="my-7 bg-white border border-gray-200 rounded-xl shadow-sm w-fit">
        <div class="p-4 sm:p-7 w-[90vw] md:w-[75vw]">
            <span class="font-semibold text-2xl text-cyan-500">Pendaftaran Akun Baru</span>

            <!-- Form -->
            <form action="{{ route('publik.daftar') }}" method="post" class="mt-5">
                @csrf

                <div class="grid lg:grid-cols-2 gap-5">
                    <!-- Form Group -->
                    <div>
                        <label for="nama" class="block mb-2 font-semibold text-cyan-500">Nama Peserta</label>
                        <div class="relative">
                            <input type="text" id="nama" name="nama" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan nama lengkap">
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div>
                        <label for="ktp" class="block mb-2 font-semibold text-cyan-500">Nomor KTP</label>
                        <div class="relative">
                            <input type="text" id="ktp" name="ktp" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan nomor KTP">
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <div class="grid grid-cols-3 gap-5">
                        <!-- Form Group -->
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 font-semibold text-cyan-500">Jenis Kelamin</label>
                            <div class="relative">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="gologan_darah" class="block mb-2 font-semibold text-cyan-500">Golongan Darah</label>
                            <div class="relative">
                                <select id="gologan_darah" name="gologan_darah" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="pendidikan" class="block mb-2 font-semibold text-cyan-500">Pendidikan</label>
                            <div class="relative">
                                <select id="pendidikan" name="pendidikan" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SLTA/SEDERAJAT">SMA/SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                    <option value="-">Tidak Sekolah</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <!-- Form Group -->
                        <div>
                            <label for="tempat_lahir" class="block mb-2 font-semibold text-cyan-500">Tempat Lahir</label>
                            <div class="relative">
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan tempat lahir">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div>
                            <label for="tanggal_lahir" class="block mb-2 font-semibold text-cyan-500">Tanggal Lahir</label>
                            <div class="relative">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                            </div>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div>
                        <label for="nama_ibu" class="block mb-2 font-semibold text-cyan-500">Nama Ibu Kandung</label>
                        <div class="relative">
                            <input type="text" id="nama_ibu" name="nama_ibu" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan nama ibu kandung">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div>
                        <label for="alamat" class="block mb-2 font-semibold text-cyan-500">Alamat</label>
                        <div class="relative">
                            <input type="text" id="alamat" name="alamat" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan alamat rumah">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label for="kelurahan" class="block mb-2 font-semibold text-cyan-500">Kelurahan</label>
                            <select id="kelurahan" name="kelurahan" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 select2" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach($kelurahan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="kecamatan" class="block mb-2 font-semibold text-cyan-500">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 select2" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach($kecamatan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label for="kabupaten" class="block mb-2 font-semibold text-cyan-500">Kabupaten / Kota</label>
                            <select id="kabupaten" name="kabupaten" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 select2" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach($kabupaten as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="provinsi" class="block mb-2 font-semibold text-cyan-500">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500 select2" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                @foreach($provinsi as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div>
                        <label for="pekerjaan" class="block mb-2 font-semibold text-cyan-500">Pekerjaan</label>
                        <div class="relative">
                            <input type="text" id="pekerjaan" name="pekerjaan" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan pekerjaan">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <!-- Form Group -->
                        <div>
                            <label for="status_nikah" class="block mb-2 font-semibold text-cyan-500">Status Nikah</label>
                            <div class="relative">
                                <select id="status_nikah" name="status_nikah" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="BELUM MENIKAH">Belum Menikah</option>
                                    <option value="MENIKAH">Menikah</option>
                                    <option value="JANDA">Janda</option>
                                    <option value="DHUDA">Dhuda</option>
                                    <option value="JOMBLO">Jomblo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Form Group -->
                        <div>
                            <label for="telepon" class="block mb-2 font-semibold text-cyan-500">Telepon</label>
                            <div class="relative">
                                <input type="text" id="telepon" name="telepon" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mt-7">
                    <button type="submit" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-cyan-500 text-white hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Daftar
                    </button>
                </div>
            </form>
            <!-- End Form -->

            <div class="mt-5 text-center text-sm text-gray-600">
                Sudah memiliki akun?
                <a class="text-cyan-500 decoration-2 hover:underline font-semibold" href="/">
                    Masuk di sini
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">

<script type="module">
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush
