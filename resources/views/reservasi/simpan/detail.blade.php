@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Detail Reservasi')

@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Detail Reservasi</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>data</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <livewire:pasien-reservasi uuid="{{ last(request()->segments()) }}"/>
</div>
<!-- End Card Blog -->

@endsection
