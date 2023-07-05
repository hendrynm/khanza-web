@extends('_master.app')
@section('fitur', 'Reservasi')
@section('menu', 'Detail Reservasi')

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
    <h1 class="text-4xl font-bold text-amber-600">Detail Reservasi</h1>
    <p class="mt-2 text-lg text-gray-800">
        Silakan melihat <b>data</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div id="calendar" class="bg-white rounded-2xl h-[65vh]"></div>
</div>
<!-- End Card Blog -->

@endsection

@push('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<script type="module">
    $(document).ready(function (){
        let kode_dokter = "{{ session('nama_pengguna') }}";
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
                    is_dokter: true,
                },
                success: function(hasil) {
                    let data = hasil.data;
                    let event = [];
                    console.log(data)

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
                            title: item.nama_pasien,
                            start: item.tanggal + 'T' + item.waktu_mulai,
                            end: item.tanggal + 'T' + item.waktu_selesai,
                        });
                    });

                    let calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: (tipe === 0) ? "timeGridDay" : "timeGrid",
                        selectable: false,
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
