@extends('_master.app')
@section('fitur', 'Loket')
@section('menu', 'Atur Loket')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-blue-600">Atur Loket</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>loket</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<div>
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
        <livewire:loket uuid="{{ last(request()->segments()) }}"/>
    </div>
    <!-- End Card Section -->
</div>

@endsection
