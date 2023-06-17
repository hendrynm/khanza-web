<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use stdClass;

class FormReservasiDokter extends Component
{
    public string $uuid_ruang;
    public string $uuid_jadwal;
    public stdClass $dokter;
    public stdClass $ruang;
    public stdClass $jadwal;

    /**
     * Create a new component instance.
     */
    public function __construct(string $uuidRuang, stdClass $dokter, stdClass $ruang, stdClass $jadwal = null, string $uuidJadwal = null)
    {
        $this->uuid_ruang = $uuidRuang;
        $this->dokter = $dokter;
        $this->ruang = $ruang;
        $this->jadwal = $jadwal;
        $this->uuid_jadwal = $uuidJadwal ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-reservasi-dokter',[
            'uuid_ruang' => $this->uuid_ruang,
            'uuid_jadwal' => $this->uuid_jadwal,
            'dokter' => $this->dokter,
            'ruang' => $this->ruang,
            'jadwal' => $this->jadwal
        ]);
    }
}
