<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use stdClass;

class LoketLoket extends Component
{
    public stdClass $ruang;
    public stdClass $loket;
    public Collection $warna;

    /**
     * Create a new component instance.
     */
    public function __construct(stdClass $ruang, Collection $warna, stdClass $loket = null)
    {
        $this->ruang = $ruang;
        $this->loket = $loket;
        $this->warna = $warna;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loket-loket', [
            'ruang' => $this->ruang,
            'loket' => $this->loket,
            'warna' => $this->warna,
        ]);
    }
}
