@extends('_master.publik')
@section('fitur', 'Loket')
@section('menu', 'Tampilkan Loket')
@push('style')
<style>
    @keyframes geser-ke-kanan {
        0% {
            opacity: 1;
            transform: translateX(-80%);
        }
        100% {
            opacity: 1;
            transform: translateX(80%);
        }
    }

    .begron-kedip {
        animation: begron-kedip 1s linear 15;
    }

    .panah-gerak {
        animation: geser-ke-kanan 1.5s linear 10;
    }

</style>
@endpush

@section('konten')

<div class="grid grid-rows-12 grid-cols-12 h-screen w-screen overflow-hidden">
    <div class="flex p-5 items-center justify-center row-span-2 col-span-1 bg-cyan-100">
        <img src="data:image/jpeg;base64,{{ $setting->logo }}" alt="logo" class="h-fit w-fit object-cover">
    </div>

    <div class="flex flex-col p-5 items-center justify-center row-span-2 col-span-8 bg-cyan-100">
        <div class="text-3xl 2xl:text-5xl font-bold text-blue-600">{{ $setting->nama }}</div>
    </div>

    <div class="flex flex-col p-5 items-center justify-center row-span-2 col-span-3 bg-blue-900 text-white leading-none">
        <span class="tanggal text-xl 2xl:text-2xl"></span>
        <span class="jam font-bold text-6xl 2xl:text-7xl"></span>
    </div>

    <div class="flex p-5 items-center justify-center row-span-9 col-span-7 bg-blue-100">
        <div class="flex flex-row h-full w-full items-center hidden begron-1 tampil-antrean">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[35vw] items-center justify-center z-10 begron-1">
                <h3 class="text-4xl 2xl:text-6xl text-center font-semibold text-blue-500 leading-none grid-1">
                    Nomor <div class="text-10xl 2xl:text-12xl" id="nomor-grid-1">A000</div>
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[8vw] items-center justify-center">
                <div class="text-center font-semibold text-gray-500 panah">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-40 h-40 2xl:w-52 2xl:h-52">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[17vw] items-center justify-center z-10 begron-1">
                <h3 class="text-4xl 2xl:text-6xl text-center font-semibold text-blue-500 leading-none grid-1">
                    Loket <div class="text-10xl 2xl:text-12xl" id="loket-grid-1">0</div>
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="flex flex-row h-full w-full items-center gambar-antre">
            <img src="data:image/jpeg;base64,{{ $run_text->gambar }}" alt="Gambar" class="h-full w-[100%] object-cover">
        </div>
        <!-- End Grid -->
    </div>

    <div class="flex flex-col items-center justify-center row-span-9 col-span-5 bg-blue-100 h-full">
        <!-- Grid -->
        <div class="flex flex-row h-full w-full items-center">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[25vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none">
                    Nomor <div class="text-8xl 2xl:text-9xl" id="nomor-grid-2">A000</div>
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[7vw] items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-28 h-28">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[13vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none grid-1">
                    Loket <div class="text-8xl 2xl:text-9xl" id="loket-grid-2">0</div>
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="flex flex-row h-full w-full items-center">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[25vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none">
                    Nomor <div class="text-8xl 2xl:text-9xl" id="nomor-grid-3">A000</div>
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[7vw] items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-28 h-28">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[13vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none">
                    Loket <div class="text-8xl 2xl:text-9xl" id="loket-grid-3">0</div>
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="flex flex-row h-full w-full items-center">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[25vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none">
                    Nomor <div class="text-8xl 2xl:text-9xl" id="nomor-grid-4">A000</div>
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[7vw] items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-28 h-28">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[13vw] items-center justify-center">
                <h3 class="text-2xl 2xl:text-3xl text-center font-semibold text-blue-500 leading-none">
                    Loket <div class="text-8xl 2xl:text-9xl" id="loket-grid-4">0</div>
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>

    <div class="flex p-5 items-center justify-center row-span-1 col-span-12 bg-blue-800 marquee">
        <div class="text-white text-4xl 2xl:text-5xl whitespace-nowrap leading-none font-semibold uppercase">{{ $run_text->teks }}</div>
    </div>
</div>

@endsection

@push('script')
<script type="module">
    const id_nomor_grid_1 = $('#nomor-grid-1');
    const id_loket_grid_1 = $('#loket-grid-1');
    const id_nomor_grid_2 = $('#nomor-grid-2');
    const id_loket_grid_2 = $('#loket-grid-2');
    const id_nomor_grid_3 = $('#nomor-grid-3');
    const id_loket_grid_3 = $('#loket-grid-3');
    const id_nomor_grid_4 = $('#nomor-grid-4');
    const id_loket_grid_4 = $('#loket-grid-4');

    $(document).ready(function () {
        cek_antrean_baru();
        setInterval(function(){cek_antrean_baru()}, 15000);
        jalankan_marquee();
        updateTime();
        setInterval(updateTime, 1000);
    });

    let serverTime = new Date();

    function updateTime() {
        serverTime = new Date(serverTime.getTime() + 1000);
        $(".jam").html(serverTime.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" }));
        $(".tanggal").html(serverTime.toLocaleString("id-ID", { dateStyle: "full" }))
    }

    function jalankan_marquee(){
        $('.marquee').marquee({
            duration: 10000,
        });
    }

    function cek_antrean_baru() {
        $.ajax('/ajax/uji').done(async function (data) {
            if(data.is_nomor_baru === true){
                let huruf = data.data.kode_loket;
                let nomor = data.data.nomor_antrean;
                let loket = data.data.nomor_loket;

                console.log('Antrean baru diterima');
                tampilkan_nomor_sekarang(huruf, nomor, loket);
                buat_kedipan();
                await putar_suara_nomor_loket(huruf, nomor, loket);
                pindahkan_antrean_lama_ke_bawah();
            }
            else {
                console.log('Tidak ada antrean baru');
            }
        });
    }

    function tampilkan_nomor_sekarang(huruf, nomor, loket){
        id_nomor_grid_1.text(huruf+nomor);
        id_loket_grid_1.text(loket);
    }

    function buat_kedipan(){
        $('.gambar-antre').addClass('hidden');
        $('.tampil-antrean').removeClass('hidden');
        $('.panah').addClass('panah-gerak');
        $('.begron-1').addClass('begron-kedip');
        setTimeout(hapus_kedipan, 12000)
    }

    function hapus_kedipan() {
        $('.gambar-antre').removeClass('hidden');
        $('.tampil-antrean').addClass('hidden');
        $('.panah').removeClass('panah-gerak');
        $('.begron-1').removeClass('begron-kedip');
    }

    function pindahkan_antrean_lama_ke_bawah(){
        let nomor_grid_1 = id_nomor_grid_1.text().trim();
        let loket_grid_1 = id_loket_grid_1.text().trim();
        let nomor_grid_2 = id_nomor_grid_2.text().trim();
        let loket_grid_2 = id_loket_grid_2.text().trim();
        let nomor_grid_3 = id_nomor_grid_3.text().trim();
        let loket_grid_3 = id_loket_grid_3.text().trim();

        id_nomor_grid_4.text(nomor_grid_3);
        id_loket_grid_4.text(loket_grid_3);
        id_nomor_grid_3.text(nomor_grid_2);
        id_loket_grid_3.text(loket_grid_2);
        id_nomor_grid_2.text(nomor_grid_1);
        id_loket_grid_2.text(loket_grid_1);
    }

    async function putar_suara_nomor_loket(huruf, nomor, loket){
        await putar_lonceng();
        await putar_suara_panggilan();
        await putar_suara_huruf(huruf);
        await putar_suara_nomor(nomor);
        await putar_suara_silakan();
        await putar_suara_nomor(loket);
    }

    const suara_satuan = ['', '{{ asset('suara-loket/Satu.mp3') }}', '{{ asset('suara-loket/Dua.mp3') }}', '{{ asset('suara-loket/Tiga.mp3') }}', '{{ asset('suara-loket/Empat.mp3') }}', '{{ asset('suara-loket/Lima.mp3') }}', '{{ asset('suara-loket/Enam.mp3') }}', '{{ asset('suara-loket/Tujuh.mp3') }}', '{{ asset('suara-loket/Delapan.mp3') }}', '{{ asset('suara-loket/Sembilan.mp3') }}', '{{ asset('suara-loket/Sepuluh.mp3') }}', '{{ asset('suara-loket/Sebelas.mp3') }}'];
    const suara_huruf = ['{{ asset('suara-loket/A.mp3') }}', '{{ asset('suara-loket/B.mp3') }}', '{{ asset('suara-loket/C.mp3') }}', '{{ asset('suara-loket/D.mp3') }}', '{{ asset('suara-loket/E.mp3') }}', '{{ asset('suara-loket/F.mp3') }}', '{{ asset('suara-loket/G.mp3') }}', '{{ asset('suara-loket/H.mp3') }}', '{{ asset('suara-loket/I.mp3') }}', '{{ asset('suara-loket/J.mp3') }}', '{{ asset('suara-loket/K.mp3') }}', '{{ asset('suara-loket/L.mp3') }}', '{{ asset('suara-loket/M.mp3') }}', '{{ asset('suara-loket/N.mp3') }}', '{{ asset('suara-loket/O.mp3') }}', '{{ asset('suara-loket/P.mp3') }}', '{{ asset('suara-loket/Q.mp3') }}', '{{ asset('suara-loket/R.mp3') }}', '{{ asset('suara-loket/S.mp3') }}', '{{ asset('suara-loket/T.mp3') }}', '{{ asset('suara-loket/U.mp3') }}', '{{ asset('suara-loket/V.mp3') }}', '{{ asset('suara-loket/W.mp3') }}', '{{ asset('suara-loket/X.mp3') }}', '{{ asset('suara-loket/Y.mp3') }}', '{{ asset('suara-loket/Z.mp3') }}'];
    const suara_belas = new Audio('{{ asset('suara-loket/Belas.mp3') }}');
    const suara_puluh = new Audio('{{ asset('suara-loket/Puluh.mp3') }}');
    const suara_seratus = new Audio('{{ asset('suara-loket/Seratus.mp3') }}');
    const suara_ratus = new Audio('{{ asset('suara-loket/Ratus.mp3') }}');
    const suara_panggilan = new Audio('{{ asset('suara-loket/Panggilan.mp3') }}');
    const suara_silakan = new Audio('{{ asset('suara-loket/Silakan.mp3') }}');
    const suara_lonceng = new Audio('{{ asset('suara-loket/Lonceng.mp3') }}');
    const audio_context = new AudioContext();

    async function putar_berkas_suara(audio) {
        const response = await fetch(audio.src);
        const array_buffer = await response.arrayBuffer();
        const buffer = await audio_context.decodeAudioData(array_buffer);

        // Menghitung panjang audio yang akan dipotong
        const cut_start_length = Math.floor(audio_context.sampleRate * 0.15);
        const cut_end_length = Math.floor(audio_context.sampleRate * 0.6);

        // Membuat buffer baru dengan panjang yang lebih pendek
        const new_buffer = audio_context.createBuffer(
            buffer.numberOfChannels,
            buffer.length - cut_start_length - cut_end_length,
            buffer.sampleRate
        );

        // Menyalin saluran audio ke buffer baru
        for (let i = 0; i < buffer.numberOfChannels; i++) {
            const channel_data = buffer.getChannelData(i);
            const new_channel_data = new_buffer.getChannelData(i);
            new_channel_data.set(channel_data.subarray(cut_start_length, buffer.length - cut_end_length));
        }

        // Membuat source baru dan menghubungkannya ke destination
        const source = audio_context.createBufferSource();
        source.buffer = new_buffer;
        source.connect(audio_context.destination);
        source.start();

        // Mengembalikan promise yang resolve ketika audio sudah selesai diputar
        return new Promise((resolve) => {
            source.onended = resolve;
        });
    }

    async function putar_lonceng() {
        await putar_berkas_suara(suara_lonceng);
    }

    async function putar_suara_panggilan() {
        await putar_berkas_suara(suara_panggilan);
    }

    async function putar_suara_silakan() {
        await putar_berkas_suara(suara_silakan);
    }

    async function putar_suara_huruf(huruf){
        let index = huruf.charCodeAt(0) - 65;

        await putar_berkas_suara(new Audio(suara_huruf[index]));
    }

    async function putar_suara_nomor(nomor_string) {
        let nomor = parseInt(nomor_string);

        if (nomor === 0) {
            // don't doing what-what
        } else if (nomor <= 11) {
            await putar_berkas_suara(new Audio(suara_satuan[nomor]));
        } else if (nomor <= 19) {
            await putar_berkas_suara(new Audio(suara_satuan[nomor - 10]));
            await putar_berkas_suara(suara_belas);
        } else if (nomor <= 99) {
            await putar_berkas_suara(new Audio(suara_satuan[Math.floor(nomor / 10)]));
            await putar_berkas_suara(suara_puluh);
            await putar_suara_nomor(nomor % 10);
        } else if (nomor <= 199) {
            await putar_berkas_suara(suara_seratus);
            await putar_suara_nomor(nomor - 100);
        } else if (nomor <= 999) {
            await putar_berkas_suara(new Audio(suara_satuan[Math.floor(nomor / 100)]));
            await putar_berkas_suara(suara_ratus);
            await putar_suara_nomor(nomor % 100);
        }
    }

</script>
@endpush
