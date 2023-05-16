@extends('_master.publik')
@section('fitur', 'Loket')
@section('menu', 'Tampilkan Loket')
@push('style')
<style>
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#animasi-panah-bawah {
    animation: animasi-panah-bawah linear 1.5s infinite;
}

@keyframes animasi-panah-bawah {
    0% {
        transform: translateY(-100%);
    }
    50% {
        transform: translateY(0%);
    }
    100% {
        transform: translateY(100%);
    }
}
</style>
@endpush

@section('konten')

<div class="grid grid-rows-12 grid-cols-12 h-screen w-screen overflow-hidden">
    <div class="flex p-5 items-center justify-center row-span-2 col-span-1 bg-white">
        <img src="data:image/jpeg;base64,{{ $setting->logo }}" alt="logo" class="h-fit w-fit object-cover">
    </div>

    <div class="flex flex-col p-5 items-center justify-center row-span-2 col-span-9 bg-white leading-tight">
        <div class="text-xl 2xl:text-3xl font-bold text-black uppercase">
            {{ $setting->nama }}
        </div>
        <div class="text-3xl 2xl:text-5xl font-bold text-blue-600 uppercase">
            {{ $ruang->nama_ruang }}
        </div>
    </div>

    <div class="flex flex-col p-5 items-center justify-center row-span-2 col-span-2 bg-blue-900 text-white leading-8">
        <span class="tanggal text-base 2xl:text-lg"></span>
        <span class="jam font-bold text-3xl 2xl:text-4xl"></span>
    </div>

    <div class="flex flex-col items-center justify-center row-span-9 col-span-12 h-full">
        <div class="grid grid-cols-6 2xl:grid-cols-7 p-10 gap-3 2xl:gap-5">
            @foreach($loket as $l)
                <button class="bg-blue-200 border shadow-sm rounded-xl hover:bg-blue-300 focus:border-2 focus:ring-4 focus:border-blue-700 cetak" id="loket-{{ $l->kode_loket }}">
                    @switch($l->bpjs)
                        @case(0)
                            <div class="bg-yellow-400 border-b rounded-t-xl py-2 px-4">
                                <div class="text-sm 2xl:text-base text-gray-600 text-center">
                                    Khusus Non-BPJS
                                </div>
                            </div>
                        @break(0)
                        @case(1)
                            <div class="bg-green-600 border-b rounded-t-xl py-2 px-4">
                                <div class="text-sm 2xl:text-base text-white text-center">
                                    Khusus BPJS
                                </div>
                            </div>
                        @break(1)
                        @default
                            <div class="bg-blue-600 border-b rounded-t-xl py-2 px-4">
                                <div class="text-sm 2xl:text-base text-white text-center">
                                    Umum & BPJS
                                </div>
                            </div>
                    @endswitch

                    <div class="flex flex-wrap h-20 2xl:h-28 p-4 items-center justify-center">
                        <div class="text-blue-600 text-xl 2xl:text-2xl font-semibold text-center leading-tight" id="nama-loket-{{ $l->kode_loket }}">
                            {{ $l->nama_loket }}
                        </div>
                    </div>
                    <div class="bg-blue-100 border-t rounded-b-xl py-2 px-4">
                        <div class="text-sm 2xl:text-base text-gray-600 text-center" id="sisa-antrean-{{ $l->kode_loket }}">
                            Belum dilayani: {{ $l->jumlah }}
                        </div>
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    <div class="flex p-5 items-center justify-center row-span-1 col-span-12 bg-blue-800 marquee">
        <div class="text-white text-4xl 2xl:text-5xl whitespace-nowrap leading-none font-semibold uppercase">{{ $run_text->teks }}</div>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="flex inset-0 -z-10 modal hidden">
    <div class="centered bg-white p-2 gap-y-1 leading-none modal-content">
        <div class="text-lg font-semibold text-center">{{ $setting->nama }}</div>
        <div class="text-sm font-medium text-center">{{ $setting->alamat }}</div>
        <div class="text-xs text-center">{{ $setting->kontak }}</div>
        <div class="text-center">========================</div>
        <div class="text-base font-medium text-center" id="loket-dicetak"></div>
        <div class="text-6xl font-bold text-center" id="nomor-dicetak"></div>
        <div class="text-center">========================</div>
        <div class="text-xxs text-center">Antrean ruang:<span id="ruang-dicetak"></span></div>
        <div class="text-xxs text-center">Dicetak pada: <span id="waktu-cetak"></span></div>
        <div class="text-xs text-center mt-2">Mohon menunggu nomor anda dipanggil.</div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="fixed inset-0 overflow-y-auto hidden" id="modal-cetak-berhasil">
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Latar belakang gelap -->
        <div class="fixed inset-0 bg-gray-500 opacity-75"></div>

        <!-- Konten modal -->
        <div class="flex flex-col items-center justify-center bg-white rounded-lg p-1 max-w-md mx-auto z-10">
            <div class="p-7 text-3xl font-bold text-center bg-white z-20 text-blue-600">
                Cetak Antrean BERHASIL
            </div>
            <div class="" id="animasi-panah-bawah">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-20 h-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                </svg>
            </div>
            <div id="teks-tertutup" class="py-7 text-sm text-gray-500 bg-white z-20"></div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script type="module">
    const modal = $('.modal-content');
    const id_ruang = {{ $ruang->id_ruang }};
    const cetak_nama = $('#loket-dicetak');
    const cetak_nomor = $('#nomor-dicetak');
    const cetak_ruang = $('#ruang-dicetak');
    const cetak_waktu = $('#waktu-cetak');
    const modal_berhasil = $('#modal-cetak-berhasil');
    const teks_tertutup = $('#teks-tertutup');

    let serverTime = new Date();

    $(document).ready(function () {
        jalankan_marquee();
        updateTime();
        setInterval(updateTime, 1000);
        $('.cetak').on('click', function (){
            let id = ($(this).attr('id'));
            let kode = id.split('-');
            let nama = $('#nama-loket-'+kode[1]).text();
            cetak_nomor_loket(kode[1], nama);
        });
    });

    function ubah_kertas(kode, nama, nomor) {
        cetak_nama.text();
        cetak_nomor.text();
        cetak_ruang.text();
        cetak_waktu.text();

        cetak_nama.text(nama);
        cetak_nomor.text(kode + nomor);
        cetak_ruang.text('{{ $ruang->nama_ruang }}');
        cetak_waktu.text(new Date().toLocaleString('id-ID', { dateStyle: 'long', timeStyle: 'long' }));
    }

    function ganti_sisa_antrean(kode) {
        let hasil = $.ajax('{{ route('ajax.antrean.cek_sisa_nomor') }}', {
            method: 'POST',
            data: {
                id_ruang: id_ruang,
                kode_loket: kode
            }
        }).done(function (hasil) {
            $('#sisa-antrean-'+kode).text('Belum dilayani: '+ hasil.data.sisa);
        });
    }

    function cek_nomor_antrean() {
        return new Promise(function (resolve, reject){
            $.ajax('{{ route('ajax.antrean.cek_nomor_sekarang',$ruang->id_ruang) }}')
                .done(function (hasil) {
                    return (hasil.status === 200) ?
                        resolve(hasil.data) :
                        reject(hasil.message);
                });
        });
    }

    function cetak_nomor_loket(kode, nama) {
        cek_nomor_antrean()
            .then(function(nomor) {
                Object.keys(nomor).forEach(index => {
                    var obj = nomor[index];
                    if (obj.kode_loket === kode) {
                        let terakhir = parseInt(obj.nomor_terakhir) + 1;
                        let nomor = terakhir.toString().padStart(3, '0');
                        ubah_kertas(kode, nama, nomor);
                        cetak();
                        $.ajax('{{ route('ajax.antrean.simpan_antrean') }}', {
                            method: 'POST',
                            data: {
                                kode_loket: kode,
                                nomor_antrean: nomor,
                                id_ruang: id_ruang
                            }
                        }).done(function (){
                            ganti_sisa_antrean(kode);
                        });
                    }
                });
            });
    }

    function cetak(){
        let style = `
        @page {
            size: 80mm 80mm;
            margin: 5mm;
        }
        :root {
            font-family: 'Inter', sans-serif;
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .text-center {
            text-align: center;
        }
        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }
        .p-2 {
            padding: 0.5rem/* 8px */;
        }
        .gap-y-1 {
            row-gap: 0.25rem/* 4px */;
        }
        .leading-none {
            line-height: 1;
        }
        .text-lg {
            font-size: 1.125rem/* 18px */;
        }
        .font-semibold {
            font-weight: 600;
        }
        .text-xs {
            font-size: .75rem/* 12px */;
        }
        .text-base {
            font-size: 1rem/* 16px */;
        }
        .font-medium {
            font-weight: 500;
        }
        .text-6xl {
            font-size: 3.75rem/* 60px */;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-xxs {
            font-size: .625rem/* 10px */;
        }
        .mt-2 {
            margin-top: 0.5rem/* 8px */;
        }
        `

        printJS({
            printable: modal.html(),
            type: 'raw-html',
            documentTitle: 'Nomor Antrian',
            style: style,
            autoClose: true,
            onPrintDialogClose: buka_modal_cetak_berhasil(),
        });
    }

    function buka_modal_cetak_berhasil() {
        modal_berhasil.removeClass('hidden');

        let secondsRemaining = 7;
        teks_tertutup.text(`Tertutup otomatis dalam ${secondsRemaining} detik`);

        const countdownInterval = setInterval(function() {
            teks_tertutup.text(`Tertutup otomatis dalam ${--secondsRemaining} detik`);
            if (secondsRemaining <= 0) {
                clearInterval(countdownInterval);
                tutup_modal_berhasil();
            }
        }, 1000);
    }

    function tutup_modal_berhasil(){
        modal_berhasil.addClass('hidden');
    }

    function updateTime() {
        serverTime = new Date(serverTime.getTime() + 1000);
        $(".jam").html(serverTime.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit", timeZoneName: "short" }));
        $(".tanggal").html(serverTime.toLocaleString("id-ID", { dateStyle: "full" }))
    }

    function jalankan_marquee(){
        $('.marquee').marquee({
            duration: 10000,
        });
    }
</script>
@endpush
