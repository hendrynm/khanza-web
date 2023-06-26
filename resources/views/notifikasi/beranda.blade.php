@extends('_master.app')
@section('fitur', 'Notifikasi')
@section('menu', 'Beranda')
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-purple-600">Notifikasi WhatsApp</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Section -->
<div class="max-w-[85rem] px-4 pt-10 pb-5 sm:px-6 lg:px-8 lg:pt-10 lg:pb-5 mx-auto">
    <div class="">
        <button id="kirim-pesan-pengingat" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Kirim Pesan Pengingat
        </button>

        <button id="kirim-pesan-rekap" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Kirim Pesan Rekap
        </button>
    </div>
</div>
<!-- End Card Section -->

@endsection

@push('script')

<script type="module">
    $(document).ready(function() {
        $('#kirim-pesan-reservasi').on('click', function() {
            $.ajax({
                url: "{{ route('ajax.notifikasi.reservasi') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                }
            });
        })

        $('#kirim-pesan-rekap').on('click', function() {
            $.ajax({
                url: "{{ route('ajax.notifikasi.rekap') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                }
            });
        })
    });
</script>

@endpush
