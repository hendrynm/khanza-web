<!-- Sidebar Toggle -->
<div class="sticky top-0 inset-x-0 z-[20] bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden">
    <div class="flex items-center py-4">
        <!-- Navigation Toggle -->
        <div class="flex text-gray-500 hover:text-gray-800 items-center" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
            <div class="mr-3">
                <svg class="w-7 h-7" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
            <div class="">
                <span class="font-medium text-lg">Menu</span>
            </div>
        </div>
        <!-- End Navigation Toggle -->
    </div>
</div>
<!-- End Sidebar Toggle -->

<!-- Sidebar -->
<div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 left-0 bottom-0 z-[60] w-64 bg-white border-r border-gray-200 pt-7 pb-10 overflow-y-auto scrollbar-y lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 overflow-x-hidden">
    <div class="flex px-5 mb-3 justify-center">
        <div class="ml-2 mr-5">
            <img src="{{ asset('logo khanza-web mini.png') }}" width="100">
        </div>
        <div class="">
            <a class="flex-wrap text-3xl font-bold text-cyan-500" href="{{ route('admin.beranda') }}" aria-label="Brand" style="line-height: 1">Khanza Plus</a>
        </div>
    </div>

    <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="font-semibold">
            <li>
                <a class="flex items-center gap-x-3.5 py-4 px-7 -mx-5 text-gray-800 rounded-md hover:bg-gray-100 " href="{{ route('admin.beranda') }}" id="select-beranda">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Beranda
                </a>
            </li>

            <li class="hs-accordion" id="users-accordion">
                <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-4 px-7 -mx-5 rounded-md hover:bg-gray-100 hover:text-blue-500" href="{{ route('admin.loket.beranda') }}" id="select-loket">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    Loket Antrean
                </a>
            </li>

            <li class="hs-accordion" id="projects-accordion">
                <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-4 px-7 -mx-5 rounded-md hover:bg-gray-100 hover:text-amber-500" href="{{ route('admin.reservasi.beranda') }}" id="select-reservasi">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Reservasi Pasien
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-4 px-7 -mx-5 rounded-md hover:bg-gray-100 hover:text-emerald-500" href="{{ route('admin.rekam_medis.beranda') }}" id="select-rekam_medis">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                    </svg>
                    Rekam Medis
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-4 px-7 -mx-5 rounded-md hover:bg-gray-100 hover:text-red-500" href="{{ route('admin.tindakan.beranda') }}" id="select-tindakan">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                    </svg>
                    Tindakan Medis
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-4 px-7 -mx-5 text-gray-800 rounded-md hover:bg-gray-100" href="{{ route('admin.keluar') }}" id="select-keluar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Keluar
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
