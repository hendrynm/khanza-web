<?php

namespace App\Http\Livewire;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use IntlDateFormatter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\JadwalDokter;

class ReservasiDokter extends DataTableComponent
{
    protected $model = JadwalDokter::class;
    private const TABEL_DOKTER_BAWAAN = 'dokter';
    private const TABEL_JADWAL_DOKTER = 'web_plus_reservasi_dokter';
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id_jadwal')
            ->setSearchVisibilityDisabled()
            ->setPaginationDisabled()
            ->setColumnSelectDisabled()
            ->setSearchEnabled()
            ->setSortingEnabled()
            ->setConfigurableAreas([
                'toolbar-left-start' => ['livewire.reservasi.dokter.tambah'],
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Dokter', self::TABEL_DOKTER_BAWAAN.'.nm_dokter'),
            Column::make('Tanggal', 'tanggal')
                ->format(fn ($value) => (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy"))->format(new DateTime($value))),
            Column::make('Mulai', 'waktu_mulai')
                ->format(fn ($value) => date_format(date_create($value), 'H.i')),
            Column::make('Selesai', 'waktu_selesai')
                ->format(fn ($value) => date_format(date_create($value), 'H.i')),
            Column::make('Aksi', 'uuid')
                ->format(fn ($value) => view('livewire.reservasi.dokter.aksi', ['uuid' => $value])),
        ];
    }

    public function builder(): Builder
    {
        return JadwalDokter::join(self::TABEL_DOKTER_BAWAAN, self::TABEL_JADWAL_DOKTER.'.id_dokter', '=', self::TABEL_DOKTER_BAWAAN.'.kd_dokter')
            ->join(self::TABEL_RUANGAN, self::TABEL_JADWAL_DOKTER.'.id_ruang', '=', self::TABEL_RUANGAN.'.id_ruang')
            ->where(self::TABEL_JADWAL_DOKTER.'.tanggal', '>=', date('Y-m-d'))
            ->where(self::TABEL_RUANGAN.'.uuid', '=', $this->uuid)
            ->orderBy(self::TABEL_JADWAL_DOKTER.'.tanggal');
    }
}
