@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Ubah Loket')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Ubah Loket</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan mengisi <b>formulir</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<div>
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-20 border rounded-xl">
            <!-- Card -->
            <div class="p-10">
                <h2 class="text-2xl font-semibold text-blue-500">
                    Panduan Pengisian
                </h2>

                <x-panduan-loket-loket/>
            </div>

            <div class="bg-blue-100 p-10">
                <form action="" method="post">
                    <x-loket-loket :ruang="$ruang" :warna="$warna" :loket="$loket"/>
                </form>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</div>

@endsection
