@extends('_master.app')
@section('fitur', 'Tindakan')
@section('menu', 'Jadwal Poliklinik')
@push('style')
<style>
    .fc-toolbar-title {
        font-weight: 600 !important;
        font-size: 1.5rem !important;
    }
    .fc-scrollgrid-sync-inner {
        display: inline-flex !important;
        justify-content: center !important;
        align-items: center !important;
        height: 3rem !important;
    }
    .fc-col-header-cell-cushion {
        font-weight: 400 !important;
    }
    .fc-timegrid-slot-label-cushion {
        display: flex !important;
        margin-top: -2.6rem !important;
        font-size: 0.8rem !important;
        font-weight: bold !important;
        width: 2.75rem !important;
    }
    .fc-button {
        font-size: 0.8rem !important;
    }
    .fc-timegrid-now-indicator-line {
        border: solid 2px red !important;
    }
    .fc-timegrid-now-indicator-arrow {
        border-top: 7px solid transparent !important;
        border-bottom: 7px solid transparent !important;
        border-left: 12px solid red !important;
    }
    .fc-highlight:after {
        content: 'Pilih waktu ini' !important;
    }
    :root {
        --fc-today-bg-color: white !important;
    }
</style>
@endpush
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-red-600">Pilih Jadwal Poliklinik</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>ketersediaan jadwal</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <span class="block lg:hidden text-red-500">Bantuan: Gulir / Scroll pada bagian waktu agar mudah bergeser ke bawah.</span>
    <livewire:reservasi-pasien :uuid_ruang="last(request()->segments())"/>
</div>
<!-- End Card Blog -->

@endsection

@section('modal')
<form action="{{ route('admin.tindakan.jadwal.konfirmasi') }}" method="post">
    @csrf
    <input type="hidden" id="waktu_dipilih" name="waktu_dipilih">
    <input type="hidden" id="uuid_ruang" name="uuid_ruang" value="{{ last(request()->segments()) }}">
    <input type="hidden" id="kode_dokter" name="kode_dokter">
    <input type="hidden" id="nomor_medis" name="nomor_medis" value="{{ request()->segment(count(request()->segments())-2) }}">

    <div id="hs-large-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 overflow-x-hidden overflow-y-auto z-[60]">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-6xl lg:w-full m-3 lg:mx-auto">
            <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
            <div class="flex items-center min-h-full">
                <div class="flex flex-col bg-red-100 p-3 border shadow-sm rounded-xl h-[90vh] w-screen z-[70]">
                    <div class="flex justify-between items-center py-3 px-4 border-b">
                        <h3 class="font-bold text-gray-800 text-2xl">
                            Jadwal Ketersediaan <span class="text-red-500"></span>
                        </h3>
                        <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm" data-hs-overlay="#hs-large-modal">
                            <span class="sr-only">Close</span>
                            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5 overflow-y-auto h-full w-full">
                        <div id="calendar" class="bg-white rounded-2xl h-full"></div>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button" class="hs-dropdown-toggle py-3 px-4 mr-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-600 transition-all text-sm" data-hs-overlay="#hs-large-modal">
                            Tutup
                        </button>
                        <button class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm disabled:bg-red-300" href="#" type="submit" disabled="disabled" id="tombol-submit">
                            Buat Reservasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<script type="module">
    let calendar;

    $('.modal-jadwal-dokter').on('click', function() {
        document.getElementById("tombol-submit").disabled = true;
        let kode_dokter = this.getAttribute('kode-dokter');
        (calendar) ? calendar.destroy() : '';
        if (window.innerWidth <= 768) {
            tampilkan_kalender(0, kode_dokter).then(() => {
                ubah_tampilan_tanggal();
            });
        } else {
            tampilkan_kalender(1, kode_dokter).then(() => {
                ubah_tampilan_tanggal();
            });
        }
    });

    function ubah_tampilan_tanggal(){
        const text_tanggal = document.getElementsByClassName("fc-col-header-cell-cushion");
        for (let item of text_tanggal) {
            let text = item.innerText.split(" ");
            let hari = '<span class="fc-hari text-gray-500">' + text[0];
            let tgl = ' <span class="fc-tgl text-gray-900 font-bold">' + text[1];
            item.innerHTML = hari + tgl + '</span></span>';
        }
    }

    function tampilkan_kalender(tipe, kode_dokter) {
        const calendarEl = document.getElementById("calendar");
        let today = new Date();
        let startDate = new Date(today.getTime());
        let endDate = new Date(startDate.getTime() + (6 * 24 * 60 * 60 * 1000));

        return new Promise((resolve, reject) => {
            $.ajax({
                url: "{{ route('ajax.reservasi.cek_ketersediaan_dokter') }}",
                type: "POST",
                dataType: "json",
                data: {
                    uuid_ruang: '{{ last(request()->segments()) }}',
                    kode_dokter: kode_dokter,
                },
                success: function(hasil) {
                    let data = hasil.data;
                    let event = [];

                    Object.values(data.tersedia).forEach(function (item) {
                        event.push({
                            start: item.tanggal + 'T' + item.waktu_mulai,
                            end: item.tanggal + 'T' + item.waktu_selesai,
                            rendering: 'background',
                            display: 'background',
                        });
                    });

                    Object.values(data.penuh).forEach(function (item) {
                        event.push({
                            title: 'TERISI',
                            start: item.tanggal + 'T' + item.waktu_mulai,
                            end: item.tanggal + 'T' + item.waktu_selesai,
                        });
                    });

                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: (tipe === 0) ? "timeGridDay" : "timeGrid",
                        selectable: true,
                        selectLongPressDelay: 1,
                        visibleRange: {
                            start: startDate,
                            end: endDate
                        },
                        validRange: {
                            start: startDate,
                            end: endDate
                        },
                        headerToolbar: {
                            left: (tipe === 0) ? 'title,prev,next' : 'title',
                            right: false,
                        },
                        locale: "id",
                        events: event,
                        nowIndicator: true,
                        allDaySlot: false,
                        titleFormat: {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        },
                        buttonText: {
                            prev: "Sebelumnya",
                            today: "Hari ini",
                            next: "Berikutnya"
                        },
                        slotMinTime: "07:00:00",
                        slotMaxTime: "21:15:00",
                        slotDuration: '00:15:00',
                        slotLabelFormat: {
                            hour: 'numeric',
                            minute: '2-digit',
                            omitZeroMinute: false,
                            meridiem: 'short'
                        },
                        expandRows: true,
                        dayHeaderFormat: {
                            weekday: 'short',
                            day: 'numeric',
                            omitCommas: true
                        },
                        defaultTimedEventDuration: '00:15:00',
                        eventMinHeight: 50,
                        select: function(info) {
                            document.getElementById('waktu_dipilih').value = info.startStr;
                            document.getElementById('kode_dokter').value = kode_dokter;
                            document.getElementById('tombol-submit').disabled = false;
                        },
                    });

                    calendar.render();
                    resolve();
                },
                error: function() {
                    alert("Terjadi kesalahan pengambilan data dari server, silahkan refresh halaman");
                    reject();
                }
            });
        });
    }

</script>
@endpush
