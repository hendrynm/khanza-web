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
            ->setSearchVisibilityDisabled()
            ->setColumnSelectDisabled()
            ->setPaginationDisabled()
            ->setSearchEnabled()
            ->setSortingEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => 'livewire.loket.ruang.tambah',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make('ID Ruang', 'id_ruang'),
            Column::make('Nama Ruang', 'nama_ruang'),
            Column::make('Foto', 'foto')
                ->format(fn ($value) => view('livewire.loket.ruang.gambar', ['gambar' => base64_encode($value)])),
            Column::make('Aksi', 'uuid')
                ->format(fn ($value) => view('livewire.loket.ruang.ubah_hapus', ['uuid' => $value])),
        ];
    }

    public function query(): Builder
    {
        return AntreanRuangan::query();
    }

}
