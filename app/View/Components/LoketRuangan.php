<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use stdClass;

class LoketRuangan extends Component
{
    public stdClass $ruang;
    public string $warna;

    /**
     * Create a new component instance.
     */
    public function __construct(stdClass $ruang, string $warna)
    {
        $this->ruang = $ruang;
        $this->warna = $warna;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loket-ruangan',[
            'ruang' => $this->ruang,
            'warna' => $this->warna
        ]);
    }
}
