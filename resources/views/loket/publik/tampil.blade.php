@extends('_master.publik')
@section('fitur', 'Loket')
@section('menu', 'Tampilkan Loket')
@section('konten')

<div class="grid grid-rows-12 grid-cols-12 h-screen w-screen">
    <div class="flex p-5 items-center justify-center row-span-2 col-span-2 bg-fuchsia-100">Logo</div>

    <div class="flex p-5 items-center justify-center row-span-2 col-span-8 bg-cyan-100">Header</div>

    <div class="flex p-5 items-center justify-center row-span-2 col-span-2 bg-red-500 text-white text-6xl font-bold">
        10:00
    </div>

    <div class="flex p-5 items-center justify-center row-span-9 col-span-7 bg-blue-500">Video</div>

    <div class="flex flex-col items-center justify-center row-span-9 col-span-5 my-auto space-y-7 2xl:space-y-16">
        <!-- Grid -->
        <div class="flex flex-row h-full w-full">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-8xl 2xl:text-9xl text-center font-semibold text-blue-500">
                    001
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[5vw] bg-blue-100 items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-6xl 2xl:text-7xl text-center font-semibold text-blue-500">
                    Loket 2
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="flex flex-row h-full w-full">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-8xl 2xl:text-9xl text-center font-semibold text-blue-500">
                    002
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[5vw] bg-blue-100 items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-6xl 2xl:text-7xl text-center font-semibold text-blue-500">
                    Loket 2
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="flex flex-row h-full w-full">
            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-8xl 2xl:text-9xl text-center font-semibold text-blue-500">
                    003
                </h3>
            </div>
            <!-- End Card -->

            <div class="group flex flex-col h-40 w-[5vw] bg-blue-100 items-center justify-center">
                <div class="text-center font-semibold text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-20 h-20">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </div>
            </div>

            <!-- Card -->
            <div class="group flex flex-col h-40 w-[20vw] bg-blue-100 items-center justify-center">
                <h3 class="text-6xl 2xl:text-7xl text-center font-semibold text-blue-500">
                    Loket 2
                </h3>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>

    <div class="flex p-5 items-center justify-center row-span-1 col-span-12 bg-blue-800 text-white text-4xl 2xl:text-5xl font-semibold uppercase">
        Informasi
    </div>
</div>

@endsection
