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
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    private const TABEL_WARNA = 'web_plus_antrean_warna';
    private const TABEL_LOKET = 'web_plus_antrean_loket';

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
        return AntreanLoket::join(self::TABEL_WARNA, self::TABEL_LOKET . '.id_warna', '=', self::TABEL_WARNA . '.id_warna')
            ->join(self::TABEL_RUANGAN, self::TABEL_LOKET . '.id_ruang', '=', self::TABEL_RUANGAN . '.id_ruang')
            ->where(self::TABEL_RUANGAN . '.uuid', $this->uuid)
            ->orderBy(self::TABEL_LOKET . '.nomor_loket');
    }
}
