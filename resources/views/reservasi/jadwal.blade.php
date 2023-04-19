@extends('_master.app')
@section('fitur', 'Reservasi')
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
        font-weight: 400;
    }
    .fc-timegrid-slot-label-cushion {
        display: flex !important;
        margin-top: -2.6rem !important;
        font-size: 0.8rem !important;
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
        content: 'Pilih waktu ini';
    }
    :root {
        --fc-today-bg-color: white !important;
    }
</style>
@endpush
@section('konten')

<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-amber-600">Pilih Jadwal Poliklinik</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>ketersediaan jadwal</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <button id="modal_jadwal_dokter" type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-amber-500 text-white hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all text-sm" data-hs-overlay="#hs-large-modal">
        Lihat Jadwal
    </button>
</div>
<!-- End Card Blog -->

@endsection

@section('modal')
<div id="hs-large-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-6xl lg:w-full m-3 lg:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl h-[40rem]">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="font-bold text-gray-800 text-2xl">
                    Jadwal Ketersediaan: <span class="text-amber-500">Dr. Sutomo, S.Pd., M.Pd.I.</span>
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
                <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm" data-hs-overlay="#hs-large-modal">
                    Tutup
                </button>
                <a class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-amber-500 text-white hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all text-sm" href="#">
                    Buat Reservasi
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<script type="module">
    let calendar;
    // document.addEventListener('DOMContentLoaded', function() {
    //     tampilkan_kalender();
    //     ubah_tampilan_tanggal();
    // });

    $('#modal_jadwal_dokter').on('click', function() {
        (calendar) ? calendar.destroy() : '';
        tampilkan_kalender();
        ubah_tampilan_tanggal();
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

    function tampilkan_kalender(){
        const calendarEl = document.getElementById("calendar");
        var today = new Date();
        var startDate = new Date(today.getTime());
        var endDate = new Date(startDate.getTime() + (6 * 24 * 60 * 60 * 1000));
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: "timeGrid",
            selectable: true,
            visibleRange: {
                start: startDate,
                end: endDate
            },
            headerToolbar: {
                left: 'title',
                right: false,
            },
            locale: "id",
            events: 'https://fullcalendar.io/api/demo-feeds/events.json',
            nowIndicator: true,
            allDaySlot: false,
            titleFormat: { year: 'numeric', month: 'long', day: 'numeric' },
            buttonText: {
                prev: "Sebelumnya",
                today: "Hari ini",
                next: "Berikutnya"
            },
            slotMinTime: "08:00:00",
            slotMaxTime: "21:15:00",
            slotDuration: '00:15:00',
            slotLabelFormat: {
                hour: 'numeric',
                minute: '2-digit',
                omitZeroMinute: false,
                meridiem: 'short'
            },
            expandRows: true,
            dayHeaderFormat: { weekday: 'short', day: 'numeric', omitCommas: true },
            defaultTimedEventDuration: '00:15:00',
            eventMinHeight: 50,
            // datesSet: function(info) {
            //     const tombol_kalender = calendarEl.querySelectorAll('.fc-button');
            //     for (let item of tombol_kalender){
            //         item.addEventListener('click', function () {
            //             ubah_tampilan_tanggal();
            //         });
            //     }
            // },
        });

        calendar.render();
    }
</script>
@endpush
