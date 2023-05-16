@if($jenis === 1)
    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800">BPJS</span>
@elseif($jenis === 2)
    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Umum & BPJS</span>
@else
    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Umum</span>
@endif
