<?php

namespace App\Http\Livewire;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use IntlDateFormatter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\JadwalDokter;

class PasienReservasi extends DataTableComponent
{
    protected $model = JadwalDokter::class;
    private const TABEL_DOKTER_BAWAAN = 'dokter';
    private const TABEL_PASIEN_BAWAAN = 'pasien';
    private const TABEL_JADWAL_DOKTER = 'web_plus_reservasi_dokter';
    private const TABEL_RUANGAN = 'web_plus_umum_ruangan';
    private const TABEL_JADWAL_PASIEN = 'web_plus_reservasi_pasien';
    public string $uuid;

    public function mount(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id_jadwal')
            ->setSearchEnabled()
            ->setSortingEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make('Tanggal', 'tanggal')
                ->format(fn ($value) => (new IntlDateFormatter("id_ID",IntlDateFormatter::FULL,IntlDateFormatter::NONE,"Asia/Jakarta",IntlDateFormatter::GREGORIAN,"eeee, dd MMMM yyyy"))->format(new DateTime($value))),
            Column::make("Waktu Mulai", "waktu_mulai")
                ->sortable()
                ->searchable(),
            Column::make("Waktu Selesai", "waktu_selesai")
                ->sortable()
                ->searchable(),
            Column::make("Nama Pasien",  self::TABEL_PASIEN_BAWAAN.".nm_pasien")
                ->sortable()
                ->searchable(),
        ];
    }

    public function builder(): Builder
    {
        return JadwalDokter::join(self::TABEL_RUANGAN, self::TABEL_JADWAL_DOKTER.'.id_ruang', '=', self::TABEL_RUANGAN.'.id_ruang')
            ->join(self::TABEL_JADWAL_PASIEN, self::TABEL_JADWAL_DOKTER.'.id_jadwal', '=', self::TABEL_JADWAL_PASIEN.'.id_jadwal')
            ->join(self::TABEL_PASIEN_BAWAAN, self::TABEL_JADWAL_PASIEN.'.nomor_medis', '=', self::TABEL_PASIEN_BAWAAN.'.no_rkm_medis')
            ->where(self::TABEL_JADWAL_DOKTER.'.tanggal', '>=', date('Y-m-d'))
            ->where(self::TABEL_RUANGAN.'.uuid', '=', $this->uuid)
            ->where(self::TABEL_JADWAL_DOKTER.'.id_dokter','=',session('nama_pengguna'));
    }
}
