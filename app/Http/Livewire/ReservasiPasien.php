<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\JadwalDokter;

class ReservasiPasien extends DataTableComponent
{
    protected $model = JadwalDokter::class;
    private const TABEL_DOKTER_BAWAAN = 'dokter';
    private const TABEL_JADWAL_DOKTER = 'web_plus_reservasi_dokter';
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    public string $uuid;

    public function mount(string $uuid_ruang)
    {
        $this->uuid = $uuid_ruang;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id_dokter')
            ->setSearchVisibilityDisabled()
            ->setPaginationDisabled()
            ->setColumnSelectDisabled()
            ->setSearchEnabled()
            ->setSortingEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Dokter', self::TABEL_DOKTER_BAWAAN.'.nm_dokter'),
            Column::make('Aksi', 'id_dokter')
                ->format(fn ($value) => view('livewire.reservasi.pasien.aksi', ['id_dokter' => $value])),
        ];
    }

    public function builder(): Builder
    {
        return JadwalDokter::groupBy(self::TABEL_JADWAL_DOKTER.'.id_dokter', self::TABEL_DOKTER_BAWAAN.'.nm_dokter')
            ->join(self::TABEL_DOKTER_BAWAAN, self::TABEL_JADWAL_DOKTER.'.id_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_RUANGAN, self::TABEL_JADWAL_DOKTER.'.id_ruang', '=', self::TABEL_RUANGAN.'.id_ruang')
            ->where(self::TABEL_JADWAL_DOKTER.'.tanggal', '>=', date('Y-m-d'))
            ->where(self::TABEL_RUANGAN.'.uuid', '=', $this->uuid);
    }
}
