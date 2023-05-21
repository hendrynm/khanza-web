@extends('_master.app')
@section('fitur', 'Rekam Medis')
@section('menu', 'Detail')
@section('konten')
<!-- Page Heading -->
<header>
    <h1 class="text-4xl font-bold text-emerald-600">Detail Rekam Medis</h1>
    <p class="mt-2 text-lg text-gray-800 ">
        Silakan memilih <b>menu</b> di bawah untuk melanjutkan.
    </p>
</header>
<!-- End Page Heading -->

<!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="bg-emerald-100 px-4 py-5 shadow sm:rounded-lg sm:p-8">
        <div class="md:grid md:grid-cols-4 md:gap-10">
            <div class="md:col-span-1 mb-5">
                <h3 class="text-xl font-bold leading-6 text-gray-900 uppercase">Detail Perawatan</h3>
                <div class="mt-3 text-md text-gray-500">Berisi detail pemeriksaan kesehatan yang diterima pasien.
                </div>

                <h3 class="mt-10 text-xl font-semibold leading-6 text-gray-900">Tanggal Periksa:</h3>
                @foreach($periksa as $i=>$p)
                        <?php
                        $sebelum = $i - 1;
                        $setelah = $i + 1;
                        $url = explode('/', url()->current());
                        $panjang = count($url) - 2;
                        $arr_periksa = (array)$periksa;
                        $data_sebelum = $sebelum >= 0 ? $arr_periksa[$sebelum] : null;
                        $data_setelah = $setelah < count($arr_periksa) ? $arr_periksa[$setelah] : null;
                        ?>
                    @if(last(explode('/',url()->current())) === base64_encode($p->nomor_rawat))
                        <div class="mt-3 text-md font-medium text-gray-700">
                            {{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::SHORT,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy 'pukul' HH.mm z"))->format(new DateTime($p->tanggal_registrasi .' '. $p->jam_registrasi)) }}
                        </div>

                        @if($data_sebelum)
                            <a href="{{ route('admin.rekam_medis.detail', [ $url[$panjang], base64_encode($data_sebelum->nomor_rawat)]) }}"
                               class="mt-5 w-36 inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-orange-500 bg-orange-100 border border-orange-200 rounded-lg hover:bg-orange-200 hover:text-orange-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-orange-400 focus:text-orange-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z"/>
                                </svg>
                                Sebelumnya
                            </a>
                        @endif

                        @if($data_setelah)
                            <a href="{{ route('admin.rekam_medis.detail', [ $url[$panjang], base64_encode($data_setelah->nomor_rawat)]) }}"
                               class="mt-3 inline-flex w-36 items-center justify-center px-4 py-2 text-sm font-medium text-blue-500 bg-blue-100 border border-blue-200 rounded-lg hover:bg-blue-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-400 focus:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z"/>
                                </svg>
                                Berikutnya
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>

            <div class="mt-10 md:col-span-3 md:mt-0">
                <div class="relative border-l-4 border-emerald-300">
                    <div class="mb-10 ml-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                    </span>

                        <div class="ml-2">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                <h3 class="text-lg font-semibold text-gray-900">Diagnosa</h3>
                                <div class="text-sm text-gray-500">Berdasarkan panduan dari International
                                    Classification of Diseases, Tenth Revision (ICD10).
                                </div>
                            </h3>

                            <div class="-mx-1.5 my-3 overflow-x-auto">
                                <div class="p-1 min-w-full inline-block align-middle">
                                    @if(count((array) $diagnosa) > 0)
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y divide-emerald-300">
                                                <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Kode
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Nama Penyakit
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Status
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-emerald-300">
                                                @foreach($diagnosa as $d)
                                                    <tr class="hover:bg-emerald-200">
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                            <span
                                                                class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-cyan-300 text-cyan-800">{{ $d->kode_penyakit }}</span>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $d->nama_penyakit }}</td>
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                            @if($d->status === 'Ralan')
                                                                <span
                                                                    class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-fuchsia-200 text-fuchsia-800">Rawat Jalan</span>
                                                            @else
                                                                <span
                                                                    class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-rose-200 text-rose-800">Rawat Inap</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="py-3 text-base text-red-500 bg-emerald-100 rounded-md"
                                             role="alert">
                                            <p class="font-bold">Tidak ada data!</p>
                                            <p>Belum ada data identifikasi penyakit pasien.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-10 px-10">
                    <div class="border-t-2 border-gray-400 border-dashed"></div>
                </div>

                <div class="relative border-l-4 border-emerald-300">
                    <div class="mb-10 ml-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                    </span>

                        <div class="ml-2">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                <h3 class="text-lg font-semibold text-gray-900">Prosedur</h3>
                                <div class="text-sm text-gray-500">Berdasarkan panduan dari International
                                    Classification of Diseases, Ninth Revision (ICD9).
                                </div>
                            </h3>

                            <div class="-mx-1.5 my-3 overflow-x-auto">
                                <div class="p-1 min-w-full inline-block align-middle">
                                    @if(count((array) $prosedur) > 0)
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y divide-emerald-300">
                                                <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Kode
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Deskripsi
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                        Status
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-emerald-300">
                                                @foreach($prosedur as $p)
                                                    <tr class="hover:bg-emerald-200">
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                            <span
                                                                class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-red-200 text-red-800">{{ $p->kode }}</span>
                                                        </td>
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $p->deskripsi_panjang }}</td>
                                                        <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                            @if($p->status === 'Ralan')
                                                                <span
                                                                    class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-fuchsia-200 text-fuchsia-800">Rawat Jalan</span>
                                                            @else
                                                                <span
                                                                    class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold bg-rose-200 text-rose-800">Rawat Inap</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="py-3 text-base text-red-500 bg-emerald-100 rounded-md"
                                             role="alert">
                                            <p class="font-bold">Tidak ada data!</p>
                                            <p>Belum ada data prosedur yang diberikan kepada pasien.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-10 px-10">
                    <div class="border-t-2 border-gray-400 border-dashed"></div>
                </div>

                <?php $rawat = [$rawat_jalan, $rawat_inap]; ?>
                @if(count((array) $rawat_jalan) > 0 || count((array) $rawat_inap) > 0)
                    @foreach($rawat as $i=>$rwt)
                        @foreach($rwt as $i=>$r)
                            <div class="relative border-l-4 border-emerald-300">
                                <div class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                        </svg>
                                    </span>

                                    <div class="ml-2">
                                        <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                Hasil Pemeriksaan

                                                {{ $r->nama }}

                                                @if($r->jenis_petugas === 'Dokter')
                                                    <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-semibold bg-lime-300 text-lime-800">Dokter Spesialis {{ $r->jabatan }}</span>
                                                @else
                                                    <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-semibold bg-yellow-300 text-yellow-800"> Petugas {{ $r->jabatan }}</span>
                                                @endif

                                                <span class="inline-flex items-center ml-3 py-1 px-3 rounded-full text-xs font-medium bg-blue-200 text-blue-800">
                                                    {{ (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::SHORT,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy 'pukul' HH.mm z"))->format(new DateTime($r->tanggal.' '.$r->jam)) }}
                                                </span>
                                            </h3>

                                            <div class="text-sm text-gray-500">Menggunakan metode Subjective
                                                (Subjektif), Objective (Objektif), Assesment (Penilaian), dan Plan
                                                (Perencanaan).
                                            </div>
                                        </h3>
                                    </div>
                                </div>

                                <div class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">S</span>

                                    <div class="ml-2">
                                        <h3 class="text-lg font-semibold text-gray-900">Subjektif:</h3>
                                        <div class="text-sm text-gray-500">Bagian ini berisi informasi subjektif
                                            yang diberikan oleh pasien atau informasi yang dikumpulkan melalui
                                            wawancara dengan pasien.
                                        </div>

                                        <div class="-mx-1.5 my-3 overflow-x-auto">
                                            <div class="p-1 min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-emerald-300">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Jenis Observasi
                                                            </th>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Keterangan
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-emerald-300">
                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Keluhan
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->keluhan === '' ? '-' : $r->keluhan }}</td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Alergi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->alergi === '' ? '-' : $r->alergi }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">O</span>

                                    <div class="ml-2">
                                        <h3 class="text-lg font-semibold text-gray-900">Objektif:</h3>
                                        <div class="text-sm text-gray-500">Bagian ini berisi informasi objektif yang
                                            diperoleh melalui pemeriksaan fisik, tes laboratorium, atau hasil
                                            penilaian medis lainnya.
                                        </div>

                                        <div class="-mx-1.5 my-3 overflow-x-auto">
                                            <div class="p-1 min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-emerald-300">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Jenis Pemeriksaan
                                                            </th>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Nilai
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-emerald-300">
                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Tekanan Darah / Tensi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->tensi === '' ? '-' : $r->tensi }}
                                                                mmHg
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Nadi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->nadi === '' ? '-' : $r->nadi }}
                                                                x/menit
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Pernapasan / Respirasi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->respirasi === '' ? '-' : $r->respirasi }}
                                                                x/menit
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Suhu
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->suhu === '' ? '-' : $r->suhu }}
                                                                °C
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Berat Badan
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->berat === '' ? '-' : $r->berat }}
                                                                kg
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Tinggi Badan
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->tinggi === '' ? '-' : $r->tinggi }}
                                                                cm
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Lingkar Perut
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->lingkar_perut === '' ? '-' : $r->lingkar_perut }}
                                                                cm
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Saturasi Oksigen
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->spo2 === '' ? '-' : $r->spo2 }}
                                                                %
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Glasgow Coma Scale
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->gcs === '' ? '-' : $r->gcs }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">A</span>

                                    <div class="ml-2">
                                        <h3 class="text-lg font-semibold text-gray-900">Asesmen:</h3>
                                        <div class="text-sm text-gray-500">Bagian ini berisi penilaian atau evaluasi
                                            medis dari informasi subjektif dan objektif yang dikumpulkan.
                                        </div>

                                        <div class="-mx-1.5 my-3 overflow-x-auto">
                                            <div class="p-1 min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-emerald-300">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Jenis Penilaian
                                                            </th>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Hasil
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-emerald-300">
                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Kesadaran
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->kesadaran === '' ? '-' : $r->kesadaran }}</td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Penilaian
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->penilaian === '' ? '-' : $r->penilaian }}</td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Pemeriksaan
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->pemeriksaan === '' ? '-' : $r->pemeriksaan }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">P</span>

                                    <div class="ml-2">
                                        <h3 class="text-lg font-semibold text-gray-900">Perencanaan:</h3>
                                        <div class="text-sm text-gray-500">Bagian ini berisi rencana tindakan atau
                                            pengobatan yang akan diambil berdasarkan informasi subjektif dan
                                            objektif serta penilaian medis.
                                        </div>

                                        <div class="-mx-1.5 my-3 overflow-x-auto">
                                            <div class="p-1 min-w-full inline-block align-middle">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full divide-y divide-emerald-300">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Jenis Rencana
                                                            </th>
                                                            <th scope="col"
                                                                class="px-4 py-2 text-left text-sm font-semibold text-emerald-500">
                                                                Keterangan
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-emerald-300">
                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Instruksi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->instruksi === '' ? '-' : $r->instruksi }}</td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Evaluasi
                                                            </td>
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">{{ $r->evaluasi === '' ? '-' : $r->evaluasi }}</td>
                                                        </tr>

                                                        <tr class="hover:bg-emerald-200">
                                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-emerald-800">
                                                                Tindak Lanjut
                                                            </td>
                                                            <td class="px-4 py-2 text-sm text-emerald-800 leading-relaxed">{!! $r->rencana_tindak_lanjut === '' ? '-' : nl2br($r->rencana_tindak_lanjut) !!}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-10 px-10">
                                <div class="border-t-2 border-gray-400 border-dashed"></div>
                            </div>
                        @endforeach
                    @endforeach
                @else
                    <div class="relative border-l-4 border-emerald-300">
                        <div class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-white rounded-full -left-3 ring-8 ring-white text-emerald-500 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                            </span>

                            <div class="ml-2">
                                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Hasil Pemeriksaan
                                    </h3>

                                    <div class="text-sm text-gray-500">Menggunakan metode Subjective (Subjektif),
                                        Objective (Objektif), Assesment (Penilaian), dan Plan (Perencanaan).
                                    </div>
                                </h3>

                                <div class="py-3 text-base text-red-500 bg-emerald-100 rounded-md" role="alert">
                                    <p class="font-bold">Tidak ada data!</p>
                                    <p>Belum ada data pemeriksaan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Card Blog -->
@endsection
