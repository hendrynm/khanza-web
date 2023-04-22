@extends('_master.publik')
@section('fitur', 'Error')
@section('menu', '404')
@section('konten')

<div class="max-w-[50rem] flex flex-col mx-auto w-full h-full">
    <header class="mb-auto flex justify-center z-50 w-full py-4">
        <nav class="px-4 sm:px-6 lg:px-8" aria-label="Global">
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('logo khanza-web mini.png') }}" width="100">
                <a class="flex-wrap p-0 text-4xl font-bold text-cyan-500" href="{{ route('admin.beranda') }}" aria-label="Brand">Khanza Plus</a>
            </div>
        </nav>
    </header>

    <div class="text-center py-5 px-4 sm:px-6 lg:px-8">
        <div class="block text-7xl font-bold text-red-500 sm:text-9xl">404</div>
        <div class="block text-3xl font-bold text-red-700">Ups, ada yang salah.</div>
        <div class="py-5 text-gray-600">Maaf, kami tidak menemukan halaman yang Anda minta.</div>
        <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
            <a class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-blue-500 hover:text-blue-700 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-lg py-3 px-4" href="{{ route('admin.beranda') }}">
                <svg class="w-4 h-4" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <footer class="mt-auto text-center py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-sm text-gray-500">© 2023. Hak Cipta dilindungi oleh Undang-undang.</p>
        </div>
    </footer>
</div>

@endsection
