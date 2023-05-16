<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AntreanLoket;

class Loket extends DataTableComponent
{
    protected $model = AntreanLoket::class;
    public string $uuid;

    public function mount(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id_loket')
            ->setSearchVisibilityDisabled()
            ->setPaginationDisabled()
            ->setColumnSelectDisabled()
            ->setSearchEnabled()
            ->setSortingEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => ['livewire.loket.loket.tambah', ['uuid' => $this->uuid]],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make('No Loket', 'nomor_loket'),
            Column::make('Kode Loket', 'kode_loket'),
            Column::make('Nama Loket', 'nama_loket'),
            Column::make('Warna', 'web_plus_antrean_warna.warna')
                ->format(fn ($value) => view('livewire.loket.loket.warna', ['warna' => $value])),
            Column::make('Jenis', 'bpjs')
                ->format(fn ($value) => view('livewire.loket.loket.jenis', ['jenis' => $value])),
            Column::make('Aksi', 'uuid')
                ->format(fn ($value) => view('livewire.loket.loket.aksi', ['uuid' => $value])),
        ];
    }

    public function builder(): Builder
    {
        return AntreanLoket::join('web_plus_antrean_warna', 'web_plus_antrean_loket.id_warna', '=', 'web_plus_antrean_warna.id_warna')
            ->join('web_plus_antrean_ruangan', 'web_plus_antrean_loket.id_ruang', '=', 'web_plus_antrean_ruangan.id_ruang')
            ->where('web_plus_antrean_ruangan.uuid', $this->uuid)
            ->orderBy('web_plus_antrean_loket.nomor_loket');
    }
}
