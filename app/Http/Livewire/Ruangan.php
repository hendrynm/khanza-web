<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AntreanRuangan;

class Ruangan extends DataTableComponent
{
    protected $model = Ruangan::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id_ruang')
            ->setSearchEnabled()
            ->setSortingEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => 'livewire.loket.ruang.tambah',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Ruang', 'nama_ruang')
                ->sortable()
                ->searchable(),
            Column::make('Foto', 'foto')
                ->format(fn ($value) => view('livewire.loket.ruang.gambar', ['gambar' => base64_encode($value)])),
            Column::make('Aksi', 'uuid')
                ->format(fn ($value) => view('livewire.loket.ruang.aksi', ['uuid' => $value])),
        ];
    }

    public function builder(): Builder
    {
        return AntreanRuangan::orderBy('nama_ruang');
    }
}
