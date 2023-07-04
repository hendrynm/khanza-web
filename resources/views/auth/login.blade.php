@extends('_master.publik')
@section('fitur', 'Selamat Datang')
@section('menu', 'Masuk')

@section('konten')

<div class="flex justify-center items-center h-screen w-screen bg-gray-100">
    <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm w-fit">
        <div class="p-4 sm:p-7 w-[90vw] md:w-[60vw] lg:w-[40vw] 2xl:w-[30vw]">
            <div class="flex justify-center">
                <div class="flex pl-7 pr-3 py-3 mb-3 justify-center w-[17rem]">
                    <div class="ml-2 mr-5">
                        <img src="{{ asset('logo khanza-web mini.png') }}" width="100" alt="logo khanza plus">
                    </div>
                    <div class="text-left">
                        <span class="flex-wrap text-3xl font-bold text-cyan-500" aria-label="Brand" style="line-height: 1">Khanza Plus</span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('publik.login') }}" method="post" class="mt-5">
                @csrf

                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                        <label for="nama_pengguna" class="block mb-2 font-semibold text-cyan-500">Nomor Peserta / Nomor Induk Dokter </label>
                        <div class="relative">
                            <input type="text" id="nama_pengguna" name="nama_pengguna" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan nomor peserta atau nomor induk dokter">
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div>
                        <label for="kata_sandi" class="block mb-2 font-semibold text-cyan-500">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="kata_sandi" name="kata_sandi" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-cyan-500 focus:ring-cyan-500" required placeholder="Masukkan kata sandi">
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <button type="submit" class="mt-5 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-cyan-500 text-white hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-all text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Masuk
                    </button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>


@endsection
